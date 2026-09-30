// Site-wide settings and per-page SEO. The build reads this file; page
// sources in site/pages hold only their <main> content.

// Where each build is published. `pages` is the GitHub Pages demo and is kept
// out of search results; `cloudflare` is the production site.
export const targets = {
  pages: { url: 'https://alectronic-solutions.github.io/Linden-Herald-Demo/', indexable: false },
  cloudflare: { url: 'https://lindenherald.com/', indexable: true }
};

export const business = {
  name: 'Linden Herald',
  tagline: 'Serving San Joaquin County since 1959',
  phone: '+1-209-772-8854',
  phoneDisplay: '(209) 772-8854',
  street: 'PO Box 929',
  postOfficeBox: '929',
  city: 'Linden',
  region: 'CA',
  postalCode: '95236',
  foundingDate: '1959',
  decree: '72641'
};

// Page order is the sitemap order. `path` is the extensionless URL ('' is home).
export const pages = [
  {
    file: 'index.html',
    path: '',
    title: 'Linden Herald | Linden, CA Community Newspaper Since 1959',
    description: "Linden, California's weekly community newspaper since 1959. Local news, sports, schools and agriculture, plus San Joaquin County legal notices.",
    bodyClass: 'home-page',
    priority: '1.0'
  },
  {
    file: 'about.html',
    path: 'about',
    name: 'About',
    title: 'About the Linden Herald | Linden, CA Newspaper Since 1959',
    description: "Meet the Linden Herald, East San Joaquin County's locally owned weekly newspaper since 1959 and an adjudicated newspaper of general circulation.",
    bodyClass: 'about-page',
    priority: '0.7'
  },
  {
    file: 'subscribe.html',
    path: 'subscribe',
    name: 'Subscribe',
    title: 'Subscribe to the Linden Herald | $42 a Year by Mail',
    description: 'Get the Linden Herald by mail every week: 52 issues for $42 a year. Local news, sports, schools and community photos from Linden, California.',
    bodyClass: 'subscribe-page',
    priority: '0.9'
  },
  {
    file: 'advertise.html',
    path: 'advertise',
    name: 'Advertise',
    title: 'San Joaquin County Legal Notices & DBA Publishing | Linden Herald',
    description: 'Publish your DBA (fictitious business name), name change, divorce or summons notice in San Joaquin County from $105, with free proof of publication.',
    bodyClass: 'advertise-page',
    priority: '0.9'
  },
  {
    file: 'archive.html',
    path: 'archive',
    name: 'Archive',
    title: 'Linden Herald Archive | Past Issues of Linden, CA News',
    description: 'Read past issues of the Linden Herald free online. Weekly local news from Linden and East San Joaquin County, California, as printable PDFs.',
    bodyClass: 'archive-page',
    priority: '0.8'
  },
  {
    file: 'contact.html',
    path: 'contact',
    name: 'Contact',
    title: 'Contact the Linden Herald | Linden, CA | (209) 772-8854',
    description: 'Contact the Linden Herald for news tips, subscriptions, legal notices and advertising. Call (209) 772-8854, any time of day, or write to PO Box 929, Linden.',
    bodyClass: 'contact-page',
    priority: '0.7'
  },
  {
    file: 'privacy.html',
    path: 'privacy',
    name: 'Privacy Policy',
    title: 'Privacy Policy | Linden Herald',
    description: 'Privacy information for the Linden Herald website demo, including how its sample contact form works and what happens when you visit the site.',
    priority: '0.3'
  },
  {
    file: '404.html',
    path: '404',
    title: 'Page Not Found | Linden Herald',
    description: 'The page you were looking for could not be found. Find news, subscriptions, legal notices and the archive of the Linden Herald.',
    notFound: true
  }
];

// Legal notice prices, shown on the advertise page and in its structured data.
export const noticeRates = [
  { name: 'Fictitious Business Name (DBA)', price: 105, note: 'For a single owner/one business name. $145 more for corporations, LLCs, partnerships, and husband and wife (extra names $10 each).' },
  { name: 'Change of Name Petition', price: 425 },
  { name: 'Family Law (divorce)', price: 425 },
  { name: 'Trustee Sales' },
  { name: 'Court Summons', price: 425 },
  { name: 'Business Bulk Sale Transfer', price: 425 }
];

// Questions answered on the advertise page (also published as FAQPage data).
export const noticeFaq = [
  {
    q: 'What is a fictitious business name (DBA)?',
    a: "A fictitious business name, also called a DBA or “doing business as” name, is a business name that is different from the owner's legal name. In California you file a fictitious business name statement with the County Clerk, then publish it in a newspaper of general circulation."
  },
  {
    q: 'How much does it cost to publish a DBA in San Joaquin County?',
    a: 'Publishing a fictitious business name statement in the Linden Herald costs $105 for a single owner with one business name. Corporations, LLCs, partnerships, and husband and wife owners pay $145 more, and extra business names are $10 each. Proof of publication is included at no extra cost.'
  },
  {
    q: 'Can I publish my San Joaquin County legal notice in the Linden Herald?',
    a: 'Yes. The San Joaquin County Superior Court declared the Linden Herald a newspaper of general circulation in 1960 (Decree No. 72641). Most legal notices for businesses and residents anywhere in the county, including Stockton, Lodi, Tracy, Manteca and Lathrop, can be published here.'
  },
  {
    q: 'How long does a fictitious business name (DBA) statement run?',
    a: 'California law requires a fictitious business name statement to run once a week for four weeks in a row in a newspaper of general circulation in the county where the business is located. Publication should begin within 30 days after you file with the County Clerk.'
  },
  {
    q: 'How long does a name change notice run?',
    a: 'A change of name notice usually runs once a week for four weeks in a row before your court hearing date. Always follow the dates and instructions in your court order.'
  },
  {
    q: 'Do you file the proof of publication?',
    a: 'Yes, at no extra cost. When your notice has finished running, we file the Proof of Publication with the San Joaquin County Court or Recorder and send a copy to the petitioner or registrant.'
  },
  {
    q: 'How do I get started?',
    a: 'Call (209) 772-8854. Our phone is answered 24 hours a day, seven days a week. Have your filed statement or court order nearby, and we will walk you through the rest.'
  }
];
