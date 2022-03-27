<?php

/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

$get_addresses = apply_filters(
	'woocommerce_my_account_get_addresses',
	array(
		'billing'  => __('Billing address', 'woocommerce'),
		'shipping' => __('Shipping address', 'woocommerce'),
	),
	$customer_id
);
?>

<div class="ak-page__title-row">
	<h1 class="title">
		<? _e('My addresses', 'anka-krystyniak'); ?>
	</h1>
</div>

<section class="ak-my-account__addresses">
	<?php foreach ($get_addresses as $name => $address_title) : ?>
		<?php
		$address_fields = ak_get_edit_account_address_fields($name, $customer_id);
		?>
		<div class="ak-my-account__address-item">
			<p class="ak-my-account__address-item-title"><?php echo esc_html($address_title); ?></p>

			<form method="post" action="<?= wc_get_endpoint_url('edit-address', $name); ?>">
				<div class="woocommerce-address-fields">
					<?php do_action("woocommerce_before_edit_address_form_{$name}"); ?>

					<div class="woocommerce-address-fields__field-wrapper">
						<?php
						foreach ($address_fields as $key => $field) {
							woocommerce_form_field($key, $field, wc_get_post_data_by_key($key, $field['value']));
						}
						?>
					</div>

					<?php do_action("woocommerce_after_edit_address_form_{$name}"); ?>

					<?php wp_nonce_field('woocommerce-edit_address', 'woocommerce-edit-address-nonce'); ?>
					<input type="hidden" name="action" value="edit_address" />
					<button type="submit" class="form-submit-btn button" name="save_address" value="<?php esc_attr_e('Save address', 'woocommerce'); ?>"><?php esc_html_e('Save address', 'woocommerce'); ?></button>
				</div>

			</form>
		</div>

	<?php endforeach; ?>

</section>