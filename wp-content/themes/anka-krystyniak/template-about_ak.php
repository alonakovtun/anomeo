<?php

/**
 * Template name: About-AK page
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

    <section class="about-ak-page__content <?= has_post_thumbnail() ? '' : 'no-image' ?>">
        <div class="col col-left">
            <? the_field('left_column_content'); ?>
        </div>
        <div class="col col-right">
            <? the_content(); ?>
        </div>
    </section>

    <? the_post_thumbnail('', ['class' => 'about-ak-page__image']); ?>

<?php
endwhile;
get_footer();
