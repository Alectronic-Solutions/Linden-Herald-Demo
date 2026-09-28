<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Site and custom code by Larry Made - http://www.larrymade.com

Layout by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : OffRecord 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20100705

-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Contact Us</title>
        <meta name="description" content="Contact the Linden Herald for news tips, subscriptions, display advertising and legal notices. Call (209) 772-8854 or send a message." />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="refinements.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="site.js"></script>
    </head>
    <body>
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
                    <li><a href="index.php" class="first">Home</a></li>
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
                    <li class="current_page_item"><a aria-current="page" href="contact.php">Contact</a></li>
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
                        <p class="eyebrow">We would like to hear from you</p>
                        <h1 class="title">Contact the Linden Herald</h1>
        				<div class="entry">
                            <p class="lead">Your news, questions and comments are welcome.</p>
                            <p>Get in touch for news tips, subscriptions, legal notices or display advertising. We will answer the phone or return your call as soon as we can.</p>
                            <div class="contact-details">
                                <div><h2>Give us a call</h2><a class="contact-number" href="tel:+12097728854">(209) 772-8854</a><p>Our phone line is available 24 hours, seven days a week.</p></div>
                                <div><h2>Write to us</h2><address><strong>Linden Herald</strong><br />PO Box 929<br />Linden, CA 95236</address></div>
                            </div>
                            <form action="contact.php" method="post">
                                <fieldset>
                                    <legend>Send a Message</legend>
                                    <div class="form-field">
                                        <label for="lhname">Name</label>
                                        <input type="text" name="lhname" id="lhname" maxlength="40" autocomplete="name" />
                                    </div>
                                    <div class="form-field">
                                        <label for="lhemail">Email</label>
                                        <input type="email" name="lhemail" id="lhemail" maxlength="60" autocomplete="email" />
                                    </div>
                                    <div class="form-field">
                                        <label for="lhphone">Phone</label>
                                        <input type="tel" name="lhphone" id="lhphone" maxlength="20" autocomplete="tel" />
                                    </div>
                                    <div class="form-field">
                                        <label for="message4lh">Message</label>
                                        <textarea name="message4lh" id="message4lh" rows="8"></textarea>
                                    </div>
                                    <button type="submit">Send message</button>
                                </fieldset>
                            </form>
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
                    <aside class="sidebar-card" aria-label="Subscribe and advertise">
                    <div class="sidebar-section">
                        <h2>Get the Herald every week</h2>
                        <p class="sidebar-price"><strong>$42</strong> for 52 issues</p>
                        <a class="button button-block" href="subscribe.php">Subscribe</a>
                    </div>
                    <div class="sidebar-section">
                        <h2>Advertise or place a notice</h2>
                        <p>Legal notices from </figure>05. Display advertising rates on request.</p>
                        <a class="sidebar-phone" href="tel:+12097728854"><svg class="icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.6a1 1 0 0 1-.25 1z" fill="currentColor"/></svg>Call (209) 772-8854</a>
                    </div>
                    </aside>
        		</div>
        		<!-- end #sidebar -->
        		<div class="layout-clear" aria-hidden="true">&nbsp;</div>
        	</div>
        	<!-- end #page -->
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
