<?php

/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anomeo
 */

?>

<article class="swiper-slide" id="post-<?php the_ID(); ?>" <?php post_class('ak-post-item'); ?>>
    <a href="<?= get_the_permalink(); ?>" class="ak-post-item__link">
        <div class="ak-post-item__image-container">
            <? the_post_thumbnail('', ['class' => 'ak-post-item__image']); ?>
        </div>


        <div class="ak-post-item__description">
            <div class="title">
                <span class="title-item"><?= get_the_title(); ?></span>
                <span class="date-published"><?= get_the_date('d.m.Y'); ?></span>
            </div>
            <?php the_content(); ?>
            <span class="read-more-link"><? _e('Read more', 'anomeo'); ?></span>
        </div>
    </a>
</article>