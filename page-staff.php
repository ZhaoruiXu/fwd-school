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
    ?>

      <h1><?php the_title() ?></h1>
      <?php the_content(); ?>

    <?php  

			the_post();

		  get_template_part( 'template-parts/content', 'staff');


		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
