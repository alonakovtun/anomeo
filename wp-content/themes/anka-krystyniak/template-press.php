<?php

/**
 * Template name: Press page
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

    <?
    $press_posts_query_args = array(
        'post_type' => 'press_post',
        'posts_per_page' => 1000,
        'post_status' => 'publish',
    );
    $press_posts_query = new WP_Query($press_posts_query_args);
    ?>

    <section class="press-page__items-grid" data-pswp data-total_pages="<?= $press_posts_query->max_num_pages; ?>" data-config='<?= json_encode($press_posts_query->query_vars); ?>'>
        <?
        if ($press_posts_query->have_posts()) :
            while ($press_posts_query->have_posts()) :
                $press_posts_query->the_post(); ?>

                <? get_template_part('template-parts/content-press'); ?>

        <?
            endwhile;
        endif;
        ?>
    </section>

<?php
endwhile;
get_footer();
