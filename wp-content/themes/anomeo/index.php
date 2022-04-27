<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anomeo
 */

get_header();
?>

<main id="primary" class="site-main blogs_page">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<div class="page-title__container">
				<h1 class="page-title__title"><? _e('About', 'anomeo'); ?></h1>
				<p class="page-title__subtitle "><? _e('Blog', 'anomeo'); ?></p>
			</div>

			<div class="blog-filter">
				<?
				wp_nav_menu(array(
					'theme_location' => 'blog-categories-menu',
					'container' => '',
				));

				//include get_template_directory() . '/template-parts/sort.php'; 
				?>

			</div>

		<?php


		endif;

		$posts_query = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'post_status' => 'publish',
		));

		/* Start the Loop */ ?>
		<section class="blog-page__blog-items" data-total_pages="<?= $posts_query->max_num_pages; ?>" data-config='<?= json_encode($posts_query->query_vars); ?>'>

			<?
			while ($posts_query->have_posts()) :
				$posts_query->the_post();

				get_template_part('template-parts/content', 'post');

			endwhile; ?>
		</section>

	<?

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
