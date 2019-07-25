<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
    <header class="entry-header">
        <?php
        storefront_post_thumbnail( 'full' );
        the_title( '<h1 class="page-title" itemprop="name">', '</h1>' );
        ?>
    </header><!-- .entry-header -->
    
    <div class="entry-content" itemprop="mainContentOfPage">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                'after'  => '</div>',
            ) );
        ?>
        
        <?php the_field('mailchimp_form_code'); ?>
        
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
			echo '<span>'. do_shortcode($bannertext) .'</span>';
			
			if ($bannerbuttontext) { echo '<div class="cta"><a class="button" href="'.$bannerbuttonlink.'">'.$bannerbuttontext.'</a></div></div></div>'; }
		} ?>
        
    </div><!-- .entry-content -->
	
	

</article><!-- #post-## -->
