<?php
/**
 * Storefront  functions.
 *
 * @package storefront
 */

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}


/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function storefront_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 * @todo remove in 2.1.
 */
function storefront_categorized_blog() {
	_deprecated_function( 'storefront_categorized_blog', '2.0' );

	if ( false === ( $all_the_cool_cats = get_transient( 'storefront_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'storefront_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so storefront_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so storefront_categorized_blog should return false.
		return false;
	}
}



if ( ! function_exists( 'storefront_display_comments' ) ) {
	/**
	 * Storefront display comments
	 *
	 * @since  1.0.0
	 */
	function storefront_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'storefront_html_tag_schema' ) ) {
	/**
	 * Schema type
	 *
	 * @return void
	 */
	function storefront_html_tag_schema() {
		$schema = 'http://schema.org/';
		$type   = 'WebPage';

		if ( is_singular( 'post' ) ) {
			$type = 'Article';
		} elseif ( is_author() ) {
			$type = 'ProfilePage';
		} elseif ( is_search() ) {
			$type 	= 'SearchResultsPage';
		}

		echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
	}
}

if ( ! function_exists( 'storefront_comment' ) ) {
	/**
	 * Storefront comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.0
	 */
	function storefront_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>
			<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'storefront' ), get_comment_author_link() ); ?>
			</div>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'storefront' ); ?></em>
				<br />
			<?php endif; ?>

			<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
				<?php echo '<time>' . get_comment_date() . '</time>'; ?>
			</a>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
		<?php endif; ?>
		<div class="comment-text">
		<?php comment_text(); ?>
		</div>
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		<?php edit_comment_link( __( 'Edit', 'storefront' ), '  ', '' ); ?>
		</div>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}
}




if ( ! function_exists( 'storefront_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			storefront_posted_on();
			the_title( '<h1 class="entry-title" itemprop="name headline">', '</h1>' );
		} else if ( is_search() ) {
			the_title( '<h3 class="entry-title" itemprop="name headline"><a href="'.get_the_permalink() .'">', '</a></h3>' );
		} else {
			if ( 'post' == get_post_type() ) {
				storefront_posted_on();
			}

			the_title( sprintf( '<h1 class="entry-title" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'storefront_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_content() {
		?>
		<div class="entry-content" itemprop="articleBody">
		<?php
		storefront_post_thumbnail( 'interior' );

		if (is_home()) {
			if ($pos=strpos($post->post_content, '<!--more-->')) {
				
				the_content(
					sprintf(
						__( 'Continue reading %s', 'storefront' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					)
				);
			} else {
				
				the_excerpt(); 
				
			}
		} else if (is_search()) {
			the_excerpt();
		} else {
			the_content();
		}
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'storefront_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function storefront_post_meta() {
		?>
		<aside class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search.

			?>
			<div class="author">
				<?php
					echo get_avatar( get_the_author_meta( 'ID' ), 128 );
					echo '<div class="label">' . esc_attr( __( 'Written by', 'storefront' ) ) . '</div>';
					the_author_posts_link();
				?>
			</div>
			<?php
			// translators: used between list items, there is a space after the comma 
			$categories_list = get_the_category_list( __( ', ', 'storefront' ) );

			if ( $categories_list ) : ?>
				<div class="cat-links">
					<?php
					echo '<div class="label">' . esc_attr( __( 'Posted in', 'storefront' ) ) . '</div>';
					echo wp_kses_post( $categories_list );
					?>
				</div>
			<?php endif; // End if categories. ?>

			<?php
			// translators: used between list items, there is a space after the comma 
			$tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );

			if ( $tags_list ) : ?>
				<div class="tags-links">
					<?php
					echo '<div class="label">' . esc_attr( __( 'Tagged', 'storefront' ) ) . '</div>';
					echo wp_kses_post( $tags_list );
					?>
				</div>
			<?php endif; // End if $tags_list. ?>

		<?php endif; // End if 'post' == get_post_type(). ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<div class="comments-link">
					<?php echo '<div class="label">' . esc_attr( __( 'Comments', 'storefront' ) ) . '</div>'; ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) ); ?></span>
				</div>
			<?php endif; ?>
		</aside>
		<?php
	}
}



if ( ! function_exists( 'storefront_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function storefront_paging_nav() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'storefront' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'storefront' ),
			);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'storefront_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function storefront_post_nav() {
		$args = array(
			'next_text' => '%title',
			'prev_text' => '%title',
			);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'storefront_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function storefront_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s" itemprop="datePublished">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'storefront' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'storefront_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'itemprop' => array(),
				'class'    => array(),
			),
		) );
	}
}

if ( ! function_exists( 'storefront_product_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_product_categories( ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_product_categories_args', array(
				'limit' 			=> 3,
				'columns' 			=> 3,
				'child_categories' 	=> 0,
				'orderby' 			=> 'name',
				'title'				=> __( 'Or start shopping right now!', 'storefront' ),
			) );

			echo '<section class="storefront-product-section storefront-product-categories">';

			do_action( 'storefront_homepage_before_product_categories' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_product_categories_title' );

			echo storefront_do_shortcode( 'product_categories', array(
				'number'  => intval( $args['limit'] ),
				'columns' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'parent'  => esc_attr( $args['child_categories'] ),
			) );

			do_action( 'storefront_homepage_after_product_categories' );

			echo '</section>';
		}
	}
}


if ( ! function_exists( 'bee_style_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function bee_style_categories( ) {

		if ( is_woocommerce_activated() ) {

			echo '<section class="storefront-product-section storefront-product-categories">';

			echo storefront_do_shortcode( 'product_categories', array(
				'number'  => 3,
				'columns' => 3,
				'orderby' => 'name',
				'parent'  => 29
			) );

			echo '</section>';
		}
	}
}


if ( ! function_exists( 'bee_season_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function bee_season_categories( ) {

		if ( is_woocommerce_activated() ) {

			echo '<section class="storefront-product-section storefront-product-categories">';

			echo storefront_do_shortcode( 'product_categories', array(
				'number'  => 3,
				'columns' => 3,
				'orderby' => 'name',
				'parent'  => 30
			) );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_recent_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_recent_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'New In', 'storefront' ),
			) );

			echo '<section class="storefront-product-section storefront-recent-products">';

			do_action( 'storefront_homepage_before_recent_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_recent_products_title' );

			echo storefront_do_shortcode( 'recent_products', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) );

			do_action( 'storefront_homepage_after_recent_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_featured_products() {

		if ( is_woocommerce_activated() ) {

        
				$meta_query   = WC()->query->get_meta_query();
				$meta_query[] = array(
					'key'   => '_featured',
					'value' => 'yes'
				);
				$args = array(
					'post_type'   =>  'product',
					'stock'       =>  1,
					'posts_per_page'   =>  8,
					'orderby'     =>  'date',
					'order'       =>  'DESC',
					'meta_query'  =>  $meta_query
				);
				$loop = new WP_Query( $args );
					
				woocommerce_product_loop_start();
				
				while ( $loop->have_posts() ) : $loop->the_post(); global $product; 

					 wc_get_template_part( 'content', 'product' );

				endwhile; wp_reset_query(); // end of the loop.
				
				woocommerce_product_loop_end();
        		
               
		}
	}
}

if ( ! function_exists( 'storefront_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_popular_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_popular_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'   => __( 'Fan Favorites', 'storefront' ),
			) );

			echo '<section class="storefront-product-section storefront-popular-products">';

			do_action( 'storefront_homepage_before_popular_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_popular_products_title' );

			echo storefront_do_shortcode( 'top_rated_products', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) );

			do_action( 'storefront_homepage_after_popular_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_on_sale_products' ) ) {
	/**
	 * Display On Sale Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @param array $args the product section args.
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_on_sale_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_on_sale_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'   => __( 'On Sale', 'storefront' ),
			) );

			echo '<section class="storefront-product-section storefront-on-sale-products">';

			do_action( 'storefront_homepage_before_on_sale_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_on_sale_products_title' );

			echo storefront_do_shortcode( 'sale_products', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) );

			do_action( 'storefront_homepage_after_on_sale_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_best_selling_products' ) ) {
	/**
	 * Display Best Selling Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since 2.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_best_selling_products( $args ) {
		if ( is_woocommerce_activated() ) {
			$args = apply_filters( 'storefront_best_selling_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'title'	  => esc_attr__( 'Best Sellers', 'storefront' ),
			) );
			echo '<section class="storefront-product-section storefront-best-selling-products">';
			do_action( 'storefront_homepage_before_best_selling_products' );
			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';
			do_action( 'storefront_homepage_after_best_selling_products_title' );
			echo storefront_do_shortcode( 'best_selling_products', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) );
			do_action( 'storefront_homepage_after_best_selling_products' );
			echo '</section>';
		}
	}
}


if ( ! function_exists( 'storefront_social_icons' ) ) {
	/**
	 * Display social icons
	 * If the subscribe and connect plugin is active, display the icons.
	 *
	 * @link http://wordpress.org/plugins/subscribe-and-connect/
	 * @since 1.0.0
	 */
	function storefront_social_icons() {
		if ( class_exists( 'Subscribe_And_Connect' ) ) {
			echo '<div class="subscribe-and-connect-connect">';
			subscribe_and_connect_connect();
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'storefront_get_sidebar' ) ) {
	/**
	 * Display storefront sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function storefront_get_sidebar() {
	
		get_sidebar();
	}
}

if ( ! function_exists( 'storefront_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.5.0
	 */
	function storefront_post_thumbnail( $size ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size, array( 'itemprop' => 'image' ) );
		}
	}
}

/**
 * The primary navigation wrapper
 */
function storefront_primary_navigation_wrapper() {
	echo '<section class="storefront-primary-navigation">';
}

/**
 * The primary navigation wrapper close
 */
function storefront_primary_navigation_wrapper_close() {
	echo '</section>';
}


