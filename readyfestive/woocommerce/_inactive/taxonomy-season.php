<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
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

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

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
            
            	<?php // Find the category + category parent, if applicable 
				$term = get_queried_object(); 
				$parent_id = empty( $term->term_id ) ? 0 : $term->term_id; 
			
				
				$style_categories = get_terms('style'); 
			
				if ( $style_categories ) :
					
			 
					foreach ( $style_categories as $style ) :
				
					 echo '<h3>' . $style->name . '</h3>';
				  
				  	  $args = array(
						'post_type'			=> 'product',
						'post_status'		=> 'publish',
						'posts_per_page'	=> -1,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => $term->taxonomy,
								'field' => 'slug',
								'terms' => $term->slug
							),
							array(
								'taxonomy' => $style->taxonomy,
								'field' => 'slug',
								'terms' => $style->slug
							)
						)
					);
		
					$my_query = null;
					$my_query = new WP_Query($args); 
			
			
		
			  ?>
              
              <?php  if ( $my_query->have_posts() ) : 
			  //if (have_posts()) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); 
				//while (have_posts()) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php  woocommerce_product_loop_end(); ?>
         
            
    <?php endif; endforeach;  ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

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
