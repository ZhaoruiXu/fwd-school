<?php
/**
 * The template for displaying all single student posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fwd-school
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

      $terms = wp_get_post_terms(get_the_ID(), "fwd-student-category");
						
						if($terms && ! is_wp_error($terms)):
							
							foreach($terms as $term):

								$args = array(
									'post_type' => 'fwd-student',
									'posts_per_page' => -1,
									'order'   => 'ASC',
									'orderby' => 'title',
                  'post__not_in' => [get_the_ID()],
									'tax_query' => array(
										array(
											'taxonomy' => 'fwd-student-category',
											'field' => 'name', // can be ID or Name as well
											'terms' => $term -> name
										)
									)
								);
								?>

								<h2>Meet other <?php echo $term->name; ?> Students</h2>
								
								<?php  
								$query = new WP_Query($args);
								if($query -> have_posts()){
									while($query -> have_posts()){
									$query -> the_post();
                  ?>

                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

									<?php  
									}
									wp_reset_postdata();
								}
							endforeach;
					?>
			<?php endif; 

		endwhile; // End of the loop.
		?>
	</main><!-- #primary -->

<?php
get_footer();
