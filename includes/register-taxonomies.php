<?php

/**
 * Register custom taxonomies
 */

// Create 'Media Type' taxonomy
function create_taxonomy_media_type() {
  $labels = array(
    'name'                       => __( 'Media Type' ),
    'singular_name'              => __( 'Media Type' ),
    'search_items'               => __( 'Search Media Types' ),
    'popular_items'              => __( 'Popular Media Types' ),
    'all_items'                  => __( 'All Media Types' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Media Type' ),
    'update_item'                => __( 'Update Media Type' ),
    'add_new_item'               => __( 'Add New Media Type' ),
    'new_item_name'              => __( 'New Media Type Name' ),
    'separate_items_with_commas' => __( 'Separate Media Types with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Media Types' ),
    'choose_from_most_used'      => __( 'Choose from the most used Media Types' ),
    'not_found'                  => __( 'No Media Types found.' ),
    'menu_name'                  => __( 'Media Types' ),
  );
  $args = array(
    'hierarchical'               => false,
    'labels'                     => $labels,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'update_count_callback'      => '_update_post_term_count',
    'rewrite'                    => array( 'slug' => 'media-type' ),

  );
  register_taxonomy( 'media-type', 'news', $args );
}
add_action( 'init', 'create_taxonomy_media_type', 0 );

?>