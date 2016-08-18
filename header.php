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
	<?php	if ( !is_front_page() && !is_mobile() ) : ?><h1 id="site-wordmark" class="slideInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="the">The</span><span class="livingexperiment">
	<?php bloginfo( 'name' ); ?></span></a></h1>
	<?php else : ?>
	<span id="social-header"><?php thelivingexperiment_social_menu(); ?></span>
	<?php endif; // End header image check. ?>	
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span></span></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
<span class="search-toggle"><a href="#search"><i class="fa fa-search"></i></a></span>
			</nav>
			<div id="search" class="search-box-wrapper">
			<div class="search-box">
				<?php get_search_form(); ?><a href="#" class="shut">close</a>
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
		</div></header>
		<?php endif; // End header image check. ?>
		<?php endif; // End front page check. ?>
			</div><!-- .site-branding -->
	</header><!-- #masthead -->
		<?php if ( dynamic_sidebar('subscribe') ) : else : endif; ?>
		<?php if ( dynamic_sidebar('contact') ) : else : endif; ?>
		<?php if ( dynamic_sidebar('newsletter') ) : else : endif; ?>
	<div id="content" class="site-content">
