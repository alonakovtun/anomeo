<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="ak-page__breadcrumbs-row">
		<?= product_back_to_category_link(); ?>
	</div>
	<div class="ak-page__title-row">
		<h1 class="title"><?= get_the_title(); ?></h1>
		<p class="ak-product__price"><?= $product->get_price_html(); ?>&nbsp;</p>
	</div>

	<div class="ak-product__main-info">
		<div class="ak-product__main-info-col">
			<div class="single-product-slider">
				<div class="swiper-wrapper">

					<div class="swiper-slide single-product-slider__item">
						<?= woocommerce_get_product_thumbnail('full'); ?>
					</div>

					<?
					$attachment_ids = $product->get_gallery_image_ids();

					foreach ($attachment_ids as $attachment_id) { ?>
						<div class="swiper-slide single-product-slider__item">

							<?= wp_get_attachment_image($attachment_id, 'full'); ?>

						</div>
					<? } ?>
				</div>
				<div class="single-product-slider__button-next"></div>
			</div>

			<div class="ak-product__featured-cats-wrapper">
				<?= get_product_featured_categories_list($product->get_id()); ?>
			</div>

			<?= get_wishlist_button(); ?>
		</div>

		<div class="ak-product__main-info-col">
			<div class="ak-product__description">
				<? the_content(); ?>
			</div>

			<div class="ak-product__add-to-cart">
				<? woocommerce_template_single_add_to_cart(); ?>
			</div>

			<div class="ak-product__additional-info">
				<? if (have_rows('product_additional_description_items', 'option')) : ?>
					<? while (have_rows('product_additional_description_items', 'option')) : the_row(); ?>
						<div class="product-info-item" data-title='<? the_sub_field('title'); ?>' data-description=' <? the_sub_field('description'); ?>'>
							<span class="item-text"><? the_sub_field('title'); ?></span>
						</div>
					<? endwhile; ?>

					<div class="description-popover">
						<p class="title"></p>
						<div class="description"></div>
					</div>
				<? endif; ?>
			</div>
		</div>
	</div>

	<? woocommerce_output_related_products(); ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>