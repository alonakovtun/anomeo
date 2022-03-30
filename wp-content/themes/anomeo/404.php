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
		<p class="error-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra dignissim nisl et imperdiet. In in tincidunt velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus placerat, tortor sed aliquam porta, lectus velit bibendum ante, sit amet lacinia ante dolor at turpis. Maecenas in augue in orci mollis porta sit amet non tellus. Etiam egestas lacinia enim eget dapibus. Donec venenatis consectetur leo, nec sollicitudin sapien. Integer aliquet hendrerit faucibus. Etiam tincidunt nec nulla et porta. Ut condimentum aliquam consequat. Pellentesque tristique ante sed lectus laoreet tincidunt. Mauris sapien nibh, rutrum sit amet enim in, rutrum rutrum quam.</p>
	</div>
</section>


<?php
get_footer();
