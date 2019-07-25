<?php
/**
 * Storefront WooCommerce Class
 *
 * @package  storefront
 * @author   WooThemes
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storefront_WooCommerce' ) ) :

	/**
	 * The Storefront WooCommerce Integration class
	 */
	class Storefront_WooCommerce {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_filter( 'loop_shop_columns', 						array( $this, 'loop_columns' ) );
			add_filter( 'body_class', 								array( $this, 'woocommerce_body_class' ) );
			add_action( 'wp_enqueue_scripts', 						array( $this, 'woocommerce_scripts' ),	10 );
			add_filter( 'woocommerce_enqueue_styles', 				'__return_empty_array' );
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );
			add_filter( 'woocommerce_product_thumbnails_columns', 	array( $this, 'thumbnail_columns' ) );
			add_filter( 'loop_shop_per_page', 						array( $this, 'products_per_page' ) );

			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.5', '<' ) ) {
				add_action( 'wp_footer', 							array( $this, 'star_rating_script' ) );
			}

			// Integrations.
			add_action( 'wp_enqueue_scripts', 						array( $this, 'woocommerce_integrations_scripts' ) );
		
		}

		/**
		 * Default loop columns on product archives
		 *
		 * @return integer products per row
		 * @since  1.0.0
		 */
		public function loop_columns() {
			return 4; // 3 products per row
		}
		
	
		/**
		 * Add 'woocommerce-active' class to the body tag
		 *
		 * @param  array $classes css classes applied to the body tag.
		 * @return array $classes modified to include 'woocommerce-active' class
		 */
		public function woocommerce_body_class( $classes ) {
			if ( is_woocommerce_activated() ) {
				$classes[] = 'woocommerce-active';
			}
			
			if ( is_tax() ) {
				$ancestors = get_ancestors(
					get_queried_object_id(),
					get_queried_object()->taxonomy
				);
			
				if ( empty ( $ancestors ) )
				{
					return $classes;
				}
			
				foreach ( $ancestors as $ancestor )
				{
					$term          = get_term( $ancestor, get_queried_object()->taxonomy );
					$classes[] = esc_attr( "parent-$term->taxonomy-$term->slug" );
				}
			}

			return $classes;
		}

		/**
		 * WooCommerce specific scripts & stylesheets
		 *
		 * @since 1.0.0
		 */
		public function woocommerce_scripts() {
			global $storefront_version;

			wp_enqueue_style( 'storefront-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css', $storefront_version );
			
			wp_register_script( 'storefront-sticky-payment', get_template_directory_uri() . '/assets/js/woocommerce/checkout.min.js', 'jquery', $storefront_version, true );

			if ( is_checkout() ) {
				wp_enqueue_script( 'storefront-sticky-payment' );
			}
		}

		/**
		 * Star rating backwards compatibility script (WooCommerce <2.5).
		 *
		 * @since 1.6.0
		 */
		public function star_rating_script() {
			if ( wp_script_is( 'jquery', 'done' ) && is_product() ) {
		?>
			<script type="text/javascript">
				jQuery( function( $ ) {
					$( 'body' ).on( 'click', '#respond p.stars a', function() {
						var $container = $( this ).closest( '.stars' );
						$container.addClass( 'selected' );
					});
				});
			</script>
		<?php
			}
		}

		/**
		 * Related Products Args
		 *
		 * @param  array $args related products args.
		 * @since 1.0.0
		 * @return  array $args related products args
		 */
		public function related_products_args( $args ) {
			
			
				$args = apply_filters( 'storefront_related_products_args', array(
					'posts_per_page' => 4,
					'columns'        => 4,
				) );
 

			return $args;
		}

	


		/**
		 * Product gallery thumnail columns
		 *
		 * @return integer number of columns
		 * @since  1.0.0
		 */
		public function thumbnail_columns() {
			return intval( apply_filters( 'storefront_product_thumbnail_columns', 4 ) );
		}

		/**
		 * Products per page
		 *
		 * @return integer number of products
		 * @since  1.0.0
		 */
		public function products_per_page() {
			return intval( apply_filters( 'storefront_products_per_page', 12 ) );
		}

		/**
		 * Query WooCommerce Extension Activation.
		 *
		 * @param string $extension Extension class name.
		 * @return boolean
		 */
		public function is_woocommerce_extension_activated( $extension = 'WC_Bookings' ) {
			return class_exists( $extension ) ? true : false;
		}

		/**
		 * Integration Styles & Scripts
		 *
		 * @return void
		 */
		public function woocommerce_integrations_scripts() {
			/**
			 * Bookings
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Bookings' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-bookings-style', get_template_directory_uri() . '/assets/sass/woocommerce/bookings.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-bookings-style', 'rtl', 'replace' );
			}

			/**
			 * Brands
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Brands' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-brands-style', get_template_directory_uri() . '/assets/sass/woocommerce/brands.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-brands-style', 'rtl', 'replace' );
			}

			/**
			 * Wishlists
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Wishlists_Wishlist' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-wishlists-style', get_template_directory_uri() . '/assets/sass/woocommerce/wishlists.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-wishlists-style', 'rtl', 'replace' );
			}

			/**
			 * AJAX Layered Nav
			 */
			if ( $this->is_woocommerce_extension_activated( 'SOD_Widget_Ajax_Layered_Nav' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-ajax-layered-nav-style', get_template_directory_uri() . '/assets/sass/woocommerce/ajax-layered-nav.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-ajax-layered-nav-style', 'rtl', 'replace' );
			}

			/**
			 * Variation Swatches
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_SwatchesPlugin' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-variation-swatches-style', get_template_directory_uri() . '/assets/sass/woocommerce/variation-swatches.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-variation-swatches-style', 'rtl', 'replace' );
			}

			/**
			 * Composite Products
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Composite_Products' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-composite-products-style', get_template_directory_uri() . '/assets/sass/woocommerce/composite-products.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-composite-products-style', 'rtl', 'replace' );
			}

			/**
			 * WooCommerce Photography
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Photography' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-photography-style', get_template_directory_uri() . '/assets/sass/woocommerce/photography.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-photography-style', 'rtl', 'replace' );
			}

			/**
			 * Product Reviews Pro
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Product_Reviews_Pro' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-product-reviews-pro-style', get_template_directory_uri() . '/assets/sass/woocommerce/product-reviews-pro.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-product-reviews-pro-style', 'rtl', 'replace' );
			}

			/**
			 * WooCommerce Smart Coupons
			
			if ( $this->is_woocommerce_extension_activated( 'WC_Smart_Coupons' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-smart-coupons-style', get_template_directory_uri() . '/assets/sass/woocommerce/smart-coupons.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-smart-coupons-style', 'rtl', 'replace' );
			}

			/**
			 * WooCommerce Deposits
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Deposits' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-deposits-style', get_template_directory_uri() . '/assets/sass/woocommerce/deposits.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-deposits-style', 'rtl', 'replace' );
			}

			/**
			 * WooCommerce Product Bundles
			 
			if ( $this->is_woocommerce_extension_activated( 'WC_Bundles' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-bundles-style', get_template_directory_uri() . '/assets/sass/woocommerce/bundles.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-bundles-style', 'rtl', 'replace' );
			}

			/**
			 * WooCommerce Multiple Shipping Addresses
			 */
			if ( $this->is_woocommerce_extension_activated( 'WC_Ship_Multiple' ) ) {
				wp_enqueue_style( 'storefront-woocommerce-sma-style', get_template_directory_uri() . '/assets/sass/woocommerce/ship-multiple-addresses.css', 'storefront-woocommerce-style' );
				wp_style_add_data( 'storefront-woocommerce-sma-style', 'rtl', 'replace' );
			}
		}

		/**
		 * Add CSS in <head> for integration styles handled by the theme customizer
		 *
		 * @since 1.0
		 */
		
	}

endif;

return new Storefront_WooCommerce();
