<?php

/**
 * Theme ajax functions
 *
 * @package anka-krystyniak
 */

function ak_loadmore_handler()
{
    $default_args = array(
        'post_type' => 'post',
    );

    $input_args = json_decode(stripslashes($_POST['query_params']), true);

    $merged_args = array_merge($default_args,  $input_args);

    $query = new WP_Query($merged_args);

    $GLOBALS['wp_query'] = $query;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            get_template_part('template-parts/content', 'post');
        }
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_loadmore', 'ak_loadmore_handler');
add_action('wp_ajax_nopriv_loadmore', 'ak_loadmore_handler');
