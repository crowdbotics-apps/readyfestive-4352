<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>
<p><?php
  printf(
    __( 'Order #%1$s was placed  on %2$s and is currently %3$s.', 'woocommerce' ),
    '<mark class="order-number">' . $order->get_order_number() . '</mark>',
    '<mark class="order-date">' . date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ) . '</mark>',
    '<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>'
  );
?></p>
   

     
<?php  

/** START CUSTOM CODE */


$items = $order->get_items();
foreach ( $items as $item ) {
  $product_id = $item['product_id'];
    if($product_id ==3341){
     $name=$item['Name'];
   $planType=$item['Plan-Type'];
   $planItem=$item['Plans'];
   $Arr=explode(",",$planItem);
   
   ?>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="step-4-tab">
                    
                  

                  <ul class="nav nav-tabs">
                    <li id="plan_1" class="four_four hide <?php if($planType=='plan_1'){ echo 'active';}?>">
                      <label><span style="display: block;">Plan #1: 4 boxes per year</span> Choose any 4 holidays OR 4 seasons</label></li>
                    <li id="plan_2" class="three_one  hide <?php if($planType=='plan_2'){ echo 'active';}?>"><label><span style="display: block;">Plan #2: 4 boxes per year</span> Choose any 3 holidays &amp; any 1 seasons</label></li>
                    <li id="plan_3" class="four_two  hide <?php if($planType=='plan_3'){ echo 'active';}?>" ><label><span style="display: block;">Plan #2: 6 boxes per year</span> Choose any 4 holidays &amp; any 2 seasons</label></li>
                    <li id="plan_4" class="six_four hide <?php if($planType=='plan_4'){ echo 'active';}?>"><label><span style="display: block;">Plan #2: 10 boxes per year</span> Choose any 6 holidays &amp; any 4 seasons</label></li>
                  </ul>
                  <div class="errordiv chooseplanerror" style="color:red;font-size:14px;display:none">Choose your subscription plan.</div>

                  <div class="tab-content">
                    <div id="four_four" class="tab-pane fade active in">
                      <div class="w-sm-100 w-md-33">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row chooseseason">
                              <div class="form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" <?php if (in_array("Spring", $Arr)){ echo 'checked="checked"';}?> >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class=" form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer" type="checkbox" <?php if (in_array("Summer", $Arr)){ echo 'checked="checked"';}?> >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label class="checkbox-wrp">Fell
                                    <input class="price" name="price[]" value="Fell" type="checkbox" <?php if (in_array("Fall", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price" name="price[]" value="Winter" type="checkbox" <?php if (in_array("Winter", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="w-sm-100 w-md-66">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="w-sm-100 w-md-50">
                            <div class="checkbox-section row chooseholidays">
                            <div class="form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" <?php if (in_array("Valentine Day", $Arr)){ echo 'checked="checked"';}?>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" <?php if (in_array("Patrick Day", $Arr)){ echo 'checked="checked"';}?>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox"  <?php if (in_array("Easter", $Arr)){ echo 'checked="checked"';}?>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" <?php if (in_array("4th july", $Arr)){ echo 'checked="checked"';}?>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="w-sm-100 w-md-50">
                            <div class="checkbox-section row chooseholidays">
                              <div class="form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]" value="Halloween" type="checkbox" <?php if (in_array("Halloween", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]" value="Thanksgiving" type="checkbox"  <?php if (in_array("Thanksgiving", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox"  <?php if (in_array("Hannukkah", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" <?php if (in_array("Christmas", $Arr)){ echo 'checked="checked"';}?>>
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
        </div>
  <?php }
    
  if ($product_id == 445) {
  
     echo '<p>This is a record of your original subscription order. Individual subscription orders will appear in your Orders tab once those boxes are ready for processing. You can view and manage your Subscriptions using the Subscriptions tab in the sidebar on this page.</p>';
  }
  
}

/* END CUSTOM CODE */

?>

<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
  <h2><?php _e( 'Order Updates', 'woocommerce' ); ?></h2>
  <ol class="woocommerce-OrderUpdates commentlist notes">
    <?php foreach ( $notes as $note ) : ?>
    <li class="woocommerce-OrderUpdate comment note">
      <div class="woocommerce-OrderUpdate-inner comment_container">
        <div class="woocommerce-OrderUpdate-text comment-text">
          <p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
          <div class="woocommerce-OrderUpdate-description description">
            <?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
          </div>
            <div class="clear"></div>
          </div>
        <div class="clear"></div>
      </div>
    </li>
    <?php endforeach; ?>
  </ol>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
<style type="text/css">.step-4-tab h2 {
  font-size: 24px;
    font-weight: 600;
    color: #131922;
    margin: 57px 0 45px;
}
    
.step-4-tab p {
    font-size: 14px;
  line-height: 21px;
  color: #131922;
  max-width: 670px;
}
.step-4-tab p span {
  color: #898c90;
  display: unset;
}
.step-4-tab p a {
  color: #cc9749;
}
.step-4-tab .nav-tabs {
  border-bottom: 0;
    margin: 30px -17px 0;
    padding: 0;
    list-style: none;
    display: flex;
}
.step-4-tab .nav-tabs li {
    width: 25%;
    padding: 0 5px;
}
.step-4-tab .nav-tabs li label {
    margin-right: 0;
    line-height: 1.42857143;
    border: 1px solid #ce9551;
    border-radius: 0;
    text-align: center;
    color: #ce9551;
    line-height: 21px;
    display: block;
    font-size: 12px;
    padding: 10px 7px;
}


.step-4-tab .nav-tabs li.active label, .step-4-tab .nav-tabs li label:hover  {
  background: #ce9551;
    
    color: #fff;
}
.step-4-tab .nav-tabs>li>label span {
    font-family: 'daniela_script_boldregular','Lato',Arial,sans-serif;
    font-size: 22px;
    letter-spacing: 1px;
    margin: 0;
    font-weight: 400;
}
.step-4-tab .errordiv p {
  font-size: 14px;
   display: block;
   margin: 20px 0px;
   color: #ff5576;
       padding: 0 0 0 32px;
}
.step-4-tab .errordiv p .fa {
      font-size: 16px;
    margin: 2px 0 0 -16px;
}
.step-4-tab .tab-pane {
    padding: 50px 0 50px;
    max-width: 670px;
    display: flex;
}

.checkbox-section .form-group, .radio-wrp .form-group  {
  margin-bottom: 17px;
}
.checkbox-wrp {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 14px!important;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    padding-bottom: 0;
    font-weight: 400;
    color: #131922!important;
}

.checkbox-wrp input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkbox-wrp .checkmark {
    position: absolute;
    top: 50%;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff;
    border: 2px solid #e0e0e2;
    border-radius: 2px;
    transform: translateY(-50%);
}

.checkbox-wrp input:checked ~ .checkmark {
  background-color: #ce9551;
  border: 2px solid #ce9551;
}

.checkbox-wrp .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.checkbox-wrp input:checked ~ .checkmark:after {
  display: block;
}

.checkbox-wrp .checkmark:after {
    left: 4px;
    top: -1px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.form-sub-hd {
    font-size: 20px;
    color: #131922;
    text-transform: inherit;
    margin: 20px 0 30px -7px;
    font-weight: 600;
    font-family: 'Lato','Helvetica',Arial,sans-serif !important;
    letter-spacing: 1px;
    width: 100%;
}
.checkbox-section .form-group, .checkbox-section .form-group .form-group {
  width: 100%;
}
.wc-item-meta {
    display: none;
}
.hide {
    display: none;
}
.active {
    display: block;
}
@media screen and (max-width: 1024px) {
  .step-4-tab .nav-tabs {
    flex-wrap: wrap;
  }
  .step-4-tab .nav-tabs li {
    width: 50%;
    padding: 5px;
  }
}
@media screen and (min-width: 992px) {
  .step-4-tab .w-md-33 {
      width: 33%
  }
  .step-4-tab .w-md-66 {
      width: 66%;
      display:flex;
      flex-wrap: wrap;
  }
  .step-4-tab .w-md-66 .row  {
    display:flex;
    flex-wrap: wrap;
  }
  .step-4-tab .w-md-50 {
      width: 50%;
  }
}
@media screen and (max-width: 992px) {
  .step-4-tab .w-sm-100 {
    width: 100%;
  }
}
</style>
