<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<div <?php wc_product_class('ak-product-item', $product); ?>>

	<?= get_wishlist_button(); ?>

	<a href="<?= get_the_permalink(); ?>" class="ak-product-item__link">

		<div class="ak-product-item__image-wrap">
			<?= woocommerce_get_product_thumbnail('full'); ?>
		</div>


		<div class="ak-product-item__description">
			<? wc_get_template('loop/price.php'); ?>

			<p class="title"><?= get_the_title(); ?></p>
		</div>

		<div class="ak-product-item__featured-cats-wrapper">
			<?= get_product_featured_categories_list($product->get_id()); ?>
		</div>
	</a>
</div>