<?php

/**
 * Configs related to ACF plugin
 *
 * @package anka-krystyniak
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => __('General theme settings', 'anka-krystyniak'),
        'menu_title'    => __('Theme Settings', 'anka-krystyniak'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
