<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-billing-fields">
	<h3 class="ak-checkout-form__section-title"><?php esc_html_e( 'Delivery details', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="change_delivery">
		<div class="personal item _active">
			<? _e('PERSONAL', 'anomeo') ?>
		</div>
		<div class="business item _notactive">
			<? _e('BUSINESS', 'anomeo') ?>
		</div>
	</div>

	<div class="woocommerce-billing-fields__fields-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

		foreach ( $fields as $key => $field ) {
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		}
		?>
	</div>

	<div class="woocommerce-invoice-fields" style="display: none;">
	<!-- <h3 id="invoice-fields-title" class="ak-checkout-form__section-title ak-checkout-form__section-title--dropdown">
		<? _e('Invoice data (optional)', 'anomeo'); ?>
	</h3> -->

	<div class="woocommerce-invoice-fields__fields-wrapper">
		<?php do_action('woocommerce_invoice_vat_fields', $checkout); ?>
	</div>
</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>


