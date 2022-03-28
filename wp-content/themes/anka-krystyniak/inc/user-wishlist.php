<?php

/**
 * Wishlist
 *
 * @package anka-krystyniak
 */

function is_product_in_wishlist($product_id)
{
    $curr_user = get_current_user_id();

    if ($curr_user) {
        $current_wishlist = get_the_author_meta('ak_wishlist', $curr_user);

        if ($current_wishlist) {
            return in_array($product_id, $current_wishlist);
        }
    }

    return false;
}

function get_wishlist_button()
{
    global $product;

    $active_class =  is_product_in_wishlist($product->get_id()) ? 'active' : '';

    return '<button data-product_id="' . esc_attr($product->get_id()) . '" class="ak-product-favorite-btn ' . $active_class . '"></button>';
}

/**
 * Fetch user data
 */
function fetch_user_data()
{
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $current_user_wishlist = get_user_meta($current_user->ID, 'wishlist', true);
        echo json_encode(array('user_id' => $current_user->ID, 'wishlist' => $current_user_wishlist));
    }
    wp_die();
}
add_action('wp_ajax_fetch_user_data', 'fetch_user_data');
add_action('wp_ajax_nopriv_fetch_user_data', 'fetch_user_data');

function update_wishlist_ajax()
{
    if (isset($_POST["user_id"]) && !empty($_POST["user_id"])) {
        $user_id   = $_POST["user_id"];
        $user_obj = get_user_by('id', $user_id);
        if (!is_wp_error($user_obj) && is_object($user_obj)) {
            update_user_meta($user_id, 'wishlist', $_POST["wishlist"]);
        }
    }
    die();
}
add_action('admin_post_nopriv_user_wishlist_update', 'update_wishlist_ajax');
add_action('admin_post_user_wishlist_update', 'update_wishlist_ajax');

/**
 * Add to wishlist handler
 */
function add_to_wishlist_handler()
{
    $output = array();
    $output['success'] = false;
    $curr_user = get_current_user_id();
    $product_id = $_POST['product_id'];

    if ($curr_user && $product_id) {
        $current_wishlist = get_the_author_meta('ak_wishlist', $curr_user) ? get_the_author_meta('ak_wishlist', $curr_user) : array();

        if ((!in_array(intval($product_id), $current_wishlist))) {
            array_push($current_wishlist, $product_id);
            update_user_meta($curr_user, 'ak_wishlist', $current_wishlist);
            $output['success'] = 1;
        }
    }

    wp_send_json($output);
}
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist_handler');
add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist_handler');


/**
 * Add to wishlist handler
 */
function remove_from_wishlist_handler()
{
    $output = array();
    $output['success'] = false;
    $curr_user = get_current_user_id();
    $product_id = $_POST['product_id'];

    if ($curr_user && $product_id) {
        $current_wishlist = get_the_author_meta('ak_wishlist', $curr_user);

        if ($current_wishlist) {
            $key = array_search($product_id, $current_wishlist);
            unset($current_wishlist[$key]);
            update_user_meta($curr_user, 'ak_wishlist', $current_wishlist);
            $output['success'] = 1;
        }
    }

    wp_send_json($output);
}
add_action('wp_ajax_nopriv_remove_from_wishlist', 'remove_from_wishlist_handler');
add_action('wp_ajax_remove_from_wishlist', 'remove_from_wishlist_handler');


/**
 * Register new endpoint (URL) for My Account page
 */
function ak_add_wishlist_endpoint()
{
    add_rewrite_endpoint('wishlist', EP_ROOT | EP_PAGES);
}
add_action('init', 'ak_add_wishlist_endpoint');


/**
 * Add new query var
 */
function ak_wishlist_query_vars($vars)
{
    $vars[] = 'wishlist';
    return $vars;
}
add_filter('query_vars', 'ak_wishlist_query_vars', 0);


function insert_after_helper($items, $new_items, $after)
{
    // Search for the item position and +1 since is after the selected item key.
    $position = array_search($after, array_keys($items)) + 1;

    // Insert the new item.
    $array = array_slice($items, 0, $position, true);
    $array += $new_items;
    $array += array_slice($items, $position, count($items) - $position, true);

    return $array;
}

/**
 * Insert the new endpoint into the My Account menu
 */
function ak_add_wishlist_link_my_account($items)
{
    $new_items = array();
    $new_items['wishlist'] = __('Wishlist', 'anka-krystyniak');

    return insert_after_helper($items, $new_items, 'edit-account');
}

add_filter('woocommerce_account_menu_items', 'ak_add_wishlist_link_my_account');


/**
 * Add content to the wishlist tab
 */
function ak_wishlist_content()
{
    get_template_part('template-parts/wishlist-grid');
}
add_action('woocommerce_account_wishlist_endpoint', 'ak_wishlist_content');
