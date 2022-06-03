<?php
/**
 * The template for displaying Student Category archieve page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<h1><?php single_term_title(); ?> Students</h1>
			<header class="page-header">
				<?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>

				<article>
          <h2><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></h2>
          <?php the_post_thumbnail('student-portrait', array('class' => 'alignleft')); ?>
					<?php the_content(); ?>
				</article>

				<?php
				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
