<?php

/**
 * Template name: Returns
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

  <section class="information__container">
        <h1 class="information__title"><?php the_field('returns_title') ?></h1>
        <p class="information__subtitle "><?php the_field('returns_subtitle') ?></p>
        <div class="information__content">
          <?php the_field('returns_text'); ?>
        </div>
    </section>

<?php
get_footer();
