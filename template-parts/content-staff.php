	<?php
		// while ( have_posts() ) :
		// 	the_post();

			// get_template_part( 'template-parts/content', 'page' );

        $terms = get_terms(array('taxonomy' => 'fwd-staff-category'));
          
          if($terms && ! is_wp_error($terms)):
            
            foreach($terms as $term):

              $args = array(
                'post_type' => 'fwd-staff',
                'posts_per_page' => -1,
                'order'   => 'DESC',
                'orderby' => 'title', 
                'tax_query' => array(
                  array(
                    'taxonomy' => 'fwd-staff-category',
                    'field' => 'slug', // can be ID or Name as well
                    'terms' => $term -> slug
                  )
                )
              );
              ?>

              <h2><?php echo $term->name; ?></h2>
              
              <?php  
              $staff_query = new WP_Query($args);
              if($staff_query -> have_posts()){
                while($staff_query -> have_posts()){
                $staff_query -> the_post();
                
                  echo '<article id="' . get_the_ID() . '">';
                      echo '<h3>' . get_the_title() . '</h3>';

                      if ( function_exists ( 'get_field' ) ) {
        
                        if ( get_field( 'staff_bio' ) ) {
                            the_field( 'staff_bio' );
                        }
                        if ( get_field( 'staff_teaching_courses' ) ) {
                            the_field( 'staff_teaching_courses' );
                        }
                        if ( get_field( 'staff_website' ) ) {
                            the_field( 'staff_website' );
                        }
                        
                      } 
                  echo '</article>';
                }
                wp_reset_postdata();
              }
            endforeach;
					?>
			<?php endif; 

		// endwhile; // End of the loop.
