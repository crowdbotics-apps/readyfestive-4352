<?php
/**
 * Storefront hooks
 *
 * @package storefront
 */

/**
 * General
 *
 * @see  storefront_header_widget_region()
 * @see  storefront_get_sidebar()
 */
add_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );
add_action( 'storefront_sidebar',        'storefront_get_sidebar',          10 );


/**
 * Posts
 *
 * @see  storefront_post_header()
 * @see  storefront_post_meta()
 * @see  storefront_post_content()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_loop_post',         'storefront_post_header',      10 );
//add_action( 'storefront_loop_post',         'storefront_post_meta',        20 );
add_action( 'storefront_loop_post',         'storefront_post_content',     30 );
add_action( 'storefront_loop_after',        'storefront_paging_nav',       10 );
add_action( 'storefront_single_post',       'storefront_post_header',      10 );
//add_action( 'storefront_single_post',       'storefront_post_meta',        20 );
add_action( 'storefront_single_post',       'storefront_post_content',     30 );
add_action( 'storefront_single_post_after', 'storefront_post_nav',         10 );
add_action( 'storefront_single_post_after', 'storefront_display_comments', 20 );

/**
 * Pages
 *
 * @see  storefront_page_header()
 * @see  storefront_page_content()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_page',       'storefront_page_header',      10 );
add_action( 'storefront_page',       'storefront_page_content',     20 );
add_action( 'storefront_page_after', 'storefront_display_comments', 10 );