<?php
/**
 * Header Template
 *
 * @package Wordpress
 * @subpackage DC
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
	<head>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
        <meta name="author" content="Tori Holcomb" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php bloginfo('name'); wp_title( '|', true, 'left' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/ico/favicon.ico ?>" type="image/x-icon" /><?php
        wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    	<header id="primary">
    		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="row">
						<div class="navbar-brand navbar-left">
							<?php bloginfo( 'name' ); ?>
						</div>
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-right" id="nav">
							<ul class="nav navbar-nav">
								<li><a href="#home">Home</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#pricing">Pricing</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
	                </div>
				</div><!-- /.container-fluid -->
			</nav>
    	</header>