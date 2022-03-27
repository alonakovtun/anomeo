<?php

/**
 * Custom post types
 *
 * @package anka-krystyniak
 */

function add_anka_krystyniak_custom_post_types()
{
    register_post_type(
        'press_post',
        array(
            'labels' => array(
                'name'                => 'Press post',
                'singular_name'       => 'Press post',
                'menu_name'           => 'Press posts',
                'all_items'           => 'All Press posts',
                'view_item'           => 'View',
                'add_new_item'        => 'Add new post',
                'add_new'             => 'Add new',
                'edit_item'           => 'Edit',
                'update_item'         => 'Update',
                'search_items'        => 'Search posts',
                'not_found'           => 'Not found',
                'not_found_in_trash'  => 'Not found in trash',
            ),
            'has_archive'         => false,
            'supports'            => array('title', 'thumbnail'),
            'public'              => true,
            'menu_position'       => 3,
            'menu_icon'           => 'dashicons-feedback',
        )
    );
};
add_action('init', 'add_anka_krystyniak_custom_post_types');


function custom_taxonomy_flush_rewrite()
{
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
// Uncomment if problems with taxonomy pages paths
// add_action('init', 'custom_taxonomy_flush_rewrite');