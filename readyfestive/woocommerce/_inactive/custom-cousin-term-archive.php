<?php
/**
 * The is a CUSTOM TEMPLATE created to show style terms on season pages, and vice versa. 
 * This template is loaded based on the "special_term_template function" in funcionts-template.php
 *
 * Some Woocommerce functions like sorting and filtering may not work on this template because the query is different.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?> Collection</h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' ); 
			
			// need to edit this to include the taxonomy descriotion ***
		?>

		
			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
            
            
            <div class="cousin-archive">
            	<?php 
				/* query to display "cousin" categories on the term archive page
				(style terms when on season page, and display season terms when on style page)
				*/
			
				
				// what term archive are we on?
				$term = get_queried_object(); 
			
				
				// if style term
				if ($term->parent == 29) { 
			
					$cousin_categories = get_terms( array(
						'taxonomy' => 'product_cat',
						'parent' => 30 // shop by season
					) );
				
				}
				
				// if season term
				if ($term->parent == 30) { 
			
					$cousin_categories = get_terms( array(
						'taxonomy' => 'product_cat',
						'parent' => 29 // shop by style
					) );
				
				} 
			
				// if we have cousin categories
				if ( $cousin_categories ) :
					
					foreach ( $cousin_categories as $cousin ) :
		
					$term_link = get_term_link( $cousin );
    
				  	  $args = array(
						'post_type'			=> 'product',
						'post_status'		=> 'publish',
						'posts_per_page'	=> -1,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => $term->taxonomy,
								'field' => 'term_id',
								'terms' => $term->term_id
							),
							array(
								'taxonomy' => $term->taxonomy,
								'field' => 'term_id',
								'terms' => $cousin->term_id
							)
						)
					);
		
					$my_query = null;
					$my_query = new WP_Query($args); 
					 
					if ( $my_query->have_posts() ) :
					
						echo '<h3 id="cousin-'.$cousin->slug.'" class="wc-nested-category-layout-category-title"><span><a href="'. esc_url( $term_link ) .'">' . $cousin->name . '</a></span></h3>'; 
			
						 woocommerce_product_loop_start();

						 while ( $my_query->have_posts() ) : $my_query->the_post();  
		
						 wc_get_template_part( 'content', 'product' );
		
						 endwhile; // end of the loop. 
				
						 woocommerce_product_loop_end();
						 
							
					 endif; endforeach; ?>

			
			<?php 	/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			
			 elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : 

		 wc_get_template( 'loop/no-products-found.php' );

		endif; ?>
        
        
        <?php  
		if ($term->parent == 29) { 
			echo '<div class="related-categories">';  
			echo '<h3 class="section-title">Shop More Styles</h3>';
			bee_style_categories(); 
			echo '</div>';
		}
		if ($term->parent == 30) {   
			echo '<div class="related-categories">';  
			echo '<h3 class="section-title">Shop More Seasons</h3>';
			bee_season_categories(); 
			echo '</div>';
		}
		
		?>
        
        </div>
        

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
