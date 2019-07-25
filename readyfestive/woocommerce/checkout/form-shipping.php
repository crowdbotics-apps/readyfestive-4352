<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 id="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<span><?php esc_html_e( 'Billing Address', 'woocommerce' ); ?></span>
			</label>
		</h3>
		<div class="billing-container">
			
		<h3 id="same-shipping-address">
			<label class="radio-wrp woocommerce-same">
				<input class="woocommerce-same" type="radio" id="shipTosame" style="display: none;
" name="ship_to_different_address" value="1" checked="true" /> <span><?php esc_html_e( 'Same as shipping address', 'woocommerce' ); ?></span>
				<span class="checkmark"></span>
			</label>
		</h3>
		<h3 id="ship-to-different-address">
			<label class="radio-wrp woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" style="display: none;
" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="radio" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( 'Use a different billing address', 'woocommerce' ); ?></span>
				<span class="checkmark"></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields( 'shipping' );

				foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				?>
			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>
	</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
	<div class="pplace-my-order">
		<a href="https://qualifymyskills.com.au/readyfestive/test-2" class="ret-cart"><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 13L2 7L8 1" stroke="#28292D" stroke-width="2"/>
</svg> Back</a>
		<a href="javascript:void(0);" class="com-ord" onclick="place_order();";>Complete oreder</a>
	</div>
</div>
<script type="text/javascript">
	 jQuery(document).ready(function() {
	    jQuery("#shipTosame").click(function() {
	        jQuery(".shipping_address").hide();
	    });
	});
</script>
<style type="text/css">
	.radio-wrp {
	    display: block;
	    position: relative;
	    padding-left: 30px;
	    margin-bottom: 0px;
	    cursor: pointer;
	    font-size: 14px !important;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	    /* font-weight: 400 !important; */
	    color: #131922!important;
	    opacity: 1 !important;
	    font-family: 'montserrat_mediumregular' !important;
	}
	.radio-wrp input:checked ~ .checkmark {
    	background-color: #fff;
    	border: 2px solid #ce9551;
	}
	.radio-wrp .checkmark {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 18px;
	    width: 18px;
	    background-color: #fff;
	    border-radius: 50%;
	    border: 2px solid #e0e0e2;
	}
	.radio-wrp input:checked ~ .checkmark:after {
    	display: block;
	}
	.radio-wrp .checkmark:after {
	    top: 3px;
	    left: 3px;
	    width: 8px;
	    height: 8px;
	    border-radius: 50%;
	    background: #ce9551;
	}
	.radio-wrp .checkmark:after {
	    content: "";
	    position: absolute;
	    display: none;
	}
</style>