<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

    </div><!-- .col-full -->
  </div><!-- #content -->
  

  

  <?php do_action( 'storefront_before_footer' ); ?>

  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">

      <?php
      /**
       * Functions hooked in to storefront_footer action
       *
       * @hooked storefront_footer_widgets - 10
       * @hooked storefront_credit         - 20
       */
       // do_action( 'storefront_footer' ); 
       
            
       if ( is_woocommerce_activated() ) { 
                storefront_handheld_footer_bar();
             }
            
            if ( is_active_sidebar( 'footer-4' ) ) {
        $widget_columns = apply_filters( 'storefront_footer_widget_regions', 4 );
      } elseif ( is_active_sidebar( 'footer-3' ) ) {
        $widget_columns = apply_filters( 'storefront_footer_widget_regions', 3 );
      } elseif ( is_active_sidebar( 'footer-2' ) ) {
        $widget_columns = apply_filters( 'storefront_footer_widget_regions', 2 );
      } elseif ( is_active_sidebar( 'footer-1' ) ) {
        $widget_columns = apply_filters( 'storefront_footer_widget_regions', 1 );
      } else {
        $widget_columns = apply_filters( 'storefront_footer_widget_regions', 0 );
      }
  
      if ( $widget_columns > 0 ) : ?>
  
        <section class="footer-widgets col-<?php echo intval( $widget_columns ); ?> fix">
  
          <?php
          $i = 0;
          while ( $i < $widget_columns ) : $i++;
            if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
  
              <section class="block footer-widget-<?php echo intval( $i ); ?>">
                <?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
              </section>
  
            <?php endif;
          endwhile; ?>
  
        </section><!-- /.footer-widgets  -->
  
      <?php endif; ?>
    
            
         <!--   <div class="site-info">
      <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>-->
      
    </div><!-- .site-info -->
        
        
       
        


    </div><!-- .col-full -->
  </footer><!-- #colophon -->

  <?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<script>
jQuery(document).ready(function(){
 jQuery(".woocommerce-billing-fields input").keyup(function(){
    var fname=jQuery("#billing_first_name").val();
    jQuery("#shipping_first_name").val(fname);
    var lname=jQuery("#billing_last_name").val();
    jQuery("#shipping_last_name").val(lname);
    var billing_company=jQuery("#billing_company").val();
    jQuery("#shipping_company").val(billing_company);     //billing_address_1
    var billing_address_1=jQuery("#billing_address_1").val();
    jQuery("#shipping_address_1").val(billing_address_1); 
    var billing_address_2=jQuery("#billing_address_2").val();
    jQuery("#shipping_address_2").val(billing_address_2);     //
     var billing_city=jQuery("#billing_city").val();
    jQuery("#shipping_city").val(billing_city);      //billing_postcode
    var billing_postcode=jQuery("#billing_postcode").val();
    jQuery("#shipping_postcode").val(billing_postcode);      //
    var billing_phone=jQuery("#billing_phone").val();
    jQuery("#shipping_phone").val(billing_phone); 
    jQuery("#shipping_country").val(jQuery('#billing_country').val());
    jQuery("#shipping_state").val(jQuery('#billing_state').val());
  });
 jQuery('#billing_state').change(function() {
   
   jQuery("#shipping_state").val(jQuery(this).val());
});
});
</script>

<?php wp_footer(); ?>

</body>
</html>