<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

if ( ! is_active_sidebar( 'sidebar-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	
	<?php if (is_page() || is_search()) {
		
		dynamic_sidebar( 'sidebar-page' ); 
		
	}  else {
		
		dynamic_sidebar( 'sidebar-blog' ); 
		
	} ?>
</div><!-- #secondary -->