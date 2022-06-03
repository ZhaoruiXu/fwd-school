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

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
      	<?php the_content(); ?>
			</div>

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
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail("latest-blog-posts") ?>
							</a>
					<?php 
					endwhile;
          ?>
						<p>
							<a href="<?php echo get_post_type_archive_link($args["post_type"]); ?>">See All News</a>
						</p>
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

