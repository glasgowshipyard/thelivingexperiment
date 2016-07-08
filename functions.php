<?php
/**
 * The Living Experiment functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Living_Experiment
 */

if ( ! function_exists( 'thelivingexperiment_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thelivingexperiment_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Living Experiment, use a find and replace
	 * to change 'thelivingexperiment' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'thelivingexperiment', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary', 'thelivingexperiment' ),
		'social' 	=> esc_html__( 'Social Menu', 'thelivingexperiment')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thelivingexperiment_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'thelivingexperiment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thelivingexperiment_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thelivingexperiment_content_width', 1280 );
}
add_action( 'after_setup_theme', 'thelivingexperiment_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thelivingexperiment_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Subscribe Widget', 'thelivingexperiment' ),
		'id'            => 'subscribe',
		'description'   => esc_html__( 'Add or edit subscribe copy here.', 'thelivingexperiment' ),
		'before_widget' => '<div id="openSubscribe" class="modalDialog">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="modal-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Widget', 'thelivingexperiment' ),
		'id'            => 'contact',
		'description'   => esc_html__( 'Add or edit contact  form copy here.', 'thelivingexperiment' ),
		'before_widget' => '<div id="openContact" class="modalDialog">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="modal-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'thelivingexperiment' ),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'thelivingexperiment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'thelivingexperiment_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thelivingexperiment_scripts() {
	wp_enqueue_style( 'thelivingexperiment-style', get_stylesheet_uri() );

	wp_enqueue_script( 'thelivingexperiment-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_style( 'thelivingexperiment-google-fonts', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|Pathway+Gothic+One|Rokkitt');
	
	wp_enqueue_style('thelivingexperiment-fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css', true );

	wp_enqueue_script( 'thelivingexperiment-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'thelivingexperiment-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'thelivingexperiment-fade', get_template_directory_uri() . '/js/fade.js', array('jquery'), '20160707', true );


	
//	wp_enqueue_script( 'thelivingexperiment-fade-title', get_template_directory_uri() . '/js/fade.js', array(), '20160624', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thelivingexperiment_scripts' );

/**
 * Create episode from post number in Podcast Episode category.
 */
 
function Get_Post_Number($postID){
	$temp_query = $wp_query;
	$postNumberQuery = new WP_Query(array ( 'orderby' => 'date', 'order' => 'ASC', 'post_type' => 'any','category_name' => 'podcast-episodes', 'posts_per_page' => '-1' ));
	$counter = 1;
	$postCount = 0;
	if($postNumberQuery->have_posts()) :
	    while ($postNumberQuery->have_posts()) : $postNumberQuery->the_post();
	        if ($postID == get_the_ID()){
	            $postCount = $counter;
	        } else {
	            $counter++;
	        }
	endwhile; endif;
	wp_reset_query();
	$wp_query = $temp_query;
	wp_reset_postdata();
	return $postCount;
}

/**
 * Create shortcode to display Episode count.
 */
 
function episodeNo() {
			$epID = get_the_ID();
		$epNumber = Get_Post_Number($epID);
		echo 'EPISODE ' . $epNumber;
		}
add_shortcode('episode','episodeNo');

// First, make sure Jetpack doesn't concatenate all its CSS
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

// Then, remove each CSS file, one at a time
function thelivingexperiment_remove_all_jp_css() {
	wp_deregister_style( 'sharedaddy' ); // Sharedaddy
	wp_deregister_style( 'grunion.css' ); // Grunion contact form
}
add_action('wp_print_styles', 'thelivingexperiment_remove_all_jp_css' );

function jptweak_remove_share() {
    if ( is_page( 189 ) ) {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
      }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
