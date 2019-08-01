<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */


/**
 * Initialize all the things.
 */
require 'inc/class-template.php';
require 'inc/functions-template.php';
require 'inc/hooks-template.php';


if ( is_woocommerce_activated() ) {
	require 'inc/class-woocommerce.php';
	require 'inc/hooks-woocommerce.php';
	require 'inc/functions-woocommerce.php';
	require 'inc/readyfestive-functions.php';
}

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'author' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_pages' ); 
	$role->add_cap( 'edit_published_pages' ); 
	$role->add_cap( 'publish_pages' ); 
	$role->add_cap( 'delete_pages' ); 
	$role->add_cap( 'delete_published_pages' ); 
	$role->add_cap( 'manage_categories' ); 
}
add_action( 'admin_init', 'add_theme_caps');