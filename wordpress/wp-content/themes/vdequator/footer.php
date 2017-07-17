<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package vdequator
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-right">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'vdequator' ) ); ?>">WordPress</a>
				<span class="sep"> | </span>
				<span>Theme: <a href="http://www.akasse-info.dk" rel="designer">vdEquator</a></span>
			</div><!-- .site-info -->
		</div><!-- .footer-right -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
