import assert from 'node:assert/strict';
import test from 'node:test';
import { mkdtemp, readFile, readdir, rm } from 'node:fs/promises';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import { once } from 'node:events';
import { build } from '../scripts/build.mjs';
import { createPreview } from '../scripts/preview-server.mjs';
import { pages, targets } from '../site.config.mjs';

const builds = {};
test.before(async () => {
  for (const target of Object.keys(targets)) {
    const out = join(await mkdtemp(join(tmpdir(), 'lh-')), 'linden-herald-build-' + target);
    builds[target] = (await build({ target, out })).out;
  }
});
test.after(() => Promise.all(Object.values(builds).map(out => rm(join(out, '..'), { recursive: true, force: true }))));

const read = (target, file) => readFile(join(builds[target], file), 'utf8');
const attr = (html, pattern) => (pattern.exec(html) || [])[1];

for (const target of Object.keys(targets)) {
  const site = targets[target];

  test(`${target}: every page has complete, unique SEO tags`, async () => {
    const titles = new Set();
    const descriptions = new Set();
    for (const page of pages) {
      const html = await read(target, page.file);
      const title = attr(html, /<title>([^<]+)<\/title>/)?.replace(/&amp;/g, '&');
      const description = attr(html, /<meta name="description" content="([^"]+)">/);
      assert(title && title.length <= 65, `${page.file}: title "${title}" (${title?.length} chars)`);
      assert(description && description.length >= 70 && description.length <= 160, `${page.file}: description is ${description?.length} chars`);
      assert(!titles.has(title) && !descriptions.has(description), `${page.file}: duplicate title or description`);
      titles.add(title);
      descriptions.add(description);
      assert.match(html, /^<!DOCTYPE html>\n<html lang="en">/, page.file);
      assert.equal(html.match(/<h1[\s>]/g)?.length, 1, `${page.file}: needs exactly one h1`);
      assert.match(html, /<meta property="og:image" content="https:\/\/[^"]+og-image\.jpg">/, page.file);
      const noindex = html.includes('<meta name="robots" content="noindex');
      assert.equal(noindex, !site.indexable || Boolean(page.notFound), `${page.file}: robots tag`);
      if (page.notFound) continue;
      assert.equal(attr(html, /<link rel="canonical" href="([^"]+)">/), site.url + page.path, `${page.file}: canonical`);
      const data = JSON.parse(attr(html, /<script type="application\/ld\+json">(.+?)<\/script>/));
      const types = data['@graph'].flatMap(node => node['@type']);
      assert(types.includes('NewsMediaOrganization') && types.includes('WebSite'), `${page.file}: organization data`);
      if (page.path) assert(types.includes('BreadcrumbList'), `${page.file}: breadcrumb`);
      assert(!/\{\{|data-nav=|\.php\b/.test(html), `${page.file}: leftover template marker or .php link`);
    }
  });

  test(`${target}: sitemap and robots.txt point at the right site`, async () => {
    if (!site.indexable) {
      const files = await readdir(builds[target]);
      assert(!files.includes('sitemap.xml') && !files.includes('robots.txt'), 'the noindex demo lists its pages for crawlers');
      assert((await read(target, 'index.html')).includes('<meta name="robots" content="noindex, nofollow">'));
      return;
    }
    const sitemap = await read(target, 'sitemap.xml');
    for (const page of pages.filter(page => !page.notFound)) assert(sitemap.includes(`<loc>${site.url + page.path}</loc>`), page.file);
    assert(!sitemap.includes('404'));
    assert.match(sitemap, /archive\/linden-herald-\d{4}-\d{2}-\d{2}\.pdf/);
    assert((await read(target, 'robots.txt')).includes(`Sitemap: ${site.url}sitemap.xml`));
  });
}

test('advertise page shows every rate and question in its structured data', async () => {
  const html = await read('cloudflare', 'advertise.html');
  const graph = JSON.parse(attr(html, /<script type="application\/ld\+json">(.+?)<\/script>/))['@graph'];
  const faq = graph.find(node => node['@type'] === 'FAQPage');
  for (const question of faq.mainEntity) assert(html.includes(`<h3>${question.name.replace(/&/g, '&amp;')}</h3>`), question.name);
  const offers = graph.find(node => node['@type'] === 'Service').hasOfferCatalog.itemListElement;
  for (const offer of offers) assert(html.includes(`<span class="rate-name">${offer.itemOffered.name}</span>`), offer.itemOffered.name);
});

test('cloudflare build redirects the old .php pages and sets cache headers', async () => {
  const redirects = await read('cloudflare', '_redirects');
  for (const page of pages.filter(page => page.path && !page.notFound)) assert(redirects.includes(`/${page.path}.php /${page.path} 301`), page.path);
  assert(redirects.includes('/index.php / 301'));
  assert.match(await read('cloudflare', '_headers'), /\/site\.css\n {2}Cache-Control: public, max-age=31536000, immutable/);
  const files = await readdir(builds.pages);
  assert(files.includes('.nojekyll') && !files.includes('_headers') && !files.includes('_redirects'), 'GitHub Pages build has hosting files');
});

test('contact form keeps its fields and never posts to the live site', async () => {
  const html = await read('pages', 'contact.html');
  assert.match(html, /<form id="contact-form">/);
  for (const name of ['lhname', 'lhemail', 'lhphone', 'message4lh']) assert(html.includes(`name="${name}"`), name);
  assert(!html.includes('lindenherald.com/contact'));
});

for (const mount of ['/', '/Linden-Herald-Demo/']) {
  test(`every link, image and anchor works when hosted at ${mount}`, async t => {
    const server = createPreview({ directory: builds.pages, mount });
    server.listen(0, '127.0.0.1');
    await once(server, 'listening');
    t.after(() => new Promise(resolve => { server.close(resolve); server.closeAllConnections(); }));
    const origin = `http://127.0.0.1:${server.address().port}`;
    const ids = new Map();
    const idsOf = async url => {
      const key = url.split('#')[0];
      if (!ids.has(key)) ids.set(key, new Set([...(await (await fetch(key)).text()).matchAll(/\sid="([^"]+)"/g)].map(match => match[1])));
      return ids.get(key);
    };
    const checked = new Set();
    // The 404 page uses absolute links for the real GitHub Pages address.
    const checkedPages = pages.filter(page => !page.notFound || mount === new URL(targets.pages.url).pathname);
    for (const page of checkedPages) {
      const url = origin + mount + (page.notFound ? 'no-such-page' : page.path);
      const response = await fetch(url);
      assert.equal(response.status, page.notFound ? 404 : 200, url);
      const html = await response.text();
      const references = [...html.matchAll(/\b(href|src|srcset)="([^"]+)"/g)]
        .flatMap(([, attr, value]) => attr === 'srcset' ? value.split(/,\s*/).map(candidate => candidate.split(/\s+/)[0]) : [value]);
      for (const reference of references) {
        if (reference.startsWith('tel:')) {
          assert.equal(reference, 'tel:+12097728854');
          continue;
        }
        if (/^[a-z]+:/i.test(reference)) continue;
        if (reference.startsWith('#')) {
          assert(html.includes(` id="${reference.slice(1)}"`), `${page.file}: missing anchor ${reference}`);
          continue;
        }
        const target = new URL(reference, url);
        assert(target.pathname.startsWith(mount), `${page.file}: link escapes the site: ${reference}`);
        if (target.hash) assert((await idsOf(target.href)).has(target.hash.slice(1)), `${page.file}: missing anchor ${reference}`);
        target.hash = '';
        if (checked.has(target.href)) continue;
        checked.add(target.href);
        const resource = await fetch(target, { method: 'HEAD' });
        assert.equal(resource.status, 200, `${page.file}: ${reference}`);
      }
    }
    assert(checked.size > 30, `only ${checked.size} links were checked`);
  });
}
