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
</main><!-- #main -->
<footer id="colophon" class="site-footer">

	<? get_template_part('template-parts/newsletter-section'); ?>
	<div class="footer-top">
		<?php //echo do_shortcode('[mc4wp_form id="731"]') 
		?>

		<!-- Begin Mailchimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup {
				background: #fff;
				clear: left;
				font: 14px Helvetica, Arial, sans-serif;
				width: 600px;
			}

			/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup" class="footer-newsletter">
			<form action="https://travel-blue.us10.list-manage.com/subscribe/post?u=29461db69912d5bc0a242974f&amp;id=bf20a93a0e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll" class=" newsletter subscribe">
					<p class="newsletter_text">Sign up to our newsletter and stay update</p>
					<a class="open__newsletter"><span class="icon icon-open"></a>
					<div class="form-newsletter">
						<div class="mc-field-group">

							<input type="email" value="" name="EMAIL" class="required email newsletter-input" id="mce-EMAIL" placeholder="Email">
						</div>
						<div id="mce-responses" class="clear foot">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_29461db69912d5bc0a242974f_bf20a93a0e" tabindex="-1" value=""></div>
						<div class="optionalParent">
							<div class="clear foot">
								<input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="send">
							</div>
						</div>

						<div class="accept">
							<label for="checkout-form-consent" class="ak-checkbox newsletter-checkbox consent-checkbox checkout-consent-checkbox">
								<input type="checkbox" name="checkout-form-consent" id="checkout-form-consent">
								<span class="checkbox">I accept <a href="/privacy-policy/">Privacy Policy</a></span>
							</label>

						</div>
					</div>

				</div>
			</form>
		</div>
		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
		<script type='text/javascript'>
			(function($) {
				window.fnames = new Array();
				window.ftypes = new Array();
				fnames[0] = 'EMAIL';
				ftypes[0] = 'email';
				fnames[1] = 'FNAME';
				ftypes[1] = 'text';
				fnames[2] = 'LNAME';
				ftypes[2] = 'text';
				fnames[3] = 'ADDRESS';
				ftypes[3] = 'address';
				fnames[4] = 'PHONE';
				ftypes[4] = 'phone';
				fnames[5] = 'BIRTHDAY';
				ftypes[5] = 'birthday';
			}(jQuery));
			var $mcj = jQuery.noConflict(true);
		</script>
		<!--End mc_embed_signup-->




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
				<li class="footer-list-item faq"><a href="#"><?php _e('FAQ', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="/find-us/"><?php _e('Find Us', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="#"><?php _e('Order Tracking', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="/delivery/"><?php _e('Delivery', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="/refund_returns/"><?php _e('Returns', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="/privacy-policy/"><?php _e('Privacy Policy', 'anomeo') ?></a></li>
				<li class="footer-list-item"><a href="/terms-conditions/"><?php _e('Terms & Conditions', 'anomeo') ?></a></li>
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
			<!-- <a class="language" href="">Change language</a> -->
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

</div><!-- #page -->
<? ak_site_cookies_banner(); ?>
<? get_template_part('template-parts/photoswipe-root'); ?>
<?php wp_footer(); ?>

</body>

</html>