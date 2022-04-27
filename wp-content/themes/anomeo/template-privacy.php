<?php

/**
 * Template name: Privacy Policy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

  <section class="information__container">
        <h1 class="information__title"><?php the_field('privacy_policy_title') ?></h1>
        <p class="information__subtitle "><?php the_field('privacy_policy_subtitle') ?></p>
        <div class="information__content">
          <?php the_field('privacy_policy_text'); ?>
        </div>
        <p class="information__subtitle "><?php the_field('privacy_policy_subtitle2') ?></p>
        <div class="information__content">
          <?php the_field('privacy_policy_text2'); ?>
        </div>
    </section>

<?php
get_footer();
