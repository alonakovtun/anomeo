<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package anomeo
 */

get_header();
?>

<div class="ak-page__title-row">
	<h1 class="title"><? _e('404 page not found', 'anomeo'); ?></h1>
</div>

<section class="error-404 not-found">
	<div class="content-wrap">
		<p class="error-title"> ERROR 404 / <? _e('Page not found.', 'anomeo'); ?></p>
		<p class="error-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
	</div>
</section>


<?php
get_footer();
