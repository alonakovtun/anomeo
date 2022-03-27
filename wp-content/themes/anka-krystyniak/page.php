<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anka-krystyniak
 */

get_header();
while (have_posts()) : the_post(); ?>

	<div class="ak-page__title-row">
		<h1 class="title"><?= get_the_title(); ?></h1>
	</div>

	<section class="page__content-section">
		<div class="r-wrap">
			<div class="page__content">
				<? the_content(); ?>
			</div>
		</div>
	</section>

<?php
endwhile;
get_footer();
