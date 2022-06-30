<?php

/**
 * Template part for displaying checkout login form
 *
 * @package anomeo
 */

?>

<div class="ak-page__title-row">
    <h1 class="title"><?= get_the_title(); ?></h1>
</div>

<div class="ak-customer-login-form ak-checkout-login-form" id="customer_login">
    <div class="login-box">

        <div class="form-wraper col-1">

            <div class="page-title__container">
                <p class="page-title__subtitle "><?php esc_html_e('Login', 'anomeo'); ?></p>
            </div>

            <? get_template_part('template-parts/checkout-login-form'); ?>

        </div>

        <div class="form-wraper col-2">

            <div class="page-title__container">
                <p class="page-title__subtitle "><?php esc_html_e('Purchase as a guest', 'anomeo'); ?></p>
            </div>

            <div class="log-in__input-data">
                <p class="log-in__right-mess"><?php _e('Shop with us without registration', 'anomeo')?>
                </p>
            </div>

            <a id="continue-to-checkout-btn" class="woocommerce-button button woocommerce-form-login__submit button__trigger-checkout">
                <?php esc_html_e('CONTINUE', 'hedo'); ?>
            </a>


        </div>
    </div>

</div>