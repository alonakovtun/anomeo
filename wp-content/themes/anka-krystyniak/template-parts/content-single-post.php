<?php

/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anka-krystyniak
 */

?>

<div class="ak-page__title-row">
    <h1 class="title"><span><?= get_the_title(); ?></span> <span class="date-published"><?= get_the_date('d.m.Y'); ?></span></h1>
</div>

<? if (get_the_content()) : ?>
    <section class="post-content__section post-content__section--text">
        <div class="text-box text-box--left">

        </div>
        <div class="text-box text-box--right">
            <?= get_the_content(); ?>
        </div>
    </section>
    <section class="post-content__section post-content__section--one_image_horizontal">
        <? the_post_thumbnail('', ['class' => 'post-content__image']); ?>
    </section>
<? endif; ?>

<? if (have_rows('sections_repeater')) :
    while (have_rows('sections_repeater')) : the_row();
        $section_type = get_sub_field('section_type');
?>
        <section class="post-content__section post-content__section--<?= $section_type; ?>">
            <? if ($section_type == 'text') : ?>
                <div class="text-box text-box--left">
                    <?= get_sub_field('text_left'); ?>
                </div>
                <div class="text-box text-box--right">
                    <?= get_sub_field('text_right'); ?>
                </div>
            <? endif; ?>

            <? if ($section_type == 'one_image_horizontal' || $section_type == 'one_image_vertical') : ?>
                <img src="<? the_sub_field('first_image'); ?>" class="post-content__image" />
            <? endif; ?>

            <? if ($section_type == 'two_images_vertical') : ?>
                <div class="image-box">
                    <div class="post-content__image-wrap">
                        <img src="<? the_sub_field('first_image'); ?>" class="post-content__image" />
                    </div>
                </div>
                <div class="image-box">
                    <div class="post-content__image-wrap">
                        <img src="<? the_sub_field('second_image'); ?>" class="post-content__image" />
                    </div>
                </div>
            <? endif; ?>
        </section>
<? endwhile;
endif; ?>
<?
$related_posts = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID)));

if ($related_posts) : ?>
    <div class="related-posts">
        <p class="section-title"><? _e('Featured posts', 'anka-krystyniak'); ?></p>

        <div class="related-posts__grid">
            <? foreach ($related_posts as $rel_post) {
                $post_object = get_post($rel_post->ID);

                setup_postdata($GLOBALS['post'] = &$post_object);
                get_template_part('template-parts/content', 'post');
            } ?>
        </div>
    </div>
<? endif; ?>