<?php

/**
 * Template name: Cookies
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

  <section class="information__container">
        <h1 class="information__title"><?php the_field('cookies_title') ?></h1>
        <p class="information__subtitle "><?php the_field('cookies_subtitle') ?></p>
        <div class="information__content">
          <?php the_field('cookies_text'); ?>
        </div>
    </section>

<?php
get_footer();
