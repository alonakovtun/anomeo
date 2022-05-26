<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anomeo
 */

?>

<div class="ak-popups-overlay"></div>
<footer id="colophon" class="site-footer">

	<? get_template_part('template-parts/newsletter-section'); ?>
	<div class="footer-top">
		<div class="newsletter">
			<p class="newsletter_text">
				<?php _e('Sign up to our newsletter and stay update', 'anomeo')?>
			</p>
			<a class="open__newsletter"><span class="icon icon-open"></a>
			<div class="form-newsletter">
				<input type="email" class="newsletter-input" placeholder="<?php _e('Email', 'anomeo') ?>">

				<div class="accept">
					<label for="checkout-form-consent" class="ak-checkbox consent-checkbox checkout-consent-checkbox">
						<input type="checkbox" name="checkout-form-consent" id="checkout-form-consent">
						<span class="checkbox"><?= sprintf(__('I accept <a href="/privacy-policy/">Privacy Policy</a>', 'anomeo')); ?></span>
					</label>
				</div>
			</div>
		</div>
		<div class="contact">
			<p class="contact_text footer-title">
				Contact Us
			</p>
			<ul class="footer-list">
				<li class="footer-list-item"><a href="mailto:customercare@anomeo.com">customercare@anomeo.com</a></li>
				<li class="footer-list-item"><a href="tel:123456789">/SG/ +65 6407 5414</a></li>
				<li class="footer-list-item"><a href="tel:123456789">/MY/ +60 3 9212 5495</a></li>
				<li class="footer-list-item"><a href="tel:123456789">/ID/ +62 855 7467 4602</a></li>
				<li class="footer-list-item"><a href="tel:123456789">/NZ/ +64 0 801 1145</a></li>
				<li class="footer-list-item"><a href="tel:123456789">/AU/ +61 2 7908 2644</a></li>
			</ul>
		</div>
		<div class="customer_service">
			<p class="contact_text footer-title">
				Customer Service
			</p>
			<ul class="footer-list">
				<li class="footer-list-item"><a href="#"><?php _e('FAQ', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="/find-us/"><?php _e('Find Us', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="#"><?php _e('Order Tracking', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="/delivery/"><?php _e('Delivery', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="/refund_returns/"><?php _e('Returns', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="/privacy-policy/"><?php _e('Privacy Policy', 'anomeo')?></a></li>
				<li class="footer-list-item"><a href="/terms-conditions/"><?php _e('Terms & Conditions', 'anomeo')?></a></li>
			</ul>
		</div>
		<div class="follow">
			<p class="contact_text footer-title">
				Follow Us
			</p>
			<ul class="footer-list">
				<li class="footer-list-item"><a href="#"><span class="icon icon-instagram"></a></li>
				<li class="footer-list-item"><a href="#"><span class="icon icon-facebook"></a></li>
			</ul>
			<a class="language" href="">Change language</a>
		</div>

	</div>

	<div class="site-footer__menu">
		<div class="r-wrap">
			<ul>
				<li class="menu-item menu-item-mobile-only">
					<p><span class="copyright">© </span>2022. Anomeo. All rights reserved</p>
				</li>

				<li class="menu-item menu-item-studio-link">
					<a href="https://parishendzelstudio.com" target="_blank" rel="noopener">by PH STUDIO</a>
				</li>
			</ul>
		</div>
	</div>
</footer><!-- #colophon -->
</main><!-- #main -->
</div><!-- #page -->
<? ak_site_cookies_banner(); ?>
<? get_template_part('template-parts/photoswipe-root'); ?>
<?php wp_footer(); ?>

</body>

</html>