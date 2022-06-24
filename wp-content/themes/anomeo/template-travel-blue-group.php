<?php

/**
 * Template name: Travel Blue Group
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

<section class="about__container travel__container">
    <div class="about_block about_first-block">
        <div class="about_content travel-first">
            <p class="about-title">
                <?php the_field('first_block_title') ?>
            </p>
            <?php the_field('first_block_text') ?>

            <?php
            $link = get_field('first_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

        </div>
        <div class="about_img">
            <?php
            $image = get_field('first_block_image');
            if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
    </div>

    <div class="about_block desktop about_second-block">
        <div class="about_img"> <?php
                                $image = get_field('second_block_image');
                                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
        <div class="about_content travel-second">
            <p class="about-title">
                <?php the_field('second_block_title') ?>
            </p>
            <?php the_field('second_block_text') ?>
            <?php
            $link = get_field('second_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="about_block mobile about_second-block">

        <div class="about_content travel-second">
            <p class="about-title">
                <?php the_field('second_block_title') ?>
            </p>
            <?php the_field('second_block_text') ?>
            <?php
            $link = get_field('second_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
        <div class="about_img"> <?php
                                $image = get_field('second_block_image');
                                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
    </div>

    <div class="about_block about_third-block">
        <div class="about_content travel-third">
            <p class="about-title">
                <?php the_field('third_block_title') ?>
            </p>
            <?php the_field('third_block_text') ?>
            <?php
            $link = get_field('third_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
        <div class="about_img"><?php
                                $image = get_field('third_block_image');
                                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
    </div>

    <div class="about_block desktop about_second-block">
        <div class="about_img"> <?php
                                $image = get_field('fourth_block_image');
                                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
        <div class="about_content travel-fourth">
            <p class="about-title">
                <?php the_field('fourth_block_title') ?>
            </p>
            <?php the_field('fourth_block_text') ?>
            <?php
            $link = get_field('fourth_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="about_block mobile about_second-block">

        <div class="about_content travel-fourth">
            <p class="about-title">
                <?php the_field('fourth_block_title') ?>
            </p>
            <?php the_field('fourth_block_text') ?>
            <?php
            $link = get_field('fourth_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
            ?>
                <a class="travel-link" target="_blank" href="<?php echo esc_url($link_url); ?>" ><img src="/wp-content/themes/anomeo/assets/img/Arrow_newsletter.svg" /><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
        <div class="about_img"> <?php
                                $image = get_field('fourth_block_image');
                                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="" />
            <?php endif; ?>
        </div>
    </div>

</section>

<?php
get_footer();
