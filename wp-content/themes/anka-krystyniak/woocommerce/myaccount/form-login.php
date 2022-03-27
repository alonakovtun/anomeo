<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<div class="ak-page__title-row">
	<h1 class="title"><?= get_the_title(); ?></h1>
</div>

<div class="ak-customer-login-form" id="customer_login">

	<div class="form-wraper col-1">

		<h2 class="form-title"><?php esc_html_e('Login', 'anka-krystyniak'); ?></h2>

		<? get_template_part('template-parts/ak-login-form'); ?>

	</div>

	<div class="form-wraper col-2">

		<h2 class="form-title"><?php esc_html_e('Register', 'anka-krystyniak'); ?></h2>

		<form method="post" class="ak-form ak-form--register" <?php do_action('woocommerce_register_form_tag'); ?>>

			<?php do_action('woocommerce_register_form_start'); ?>

			<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

				<input type="text" class="input-text" name="username" id="reg_username" autocomplete="username" placeholder="<?php esc_html_e('Username', 'woocommerce'); ?>" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />

			<?php endif; ?>

			<input type="email" class="input-text <?= get_register_field_email_invalid_class(); ?>" name="email" id="reg_email" autocomplete="email" placeholder="<?php esc_html_e('Email', 'anka-krystyniak'); ?>" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />

			<input type="password" class="input-text <?= get_invalid_form_field_class('password', 'register'); ?>" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" />

			<input type="password" class="input-text <?= get_invalid_form_field_class('password2', 'register'); ?>" name="password2" id="reg_password2" autocomplete="new-password" placeholder="<?php esc_html_e('Confirm password', 'anka-krystyniak'); ?>" />

			<?php do_action('woocommerce_register_form'); ?>

			<div class="woocommerce-form-row form-row">
				<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit disabled" disabled name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
			</div>

			<label for="register-form-consent" class="ak-checkbox consent-checkbox">
				<input type="checkbox" name="consent" id="register-form-consent">
				<span><?= sprintf(__('I have read and agree website <a href="%s">Terms and conditions</a>', 'anka-krystyniak'), esc_url(get_permalink(84))); ?></span>
			</label>

			<?php do_action('woocommerce_register_form_end'); ?>

		</form>

	</div>

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>