<?php
/**
 * Front Page Template
 * @package Wordpress
 * @subpackage DC
 */
get_header(); ?>
<div id="content">
	<section id="home" class="fp-panel yellow">
		<div class="container">
			<div class="text">
				<h1>WE MIGRATE, DESIGN, AND DEVELOPE SIMPLE, FUNCTIONAL, AND TIMELESS WEBSITES.</h1>
				<h2><strong>DARK CANARY</strong> STUDIO</h2>
			</div>
			<img src="<?php echo get_template_directory_uri() ?>/img/canary.png"/>
		</div>
	</section>
	<section id="about" class="fp-panel black-pattern">
		<div class="container">
			<div class="text">
				<h1>ABOUT US</h1>
				<h2>WE ARE A TALENTED GROUP OF VISIONARIES THAT ENJOY CREATING SIMPLE, TASTEFUL, AND FUNCTIONAL WEBSITES. WE WORK HARD AND COMPLETE COMMISSIONS WITHIN REASONABLE TIMELINES. WE ASPIRE TO HELP SPREAD GOOD DESIGN TO HELP PEOPLE, BRANDS, AND COMPANIES. </h2>
			</div>
			<img src="<?php echo get_template_directory_uri() ?>/img/canary.png"/>
		</div>
	</section>
	<section id="about2" class="fp-panel gray-pattern">
		<div class="container">
			<div class="text">
				<h1>DATA MIGRATION / DESIGN / DEVELOPMENT</h1>
				<h2>We will migrate their existing content, help them set up their own hosting, instruct them on how to use a customized content management system, and, if need be, do an upgrade of their server/existing web services to include: email, web applications, servers</h2>
			</div>
			<img src="<?php echo get_template_directory_uri() ?>/img/canary.png"/>
		</div>
	</section>
	<section id="pricing" class="fp-panel yellow-pattern">
		<div class="container">
			<div class="text">
				<h1>PRICING</h1>
				<h2>WE CHARGE VARYING ON THE COMMISSION’S SCOPE AND REQUESTS. SUBMIT YOUR COMMISSION TO GET A QUOTE TODAY AT <a href="mailto:HELLO@DARKCANARY.COM" target="_top">HELLO@DARKCANARY.COM</a>.</h2>
			</div>
			<img src="<?php echo get_template_directory_uri() ?>/img/canary.png"/>
		</div>
	</section>
	<section id="contact" class="fp-panel black-pattern">
		<div class="container">
			<h1>CONTACT US AT <a href="mailto:HELLO@DARKCANARY.COM" target="_top">HELLO@DARKCANARY.COM</a></h1>
		</div>
	</section>
</div><?php
get_footer();