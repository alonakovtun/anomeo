<?php

/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
	return;
}
?>
<div class="ak-order-details__product-item <?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order)); ?>">
	<?
	$is_visible        = $product && $product->is_visible();
	$product_permalink = apply_filters('woocommerce_order_item_permalink', $is_visible ? $product->get_permalink($item) : '', $item, $order);
	$qty          = $item->get_quantity();
	$refunded_qty = $order->get_qty_refunded_for_item($item_id);

	if ($refunded_qty) {
		$qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - ($refunded_qty * -1)) . '</ins>';
	} else {
		$qty_display = esc_html($qty);
	}
	?>
	<a href="<?= esc_url($product_permalink); ?>">
		<?= $product->get_image(); ?>
	</a>
	<div class="description-col">
		<div class="product-title">
			<p class="title"><?= $item->get_name(); ?></p>
			<p class="price"><?= $order->get_formatted_line_subtotal($item); ?></p>
		</div>
		<div class="checkout-product-item-controls">
			<p class="product-qty"><? _e('Quantity', 'anka-krystyniak'); ?>: <?= $qty_display; ?></p>
		</div>
	</div>
</div>

<?php if ($show_purchase_note && $purchase_note) : ?>

	<div class="woocommerce-table__product-purchase-note product-purchase-note">

		<?= wpautop(do_shortcode(wp_kses_post($purchase_note))); ?>

	</div>

<?php endif; ?>