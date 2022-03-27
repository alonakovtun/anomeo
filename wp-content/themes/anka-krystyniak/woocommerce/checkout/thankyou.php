<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); ?></p>


			<div class="woocommerce-order__container">
				<div class="order-details-section woocommerce-order__section">
					<p>
						<span><?php esc_html_e('Order number:', 'woocommerce'); ?></span>
						#<?php echo $order->get_order_number(); ?>
					</p>
				
					<? foreach ($order->get_items() as $item_id => $item) : ?>
						<p>
							<span><?php esc_html_e('Product', 'woocommerce'); ?>:</span>
							<?php echo $item->get_name(); ?>
						</p>
					<? endforeach; ?>
					
					<p>
						<span><?php esc_html_e('Date:', 'woocommerce'); ?></span>
						<?php echo wc_format_datetime($order->get_date_created()); ?>
					</p>
					<p>
						<span><?php esc_html_e('Total:', 'woocommerce'); ?></span>
						<?php echo $order->get_formatted_order_total(); ?>
					</p>
					<p>
						<span><?php esc_html_e('Payment method:', 'woocommerce'); ?></span>
						<?php echo wp_kses_post($order->get_payment_method_title()); ?>
					</p>
					<? if ($order->get_shipping_method()) : ?>
						<p>
							<span><?php esc_html_e('Shipping', 'woocommerce'); ?>:</span>
							<?php echo wp_kses_post($order->get_shipping_method()); ?>
						</p>
					<? endif; ?>

				</div>

				<div class="woocommerce-order-overview__billing-address woocommerce-order__section">
					<div class="title"><?php esc_html_e('Billing address', 'woocommerce'); ?></div>
					<div class="value">
						<?php echo wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); ?>

						<?php if ($order->get_billing_phone()) : ?>
							<p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_billing_phone()); ?></p>
						<?php endif; ?>

						<?php if ($order->get_billing_email()) : ?>
							<p class="woocommerce-customer-details--email"><?php echo esc_html($order->get_billing_email()); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<div class="woocommerce-order-overview__shipping-address woocommerce-order__section">
					<div class="title"><?php esc_html_e('Shipping address', 'woocommerce'); ?></div>
					<div class="value">
						<?php echo wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce'))); ?>
						<?php if ($order->get_shipping_phone()) : ?>
							<p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_shipping_phone()); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

		<?php endif; ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																										?></p>

	<?php endif; ?>

</div>