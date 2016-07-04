<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Living_Experiment
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="navbar">
	<h1 class="site-wordmark"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="the">The</span><?php bloginfo( 'name' ); ?></a></h1>
			<nav id="site-navigation" class="main-navigation" role="navigation"><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span></span><?php esc_html_e( 'Primary Menu', 'thelivingexperiment' ); ?></button><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
<span  class="search-toggle"><i class="fa fa-search"></i><a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'thelivingexperiment' ); ?></a></span>
			</nav>
			<?php thelivingexperiment_social_menu(); ?>
			<div id="header-search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
			</div>
</div>
<div class="behold">
		<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'thelivingexperiment' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">	
		<?php if ( is_front_page()) : ?>
		<div class="glass-promontory">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="the">The</div><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p></div></div>
					<div class="header-image">
					<?php if ( get_header_image() ) : ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" alt=""></a>
					<?php endif; // End header image check. ?>
		</div>
		<?php endif; // End header image check. ?>
		<?php endif; // End front page check. ?>
			</div><!-- .site-branding -->
	</header><!-- #masthead -->
		<?php if ( dynamic_sidebar('subscribe') ) : else : endif; ?>
		<?php if ( dynamic_sidebar('contact') ) : else : endif; ?>
	<div id="content" class="site-content">
