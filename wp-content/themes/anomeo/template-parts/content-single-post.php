<?php

/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anomeo
 */

?>

<? if (get_the_content()) : ?>

    <section class="post-content__section post-content__section--one_image_horizontal">
        <? the_post_thumbnail('', ['class' => 'post-content__image']); ?>
    </section>

    <section class="post-content__section post-content__section--text">

        <div class="text-box text-box--left">
            <a class="back" onclick="window.history.go(-1); return false;"><? _e('Back to list', 'anomeo'); ?></a>
            <? $categories = get_the_category();
            if (!empty($categories)) {
                echo '<a class="category-name" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
            } ?>
        </div>
        <div class="text-box text-box--right">
            <p class="post-date"><?php the_field('date'); ?></p>
            <p class="post-title"><? the_title() ?></p>
            <?php the_field('post_content1'); ?>


        </div>

    </section>
    <div class="post-content-img">
        <?php
        $post_image1 = get_field('post_image1');
        $post_image2 = get_field('post_image2');
        if ((!empty($post_image1)) || (!empty($post_image2))) : ?>
            <img src="<?php echo esc_url($post_image1); ?>" />
            <img src="<?php echo esc_url($post_image2); ?>" />

        <?php endif; ?>
    </div>
    <section class="post-content__section post-content__section--text">

        <div class="text-box text-box--left">
        </div>
        <div class="text-box text-box--right">
            <?php the_field('post_content2'); ?>
        </div>
    </section>
    <?php
    $image = get_field('footer_post_image');
    if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image); ?>" />
    <?php endif; ?>

<? endif; ?>


<?
$related_posts = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID)));

if ($related_posts) : ?>
    <div class="related-posts desktop">
        <p class="section-title"><? _e('Related arcticles', 'anomeo'); ?></p>

        <div class="related-posts__grid">
            <? foreach ($related_posts as $rel_post) {
                $post_object = get_post($rel_post->ID);

                setup_postdata($GLOBALS['post'] = &$post_object);
                get_template_part('template-parts/content', 'post');
            } ?>
        </div>
    </div>
    <div class="related-posts mobile">
        <p class="section-title"><? _e('Related arcticles', 'anomeo'); ?></p>
        <div class="bottom">
            <div class="related-post__button-prev"></div>
            <div class="related-post__button-next">
                <p><? _e('Next article', 'anomeo'); ?></p>
                <img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg" alt="">
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="related-posts__grid">
            <div class="swiper-container related-post">
                <div class="swiper-wrapper">
                    <? foreach ($related_posts as $rel_post) {
                        $post_object = get_post($rel_post->ID);

                        setup_postdata($GLOBALS['post'] = &$post_object);

                        get_template_part('template-parts/content', 'post-mobile');
                    } ?>
                </div>
            </div>

        </div>
    </div>
<? endif; ?>