<?php
/**
 * The template for displaying staff page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
    ?>

      <header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
      <?php the_content(); ?>
			</div>

    <?php  

		  get_template_part( 'template-parts/content', 'staff');

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
