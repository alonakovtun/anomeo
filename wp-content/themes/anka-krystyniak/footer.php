<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anka-krystyniak
 */

?>

<div class="ak-popups-overlay"></div>
<footer id="colophon" class="site-footer">

	<? get_template_part('template-parts/newsletter-section'); ?>

	<div class="site-footer__menu">
		<div class="r-wrap">
			<ul>
				<li class="menu-item menu-item-mobile-only">
					<p><span class="copyright">© </span>ANKA KRYSTYNIAK 2012-<?= date("Y"); ?></p>
				</li>

				<?
				wp_nav_menu(array(
					'theme_location' => 'footer-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
				?>

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