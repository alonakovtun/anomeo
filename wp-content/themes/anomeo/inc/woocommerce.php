<?php

/**
 * Woocommerce related settings and functions
 *
 * @package anomeo
 */


function anomeo_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'anomeo_add_woocommerce_support');


/**
 * Change a currency symbol
 */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbols', 10, 2);

function change_existing_currency_symbols($currency_symbol, $currency)
{
    switch ($currency) {
        case 'PLN':
            $currency_symbol = 'PLN';
            break;
        case 'USD':
            $currency_symbol = 'USD';
        case 'EUR':
            $currency_symbol = 'EUR';
    }
    return $currency_symbol;
}

/**
 * Remove woo styles
 */
add_filter('woocommerce_enqueue_styles', '__return_false');

/**
 * Remove my account menu items
 */
add_filter('woocommerce_account_menu_items', 'ak_remove_my_account_links');
function ak_remove_my_account_links($menu_links)
{
    unset($menu_links['downloads']); // Disable Downloads tab

    return $menu_links;
}

/**
 * Change my account menu items
 */
add_filter ( 'woocommerce_account_menu_items', 'wptips_customize_account_menu_items' );
 function wptips_customize_account_menu_items( $menu_items ){
     
    // Chnage the Menu Item name text
    $menu_items['dashboard'] = 'Hello'; 
    return $menu_items;
}

/**
 * Change default sort
 */
add_filter('woocommerce_default_catalog_orderby', 'ak_default_catalog_orderby');
function ak_default_catalog_orderby($sort_by)
{
    return 'date';
}


/**
 * Modify sale price format
 */
function filter_woocommerce_format_sale_price($price, $regular_price, $sale_price)
{
    $price = '<span class="sale-price-label sale-price-label--from">' . __('From', 'anomeo') . '</span> <del aria-hidden="true">' . (is_numeric($regular_price) ? wc_price($regular_price) : $regular_price) . '</del> <span class="sale-price-label sale-price-label--to">' . __('To', 'anomeo') . '</span> <ins>' . (is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) . '</ins>';
    return $price;
};

// add the filter 
// add_filter('woocommerce_format_sale_price', 'filter_woocommerce_format_sale_price', 10, 3);


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

add_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);

// remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('woocommerce_add_to_cart_fragments', 'ak_custom_sidebar_cart_fragments');

function ak_custom_sidebar_cart_fragments($fragments)
{
    ob_start();

    woocommerce_mini_cart();

    $fragments['div.site-cart'] = ob_get_clean();

    $fragments['a.mobile-cart-toggle'] = get_mobile_cart_icon();

    $fragments['a.mobile-cart-toggle'] = get_mobile_cart_icon();

    $fragments['a.desktop-menu-btn'] = get_desktop_cart_icon();

    return $fragments;
}


/**
 * Add to cart ajax handler.
 */
function ak_ajax_add_to_cart_handler()
{
    WC_Form_Handler::add_to_cart_action();
    WC_AJAX::get_refreshed_fragments();
}
add_action('wc_ajax_ak_add_to_cart', 'ak_ajax_add_to_cart_handler');
add_action('wc_ajax_nopriv_ak_add_to_cart', 'ak_ajax_add_to_cart_handler');

// Remove WC Core add to cart handler to prevent double-add
remove_action('wp_loaded', array('WC_Form_Handler', 'add_to_cart_action'), 20);

// remove add to cart message notification
add_filter('wc_add_to_cart_message_html', '__return_false');

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter('loop_shop_per_page', 'ak_loop_shop_per_page', 20);

function ak_loop_shop_per_page($cols)
{
    // $cols contains the current number of products per page based on the value stored on Options –> Reading
    // Return the number of products you wanna show per page.
    $cols = 8;
    return $cols;
}


function ak_loadmore_products_handler()
{
    $default_args = array(
        'post_type' => 'product',
    );

    $input_args = json_decode(stripslashes($_POST['query_params']), true);

    $merged_args = array_merge($default_args,  $input_args);

    $query = new WP_Query($merged_args);

    $GLOBALS['wp_query'] = $query;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_loadmore_products', 'ak_loadmore_products_handler');
add_action('wp_ajax_nopriv_loadmore_products', 'ak_loadmore_products_handler');


function ak_update_cart_item_qty()
{
    $cart_item_key = $_POST['cart_item_key'];
    $quantity = $_POST['qty'];

    // Get the array of values owned by the product we're updating
    $product_values = WC()->cart->get_cart_item($cart_item_key);

    // Get the quantity of the item in the cart
    $product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($quantity, FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);

    // Update cart validation
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity);

    // Update the quantity of the item in the cart
    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $product_quantity, true);
        WC_AJAX::get_refreshed_fragments();
    }
}

add_action('wp_ajax_ak_update_cart_item_qty', 'ak_update_cart_item_qty');
add_action('wp_ajax_nopriv_ak_update_cart_item_qty', 'ak_update_cart_item_qty');


/**
 * Add a confirm password field on the register form under My Accounts.
 */
function woocommerce_registration_errors_validation($errors, $username, $email)
{
    if (isset($_POST['password']) && isset($_POST['password2']) && $_POST['password'] != $_POST['password2']) {

        $errors->add('registration-error', __('Passwords do not match.', 'anomeo'));
    }
    return $errors;
}
add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);

/**
 * Woocommerce checkout fields customizing
 */
function custom_override_checkout_fields($fields)
{
    // Billing fields
    unset($fields['billing']['billing_address_2']);

    $fields['billing']['billing_phone']['placeholder'] = __('Phone', 'woocommerce');
    $fields['billing']['billing_phone']['label'] = '';

    $fields['billing']['billing_email']['placeholder'] = __('Email', 'anomeo');
    $fields['billing']['billing_email']['label'] = '';


    //shipping fields
    unset($fields['shipping']['shipping_address_2']);

    $fields['shipping']['shipping_first_name']['required'] = false;

    $fields['shipping']['shipping_last_name']['required'] = false;

    $fields['shipping']['shipping_company']['required'] = false;

    $fields['shipping']['shipping_address_1']['required'] = false;

    $fields['shipping']['shipping_postcode']['required'] = false;

    $fields['shipping']['shipping_city']['required'] = false;

    $fields['shipping']['shipping_country']['required'] = false;

    $fields['shipping']['shipping_phone']['placeholder'] = __('Phone', 'woocommerce');
    $fields['shipping']['shipping_phone']['label'] = '';
    $fields['shipping']['shipping_phone']['required'] = false;

    $fields['shipping']['shipping_email']['placeholder'] = __('Email', 'anomeo');
    $fields['shipping']['shipping_email']['label'] = '';
    $fields['shipping']['shipping_email']['required'] = false;

    $fields['order']['order_comments']['label'] = '';
    $fields['order']['order_comments']['custom_attributes']['rows'] = false;
    $fields['order']['order_comments']['custom_attributes']['cols'] = false;

    // Billing Fields Order
    $billing_order = array(
        "billing_first_name",
        "billing_last_name",
        "billing_company",
        "billing_address_1",
        "billing_postcode",
        "billing_city",
        "billing_country",
        "billing_phone",
        "billing_email"

    );
    foreach ($billing_order as $field) {
        $billing_ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $billing_ordered_fields;



    // Billing Fields Order
    $shipping_order = array(
        "shipping_first_name",
        "shipping_last_name",
        "shipping_company",
        "shipping_address_1",
        "shipping_postcode",
        "shipping_city",
        "shipping_country",
        "shipping_phone",
        "shipping_email"

    );
    foreach ($shipping_order as $field) {
        $shipping_ordered_fields[$field] = $fields["shipping"][$field];
    }

    $fields["shipping"] = $shipping_ordered_fields;

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');


/**
 * Woocommerce address edit fields customizing
 */
function custom_override_address_edit_fields($fields)
{

    unset($fields['shipping_address_2']);
    unset($fields['billing_address_2']);

    return $fields;
}
add_filter('woocommerce_address_to_edit', 'custom_override_address_edit_fields');


function override_woocommerce_default_address_fields($address_fields)
{
    $address_fields['first_name']['placeholder'] = __('Name', 'anomeo');
    $address_fields['first_name']['label'] = '';

    $address_fields['last_name']['placeholder'] = __('Surname', 'anomeo');
    $address_fields['last_name']['label'] = '';

    $address_fields['company']['placeholder'] = __('Company Name', 'anomeo');
    $address_fields['company']['label'] = '';

    $address_fields['address_1']['placeholder'] = __('Address', 'anomeo');
    $address_fields['address_1']['label'] = '';

    $address_fields['postcode']['placeholder'] = __('ZIP code', 'anomeo');
    $address_fields['postcode']['label'] = '';

    $address_fields['city']['placeholder'] = __('City', 'anomeo');
    $address_fields['city']['label'] = '';

    $address_fields['country']['placeholder'] = __('Country', 'anomeo');
    $address_fields['country']['label'] = '';

   

    return $address_fields;
}
add_filter('woocommerce_default_address_fields', 'override_woocommerce_default_address_fields');


/**
 * Invoice data vat fields
 */
function invoice_vat_fields_init($checkout)
{
    woocommerce_form_field(
        'vat_name',
        array(
            'type'          => 'text',
            'label'         => __('Name', 'anomeo'),
            'placeholder'   => __('Name', 'anomeo'),
        ),
        $checkout->get_value('vat_name')
    );

    woocommerce_form_field(
        'vat_surname',
        array(
            'type'          => 'text',
            'label'         => __('Surname', 'anomeo'),
            'placeholder'   => __('Surname', 'anomeo'),
        ),
        $checkout->get_value('vat_name')
    );

    woocommerce_form_field(
        'vat_company_name',
        array(
            'type'          => 'text',
            'label'         => __('Company Name', 'anomeo'),
            'placeholder'   => __('Company Name', 'anomeo'),
        ),
        $checkout->get_value('vat_company_name')
    );

    woocommerce_form_field(
        'vat_nip_number',
        array(
            'type'          => 'text',
            'label'         => __('NIP', 'anomeo'),
            'placeholder'   => __('NIP', 'anomeo'),
        ),
        $checkout->get_value('vat_nip_number')
    );

    woocommerce_form_field(
        'vat_company_addres',
        array(
            'type'          => 'text',
            'label'         => __('Address', 'anomeo'),
            'placeholder'   => __('Address', 'anomeo'),
        ),
        $checkout->get_value('vat_company_addres')
    );

    woocommerce_form_field(
        'vat_company_zip_code',
        array(
            'type'          => 'text',
            'label'         => __('Post code', 'anomeo'),
            'placeholder'   => __('Post code', 'anomeo'),
        ),
        $checkout->get_value('vat_company_zip_code')
    );

    woocommerce_form_field(
        'vat_company_city',
        array(
            'type'          => 'text',
            'label'         => __('City', 'anomeo'),
            'placeholder'   => __('City', 'anomeo'),
        ),
        $checkout->get_value('vat_company_city')
    );

    woocommerce_form_field(
        'vat_company_country',
        array(
            'type'          => 'text',
            'label'         => __('Country', 'anomeo'),
            'placeholder'   => __('Country', 'anomeo'),
        ),
        $checkout->get_value('vat_company_country')
    );

   

    woocommerce_form_field(
        'vat_phone',
        array(
            'type'          => 'tel',
            'label'         => __('Phone', 'anomeo'),
            'placeholder'   => __('Phone', 'anomeo'),
        ),
        $checkout->get_value('vat_phone')
    );

    woocommerce_form_field(
        'vat_email',
        array(
            'type'          => 'email',
            'label'         => __('Email', 'anomeo'),
            'placeholder'   => __('Email', 'anomeo'),
        ),
        $checkout->get_value('vat_email')
    );

    
}
add_action('woocommerce_invoice_vat_fields', 'invoice_vat_fields_init');


function invoice_vat_fields_update($order_id)
{
    if (!empty($_POST['vat_name'])) {
        update_post_meta($order_id, '_vat_name', sanitize_text_field($_POST['vat_name']));
    }
    if (!empty($_POST['vat_surname'])) {
        update_post_meta($order_id, '_vat_surname', sanitize_text_field($_POST['vat_surname']));
    }
    if (!empty($_POST['vat_company_name'])) {
        update_post_meta($order_id, '_vat_company_name', sanitize_text_field($_POST['vat_company_name']));
    }
    if (!empty($_POST['vat_company_addres'])) {
        update_post_meta($order_id, '_vat_company_addres', sanitize_text_field($_POST['vat_company_addres']));
    }
    if (!empty($_POST['vat_company_zip_code'])) {
        update_post_meta($order_id, '_vat_company_zip_code', sanitize_text_field($_POST['vat_company_zip_code']));
    }
    if (!empty($_POST['vat_company_city'])) {
        update_post_meta($order_id, '_vat_company_city', sanitize_text_field($_POST['vat_company_city']));
    }
    if (!empty($_POST['vat_company_country'])) {
        update_post_meta($order_id, '_vat_company_country', sanitize_text_field($_POST['vat_company_country']));
    }
    if (!empty($_POST['vat_nip_number'])) {
        update_post_meta($order_id, '_vat_nip_number', sanitize_text_field($_POST['vat_nip_number']));
    }
    if (!empty($_POST['vat_phone'])) {
        update_post_meta($order_id, '_vat_phone', sanitize_text_field($_POST['vat_phone']));
    }
    if (!empty($_POST['vat_email'])) {
        update_post_meta($order_id, '_vat_email', sanitize_text_field($_POST['vat_email']));
    }
   
}
add_action('woocommerce_checkout_update_order_meta', 'invoice_vat_fields_update');


function invoice_vat_fields_admin_show($order)
{
    echo '<h3>Invoice VAT data:</h3>';
    echo '<p><strong>' . __('Name') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_name', true)) . '</p>';
    echo '<p><strong>' . __('Surame') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_surname', true)) . '</p>';
    echo '<p><strong>' . __('Company name') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_company_name', true)) . '</p>';
    echo '<p><strong>' . __('Company Address') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_company_addres', true)) . '</p>';
    echo '<p><strong>' . __('Company Zip code') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_company_zip_code', true)) . '</p>';
    echo '<p><strong>' . __('Company Сity') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_company_city', true)) . '</p>';
    echo '<p><strong>' . __('Company Сountry') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_company_country', true)) . '</p>';
    echo '<p><strong>' . __('VAT/NIP') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_nip_number', true)) . '</p>';
    echo '<p><strong>' . __('Phone') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_phone', true)) . '</p>';
    echo '<p><strong>' . __('Email') . ':</strong><br>' . wp_kses_post(get_post_meta($order->get_id(), '_vat_email', true)) . '</p>';
}
add_action('woocommerce_admin_order_data_after_shipping_address', 'invoice_vat_fields_admin_show', 10, 1);


function ak_thank_you_page_title($title, $id)
{
    if (is_order_received_page() && get_the_ID() === $id) {
        $title = __('Thank you for your order!', 'anomeo');
    }

    return $title;
}

add_filter('the_title', 'ak_thank_you_page_title', 10, 2);




function ak_change_sorting_options($options)
{

    $options = array(
        'menu_order' => __('Default', 'anomeo'),
        'price'      => __('Price ascending', 'anomeo'),
        'price-desc' => __('Price descending', 'anomeo'),
        'date'       => __('Newest', 'anomeo'),
        'date-desc'  => __('Oldest', 'anomeo'),
    );

    return $options;
}
add_filter('woocommerce_catalog_orderby', 'ak_change_sorting_options', 5);



function ak_custom_product_sorting($args)
{
    // Sort by date desc
    if (isset($_GET['orderby']) && 'date-desc' === $_GET['orderby']) {
        $args['orderby'] = 'date';
        $args['order'] = 'desc';
    }

    return $args;
}
add_filter('woocommerce_get_catalog_ordering_args', 'ak_custom_product_sorting');


function get_current_orderby_method()
{
    $orderby = isset($_GET['orderby']) ? wc_clean(wp_unslash($_GET['orderby'])) : '';

    $options = array(
        'menu_order' => __('Default', 'anomeo'),
        'price'      => __('Price ascending', 'anomeo'),
        'price-desc' => __('Price descending', 'anomeo'),
        'date'       => __('Newest', 'anomeo'),
        'date-desc'  => __('Oldest', 'anomeo'),
    );


    if ($orderby && $orderby != 'menu_order') {
        return  $options[$orderby];
    }

    return '';
}



function ak_account_order_custom_query($args)
{

    $args['limit'] = 1000;

    return $args;
}
add_filter('woocommerce_my_account_my_orders_query', 'ak_account_order_custom_query', 10, 1);


function ak_get_formatted_order_address($raw_address)
{
    $raw_address['name'] = $raw_address['first_name'] . ' ' . $raw_address['last_name'];
    $raw_address['country'] = WC()->countries->countries[$raw_address['country']];

    $sorted_address_keys = [
        'name',
        'company',
        'address_1',
        'postcode',
        'city',
        'country',
        'phone',
        'email'
    ];

    $sorted_address = [];

    foreach ($sorted_address_keys as $key) {
        if (!empty($raw_address[$key])) {
            $sorted_address[$key] = $raw_address[$key];
        }
    }

    return $sorted_address;
}

function ak_get_edit_account_address_fields($address_type = 'billing')
{
    $current_user = wp_get_current_user();
    $load_address = sanitize_key($address_type);
    $country      = get_user_meta(get_current_user_id(), $load_address . '_country', true);

    if (!$country) {
        $country = WC()->countries->get_base_country();
    }

    if ('billing' === $load_address) {
        $allowed_countries = WC()->countries->get_allowed_countries();

        if (!array_key_exists($country, $allowed_countries)) {
            $country = current(array_keys($allowed_countries));
        }
    }

    if ('shipping' === $load_address) {
        $allowed_countries = WC()->countries->get_shipping_countries();

        if (!array_key_exists($country, $allowed_countries)) {
            $country = current(array_keys($allowed_countries));
        }
    }

    $address = WC()->countries->get_address_fields($country, $load_address . '_');

    // Prepare values.
    foreach ($address as $key => $field) {

        $value = get_user_meta(get_current_user_id(), $key, true);

        if (!$value) {
            switch ($key) {
                case 'billing_email':
                case 'shipping_email':
                    $value = $current_user->user_email;
                    break;
            }
        }

        $address[$key]['value'] = apply_filters('woocommerce_my_account_edit_address_field_value', $value, $key, $load_address);
    }

    return  apply_filters('woocommerce_address_to_edit', $address, $load_address);
}

//new


/**
 * Display available attributes.
 * 
 * @return array|void
 */
function iconic_available_attributes() {
	global $product;

	if ( ! $product->is_type( 'variable' ) ) {
		return;
	}

	$attributes = iconic_get_available_attributes( $product );

	if ( empty( $attributes ) ) {
		return;
	}

	foreach ( $attributes as $attribute ) {
		?>
		<div class="iconic-available-attributes">
			<p class="iconic-available-attributes__title"><?php _e( 'Available', 'iconic' ); ?> <strong><?php echo $attribute['name']; ?></strong></p>

			<ul class="iconic-available-attributes__values">
				<?php foreach ( $attribute['values'] as $value ) { ?>
					<li class="iconic-available-attributes__value <?php echo $value['available'] ? '' : 'iconic-available-attributes__value--unavailable'; ?>"><?php echo $value['name']; ?></li>
				<?php } ?>
			</ul>
		</div>
		<?php
	}
}

add_action( 'woocommerce_shop_loop_item_title', 'iconic_available_attributes', 20 );

/**
 * Get available attributes.
 *
 * @param WC_Product_Variable $product
 *
 * @return array
 */
function iconic_get_available_attributes( $product ) {
	static $available_attributes = array();

	$product_id = $product->get_id();

	if ( isset( $available_attributes[ $product_id ] ) ) {
		return $available_attributes[ $product_id ];
	}

	$available_attributes[ $product_id ] = array();

	$attributes = $product->get_variation_attributes();

	if ( empty( $attributes ) ) {
		return $available_attributes[ $product_id ];
	}

	$attributes_to_show = iconic_get_attributes_to_show();

	foreach ( $attributes as $attribute => $values ) {
		if ( ! in_array( $attribute, $attributes_to_show ) ) {
			continue;
		}

		$available_attribute = iconic_get_available_attribute( $product, $attribute, $values );

		if ( empty( $available_attribute ) ) {
			continue;
		}

		$available_attributes[ $product_id ][] = $available_attribute;
	}

	return $available_attributes[ $product_id ];
}


/**
 * Get attributes to show.
 *
 * @return array
 */
function iconic_get_attributes_to_show() {
	return apply_filters( 'iconic_get_attributes_to_show', array(
		'pa_color',
	) );
}

/**
 * Get available attribute.
 *
 * @param WC_Product_Variable $product
 * @param string              $attribute
 * @param array               $values
 *
 * @return array
 */
function iconic_get_available_attribute( $product, $attribute, $values ) {
	$available_attribute = array(
		'slug' => $attribute,
	);

	if ( ! taxonomy_exists( $attribute ) ) {
		$available_attribute['name'] = $attribute;

		foreach ( $values as $value ) {
			$available_attribute['values'][ $value ] = array(
				'name'      => $value,
				'available' => iconic_has_available_variation( $product, $attribute, $value ),
			);
		}

		return $available_attribute;
	}

	$taxonomy = get_taxonomy( $attribute );
	$labels   = get_taxonomy_labels( $taxonomy );

	$available_attribute['name']   = $labels->singular_name;
	$available_attribute['values'] = array();

	foreach ( $values as $value ) {
		$term = get_term_by( 'slug', $value, $attribute );

		if ( ! $term ) {
			continue;
		}

		$available_attribute['values'][ $value ] = array(
			'name'      => $term->name,
			'available' => iconic_has_available_variation( $product, $attribute, $value ),
		);
	}

	return $available_attribute;
}

/**
 * Has available variation?
 *
 * @param WC_Product_Variable $product
 * @param string              $attribute
 * @param string              $value
 *
 * @return bool
 */
function iconic_has_available_variation( $product, $attribute, $value ) {
	$available_variation = false;
	$attribute           = 'attribute_' . sanitize_title( $attribute );
	$variations          = $product->get_available_variations();

	if ( empty( $variations ) ) {
		return $available_variation;
	}

	foreach ( $variations as $variation ) {
		foreach ( $variation['attributes'] as $variation_attribute_name => $variation_attribute_value ) {
			if ( $attribute !== $variation_attribute_name ) {
				continue;
			}

			if ( $value !== $variation_attribute_value && ! empty( $variation_attribute_value ) ) {
				continue;
			}

			$available_variation = $variation['is_purchasable'] && $variation['is_in_stock'];
			break;
		}

		if ( $available_variation ) {
			break;
		}
	}

	return $available_variation;
}