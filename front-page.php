<?php
/**
 * The template for displaying the home pages
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

			<h1><?php the_title() ?></h1>

      <?php the_content(); ?>
       
			<!-- <section class="home-info">
				<?php 
					// load the intro section from a seperate page using WP_Query
					// The page_id is the ID of the About Page
					$args = array("page_id" => 13 ); // using page ID

					$intro_query = new WP_Query($args);

					if($intro_query -> have_posts()){
						while($intro_query -> have_posts()){
							$intro_query -> the_post();

							// output stuff 
							// the_content() is everything below the title 
							the_content();
						}
						wp_reset_postdata();
					}
				?>
			</section>

			<section class="home-work">

				<h2>Featured Works</h2>

				<div class="home-work-wrapper">
					<?php 
						$args = array (
							// using post-type: "fwd-work" (CPT)
							'post_type' => 'fwd-work',
							'posts_per_page' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'fwd-featured',
									'field' => 'slug',
									'terms' => 'front-page'
								)
							),
						);
						$query = new WP_Query ( $args );
						if($query -> have_posts()){
							while ($query -> have_posts()){
								$query -> the_post();

								echo '<article>';
									echo '<a href="' . get_permalink() . '">';
										the_post_thumbnail('medium');
										echo '<h3>' . get_the_title() . '</h3>';
									echo '</a>';
								echo '</article>';
							}
							wp_reset_postdata();
						}
						?>
				</div>
			</section>

			<section class="home-work">

				<h2>Featured Works (Relationship Field)</h2>

				<div class="home-work-wrapper">
					<?php
					$featured_posts = get_field('feature_work');
					if( $featured_posts ): ?>
	
						<?php foreach( $featured_posts as $post ): 
	
								// Setup this post for WP functions (variable must be named $post).
								setup_postdata($post); ?>
										<article>
										<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('medium'); ?>
										<?php echo "<h3>". get_the_title() ."</h3>"; ?>
										</a>
										</article>
										
						
						<?php endforeach; ?>
				</div>		

					<?php 
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				<?php endif; ?>
			</section>

			<div class="home-left-right-wrapper">
			<section class="home-left">
				<?php 
				if ( function_exists ( 'get_field' ) ) {

					if ( get_field('left_section_title')){
						echo '<h2>';
						the_field('left_section_title');
						echo '</h2>';
					}

					if ( get_field('left_section_text')){
						echo '<p>';
						the_field('left_section_text');
						echo '<p>';
					}
				}
				?>
			</section>
			<section class="home-right">
				<?php 
				if ( function_exists ( 'get_field' ) ) {

					if ( get_field('right_section_title')){
						echo '<h2>';
						the_field('right_section_title');
						echo '</h2>';
					}

					if ( get_field('right_section_text')){
						echo '<p>';
						the_field('right_section_text');
						echo '<p>';
					}
				}
				?>
			</section>
			</div>
			
			<section class="home-slider">

				<h2>Testimonials</h2>

				<?php
				$args = array(
						'post_type'      => 'fwd-testimonial',
						'posts_per_page' => -1
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ):
					?>
					<div class='swiper'>
						<div class='swiper-wrapper'>
								<?php 
							while ( $query->have_posts() ):
									$query->the_post();
									?>
									<div class='swiper-slide'><?php the_content();?></div>
							<?php  
							endwhile;
							wp_reset_postdata();
							?>
						</div>
						<nav class="swiper-pagination"></nav>
						<!-- <button class="swiper-button-prev"></button>
						<button class="swiper-button-next"></button> -->
					</div>
				<?php endif; ?>
			</section> -->

			<section class="home-blog">
				<h2>Recent News</h2>
				<div class="home-blog-container">
				<?php 
				$args = array(
					// default post type : "post" (not CPT)
					"post_type" => "post", 
					"posts_per_page" => 3
				);
				$blog_query = new WP_Query($args);
				if($blog_query -> have_posts()):
					while($blog_query -> have_posts()):
						$blog_query -> the_post();
						?>

						<article>
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail("latest-blog-posts") ?>
							</a>
						</article>
					<?php 
					endwhile;
          ?>
            <a href="<?php echo get_post_type_archive_link($args["post_type"]); ?>">See All News</a>
          <?php 
							wp_reset_postdata();
				endif;	
					?>
				</div>
			</section>

		<?php  	
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();

