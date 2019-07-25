<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

				?>
				<img src="<?php echo $image[0]; ?>" class="checkout-logo">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>

			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order remove-payments">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	<div class="woocommerce-additional-fields mobile-view">
		<div class="pplace-my-order">
			<a href="https://qualifymyskills.com.au/readyfestive/test-2/" class="ret-cart"><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13L2 7L8 1" stroke="#28292D" stroke-width="2"></path>
			</svg>Back</a>
			<a href="javascript:void(0);" class="com-ord" onclick="place_order();" ;="">Complete oreder</a>
		</div>
	</div>

</form>
<input type="hidden" id="ip_address" value="<?php  echo $_SERVER['REMOTE_ADDR'];?>">
<input type="hidden" id="siteurl" value="<?php  echo site_url();?>">
<style type="text/css">
	.woocommerce-checkout-review-order.remove-payments div#payment {
    	display: none;
	}
	.form-row.place-order {
    display: none;
}
</style>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<script type="text/javascript">
	function place_order(){
	    //alert('hi');
		document.getElementById("place_order").click();
	}
	function process(id){
		var siteurl=jQuery("#siteurl").val();
		var ip=jQuery("#ip_address").val();
		var cnumber='123456';
		
		var mm='02';
		var yy='21';
		var csv='123';
		var postCode='1009';
		
		var actionType=id;
		 jQuery.ajax({
              type:'POST',
              data:{action:'process',actionType:actionType,ip:ip,cnumber:cnumber,mm:mm,yy:yy,csv:csv,postCode:postCode},
              url:siteurl+'/wp-admin/admin-ajax.php',
              success: function(value) {
                //jQuery( "#row_"+id ).hide();
                // alert(value);
               // location.reload(); 
              }
            });
	
		
}
</script>

