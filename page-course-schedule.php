<?php
/**
 * The template for displaying course schedule page
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

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

      <div class="entry-content">

          <?php the_content(); ?>

					<?php 
					$rows = get_field('schedule_repeater');
          if( $rows ) {
          ?>

          <table class="schedule-table">
            <caption>Weekly Course Schedule</caption>
            <thead>
              <tr>
                <th>Date</th>
                <th>Course</th>
                <th>Instructor</th>
              </tr>
            </thead>

            <tbody>


            <?php  
            foreach( $rows as $row ) {
                $date = $row['date'];
                $course = $row['course'];
                $instructor = $row['instructor'];

                ?>
                <tr>
                  <td><?php echo $date ?></td> 
                  <td><?php echo $course ?></td> 
                  <td><?php echo $instructor ?></td> 
                </tr>
            <?php  
            }
            ?>
          <?php   
          }
          ?>
            </tbody>
          </table>
			</div>
		</article>  
    <?php  
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
