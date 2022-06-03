<?php

// ----------------------------------------------------------------
// -------------- Register Custom Post Type (CPT) -----------------
// ----------------------------------------------------------------

  function fwd_register_custom_post_types() {

// ----------------------------------------------------------------

    // Register Staffs CPT
    $labels = array(
    'name'               => _x( 'Staffs', 'post type general name'  ),
    'singular_name'      => _x( 'Staff', 'post type singular name'  ),
    'menu_name'          => _x( 'Staffs', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'Staff' ),
    'add_new_item'       => __( 'Add New Staff' ),
    'new_item'           => __( 'New Staff' ),
    'edit_item'          => __( 'Edit Staff' ),
    'view_item'          => __( 'View Staff'  ),
    'all_items'          => __( 'All Staffs' ),
    'search_items'       => __( 'Search Staffs' ),
    'parent_item_colon'  => __( 'Parent Staffs:' ),
    'not_found'          => __( 'No Staffs found.' ),
    'not_found_in_trash' => __( 'No Staffs found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staffs' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array( 'title' ),
        // Prevent moving, inserting, deleting blocks
        // 'template_lock' => 'all',
    );

    register_post_type( 'fwd-staff', $args );

// ----------------------------------------------------------------

    // Register Students CPT
    $labels = array(
    'name'               => _x( 'Students', 'post type general name'  ),
    'singular_name'      => _x( 'Student', 'post type singular name'  ),
    'menu_name'          => _x( 'Students', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'student' ),
    'add_new_item'       => __( 'Add New Student' ),
    'new_item'           => __( 'New Student' ),
    'edit_item'          => __( 'Edit Student' ),
    'view_item'          => __( 'View Student'  ),
    'all_items'          => __( 'All Students' ),
    'search_items'       => __( 'Search Students' ),
    'parent_item_colon'  => __( 'Parent Students:' ),
    'not_found'          => __( 'No Students found.' ),
    'not_found_in_trash' => __( 'No Students found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, // Must be true to use block editor template set, as WordPress Block Editor is a React.js app that uses the WordPress REST AP
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        // for using block template
        'template'           => array(
            array( 'core/paragraph', array( 'placeholder' => 'Short biography...' ) ),
            array( 'core/button' ),
        ),
        'template_lock' => 'all',
    );

    register_post_type( 'fwd-student', $args );

}
add_action( 'init', 'fwd_register_custom_post_types' );


// ----------------------------------------------------------------
// ---------------------- Register Taxonomies ---------------------
// ----------------------------------------------------------------

function fwd_register_taxonomies() {
    // Add Staff Category taxonomy
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Category' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'Vview Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
        // No block editor or template is used. Instead using Advanced Custom Fields (ACF)
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
    register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );
}

  // ----------------------------------------------------------------
  // Add Student Category taxonomy
  $labels = array(
      'name'              => _x( 'Student Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Student Categories' ),
      'all_items'         => __( 'All Student Category' ),
      'parent_item'       => __( 'Parent Student Category' ),
      'parent_item_colon' => __( 'Parent Student Category:' ),
      'edit_item'         => __( 'Edit Student Category' ),
      'update_item'       => __( 'Update Student Category' ),
      'add_new_item'      => __( 'Add New Student Category'),
      'new_item_name'     => __( 'New Work Student Category' ),
      'menu_name'         => __( 'Student Category' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'student-categories' ),
  );

  register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );

add_action( 'init', 'fwd_register_taxonomies');

// Flushes permalinks when switching themes
function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );