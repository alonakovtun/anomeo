<?php

/**
 * Template name: Blog page
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

    <div class="ak-page__sub-menu-row">
        <?
        wp_nav_menu(array(
            'theme_location' => 'blog-categories-menu',
            'container' => '',
        ));
        ?>
    </div>
    <?
    $posts_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'post_status' => 'publish',
    ));
    ?>
    <section class="blog-page__blog-items" data-total_pages="<?= $posts_query->max_num_pages; ?>" data-config='<?= json_encode($posts_query->query_vars); ?>'>

        <?
        while ($posts_query->have_posts()) :
            $posts_query->the_post();

            get_template_part('template-parts/content', 'post');

        endwhile; ?>

    </section>

<?php
endwhile;
get_footer();
