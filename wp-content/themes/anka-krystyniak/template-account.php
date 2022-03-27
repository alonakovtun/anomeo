<?php

/**
 * Template name: My Account page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anka-krystyniak
 */


get_header();
while (have_posts()) : the_post();
    the_content();
endwhile;
get_footer();
