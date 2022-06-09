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
    <?php get_template_part('template-parts/faq'); ?>
    <section class="home-top fullwidth-slider">
        <?php $file = get_field('video');
        if ($file) : ?>
            <div class="fullwidth-slider__item">
                <video autoplay loop muted playsinline class="home-video">
                    <source src="<?php echo $file; ?>" type='video/mp4; codecs="avc1"'>
                </video>
                <div class="fullwidth-slider__item-description video">
                    <? the_field('video_title'); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="home-top-slider">
            <div class="swiper-wrapper swiper-home-top">
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
            </div>
           
        <?php endif; ?>
        <div class="fullwidth-slider__button-prev"></div>
        <div class="fullwidth-slider__button-next"></div>
        <div class="swiper-pagination fullwidth-slider__pagination"></div>
    </section>

    <section class="home-boxes-first-row boxes-row ">
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
                    <? $links = get_sub_field('link'); 
                    if( $links ): ?>
                        <?php foreach( $links as $link ): ?>
                            <img src="<? the_sub_field('image'); ?>" class="fullwidth-slider__image">
                            <div class="fullwidth-slider__item-description block-item">
                                <? the_sub_field('name'); ?>
                                <a class="category-btn" href="<?php echo esc_url( get_term_link( $link ) ); ?>">All Products</a>
                            </div>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    
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
                <div class="popular-products-slider__button-prev">
                    <img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg" alt="">
                    <p class="desktop">Previous products</p>
                </div>
                <div class="popular-products-slider__button-next">
                    <img src="/wp-content/themes/anomeo/assets/img/Arrow_FaQ-06.svg" alt="">
                    <p class="desktop">Next products</p>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="second-block">
            <? include get_template_directory() . '/template-parts/popular-product.php'; ?>

        </div>

    </section>

    <section class="home-second-slider fullwidth-slider bottom-slider">
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
            <div class="blue-block__item blue-block__item--first"><?php the_field('left_text') ?></div>
            <div class="blue-block__item blue-block__item--second"><?php the_field('right_text') ?></div>
        </div>
    </section>
<?php
endwhile;
get_footer();
