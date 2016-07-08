<?php
/**
 * The template for displaying The Living Experiment front page.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Living_Experiment
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

					<?php
					if ( is_mobile() ) {
						
						$args = array(
						'category_name'			=> 'podcast-episodes',
					);	
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts()){
						echo '<div class="section group">';
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="col span_1_of_3">';
							echo '<div class="episode-title">';
							echo '<a href="' . get_permalink() . '">';
							echo '<h1 >' . get_the_title() . '</h1>';
							echo '</a>';
							echo '</div>';
							echo '<div class="episode-number">';
							do_shortcode('[episode]');
							echo '</div>';
							setup_postdata($query->post);
							echo '<div class="episode-excerpt">';
							the_excerpt();
							echo '</div>';
							echo '<div class="episode-footer">';
							echo '<a href="' . get_permalink() . '">';
							echo '<button class="listen">Listen</button>';
							echo '</a>';
							echo '</div>';
							echo '</div>';
							}
						}
						echo '</div>';
					/* Restore original Post Data */
					wp_reset_postdata();
					
					} else {
					
					if ( get_query_var('paged') ) {

					$paged = get_query_var('paged');
					
					} elseif ( get_query_var('page') ) {
					
					$paged = get_query_var('page');
					
					} else {
					
					$paged = 1;
					
					 }
					$args = array(
						'posts_per_page' 		=> 3,
						'category_name'			=> 'podcast-episodes',
						'paged'					=>	$paged
					);	
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts()){
						echo '<div class="section group">';
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="col span_1_of_3">';
							echo '<div class="episode-title">';
							echo '<a href="' . get_permalink() . '">';
							echo '<h1 >' . get_the_title() . '</h1>';
							echo '</a>';
							echo '</div>';
							echo '<div class= "episode-number">';
							do_shortcode('[episode]');
							echo '</div>';
							setup_postdata($query->post);
							echo '<div class="episode-excerpt">';
							the_excerpt();
							echo '</div>';
							echo '<div class="episode-footer">';
							echo '<a href="' . get_permalink() . '">';
							echo '<button class="listen">Listen</button>';
							echo '</a>';
							echo '</div>';
							echo '</div>';
							}
						}
						echo '</div>';
						
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
									<!--	<?php echo do_shortcode("[ajax_load_more post_type='post' offset='10' category__not_in='9' pause='true' scroll='false' transition_container='false' images_loaded='true' destroy_after='3' button_label='Load More']"); ?>	-->
				MORE FROM DALLAS AND PILAR
				
				<?php 
					$args = array(
						'posts_per_page' => 4,
						'category_name'	=> -'podcast-episodes'
					);
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
						echo '<ul class="in-the-media">';
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="entries-post">';
							echo '<a href="' . get_permalink() . '">';
							echo '<figure class="entries-thumb">';
							the_post_thumbnail('entries-pic');
							echo '</figure>';
							echo '</a>';
							echo '</div>';
							}
							
						}
						echo '</ul>';
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
				
					</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
