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

      <?php if (have_rows('find_us_left')) :
        while (have_rows('find_us_left')) : the_row();
          $сontinent = get_sub_field('сontinent');
          $country = get_sub_field('country'); ?>
          <div class="section-find_us">
            <div class="сontinent">
              <?php echo $сontinent; ?>
            </div>
            <div class="country-block">
              <?php echo $country ?>
            </div>
          </div>

      <?php
        endwhile;
      endif; ?>
    </div>
    <div class="second-block">
    <?php if (have_rows('find_us_right')) :
        while (have_rows('find_us_right')) : the_row();
          $сontinent = get_sub_field('сontinent');
          $country = get_sub_field('country'); ?>
          <div class="section-find_us">
            <div class="сontinent">
              <?php echo $сontinent; ?>
            </div>
            <div class="country-block">
              <?php echo $country ?>
            </div>
          </div>

      <?php
        endwhile;
      endif; ?>
    </div>
  </div>
</div>






<?php
get_footer();
