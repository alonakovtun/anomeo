<?php
$items = get_field('popular_product_item');
if ($items) : ?>
    <section class="popular-products">

        <div class="swiper-container popular-product">
            <div class="swiper-wrapper">

                <?php foreach ($items as $item) :
                    $permalink = get_permalink($item->ID);
                    $id = wc_get_product($item->ID);
                    $price = $id->get_price();
                    $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $id->get_image());
                    $title = $item->post_title;
                ?>



                    <div class="swiper-slide">
                        <div data-prd-id="<?= $item->ID ?>" class="slider-product">
                            <?php echo do_shortcode("[yith_wcwl_add_to_wishlist product_id=" .  $item->ID . "]") ?>
                            <a href="<?= $permalink; ?>" class="slider-product__image">
                                <img src="<?= get_the_post_thumbnail_url($id->get_id()); ?>" alt="<?= the_title(); ?>" />

                                <div class="tag">
                                    <?php
                                    if (get_field('sale')) { ?>
                                        <span class="tag-item">sale</span>
                                    <? } ?>
                                </div>
                            </a>
                            <div class="slider-product__bottom popular__slider-product-bottom"><br><br>
                                <a href="<?= $permalink; ?>" class="slider-product__name "><?= $title;  ?></a> <br><br>
                                <a href="<?= $permalink; ?>" class="slider-product__price">
                                    <span class="price"><?php echo $price; ?> Eur</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
           

        </div>
    </section>
<?php endif; ?>