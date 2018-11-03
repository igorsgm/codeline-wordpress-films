<?php

// Film Post Types and taxonomies
require __DIR__ . '/films-taxonomy.php';
require __DIR__ . '/last_films_shortcode.php';

function get_film_custom_info($postId)
{
    if ('film' != get_post_type() || is_search()) {
        return "";
    }

    $terms     = wp_get_post_terms($postId, ['country', 'genre', 'actor']);
    $is_single = is_single();

    // group terms
    $countries = array_filter($terms, function ($term) {
        return $term->taxonomy === 'country';
    });
    $genres    = array_filter($terms, function ($term) {
        return $term->taxonomy === 'genre';
    });
    $actors    = array_filter($terms, function ($term) {
        return $term->taxonomy === 'actor';
    });

    // limiting
    if ($is_single) {
        $countries = array_slice($countries, 0, 3);
        $genres    = array_slice($genres, 0, 3);
        $actors    = array_slice($actors, 0, 3);
    }

    //prepare lings
    $countries = array_map(function ($country) {
        return "<a href='/country/{$country->slug}'>{$country->name}</a>";
    }, $countries);
    $genres    = array_map(function ($genre) {
        return "<a href='/genre/{$genre->slug}'>{$genre->name}</a>";
    }, $genres);
    $actors    = array_map(function ($actor) {
        return "<a href='/actor/{$actor->slug}'>{$actor->name}</a>";
    }, $actors);

    //Ticket Price
    $ticket_price = get_post_custom_values('Ticket Price', $postId);
    $ticket_price = $ticket_price && is_array($ticket_price) && count($ticket_price) ? $ticket_price[0] : null;

    //Release Date
    $release_date = get_post_custom_values('Release Date', $postId);
    $release_date = $release_date && is_array($release_date) && count($release_date) ? $release_date[0] : null;

    $pieces = [];
    if (count($countries)) {
        $pieces[] = "<dt class='country'>Country: </dt><dd>" . join(", ", $countries) . "</dd>";
    }
    if (count($genres)) {
        $pieces[] = "<dt class='genre'>Genre: </dt><dd>" . join(", ", $genres) . "</dd>";
    }
    if (count($actors) && $is_single) {
        $pieces[] = "<dt class='genre'>Actors: </dt><dd>" . join(", ", $actors) . "</dd>";
    }

    if ($ticket_price) {
        $pieces[] = "<dt class='ticket_price'>Ticket Price: </dt><dd>&#x24;{$ticket_price}</dd>";
    }
    if ($release_date) {
        $pieces[] = "<dt class='release_date'>Release Date: </dt><dd>{$release_date}</dd>";
    }
    $summary = join('', $pieces);

    if ($summary) {
        $summary = "<dl class='film-custom-info'>$summary</dl>";
    }

    return $summary;
}

add_filter('the_content', 'film_custom_info');
function film_custom_info($content)
{
    $summary = get_film_custom_info(get_the_ID());
    if (is_single()) {
        return $content . $summary;
    }

    return $summary . $content;
}