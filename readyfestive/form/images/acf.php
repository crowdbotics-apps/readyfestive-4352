    <?php /* Template Name: ACF */ ?>

<?php get_header(); ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FONT  awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/form/css/custom.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/form/css/style.css">

  <body>
      
    <div class="">
      <div class="stepwizard" >
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-primary btn-circle" id="firststep">
                <span>Setp 1</span> ABOUT YOU
              </a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled" id=secondstep><span>Setp 2</span> DECORATING STYLE</a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled" id="thirdstep"><span>Setp 3</span> SUBSCRIPTION PREFERENCES</a>
            </div>
            <div class="stepwizard-step">
              <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled" id="four-step"><span>Setp 3</span> BUILD SUBSCRIPTION</a>
            </div>
          </div>
      </div>
  
      <form role="form" action="" method="post">
          <div class="row setup-content" id="step-1">
             <div class="form-wrapper">
                  <h2>About you</h2>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input id="fname" type="text" class="form-control"  required="required">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>Last Name</label>
                      <input id="lname" type="text" class="form-control"  required="required">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>Last Name Initial*</label>
                      <input type="text" class="form-control"  required="required">
                      <small class="form-text text-muted">*for monogramming</small>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                      <label>When is your birthday?</label>
                      <input type="date" name="bday" class="form-control"  required="required">
                  </div>

                  <div class="col-xs-12 col-md-12 col-md-12 bdcudf">
                      <h4 class="form-sub-hd">Lifestage & Milestones <span>check all that apply</span></h4>
                      <div class="checkbox-section row">
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Single
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Young children in the home
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Newlywed
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Older children in the home
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">New baby
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Empty nest
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                        </div>
                        <h4 class="form-sub-hd col-xs-12 col-md-12 col-md-12">which best describes your homr?
                          <span>Select one</span></h4>
                        <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Aparment / condominium
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Townhome
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">Single family home
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                    </div>
                    <div class="button-row">
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next Setp<i class="fa fa-angle-right" aria-hidden="true"></i></button>
                      <button class="btn save-changes">save all changes</button>
                    </div>
                  </div>
            </div>
          </div>
          <div class="row setup-content" id="step-2">
              <div class="form-wrapper">
                  <h2>DECORATING STYLE</h2>
                  <div class="col-xs-12 col-md-12 col-md-12">
                    <h4 class="form-sub-hd">How many holidays and/or seasons do you line to decorate for?
                      <span>Select one</span>
                    </h4>

                    <div class="row">
                      <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">A few (<3)
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">A handful (4-6)
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">All of them! (7+)
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                    </div>

                     <h4 class="form-sub-hd">Which area(s) of your home do you like to have a holiday or seasonal presence?<span>check all that apply</span></h4>

                    <div class="checkbox-section row">
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Fornt door
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Kitchan
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Children's rooms
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Enteyway
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Dining Room
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Out door
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Living room
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Bathroom(s)
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Pool Deck
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Mantle
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Badroom(s)
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <input type="text" class="form-control" placeholder="Other" >
                      </div>
                    </div>

                    <h4 class="form-sub-hd">Where do you typically shop for holiday and seasonal home decor?<span>check all that apply</span></h4>

                    <div class="checkbox-section row">
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Amazon
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Etsy
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                           <label class="checkbox-wrp">Pier 1, world Market
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Anthropologie
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">HomeGood, TJ Maxx
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Target
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Ballard Designs, Balsam Hill
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Local Home & Gift Store
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Willams sonoma, Pottery Barn
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Crate & Barrel
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <label class="checkbox-wrp">Nerdstrom, Neiman Maruus
                            <input type="checkbox" >
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                          <input type="text" class="form-control" placeholder="Other" >
                      </div>
                        <h4 class="form-sub-hd col-xs-12 col-md-12 col-md-12">Which image(s) best captures you decorating style?<span>check all that apply</span></h4>
                        <div class="checkbox-section img-checkbox">
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-6 col-sm-4 col-md-4 form-group">
                            <img src="<?php echo get_bloginfo('template_url'); ?>/form/images/imfc.jpg">
                            <label class="checkbox-wrp">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>
                        <h4 class="form-sub-hd col-xs-12 col-md-12 col-md-12">How do you feel about cilir in holiday and seasonal decor?<span>Select one</span>
                        </h4>
                      <div class="checkbox-section">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">I embrace it
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <label class="radio-wrp">I prefer to keep it more neutral
                              <input type="radio" checked="checked" name="radio">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                      </div>
                        <h4 class="form-sub-hd col-xs-12 col-md-12 col-md-12">
                        Social Networks
                        </h4>
                        <p class="form-group">
                        <b>Optional and confidential</b>
                        Include your social media profile(s) below so tahat we con learn more about  your decoating style. we promise any infomation you share will only be user to better deliver to your styling preferences
                        </p>
                      <div class="col-xs-12 col-sm-12 col-md-12 form-group social-input">
                          <label>instagram Handle</label>
                          <input type="text" class="form-control" placeholder="readyfestive" >
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                          <small class="form-text text-muted">you con add more then 1</small>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 form-group social-input">
                          <label>Pinterest Boaed</label>
                          <input type="text" class="form-control" placeholder="http://www.pinterest.com/username/your-board" >
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                          <small class="form-text text-muted">copy and paste the full URL of your Inspiration boaed</small>
                      </div>
                  </div>
                    <div class="button-row">
                      <button class="btn prevto1btn btn-lg pull-right" type="button" id="prevto1btn"><i class="fa fa-angle-left" aria-hidden="true"></i>Previous Step</button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next Setp <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        <button  class="btn save-changes">save all changes</button>
                    </div>
                </div>
              </div>
          </div>
          <div class="row setup-content" id="step-3">
             <div class="form-wrapper">
                  <h2>PRODUCT PREFERENCES</h2>
                  <div class="col-xs-12 col-md-12 col-md-12">
                      <h4 class="form-sub-hd">Are you looking for more of any certain type of holiday/seasonal products? 
                        <span>check all that apply</span>
                      </h4>

                      <div class="row">
                          <div class="checkbox-section">
                              <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Fatingood and beverage items
                                <span class="ex">(ex: pumpkin bread mix for Fall)</span>
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                                </label>
                              </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Giftable items
                                  <input type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Games/crafys
                                    <input type="checkbox" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Greenery/fresh
                                  <span class="ex">(ex: fresh mistletoe for christmas)</span>
                                  <input type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Decorations
                                    <input type="checkbox" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Kin related items
                                  <input type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Entertaining items
                                  <input type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label class="checkbox-wrp">Incude Christian references in your decor
                                  <span class="ex">(ex: Nativity scene at Christmas)</span>
                                  <input type="checkbox" >
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                      </div>
                      <h4 class="form-sub-hd">Is there anything you'd like us to avoid?<span>check all that apply</span></h4>

                      <div class="checkbox-section row">
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Scented candles
                              <input type="checkbox" checked="checked">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Nuts
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Specialty candy
                              <span class="ex">(ex: candy corn for Halloween)</span>
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Gluten
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Chocolate
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <label class="checkbox-wrp">Dairy
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                        </div>
                       
                        <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Anything else?" >
                        </div>
                      </div>
                      <div class="button-row">
                      <button class="btn prevto1btn btn-lg pull-right" type="button" id="prevto2btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous Setp</button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next Setp <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        <button class="btn save-changes">save all changes</button>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row setup-content" id="step-4">
             <div class="">
                <h2> BUILD YOUR SUBSCRIPTION</h2>
                <p>We offer boxes for four seasons and eight holidays. Subscribe to as few or as many as you'd like! Each box is $78. Shipping is always free. All boxes ship on the 20th of the month prior to the season or holiday date, and you have until the 15th of the shipping month to cancel <span class="ex">(ex: Halloween is on October 31; the Halloween box ships on September 20, so you'd need to cancel it by September 15.)</span> You can find more information about billing, shipping and cancelling in our Calendar in the <a>FAQ section</a>.  
                </p>
                <div class="row">
                  <div class="step-4-tab" >
                    
                  

                  <ul class="nav nav-tabs">
                    <li id="plan_1" class=""><a data-toggle="tab" href="#home"><span style="display: block;">Plan #1: 4 boxes per year</span> Choose any 4 holidays OR 4 seasons</a></li>
                    <li id="plan_2"><a data-toggle="tab" href="#menu1"><span style="display: block;">Plan #2: 4 boxes per year</span> Choose any 3 holidays & any 1 seasons</a></li>
                    <li id="plan_3"><a data-toggle="tab" href="#menu2"><span style="display: block;">Plan #2: 6 boxes per year</span> Choose any 4 holidays & any 2 seasons</a></li>
                    <li id="plan_4"><a data-toggle="tab" href="#menu3"><span style="display: block;">Plan #2: 10 boxes per year</span> Choose any 6 holidays & any 4 seasons</a></li>
                  </ul>
                  <div class="errordiv chooseplanerror" style="color:red;font-size:14px;display:none">Choose your subscription plan.</div>
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade">
                      <div class="col-sm-6 col-md-4">
                        <h4 class="form-sub-hd">Seasons
                        </h4>
                        <div class="checkbox-section row">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Spring
                                    <input class="price" name="price[]" value="Spring" type="checkbox" checked="checked">
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
                                  <label class="checkbox-wrp">Fell
                                    <input class="price" name="price[]" value="Fell" type="checkbox" >
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
                            <div class="checkbox-section row">
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label class="checkbox-wrp">Valentine's Day
                                  <input class="price" name="price[]" value="Valentine Day" type="checkbox" checked="checked">
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
                            <div class="checkbox-section row">
                              <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                  <label class="checkbox-wrp">Halloween
                                    <input class="price" name="price[]"  value="Halloween" type="checkbox" checked="checked">
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
                        <p class="red-text">
                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                          For your chosen Plan #1 you can choose only 4 holidays or 4 seasons or you can check A la carte to add aditional boxes.
                        </p>
                        <p>If there are any additional holidays/seasons you would like to add a la carte to your current chosen subscription plan and check more boxes! <span>Each box is $78.</span></p>
                         <div class="checkbox-section row">
                          <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                              <label class="checkbox-wrp">Add additional holidays/seasons  "all la carte" to your current subscription plan
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                              </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3>Menu 2</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3>Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="hidden" value="<?php echo site_url();?>" id="site_url" />
                  <button class="btn nextBtn chooseplan btn-lg" onclick='create_product();' type="button">Checkout</button>
                  <img src="http://qualifymyskills.com.au/readyfestive/wp-content/themes/readyfestive/form/images/load.gif">
                </div>
                  </div>










                </div> 
                
              </div>
          </div>
      </form>
  
    </div>
    <script>
        function create_product(){
            var selectPlan=document.querySelector('.active').id;

            var siteurl = jQuery('#site_url').val();
            var fname = jQuery('#fname').val();
            var lname = jQuery('#lname').val();
            var countChk = document.querySelectorAll('input[name="price[]"]:checked').length;
            
            var price=countChk*78;
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
      $(".nextBtn.chooseplan").click(function(){
		  if($(".nav-tabs li").hasClass("active")==='false'){
		  console.log("error");
		  $('.chooseplanerror').css('display','block');
		}
		else{
			$('.chooseplanerror').css('display','none');
		}
		});
      var navListItems = $('div.setup-panel div a'),
              allWells = $('.setup-content'),
              allNextBtn = $('.nextBtn');

      allWells.hide();

      navListItems.click(function (e) {
          e.preventDefault();
          var $target = $($(this).attr('href')),
                  $item = $(this);
    console.log("$",$item)
          if (!$item.hasClass('disabled')) {
            console.log("have disabled")
              navListItems.removeClass('btn-primary').addClass('btn-default');
              $item.addClass('btn-primary');
              allWells.hide();
              $target.show();
              $target.find('input:eq(0)').focus();
          }
      });

      allNextBtn.click(function(){
          var curStep = $(this).closest(".setup-content"),
              curStepBtn = curStep.attr("id"),
              nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
              curInputs = curStep.find("input[type='text'],input[type='url']"),
              isValid = true;

          $(".form-group").removeClass("has-error");
          for(var i=0; i<curInputs.length; i++){

              if (!curInputs[i].validity.valid){
                console.log("not valid")
                  isValid = false;
                  $(curInputs[i]).closest(".form-group").addClass("has-error");
              }
          }

          if (isValid)
            console.log("is val;")
              nextStepWizard.removeAttr('disabled').trigger('click');
      });

      $('div.setup-panel div a.btn-primary').trigger('click');
      $("#prevto1btn").bind("click", (function () {   
      
      $("#firststep").trigger("click");
          
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