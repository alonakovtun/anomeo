<?php

/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	<?
	$btn_price = '<span class="price">' . $product->get_price_html() . '</span>';
	$button_text = $product->single_add_to_cart_text() . ' ' . $btn_price;
	$button_text_esc = esc_html($product->single_add_to_cart_text() . ' ' . $btn_price);
	?>

	<button type="submit" class="single_add_to_cart_button button disabled" disabled data-btn_text='<?= $button_text_esc ?>'><?= $button_text; ?></button>

	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>