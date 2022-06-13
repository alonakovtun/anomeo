<?php

/**
 * Template name: Contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header();
while (have_posts()) : the_post(); ?>

    <div class="contact-container">
        <div class="contact-left">
            <div class="page-title__container">
                <p class="page-title__subtitle "><?= get_the_title(); ?></p>

                <?php the_field('contact_left'); ?>

                <div class="contact_social">
                <?php the_field('contact_social'); ?>
                <!-- <div class="contact_social--img">
                    <img src="/wp-content/themes/anomeo/assets/img/FB_IG_footer_desktop-11.svg" alt="">
                    <img src="/wp-content/themes/anomeo/assets/img/FB_IG_footer_desktop-12.svg" alt="">

                </div> -->
                </div>


            </div>

           
        </div>

        <div class="contact-right">
            <?php the_field('contact_right'); ?>

        </div>
    </div>

<?php
endwhile;
get_footer();
