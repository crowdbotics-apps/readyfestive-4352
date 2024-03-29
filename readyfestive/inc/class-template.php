<?php
/**
 * Storefront Class
 *
 * @author   WooThemes
 * @since    2.0.0
 * @package  storefront
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storefront' ) ) :

	/**
	 * The main Storefront class
	 */
	class Storefront {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme',     array( $this, 'setup' ) );
			add_action( 'widgets_init',          array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts',    array( $this, 'scripts' ), 20 );
			add_action( 'wp_enqueue_scripts',    array( $this, 'child_scripts' ), 30 ); // After WooCommerce.
			add_filter( 'body_class',            array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args',     array( $this, 'page_menu_args' ) );
			add_action( 'enqueue_embed_scripts', array( $this, 'print_embed_styles' ) );
			//add_action( 'init',					 array( $this, 'bee_custom_taxonomies' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {

			/**
			 * Set the content width based on the theme's design and stylesheet.
			 */
			if ( ! isset( $content_width ) ) {
				$content_width = 980; /* pixels */
			}

			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/storefront-it_IT.mo.
			load_theme_textdomain( 'storefront', trailingslashit( WP_LANG_DIR ) . 'themes/' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'storefront', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/storefront/languages/it_IT.mo.
			load_theme_textdomain( 'storefront', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );
			
			add_image_size( 'showcase', 1400, 660, true ); 
			add_image_size( 'showcase2', 1600, 660, true ); 
			add_image_size( 'interior', 800, 380, true );
			add_image_size( 'half', 600, 500, true );  

			/**
			 * Enable support for site logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 110,
				'width'       => 470,
				'flex-width'  => true,
			) );

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( array(
				'primary'		=> __( 'Primary Menu', 'storefront' ),
				'secondary'		=> __( 'Secondary Menu', 'storefront' ),
				'handheld'		=> __( 'Handheld Menu', 'storefront' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			) );

			// Setup the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'storefront_custom_background_args', array(
				'default-color' => apply_filters( 'storefront_default_background_color', 'ffffff' ),
				'default-image' => '',
			) ) );

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', array( 'size' => 'full' ) );

			// Declare WooCommerce support.
			add_theme_support( 'woocommerce' );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );
		}

		/**
		 * Register widget area.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar', 'storefront' ),
				'id'            => 'sidebar-page',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

			
			
			register_sidebar( array(
				'name'          => __( 'Blog Sidebar', 'storefront' ),
				'id'            => 'sidebar-blog',
				'description'   => 'Widgets added to this region will appear on blog-related pages.',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
			
			
			register_sidebar( array(
				'name'          => __( 'Shop Sidebar', 'storefront' ),
				'id'            => 'sidebar-shop',
				'description'   => 'Widgets added to this region will appear on shop pages.',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );

			$footer_widget_regions = apply_filters( 'storefront_footer_widget_regions', 4 );

			for ( $i = 1; $i <= intval( $footer_widget_regions ); $i++ ) {
				register_sidebar( array(
					'name' 				=> sprintf( __( 'Footer %d', 'storefront' ), $i ),
					'id' 				=> sprintf( 'footer-%d', $i ),
					'description' 		=> sprintf( __( 'Widgetized Footer Region %d.', 'storefront' ), $i ),
					'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</aside>',
					'before_title' 		=> '<h4>',
					'after_title' 		=> '</h4>',
					)
				);
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $storefront_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', '', 2.52111 );
			//wp_style_add_data( 'storefront-style', 'rtl', 'replace' );
			wp_enqueue_style( 'aoscss', get_template_directory_uri() . '/assets/css/aos.css', '', $storefront_version );
			wp_enqueue_style( 'slickcss', get_template_directory_uri() . '/assets/css/slick.css', '', $storefront_version );

			/**
			 * Fonts
			 */
			$google_fonts = apply_filters( 'storefront_google_font_families', array(
				'lato' => 'Lato:300,400,400italic,700,700italic',
				//'nunito' => 'Nunito:200,300,400,400i,700'
			) );

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

			wp_enqueue_style( 'storefront-fonts', $fonts_url, array(), null );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-custom.js', array(), '', false );
			wp_enqueue_script( 'storefront-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array( 'jquery' ), '20120206', true );		
			wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', array(), '', true );
			wp_enqueue_script( 'typed', 'https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js', array(), '', true );

			
			//wp_enqueue_script( 'fittext', get_template_directory_uri() . '/assets/js/jquery.fittext.js', array(), '', true );
			wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '', true );
			wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), filemtime( get_stylesheet_directory() . '/assets/js/custom.js'), true );
			

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.5.3
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				wp_enqueue_style( 'storefront-child-style', get_stylesheet_uri(), array(), '2', 'all' );
			}
		}


		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {
				$classes[]	= 'no-wc-breadcrumb';
			}

	
			// If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-page' ) ) {
				$classes[] = 'storefront-full-width-content';
			}

			return $classes;
		}

		
	}

endif;

return new Storefront();


/*
add_filter('template_include', 'team_set_template');
function team_set_template( $template ){
  if(is_tax('season')) :
    $taxonomy = 'season';
    $term = get_query_var($taxonomy);
    $prod_term = get_terms($taxonomy, 'slug='.$term.''); 
    $term_slug = $prod_term[0]->slug;
    $t_id = $prod_term[0]->term_id;
    $term_meta = get_option( "taxonomy_$t_id" );


    wc_get_template( 'archive-product.php' );

 else : 

    wc_get_template( 'archive-product.php' );

 endif; 

}

*/

add_filter( 'wp_nav_menu_secondary_items','wpsites_loginout_menu_link' );



