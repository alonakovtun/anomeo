<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<div class="ak-page__title-row">
	<h1 class="title">
		<? _e('Account details', 'woocommerce'); ?>
	</h1>
</div>


<form class="ak-my-account__edit-account woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>
<div>
		</div>
	<?php do_action('woocommerce_edit_account_form_start'); ?>
	
	<div class="col">
		<div class="account-main-title">
					<p class="account-title">Account</p>
					<p class="address-title">Account details</p>
		</div>
		<p class="col-title">
			<?php esc_html_e('Personal details', 'anomeo'); ?>
			<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
			<button type="submit" class="button form-submit-btn" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save', 'woocommerce'); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>

		<p class="form-row form-row-first">
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" placeholder="<? _e('Name', 'anomeo'); ?>" value="<?php echo esc_attr($user->first_name); ?>" />
		</p>
		<p class="form-row form-row-last">
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" placeholder="<? _e('Surname', 'anomeo'); ?>" value="<?php echo esc_attr($user->last_name); ?>" />
		</p>

		<p class="form-row form-row-wide">
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" placeholder="<? _e('Email', 'anomeo'); ?>" value="<?php echo esc_attr($user->user_email); ?>" />
		</p>
	</div>

	<div class="col">
	<div class="account-main-title hidden">
					<p class="account-title">Account</p>
					<p class="address-title">Account details</p>
		</div>
		<p class="col-title">
			<?php esc_html_e('Password', 'woocommerce'); ?>
			<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
			<button type="submit" class="button form-submit-btn" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save', 'woocommerce'); ?></button>
			<input type="hidden" name="action" value="save_account_details" />

		</p>
		
		<p class=" form-row form-row-wide">
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" placeholder="<? _e('Current password', 'woocommerce'); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" placeholder="<? _e('New password', 'woocommerce'); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" placeholder="<? _e('Confirm new password', 'woocommerce'); ?>" />
		</p>

		<?php do_action('woocommerce_edit_account_form'); ?>
		
	</div>




	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>