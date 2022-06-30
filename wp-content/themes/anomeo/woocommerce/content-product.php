<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<div <?php wc_product_class('ak-product-item', $product); ?>>

	<?= get_wishlist_button(); ?> 
	<div class="tag"> 
	<?php
		if( get_field('sale') ) { ?>
			<span class="tag-item">sale</span>
		<? } ?>
	</div>
	<div class="colors">
<? add_action('woocommerce_after_shop_loop_item_title', 'display_shop_loop_product_attributes');?>
	</div>

	<a href="<?= get_the_permalink(); ?>" class="ak-product-item__link">

		<div class="ak-product-item__image-wrap">
			<?php
			$prd = wc_get_product($post->ID);
			$attachment_ids = $prd->get_gallery_image_ids();
			$hover_img      = wp_get_attachment_image_src($attachment_ids[0], $image_size);
			?>
			<div class="_first">
				<img class="product-image" src="<?= get_the_post_thumbnail_url($prd->get_id()); ?>" alt="" />
			</div>
			<div class="_second">
				<img class="product-image" src="<?= wp_get_attachment_url($attachment_ids[0]); ?>" alt="" />
			</div>
		</div>


		<div class="ak-product-item__description">
			<p class="title"><?= get_the_title(); ?></p>

			<? wc_get_template('loop/price.php'); ?>

		</div>

		<div class="product-color">

					<?php if (have_rows('color_links')) : ?>
						<?php while (have_rows('color_links')) : the_row(); ?>
							<?php
							$post_object = get_sub_field('color_product_link');
							$color = get_sub_field('color');
							$current_color = get_sub_field('current_color');

							?>
							<?php if ($post_object) : ?>
								<?php // override $post
								$post = $post_object;
								$permalink = get_permalink($post_object->ID);
								setup_postdata($post);
								?>
								<? if ($current_color) : ?>
									<a class="color-block" href="<?php echo esc_url($permalink); ?>">
										<div class="color-item" style="background-color:<?php echo $color ?> "></div>
									</a>
								<? else : ?>
									<a class="color-block not_active" href="<?php echo esc_url($permalink); ?>">
										<div class="not-current-color color-item" style="background-color:<?php echo $color ?> "></div>
									</a>
								<? endif ?>
								<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
								?>

							<?php endif; ?>


						<?php endwhile; ?>

					<?php endif; ?>

					<?php if (have_rows('color_links')) : ?>
						<?php while (have_rows('color_links')) : the_row();

							$color_name = get_sub_field('color_name');
							$current_color = get_sub_field('current_color'); ?>

							<? if ($current_color) : ?>
								<p class="color-name"><? echo $color_name ?></p>
							<? endif ?>

						<?php endwhile; ?>

					<?php endif; ?>
				</div>

		<div class="ak-product-item__featured-cats-wrapper">
			<?= get_product_featured_categories_list($product->get_id()); ?>
		</div>
	</a>
</div>