<?php
/**
 * Template Name: About
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Living_Experiment
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id=auth>
			<?php
			while ( have_posts() ) : the_post();
			 if (has_post_thumbnail() ) { ?>
			 <?php the_post_thumbnail('large', array('class' => 'about-image')); ?><?php }
			endwhile; // End of the loop.
			?>
			<div id="#aboot"><?php get_template_part( 'template-parts/content', 'page' ); ?></div>

<?php
$args = array(
	'include' => array( 1, 2)
	);
// The Query
$user_query = new WP_User_Query( $args );

// User Loop

if ( ! empty( $user_query->results ) ) {
	
	?><h2 class="about-title">About Dallas and Pilar</h2><?php
	echo '<div id="greyjoy" class="author-about">';
	echo '<div id="about" class="section group">';
	foreach ( $user_query->results as $user ) {
		echo '<div id="auth" class="col span_1_of_2">';
		echo '<div class="author-bio">';
		echo '<div class="author-info">';
		echo '<h1 class="author-title">' . $user->first_name . ' ' . $user->last_name . '</h1>';
		echo '<div id="author-social" class="author-social">';
		echo '<ul id="author-social-items" class="author-items">';
		echo '<li class="author-item"><a href="' . esc_url($user->instagram_profile) . '" target="_blank"></a></li>';
		echo '<li class="author-item"><a href="' . esc_url($user->facebook_profile) . '" target="_blank"></a></li>';
		echo '<li class="author-item"><a href="' . esc_url($user->twitter_profile) . '" target="_blank"></a></li>';
		echo '<li class="author-item"><a href="mailto:' . ($user->email_profile) . '" target="_blank"></a></li>';
		echo '</ul>';
		echo '</div>';
		echo '<div class="author-excerpt">' . $user->description . '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
				
	}
} else {
	echo '';
}
echo '</div>';
echo '</div>';
?>

			</div>
<?php if ( dynamic_sidebar('about-widget') ) : else : endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
