<?php

/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__('Type the phrase', 'anka-krystyniak'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"></button>
	<input type="hidden" name="post_type" value="product" />
</form>
<? if (have_rows('search_suggestions_items', 'option')) : ?>
	<div class="search-form__suggestions">
		<p class="title"><? _e('Suggested', 'anka-krystyniak'); ?>:</p>

		<ul class="suggestions-list">
			<?php while (have_rows('search_suggestions_items', 'option')) : the_row();
				$link = get_sub_field('link');
				if ($link) :
					$link_url = $link['url'];
					$link_title = $link['title'];
			?>
					<li>
						<a href="<?= $link_url; ?>"><?= $link_title; ?></a>
					</li>
				<? endif; ?>
			<?php endwhile; ?>
		</ul>
	</div>
<? endif; ?>