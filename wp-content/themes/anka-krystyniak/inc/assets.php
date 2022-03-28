<?php

/**
 * Enqueue scripts and styles.
 *
 * @package anka-krystyniak
 */

/**
 * Enqueue scripts and styles.
 */
function anka_krystyniak_scripts()
{
    wp_enqueue_style('anka-krystyniak-style', get_stylesheet_uri(), array(), _S_VERSION);

    wp_enqueue_style('anka-krystyniak-main-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION);

    wp_register_script('anka-krystyniak-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
    wp_localize_script('anka-krystyniak-scripts', 'js_config', array(
        'ajax_url'   => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('ajax-nonce'),
        'urls' => array(
            'login' => get_permalink(get_option('woocommerce_myaccount_page_id'))
        ),
        'translations' => array(
            'not_available' => __('Product not available', 'anka-krystyniak'),
            'sort' => __('Sort', 'anka-krystyniak'),
            'close_sort' => __('Close sort', 'anka-krystyniak'),
            'filters' => __('Filters', 'anka-krystyniak'),
            'close_filters' => __('Close filters', 'anka-krystyniak'),
            'apply_coupon' => __('Apply coupon', 'woocommerce')
        )
    ));
    wp_enqueue_script('anka-krystyniak-scripts');
}
add_action('wp_enqueue_scripts', 'anka_krystyniak_scripts');
