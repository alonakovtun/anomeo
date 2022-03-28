<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anka-krystyniak
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="JSHuIsfCNPggH2r6KvzlLkNvPJ6mYd4Gya8Q-wvkAEM" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link  rel="stylesheet"  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/FoundersGrotesk-Medium.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/FoundersGrotesk-Light.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/Recoleta-Regular.woff2" as="font" type="font/woff2" crossorigin>

	<?php wp_head(); ?>

	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-46126759-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-46126759-1');
	</script>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5BL8QWH');
	</script>
	<!-- End Google Tag Manager -->

	<style>
		:root {
			<? if (get_field('theme_accent_color', 'option')) : ?>--ak-accent-color: <?= get_field('theme_accent_color', 'option'); ?>;
			<? endif; ?>
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BL8QWH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="page" class="site">
		<? ak_site_top_banner(); ?>

		<header id="masthead" class="site-header <?= is_front_page() ? 'site-header--big-logo-enabled' : ''; ?>">
			<div class="r-wrap">
				<div id="header-inner" class="site-header__inner">
					<ul class="site-header__left-menu">

						<?
						wp_nav_menu(array(
							'theme_location' => 'header-menu',
							'container' => '',
							'items_wrap' => '%3$s'
						));
						?>

						<li class="menu-item"><a id="search-toggle" href=""><? _e('Search', 'anka-krystyniak'); ?></a></li>
					</ul>

					<div class="site-header__logo-col">
						<a href="<?= get_home_url(); ?>" class="logo-link">
							<img class="logo" src="<?= get_template_directory_uri(); ?>/assets/img/logo-text.svg" alt="Anka Krystyniak logo">
							<img class="big-logo" src="<?= get_template_directory_uri(); ?>/assets/img/logo-text.svg" alt="Anka Krystyniak logo">
						</a>
					</div>

					<ul class="site-header__right-menu">
						<li class="menu-item wishlist-menu-item"><a href="<?= wc_get_account_endpoint_url('wishlist'); ?>"><span class="icon"></span></a></li>
						<li class="menu-item"><a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><? _e('Account', 'anka-krystyniak'); ?></a></li>
						<li class="menu-item"><a id="multi-lang-popup-toggle" href=""><?= get_lang_menu_item_text(); ?></a></li>
						<li class="menu-item"><?= get_desktop_cart_icon(); ?></li>
					</ul>

					<ul class="site-header__mobile-col">
						<li class="menu-item"><?= get_mobile_cart_icon(); ?></li>
						<li class="menu-item">
							<a href="">
								<span id="mobile-menu-toggle" class="mobile-menu-icon">
									<span class="bar"></span>
									<span class="bar"></span>
									<span class="bar"></span>
								</span>
							</a>
						</li>
					</ul>

					<div class="site-header__popup site-header__search-popup">
						<? get_product_search_form(); ?>
					</div>

					<div class="site-header__popup site-header__multi-lang-popup">
						<div class="currency-col">
							<? get_currency_menu_list(); ?>
						</div>
						<div class="lang-col">
							<? get_lang_menu_list(); ?>
						</div>
					</div>

					<div class="site-header__popup site-header__cart-popup">
						<? woocommerce_mini_cart(); ?>
					</div>


				</div>
			</div>
		</header><!-- #masthead -->
		<div class="ak-mobile-menu-popup">
			<ul class="ak-mobile-menu-popup__menu">
				<li class="menu-item mobile-search-item">
					<? get_mobile_product_search_form(); ?>
				</li>
				<?
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
				?>

				<? if (is_user_logged_in()) : ?>
					<li class="menu-item menu-item-has-children <?= is_account_page() ? 'current-menu-item' : '' ?>">
						<a href=""><? _e('Account', 'anka-krystyniak'); ?></a>

						<ul class="sub-menu">
							<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
								<li class="menu-item <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
									<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				<? else : ?>
					<li class="menu-item <?= is_account_page() ? 'current-menu-item' : '' ?>"><a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><? _e('Account', 'anka-krystyniak'); ?></a></li>
				<? endif; ?>

				<? get_mobile_change_lang_link(); ?>

				<li class="menu-item menu-item-has-children">
					<a href=""><? _e('Currency', 'anka-krystyniak'); ?></a>

					<ul class="sub-menu">
						<li class="menu-item currency-menu-item">
							<? get_currency_menu_list(); ?>
						</li>
					</ul>
				</li>

				<?
				wp_nav_menu(array(
					'theme_location' => 'mobile-bottom-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
				?>
			</ul>
			<div class="submenu-content-popup">
				<button class="back-btn"><span class="back-icon"></span></button>

				<div class="content"></div>
			</div>
		</div>

		<main id="primary" class="site-main" style="opacity: 0;">