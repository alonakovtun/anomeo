<?php

/**
 * Template part for displaying newsletter section
 *
 * @package anka-krystyniak
 */

?>

<div class="newsletter-section">
    <div class="newsletter-section__text-wrap">
        <p><? _e('Want to be informed about news and promotions?', 'anka-krystyniak') ?></p>

        <button id="newsletter-open-form-btn" class="button button--link"><? _e('Subscribe to newsletter', 'anka-krystyniak') ?></button>
    </div>

    <form class="newsletter-section__form" name="subscribe_newsletter" action="" method="POST">
        <input type="email" class="input-text" name="email" id="newsletter_email" autocomplete="email" placeholder="<?php esc_html_e('Enter your email address', 'anka-krystyniak'); ?>" />
        <button type="submit" id="newsletter-subscribe-btn" class="button button--link disabled"><? _e('Send', 'anka-krystyniak') ?></button>

        <label for="newsletter-consent" class="ak-checkbox consent-checkbox">
            <input type="checkbox" name="consent" id="newsletter-consent">
            <span><? _e('By proceeding I accept the', 'anka-krystyniak'); ?> <a href="<?= apply_filters('wpml_permalink', get_permalink(get_page_by_path('regulamin'))); ?>"><? _e('Terms & conditions', 'anka-krystyniak'); ?></a></span>
        </label>
    </form>

</div>