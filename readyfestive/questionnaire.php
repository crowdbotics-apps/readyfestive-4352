﻿    <?php /* Template Name: Questionnaire */ ?>

<?php get_header(); 

global $wpdb; 
  $table_name = "form_data";
  $ip=$_SERVER['REMOTE_ADDR'];
  update_post_meta(3480, '_subscription_trial_length',0);
  update_post_meta(3480, '_subscription_trial_period','day');
  $row = $wpdb->get_row( "SELECT * FROM  $table_name WHERE ip='$ip'");
  if($row){
  $jsondata=$row->tab1;
  $obj = json_decode($jsondata,TRUE);
  //print_r($obj);
  $lifestageValArr=$obj['lifestageVal'];
  $describes=$obj['describes'];
  $lifestageValArry=explode(',',$lifestageValArr);
  $jsonTab2=$row->tab2;
  $obj2=json_decode($jsonTab2,true);
  //print_r($obj2);
  $which_area_home_holiday_seasonal=explode(',',$obj2['which_area_home_holiday_seasonal']);
  $typically_shop=explode(',',$obj2['typically_shop']);
  $image_best_captureVal=explode(',',$obj2['image_best_captureVal']);
  //print_r($lifestageValArry);
  $jsonTab3=$row->tab3;
  $obj3=json_decode($jsonTab3,true);
 // print_r($obj3);
  $any_certain_type=explode(',',$obj3['any_certain_type_of_holiday_seasonalVal']);
   $like_to_avoid=explode(',',$obj3['like_to_avoid']);
 } 
  
?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FONT  awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
     <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/form/css/custom.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/form/css/style.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/form/fonts/stylesheet.css">
    <style type="text/css">
      .checkbox-wrp input:disabled ~ .checkmark{
      background-color: #ccc;
      border-color:#ccc;
    }
    .build-subs p {
    text-align: justify;
}
    </style>
  <body>
    <div class="stepwizard" >
		<div class="stepwizard-row setup-panel">
			<div class="build-subs">
				<div id="border-wrapper">
					<h2> BUILD SUBSCRIPTION</h2>
					<div id="border"></div>
				</div>

				<p clas="align-center">Welcome! We're here to help bring festive moments to your home. </p>
				<p>We are a subscription service, offering customized boxes for four seasons and eight holidays. Choose the subscription plan that works best for you. Your box will arrive with plenty of time to decorate before the holiday or season. For more information about billing and shipping, please visit our <a href="#">FAQ Page</a>. </p>
				<p class="build-desc">Please tell us more about you, so you get personalized products you'll love. Sound good? Let's get started!</p>
			</div>
		</div>
    </div>
    <div class="">
      <div class="stepwizard" >
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-primary btn-circle" id="firststep">
                <span>Step 1</span> <span class="tab-titel">ABOUT YOU</span>
              </a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-2" type="button" onclick="tabOne();"  class="btn btn-default btn-circle" disabled="disabled" id=secondstep><span>Step 2</span> 
                <span class="tab-titel">DECORATING STYLE</span></a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-3" type="button" onclick="tabTwo();" class="btn btn-default btn-circle" disabled="disabled" id="thirdstep"><span>Step 3</span> 
                <span class="tab-titel">SUBSCRIPTION PREFERENCES</span></a>
            </div>
            <div class="stepwizard-step hidediv">
              <a href="#step-4" type="button" onclick="tabThree();" class="btn btn-default btn-circle" disabled="disabled" id="four-step"><span>Step 3</span> BUILD SUBSCRIPTION</a>
            </div>
          </div>
      </div>
  
      <form role="form" action="" method="post">
          <div class="row setup-content" id="step-1">
             <div class="form-wrapper">
                  <h2>About you</h2>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input id="fname" type="text" class="form-control" value="<?php if( !empty($obj)) {echo $obj['firstname'];}?>"  required="required">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>Last Name</label>
                      <input id="lname" type="text" class="form-control" value="<?php if( !empty($obj)) { echo $obj['lname'];}?>" required="required">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>Last Name Initial*</label>
                      <input type="text" id="lNInitial" class="form-control"  value="<?php if( !empty($obj)) {  echo $obj['lNInitial'];} ?>" required="required">
                      <small class="form-text text-muted">*for monogramming</small>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>When is your birthday?</label>
                      <input type="date" id="dob" name="bday" value="<?php if($obj) {  echo $obj['dob']; } ?>" class="form-control"  required="required">
                  </div>

                  <div class="col-xs-12 col-md-12 col-md-12 bdcudf">
                      <h4 class="form-sub-hd">Lifestage & Milestones <span>Check all that apply</span></h4>
                      <div class="checkbox-section row">
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Single
                            <input name="lifestage[]" value="single" type="checkbox"
                            <?php if(!empty($lifestageValArry)) { if (in_array("single", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 form-group">
                          <label class="checkbox-wrp">Young children in the home
                            <input  name="lifestage[]" value="yound-children-in-home" type="checkbox" 
                           <?php if(!empty($lifestageValArry)) { if (in_array("yound-children-in-home", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 form-group">
                          
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Newlywed
                            <input name="lifestage[]" value="newlywed" type="checkbox" 
                             <?php if(!empty($lifestageValArry)) { if (in_array("newlywed", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 form-group">
                          <label class="checkbox-wrp">Older children in the home
                            <input name="lifestage[]" value="older-childern-in-home" type="checkbox" 
                             <?php if(!empty($lifestageValArry)) { if (in_array("older-childern-in-home", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 form-group">
                          
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">New baby
                            <input name="lifestage[]" type="checkbox" value="new-baby"
                           <?php if(!empty($lifestageValArry))  { if (in_array("new-baby", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Empty nest
                            <input name="lifestage[]" value="empty-nest" type="checkbox" 
                           <?php if(!empty($lifestageValArry))  { if (in_array("empty-nest", $lifestageValArry)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        </div>
                        <h4 class="form-sub-hd col-xs-12 col-md-12 col-md-12">Which best describes your home?
                          <span>Select one</span></h4>
                        <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Aparment / condominium
                              <input type="radio" value="aparment-condominium" name="describes"
                              <?php if(!empty($describes)){if($describes=='aparment-condominium'){ echo 'checked';}}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Townhome
                              <input type="radio" <?php  if(!empty($describes)){ if($describes=='townhome'){ echo 'checked';}}?> value="townhome" name="describes">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Single family home
                              <input type="radio"  value="single-family-home" <?php  if(!empty($describes)){ if($describes=='single-family-home'){ echo 'checked';}}?> name="describes" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                    </div>
                    <div class="button-row">
                      <button class="btn nextBtn btn-lg pull-right" type="button" >Next Step<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                      <!-- <div class="btn save-changes" data-toggle="modal" onclick="tabOne();" >save all changes
                     <div style="display: none; width:15px;float: right;" id="tab1_loader"><img style="margin-left:10px;" src="<?php echo site_url(); ?>/wp-content/themes/readyfestive/form/images/load.gif"></div>
                      </div> --> 
                    </div>
                  </div>
            </div>
          </div>
          <div class="row setup-content" id="step-2">
              <div class="form-wrapper">
                  <h2>DECORATING STYLE</h2>
                  <div class="col-xs-12 col-md-12 col-md-12">
                    <h4 class="form-sub-hd Sas">How many holidays and/or seasons do you like to decorate for?
                      <span>Select one</span>
                    </h4>

                    <div class="row">
                      <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">A few (<3)
                              <input type="radio" name="how-many-holidays-seasons"
                               <?php if(!empty($obj2)){ if($obj2['how_many_holidays_seasons']=='A-few-3'){ echo 'checked';}}?> value="A-few-3">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">A handful (4-6)
                              <input type="radio" <?php if(!empty($obj2)){ if($obj2['how_many_holidays_seasons']=='A-handful-4-6'){ echo 'checked';}}?> name="how-many-holidays-seasons" value="A-handful-4-6">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">All of them! (7+)
                              <input type="radio" name="how-many-holidays-seasons" <?php if(!empty($obj2)){ if($obj2['how_many_holidays_seasons']=='All-of-them-7+'){ echo 'checked';}}?> value="All-of-them-7+">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                    </div>

                     <h4 class="form-sub-hd which-area">Which area(s) of your home do you like to have a holiday or seasonal presence? <span>Check all that apply</span></h4>

                    <div class="checkbox-section row">
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Front door
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="front-door"
                        <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("front-door", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Kitchen
                            <input type="checkbox"  name="which-area-home-holiday-seasonal[]" value="Kitchen"
                             <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Kitchen", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Children's rooms
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="children-rooms"
                             <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("children-rooms", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Entryway
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Entryway"
                         <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Entryway", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Dining Room
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Dining-room"
                      <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Dining-room", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Outdoor
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Outdoor"
                         <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Outdoor", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Living room
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Living-room"
                        <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Living-room", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Bathroom(s)
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Bathroom"
                      <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Bathroom", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Pool Deck
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Pool-desk"
                         <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Pool-desk", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Mantle
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Mantle"
                       <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Mantle", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Bedroom(s)
                            <input type="checkbox" name="which-area-home-holiday-seasonal[]" value="Bedroom"
                         <?php if(!empty($which_area_home_holiday_seasonal)) { if (in_array("Bedroom", $which_area_home_holiday_seasonal)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <input type="text" class="form-control" placeholder="Other" id="which_area_home_holiday_other" name="which-area-home-holiday-seasonal-other" value="<?php if(!empty($obj2)){ echo $obj2['which_area_home_holiday_seasonal_other'];}?>">
                      </div>
                    </div>

                    <h4 class="form-sub-hd typically">Where do you typically shop for holiday and seasonal home decor?<span>Check all that apply</span></h4>

                    <div class="checkbox-section row">
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Amazon
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Amazon"
             <?php if(!empty($typically_shop)) { if (in_array("Amazon", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Etsy
                            <input type="checkbox"name="typically-shop-for-holiday-seasonal[]" value="Etsy" 
                      <?php if(!empty($typically_shop)) { if (in_array("Etsy", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Pier 1, World Market
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Pier-1-world-Market" 
                 <?php  if(!empty($typically_shop)) { if (in_array("Pier-1-world-Market", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Anthropologie
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Anthropologie" 
                    <?php  if(!empty($typically_shop)) { if (in_array("Anthropologie", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">HomeGoods, TJ Maxx
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="HomeGood-Tj-Maxx"
                      <?php  if(!empty($typically_shop)) { if (in_array("HomeGood-Tj-Maxx", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Target
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Target"
                      <?php  if(!empty($typically_shop)) { if (in_array("Target", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp lab-wid">Ballard Designs, Balsam Hill
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Ballard-Designs-Balsam-Hill"
                      <?php  if(!empty($typically_shop)) { if (in_array("Ballard-Designs-Balsam-Hill", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp custom-gift">Local Home & Gift Store
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Local-Home-Gift-Store" 
                       <?php  if(!empty($typically_shop)) { if (in_array("Local-Home-Gift-Store", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp lab-wid">Williams Sonoma, Pottery Barn
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Willams-sonoma-Pottery-Barn"
                      <?php  if(!empty($typically_shop)) { if (in_array("Willams-sonoma-Pottery-Barn", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Crate & Barrel
                            <input type="checkbox" value="Crate-Barrel" name="typically-shop-for-holiday-seasonal[]"
                    <?php  if(!empty($typically_shop)) { if (in_array("typically-shop-for-holiday-seasonal", $typically_shop)){ 
                                echo 'checked';
                            }}?>
                            >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp lab-wid mrg-top">Nordstrom, Neiman Marcus
                            <input type="checkbox" name="typically-shop-for-holiday-seasonal[]" value="Nordstrom-Neiman-Marcus"
                            <?php  if(!empty($typically_shop)) { if (in_array("Nordstrom-Neiman-Marcus", $typically_shop)){ 
                                echo 'checked';
                            }}?>>
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <input type="text" class="form-control" value="<?php if(!empty($obj2)) { echo $obj2['typically_shop_for_holiday_seasonal_other']; }?>" placeholder="Other" id="typically_shop_for_holiday_seasonal">
                      </div>
                        <h4 class="form-sub-hd img-hd col-xs-12 col-md-12 col-md-12 sub-custom">Which image(s) best capture(s) your decorating style? <span>Check all that apply</span></h4>
                        <div class="checkbox-section img-checkbox">
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/stap-1-1.png" class="thin-unique-bor border-dark-bottom border-left-light-thin">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]"  value="stap-1-1"
                              <?php if(!empty($image_best_captureVal)) { if (in_array("stap-1-1", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                            >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/readyfestiv2-sketcha_03.png" class=" border-dark-right border-left-light-dark">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]" value="readyfestiv2-sketcha_03"
                                <?php if(!empty($image_best_captureVal)) { if (in_array("readyfestiv2-sketcha_03", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                            >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/stap-1-3.png" class="thin-unique-bor border-dark-bottom border-left-light-thin">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]" value="stap-1-3"
                      <?php if(!empty($image_best_captureVal)) { if (in_array("stap-1-3", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/stap-1-4.png" class="border-left-light-thin border-dark-right border-top-dark-light">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]" value="stap-1-4"
                      <?php if(!empty($image_best_captureVal)) { if (in_array("stap-1-4", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/stap-1-5.png" class="thin-unique-bor border-left-light-dark">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]" value="stap-1-5"
                          <?php if(!empty($image_best_captureVal)) { if (in_array("stap-1-5", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/stap-1-6.png" class="border-left-light-dark border-top-light border-dark-right">
                            <label class="checkbox-wrp">
                              <input type="checkbox" name="image_best_capture[]" value="stap-1-6"
                              <?php if(!empty($image_best_captureVal)) { if (in_array("stap-1-6", $image_best_captureVal)){ 
                                echo 'checked';
                            }}?>
                            >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <h4 class="form-sub-hd fhfb col-xs-12 col-md-12 col-md-12 sub-customs">How do you feel about color in holiday and seasonal decor? <span>Select one</span>
                        </h4>
                      <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">I embrace it
                              <input type="radio"  name="feel_about_color" value="I-embrace-it"
                              <?php if(!empty($obj2)){ if($obj2['feel_about_color']=='I-embrace-it'){ echo 'checked';}}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">I prefer to keep it more neutral
                              <input type="radio"  name="feel_about_color" value="I-prefer-to-kep-it-more-neutral"
                           <?php if(!empty($obj2)){ if($obj2['feel_about_color']=='I-prefer-to-kep-it-more-neutral'){ echo 'checked';}}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                        <h4 class="form-sub-hd social-hd col-xs-12 col-md-12 col-md-12">
                        Social Networks
                        </h4>
                        <p class="form-group social-p" >
                        <span>Optional and confidential:</span> 
                        Include your social media profile(s) below so that we can learn more about  your decorating style. We promise any information you share will only be used to better deliver to your styling preferences.
                        </p>
                      <div class="col-xs-12 col-sm-12 col-md-12 form-group social-input">
                          <label>Instagram Handle</label>
                          <input type="text" class="form-control" placeholder="readyfestive" id="Instagram" 
                       value="<?php if(!empty($obj2)){ echo $obj2['Instagram'];}?>" 
                          >
                          <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/int-icon.png" alt="instagram"/>
                          <small class="form-text text-muted">you can add more than 1</small>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 form-group social-input">
                          <label>Pinterest Board</label>
                          <input id="Pinterest" type="text" class="form-control" placeholder="http://www.pinterest.com/username/your-board"  value="<?php if(!empty($obj2)){ echo $obj2['Pinterest'];}?>">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                          <small class="form-text text-muted">copy and paste the full URL of your Inspiration board</small>
                      </div>
                  </div>
                    <div class="button-row">
                      <button class="btn prevto1btn btn-lg pull-right" type="button" id="prevto1btn"><i class="fa fa-angle-left" aria-hidden="true"></i>Previous Step</button>
                      <button class="btn nextBtn btn-lg pull-right" type="button" >Next Step <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        <!-- <div  class="btn save-changes" data-toggle="modal"  onclick="tabTwo();">save all changes</div> -->
                        <div style="display: none; width:15px;float: right;" id="tab2_loader"><img style="margin-left:10px;" src="<?php echo site_url(); ?>/wp-content/themes/readyfestive/form/images/load.gif"></div>
                    </div>
                </div>
              </div>
          </div>
          <div class="row setup-content" id="step-3">
             <div class="form-wrapper">
                  <h2>PRODUCT PREFERENCES</h2>
                  <div class="col-xs-12 col-md-12 col-md-12">
                      <h4 class="form-sub-hd step-3-hd sub-custom">Are you looking for more of any certain type of  products? 
                        <span>Check all that apply</span>
                      </h4>

                      <div class="row">
                          <div class="checkbox-section">
                              <div class="col-xs-12 col-sm-6 col-md-6 form-group sdsdf">
                                <label class="checkbox-wrp">Food and beverage items
                                <span class="ex">(ex: pumpkin bread mix for Fall)</span>
                                <input type="checkbox" name="any_certain_type_of_holiday_seasonal[]" value="Fatingood-beverage-items"
                           <?php if(!empty($any_certain_type)) { if (in_array("Fatingood-beverage-items", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                >
                                <span class="checkmark"></span>
                                </label>
                              </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Giftable items
                                  <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Giftable-items"
                            <?php if(!empty($any_certain_type)) { if (in_array("Giftable-items", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                  >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Games/crafts
                                    <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Games-crafys"
                             <?php if(!empty($any_certain_type)) { if (in_array("Games-crafys", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                    >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group sdsdf">
                                <label class="checkbox-wrp">Greenery/fresh
                                  <span class="ex">(ex: fresh mistletoe for Christmas)</span>
                                  <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Greenery-fresh"
                             <?php if(!empty($any_certain_type)) { if (in_array("Greenery-fresh", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                  >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Decorations
                                    <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Decorations"

                          <?php if(!empty($any_certain_type)) {if (in_array("Decorations", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                  >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Kid related items
                                  <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="kid-related-items" 
                           
                          <?php if(!empty($any_certain_type)) { if (in_array("kid-related-items", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                  >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Entertaining items
                                  <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Entertaining-items"
                               <?php if(!empty($any_certain_type)) { if (in_array("Entertaining-items", $any_certain_type)){ 
                                echo 'checked';
                            }}?>
                                  >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group sdsdf">
                                <label class="checkbox-wrp">Include religious references in your decor
                                  <span class="ex">(ex: Nativity scene at Christmas)</span>
                                  <input type="checkbox"  name="any_certain_type_of_holiday_seasonal[]" value="Incude-religious-references-in-your-decor"
                                    <?php  if(!empty($any_certain_type)) { if (in_array("Incude-religious-references-in-your-decor", $any_certain_type)){ 
                                echo 'checked';
                            }}?>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                      </div>
                      <h4 class="form-sub-hd anythingss-hd">Is there anything you'd like us to avoid?<span>Check all that apply</span></h4>

                      <div class="checkbox-section row anything-f">
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Scented candles
                              <input type="checkbox"  name="like-to-avoid[]" value="Scented-candles"
                         <?php if(!empty($like_to_avoid)){ if (in_array("Scented-candles", $like_to_avoid)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Nuts
                              <input type="checkbox" name="like-to-avoid[]" value="Nuts" 
                          <?php if(!empty($like_to_avoid)){ if (in_array("Nuts", $like_to_avoid)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Specialty candy
                              <span class="ex">(ex: candy corn for Halloween)</span>
                              <input type="checkbox" name="like-to-avoid[]" value="Specialty-candy" 
                              <?php if(!empty($like_to_avoid)){ if (in_array("Specialty-candy", $like_to_avoid)){ 
                                echo 'checked';
                            }}?>>
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Gluten
                              <input type="checkbox" name="like-to-avoid[]" value="Gluten" 
                       <?php if(!empty($like_to_avoid)){ if (in_array("Gluten", $like_to_avoid)){ 
                                echo 'checked';
                            }}?>
                              >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Chocolate
                              <input type="checkbox" name="like-to-avoid[]" value="Chocolate"  <?php if(!empty($like_to_avoid)){ if (in_array("Chocolate", $like_to_avoid)){ 
                                echo 'checked';
                            }}?> >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Dairy
                              <input type="checkbox" name="like-to-avoid[]" value="Dairy" 
                              <?php if(!empty($like_to_avoid)){ if (in_array("Dairy", $like_to_avoid)){ 
                                echo 'checked';
                            }}?> >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                       
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <input type="text" class="form-control" value="<?php if(!empty($obj3)){ echo $obj3['anything'];} ?>" placeholder="Anything else?" id="anything_else">
                        </div>
                      </div>
                      <div class="button-row">
                      <button class="btn prevto1btn btn-lg pull-right" type="button" id="prevto2btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Step</button>
                      <button class="btn nextBtn btn-lg pull-right" type="button" >Next Step <i class="fa fa-angle-right" aria-hidden="true"></i></button>

                        <!-- <div class="btn save-changes" data-toggle="modal"  onclick="tabThree();">save all changes</div> -->
                        <div style="display: none; width:15px;float: right;" id="tab3_loader"><img style="margin-left:10px;" src="<?php echo site_url(); ?>/wp-content/themes/readyfestive/form/images/load.gif"></div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row setup-content" id="step-4">
             <div class="">
                <p>Choose the subscription plan that works best for you. Each box is $78. Shipping is always free! All boxes ship on the 20th of the month prior to the season or holiday date, and you have until the 15th of the shipping month to cancel your box and choose another holiday (ex: Halloween is on October 31; the Halloween box ships on September 20, so you'd need to cancel it by September 15.) You can view our billing and shipping calendar in the <a>FAQ section</a>.  
                </p>
                <div class="row">
                  <div class="step-4-tab" >
                    
                  

                  <ul class="nav nav-tabs">
                    <li id="plan_1" class="four_four"><a data-toggle="tab" href="#four_four"><span style="display: block;">Plan #1: 4 boxes per year</span> Choose any 4 holidays OR 4 seasons</a></li>
                    <li id="plan_2" class="three_one"><a data-toggle="tab" href="#three_one"><span style="display: block;">Plan #2: 4 boxes per year</span> Choose any 3 holidays & any 1 seasons</a></li>
                    <li id="plan_3" class="four_two"><a data-toggle="tab" href="#four_two"><span style="display: block;">Plan #2: 6 boxes per year</span> Choose any 4 holidays & any 2 seasons</a></li>
                    <li id="plan_4" class="six_four"><a data-toggle="tab" href="#six_four"><span style="display: block;">Plan #2: 10 boxes per year</span> Choose any 6 holidays & any 4 seasons</a></li>
                  </ul>
                  <div class="errordiv chooseplanerror" style="color:red;font-size:14px;display:none">
                    <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/cfbhd.png">
                  Choose your subscription plan.</div>

                  <div class="tab-content">
                    <div id="four_four" class="tab-pane fade">
                      <div class="col-sm-6 col-md-4 upper">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row chooseseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox">
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="Fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8 upper">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 cgdf">



                         <div class="errordiv chooseplanerrorone" style="color:red;font-size:14px;display:none"> <p class="red-text">
                          <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/cfbhd.png">
                          For your chosen Plan #1 you can choose only 4 holidays or 4 seasons or you can check A la carte to add aditional boxes.
                        </p></div>
                       


                       
                        <p>If there are any additional holidays/seasons you would like to add <b>a la carte</b> to your current chosen subscription plan and check more boxes! <span>Each box is $78.</span></p>
                         <div class="checkbox-section row">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                              <label class="checkbox-wrp additional">Add additional holidays/seasons  "a la carte" to your current subscription plan
                                <input type="checkbox" id="additional_check">
                                <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="additional-div" style="display:none" id="four_fouradditional-div">
                            <div class="col-sm-6 col-md-4">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row showseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="Fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
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
                    <div id="three_one" class="tab-pane fade">
                      <div class="col-sm-6 col-md-4 upper">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row chooseseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8 upper">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 cgdf">



                        
                        <div class="errordiv chooseplanerrortwo" style="color:red;font-size:14px;display:none"> <p class="red-text">
                          <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/cfbhd.png">
                          For your chosen Plan #2 you can choose only 3 holidays and 1 season or you can check A la carte to add aditional boxes.
                        </p></div>
                        


                       
                        <p>If there are any additional holidays/seasons you would like to add a la carte to your current chosen subscription plan and check more boxes! <span>Each box is $78.</span></p>
                         <div class="checkbox-section row">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                              <label class="checkbox-wrp additional">Add additional holidays/seasons  "all la carte" to your current subscription plan
                                <input type="checkbox">
                                <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="additional-div" style="display:none" id="three_oneadditional-div">
                            <div class="col-sm-6 col-md-4">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row showseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
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
                    <div id="four_two" class="tab-pane fade">
                      <div class="col-sm-6 col-md-4 upper">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row chooseseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8 upper">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 cgdf">



                          <div class="errordiv chooseplanerrorthree" style="color:red;font-size:14px;display:none"> <p class="red-text">
                          <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/cfbhd.png">
                          For your chosen Plan #3 you can choose only 4 holidays and 2 seasons or you can check A la carte to add aditional boxes.
                        </p></div>
                        
                       


                       
                        <p>If there are any additional holidays/seasons you would like to add a la carte to your current chosen subscription plan and check more boxes! <span>Each box is $78.</span></p>
                         <div class="checkbox-section row">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                              <label class="checkbox-wrp additional">Add additional holidays/seasons  "all la carte" to your current subscription plan
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="additional-div" style="display:none" id="four_twoadditional-div">
                            <div class="col-sm-6 col-md-4">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row showseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
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
                    <div id="six_four" class="tab-pane fade">
                      <div class="col-sm-6 col-md-4 upper">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row chooseseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8 upper">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row chooseholidays">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 cgdf">



                         
                        <div class="errordiv chooseplanerrorfour" style="color:red;font-size:14px;display:none"> <p class="red-text">
                          <img src="http://qualifymyskills.com.au/readyfestive/wp-content/uploads/2019/07/cfbhd.png">
                          For your chosen Plan #4 you can choose only 6 holidays and 4 seasons or you can check A la carte to add aditional boxes.
                        </p></div><p>If there are any additional holidays/seasons you would like to add a la carte to your current chosen subscription plan and check more boxes! <span>Each box is $78.</span></p>
                         <div class="checkbox-section row">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                              <label class="checkbox-wrp additional">Add additional holidays/seasons  "all la carte" to your current subscription plan
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="additional-div" style="display:none" id="six_fouradditional-div">
                            <div class="col-sm-6 col-md-4">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row showseason">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Summer
                                    <input class="price" name="price[]" value="Summer"  type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Fall
                                    <input class="price" name="price[]" value="fall" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Winter
                                    <input class="price"  name="price[]" value="Winter" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                            </div>
                      </div>
                      <div class="col-sm-6 col-md-8">
                        <h4 class="form-sub-hd">Holidays</h4>
                        <div class="row">

                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">St. Patrick's Day
                                  <input class="price" name="price[]" value="Patrick Day" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Easter
                                  <input class="price" name="price[]" value="Easter" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">4th of July
                                  <input class="price" name="price[]" value="4th july" type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="col-sm-12 col-md-6">
                            <div class="checkbox-section row showholiday">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Thanksgiving
                                    <input class="price" name="price[]"  value="Thanksgiving" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Hannukkah
                                    <input class="price" name="price[]" value="Hannukkah" type="checkbox" >
                                    <span class="checkmark"></span>
                                  </label>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Christmas
                                    <input class="price" name="price[]" value="Christmas" type="checkbox" >
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
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="hidden" value="<?php echo site_url();?>" id="site_url" />
                    <input type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" id="ip_address">
                  <button class="btn nextBtn chooseplan btn-lg"  type="button">Checkout</button>
                  <div  style="display: none; width:30px;" id="loader"><img style="margin-left: 200px;margin-top: -35px;" src="http://qualifymyskills.com.au/readyfestive/wp-content/themes/readyfestive/form/images/load.gif"></div>
                </div>
                  </div>










                </div> 
                
              </div>
          </div>
      </form>
  
    </div>
    <div class="save-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h3>We've taken note of all of your style and product preferences.</h3>
            <p>Now let's choose your holidays and seasons!</p>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="closePOP();" class="btn nextBtn">Ok, got it</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function closePOP(){
        jQuery("#step-3").hide();
        jQuery("#step-4").show();
        jQuery('#myModal').modal('hide');
      }
      function popup(){
        jQuery("#step-3").show();
        jQuery("#step-4").hide();
        jQuery('#myModal').modal('show');
      }
      function tabThree(){
        var ip_address=jQuery('#ip_address').val();
        jQuery('#tab3_loader').show();
        setTimeout(function() { jQuery("#tab3_loader").hide(); }, 3000);
        var any_certain_type_of_holiday_seasonal = document.getElementsByName('any_certain_type_of_holiday_seasonal[]');
            var vals = "";
           for (var i=0, n=any_certain_type_of_holiday_seasonal.length;i<n;i++) 
                {
               if (any_certain_type_of_holiday_seasonal[i].checked) 
                  {
                   vals += ","+any_certain_type_of_holiday_seasonal[i].value;
                  }
               }
            var any_certain_type_of_holiday_seasonalVal=vals.substring(1); //
            //alert(any_certain_type_of_holiday_seasonalVal);like-to-avoid

             var like_to_avoid = document.getElementsByName('like-to-avoid[]');
            var lvals = "";
           for (var i=0, n=like_to_avoid.length;i<n;i++) 
                {
               if (like_to_avoid[i].checked) 
                  {
                   lvals += ","+like_to_avoid[i].value;
                  }
               }
            var like_to_avoid=lvals.substring(1); //
           // alert(like_to_avoid);
           var siteurl = jQuery('#site_url').val();
            var anything=jQuery("#anything_else").val();
            var ip_address=jQuery('#ip_address').val();
             jQuery.ajax({
              type:'POST',
              data:{action:'tab_three',any_certain_type_of_holiday_seasonalVal:any_certain_type_of_holiday_seasonalVal,like_to_avoid:like_to_avoid,anything:anything,ip_address:ip_address},
              url:siteurl+'/wp-admin/admin-ajax.php',
              success: function(value) {
               if(value==='done'){

                  //jQuery('#myModal').modal('show');
                }
              }
            });
      }
      function tabTwo(){
         var ip_address=jQuery('#ip_address').val();
         jQuery('#tab2_loader').show();
        setTimeout(function() { jQuery("#tab2_loader").hide(); }, 3000);
         var how_many_holidays_seasons=jQuery("input[name='how-many-holidays-seasons']:checked").val(); //
         var which_area = document.getElementsByName('which-area-home-holiday-seasonal[]');
            var vals = "";
           for (var i=0, n=which_area.length;i<n;i++) 
                {
               if (which_area[i].checked) 
                  {
                   vals += ","+which_area[i].value;
                  }
               }
            var which_areaVal=vals.substring(1); //
            //alert(which_areaVal);
            var which_area_home_holiday_seasonal_other=jQuery('#which_area_home_holiday_other').val(); //
            //alert(which_area_home_holiday_seasonal_other); //
            var typically = document.getElementsByName('typically-shop-for-holiday-seasonal[]');
            var valshop = "";
           for (var i=0, n=typically.length;i<n;i++) 
                {
               if (typically[i].checked) 
                  {
                   valshop += ","+typically[i].value;
                  }
               }
            var typicallyVal=valshop.substring(1);//name="typically-shop-for-holiday-seasonal[]"
            var typically_shop_for_holiday_seasonal_other=jQuery('#typically_shop_for_holiday_seasonal').val(); //
           // alert(typically_shop_for_holiday_seasonal);  //image_best_capture

             var image_best_capture = document.getElementsByName('image_best_capture[]');
            var imageshop = "";
           for (var i=0, n=image_best_capture.length;i<n;i++) 
                {
               if (image_best_capture[i].checked) 
                  {
                   imageshop += ","+image_best_capture[i].value;
                  }
               }
            var image_best_captureVal=imageshop.substring(1);//
            //alert(image_best_captureVal);feel_about_color
            var feel_about_color=jQuery("input[name='feel_about_color']:checked").val();//
            //alert(feel_about_color);
            var Instagram=jQuery("#Instagram").val();  //
            var Pinterest=jQuery("#Pinterest").val();  //
            var siteurl = jQuery('#site_url').val();
             jQuery.ajax({
              type:'POST',
              data:{action:'tab_two',how_many_holidays_seasons:how_many_holidays_seasons,which_areaVal:which_areaVal,which_area_home_holiday_seasonal_other:which_area_home_holiday_seasonal_other,typicallyVal:typicallyVal,typically_shop_for_holiday_seasonal_other:typically_shop_for_holiday_seasonal_other,image_best_captureVal:image_best_captureVal,ip_address:ip_address,feel_about_color:feel_about_color,Instagram:Instagram,Pinterest:Pinterest},
              url:siteurl+'/wp-admin/admin-ajax.php',
              success: function(value) {
               // alert(value);
                if(value==='done'){

                 // jQuery('#myModal').modal('show');
                }
                //jQuery( "#row_"+id ).hide();
                // window.location = siteurl+'/checkout/';
              }
            });
            

      }
      function tabOne(){
        var ip_address=jQuery('#ip_address').val();

        jQuery('#tab1_loader').show();
        setTimeout(function() { jQuery("#tab1_loader").hide(); }, 3000);
        //alert(ip_address);
        var fname=jQuery('#fname').val();
        var lname=jQuery('#lname').val();  
        var lNInitial=jQuery('#lNInitial').val();  
        var dob=jQuery('#dob').val();  
        var lifestage = document.getElementsByName('lifestage[]');
            var vals = "";
           for (var i=0, n=lifestage.length;i<n;i++) 
                {
               if (lifestage[i].checked) 
                  {
                   vals += ","+lifestage[i].value;
                  }
               }
            var lifestageVal=vals.substring(1);
            //alert(lifestageVal);
            var describes=jQuery("input[name='describes']:checked").val();
            var siteurl = jQuery('#site_url').val();
             jQuery.ajax({
              type:'POST',
              data:{action:'tab_first',fname:fname,lname:lname,lNInitial:lNInitial,dob:dob,lifestageVal:lifestageVal,describes:describes,ip_address:ip_address},
              url:siteurl+'/wp-admin/admin-ajax.php',
              success: function(value) {
                if(value==='done'){
                  //jQuery('#myModal').modal('show');
                }
                //jQuery( "#row_"+id ).hide();
                // window.location = siteurl+'/checkout/';
              }
            });


      }
        function create_product(){
        console.log("in function");
            jQuery("#loader").show();
            var selectPlan=document.querySelector('.active').id;

            var siteurl = jQuery('#site_url').val();
            var fname = jQuery('#fname').val();
            var lname = jQuery('#lname').val();
            var countChk = document.querySelectorAll('.active input[name="price[]"]:checked').length;
            var additionalDiv = document.querySelectorAll('.active .additional-div input[name="price[]"]:checked').length;  
            var mainDiv = document.querySelectorAll('.active .upper input[name="price[]"]:checked').length;  
            
            var panding=additionalDiv-mainDiv;
            var extra=panding*39;
            var onlyFirst=countChk/2;
            var price=onlyFirst*78+extra;
            
            var checkboxes = document.getElementsByName('price[]');
            var vals = "";
           for (var i=0, n=checkboxes.length;i<n;i++) 
                {
               if (checkboxes[i].checked) 
                  {
                   vals += ","+checkboxes[i].value;
                  }
               }
            var selectProduct=vals.substring(1);
            
          
          jQuery.ajax({
              type:'POST',
              data:{action:'add_tocart',fname:fname,lname:lname,price:price,selectProduct:selectProduct,selectPlan:selectPlan},
              url:siteurl+'/wp-admin/admin-ajax.php',
              success: function(value) {
                //jQuery( "#row_"+id ).hide();
                 window.location = siteurl+'/checkout/';
              }
            });
        
            
            

            
            
           
        }
    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {

      $(".additional input:checkbox").click(function() {
      var checksimlarcheckboxdivid =$(".nav-tabs li.active a").attr('href').replace("#","");
          if($(this).is(":checked")) {
              $('#'+checksimlarcheckboxdivid +'additional-div').show();
                        } else {
              $('#'+checksimlarcheckboxdivid +'additional-div').hide();
          }
      });

      $('.chooseseason input:checkbox,.chooseholidays input:checkbox').on('change', function(){
          console.log("fdf",$(".nav-tabs li.active a").attr('href'))
          var checksimlarcheckboxdivid =$(".nav-tabs li.active a").attr('href').replace("#","");
        $('#'+checksimlarcheckboxdivid+' input[value="' + this.value + '"]:checkbox').prop('checked', this.checked);
        $('#'+checksimlarcheckboxdivid+' .additional-div input[value="' + this.value + '"]:checkbox').prop('disabled', this.checked);
                
        });

        $(".nav-tabs li").click(function(){
          $('.chooseplanerror').css('display','none');
        });
      var navListItems = $('div.setup-panel div a'),
              allWells = $('.setup-content'),
              allNextBtn = $('.nextBtn');

      allWells.hide();

      navListItems.click(function (e) {
          e.preventDefault();
          var $target = $($(this).attr('href')),
                  $item = $(this);
    
          if (!$item.hasClass('disabled')) {
            console.log("have disabled")
              navListItems.removeClass('btn-primary').addClass('btn-default');
              $item.addClass('btn-primary');
              allWells.hide();
              $target.show();
              $target.find('input:eq(0)').focus();
          }
      });

      allNextBtn.click(function(e){
          var curStep = $(this).closest(".setup-content"),
              curStepBtn = curStep.attr("id"),
              nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),              
              isValid = true;             
              console.log("stepnumber",curStepBtn)
              //Hide Subsciption Title  
              $("#border-wrapper").hide();
            
              if(curStepBtn==="step-3"){
                $('div.setup-panel').hide(); 
              }
              if(curStepBtn==="step-4"){
              
                e.preventDefault();
                $('div.setup-panel').hide();                
                
                if($(".nav-tabs li").hasClass("active")===false){
                  console.log("error");
                  $('.chooseplanerror').css('display','block');
                }
                if($(".nav-tabs li.active").hasClass("four_four")===true){
                var seasonlength= $('#four_four .chooseseason input[name="price[]"]:checked').length;
                var holidaylength =$('#four_four .chooseholidays input[name="price[]"]:checked').length;
                    if(seasonlength===4 && holidaylength===0){
                  $('.chooseplanerrorone').css('display','none');
                  create_product();
                  }
                  else if(seasonlength===0 && holidaylength===4){
                    $('.chooseplanerrorone').css('display','none');
                    create_product();
                  }
                  else{
                    $('.chooseplanerrorone').css('display','block');
                  }
              }
              else if($(".nav-tabs li.active").hasClass("three_one")===true){
                var seasonlength= $('#three_one .chooseseason input[name="price[]"]:checked').length;
                var holidaylength =$('#three_one .chooseholidays input[name="price[]"]:checked').length;
                if(seasonlength===1 && holidaylength===3 ){
                  $('.chooseplanerrortwo').css('display','none');
                  create_product();
                }
                else{
                 $('.chooseplanerrortwo').css('display','block');
                }
              }

              else if($(".nav-tabs li.active").hasClass("four_two")===true){
                var seasonlength= $('#four_two .chooseseason input[name="price[]"]:checked').length;
                var holidaylength =$('#four_two .chooseholidays input[name="price[]"]:checked').length;
                if(seasonlength===2 && holidaylength===4 ){
                  $('.chooseplanerrorthree').css('display','none');
                  create_product();
                }
                else{
                 $('.chooseplanerrorthree').css('display','block');
                }
              }

              else if($(".nav-tabs li.active").hasClass("six_four")===true){
                var seasonlength= $('#six_four .chooseseason input[name="price[]"]:checked').length;
                var holidaylength =$('#six_four .chooseholidays input[name="price[]"]:checked').length;
                if(seasonlength===4 && holidaylength===6 ){
                  $('.chooseplanerrorfour').css('display','none');
                  create_product();
                }
                else{
                 $('.chooseplanerrorfour').css('display','block');
                }
              }
            }               
            if (isValid)
              console.log("is val;")
              nextStepWizard.removeAttr('disabled').trigger('click');
      });

      $('div.setup-panel div a.btn-primary').trigger('click');
      $("#prevto1btn").bind("click", (function () {   
      
      $("#firststep").trigger("click");
      //Hide Subsciption Title  
      $("#border-wrapper").show();
          
    }));
      $("#prevto2btn").bind("click", (function () {   
      
      $("#secondstep").trigger("click");

          
    }));
      $("#prevto3btn").bind("click", (function () {   
      
      $("#thirdstep").trigger("click");
          
    }));
   
    });
    </script>



<?php get_footer(); ?>