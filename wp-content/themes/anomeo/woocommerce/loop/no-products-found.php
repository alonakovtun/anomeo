<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="nothing-found-text-wrap">
<div class="page-title__container search-notfound">
		<h1 class="page-title__title"><? _e('Search', 'anomeo'); ?></h1>
		<p class="page-title__subtitle "><? _e('No results for: ', 'anomeo'); ?> <span class="search-title"><?php echo get_search_query(); ?></span></p>
		
	</div>
</div>
