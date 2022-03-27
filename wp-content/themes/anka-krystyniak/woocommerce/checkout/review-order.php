<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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

defined('ABSPATH') || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<div class="products-list">
		<?php
		do_action('woocommerce_review_order_before_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);


			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
				$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
				$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
				$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
		?>
				<div class="ak-checkout__product-item">
					<a class="product-link" href="<?= esc_url($product_permalink); ?>">
						<?= $thumbnail; ?>
					</a>
					<div class="description-col">
						<div class="product-title">
							<p class="title"><?= $product_name; ?></p>
							<p class="price"><?= $product_price; ?></p>
						</div>
						<div class="checkout-product-item-controls">
							<p class="product-qty"><? _e('Quantity', 'anka-krystyniak'); ?>: <?= $cart_item['quantity']; ?></p>
							<div class="qty-buttons">
								<button data-cart_item_qty="<?= $cart_item['quantity']; ?>" data-cart_item_key="<?= $cart_item_key; ?>" class="cart-item-qty-btn minus-btn">-</button>
								<button data-cart_item_qty="<?= $cart_item['quantity']; ?>" data-cart_item_key="<?= $cart_item_key; ?>" class="cart-item-qty-btn plus-btn">+</button>
							</div>
						</div>
					</div>
					<?
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">%s</a>',
							esc_url(wc_get_cart_remove_url($cart_item_key)),
							esc_attr__('Remove this item', 'woocommerce'),
							esc_attr($product_id),
							esc_attr($cart_item_key),
							esc_attr($_product->get_sku()),
							__('Remove', 'anka-krystyniak')
						),
						$cart_item_key
					);
					?>
				</div>
		<?php
			}
		}

		do_action('woocommerce_review_order_after_cart_contents');
		?>
	</div>

	<div class="subtotals-list">
		<div class="subtotals-row cart-subtotal">
			<div><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
			<div class="subtotals-row cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
				<div><?php wc_cart_totals_coupon_html($coupon); ?></div>
			</div>
		<?php endforeach; ?>

		<div class="subtotals-row">
			<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

				<?php do_action('woocommerce_review_order_before_shipping'); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action('woocommerce_review_order_after_shipping'); ?>

			<?php endif; ?>
		</div>


		<?php foreach (WC()->cart->get_fees() as $fee) : ?>
			<div class="subtotals-row fee">
				<div><?php echo esc_html($fee->name); ?></div>
				<div><?php wc_cart_totals_fee_html($fee); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
			<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
				<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
				?>
					<div class="subtotals-row tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
						<div><?php echo esc_html($tax->label); ?></div>
						<div><?php echo wp_kses_post($tax->formatted_amount); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="subtotals-row tax-total">
					<div><?php echo esc_html(WC()->countries->tax_or_vat()); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action('woocommerce_review_order_before_order_total'); ?>
		<div class="subtotals-row order-total">
			<div><?php esc_html_e('Total', 'woocommerce'); ?></div>
			<div><?php wc_cart_totals_order_total_html(); ?></div>
		</div>
		<?php do_action('woocommerce_review_order_after_order_total'); ?>
	</div>

</div>