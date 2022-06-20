<?php

/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">
	<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />

	<label for="payment_method_<?php echo esc_attr($gateway->id); ?>">
		<div class="payment-method__icon">
			<?php echo $gateway->get_icon(); ?>
		</div>
		<div class="payment-method__title">
			<?php echo $gateway->get_title(); ?>
		</div>
	</label>
</li>


<script>
	var panels = document.getElementsByClassName("payment-method__title");
	var actives = document.getElementsByClassName('bottom');
	for (i = 0; panels.length > i; i++) {
		panels[i].onclick = function() {
			var currentActive = actives[0];
			if (currentActive)
				currentActive.classList.remove("bottom");

			if (currentActive !== this)
				this.classList.add("bottom");
		};
	}
</script>