<?php

/**
 * Template name: Checkout page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anka-krystyniak
 */


get_header();
while (have_posts()) : the_post(); ?>

    <div class="ak-page__title-row">
        <h1 class="title"><?= get_the_title(); ?></h1>
    </div>

    <section class="page__content-section">
        <? the_content(); ?>
    </section>

<?php
endwhile;
get_footer();
