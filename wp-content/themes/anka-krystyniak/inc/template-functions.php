<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package anka-krystyniak
 */

function get_lang_menu_list()
{
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=asc');

    echo '<p class="col-label">' . __('Language', 'anka-krystyniak') . '</p>';

    echo '<ul class="language-menu-list">';

    foreach ($languages as $l) {

        $selected = $l['active'] ? ' current' : '';
        echo '<li class="lang-menu-item' . $selected . '">' . '<a href="' . esc_url($l['url']) . '" >' . strtoupper($l['language_code']) . '</a>' . '</li>';
    }

    echo ' </ul>';
}

function get_mobile_change_lang_link()
{
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=asc');
    $link_text = array("en" => "Change language to English", "pl" => "Zmień język na Polski");
    foreach ($languages as $l) {

        if (!$l['active']) {
            echo '<li class="menu-item">' . '<a href="' . esc_url($l['url']) . '" >' . $link_text[$l['language_code']] . '</a>' . '</li>';
        }
    }
}



function get_currency_menu_list()
{
    echo '<p class="col-label">' . __('Currency', 'anka-krystyniak') . '</p>';

    echo do_action('wcml_currency_switcher', array('format' => '%code%', 'switcher_style' => 'anka-krystyniak-menu-list'));
}


function get_mobile_cart_icon()
{
    if (WC()->cart->is_empty()) {
        return '<a class="mobile-cart-toggle" href=""><span id="cart-popup-toggle" class="mobile-cart-icon"></span></a>';
    } else {
        return '<a class="mobile-cart-toggle" href=""><span id="cart-popup-toggle" class="mobile-cart-qty">' . WC()->cart->cart_contents_count . '</span></a>';
    }
}


function get_desktop_cart_icon()
{
    if (WC()->cart->is_empty()) {
        return '<a class="desktop-menu-btn" id="cart-popup-toggle" href="">' . __('Cart', 'anka-krystyniak') . '</a>';
    } else {
        return '<a class="desktop-menu-btn" id="cart-popup-toggle" href="">' . __('Cart', 'anka-krystyniak') . ' (' . WC()->cart->cart_contents_count . ')</a>';
    }
}

function get_lang_menu_item_text()
{
    $current_lang = apply_filters('wpml_current_language', NULL);
    $current_currency = get_woocommerce_currency();
    return $current_lang . '-' . $current_currency;
}


function get_product_featured_categories_list($product_id)
{
    $product_categories = get_the_terms($product_id, 'product_cat');
    $featured_categories = array();
    foreach ($product_categories as $cat) {
        if ($cat->slug == 'new' || $cat->slug == 'nowosc' || $cat->slug == 'shipping-in-48h' || $cat->slug == 'wysylka-w-48h') {
            array_push($featured_categories, $cat);
        }
    }

    $result = '<ul class="ak-product-item__featured-cats">';
    foreach ($featured_categories as $cat) {
        $item_class = ($cat->slug == 'new' || $cat->slug == 'nowosc') ? 'category-new' : 'category-fast-shipping';
        $result .= '<li class="' . $item_class . '">' . $cat->name . '</li>';
    }

    $result .= '</ul>';

    return $result;
}


function ak_product_loop_start($cols = 2)
{
    echo '<div class="ak-products__grid ak-products__grid--' . $cols . '-cols">';
}

function ak_product_loop_end()
{
    echo '</div>';
}

function ak_site_top_banner()
{
    if (get_field('show_top_banner', 'option')) : ?>
        <div class="site-top-banner">
            <p><? the_field('top_banner_text', 'option'); ?></p>

            <? if (get_field('show_top_banner_close_btn', 'option')) : ?>
                <button class="close-btn"><? _e('Close', 'anka-krystyniak'); ?></button>
            <? endif; ?>
        </div>
    <? endif;
}

function ak_site_cookies_banner()
{ ?>
    <div class="site-cookies-banner">
        <p><? _e('We use cookies in order to provide you with best online experience. By continuing to use our site you are agreeing to our', 'anka-krystyniak'); ?> <a href="<?= get_permalink(58); ?>"><? _e('Privacy Policy', 'anka-krystyniak'); ?></a></p>

        <button class="close-btn"><? _e('Close', 'anka-krystyniak'); ?></button>
    </div>
<?
}

function product_back_to_category_link()
{
    global $post;

    $cats_to_exclude = ['wysylka-w-48h', 'shipping-in-48h', 'nowosc', 'new'];
    $product_cats = get_the_terms($post->ID, 'product_cat');
    $filtered_cats = array();
    foreach ($product_cats as $cat) {
        if (!in_array($cat->slug, $cats_to_exclude)) {
            array_push($filtered_cats, $cat);
        }
    }


    if (count($filtered_cats) > 0) {
        $link = get_term_link($filtered_cats[0], 'product_cat');
        return '<a href="' . $link . '">' . $filtered_cats[0]->name . '</a>';
    } else {
        return '<a href="' . get_home_url() . '">' . __('Home', 'anka-krystyniak') . '</a>';
    }
}


function get_mobile_product_search_form()
{
?>
    <form role="search" method="get" class="woocommerce-product-search mobile-product-search <?= get_search_query() ? 'modified' : ''; ?>" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" id="woocommerce-mobile-product-search-field" class="search-field" placeholder="<?php echo esc_attr__('Search', 'anka-krystyniak'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit"></button>
        <input type="hidden" name="post_type" value="product" />
    </form>
<?
}


function get_invalid_form_field_class($field, $nonce_field)
{
    return isset($_POST[$nonce_field]) && isset($_POST[$field]) && empty($_POST[$field]) ? 'invalid' : '';
}

function get_register_field_email_invalid_class()
{
    return isset($_POST['register']) && isset($_POST['email']) && (empty($field) || !is_email($_POST['email']) || email_exists($_POST['email'])) ? 'invalid' : '';
}
