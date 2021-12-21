<?php

/**
 * Onde-production functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Onde-production
 */

//exit if accessed directly 
if (!defined('ABSPATH')) {
	exit;
}
//
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

//path theme dir constants

define('ONDE_THEME_DIR', get_template_directory());
define('ONDE_THEME_URI', get_template_directory_uri());

require_once 'inc/class/Onde_Theme_Class.php';
require_once 'inc/class/walker/Onde_Nav_Walker.php';

new Onde_Theme_Class();


function onde_load_posts()
{

	$posts = get_posts();
	wp_send_json($posts);
	wp_die();
}

function onde_is_item_in_menu($menu_slug, string $item_title = ''): bool
{

	$menu_items = array();

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_slug])) {
		$menu = get_term($locations[$menu_slug]);

		$items = wp_get_nav_menu_items($menu->term_id);

		foreach ($items as $item) {
			$menu_items[] = $item->title;
		}
	}

	return in_array($item_title, $menu_items);
}
// Add styles for admin page
add_action('admin_head', 'admin_styles');

function admin_styles() {
    echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/custom-editor-style.css" type="text/css" media="all" />';
}
function generate_404()
{
	global $wp_query;
	$wp_query->set_404();
	status_header(404);
}


/**
 * send 404 page not found to boutique panier commandes if woocommerce is not activated
 *
 * @return void
 */
function onde_shop_link_send_404_if_wc_not_activated()
{

	if (!ONDE_WOOCOMMERCE_ACTIVE) {

		global $wp_query;
		
		$page = $wp_query->queried_object ? intval($wp_query->queried_object->ID): null;
		
		if ($page === 117 || $page === 118 || $page === 119 || $page === 120) {
			$wp_query->set_404();
			status_header(404);
		}
	} else {
		return;
	}
}
add_action('template_redirect', 'onde_shop_link_send_404_if_wc_not_activated');
/**
 * Filter the upload size limit for non-administrators.
 *
 * @param string $size Upload size limit (in bytes).
 * @return int (maybe) Filtered size limit.
 */
function filter_site_upload_size_limit($size)
{
	// Set the upload size limit to 10 MB for users lacking the 'manage_options' capability.
	if (current_user_can('manage_options')) {
		// 10 MB.
		$size = 1024 * 10000;
	}
	return $size;
}
function onde_add_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/assets/favicon_io/favicon.ico" />';
}

add_action('wp_head', 'onde_add_favicon');

//add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );
add_action('wp_ajax_onde_load_posts', 'onde_load_posts');
add_action('wp_ajax_nopriv_onde_load_posts', 'onde_load_posts');

add_filter('wp_nav_menu_objects',function($sorted_menu_obj,$args) {
	if(!ONDE_WOOCOMMERCE_ACTIVE) {
		foreach($sorted_menu_obj as $key => $menu_object) {
			if(intval($menu_object->object_id) === 117) {
				unset($sorted_menu_obj[$key]);
			}
			if(intval($menu_object->object_id) === 118) {
				unset($sorted_menu_obj[$key]);
			}
			if(intval($menu_object->object_id) === 119) {
				unset($sorted_menu_obj[$key]);
			}
			if(intval($menu_object->object_id) === 120) {
				unset($sorted_menu_obj[$key]);
			}
			
		}
	}
	
	return $sorted_menu_obj;
},10,2);
