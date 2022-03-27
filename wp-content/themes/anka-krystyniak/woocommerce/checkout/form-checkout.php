<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

if (!is_user_logged_in()) {
	get_template_part('template-parts/ak-checkout-login-form');
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout <?= !is_user_logged_in() ? 'woocommerce-checkout--hidden' : '' ?>" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<div class="ak-checkout-form__container">
		<div class="ak-checkout-form__col ak-checkout-form__col--left">
			<?php if ($checkout->get_checkout_fields()) : ?>

				<?php do_action('woocommerce_checkout_before_customer_details'); ?>

				<?php do_action('woocommerce_checkout_billing'); ?>

				<?php do_action('woocommerce_checkout_shipping'); ?>

				<?php do_action('woocommerce_checkout_after_customer_details'); ?>

			<?php endif; ?>

			<h3 class="ak-checkout-form__section-title ak-checkout-form__section-title--border-top">
				<? _e('Billing summary', 'anka-krystyniak'); ?>
			</h3>
			<div id="ajax-coupon-form" class="ak-checkout__coupon-form">
				<div class="form-row">
					<input type="text" name="coupon_code" id="ajax-coupon-form-input" placeholder="<? _e('Coupon code', 'woocommerce'); ?>">
				</div>
				<button id="ajax-coupon-form-submit-btn" class="button submit-btn"><? _e('Apply coupon', 'woocommerce'); ?></button>
				<button id="ajax-coupon-form-close-btn" class="button close-btn"></button>

				<div class="coupon-form-title"><? _e('Want to use gift card or coupon code', 'anka-krystyniak'); ?></div>
			</div>
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action('woocommerce_checkout_order_review'); ?>
			</div>
			<?php do_action('woocommerce_checkout_after_order_review'); ?>
		</div>

		<div class="ak-checkout-form__col ak-checkout-form__col--right">
			<h3 class="ak-checkout-form__section-title">
				<? _e('Summary', 'anka-krystyniak'); ?>
			</h3>
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action('woocommerce_checkout_order_review'); ?>
			</div>

			<div class="woocommerce-additional-fields">

				<h3 class="ak-checkout-form__section-title">
					<? _e('Order notes', 'anka-krystyniak'); ?>
				</h3>


				<div class="woocommerce-additional-fields__field-wrapper">
					<?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
						<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>