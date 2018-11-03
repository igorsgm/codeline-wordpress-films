<?php

add_shortcode('last-films', 'last_films_shortcode');
function last_films_shortcode($attributes)
{
    // Original Attributes, for filters
    $original_attributes = $attributes;

    // Pull in shortcode attributes and set defaults
    $attributes = shortcode_atts([
        'posts_per_page' => '10',
        'title'          => '',
    ], $attributes, 'last-films');

    $posts_per_page  = intval($attributes['posts_per_page']);
    $shortcode_title = sanitize_text_field($attributes['title']);

    // Set up initial query for post
    $args = [
        'order'          => "DESC",
        'orderby'        => "date",
        'perm'           => 'readable',
        'post_type'      => 'film',
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
    ];

    $wrapper       = 'ul';
    $wrapper_class = ' class="last-films-listing"';
    $inner_wrapper = 'li';


    $listing = new WP_Query(apply_filters('display_last_films_shortcode_args', $args, $original_attributes));
    if (!$listing->have_posts()) {
        return apply_filters('display_last_films_shortcode_no_results', wpautop("No last films"));
    }

    $inner = '';
    while ($listing->have_posts()): $listing->the_post();
        global $post;

        $href  = apply_filters('the_permalink', get_permalink());
        $title = '<span class="title">' . get_the_title() . '</span>';
        $image = '<span class="image">' . get_the_post_thumbnail(get_the_ID(), "thumbnail") . '</span> ';
        $date  = get_post_custom_values('Release Date', $post->id);
        if (is_array($date) && count($date)) {
            $date = $date[0];
            $date = '<br><span class="date small text-muted">Release: ' . $date . '</span>';
        } else {
            $date = "";
        }

        $class  = ['listing-item'];
        $output =
            '<' . $inner_wrapper . ' class="' . implode(' ', $class) . '">'
            . '<a href="' . $href . '">' . $image . "<div>" . $title . $date . '</div>' . '</a>'
            . '</' . $inner_wrapper . '>';

        $inner .= apply_filters('display_last_films_shortcode_output', $output, $original_attributes, $image, $title, $date,
            $inner_wrapper, $class);
    endwhile;
    wp_reset_postdata();


    $open  = apply_filters('display_last_films_shortcode_wrapper_open', '<' . $wrapper . $wrapper_class . '>',
        $original_attributes);
    $close = apply_filters('display_last_films_shortcode_wrapper_close', '</' . $wrapper . '>', $original_attributes);

    $return = '';

    if ($shortcode_title) {

        $title_tag = apply_filters('display_last_films_shortcode_title_tag', 'h2', $original_attributes);
        $return    .= '<' . $title_tag . ' class="last-films-title">' . $shortcode_title . '</' . $title_tag . '>' . "\n";
    }

    $return .= $open . $inner . $close;

    return $return;
}