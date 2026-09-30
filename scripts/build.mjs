// Builds the static site from site/ into an output folder.
//   node scripts/build.mjs --target=pages       GitHub Pages demo (noindex)
//   node scripts/build.mjs --target=cloudflare  production for lindenherald.com
import { cp, mkdir, readFile, readdir, rm, stat, writeFile, lstat } from 'node:fs/promises';
import { createHash } from 'node:crypto';
import { execFileSync } from 'node:child_process';
import { basename, resolve, relative } from 'node:path';
import { fileURLToPath, pathToFileURL } from 'node:url';
import { targets, business, pages, noticeRates, noticeFaq } from '../site.config.mjs';

const project = fileURLToPath(new URL('../', import.meta.url));
const source = resolve(project, 'site');
const today = new Date().toISOString().slice(0, 10);
// Years in print, rounded down to five ("more than 65 years").
const yearsPublished = Math.floor((new Date().getFullYear() - Number(business.foundingDate)) / 5) * 5;

const esc = text => String(text).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
const hash = text => createHash('sha256').update(text).digest('hex').slice(0, 10);
const longDate = iso => new Date(iso + 'T12:00:00Z').toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric', timeZone: 'UTC' });
const phoneLink = text => text.replace(business.phoneDisplay, `<a href="tel:+12097728854">${business.phoneDisplay}</a>`);

function lastModified(file) {
  try {
    const dirty = execFileSync('git', ['status', '--porcelain', '--', file], { cwd: project, encoding: 'utf8' }).trim();
    const date = execFileSync('git', ['log', '-1', '--format=%cs', '--', file], { cwd: project, encoding: 'utf8' }).trim();
    return dirty || !date ? today : date;
  } catch {
    return today;
  }
}

// Published issues come straight from the PDFs in site/archive, newest first.
async function loadIssues() {
  const issues = [];
  for (const name of await readdir(resolve(source, 'archive'))) {
    const match = /^linden-herald-(\d{4}-\d{2}-\d{2})\.pdf$/.exec(name);
    if (!match) throw new Error(`Archive PDFs must be named linden-herald-YYYY-MM-DD.pdf: ${name}`);
    const { size } = await stat(resolve(source, 'archive', name));
    const date = match[1];
    const cover = `images/covers/${date}.jpg`;
    const webp = `images/covers/${date}.webp`;
    for (const image of [cover, webp]) {
      await stat(resolve(source, image)).catch(() => {
        throw new Error(`Missing ${image}. Run: python scripts/make-covers.py`);
      });
    }
    issues.push({ date, pdf: `archive/${name}`, cover, webp, size: (size / 1048576).toFixed(1) });
  }
  return issues.sort((a, b) => b.date.localeCompare(a.date));
}

// The newest two covers sit near the top of the page, so only later ones load lazily.
const issueHtml = (issue, index) => `<li><a href="${issue.pdf}" target="_blank" rel="noopener">`
  + `<picture><source srcset="${issue.webp}" type="image/webp">`
  + `<img class="archive-cover" src="${issue.cover}" alt="" width="220" height="361"${index < 2 ? '' : ' loading="lazy"'} decoding="async"></picture>`
  + `<span class="archive-edition"><time datetime="${issue.date}">${longDate(issue.date)}</time><span>Linden Herald</span></span>`
  + `<span class="archive-file">PDF &middot; ${issue.size} MB <span class="visually-hidden">(opens in a new tab)</span><span aria-hidden="true">&nearr;</span></span></a></li>`;

function issuesHtml(issues) {
  const years = [...new Set(issues.map(issue => issue.date.slice(0, 4)))];
  return years.map(year => `<h2 class="archive-year">${year} editions</h2>
<ul class="archive-list">
${issues.filter(issue => issue.date.startsWith(year)).map(issue => issueHtml(issue, issues.indexOf(issue))).join('\n')}
</ul>`).join('\n');
}

const ratesHtml = `<ul class="notice-rates">
${noticeRates.map(rate => `<li><span class="rate-name">${esc(rate.name)}</span>${rate.price
  ? `<span class="rate-price">$${rate.price}</span>`
  : '<a class="rate-price rate-call" href="tel:+12097728854">Call for pricing</a>'}${rate.note ? `<span class="rate-note">${esc(rate.note)}</span>` : ''}</li>`).join('\n')}
</ul>`;

const faqHtml = `<div class="faq">
${noticeFaq.map(item => `<details class="faq-item"><summary><h3>${esc(item.q)}</h3></summary><p>${phoneLink(esc(item.a))}</p></details>`).join('\n')}
</div>`;

function structuredData(page, site, issues) {
  const pageUrl = site.url + page.path;
  const org = { '@id': site.url + '#organization' };
  const address = {
    '@type': 'PostalAddress', streetAddress: business.street, postOfficeBoxNumber: business.postOfficeBox,
    addressLocality: business.city, addressRegion: business.region, postalCode: business.postalCode, addressCountry: 'US'
  };
  const county = { '@type': 'AdministrativeArea', name: 'San Joaquin County, California' };
  const graph = [
    {
      '@type': ['NewsMediaOrganization', 'LocalBusiness'],
      ...org,
      name: business.name,
      alternateName: 'The Linden Herald',
      url: site.url,
      logo: { '@type': 'ImageObject', url: site.url + 'images/logo-512.png', width: 512, height: 512 },
      image: site.url + 'images/og-image.jpg',
      description: "Linden, California's weekly community newspaper since 1959 and an adjudicated newspaper of general circulation for San Joaquin County.",
      slogan: business.tagline,
      foundingDate: business.foundingDate,
      foundingLocation: { '@type': 'Place', name: 'Linden, California' },
      telephone: business.phone,
      address,
      areaServed: [{ '@type': 'City', name: 'Linden, California' }, county],
      contactPoint: {
        '@type': 'ContactPoint', telephone: business.phone, contactType: 'customer service', areaServed: 'US', availableLanguage: 'English',
        hoursAvailable: { '@type': 'OpeningHoursSpecification', dayOfWeek: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], opens: '00:00', closes: '23:59' }
      },
      knowsAbout: ['Linden, California news', 'San Joaquin County legal notices', 'Fictitious business name publication', 'Community journalism']
    },
    { '@type': 'WebSite', '@id': site.url + '#website', url: site.url, name: business.name, publisher: org, inLanguage: 'en-US' },
    {
      '@type': { about: 'AboutPage', contact: 'ContactPage', archive: 'CollectionPage' }[page.path] || 'WebPage',
      '@id': pageUrl + '#webpage',
      url: pageUrl,
      name: page.title,
      description: page.description,
      isPartOf: { '@id': site.url + '#website' },
      about: org,
      inLanguage: 'en-US',
      ...(page.path && { breadcrumb: { '@id': pageUrl + '#breadcrumb' } })
    }
  ];
  if (page.path) {
    graph.push({
      '@type': 'BreadcrumbList', '@id': pageUrl + '#breadcrumb',
      itemListElement: [
        { '@type': 'ListItem', position: 1, name: 'Home', item: site.url },
        { '@type': 'ListItem', position: 2, name: page.name, item: pageUrl }
      ]
    });
  }
  if (page.path === 'subscribe') {
    graph.push({
      '@type': 'Offer', '@id': pageUrl + '#subscription', name: 'Linden Herald one-year mail subscription',
      description: '52 weekly issues of the Linden Herald delivered by mail.', price: '42.00', priceCurrency: 'USD',
      availability: 'https://schema.org/InStock', eligibleRegion: county, seller: org, url: pageUrl
    });
  }
  if (page.path === 'advertise') {
    graph.push({
      '@type': 'Service', '@id': pageUrl + '#legal-notices', name: 'Legal notice publication', serviceType: 'Legal notice publication',
      description: 'Publication of fictitious business name statements, name change petitions, family law notices, trustee sales, court summons and bulk sale transfers in an adjudicated San Joaquin County newspaper, with free proof of publication.',
      provider: org, areaServed: county,
      hasOfferCatalog: {
        '@type': 'OfferCatalog', name: 'Legal notice rates',
        itemListElement: noticeRates.map(rate => ({
          '@type': 'Offer', itemOffered: { '@type': 'Service', name: rate.name },
          ...(rate.price && { price: rate.price.toFixed(2), priceCurrency: 'USD' }),
          ...(rate.note && { description: rate.note })
        }))
      }
    }, {
      '@type': 'FAQPage', '@id': pageUrl + '#faq',
      mainEntity: noticeFaq.map(item => ({ '@type': 'Question', name: item.q, acceptedAnswer: { '@type': 'Answer', text: item.a } }))
    });
  }
  if (page.path === 'archive') {
    const periodical = { '@type': 'Periodical', '@id': site.url + '#periodical', name: business.name, publisher: org, inLanguage: 'en-US' };
    graph.push(periodical, {
      '@type': 'ItemList', '@id': pageUrl + '#issues', name: 'Past issues of the Linden Herald',
      itemListElement: issues.map((issue, index) => ({
        '@type': 'ListItem', position: index + 1,
        item: {
          '@type': 'PublicationIssue', '@id': site.url + issue.pdf, name: `Linden Herald, ${longDate(issue.date)}`,
          datePublished: issue.date, url: site.url + issue.pdf, image: site.url + issue.cover, isPartOf: { '@id': periodical['@id'] }
        }
      }))
    });
  }
  // Escape "<" so the JSON can never close its script element.
  return JSON.stringify({ '@context': 'https://schema.org', '@graph': graph }).replace(/</g, '\\u003c');
}

function headHtml(page, site, assets, issues) {
  const url = site.url + page.path;
  const image = site.url + 'images/og-image.jpg';
  return [
    '<meta charset="utf-8">',
    '<meta name="viewport" content="width=device-width, initial-scale=1">',
    // Set before first paint so the phone menu starts collapsed instead of jumping.
    "<script>document.documentElement.classList.add('js')</script>",
    `<title>${esc(page.title)}</title>`,
    `<meta name="description" content="${esc(page.description)}">`,
    // The demo also says nofollow so crawlers skip its PDFs, which cannot carry a noindex tag.
    !site.indexable ? '<meta name="robots" content="noindex, nofollow">' : '',
    site.indexable && page.notFound ? '<meta name="robots" content="noindex, follow">' : '',
    page.notFound ? '' : `<link rel="canonical" href="${url}">`,
    '<meta name="theme-color" content="#005555">',
    '<meta name="format-detection" content="telephone=no">',
    '<link rel="icon" href="favicon.ico" sizes="32x32">',
    '<link rel="icon" href="favicon.svg" type="image/svg+xml">',
    '<link rel="apple-touch-icon" href="apple-touch-icon.png">',
    `<link rel="stylesheet" href="site.css?v=${assets.css}">`,
    `<script src="site.js?v=${assets.js}" defer></script>`,
    '<meta property="og:type" content="website">',
    '<meta property="og:site_name" content="Linden Herald">',
    '<meta property="og:locale" content="en_US">',
    `<meta property="og:title" content="${esc(page.title)}">`,
    `<meta property="og:description" content="${esc(page.description)}">`,
    page.notFound ? '' : `<meta property="og:url" content="${url}">`,
    `<meta property="og:image" content="${image}">`,
    '<meta property="og:image:width" content="1200">',
    '<meta property="og:image:height" content="630">',
    '<meta property="og:image:alt" content="Linden Herald, serving San Joaquin County since 1959">',
    '<meta name="twitter:card" content="summary_large_image">',
    page.notFound ? '' : `<script type="application/ld+json">${structuredData(page, site, issues)}</script>`
  ].filter(Boolean).join('\n');
}

async function partials() {
  const map = {};
  for (const name of await readdir(resolve(source, 'partials'))) {
    map[name.replace(/\.html$/, '')] = (await readFile(resolve(source, 'partials', name), 'utf8')).trim();
  }
  return map;
}

function include(html, parts) {
  for (let depth = 0; /\{\{> [\w-]+\}\}/.test(html); depth++) {
    if (depth > 5) throw new Error('Partials nested too deeply');
    html = html.replace(/\{\{> ([\w-]+)\}\}/g, (_, name) => {
      if (!(name in parts)) throw new Error(`Unknown partial: ${name}`);
      return parts[name];
    });
  }
  return html;
}

// Marks the current page in the main navigation and removes the markers.
function markCurrent(html, current) {
  return html
    .replace(/<li data-nav="([\w-]+)"(?: class="([^"]*)")?>(\s*)<a /g, (_, name, cls = '', space) => name === current
      ? `<li class="${(cls + ' current_page_item').trim()}">${space}<a aria-current="page" `
      : `<li${cls ? ` class="${cls}"` : ''}>${space}<a `)
    .replace(/<a data-nav="([\w-]+)" /g, (_, name) => name === current ? '<a aria-current="page" ' : '<a ');
}

// The 404 page is served for any missing path, so its links must be absolute.
const absolutize = (html, base) => html
  .replace(/\b(href|src)="(?![#/]|[a-z]+:)([^"]*)"/g,
    (_, attr, value) => `${attr}="${base}${value.replace(/^\.\//, '')}"`)
  .replace(/\bsrcset="([^"]*)"/g, (_, value) => `srcset="${value.split(/,\s*/)
    .map(candidate => /^[/#]|^[a-z]+:/.test(candidate) ? candidate : base + candidate.replace(/^\.\//, ''))
    .join(', ')}"`);

const minifyHtml = html => html
  .replace(/<!--[\s\S]*?-->/g, '')
  .split('\n').map(line => line.trim()).filter(Boolean).join('\n');

const minifyCss = css => css
  .replace(/\/\*[\s\S]*?\*\//g, '')
  .replace(/\s+/g, ' ')
  .replace(/\s*([{};,>])\s*/g, '$1')
  .replace(/:\s+/g, ':')
  .replace(/;}/g, '}')
  .trim();

function redirectsFile(issues) {
  const lines = ['/index.php / 301'];
  for (const page of pages.filter(page => page.path && !page.notFound)) lines.push(`/${page.path}.php /${page.path} 301`);
  // Issues that were published on the original site under their old file names.
  for (const issue of issues) lines.push(`/archive/Linden%20Herld%20${issue.date.replace(/-/g, '')}.pdf /${issue.pdf} 301`);
  return lines.join('\n') + '\n';
}

const headersFile = `/*
  X-Content-Type-Options: nosniff
  Referrer-Policy: strict-origin-when-cross-origin
  X-Frame-Options: SAMEORIGIN
  Permissions-Policy: camera=(), microphone=(), geolocation=()
/site.css
  Cache-Control: public, max-age=31536000, immutable
/site.js
  Cache-Control: public, max-age=31536000, immutable
/images/*
  Cache-Control: public, max-age=2592000
/archive/*
  Cache-Control: public, max-age=2592000
`;

export async function build({ target = 'pages', out = resolve(project, '_site') } = {}) {
  const site = targets[target];
  if (!site) throw new Error(`Unknown target "${target}". Use one of: ${Object.keys(targets).join(', ')}`);
  out = resolve(out);
  // The output folder is deleted first, so only allow _site or a test build folder.
  if (out !== resolve(project, '_site') && !basename(out).startsWith('linden-herald-build-')) {
    throw new Error(`Refusing to replace ${out}`);
  }
  if ((await lstat(out).catch(() => null))?.isSymbolicLink()) throw new Error('The output must not be a symbolic link.');
  await rm(out, { recursive: true, force: true });
  await mkdir(out, { recursive: true });

  const basePath = new URL(site.url).pathname;
  const issues = await loadIssues();
  const parts = await partials();
  const layout = await readFile(resolve(source, 'layout.html'), 'utf8');

  const css = minifyCss(await readFile(resolve(source, 'site.css'), 'utf8'));
  const js = await readFile(resolve(source, 'site.js'), 'utf8');
  await writeFile(resolve(out, 'site.css'), css);
  await writeFile(resolve(out, 'site.js'), js);
  const assets = { css: hash(css), js: hash(js) };

  for (const folder of ['images', 'archive']) await cp(resolve(source, folder), resolve(out, folder), { recursive: true });
  await cp(resolve(source, 'static'), out, { recursive: true });

  for (const page of pages) {
    let main = await readFile(resolve(source, 'pages', page.file), 'utf8');
    main = main.replace('{{rates}}', ratesHtml).replace('{{faq}}', faqHtml).replace('{{issues}}', issuesHtml(issues))
      .replace('{{yearsPublished}}', yearsPublished);
    let html = layout
      .replace('{{head}}', () => headHtml(page, site, assets, issues))
      .replace('{{bodyClass}}', page.bodyClass ? ` class="${page.bodyClass}"` : '')
      .replace('{{main}}', () => main)
      .replace('{{year}}', new Date().getFullYear());
    html = markCurrent(include(html, parts), page.file.replace(/\.html$/, ''));
    if (page.notFound) html = absolutize(html, basePath);
    const leftover = /\{\{[^}]*\}\}|data-nav=/.exec(html);
    if (leftover) throw new Error(`${page.file}: unresolved template marker ${leftover[0]}`);
    await writeFile(resolve(out, page.file), minifyHtml(html) + '\n');
  }

  // Only the indexable site gets a sitemap. The demo lives in a subfolder,
  // where crawlers ignore robots.txt, and a sitemap would only list its PDFs.
  if (site.indexable) {
    const urls = pages.filter(page => !page.notFound).map(page =>
      `<url><loc>${site.url + page.path}</loc><lastmod>${lastModified('site/pages/' + page.file)}</lastmod><priority>${page.priority}</priority></url>`);
    for (const issue of issues) urls.push(`<url><loc>${site.url + issue.pdf}</loc><lastmod>${issue.date}</lastmod><priority>0.5</priority></url>`);
    await writeFile(resolve(out, 'sitemap.xml'), `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n${urls.join('\n')}\n</urlset>\n`);
    await writeFile(resolve(out, 'robots.txt'), `User-agent: *\nAllow: /\n\nSitemap: ${site.url}sitemap.xml\n`);
  }

  if (target === 'pages') {
    await writeFile(resolve(out, '.nojekyll'), '');
  } else {
    await writeFile(resolve(out, '_headers'), headersFile);
    await writeFile(resolve(out, '_redirects'), redirectsFile(issues));
  }
  return { out, site, pages: pages.length, issues: issues.length };
}

if (import.meta.url === pathToFileURL(process.argv[1]).href) {
  const target = (process.argv.find(arg => arg.startsWith('--target=')) || '--target=pages').split('=')[1];
  const result = await build({ target });
  console.log(`Built ${result.pages} pages and ${result.issues} issues for ${result.site.url} in ${relative(project, result.out)}/`);
}
