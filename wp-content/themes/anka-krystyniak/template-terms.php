<?php

/**
 * Template name: Terms page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anka-krystyniak
 */


get_header();
while (have_posts()) : the_post(); ?>

    <div class="ak-page__sub-menu-row">
        <?
        wp_nav_menu(array(
            'theme_location' => 'terms-menu',
            'container' => '',
        ));
        ?>
    </div>

    <div class="ak-page__title-row">
        <h1 class="title"><?= get_the_title(); ?></h1>
    </div>

    <section class="terms-page__content-section">
        <div class="r-wrap">
            <div class="terms-page__content">
                <? the_content(); ?>
            </div>
        </div>
    </section>

<?php
endwhile;
get_footer();
