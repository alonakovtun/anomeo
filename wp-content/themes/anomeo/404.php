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
		<p><? _e('The resource requested could not be found on this server.', 'anomeo'); ?></p>
	</div>
</section>


<?php
get_footer();
