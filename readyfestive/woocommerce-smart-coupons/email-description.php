<?php if (!defined('ABSPATH')) exit; ?>

<?php
// start bee custom
// moved this up here from lower down 
$coupon = new WC_Coupon( $coupon_code );
$coupon_post = get_post( $coupon->id );
$coupon_data = $this->get_coupon_meta_data( $coupon );

$for_products = $coupon->product_ids; // array of products you can use for this coupon

/*$for_product_id = 1508; // id of this specific product
$for_product_name = get_the_title($for_product_id); // title of this product 
if (in_array($for_product_id, $for_products)) { */
if (!empty($for_products) && $coupon_data['coupon_type'] == 'Store Credit') { // meaning this is a coupon that has to be used on a certain product
	
	 $email_heading = 'You have received a gift worth ' . $coupon_data['coupon_amount'] . '!';
	
	// echo '<a href="' . get_page_link($for_product_id) . '">Start customizing your supbscription now!</a>';
}  
 

// end bee custom

	if ( function_exists( 'wc_get_template' ) ) {
		wc_get_template('emails/email-header.php', array( 'email_heading' => $email_heading ));
	} else {
		woocommerce_get_template('emails/email-header.php', array( 'email_heading' => $email_heading ));
	}
?>

<style type="text/css">
		.coupon-container {
			margin: .2em;
			box-shadow: 0 0 5px #e0e0e0;
			display: inline-table;
			text-align: center;
			cursor: pointer;
			background-color:#f5f5f5
		}
		.coupon-container.blue { background-color: #D7E9FC }

		.coupon-container.medium {
			padding: .55em;
			line-height: 1.8em;
		}

		.coupon-content.small { padding: .2em 1.2em }
		.coupon-content.dashed { border: 1px dashed }
		.coupon-content.blue { border-color: rgba(0,0,0,.28) }
		.coupon-content .code {
			font-family: monospace;
			font-size: 1.2em;
			font-weight:700;
		}

		.coupon-content .coupon-expire,
		.coupon-content .discount-info {
			font-family: Helvetica, Arial, sans-serif;
			font-size: 1em;
		}
	
		.discount-description {
		    font: .9em/1 Helvetica, Arial, sans-serif;
		    margin: 10px inherit;
			text-align:center;
		}
		
		.discount-description a {
		font-size: 1.2em;
		display:block;
		margin-top:15px;
		background:#cba86b;
		color:#fff;
    padding: 20px;
    display: inline-block;
    margin: 0 auto;
		}
</style>



<?php if ( !empty( $from ) ) { ?>
<p><?php echo $sender . ' has sent you a ReadyFestive Gift Card'; ?></p>
<?php } ?>

<b>Message:</b>
<p><?php echo $message_from_sender; ?><p>

<?php 
	$show_coupon_description = get_option( 'smart_coupons_show_coupon_description', 'no' );
	if ( ! empty( $coupon_post->post_excerpt ) && $show_coupon_description == 'yes' ) {
		echo '<div class="discount-description">' . $coupon_post->post_excerpt . '</div>';
	}
?>

<p><br><?php echo sprintf(__("To redeem your gift, enter the following code during checkout:", WC_Smart_Coupons::$text_domain), $blogname); ?></p>


<?php
	
	$coupon_target = '';
	$wc_url_coupons_active_urls = get_option( 'wc_url_coupons_active_urls' );
	if ( !empty( $wc_url_coupons_active_urls ) ) {
		$coupon_target = ( !empty( $wc_url_coupons_active_urls[ $coupon->id ]['url'] ) ) ? $wc_url_coupons_active_urls[ $coupon->id ]['url'] : '';
	}
	if ( !empty( $coupon_target ) ) {
		$coupon_target = home_url( '/' . $coupon_target );
	} else {
		$coupon_target = home_url( '/?sc-page=shop&coupon-code=' . $coupon_code );
	}

	$coupon_target = apply_filters( 'sc_coupon_url_in_email', $coupon_target, $coupon );
	
	
?>

<div style="margin: 10px 0; text-align: center;" title="Coupon Code">
	<!--<a href="<?php echo $coupon_target; ?>" style="color: #444;">-->

		<div class="coupon-container medium" style="cursor:pointer; text-align:center">
			<?php
				echo '<div class="coupon-content blue dashed small">
				
					<div class="discount-info">';

					if ( ! empty( $coupon_data['coupon_amount'] ) && $coupon->amount != 0 ) {
						echo $coupon_data['coupon_amount'] /*. ' ' . $coupon_data['coupon_type']*/;
						if ( $coupon->free_shipping == "yes" ) {
							echo __( ' &amp; ', WC_Smart_Coupons::$text_domain );
						}
					}

					if ( $coupon->free_shipping == "yes" ) {
						echo __( 'Free Shipping', WC_Smart_Coupons::$text_domain );
					}
					echo '</div>';
					
					echo '<div class="code">'. $coupon->code .'</div>';

					

					if( !empty( $coupon->expiry_date) ) {
						$expiry_date = $this->get_expiration_format( $coupon->expiry_date );
						echo '<div class="coupon-expire">'. $expiry_date .'</div>';
					} else {
						echo '<div class="coupon-expire">'. __( 'Never Expires ', WC_Smart_Coupons::$text_domain ).'</div>';
					}
				echo '</div>';
			?>
		</div>
	<!--</a>-->
</div>

<center><a href="https://readyfestive.com">Visit ReadyFestive</a></center>
<br>
<p>Questions? <a href="https://readyfestive.com/received-a-gift">Click here</a> to learn how to redeem your gift card.</p>

<hr />

<?php if ( !empty( $from ) ) { ?>
	<p><small><?php echo __( 'You received this gift card', WC_Smart_Coupons::$text_domain ) . ' ' . $from . $sender; ?></small></p>
<?php } ?>

<div style="clear:both;"></div>

<?php
	if ( function_exists( 'wc_get_template' ) ) {
		wc_get_template('emails/email-footer.php');
	} else {
		woocommerce_get_template('emails/email-footer.php');
	}
?>
