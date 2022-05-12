<?php

/**
 * Template name: Find us
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

<div class="find-us">
  <div class="find_us-title">
    <p class="title"><? _e('Find us', 'anomeo') ?></p>
    <p class="subtitle"><? _e('Online shops', 'anomeo') ?></p>
  </div>

  <div class="find_us-block">
    <div class="first-block">
      <p class="сontinent">
        <?php echo get_field('сontinent1'); ?>
      </p>
      <div class="country-block">
        <?php echo get_field('country1'); ?>
      </div>

      <p class="сontinent">
        <?php echo get_field('сontinent2'); ?>
      </p>
      <div class="country-block">
        <?php echo get_field('country2'); ?>
      </div>

      <p class="сontinent">
        <?php echo get_field('сontinent3'); ?>

      </p>
      <div class="country-block">
        <?php echo get_field('country3'); ?>
      </div>

    </div>
    <div class="second-block">
      <p class="сontinent">
        <?php echo get_field('сontinent4'); ?>

      </p>
      <div class="country-block">
        <?php echo get_field('country4'); ?>
      </div>

    </div>
  </div>
</div>





<?php
get_footer();
