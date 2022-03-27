<?php

/**
 * Template name: Contact page
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

    <section class="contact-page__order-online">
        <? the_content(); ?>
    </section>

    <section class="contact-page__stores">
        <? while (have_rows('stores_list')) : the_row(); ?>
            <div class="store-item">
                <? the_sub_field('description'); ?>
            </div>
        <? endwhile; ?>
    </section>

<?php
endwhile;
get_footer();
