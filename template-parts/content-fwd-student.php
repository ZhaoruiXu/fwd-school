<?php
/**
 * Template part for content of fwd student cpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

    <?php the_post_thumbnail('student-portrait-large', array('class' => 'alignright')); ?>

	<div class="entry-content">
		<?php

		the_content();
			
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_school_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
