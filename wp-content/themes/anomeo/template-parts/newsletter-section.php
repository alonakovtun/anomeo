<?php

/**
 * Template part for displaying newsletter section
 *
 * @package anomeo
 */

?>

<div class="newsletter-section">
    <div class="newsletter-section__text-wrap">
        <p><? _e('Want to be informed about news and promotions?', 'anomeo') ?></p>

        <button id="newsletter-open-form-btn" class="button button--link"><? _e('Subscribe to newsletter', 'anomeo') ?></button>
    </div>

    <form class="newsletter-section__form" name="subscribe_newsletter" action="" method="POST">
        <input type="email" class="input-text" name="email" id="newsletter_email" autocomplete="email" placeholder="<?php esc_html_e('Enter your email address', 'anomeo'); ?>" />
        <button type="submit" id="newsletter-subscribe-btn" class="button button--link disabled"><? _e('Send', 'anomeo') ?></button>

        <label for="newsletter-consent" class="ak-checkbox consent-checkbox">
            <input type="checkbox" name="consent" id="newsletter-consent">
            <span><? _e('By proceeding I accept the', 'anomeo'); ?> <a href="<?= apply_filters('wpml_permalink', get_permalink(get_page_by_path('regulamin'))); ?>"><? _e('Terms & conditions', 'anomeo'); ?></a></span>
        </label>
    </form>

</div>