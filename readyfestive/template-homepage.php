<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

<div class="newhome">
	
	
<section id="showcase">
<?php 
$showcase_display = get_field('showcase_display'); 


// if slider 
	
	if ($showcase_display == 'slider' && have_rows('homepage_slider')) { ?>
    
    <div class="slider">
    
	<?php while ( have_rows('homepage_slider') ) : the_row();
	
	$slideimg = get_sub_field('image'); 
	$headline = get_sub_field('headline'); 
	$text = get_sub_field('text');
	$cta = get_sub_field('button_text');
	$slidelink = get_sub_field('slide_link');
	
	?>

    <div class="slide">
	     
    	<div class="centered">
        
		<?php if($slideimg) { echo wp_get_attachment_image( $slideimg, 'showcase' ); } ?>
        </div>
        <?php if ($headline) {?>        
        <div class="slide-content">
          <div class="slide-content-inner">
                <h1 data-aos="fade-up"><?php echo $headline; ?></h1> 
                <div data-aos="fade-up" data-aos-delay="200">
				<?php if ($text) { echo '<p>' . $text . '</p>'; } ?>
                <?php if ($cta) { ?><a class="button" href="<?php echo $slidelink; ?>"><?php echo $cta; ?></a><?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        
        
       
    </div>

    <?php endwhile; ?>
    
    </div>
    
<?php // if static image
	 
	 } else if ($showcase_display == 'image') { 
	 
		$staticimg = get_field('homepage_static_image');
		$imgbg = wp_get_attachment_image_src( $staticimg, 'showcase' );
		$headline = get_field('homepage_headline'); 
		$text = get_field('homepage_text');
		$cta = get_field('homepage_button_text');
		$slidelink = get_field('homepage_link');
		$headlinetype = get_field('headline_type');
		$animatedwords = get_field('animated_words');
	 
	 ?>
	 
	 <div class="slide" style="background-image:url(<?php echo $imgbg[0]; ?>)">	
        
        <?php if ($headline) { ?>        
        <div class="slide-content">
          	<div class="slide-content-inner">

	        <?php if ($headlinetype == 'animated') { ?>		
				<!--<h1 class="rw-sentence" data-aos="fade-in">
					<span>Unbox the</span>
					<div class="rw-words ">
						<span>festive</span>
						<span>season</span>
						<span>joy</span>
						<span>memories</span>
						<span>magic</span>
					</div>
				</h1>-->
		
		

          		<h1 class="rw-sentence" data-aos="fade-in" data-aos-delay="100" data-words="<?php echo $animatedwords; ?>"><?php echo $headline; ?> <span class="typed"></span></h1>
	        
	        <?php } else { ?>
	        
	         	<h1><?php echo $headline; ?></h1>
	        
	        <?php } ?>
	        
					  <!-- <h1 data-aos="fade-up"><?php echo $headline; ?></h1> -->
					<div data-aos="fade-up" data-aos-delay="300">
					<?php if ($text) { echo '<p>' . $text . '</p>'; } ?>
	                <?php if ($cta) { ?><a class="button" href="<?php echo $slidelink; ?>"><?php echo $cta; ?></a><?php } ?>
	                </div>           
                 </div>
        </div>
        <?php } ?>
        
        </div>
        
    
<?php // if background video
	 
	 } else if ($showcase_display == 'video') {  
	 
	 	$bgvid = get_field('homepage_video');
		$bgvidwebm = get_field('homepage_video_webm');
		$headline = get_field('homepage_headline'); 
		$text = get_field('homepage_text');
		$cta = get_field('homepage_button_text');
		$slidelink = get_field('homepage_link');
		$fallback = wp_get_attachment_image_src( get_field('homepage_static_image'), 'showcase' );
		$fallbackurl = $fallback['0']; 
	 ?>
     
     	<video autoplay class="bgvid" loop muted <?php if($fallback) { ?> poster="<?php echo get_template_directory_uri(); ?>/img/transparent.png" style="background-image:url(<?php echo $fallbackurl; ?>)"<?php } ?>>
            <?php if ($bgvid) { ?><source src="<?php echo $bgvid; ?>" type="video/mp4"> <?php } ?>
            <?php if ($bgvidwebm) { ?><source src="<?php echo $bgvidwebm; ?>" type="video/webm"><?php } ?>
        </video>
        
        <?php if ($headline) { ?>        
        <div class="slide-content">
          <div class="slide-content-inner">
               <h1 data-aos="fade-up"><?php echo $headline; ?></h1> 
				<?php if ($text) { echo '<p data-aos="fade-up" data-aos-delay="200">' . $text . '</p>'; } ?>
                <?php if ($cta) { ?><a class="button"  data-aos="fade-up" data-aos-delay="400" href="<?php echo $slidelink; ?>"><?php echo $cta; ?></a><?php } ?>
          </div>
        </div>
        <?php } ?>
     
<?php } // end if video ?>
</section>

<?php while ( have_posts() ) { the_post(); ?>

<div id="content" class="site-content" tabindex="-1">
	
		<div id="intro" class="section-full">
			<div class="col-full">
				<h2 data-aos="fade-in" data-aos-delay="200">Holidays made <em>simple</em></h2>
	     		<div class="content">
		 			<?php the_field('intro'); ?>
	     		</div>
			</div>
		</div>
		
		<div class="col-full">   
	        <div class="content-area">
	            <main id="main" class="site-main" role="main">
	                       
					<div class="two-ways clearfix">
	                    <div class="tw-left" data-aos="zoom-in"><?php the_field('two_ways_left') ?></div>	
	                    <div class="tw-center" data-aos="zoom-in" data-aos-delay="300"><?php the_field('two_ways_center') ?></div>
	                    <div class="tw-right" data-aos="zoom-in" data-aos-delay="600"><?php the_field('two_ways_right') ?></div>
	                </div>
	                 
	                <?php the_field('homepage_cta'); ?>
	             </main>
	             
	      	</div>    
	    </div>

			
      
    <div id="howitworks" class="section-full"> 
    	<div class="col-full">
     		<div class="content">
				<?php the_content(); ?> 
            </div>
            <?php the_post_thumbnail('large'); ?>
      	</div>     
    </div>
    
              
	<div class="col-full">    
    
        <div class="content-area">
            <main class="site-main" role="main">
       			
            <section id="instahome">
		
				<?php echo '<h3 class="section-title">' . get_field('instagram_headline') .'</h3>';
				$insta = get_field('instagram_shortcode');
		
				echo do_shortcode($insta); ?>
		
			</section>
      
        	<hr />
                            
            <?php if (get_field('banner_text')) {
			$bannericon = get_field('banner_icon');
			$bannericon2 = wp_get_attachment_image_src( $bannericon, 'full' );
			$bannertext = get_field('banner_text');
			$bannerbuttontext = get_field('banner_button_text');
			$bannerbuttonlink = get_field('banner_button_link');
			
			echo '<div class="banner"><div class="banner-inner">'; 
			if ($bannericon) { 
			echo '<img class="banner-img" src="'.$bannericon2['0'].'">';
			}
			echo '<span>'.$bannertext.'</span><div class="cta"><a class="button" href="'.$bannerbuttonlink.'">'.$bannerbuttontext.'</a></div></div></div>';
			} ?>
   
            
            <?php  } // end of the loop. ?>
           
        
        
            </main><!-- #main -->
        </div><!-- #primary -->
        </div>
       
</div>
	
	<?php get_footer(); ?>