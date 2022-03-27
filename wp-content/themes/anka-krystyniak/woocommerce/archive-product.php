<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<? if (!is_search()) : ?>
	<header class="ak-page__title-row">
		<h1 class="title"><?php woocommerce_page_title(); ?></h1>
	</header>
<? else : ?>
	<header class="ak-page__title-row ak-page__title-row--search">
		<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
			<input type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__('Type the phrase', 'anka-krystyniak'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="search-close"><? _e('Close', 'anka-krystyniak'); ?></a>
			<input type="hidden" name="post_type" value="product" />
		</form>
	</header>
<? endif; ?>
<?php
if (woocommerce_product_loop()) { ?>

	<section class="ak-products__filters-row">
		<div class="filter-col">
			<button id="filter-toggle-btn" class="filters-toggle-btn"><? _e('Filters', 'anka-krystyniak'); ?></button>

			<div class="active-filters">
				<?php dynamic_sidebar('active-filters-sidebar'); ?>
			</div>
		</div>

		<div class="sort-col">
			<? if (get_current_orderby_method()) : ?>
				<div class="active-orderby-option">
					<?= get_current_orderby_method(); ?>
				</div>
			<? endif; ?>
			<button class="filters-toggle-btn" id="sort-toggle-btn"><? _e('Sort', 'anka-krystyniak'); ?></button>
		</div>


		<button id="product-grid-view-toggle" class="filters-toggle-btn ak-products__grid-view-toggle"><? _e('Change layout', 'anka-krystyniak'); ?></button>

		<div class="ak-filters-popup filter-row-popup">
			<?php dynamic_sidebar('filters-sidebar'); ?>
		</div>
		<div class="ak-sort-popup filter-row-popup">
			<? woocommerce_catalog_ordering(); ?>
		</div>


	</section>
	<? if (is_filtered()) : ?>
		<div class="ak-products__mobile-active-filters-row">
			<?php dynamic_sidebar('active-filters-sidebar'); ?>
		</div>
	<? endif; ?>
<?php
	ak_product_loop_start(2);

	if (wc_get_loop_prop('total')) {
		while (have_posts()) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');
		}
	}

	ak_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer('shop');
