<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fwd-school
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>
				
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Created by %s' ), '<a href= "https://wordpress.org/">Rui Xu</a>' );
					?>
				
			</p>
			<p>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Photos courtesy of %s.' ), '<a href="https://burst.shopify.com/">Burst</a>' );
				?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
