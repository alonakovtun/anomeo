<?php

/**
 * Template part for displaying login form
 *
 * @package anka-krystyniak
 */

?>

<form class="ak-form ak-form--login" method="post">

    <?php do_action('woocommerce_login_form_start'); ?>

    <input class="input-text <?= get_invalid_form_field_class('username', 'login'); ?>" type="text" name="username" id="username" autocomplete="username" placeholder="<?php esc_html_e('Email', 'anka-krystyniak'); ?>" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />

    <input class="input-text <?= get_invalid_form_field_class('password', 'login'); ?>" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" />

    <?php do_action('woocommerce_login_form'); ?>

    <div class="form-row">
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
    </div>

    <div class="lost_password">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot password?', 'anka-krystyniak'); ?></a>

        <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="register-link"><?php esc_html_e('Register', 'woocommerce'); ?></a>
    </div>

    <?php do_action('woocommerce_login_form_end'); ?>

</form>