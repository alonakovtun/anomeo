<?php

/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>

<div class="ak-page__title-row">
	<h1 class="title">
		<? _e('Forgot password?', 'anomeo'); ?>
	</h1>
</div>

<div class="reset-main-title">
		<p class="title"><? _e('Reset password', 'anomeo') ?></p>
	</div>

<div class="ak-customer-lost-password-form-container">
	<form method="post" class="ak-customer-lost-password-form woocommerce-ResetPassword lost_reset_password">

		<p><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('If You’ve forgotten your password, enter your e-mail address and we’ll send you an e-mail telling you how to recover it.', 'woocommerce')); ?></p>

		<div class="form-row form-row-first">
			<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="<?php esc_html_e('Email', 'woocommerce'); ?>" />
		</div>

		<?php do_action('woocommerce_lostpassword_form'); ?>

		<div class="form-row submit-row">
			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="form-submit-btn button" value="<?php esc_attr_e('CONTINUE', 'woocommerce'); ?>"><?php esc_html_e('CONTINUE', 'woocommerce'); ?></button>
		</div>

		<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

	</form>
</div>
<?php
do_action('woocommerce_after_lost_password_form');
