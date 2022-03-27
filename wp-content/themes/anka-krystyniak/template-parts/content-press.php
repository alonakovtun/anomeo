<?php

/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anka-krystyniak
 */

?>

<article id="press-post-<?php the_ID(); ?>" <?php post_class('ak-press-item'); ?>>
    <? $thumb_obj = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); ?>
    <a href="<?= $thumb_obj[0]; ?>" data-size="<?= $thumb_obj[1] . 'x' . $thumb_obj[2]; ?>" class="ak-press-item__link">
        <div class="ak-press-item__image-container">
            <? the_post_thumbnail('', ['class' => 'ak-press-item__image']); ?>
        </div>


        <div class="ak-press-item__description">
            <p class="title"><?= get_the_title(); ?></p>

            <p class="read-more-link"><? _e('Read more', 'anka-krystyniak'); ?></p>
        </div>
    </a>
</article>