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

    // Register Services CPT
    $labels = array(
    'name'               => _x( 'Services', 'post type general name'  ),
    'singular_name'      => _x( 'Service', 'post type singular name'  ),
    'menu_name'          => _x( 'Services', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Service', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'service' ),
    'add_new_item'       => __( 'Add New Service' ),
    'new_item'           => __( 'New Service' ),
    'edit_item'          => __( 'Edit Service' ),
    'view_item'          => __( 'View Service'  ),
    'all_items'          => __( 'All Services' ),
    'search_items'       => __( 'Search Services' ),
    'parent_item_colon'  => __( 'Parent Services:' ),
    'not_found'          => __( 'No services found.' ),
    'not_found_in_trash' => __( 'No services found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, // Must be true to use block editor template set, as WordPress Block Editor is a React.js app that uses the WordPress REST AP
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-admin-comments',
        'supports'           => array( 'title' ),
    );

    register_post_type( 'fwd-service', $args );

// ----------------------------------------------------------------

    // Register Job Postings CPT
    $labels = array(
        'name'                  => _x( 'Job Postings', 'post type general name' ),
        'singular_name'         => _x( 'Job Posting', 'post type singular name' ),
        'menu_name'             => _x( 'Job Postings', 'admin menu' ),
        'name_admin_bar'        => _x( 'Job Posting', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'service'  ),
        'add_new_item'          => __( 'Add New Job Posting'  ),
        'new_item'              => __( 'New Job Posting' ),
        'edit_item'             => __( 'Edit Job Posting' ),
        'view_item'             => __( 'View Job Posting' ),
        'all_items'             => __( 'All Job Postings'  ),
        'search_items'          => __( 'Search Job Postings' ),
        'parent_item_colon'     => __( 'Parent Job Postings:' ),
        'not_found'             => __( 'No Job Postings found.' ),
        'not_found_in_trash'    => __( 'No Job Postings found in Trash.' ),
        'insert_into_item'      => __( 'Insert into Job Posting'),
        'uploaded_to_this_item' => __( 'Uploaded to this Job Posting'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'careers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array( 'title', 'editor' ),
        // for using block template
        'template'           => array(
            array( 'core/heading', array( 'level' => '3', 'content' => 'Role', ) ),
            array( 'core/paragraph', array( 'placeholder' => 'Describe the role...' ) ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Requirements' ) ),
            array( 'core/list' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Location' ) ),
            array( 'core/paragraph' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'How to Apply' ) ),
            array( 'core/paragraph' ),
        ),
        'template_lock' => 'all',
    );

    register_post_type( 'fwd-job-posting', $args );

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

  // -----------------------------------------------------------
  // Add Featured taxonomy
  $labels = array(
      'name'              => _x( 'Featured', 'taxonomy general name' ),
      'singular_name'     => _x( 'Featured', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Featured' ),
      'all_items'         => __( 'All Featured' ),
      'parent_item'       => __( 'Parent Featured' ),
      'parent_item_colon' => __( 'Parent Featured:' ),
      'edit_item'         => __( 'Edit Featured' ),
      'update_item'       => __( 'Update Featured' ),
      'add_new_item'      => __( 'Add New Featured' ),
      'new_item_name'     => __( 'New Work Featured' ),
      'menu_name'         => __( 'Featured' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'featured' ),
  );

  register_taxonomy( 'fwd-featured', array( 'fwd-work' ), $args );

  // ----------------------------------------------------------------
  // Add Service Type taxonomy
  $labels = array(
      'name'              => _x( 'Service Types', 'taxonomy general name' ),
      'singular_name'     => _x( 'Service Type', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Service Types' ),
      'all_items'         => __( 'All Service Type' ),
      'parent_item'       => __( 'Parent Service Type' ),
      'parent_item_colon' => __( 'Parent Service Type:' ),
      'edit_item'         => __( 'Edit Service Type' ),
      'update_item'       => __( 'Update Service Type' ),
      'add_new_item'      => __( 'Add New Service Type'),
      'new_item_name'     => __( 'New Work Service Type' ),
      'menu_name'         => __( 'Service Type' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'service-types' ),
  );

  register_taxonomy( 'fwd-service-type', array( 'fwd-service' ), $args );

add_action( 'init', 'fwd_register_taxonomies');

// Flushes permalinks when switching themes
function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );