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
        <p class="home-orange-block__text">FREE SHIPPING OVER 50$</p>
        <p class="home-orange-block__text">FREE SHIPPING OVER 50$</p>
    </section>

    <section class="home-blocks">
        <? if (have_rows('home_block_item')) :
            while (have_rows('home_block_item')) : the_row(); ?>
                <div class="fullwidth-slider__item">
                    <? $link = get_field('link'); ?>
                    <img src="<? the_sub_field('image'); ?>" class="fullwidth-slider__image">
                    <div class="fullwidth-slider__item-description block-item">
                        <? the_sub_field('name'); ?>
                        <a href="<? $link ?>">All Products</a>
                    </div>
                </div>
        <? endwhile;
        endif; ?>
    </section>

    <section class="home-orange-block">
        <p class="home-orange-block__text">FREE SHIPPING OVER 50$</p>
        <p class="home-orange-block__text">FREE SHIPPING OVER 50$</p>
    </section>

    <section class="popular-items-block">
        <div class="first-block">
            <div class="top">
                <div class="title"><? _e('Popular Items', 'anomeo'); ?></div>
                <div class="button">
                    <a href="/shop/"><? _e('ALL PRODUCTS', 'anomeo'); ?></a>
                </div>
            </div>
            <div class="bottom">
                <div class="popular-products-slider__button-prev"></div>
                <div class="popular-products-slider__button-next">
                    <img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg" alt="">
                    <p>Next products</p>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="second-block">
            <? include get_template_directory() . '/template-parts/popular-product.php'; ?>

        </div>

    </section>

    <section class="home-second-slider fullwidth-slider">
        <div class="swiper-wrapper">
            <? if (have_rows('bottom_slider')) :
                while (have_rows('bottom_slider')) : the_row(); ?>
                    <div class="swiper-slide ">
                        <div class="slider2-block">
                            <img src="<? the_sub_field('image'); ?>" class=" ">
                            <div class="slider__item-description">
                                <? the_sub_field('text'); ?>
                            </div>
                        </div>
                    </div>
            <? endwhile;
            endif; ?>
        </div>
        <div class="fullwidth-slider__button-prev"></div>
        <div class="fullwidth-slider__button-next"></div>
        <div class="swiper-pagination fullwidth-slider__pagination"></div>
    </section>

    <section class="home-blue-block">
        <div class="blue-block__content">
            <div class="blue-block__item blue-block__item--first">WE CARE ABOUT OUR COSTUMER 24 MONTHS GUARANTEE</div>
            <div class="blue-block__item blue-block__item--second">Travel blue offers products of the highest quality. Should any defect appear within 24 months from date purchase (batteries - 12 months from date of purchase) please return the product with proof of purchase to Travel Blues and we will repair or replace it free of charge. This worldwide guarantee does not affect your statutory rights.</div>
        </div>
    </section>
<?php
endwhile;
get_footer();
