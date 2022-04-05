<?php

/**
 * Template name: About
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anomeo
 */


get_header(); ?>

<section class="about__container">
  <div class="about_block about_first-block">
    <div class="about_content">
      <p class="about-title">
        <?php the_field('first_block_title') ?>
      </p>
      <?php the_field('first_block_text') ?>

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
    <div class="about_content">
      <p class="about-title">
        <?php the_field('second_block_title') ?>
      </p>
      <?php the_field('second_block_text') ?>
    </div>
  </div>

  <div class="about_block mobile about_second-block">

    <div class="about_content">
      <p class="about-title">
        <?php the_field('second_block_title') ?>
      </p>
      <?php the_field('second_block_text') ?>
    </div>
    <div class="about_img"> <?php
                            $image = get_field('second_block_image');
                            if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image); ?>" alt="" />
      <?php endif; ?>
    </div>
  </div>

  <div class="about_block about_third-block">
    <div class="about_content">
      <p class="about-title">
        <?php the_field('third_block_title') ?>
      </p>
      <?php the_field('third_block_text') ?>
    </div>
    <div class="about_img"><?php
                            $image = get_field('third_block_image');
                            if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image); ?>" alt="" />
      <?php endif; ?>
    </div>
  </div>

</section>

<?php
get_footer();
