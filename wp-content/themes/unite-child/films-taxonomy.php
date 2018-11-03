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

add_action('init', 'register_film_taxonomy', 0);

/**
 * Registering film taxonomy: Genres, Countries, Years and Actors
 */
function register_film_taxonomy()
{
    $taxonomies = [
        'genre'   => ['singular' => 'Genre', 'plural' => 'Genres'],
        'country' => ['singular' => 'Country', 'plural' => 'Countries'],
        'year'    => ['singular' => 'Year', 'plural' => 'Years'],
        'actor'   => ['singular' => 'Actor', 'plural' => 'Actors']
    ];

    foreach ($taxonomies as $taxonomy => $data) {
        register_taxonomy($taxonomy, 'film', [
            'labels'            => [
                'name'              => _x($data['plural'], 'taxonomy general name', 'textdomain'),
                'singular_name'     => _x($data['singular'], 'taxonomy singular name', 'textdomain'),
                'search_items'      => __('Search ' . $data['plural'], 'textdomain'),
                'all_items'         => __('All ' . $data['plural'], 'textdomain'),
                'parent_item'       => __('Parent ' . $data['singular'], 'textdomain'),
                'parent_item_colon' => __('Parent ' . $data['singular'] . ':', 'textdomain'),
                'edit_item'         => __('Edit ' . $data['singular'], 'textdomain'),
                'update_item'       => __('Update ' . $data['singular'], 'textdomain'),
                'add_new_item'      => __('Add New ' . $data['singular'], 'textdomain'),
                'new_item_name'     => __('New ' . $data['singular'] . ' Name', 'textdomain'),
                'menu_name'         => __($data['plural'], 'textdomain'),
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => $taxonomy]
        ]);
    }
}