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
?>

<form id="order_review" method="post" class="order_view">

	<div class="back" onclick="history.go(-1)"><?php _e( 'Go back', 'anomeo')?></div>
	<?php foreach (wc_get_account_orders_columns() as $column_id => $column_name) : ?>
		<?php if ('order-number' === $column_id) : ?>
			<a href="<?php echo esc_url($order->get_view_order_url()); ?>" class="number">
				<?php echo esc_html(_x('Order #', 'hash before order number', 'woocommerce') . $order->get_order_number()); ?>
			</a>
	<?php endif;
	endforeach; ?>


	<div class="shop_table">

		<div class="content-table">
			<?php if (count($order->get_items()) > 0) : ?>
				<?php foreach ($order->get_items() as $item_id => $item) : ?>
					<?php
					if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
						continue;
					}
					?>
					<div class="<?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'order_item', $item, $order)); ?>">
						<div class="product-name">
							<?php
							echo wp_kses_post(apply_filters('woocommerce_order_item_name', $item->get_name(), $item, false));

							do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, false);

							wc_display_item_meta($item);

							do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, false);
							?>
						</div>
						<div class="product-quantity"><?php echo apply_filters('woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', esc_html($item->get_quantity())) . '</strong>', $item); ?></div><?php // @codingStandardsIgnoreLine 
																																																															?>
						<div class="product-subtotal"><?php echo $order->get_formatted_line_subtotal($item); ?></div><?php // @codingStandardsIgnoreLine 
																														?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

	</div>

	<section class="order-details woocommerce-order-details">
		<div class="billing-col col">
			<p class="order-details__title"><? _e('Billing address', 'woocommerce'); ?></p>
			<div class="order-details__address">
				<? foreach (ak_get_formatted_order_address($order->get_address('billing')) as $key => $value) : ?>
					<p class="address-row <?= $key; ?>"><?= $value; ?></p>
				<? endforeach; ?>
			</div>
		</div>

		<div class="shipping-col col">
			<p class="order-details__title"><? _e('Shipping address', 'woocommerce'); ?></p>
			<div class="order-details__address">
				<? foreach (ak_get_formatted_order_address($order->get_address('shipping')) as $key => $value) : ?>
					<p class="address-row <?= $key; ?>"><?= $value; ?></p>
				<? endforeach; ?>
			</div>
		</div>




	</section>
	<?php if ($order->needs_payment()) : ?>
	<div class="action">
		<?php foreach (wc_get_account_orders_columns() as $column_id => $column_name) : ?>
			<?php if ('order-actions' === $column_id) : ?>
				<?php
				$actions = wc_get_account_orders_actions($order);

				if (!empty($actions)) {
					foreach ($actions as $key => $action) {
						echo '<button><a href="' . esc_url($action['url']) . '" class="woocommerce-button button ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a></button>';
					}
				}
				?>
		<?php endif;
		endforeach; ?>
	</div>

	<div class="accept">
	<label for="checkout-form-consent" class="ak-checkbox consent-checkbox checkout-consent-checkbox">
			<input type="checkbox" name="checkout-form-consent" id="checkout-form-consent">
			<span><?= sprintf(__('I accept Privacy Policy and Cookies Policy', 'anomeo'), esc_url(get_permalink(84))); ?></span>
		</label>
	</div>
	<?php endif; ?>

</form>