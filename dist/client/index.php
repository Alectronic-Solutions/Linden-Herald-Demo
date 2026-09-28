<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : OffRecord 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20100705

adapted for lindenherald.com by Larry Anderson - larry@portcommodore.com

-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Linden Herald Home Page</title>
        <meta name="description" content="Serving Linden and San Joaquin County since 1959. Explore subscriptions, local advertising, legal notices and past issues of the Linden Herald." />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="refinements.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="site.js"></script>
    </head>
    <body class="home-page">
        <a class="skip-link" href="#page">Skip to content</a>
        <!-- end #header-wrapper -->
        <header id="header">
            <div class="masthead-inner">
                <div id="logo">
                    <p class="masthead-name"><a href="index.php">Linden Herald</a></p>
                    <p><em>serving San Joaquin County since 1959</em></p>
                </div>
                <p class="publication-note"><span>Linden, California</span><span>Published weekly</span></p>
            </div>
        </header>
        <nav id="menu" aria-label="Main navigation">
            <div class="menu-bar">
                <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="menu-links"><span class="menu-icon" aria-hidden="true"></span>Menu</button>
                <ul class="menu-links" id="menu-links">
                    <li class="current_page_item"><a aria-current="page" href="index.php" class="first">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li class="has-dropdown">
                        <a href="advertise.php">Advertise</a>
                        <button class="submenu-toggle" type="button" aria-expanded="false" aria-controls="advertise-menu"><span class="visually-hidden">Show advertising pages</span><span class="caret" aria-hidden="true"></span></button>
                        <ul class="dropdown" id="advertise-menu">
                            <li><a href="advertise.php#legal-notices">Legal notices &amp; rates</a></li>
                            <li><a href="advertise.php#display-advertising">Display advertising</a></li>
                        </ul>
                    </li>
                    <li><a href="archive.php">Archive</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="menu-actions">
                    <a class="menu-subscribe" href="subscribe.php">Subscribe</a>
                    <a class="menu-phone" href="tel:+12097728854"><svg class="icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z" fill="currentColor"/></svg><span class="menu-phone-label">Call</span><span class="menu-phone-number">(209) 772-8854</span></a>
                </div>
            </div>
        </nav>
        <!-- end #header -->
        <hr />
        <main id="page" tabindex="-1">
        	<div id="page-bgtop">
        		<div id="content">
        			<div class="post">
                        <p class="eyebrow">Your community newspaper</p>
                        <h1 class="title">Welcome to the Linden Herald</h1>
        				<div class="entry">
                            <p class="lead">Local stories. Familiar faces. A community connected.</p>
                            <p>Established in 1959 in the farming community of Linden, the Linden Herald is your weekly newspaper for San Joaquin County.</p>
                            <p>From local news, sports and agriculture to schools, community photographs and public notices, we cover the people and places that make this community home.</p>
                            <div class="page-actions">
                                <a class="button" href="subscribe.php">Subscribe to the Herald<span aria-hidden="true">&rarr;</span></a>
                                <a class="text-link" href="#services">Explore our services<span aria-hidden="true">&darr;</span></a>
                            </div>
        				</div>
        			</div>
        		</div>
        		<!-- end #content -->
        		<div id="sidebar">
        			<figure class="newspaper">
                        <div class="newspaper-frame"><img src="images/lindenpg1.png" alt="Linden Herald newspaper front page" width="296" height="486" /></div>
                        <figcaption class="edition-caption">
                            <span>A look inside the Herald</span>
                            <a href="archive.php">Browse the archive</a>
                        </figcaption>
                    </figure>
        		</div>
        		<!-- end #sidebar -->
        		<div class="layout-clear" aria-hidden="true">&nbsp;</div>
        	</div>
        	<!-- end #page -->

            <ul class="trust-strip" aria-label="About the newspaper">
                <li>Established 1959</li>
                <li>Published weekly</li>
                <li>Adjudicated newspaper of general circulation</li>
                <li>Phone answered 24 hours a day</li>
            </ul>

            <section class="home-services" id="services" aria-labelledby="services-title">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow">At your service</p>
                        <h2 id="services-title">A local paper. Here for you.</h2>
                    </div>
                    <p><span class="service-lede-line">Read, reach your neighbors, or place a notice.</span> Questions? Call <a href="tel:+12097728854">(209) 772-8854</a>.</p>
                </div>
                <div class="service-grid">
                    <article class="service-item service-featured">
                        <svg class="service-art" viewBox="0 0 80 80" width="80" height="80" aria-hidden="true" focusable="false"><defs><radialGradient id="np-sh"><stop offset="0" stop-color="#003333" stop-opacity=".35"/><stop offset="1" stop-color="#003333" stop-opacity="0"/></radialGradient><linearGradient id="np-pg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#ece5d2"/></linearGradient><linearGradient id="np-mh" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0b8079"/><stop offset="1" stop-color="#003f3f"/></linearGradient><linearGradient id="np-ph" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#bfe3dd"/><stop offset="1" stop-color="#7fbfb5"/></linearGradient><linearGradient id="np-cl" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#d6ceb6"/><stop offset=".55" stop-color="#fffdf6"/><stop offset="1" stop-color="#e9e2cc"/></linearGradient></defs><ellipse cx="40" cy="72" rx="28" ry="5" fill="url(#np-sh)"/><path d="M20 17h42a3 3 0 0 1 3 3v46a3 3 0 0 1-3 3H20z" fill="#b9b19a"/><path d="M18 15h42a3 3 0 0 1 3 3v46a3 3 0 0 1-3 3H18z" fill="#d9d1ba"/><path d="M16 13a3 3 0 0 1 3-3h39a3 3 0 0 1 3 3v37l-14 14H19a3 3 0 0 1-3-3z" fill="url(#np-pg)"/><rect x="21" y="15" width="35" height="9" rx="1.5" fill="url(#np-mh)"/><rect x="25" y="18.5" width="27" height="2" rx="1" fill="#fff" opacity=".85"/><rect x="21" y="28" width="16" height="13" rx="1.5" fill="url(#np-ph)"/><path d="M21 41l6-6 4 4 3-3 3 5z" fill="#005555" opacity=".55"/><circle cx="33" cy="31.5" r="1.8" fill="#fff" opacity=".9"/><g fill="#9aa9a4"><rect x="40" y="28" width="16" height="2" rx="1"/><rect x="40" y="32" width="16" height="2" rx="1"/><rect x="40" y="36" width="12" height="2" rx="1"/><rect x="21" y="45" width="35" height="2" rx="1"/><rect x="21" y="49" width="30" height="2" rx="1"/><rect x="21" y="53" width="24" height="2" rx="1"/><rect x="21" y="57" width="18" height="2" rx="1"/></g><path d="M61 50L47 64c1-6 3-11 14-14z" fill="url(#np-cl)"/><path d="M61 50L47 64c1-6 3-11 14-14z" fill="none" stroke="#c9c0a6" stroke-width=".6"/><path d="M19 11h38" stroke="#fff" stroke-width="1.2" stroke-linecap="round" opacity=".9"/></svg>
                        <p class="service-category">Delivered weekly</p>
                        <h3><a href="subscribe.php">Subscriptions</a></h3>
                        <p class="service-figure"><strong>$42</strong> <span>for 52 issues</span></p>
                        <p>Stay connected to Linden with a year of local news, delivered by mail.</p>
                        <a class="button" href="subscribe.php">Subscribe<span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item">
                        <svg class="service-art" viewBox="0 0 80 80" width="80" height="80" aria-hidden="true" focusable="false"><defs><radialGradient id="mg-sh"><stop offset="0" stop-color="#003333" stop-opacity=".35"/><stop offset="1" stop-color="#003333" stop-opacity="0"/></radialGradient><linearGradient id="mg-cone" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#23a197"/><stop offset=".45" stop-color="#005f5c"/><stop offset="1" stop-color="#002b2b"/></linearGradient><linearGradient id="mg-back" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fffdf6"/><stop offset="1" stop-color="#cfc6ab"/></linearGradient><linearGradient id="mg-rim" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#e9e2cc"/><stop offset="1" stop-color="#fffdf6"/></linearGradient><radialGradient id="mg-in" cx=".35" cy=".5" r=".7"><stop offset="0" stop-color="#001f1f"/><stop offset="1" stop-color="#005555"/></radialGradient><linearGradient id="mg-hd" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#003f3f"/><stop offset="1" stop-color="#0b6f69"/></linearGradient></defs><ellipse cx="40" cy="72" rx="28" ry="5" fill="url(#mg-sh)"/><path d="M24 45l4 16a3 3 0 0 0 3 2.3h3.5a2 2 0 0 0 1.9-2.6L32 47z" fill="url(#mg-hd)"/><path d="M22 29L52 14v48L22 47z" fill="url(#mg-cone)"/><path d="M23 30.5L51 16.5" stroke="#fff" stroke-width="1.6" stroke-linecap="round" opacity=".45"/><rect x="12" y="28" width="13" height="20" rx="4" fill="url(#mg-back)"/><rect x="12" y="28" width="13" height="20" rx="4" fill="none" stroke="#b5ac90" stroke-width=".8"/><rect x="14.5" y="31" width="2.5" height="14" rx="1.25" fill="#fff" opacity=".8"/><ellipse cx="52" cy="38" rx="7.5" ry="24" fill="url(#mg-rim)"/><ellipse cx="52.5" cy="38" rx="5" ry="20.5" fill="url(#mg-in)"/><g fill="none" stroke="#0b8079" stroke-width="2.6" stroke-linecap="round"><path d="M64 30a11 11 0 0 1 0 16" opacity=".9"/><path d="M69.5 24.5a19 19 0 0 1 0 27" opacity=".5"/></g></svg>
                        <p class="service-category">Reach local readers</p>
                        <h3><a href="advertise.php#display-advertising">Display advertising</a></h3>
                        <p class="service-figure"><span>About</span> <strong>5,000</strong> <span>residents in the Linden area</span></p>
                        <p>Put your business in the community paper. Get in touch for advertising rates.</p>
                        <a class="button" href="advertise.php#display-advertising">Place an ad<span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item service-featured">
                        <svg class="service-art" viewBox="0 0 80 80" width="80" height="80" aria-hidden="true" focusable="false"><defs><radialGradient id="ln-sh"><stop offset="0" stop-color="#003333" stop-opacity=".35"/><stop offset="1" stop-color="#003333" stop-opacity="0"/></radialGradient><linearGradient id="ln-pg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#ece5d2"/></linearGradient><linearGradient id="ln-fold" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="#fffdf6"/><stop offset="1" stop-color="#cfc6ab"/></linearGradient><radialGradient id="ln-seal" cx=".35" cy=".3" r=".75"><stop offset="0" stop-color="#f3dc9a"/><stop offset=".55" stop-color="#c79a45"/><stop offset="1" stop-color="#8a6322"/></radialGradient><linearGradient id="ln-rb" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0b8079"/><stop offset="1" stop-color="#003333"/></linearGradient></defs><ellipse cx="40" cy="72" rx="28" ry="5" fill="url(#ln-sh)"/><path d="M21 13h28l12 12v42a3 3 0 0 1-3 3H24a3 3 0 0 1-3-3z" fill="#c9c1a8" transform="translate(3 2)"/><path d="M19 13a3 3 0 0 1 3-3h27l12 12v42a3 3 0 0 1-3 3H22a3 3 0 0 1-3-3z" fill="url(#ln-pg)"/><path d="M49 10v9a3 3 0 0 0 3 3h9z" fill="url(#ln-fold)"/><path d="M49 22l12 0-12-12" fill="none" stroke="#c9c0a6" stroke-width=".6"/><rect x="25" y="17" width="18" height="3" rx="1.5" fill="#005555"/><g fill="#9aa9a4"><rect x="25" y="26" width="30" height="2" rx="1"/><rect x="25" y="30.5" width="30" height="2" rx="1"/><rect x="25" y="35" width="26" height="2" rx="1"/><rect x="25" y="39.5" width="30" height="2" rx="1"/><rect x="25" y="44" width="16" height="2" rx="1"/></g><path d="M29 57c3-3 5 1 8-2" fill="none" stroke="#005555" stroke-width="1.4" stroke-linecap="round"/><path d="M44 60l-4 12 5-3 3 4 2-11zM56 60l4 12-5-3-3 4-2-11z" fill="url(#ln-rb)"/><circle cx="50" cy="56" r="10.5" fill="url(#ln-seal)"/><circle cx="50" cy="56" r="7.5" fill="none" stroke="#f7e7b6" stroke-width="1" opacity=".75"/><path d="M46.5 56.2l2.4 2.4 4.8-5" fill="none" stroke="#6b4a14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M44 51.5a8 8 0 0 1 6-3.5" fill="none" stroke="#fff" stroke-width="1.4" stroke-linecap="round" opacity=".6"/><path d="M22 11.5h25" stroke="#fff" stroke-width="1.2" stroke-linecap="round" opacity=".9"/></svg>
                        <p class="service-category">Public notices</p>
                        <h3><a href="advertise.php#legal-notices">Legal notices</a></h3>
                        <p class="service-figure"><span>From</span> <strong>$105</strong></p>
                        <p>Business names, name changes, family law and summons. Proof of publication filed at no cost.</p>
                        <a class="button" href="advertise.php#legal-notices">See notice rates<span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item">
                        <svg class="service-art" viewBox="0 0 80 80" width="80" height="80" aria-hidden="true" focusable="false"><defs><radialGradient id="ar-sh"><stop offset="0" stop-color="#003333" stop-opacity=".35"/><stop offset="1" stop-color="#003333" stop-opacity="0"/></radialGradient><linearGradient id="ar-front" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#0b7a74"/><stop offset="1" stop-color="#004444"/></linearGradient><linearGradient id="ar-side" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#005050"/><stop offset="1" stop-color="#002626"/></linearGradient><linearGradient id="ar-lid" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#2aa89d"/><stop offset="1" stop-color="#006461"/></linearGradient><linearGradient id="ar-top" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#6cc8bd"/><stop offset="1" stop-color="#1c948b"/></linearGradient><linearGradient id="ar-pg" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#e3dcc5"/></linearGradient></defs><ellipse cx="40" cy="72" rx="28" ry="5" fill="url(#ar-sh)"/><rect x="19" y="16" width="28" height="24" rx="1.5" fill="url(#ar-pg)" transform="rotate(-6 33 28)"/><rect x="29" y="13" width="27" height="27" rx="1.5" fill="url(#ar-pg)" transform="rotate(6 42 27)"/><g transform="rotate(6 42 27)"><rect x="33" y="17" width="19" height="3" rx="1.2" fill="#005555"/><rect x="33" y="23" width="19" height="1.8" rx=".9" fill="#9aa9a4"/><rect x="33" y="27" width="14" height="1.8" rx=".9" fill="#9aa9a4"/></g><path d="M62 36l7-5v28l-7 6z" fill="url(#ar-side)"/><rect x="13" y="36" width="49" height="29" rx="2" fill="url(#ar-front)"/><rect x="29" y="44" width="17" height="10" rx="1.5" fill="#fbf7ec"/><rect x="29" y="44" width="17" height="10" rx="1.5" fill="none" stroke="#c9c0a6" stroke-width=".8"/><rect x="32" y="47" width="11" height="1.8" rx=".9" fill="#005555"/><rect x="32" y="50.2" width="7" height="1.6" rx=".8" fill="#9aa9a4"/><rect x="31" y="58" width="13" height="3" rx="1.5" fill="#002b2b"/><g transform="rotate(-24 10 31)"><path d="M16 22h48l6-5H22z" fill="url(#ar-top)"/><path d="M64 22l6-5v8l-6 5z" fill="#004a4a"/><rect x="10" y="22" width="54" height="9" rx="1.5" fill="url(#ar-lid)"/><path d="M12 23.5h50" stroke="#fff" stroke-width="1.2" stroke-linecap="round" opacity=".5"/></g></svg>
                        <p class="service-category">Explore past issues</p>
                        <h3><a href="archive.php">Newspaper archive</a></h3>
                        <p class="service-figure"><strong>Free</strong> <span>to read online</span></p>
                        <p>Revisit local stories and community news with past editions available as PDFs.</p>
                        <a class="button button-secondary" href="archive.php">Read past issues<span aria-hidden="true">&rarr;</span></a>
                    </article>
                </div>
            </section>

            <section class="advertise-band" aria-labelledby="advertise-band-title">
                <div>
                    <h2 id="advertise-band-title">Promote your business or place a legal notice.</h2>
                    <p><span class="service-lede-line">A newspaper of general circulation since 1960.</span> We file your proof of publication with San Joaquin County at no cost.</p>
                </div>
                <div class="advertise-band-actions">
                    <a class="button button-light" href="tel:+12097728854">Call (209) 772-8854</a>
                    <a class="button button-outline-light" href="contact.php">Send us a message</a>
                </div>
            </section>

            <section class="community-note" aria-labelledby="community-title">
                <div>
                    <p class="eyebrow">In print. In the community.</p>
                    <h2 id="community-title">Linden's stories, since 1959.</h2>
                    <p><span class="service-lede-line">Our correspondents live and work here.</span> The Herald brings a local perspective to agriculture, schools, sports, history and everyday life in San Joaquin County.</p>
                    <a class="text-link" href="about.php">Get to know the Herald<span aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="community-contact">
                    <h3>Have a story to share?</h3>
                    <p>We welcome news tips, community photographs and comments from our readers.</p>
                    <a class="text-link" href="contact.php">Contact the Herald<span aria-hidden="true">&rarr;</span></a>
                    <a class="contact-number" href="tel:+12097728854">(209) 772-8854</a>
                </div>
            </section>
        </main>
        <footer id="footer">
            <div class="footer-inner">
                <div class="footer-identity">
                    <a class="footer-brand" href="index.php">Linden Herald</a>
                    <p class="footer-tagline">Serving San Joaquin County since 1959.</p>
                    <p>Linden&rsquo;s weekly community newspaper: local news, sports, agriculture, schools and public notices.</p>
                    <p class="footer-legal">Adjudicated newspaper of general circulation, San Joaquin County Superior Court Decree No. 72641.</p>
                </div>
                <nav class="footer-column" aria-label="Services">
                    <h2 class="footer-heading">Services</h2>
                    <ul class="footer-links">
                        <li><a href="subscribe.php">Subscribe</a></li>
                        <li><a href="advertise.php#display-advertising">Display advertising</a></li>
                        <li><a href="advertise.php#legal-notices">Legal notices</a></li>
                        <li><a href="archive.php">Newspaper archive</a></li>
                    </ul>
                </nav>
                <nav class="footer-column" aria-label="The Herald">
                    <h2 class="footer-heading">The Herald</h2>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="index.php#services">Our services</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                    </ul>
                </nav>
                <div class="footer-contact">
                    <h2 class="footer-heading">Contact us</h2>
                    <address>Linden Herald<br />PO Box 929<br />Linden, CA 95236</address>
                    <a class="footer-phone" href="tel:+12097728854"><svg class="icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z" fill="currentColor"/></svg>(209) 772-8854</a>
                    <p class="footer-hours">Phone answered 24 hours,<br>7 days a week.</p>
                    <p><a href="contact.php">Send us a message</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Linden Herald. All rights reserved.</p>
                <p>Linden, California &middot; Published weekly</p>
                <a class="back-to-top" href="#header">Back to top <span aria-hidden="true">&uarr;</span></a>
            </div>
            <div class="footer-credit">
                <p>Website designed by <a href="https://alectronicsolutions.com" target="_blank" rel="noopener">Alectronic Solutions<span class="visually-hidden"> (opens in a new tab)</span></a></p>
            </div>
        </footer>
        <!-- end #footer -->
    </body>
</html>
