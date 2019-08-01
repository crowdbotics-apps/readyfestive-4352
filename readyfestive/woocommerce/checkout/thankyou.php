<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @package   WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


?>
<style type="text/css">
  .order-id-hd {
  font-family: Open Sans;
    font-size: 13px;
    line-height: normal;
    letter-spacing: 0.433333px;
    color: #131922;
    mix-blend-mode: normal;
    opacity: 0.6;
    font-weight: 400;
}
.woocommerce strong {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 13px;
  line-height: 23px;
  letter-spacing: 0.433333px;
  color: #131922;
  opacity: 0.6;
}
.woocommerce-notice  {
  font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 16px;
    letter-spacing: 0.666667px;
    color: #131922;
}
.map, .order_update, .thankyou .addresses {
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    margin-bottom: 21px;
}
.order_confirmation {
    padding: 12px 20px 20px;
    border-top: 1px solid #D8D8D8;
    margin: -8px 0 0;
}
.order_confirmation h3, .order_update h3 {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    letter-spacing: 0.6px;
    color: #131922;
    margin: 3px 0 0;
    text-transform: inherit;
}
.order_confirmation p, .order_update p {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    letter-spacing: 0.466667px;
    color: #131922;
    mix-blend-mode: normal;
    opacity: 0.9;
    margin: 0;
}
.order_update {
  padding: 13px 20px 30px;
}
.addresses {
    padding: 20px 20px 26px;
}
.shipping_mobile {
    border: 1px solid #E1E1E1;
    box-sizing: border-box;
    border-radius: 3px;
    display: inline-block;
    padding: 6px 18px;
    width: 291px;
    height: 49px;
    font-family: Open Sans;
    font-weight: normal;
    font-size: 14px;
    /* line-height: 33px; */
    letter-spacing: 0.466667px;
    color: #131922;
    mix-blend-mode: normal;
    opacity: 0.8;
    margin: 16px 0 0;
    display: flex;
    align-items: center;
}
.shipping_mobile svg {
  margin-right: 13px;
}
.thankyou h2 {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 23px;
    margin: 0 0 19px;
    text-transform: inherit;
    letter-spacing: 0.6px;
    color: #131922;
}
.woocommerce-customer-details--email, address {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 18px;
  letter-spacing: 0.466667px;
  color: #131922;
  mix-blend-mode: normal;
  opacity: 0.9;
}
.contact_info, .shipping_address_thankyou, .billing_address_thankyou {
  font-family: Open Sans;
  font-style: normal;
  font-weight: 600;
  font-size: 16px;
  line-height: 18px;
  letter-spacing: 0.533333px;
  color: #131922;
  mix-blend-mode: normal;
  opacity: 0.9;
  margin:0;
}
address, .woocommerce-column--billing-address, .woocommerce-customer-details--phone, .woocommerce-column--shipping-address  {
  margin-bottom: 0 !important;
}
.woocommerce-customer-details--email {
    margin: 11px 0 24px;
}
.shipping_address_thankyou, .billing_address_thankyou {
    margin-bottom: 5px;
    opacity: 1;
}
address {
    line-height: 23px;
}
.method strong {
  font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 18px;
    letter-spacing: 0.466667px;
    color: #131922;
    display: block;
    min-height: 43px;
}
.woocommerce {
    max-width: 600px;
    margin: auto;
    position: relative;
}
.vskd {
    display: inline-block;
    width: 46px;
    height: 46px;
    border: 1px solid #CC9749;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 11px;
    left: -66px;
}
@media screen and (max-width: 767px) { 
  .woocommerce strong {
       padding-left: 54px;
  }
  .woocommerce-notice {
        padding-left: 54px;
  }
  .vskd {
      left: 0;
  }
}
@media screen and (max-width: 480px) {
  .shipping_mobile  {
    width: 100%;
  }
}
</style>

<div class="woocommerce-order">

  <?php if ( $order ) : ?>
    
    </div>
    <?php if ( $order->has_status( 'failed' ) ) : ?>
      
      <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

      <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
        <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
        <?php if ( is_user_logged_in() ) : ?>
          <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
        <?php endif; ?>
      </p>

    <?php else : ?>
          <strong>Order#<?php echo $my_orderID=$order->get_order_number(); 
          if($my_orderID){
            $ip=$_SERVER['REMOTE_ADDR'];
            global $wpdb; 
             $table_name = "form_data";
             $row = $wpdb->get_row( "SELECT * FROM `form_data` WHERE ip='$ip'");
             if( $row){
            // print_r($row);
            $tabsID=$row->ID;
            $data_array = array('ip'=>'CLEAR','orderID'=>$my_orderID);
          //  print_r($data_array);
            $where = array('ID' =>$tabsID);
            $wpdb->update($table_name,$data_array,$where );}
          }
          //print_r($order); ?></strong>
      <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you <?php echo get_post_meta($order->ID,'_billing_first_name', true);?>!</p>

      <div class="vskd">
        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.92308 7.26923L0.5 9.69231L6.96154 16.1538L21.5 2.42308L19.0769 0L6.96154 11.3077L2.92308 7.26923Z" fill="#CC9749"/>
        </svg>
      </div>

    <?php endif; ?>
    <div class="map"><div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.maps-erstellen.de"></a></div></div>
        <div class="order_confirmation"><h3>Your Order is Confirmed</h3>
          <p>You'll receive a confirmation mail with your order number shortly</p>
        </div>
     </div>
    <div class="order_update"><h3>Order Updates</h3>
      <p>You'll get shiping and delivery updates by email. </p>
      <div class="shipping_mobile"><svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.9271 0H13.0728C14.0014 0 14.7614 0.759286 14.7614 1.68857V23.3114C14.7614 24.2414 14.0014 25 13.0728 25H1.9271C0.998525 25 0.238525 24.24 0.238525 23.3107V1.68857C0.238525 0.759286 0.998525 0 1.9271 0ZM9.28281 1.21714H5.7171C5.60424 1.21714 5.51281 1.30857 5.51281 1.42214C5.51281 1.535 5.60424 1.62643 5.7171 1.62643H9.28281C9.39567 1.62643 9.4871 1.535 9.4871 1.42214C9.4871 1.30857 9.39567 1.21714 9.28281 1.21714ZM7.49995 24.1557C7.03353 24.1557 6.65567 23.7779 6.65567 23.3107C6.65567 22.8436 7.03353 22.4664 7.49995 22.4664C7.96638 22.4664 8.34424 22.8436 8.34424 23.3107C8.34424 23.7779 7.96638 24.1557 7.49995 24.1557ZM1.41353 21.875H13.5864V2.67786H1.41353V21.875Z" fill="#42474E"/>
</svg> Get Shiping updates by text</div>
    </div>

    <?php // do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
    <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

  <?php else : ?>

    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

  <?php endif; ?>

</div>
<style type="text/css">
  .woocommerce-order-details {
    display: none;
}
.page-title {
    display: none;
}
</style>