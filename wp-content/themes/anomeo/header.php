<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anomeo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="JSHuIsfCNPggH2r6KvzlLkNvPJ6mYd4Gya8Q-wvkAEM" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/DIN_Pro_Bold.otf" as="font" type="font/opentype" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/DIN_Pro_Light.otf" as="font" type="font/opentype" crossorigin>
	<link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/fonts/DIN_Pro.otf" as="font" type="font/opentype" crossorigin>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<?php wp_head(); ?>

	<style>
		:root {
			<? if (get_field('theme_accent_color', 'option')) : ?>--ak-accent-color: <?= get_field('theme_accent_color', 'option'); ?>;
			<? endif; ?>
		}
	</style>

	<script>
		jQuery(window).on('load', function() {
        jQuery('#loading').css('opacity', '0');
        jQuery('#loading').css('visibility', 'hidden');
  
      })
	</script>
</head>

<body <?php body_class(); ?>>
<div id="loading"></div>
	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="r-wrap">
				<div id="header-inner" class="site-header__inner">
					<div class="site-header__logo-col">
						<a href="<?= get_home_url(); ?>" class="logo-link">
							<img class="logo" src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Anomeo logo">
							<img class="big-logo" src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Anomeo logo">
						</a>
					</div>

					<ul class="site-header__left-menu">
						<li class="menu-item menu-item-open">
							<a class="menu-item-open__link">
								<? _e('Shop', 'anomeo'); ?>
							</a>
							<ul class="site-header__left-menu sub-menu first">
								<?
								wp_nav_menu(array(
									'theme_location' => 'header-menu',
									'container' => '',
									'items_wrap' => '%3$s'
								));
								?>
							</ul>
						</li>

						<li class="menu-item menu-item-open about-menu-item">
							<a class="menu-item-open__link">
								<? _e('About', 'anomeo'); ?>
							</a>
							<ul class="site-header__left-menu sub-menu sub-menu__about">
								<?
								wp_nav_menu(array(
									'theme_location' => 'header-menu2',
									'container' => '',
									'items_wrap' => '%3$s'
								));
								?>
							</ul>
						</li>




					</ul>


					<ul class="site-header__right-menu">
						<li class="menu-item icon-menu-item">
							<a href="<?= wc_get_account_endpoint_url('wishlist'); ?>"><span class="icon icon-wishlist"></span></a>
							<p class="text"><? _e('Wishlist', 'anomeo'); ?></p>

						</li>
						<li class="menu-item icon-menu-item">
							<a id="search-toggle" href=""><span class="icon icon-search "></span></a>
							<p class="text"><? _e('SEARCH', 'anomeo'); ?></p>
						</li>
						<li class="menu-item icon-menu-item">
							<a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><span class="icon icon-account"></span></a>
							<p class="text"><? _e('ACCOUNT', 'anomeo'); ?></p>
						</li>
						<li class="menu-item icon-menu-item cart-item">
							<?= get_desktop_cart_icon(); ?>
							<p class="text"><? _e('Bag', 'anomeo'); ?></p>

						</li>

					</ul>

					<ul class="site-header__mobile-col">
						<li class="menu-item icon-menu-item"><?= get_mobile_cart_icon(); ?></li>
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

					


				</div>
			</div>
		</header><!-- #masthead -->
		<div class="site-header__popup site-header__cart-popup">
						<? woocommerce_mini_cart(); ?>
					</div>
		<div class="ak-mobile-menu-popup">
			<ul class="ak-mobile-menu-popup__menu">
				<li class="menu-item mobile-search-item">
					<? get_mobile_product_search_form(); ?>
				</li>
				<?
				wp_nav_menu(array(
					'theme_location' => 'mobile-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
				?>

				
					<li class="menu-item <?= is_account_page() ? 'current-menu-item' : '' ?>"><a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><? _e('Account', 'anomeo'); ?></a></li>
				
					<?
				wp_nav_menu(array(
					'theme_location' => 'footer-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
				?>
			</ul>
		</div>
		
		<main id="primary" class="site-main">

		