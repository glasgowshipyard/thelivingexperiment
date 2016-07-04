<?php
/**
 * Template part for displaying episodes.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Living_Experiment
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="player"><div class="player-episode"><?php do_shortcode("[episode]");?></div><?php
				the_title( '<h1 class="player-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
		<?php the_excerpt(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'thelivingexperiment' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thelivingexperiment' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php thelivingexperiment_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
