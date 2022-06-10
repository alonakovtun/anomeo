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
	<div class="login-box">

		<div class="form-wraper col-1">

			<div class="page-title__container">
				<p class="page-title__subtitle "><?php esc_html_e('Login', 'anomeo'); ?></p>
			</div>

			<!-- <? //get_template_part('template-parts/ak-login-form'); ?> -->
			<form class="ak-form ak-form--login" method="post">

    <?php do_action('woocommerce_login_form_start'); ?>

    <input class="input-text <?= get_invalid_form_field_class('username', 'login'); ?>" type="text" name="username" id="username" autocomplete="username" placeholder="<?php esc_html_e('Email', 'anomeo'); ?>" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />

    <input class="input-text <?= get_invalid_form_field_class('password', 'login'); ?>" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" />

    <?php do_action('woocommerce_login_form'); ?>

    <div class="lost_password">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Have You forgotten your password?', 'anomeo'); ?></a>

        <!-- <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="register-link"><?php esc_html_e('Register', 'woocommerce'); ?></a> -->
    </div>

    <div class="form-row">
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
    </div>

   

    <?php do_action('woocommerce_login_form_end'); ?>

</form>

		</div>

		<div class="form-wraper col-2">

			<div class="page-title__container">
				<p class="page-title__subtitle "><?php esc_html_e('Register', 'anomeo'); ?></p>
			</div>

			<div class="log-in__input-data">
				<p class="log-in__right-mess">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
				</p>
			</div>

			<a class="woocommerce-button button woocommerce-form-login__submit button__trigger-register">
				<?php esc_html_e('CREATE ACCOUNT', 'hedo'); ?>
			</a>


		</div>
	</div>

	<div class=" register-box">
	<div class="page-title__container">
				<p class="page-title__subtitle "><?php esc_html_e('Create an account', 'anomeo'); ?></p>
			</div>

		<form method="post" class="ak-form ak-form--register" <?php do_action('woocommerce_register_form_tag'); ?>>

			<?php do_action('woocommerce_register_form_start'); ?>


			<input type="text" class="input-text" name="name" id="reg_name" autocomplete="name" placeholder="<?php esc_html_e('Name', 'woocommerce'); ?>" value="<?php echo (!empty($_POST['name'])) ? esc_attr(wp_unslash($_POST['name'])) : ''; ?>" />
			<input type="text" class="input-text" name="surname" id="reg_surname" autocomplete="surname" placeholder="<?php esc_html_e('Surname', 'woocommerce'); ?>" value="<?php echo (!empty($_POST['surname'])) ? esc_attr(wp_unslash($_POST['surname'])) : ''; ?>" />



			

			<input type="email" class="input-text <?= get_register_field_email_invalid_class(); ?>" name="email" id="reg_email" autocomplete="email" placeholder="<?php esc_html_e('Email', 'anomeo'); ?>" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />

			<input type="password" class="input-text <?= get_invalid_form_field_class('password', 'register'); ?>" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" />

			<input type="password" class="input-text <?= get_invalid_form_field_class('password2', 'register'); ?>" name="password2" id="reg_password2" autocomplete="new-password" placeholder="<?php esc_html_e('Confirm password', 'anomeo'); ?>" />

			<?php do_action('woocommerce_register_form'); ?>

			<div class="woocommerce-form-row form-row">
				<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit disabled" disabled name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
			</div>

			<label for="register-form-consent" class="ak-checkbox consent-checkbox">
				<input type="checkbox" name="consent" id="register-form-consent">
				<span><?= sprintf(__('I have read and agree website <a href="%s">Terms and conditions</a>', 'anomeo'), esc_url(get_permalink(84))); ?></span>
			</label>

			<?php do_action('woocommerce_register_form_end'); ?>

		</form>

	</div>

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>