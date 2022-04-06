<?php
/**
 * The template for displaying category archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anomeo
 */

$queried_object = get_queried_object();

get_header();
?>

<div class="ak-page__title-row">
    <h1 class="title"><?= $queried_object->name; ?></h1>
</div>

<div class="page-title__container">
    <h1 class="page-title__title"><? _e('About', 'anomeo'); ?></h1>
    <p class="page-title__subtitle "><? _e('Blog', 'anomeo'); ?></p>
</div>
<div class="blog-filter">
				<div class="blog-catogories">
                <?
				wp_nav_menu(array(
					'theme_location' => 'blog-categories-menu',
					'container' => '',
				));
				?>
				</div>

				<div class="blog-sort">
					<?php
						$args = array(
							'order'    => (isset($_GET['dir']) ? $_GET['dir'] : 'ASC')
						);
						query_posts($args);
					?>
					<a href="<? get_permalink(); ?>?dir=DESC">The latest</a>
					<a href="<? get_permalink(); ?>?dir=ASC">Oldest</a>
				</div>
			</div>


<section class="blog-page__blog-items" data-total_pages="<?= $wp_query->max_num_pages; ?>" data-config='<?= json_encode($wp_query->query_vars); ?>'>
    <? 
    
    while (have_posts()) : the_post();

        get_template_part('template-parts/content', 'post');

    endwhile; ?>
</section>

<?php

get_footer();