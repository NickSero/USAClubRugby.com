<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package USA Club Rugby
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?> data-offcanvas>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('| USAClubRdugby.com',true,'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
date_default_timezone_set('UTC');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: ".gmdate("D, d M Y H:i:s"));
header("X-UA-Compatible: IE=edge");
?>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/cssua.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/fastclick.js"></script>
<script> jQuery(function($){FastClick.attach(document.body)}); </script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/modernizr.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/clubrugby/js/jquery.fittext.js"></script>
<script src="//use.typekit.net/ebu2luj.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class('inner-wrap'); ?>>
		<header id="masthead" class="site-header" role="banner">

			<div id="mobile-header" class="small-12">
					
				<section class="site-branding">

					<a id="mobile-menu-button" class="left-off-canvas-toggle small-2" href="#mobile-site-navigation">
						<span class="line line-1"></span>
						<span class="line line-2"></span>
						<span class="line line-3"></span>
					</a>

					<figure class="right small-10">
						<div id="logo-holder">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<img id="shield" class="small-1" src="/usaclubrugby.com/wp-content/themes/clubrugby/img/logo-shield.png" />
								<img id="text" class="small-9" src="/usaclubrugby.com/wp-content/themes/clubrugby/img/club-text.png" />
							</a>			
						</div>					
					</figure>

				</section>

				<section class="mobile-menu">
					<aside id="mobile-site-navigation" class="left-off-canvas-menu" role="navigation">
						<?php wp_nav_menu( array('theme_location' => 'main','menu_id' => 'mobile-site-menu','menu_class' => 'menu off-canvas-list')); ?>
					</aside>
				</section>
				
				<a class="exit-off-canvas"></a>

			</div>

			<div id="desktop-header" class="medium-12 large-12">

				<div class="desktop-header-wrapper">

					<figure class="site-branding">

						<center>
							<div id="logo-holder">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
									<!-- img id="logo" src="/usaclubrugby.com/wp-content/themes/clubrugby/img/club-logo-web-horizontal.png" / -->
									<img id="shield" class="small-1" src="/usaclubrugby.com/wp-content/themes/clubrugby/img/logo-shield.png" />
									<img id="text" class="small-3" src="/usaclubrugby.com/wp-content/themes/clubrugby/img/club-text.png" />
								</a>
							</div>
						</center>			
					
					</figure>

					<nav id="desktop-site-navigation" class="main-navigation" role="navigation">
						<section class="button-bar">
							<?php
								wp_nav_menu(array('theme_location' => 'main','menu_id' => 'site-menu','menu_class' => 'button-group even-10','container' => false));
//								wp_nav_menu('theme_location=news&container=false');
//								wp_nav_menu('theme_location=clubs&container=false');
//								wp_nav_menu('theme_location=schedules&container=false');
//								wp_nav_menu('theme_location=standings&container=false');
//								wp_nav_menu('theme_location=statistics&container=false');
//								wp_nav_menu('theme_location=championships&container=false');
//								wp_nav_menu('theme_location=social&container=false');
								wp_nav_menu('theme_location=administration&container=false');
								wp_nav_menu('theme_location=resources&container=false');
								wp_nav_menu('theme_location=about&container=false');									
							?>
						</section>
					</nav>

				</div>

			</div>
					
		</header>

		<div id="main-wrapper">

			<div id="content-wrapper">		

				<main id="content" class="row small-12 medium-12 large-12" role="main">
