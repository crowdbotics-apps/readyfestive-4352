<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="p:domain_verify" content="3186786691f9edf301ae952e983d9229"/>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php if (get_field('banner_text_header','option')) {
			$bannertext = get_field('banner_text_header','option');
			$bannerbuttontext = get_field('banner_button_text_header','option');
			$bannerbuttonlink = get_field('banner_button_link_header','option');
			
			echo '<div class="header-bar"><span>'.$bannertext.'</span>';
			if ($bannerbuttontext) { 
			echo ' <a href="'.$bannerbuttonlink.'">'.$bannerbuttontext.' &raquo;</a>';
			};
			echo '</div>';
		} ?>

	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="col-full">

        <a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'storefront' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'storefront' ); ?></a>
        
        
        
        <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
					<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
				<?php } ?>
			</div>
		<?php } ?>
         
        
        <div id="header-right"> 
            
            <div class="search-cart">
                 <?php if ( is_woocommerce_activated() ) {
                    if ( is_cart() ) {
                        $class = 'current-menu-item';
                    } else {
                        $class = '';
                    }
                ?>
                
                <ul class="site-header-cart menu">
                    <li class="<?php echo esc_attr( $class ); ?>">
                        <?php storefront_cart_link(); ?>
                    </li>
                    <li>
                        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                    </li>
                </ul>
                <?php
                } ?>
                
            </div>
            
            <?php if ( has_nav_menu( 'secondary' ) ) { ?>
             <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'storefront' ); ?>">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'	=> 'secondary',
                            'fallback_cb'		=> '',
                        )
                    );
                ?>
            </nav><!-- #site-navigation -->
            <?php } ?>
       
       
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
            <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><span><?php //echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
                
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'	=> 'primary',
                        'container_class'	=> 'primary-navigation',
                        )
                );
    
                wp_nav_menu(
                    array(
                        'theme_location'	=> 'handheld',
                        'container_class'	=> 'handheld-navigation',
                        )
                );
                ?>
            </nav><!-- #site-navigation -->
       
       	</div>
        
		</div>
        
	</header><!-- #masthead -->

	
<?php if (!is_front_page() && !is_page_template('template-homepage.php')) { ?>
	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
} 

?>
