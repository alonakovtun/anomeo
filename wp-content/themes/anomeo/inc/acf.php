<?php

/**
 * Configs related to ACF plugin
 *
 * @package anomeo
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => __('General theme settings', 'anomeo'),
        'menu_title'    => __('Theme Settings', 'anomeo'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}
