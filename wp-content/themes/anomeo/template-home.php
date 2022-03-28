<?php

/**
 * Template name: Home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header();
while (have_posts()) : the_post(); ?>

    <section class="home-top-slider fullwidth-slider">
        <div class="swiper-wrapper">
            <? if (have_rows('top_slider')) :
                while (have_rows('top_slider')) : the_row(); ?>
                    <div class="swiper-slide fullwidth-slider__item">
                        <img src="<? the_sub_field('image'); ?>" class="fullwidth-slider__image">
                        <div class="fullwidth-slider__item-description">
                            <? the_sub_field('name'); ?>
                        </div>
                    </div>
            <? endwhile;
            endif; ?>
        </div>
        <div class="fullwidth-slider__button-prev"></div>
        <div class="fullwidth-slider__button-next"></div>
        <div class="swiper-pagination fullwidth-slider__pagination"></div>
    </section>

    <section class="home-boxes-first-row boxes-row">
        <? the_field('text_home'); ?>
    </section>

    <section class="home-orange-block">
    </section>

    <section class="home-blocks">
        <? if (have_rows('home_block_item')) :
            while (have_rows('home_block_item')) : the_row(); ?>
                <div class="fullwidth-slider__item">
                <? $link = get_field('link'); ?>
                    <img src="<? the_sub_field('image'); ?>" class="fullwidth-slider__image">
                    <div class="fullwidth-slider__item-description block-item">
                        <? the_sub_field('name'); ?>
                        <a href = "<? $link ?>">All Products</a>
                    </div>
                </div>
        <? endwhile;
        endif; ?>
    </section>

     <section class="home-orange-block">
    </section>

    <!-- <section class="home-boxes-first-row boxes-row">
        <? if (have_rows('first_row_boxes')) :
            while (have_rows('first_row_boxes')) : the_row();
                $link = get_sub_field('link');
                $link_url = get_sub_field('box_type') == 'product' ? get_permalink(get_sub_field('product')) : $link['url'];
        ?>
                <div class="boxes-row__item boxes-row__item--<?= get_sub_field('box_type'); ?>">
                    <a href="<?= $link_url; ?>">
                        <img src="<? the_sub_field('image'); ?>" class="boxes-row__image">

                        <? if (get_sub_field('box_type') == 'product') :
                            $_product = wc_get_product(get_sub_field('product'));
                        ?>
                            <div class="boxes-row__description">
                                <div class="ak-product__price"><?= $_product->get_price_html(); ?></div>
                                <p class="title"><?= $_product->get_title(); ?></p>
                            </div>
                        <? else : ?>
                            <div class="boxes-row__description">
                                <p class="title"><? the_sub_field('title'); ?></p>
                                <p class="boxes-row__item-link"><?= $link['title'] ?></p>
                            </div>
                        <? endif; ?>
                    </a>
                </div>
        <? endwhile;
        endif; ?>
    </section>

    <section class="home-second-slider fullwidth-slider">
        <div class="swiper-wrapper">
            <? if (have_rows('second_slider')) :
                while (have_rows('second_slider')) : the_row(); ?>
                    <div class="swiper-slide fullwidth-slider__item">
                        <? $link = get_sub_field('link'); ?>
                        <a href="<?= $link['url']; ?>">
                            <img src="<? the_sub_field('image'); ?>" class="fullwidth-slider__image">

                            <div class="fullwidth-slider__item-description">
                                <? the_sub_field('description'); ?>

                                <p class="fullwidth-slider__item-link"><?= $link['title']; ?></p>
                            </div>
                        </a>
                    </div>
            <? endwhile;
            endif; ?>
        </div>
        <div class="fullwidth-slider__button-prev"></div>
        <div class="fullwidth-slider__button-next"></div>
        <div class="swiper-pagination fullwidth-slider__pagination"></div>
    </section>

    <section class="home-boxes-second-row boxes-row">
        <? if (have_rows('second_row_boxes')) :
            while (have_rows('second_row_boxes')) : the_row();
                $link = get_sub_field('link');
                $link_url = get_sub_field('box_type') == 'product' ? get_permalink(get_sub_field('product')) : $link['url'];
        ?>
                <div class="boxes-row__item boxes-row__item--<?= get_sub_field('box_type'); ?>">
                    <a href="<?= $link_url; ?>">
                        <img src="<? the_sub_field('image'); ?>" class="boxes-row__image">

                        <? if (get_sub_field('box_type') == 'product') :
                            $_product = wc_get_product(get_sub_field('product'));
                        ?>
                            <div class="boxes-row__description">
                                <div class="ak-product__price"><?= $_product->get_price_html(); ?></div>
                                <p class="title"><?= $_product->get_title(); ?></p>
                            </div>
                        <? else : ?>
                            <div class="boxes-row__description">
                                <p class="title"><? the_sub_field('title'); ?></p>
                                <p class="boxes-row__item-link"><?= $link['title'] ?></p>
                            </div>
                        <? endif; ?>
                    </a>
                </div>
        <? endwhile;
        endif; ?>
    </section>

    <section class="home-products-slider products-slider">
        <?
        $featured_products = get_field('products_slider');
        if ($featured_products) : ?>
            <div class="swiper-wrapper">
                <?php foreach ($featured_products as $post) :

                    setup_postdata($post); ?>
                    <div class="swiper-slide products-slider__item">
                        <? wc_get_template_part('content', 'product'); ?>
                    </div>
                <? endforeach; ?>
            </div>
        <? endif; ?>
        <div class="products-slider__button-prev"></div>
        <div class="products-slider__button-next"></div>
    </section>

    <div class="sygnet-logo-banner"></div> -->
<?php
endwhile;
get_footer();
