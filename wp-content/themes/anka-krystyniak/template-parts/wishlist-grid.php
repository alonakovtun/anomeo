<?php

/**
 * Template part for displaying wishlist page
 *
 * @package anka-krystyniak
 */


$curr_user = get_current_user_id();
$wishlist_products = get_the_author_meta('ak_wishlist', $curr_user) ? get_the_author_meta('ak_wishlist', $curr_user) : array();
?>

<header class="ak-page__title-row">
    <h1 class="title"><? _e('Wishlist', 'anka-krystyniak'); ?>: <?= count($wishlist_products); ?></h1>
</header>

<?

if (count($wishlist_products) > 0) :
    ak_product_loop_start(4);

    foreach ($wishlist_products as $product_id) :
        $post_object = get_post($product_id);

        setup_postdata($GLOBALS['post'] = &$post_object);

        wc_get_template_part('content', 'product');


    endforeach;

    ak_product_loop_end();

endif;
?>