<?php

/**
 * Template name: How to care page
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

    <section class="how-to-care-page__content">
        <? if (have_rows('care_items_list')) : ?>
            <div class="col">
                <? while (have_rows('care_items_list')) : the_row(); ?>
                    <? if (get_row_index() % 2 != 0) : ?>
                        <div class="care-guide-item <?= strlen(get_sub_field('description')) > 400 ? 'big' : ''; ?>">
                            <p class="title"><? the_sub_field('title'); ?></p>
                            <div class="description">
                                <? the_sub_field('description'); ?>
                            </div>
                        </div>
                    <? endif; ?>
                <? endwhile; ?>
            </div>
            <div class="col">
                <? while (have_rows('care_items_list')) : the_row(); ?>
                    <? if (get_row_index() % 2 == 0) : ?>
                        <div class="care-guide-item <?= strlen(get_sub_field('description')) > 400 ? 'big' : ''; ?>">
                            <p class="title"><? the_sub_field('title'); ?></p>
                            <div class="description">
                                <? the_sub_field('description'); ?>
                            </div>
                        </div>
                    <? endif; ?>
                <? endwhile; ?>
            </div>
        <? endif; ?>
    </section>

    <section class="how-to-care-page__content how-to-care-page__content--mobile">
        <? if (have_rows('care_items_list')) : ?>
            <? while (have_rows('care_items_list')) : the_row(); ?>

                <div class="care-guide-item <?= strlen(get_sub_field('description')) > 400 ? 'big' : ''; ?>">
                    <p class="title"><? the_sub_field('title'); ?></p>
                    <div class="description">
                        <? the_sub_field('description'); ?>
                    </div>
                </div>

            <? endwhile; ?>
        <? endif; ?>
    </section>

<?php
endwhile;
get_footer();
