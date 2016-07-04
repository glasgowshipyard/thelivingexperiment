<?php
/**
 * Template Name: Popup Page HELP
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Living_Experiment
 */

?>
	<div id="openModal" class="modalDialog">
		<a href="#close" title="Close" class="close">X</a>
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- #openModal -->
