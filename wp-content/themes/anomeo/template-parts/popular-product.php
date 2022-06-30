<?php
$items = get_field('popular_product_item');
if ($items) : ?>
    <section class="popular-products">

        <div class="swiper-container popular-product">
            <div class="swiper-wrapper">

                <?php foreach ($items as $item) :
                    $permalink = get_permalink($item->ID);
                    $id = wc_get_product($item->ID);
                    $price = $id->get_price_html();
                    $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $id->get_image());
                    $title = $item->post_title;
                ?>



                    <div class="swiper-slide">
                        <div data-prd-id="<?= $item->ID ?>" class="slider-product">
                            <?php //echo do_shortcode("[yith_wcwl_add_to_wishlist product_id=" .  $item->ID . "]") ?>
                            <?php //get_wishlist_button(); ?>                            
                            <a href="<?= $permalink; ?>" class="slider-product__image">

                            <a href="<?= $permalink; ?>" class="slider-product__image">
                            <?php
                                $prd = wc_get_product($item->ID);
                                $attachment_ids = $prd->get_gallery_image_ids();
                                $hover_img      = wp_get_attachment_image_src($attachment_ids[0], $image_size);
                                ?>
                                <div class="_first">
                                    <img class="product-image" src="<?= get_the_post_thumbnail_url($prd->get_id()); ?>" alt="" />
                                </div>
                                <div class="_second">
                                    <img class="product-image" src="<?= wp_get_attachment_url($attachment_ids[0]); ?>" alt="" />
                                </div>

                                <div class="tag">
                                    <?php
                                    if (get_field('sale')) { ?>
                                        <span class="tag-item">sale</span>
                                    <? } ?>
                                </div>
                            </a>
                            <div class="slider-product__bottom popular__slider-product-bottom">
                                <a href="<?= $permalink; ?>" class="slider-product__name "><?= $title;  ?></a> 
                                <a href="<?= $permalink; ?>" class="slider-product__price">
                                    <span class="price"><?php echo $price; ?> £</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
           

        </div>
    </section>
<?php endif; ?>