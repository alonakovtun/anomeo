<?php

/**
 * Enqueue scripts and styles.
 *
 * @package anomeo
 */

/**
 * Enqueue scripts and styles.
 */
function anka_krystyniak_scripts()
{
    wp_enqueue_style('anomeo-style', get_stylesheet_uri(), array(), _S_VERSION);

    wp_enqueue_style('anomeo-main-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION);

    wp_register_script('anomeo-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
    wp_localize_script('anomeo-scripts', 'js_config', array(
        'ajax_url'   => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('ajax-nonce'),
        'urls' => array(
            'login' => get_permalink(get_option('woocommerce_myaccount_page_id'))
        ),
        'translations' => array(
            'not_available' => __('Product not available', 'anomeo'),
            'sort' => __('Sort', 'anomeo'),
            'close_sort' => __('Close sort', 'anomeo'),
            'filters' => __('Filters', 'anomeo'),
            'close_filters' => __('Close filters', 'anomeo'),
            'apply_coupon' => __('Apply coupon', 'woocommerce')
        )
    ));
    wp_enqueue_script('anomeo-scripts');
}
add_action('wp_enqueue_scripts', 'anka_krystyniak_scripts');
