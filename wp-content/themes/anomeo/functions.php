<?php

/**
 * anomeo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anomeo
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('anomeo_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function anomeo_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on anomeo, use a find and replace
		 * to change 'anomeo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('anomeo', get_template_directory() . '/languages');

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
				'mobile-bottom-menu' => esc_html__('Mobile bottom menu', 'anomeo'),
				'header-menu' => esc_html__('Header menu', 'anomeo'),
				'header-menu2' => esc_html__('Header menu2', 'anomeo'),
				'mobile-menu' => esc_html__('Mobile menu', 'anomeo'),
				'footer-menu' => esc_html__('Footer menu', 'anomeo'),
				'footer-menu-contact' => esc_html__('Footer menu contact us', 'anomeo'),
				'terms-menu'  => esc_html__('Terms menu', 'anomeo'),
				'blog-categories-menu' => esc_html__('Blog categories menu', 'anomeo'),
			)
		);

		register_sidebar(array(
			'name'          => __('Filters sidebar', 'anomeo'),
			'id'            => 'filters-sidebar',
			'before_widget' => '<aside id="%1$s" class="ak-filter-widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		));

		register_sidebar(array(
			'name'          => __('Active filters sidebar', 'anomeo'),
			'id'            => 'active-filters-sidebar',
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		));

		function rmc_sidebar_init() {

		register_sidebar( array(
			'name' => __( 'Your Sidebar Name', 'wpb' ),
			'id' => 'your-sidebar-1',
			'description' => __( 'This is your sidebar description.', 'rmc' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

}

add_action( 'widgets_init', 'rmc_sidebar_init' );

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
add_action('after_setup_theme', 'anomeo_setup');

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

/**
 * Custom currency and currency symbol
 */
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
     $currencies['ABC'] = __( 'Currency name', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'ABC': $currency_symbol = '£'; break;
     }
     return $currency_symbol;
}



//new
if ( ! function_exists( 'yith_wcwl_custom_remove_from_wishlist_label' ) ) {
	function yith_wcwl_custom_remove_from_wishlist_label( $label ) {
		return ' ';
	}
	add_filter( 'yith_wcwl_remove_from_wishlist_label', 'yith_wcwl_custom_remove_from_wishlist_label' );
}

add_filter('jpeg_quality', function($arg){return 100;});

function my_category_description($container = ''){
	$content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
	$editor_id = 'tag_description';
	$settings = 'description';
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="description">Description</label></th>
	<td><?php wp_editor($content, $editor_id, array(
	'textarea_name' => $settings,
	'editor_css' => '<style>.html-active .wp-editor-area{border:0;}</style>',
	)); ?><br />
	<span class="description">The description is not prominent by default; however, some themes may show it.</span></td>
	</tr>
	<?php
	}
	remove_filter( 'pre_term_description', 'wp_filter_kses' );
	remove_filter( 'term_description', 'wp_kses_data' );
	function my_remove_category_description(){
	global $mk_description;
	if ( $mk_description == 'edit-category' or 'edit-tag' ){
	?>
	<script type="text/javascript">
	jQuery(function($) {
	$('textarea#description').closest('tr.form-field').remove();
	});
	</script>
	<?php
	}
	}
	add_action('admin_head', 'my_remove_category_description');    
	add_filter('edit_category_form_fields', 'my_category_description');   
	add_filter('edit_tag_form_fields', 'my_category_description');      

	add_action( 'current_screen', function() { remove_all_filters( 'woocommerce_admin_disabled' ); }, 20, 1 );


	add_filter( 'woocommerce_package_rates', 'bbloomer_unset_shipping_when_free_is_available_all_zones', 9999, 2 );
   
function bbloomer_unset_shipping_when_free_is_available_all_zones( $rates, $package ) {
   $all_free_rates = array();
   foreach ( $rates as $rate_id => $rate ) {
      if ( 'free_shipping' === $rate->method_id ) {
         $all_free_rates[ $rate_id ] = $rate;
         break;
      }
   }
   if ( empty( $all_free_rates )) {
      return $rates;
   } else {
      return $all_free_rates;
   } 
}

