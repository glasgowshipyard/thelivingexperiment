<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Living_Experiment
 */

?>

	</div><!-- #content -->
</div><!-- #behold? -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'thelivingexperiment' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'thelivingexperiment' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'thelivingexperiment' ), 'thelivingexperiment', '<a href="http://glasgowshipyard.com" rel="designer">Glasgow Shipyard</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- BEHOLD -->
<?php wp_footer(); ?>

</body>
</html>
