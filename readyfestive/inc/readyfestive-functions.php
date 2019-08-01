<?php /* These are readyfestive-specific functions */


// register acf options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Sitewide Content');	
}

// remove subscription single pages (should only be accessible through bundle)	
	 function bundled_product_template_redirect() {
	    if( is_singular( 'product' ) && has_term('subscription-boxes', 'product_cat') && !current_user_can('administrator') ) {
	        wp_redirect( home_url() . '/subscribe', 301 );
	        exit();
	    }
	}
add_action( 'template_redirect', 'bundled_product_template_redirect' );	


	
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '">Continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// remove breadcrumbs
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// add email field to Subscribe & Connect plugin

function my_custom_add_connect_network ( $networks ) {
	if ( ! isset( $networks['email'] ) ) {
		$networks['email'] = __( 'Email', 'subscribe-and-connect' );
	}
	return $networks;
} // End my_custom_add_connect_network()

add_filter( 'subscribe_and_connect_supported_networks', 'my_custom_add_connect_network' );



// remove subscription products from search results

function wpse188669_pre_get_posts( $query ) {

   if ( ! is_admin() && $query->is_main_query() && $query->is_search()) {

       $tax_query = array(
           array(
               'taxonomy' => 'product_cat',
               'field'   => 'slug',
               'terms'   => 'subscription-boxes',
               'operator' => 'NOT IN',
           ),

       );

       $query->set( 'tax_query', $tax_query );

	}

}

add_action( 'pre_get_posts', 'wpse188669_pre_get_posts' );

	

/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'id',
           'terms' => array(129,150), // Don't display products in the subscription categories on the shop page.
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );  



// add button shortcode
function beeButton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="button" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'beeButton');



// remove woocommerce sidebar from all pages

add_action( 'get_header', 'bee_remove_storefront_sidebar' );

function bee_remove_storefront_sidebar() {
		if ( is_woocommerce_activated() ) { 
	//if ( is_product() || is_search() || !is_descendant_tax(28, 'product_cat')) {
		
	if ( is_product() || is_tax() || is_shop()) {
		remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	}
		}
}




// Add capabilityies to Shop Manager Role

$role_object = get_role( 'shop_manager' );
// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );
$role_object->add_cap( 'manage_options' );
$role_object->add_cap( 'promote_users' );
$role_object->add_cap( 'remove_users' );
 
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {
    
    return current_user_can('update_plugins');
    
}


// remove In Stock text but keep low stock text (both have the same class, so I can't do it with css)
function custom_stock_totals($availability_html, $availability_text, $product) {
	if (substr($availability_text,0, 2)=="In") {	
		$availability_html = '';
	} else if ( ! $product->is_in_stock() ) {
		$availability_html = '<p class="stock out-of-stock">' . esc_html( $availability_text ) . '</p>';
	} else {
		$availability_html = '<p class="stock">' . esc_html( $availability_text ) . '</p>';
	}
	return 	$availability_html;
}
add_filter('woocommerce_stock_html', 'custom_stock_totals', 20, 3);



 
// add product name to subscriptions table in my account

function bee_add_subscription_name_to_table($subscription) {
	
	foreach ( $subscription->get_items() as $item_id => $item ) {
		$_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $subscription->get_product_from_item( $item ), $item );
		
		if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
			echo ' - <a href="' . esc_url( $subscription->get_view_order_url() ) . '">' . esc_html( apply_filters( 'woocommerce_order_item_name', $item['name'], $item ) ) . '</a> ';
			
		}
	}
}
add_action( 'woocommerce_my_subscriptions_after_subscription_id', 'bee_add_subscription_name_to_table', 35 );



 
// add description into product summary
function woocommerce_template_product_description() {

if (get_the_content()) {
	echo '<div class="product-description"><h3>Product Details</h3>' . get_the_content() . '</div>';
}

}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 35 );



// remove Add to Cart button from shop/archive pages
function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');




// remove product image links
add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails',999 );
 
function wc_remove_link_on_thumbnails( $html ) {
     return strip_tags( $html,'<div><img>' );
}





// hide reviews and additional info on single product page
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}


// footer
function admin_footer_hook(){
	global $post;
	if ( get_post_type($post) == 'product') {
?>
	<script type="text/javascript">
		jQuery('#normal-sortables').insertBefore('#postdivrich');
	</script>
<?php
	}
}
add_action('admin_footer','admin_footer_hook');


// function to find out if product is already in cart
// usage: if(woo_in_cart(123)) 
function woo_in_cart($product_id) {
    global $woocommerce;
 
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
 
        if($product_id == $_product->id ) {
            return true;
        }
    }
 
    return false;
}



// add product permalink button to YITH QuickView plugin

function bee_yith_wcqv_product_permalink() {
if ( !has_term( 'subscription-boxes', 'product_cat' ) ) {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="'.$link.'" class="full-details">View Full Product Details &raquo;</a>');
}
}
add_action( 'yith_wcqv_product_summary', 'bee_yith_wcqv_product_permalink', 26 );



// move Quick View button on YITH QuickView plugin

add_action( 'template_redirect', 'move_quick_view_button' );
function move_quick_view_button(){

	
  if( class_exists( 'YITH_WCQV_Frontend' ) ){
	
	$quick_view = YITH_WCQV_Frontend();
	
	remove_action('woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
	add_action( 'woocommerce_before_shop_loop_item_title', array( $quick_view, 'yith_add_quick_view_button' ), 50 );
  	
  }


}


function show_coming_soon_date(){

global $post, $product;

	$get_stock_message = maybe_unserialize(get_post_meta($post->ID, '_out_of_stock_note', true));

if (!$product->is_in_stock() && has_term('shop-boxes','product_cat')) { 
	
	if ($get_stock_message) {
		echo '<span class="comingsoon">'. $get_stock_message .'</span>';
	} else { 
		echo '<span class="comingsoon">Coming Soon</span>';
	}
}


	
}
add_action( 'woocommerce_before_shop_loop_item_title', 'show_coming_soon_date', 50 );


// change QuickView button label on subscriptions only.
add_filter( 'pre_option_yith-wcqv-button-label', 'change_quickview_button_on_subscriptions' );
function change_quickview_button_on_subscriptions(){
	
	// if subscription product
	if ( has_term( 'subscription-boxes', 'product_cat' ) ) {
		
		$return = 'Subscribe';
		
		
 
        if(woo_in_cart(get_the_ID())) {
				$return = '&#x2713; Added!';
			} else {
				$return = 'Subscribe';
			}  
		
		
	} else if ( has_term( 'shop-boxes', 'product_cat' ) ) {
		
		$return = 'Buy Now';
		
	} else {
	// for all other products
		$return = 'Quick Look';
	}
	
	
	return $return;
}




/**
 * Changes the redirect URL for the Return To Shop button in the cart.
 *
 * @return string
 */
function wc_empty_cart_redirect_url() {
	return bloginfo('url') . '/subscribe/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );




/**
 * Redirect users after add to cart.
 */
function my_custom_add_to_cart_redirect( $url ) {
	
	if ( ! isset( $_REQUEST['add-to-cart'] ) || ! is_numeric( $_REQUEST['add-to-cart'] ) ) {
		return $url;
	}
	
	$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_REQUEST['add-to-cart'] ) );
	
	
	// redirect switch subscriptions directly to checkout
	if ( isset( $_GET['switch-subscription'] )) {
		$url = WC()->cart->get_checkout_url();
	}
	
	
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );


// remove related products from subscription switch page
function wc_remove_related_products( $args )
{
    if ( isset( $_GET['switch-subscription'] )) {
        return array();
    } 

    return $args;
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);


// change "Subscribe Now" button text on switch subscription page
add_filter( 'pre_option_woocommerce_subscriptions_add_to_cart_button_text', 'change_subscribe_button_on_switching' );
function change_subscribe_button_on_switching(){
	
		if ( isset( $_GET['switch-subscription'] )) {
			return 'Update Subscription';
		} else {
			return 'Subscribe Now';
		}
	
}

// change "Place Order" button text on switch checkout page
add_filter( 'pre_option_woocommerce_subscriptions_order_button_text', 'change_checkout_button_on_switching' );
function change_checkout_button_on_switching() {
	
	if (!is_admin()) {
		// Find each product in the cart and add it to the $cart_ids array
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if ( isset( $cart_item['subscription_switch'] ) ) {
				return 'Update Subscription';
			} else { 
				return 'Place Order';
			}
			
		}
	}
}


// add body class to checkout page if on a switch subscription
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
   
   if (is_user_logged_in() && is_checkout()) {
    	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			if ( isset( $cart_item['subscription_switch'] ) ) {
        	$classes[] = 'switch-checkout';
    		}
		}
   }
    return $classes;
     
}


// remove 'Optional' from Product Bundles
add_filter( 'woocommerce_bundles_optional_bundled_item_suffix', 'wc_pb_remove_optional_suffix', 10, 3 );
function wc_pb_remove_optional_suffix( $suffix, $bundled_item, $bundle ) {
	return '';
}


// change columns for Product Bundles

add_filter( 'woocommerce_bundled_items_grid_layout_columns', 'wc_pb_grid_layout_change_number_of_columns', 10, 2 );
function wc_pb_grid_layout_change_number_of_columns( $columns, $bundle ) {
	return 4;
}


// add message to switch subscription page
add_action('woocommerce_before_main_content', 'switch_subscription_message', 10, 2);
function switch_subscription_message() {
	if ( isset( $_GET['switch-subscription'] ) ) {

		$message = __( '<div class="switch-message">This will <b>replace</b> your existing subscription to this holiday. Also, please note that any changes to your subscription must be made before the payment date for this year\'s box – otherwise this new subscription will apply to <em>next year\'s</em> box.</div>', 'woocommerce-subscriptions' );
		wc_add_notice( apply_filters( 'switch_subscription_message', $message, $product_id ) );
	}
}




// change "Recurring Total" to "Subscription Total"
add_filter( 'gettext', 'bee_recurring_total_label', 20, 3 );
function bee_recurring_total_label( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
case 'Recurring Total' :
$translated_text = __( 'Subscription Total', 'woocommerce' );
break;
case 'Recurring Totals' :
$translated_text = __( 'Subscription Totals', 'woocommerce' );
break;
case 'Coupon code' :
$translated_text = __( 'Gift code', 'woocommerce' );
break;
case 'Coupons' :
$translated_text = __( 'Gift Codes & Coupons', 'woocommerce' );
break;
}
return $translated_text;
}


/* not working
add_action( 'woocommerce_applied_coupon', 'wc_hide_coupon_notice' );
function wc_hide_coupon_notice( $coupon){

$coupon = new WC_Coupon( $coupon_code );

$coupon_post = get_post( $coupon->id );

$coupon_data = $this->get_coupon_meta_data( $coupon );

var_dump($coupon_data);

}
*/


// add coupon disclaimer alert if store credit is added with subscription product in cart
function filter_woocommerce_coupon_message( $msg, $msg_code, $instance ) {

		global $woocommerce;

        foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            $terms = get_the_terms( $_product->id, 'product_type' );
			$product_type = ! empty( $terms ) && isset( current( $terms )->slug ) ? sanitize_title( current( $terms )->slug ) : 'simple';
			
			if ( $coupon->discount_type == 'smart_coupon' && ('variable-subscription' === $product_type || 'simple-subscription' === $product_type) ) {
				$msg = "Sweet! Gift code applied successfully.<br> <b>PLEASE NOTE:</b> If using this code for a pay-as-you-go subscription purchase, your gift code will not be deducted until the actual date of payment. If you use this gift code to purchase another product in the meantime, only the remaining gift balance (if any) will apply to your next subscription payment. For this reason, you must still provide your credit card information even if your gift code currently covers the cost.";
    		
			} else {
				$msg = "Promo/Gift code applied successfully.";
			}
			
           
        }

	return $msg;

    
};
add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );



// Add the amount to the coupon label in the Cart Totals section
function filter_woocommerce_cart_totals_coupon_label( $esc_html, $coupon ) { 

	global $woocommerce;

	foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
		$terms = get_the_terms( $_product->id, 'product_type' );
		$product_type = ! empty( $terms ) && isset( current( $terms )->slug ) ? sanitize_title( current( $terms )->slug ) : 'simple';
		
		if ( $coupon->discount_type == 'smart_coupon' && ('variable-subscription' === $product_type || 'simple-subscription' === $product_type )) {
			$esc_html = ( __( 'Store Credit Applied', 'woocommerce' ) . '<br><small> Current Balance: $' .$coupon->amount. '<br> Code: '  . $coupon->code . '<br>Note: For subscriptions, store credit is not deducted upfront. On your next subscription payment date(s), if this code has available balance, it will be deducted at that time.</small>');
		} else {
			$esc_html = ( __( 'Store Credit:', 'woocommerce' ) . ' $' .$coupon->amount. '<br><small> Code: '  . $coupon->code . '</small>');
		}
		
	   
	}
    return $esc_html; 
};
add_filter( 'woocommerce_cart_totals_coupon_label', 'filter_woocommerce_cart_totals_coupon_label', 10, 2 ); 


// show store credit after order details table
add_action( 'woocommerce_order_details_after_order_table', 'show_store_credit_balance', 6, 1 );

function show_store_credit_balance($order){


	if ( sizeof( $order->get_used_coupons() ) > 0 ) {
		
		$store_credit_balance = '';
		
		foreach ( $order->get_used_coupons() as $code ) {
			if ( ! $code ) continue;
			
			$coupon = new WC_Coupon( $code );
			
			if ( $coupon->discount_type == 'smart_coupon' && $coupon->amount > 0 ) {
				$store_credit_balance .= '<li><strong>'. $coupon->code .'</strong></li>';
			}
		}

		if ( !empty( $store_credit_balance ) ) {
			echo "<br /><h4>Store Credit Code(s) Applied:</h4>";
			echo "<ul>" . $store_credit_balance . "</ul><br />";
		}
	}

}





/* --------------------------------------- Add custom product meta fields to order */

/* SRC: https://wisdmlabs.com/blog/add-custom-data-woocommerce-order-2/ */

add_filter('woocommerce_add_cart_item_data','rs_add_item_data',10,3);

/**
 * Add custom data to Cart
 * @param  [type] $cart_item_data [description]
 * @param  [type] $product_id     [description]
 * @param  [type] $variation_id   [description]
 * @return [type]                 [description]
 */
function rs_add_item_data($cart_item_data, $product_id, $variation_id)
{
    if(isset($_REQUEST['wcbc_style_select']))
    {
        $cart_item_data['wcbc_style_select'] = sanitize_text_field($_REQUEST['wcbc_style_select']);
    }

   
    return $cart_item_data;
}

/*  Display Details as Meta in Cart 
add_filter('woocommerce_get_item_data','rs_add_item_meta',10,2);


function rs_add_item_meta($item_data, $cart_item)
{

    if(array_key_exists('wcbc_style_select', $cart_item))
    {
        $custom_details = $cart_item['wcbc_style_select'];

        $item_data[] = array(
            'key'   => 'Personal Style',
            'value' => $custom_details
        );
    }

    return $item_data;
}

*/

/* Step 4: Add Custom Details as Order Line Items */
add_action( 'woocommerce_checkout_create_order_line_item', 'rs_add_custom_order_line_item_meta',10,4 );

function rs_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
{

    if(array_key_exists('wcbc_style_select', $values))
    {
        $item->add_meta_data('_wcbc_style_select',$values['wcbc_style_select']);
        
        $current_user = wp_get_current_user();
        update_user_meta( $current_user->ID, 'description',$values['wcbc_style_select'] );
        
    }

  }






/* OLD STUFF */
/*

add_filter( 'woocommerce_order_formatted_line_subtotal', 'wc_pb_empty_bundled_item_cart_order_price', 11, 2 );
//add_filter( 'woocommerce_bundled_item_price_html', 'wc_pb_empty_bundled_item_price_html', 100, 3 );
function wc_pb_empty_bundled_item_price_html( $price, $original_price, $item ) {
	if ( ! $item->is_optional() ) {
		$price = '';
	}
	return $price;
}
function wc_pb_empty_bundled_item_cart_order_price( $price, $values ) {
	if ( isset( $values[ 'bundled_by' ] ) ) {
		$price = '';
	}
	return $price;
}
*/

/*
function bee_bundle_order_details_note() {
	
	 print '<p>This is simply a record of your original subscription order. It does not include prices because they will not be charged until each box ships. You will see individual subscription orders here once those are in processing for payment. </p> <p>You can view and manage your Subscriptions using the Subscriptions tab in the sidebar on this page.</p>';
	 
}
add_action( 'woocommerce_order_items_table', 'bee_bundle_order_details_note',10 );
*/



/* change text "first renewal" to "ship date" in checkout page:

function bee_wcs_add_cart_first_renewal_payment_date($order_total_html, $cart) {
	
	if ( 0 !== $cart->next_payment_date ) {
		$first_renewal_date = date_i18n( wc_date_format(), strtotime( get_date_from_gmt( $cart->next_payment_date ) ) );
		$order_total_html = '<div class="first-payment-date"><small>' . sprintf( __( 'Ship date: %s', 'woocommerce-subscriptions' ), $first_renewal_date ) .  '</small></div>';
	}
	return 	$order_total_html;
}
add_filter('wcs_cart_totals_order_total_html', 'bee_wcs_add_cart_first_renewal_payment_date', 20, 3); */






// add login/logout button to top nav
/**
* Only on the specified menu, header-menu, add 'hi there' and user name, and login/logout link. 

function smart_loginout($items, $args) {
 
    
    if( $args->theme_location == 'secondary' ) {
 
        if(is_user_logged_in()) {
           		$user_info = get_userdata(get_current_user_id());
				$firstname = $user_info->first_name;
				if ($firstname) {
					$hithere = '<li class="hithere"><a href="' . get_option('siteurl') .'/my-account">Hi, ' .$user_info->first_name.'</a></li>';
				}
			$newitems = '<li><a href="'. wp_logout_url(home_url()) . '">Log Out</a></li>';
        } else {		
			  $newitems = '<li><a href="'. get_option('siteurl') . '/my-account">Log In</a></li>';
		}
  
		$newmenu = $hithere . $newitems . $items;
        return $newmenu;
 
    } else {
 
        // for other menus
 
        return $items;
    }
 
}
 
add_filter('wp_nav_menu_items', 'smart_loginout', 10, 2);
*/




/**
* Get WooCommerce to use "large" images in the lightbox instead of the originals.
* Replace $image_link = wp_get_attachment_url( $attachment_id ); with the following two lines.

$image_link_array = wp_get_attachment_image_src($attachment_id, 'large');
$image_link = $image_link_array[0];
*/



/*
// Change the breadcrumb delimeter
add_filter( 'woocommerce_breadcrumb_defaults', 'bee_change_breadcrumb_delimiter' );
function bee_change_breadcrumb_delimiter( $defaults ) {
	
	$defaults['delimiter'] = '&nbsp; &gt; &nbsp;';
	return $defaults;
}
*/




/*
// admin css/js
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #product_cat-28 > label,     
	#product_cat-29 > label,
	#product_cat-30 > label {
	  background:#f2cd84;
	  display:block;
    } 
  </style>';
}
*/
