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
                            <li><a href="advertise.php#display-advertising">Display advertising</a></li>
                            <li><a href="advertise.php#legal-notices">Legal notices &amp; rates</a></li>
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
                                <a class="button" href="subscribe.php">Subscribe to the Herald <span aria-hidden="true">&rarr;</span></a>
                                <a class="text-link" href="#services">Explore our services <span aria-hidden="true">&darr;</span></a>
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
                    <p>Read, reach your neighbors, or place a notice. Questions? Call <a href="tel:+12097728854">(209) 772-8854</a>.</p>
                </div>
                <div class="service-grid">
                    <article class="service-item service-featured">
                        <svg class="service-icon" viewBox="0 0 24 24" width="36" height="36" aria-hidden="true" focusable="false"><path d="M4 5h13v14H6a2 2 0 0 1-2-2zM17 8h3v9a2 2 0 0 1-2 2M7 9h7M7 12h7M7 15h4"/></svg>
                        <p class="service-category">Delivered weekly</p>
                        <h3><a href="subscribe.php">Subscriptions</a></h3>
                        <p class="service-figure"><strong>$42</strong> <span>for 52 issues</span></p>
                        <p>Stay connected to Linden with a year of local news, delivered by mail.</p>
                        <a class="button" href="subscribe.php">Subscribe <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item">
                        <svg class="service-icon" viewBox="0 0 24 24" width="36" height="36" aria-hidden="true" focusable="false"><path d="M3 10v4h3l8 4V6l-8 4zM6 14l1.5 5h3L9 15.5M17.5 9a4 4 0 0 1 0 6"/></svg>
                        <p class="service-category">Reach local readers</p>
                        <h3><a href="advertise.php#display-advertising">Display advertising</a></h3>
                        <p class="service-figure"><span>About</span> <strong>5,000</strong> <span>residents in the Linden area</span></p>
                        <p>Put your business in the community paper. Get in touch for advertising rates.</p>
                        <a class="button" href="advertise.php#display-advertising">Place an ad <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item service-featured">
                        <svg class="service-icon" viewBox="0 0 24 24" width="36" height="36" aria-hidden="true" focusable="false"><path d="M6 3h9l4 4v14H6zM14 3v5h5M9 12h7M9 15h7M9 18h4"/></svg>
                        <p class="service-category">Public notices</p>
                        <h3><a href="advertise.php#legal-notices">Legal notices</a></h3>
                        <p class="service-figure"><span>From</span> <strong>$105</strong></p>
                        <p>Business names, name changes, family law and summons. Proof of publication filed at no cost.</p>
                        <a class="button" href="advertise.php#legal-notices">See notice rates <span aria-hidden="true">&rarr;</span></a>
                    </article>
                    <article class="service-item">
                        <svg class="service-icon" viewBox="0 0 24 24" width="36" height="36" aria-hidden="true" focusable="false"><path d="M3 4h18v4H3zM5 8v12h14V8M10 12h4"/></svg>
                        <p class="service-category">Explore past issues</p>
                        <h3><a href="archive.php">Newspaper archive</a></h3>
                        <p class="service-figure"><strong>Free</strong> <span>to read online</span></p>
                        <p>Revisit local stories and community news with past editions available as PDFs.</p>
                        <a class="button button-secondary" href="archive.php">Read past issues <span aria-hidden="true">&rarr;</span></a>
                    </article>
                </div>
            </section>

            <section class="advertise-band" aria-labelledby="advertise-band-title">
                <div>
                    <h2 id="advertise-band-title">Promote your business or place a legal notice.</h2>
                    <p>A newspaper of general circulation since 1960. We file your proof of publication with San Joaquin County at no cost.</p>
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
                    <p>Our correspondents live and work here. The Herald brings a local perspective to agriculture, schools, sports, history and everyday life in San Joaquin County.</p>
                    <a class="text-link" href="about.php">Get to know the Herald <span aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="community-contact">
                    <h3>Have a story to share?</h3>
                    <p>We welcome news tips, community photographs and comments from our readers.</p>
                    <a class="text-link" href="contact.php">Contact the Herald <span aria-hidden="true">&rarr;</span></a>
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
                    <p class="footer-hours">Phone answered 24 hours, seven days a week.</p>
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
