<?php

// Register film post type
add_action('init', 'register_post_type_films', 0);

/**
 * Registering Film's Post type
 * @read https://developer.wordpress.org/reference/functions/register_post_type/
 */
function register_post_type_films()
{
    register_post_type('film', [
        'label'         => 'Films',
        'labels'        => [
            'name'              => 'Films',
            'singular_name'     => 'Film',
            'add_new'           => 'Add New Film',
            'add_new_item'      => 'Add Film',
            'edit_item'         => 'Edit Film',
            'new_item'          => 'New Film',
            'view_item'         => 'View Film',
            'search_items'      => 'Search films',
            'not_found'         => 'No films were found',
            'parent_item_colon' => null,
            'all_items'         => 'All Films',
            'archives'          => 'films archives',
            'insert_into_item'  => 'Insert inside a film',
            'name_admin_bar'    => 'Film',
            'items_list'        => 'Films list',
        ],
        'public'        => true,
        'menu_position' => 3,
        'menu_icon'     => 'dashicons-format-video',
        'supports'      => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
        ],
        'show_in_rest'  => false,
    ]);
}