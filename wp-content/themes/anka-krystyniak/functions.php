<?php

/**
 * anka-krystyniak functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anka-krystyniak
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('anka_krystyniak_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function anka_krystyniak_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on anka-krystyniak, use a find and replace
		 * to change 'anka-krystyniak' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('anka-krystyniak', get_template_directory() . '/languages');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		register_nav_menus(
			array(
				'mobile-bottom-menu' => esc_html__('Mobile bottom menu', 'anka-krystyniak'),
				'header-menu' => esc_html__('Header menu', 'anka-krystyniak'),
				'footer-menu' => esc_html__('Footer menu', 'anka-krystyniak'),
				'terms-menu'  => esc_html__('Terms menu', 'anka-krystyniak'),
				'blog-categories-menu' => esc_html__('Blog categories menu', 'anka-krystyniak'),
			)
		);

		register_sidebar(array(
			'name'          => __('Filters sidebar', 'anka-krystyniak'),
			'id'            => 'filters-sidebar',
			'before_widget' => '<aside id="%1$s" class="ak-filter-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		));

		register_sidebar(array(
			'name'          => __('Active filters sidebar', 'anka-krystyniak'),
			'id'            => 'active-filters-sidebar',
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Hide admin bar
		show_admin_bar(false);
	}
endif;
add_action('after_setup_theme', 'anka_krystyniak_setup');

/**
 * Woocommerce related functions
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Security functions
 */
require get_template_directory() . '/inc/security.php';

/**
 * Optimization functions
 */
require get_template_directory() . '/inc/optimization.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * AJAX functions
 */
require get_template_directory() . '/inc/ajax-functions.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * ACF related functions
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Wishlist functions
 */
require get_template_directory() . '/inc/user-wishlist.php';


/**
 * Mailpoet functions
 */
require get_template_directory() . '/inc/mailpoet-subscribe.php';