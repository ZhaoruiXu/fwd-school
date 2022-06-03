<?php
/**
 * The template for displaying student archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school
 */

get_header();
?>

	<main id="primary" class="site-main">

			<header class="page-header">
				<!-- https://developer.wordpress.org/reference/functions/post_type_archive_title/ -->
				<!-- <h1><?php post_type_archive_title(); ?></h1> -->
				<h1>The Class</h1>


				<?php
				// the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php 
			$args = array (
				'post_type' => 'fwd-student',
				'posts_per_page' => -1,
        'order'   => 'ASC',
        'orderby' => 'title', 
			);
			$query = new WP_Query ( $args );
			if($query -> have_posts()){
				echo '<section class="student-section">';
				while ($query -> have_posts()){
					$query -> the_post();
					echo '<article>';
							echo '<h2>' . get_the_title() . '</h2>';
							the_post_thumbnail('large');
						the_excerpt();
            ?>

            <?php $terms = wp_get_post_terms( $query->post->ID, "fwd-student-category" ); ?>
            <?php foreach ( $terms as $term ) : ?>
            <!-- <p><?php echo $term->taxonomy; ?>: <?php echo $term->name; ?></p> -->
            <p>Specialty: <a href="<?php echo get_term_link($term->name, $term->taxonomy) ?>"><?php echo $term->name; ?></a></p>
            <?php endforeach; 

					echo '</article>';

				}
				wp_reset_postdata();
				echo '</section>';
			}
			?>

	</main><!-- #primary -->

<?php
get_footer();
