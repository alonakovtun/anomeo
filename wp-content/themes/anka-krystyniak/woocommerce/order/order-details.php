<?php

/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined('ABSPATH') || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
	return;
}

$order_items           = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note    = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="ak-my-account__order-details woocommerce-order-details">
	<div class="col col-left">
		<p class="ak-order-details__title"><? _e('Billing address', 'woocommerce'); ?></p>
		<div class="ak-order-details__address">
			<? foreach (ak_get_formatted_order_address($order->get_address('billing')) as $key => $value) : ?>
				<p class="address-row <?= $key; ?>"><?= $value; ?></p>
			<? endforeach; ?>
		</div>

		<p class="ak-order-details__title ak-order-details__title--border-top"><? _e('Shipping address', 'woocommerce'); ?></p>
		<div class="ak-order-details__address">
			<? foreach (ak_get_formatted_order_address($order->get_address('shipping')) as $key => $value) : ?>
				<p class="address-row <?= $key; ?>"><?= $value; ?></p>
			<? endforeach; ?>
		</div>


		<p class="ak-order-details__title ak-order-details__title--border-top"><? _e('Billing summary', 'anka-krystyniak'); ?></p>
		<div class="ak-order-details-totals">
			<?
			foreach ($order->get_order_item_totals() as $key => $total) : ?>
				<div class="totals-row">
					<span class="title"><? echo esc_html($total['label']); ?></span>
					<span><? echo ('payment_method' === $key) ? esc_html($total['value']) : wp_kses_post($total['value']); ?></span>
				</div>
			<?
			endforeach;
			?>
		</div>
	</div>

	<div class="col col-right">
		<div class="ak-order-details__products-list">
			<?
			foreach ($order_items as $item_id => $item) {
				$product = $item->get_product();

				if ($product) {
					wc_get_template(
						'order/order-details-item.php',
						array(
							'order'              => $order,
							'item_id'            => $item_id,
							'item'               => $item,
							'show_purchase_note' => $show_purchase_note,
							'purchase_note'      => $product ? $product->get_purchase_note() : '',
							'product'            => $product,
						)
					);
				}
			}
			?>
		</div>
	</div>
</section>