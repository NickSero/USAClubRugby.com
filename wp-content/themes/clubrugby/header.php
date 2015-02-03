<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package USA Club Rugby
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('| EdwinTodd.com',true,'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/jquery.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/cssua.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/foundation.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/fastclick.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/modernizr.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/placeholder.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/jquery.mmenu.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/usacr/js/jquery.cookie.js"></script>
<script src="//use.typekit.net/ciz6rhj.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="main-wrapper" class="off-cavas-wrap" data-offcanvas>

		<div id="content-wrapper" class="inner-wrap">		

			<header id="masthead" class="site-header row" role="banner">

				<div id="mobile-header">

					<a id="mobile-menu-button" class="left-off-canvas-toggle" href="#">
						<span class="line line-1"></span>
						<span class="line line-2"></span>
						<span class="line line-3"></span>
					</a>

					<aside class="left-off-canvas-menu">
						<nav id="mobile-site-navigation" class="mobile-menu" role="navigation">
							<?php if (!dynamic_sidebar('Primary Menu')): ?>
								<?php wp_nav_menu( array('theme_location' => 'primary','id' => 'mobile-site-menu')); ?>
							<?php endif; ?>
						</nav><!-- #site-navigation -->
					</aside>
					
					<a class="exit-off-canvas">
						<span class="line line-1"></span>
		 				<span class="line line-2"></span>
						<span class="line line-3"></span>
					</a>

				</div>

				<div id="desktop-header">

					<div class="desktop-header-wrapper">

						<h1 class="site-branding right">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">EdwinTodd<span>.com</span></a>			
						</h1><!-- .site-branding -->

						<nav id="desktop-site-navigation" class="main-navigation" role="navigation">
							<?php if (!dynamic_sidebar('Primary Menu')): ?>
								<?php wp_nav_menu(array('theme_location' => 'primary','id' => 'site-menu','container_class' => 'button-group round even-5')); ?>
							<?php endif; ?>
						</nav><!-- #site-navigation -->

					</div>

				</div>
						
			</header><!-- #masthead -->

			<div id="content" class="row">
