<?php

/**
 * Template part for displaying newsletter section
 *
 * @package anomeo
 */

?>

<div class="newsletter-section">
    <!-- <div class="newsletter-section__text-wrap">
        <p><? _e('Get -15% for Your first shopping.', 'anomeo') ?></p>
        <div class="btn-close"></div>
    </div> -->

    <!-- <form class="newsletter-section__form" name="subscribe_newsletter" action="" method="POST">
        <input type="email" class="input-text" name="email" id="newsletter_email" autocomplete="email" placeholder="<?php esc_html_e('E-mail', 'anomeo'); ?>" />
        <button type="submit" id="newsletter-subscribe-btn" class="button button--link disabled"><? _e('SUBSCRIBE', 'anomeo') ?></button>

        <label for="newsletter-consent" class="ak-checkbox consent-checkbox">
            <input type="checkbox" name="consent" id="newsletter-consent">
            <span><? _e('I accept Privacy Policy and Cookies Policy', 'anomeo'); ?></a></span>
        </label>
    </form> -->

    <?php echo do_shortcode('[mc4wp_form id="731"]') ?>

    <!-- <div class="newsletter-popup">

        <input type="email" name="EMAILL" required="" class="input-text" id="newsletter_email" autocomplete="email" placeholder="E-mail" />
<input type="submit" value="Subscribe" id="newsletter-subscribe-btn" class="button button--link disabled">
        <label for="newsletter-consent" class="ak-checkbox consent-checkbox">
            <input type="checkbox" name="consent" id="newsletter-consent">
            <span>I accept Privacy Policy and Cookies Policy</a></span>
        </label>-->
    
</div> 
</div>