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
		<?php if ( dynamic_sidebar('opt-in') ) : else : endif; ?>
					<?php
					if ( is_mobile() ) {
						
						$args = array(
						'category_name'			=> 'podcast-episodes',
					);	
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts()){
						echo '<div class="episodes">';
						while ( $query->have_posts() ) {
							$query->the_post();
							echo '<div class="episode-post">';
							echo '<div class="episode-title">';
						//	echo '<a href="' . get_permalink() . '">';
							echo '<h1 >' . get_the_title() . '</h1>';
						//	echo '</a>';
							echo '</div>';
							echo '<div class="episode-number">';
							$episode_number = ( $query->found_posts - $query->current_post );
							echo 'EPISODE ' . $episode_number;
							echo '</div>';
							echo '<div class="episode-excerpt">';
							the_excerpt();
							echo '</div>';
							echo '<div class="episode-footer">';
							echo '<a href="' . get_permalink() . '">';
							echo '<button class="listen"><a href="' . get_permalink() . '">Listen</a></button>';
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
							$episode_number = ( $query->found_posts - $query->current_post );
							echo '<div class="col span_1_of_3">';
							echo '<div class="episode-title">';
							echo '<a href="' . get_permalink() . '">';
							echo '<h1 >' . get_the_title() . '</h1>';
							echo '</div>';
							echo '<div class= "episode-number">';
							echo 'EPISODE ' . $episode_number;
							echo '</div>';
							echo '<div class="episode-excerpt">';
							the_excerpt();
							echo '</div>';
							echo '<div class="episode-footer">';
							echo '<button class="listen">Listen</button>';
							echo '</div>';
							echo '</a>';
							echo '</div>';
							}
						}
						echo '</div>';
						echo do_shortcode("[ajax_load_more post_type='post' offset='3' category='podcast-episodes' posts_per_page='3' pause='true' scroll='false' transition'fade' button_label='Load More']");						
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
						
				<?php if ( dynamic_sidebar('more-from') ) : else : endif; ?>
				
					</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
