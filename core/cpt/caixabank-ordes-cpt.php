<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	// Register Custom Post Type
function caixabank_orders() {

	$labels = array(
		'name'                  => _x( 'Orders', 'Post Type General Name', 'caixabank_tools_official' ),
		'singular_name'         => _x( 'Order', 'Post Type Singular Name', 'caixabank_tools_official' ),
		'menu_name'             => __( 'CaixaBank Orders', 'caixabank_tools_official' ),
		'name_admin_bar'        => __( 'CaixaBank Orders', 'caixabank_tools_official' ),
		'archives'              => __( 'Order Archives', 'caixabank_tools_official' ),
		'parent_item_colon'     => __( 'Parent Item:', 'caixabank_tools_official' ),
		'all_items'             => __( 'All Orders', 'caixabank_tools_official' ),
		'add_new_item'          => __( 'Add new Order', 'caixabank_tools_official' ),
		'add_new'               => __( 'Add New', 'caixabank_tools_official' ),
		'new_item'              => __( 'New Order', 'caixabank_tools_official' ),
		'edit_item'             => __( 'Edit Order', 'caixabank_tools_official' ),
		'update_item'           => __( 'Update Order', 'caixabank_tools_official' ),
		'view_item'             => __( 'View Order', 'caixabank_tools_official' ),
		'search_items'          => __( 'Search Order', 'caixabank_tools_official' ),
		'not_found'             => __( 'Not found', 'caixabank_tools_official' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'caixabank_tools_official' ),
		'featured_image'        => __( 'Featured Image', 'caixabank_tools_official' ),
		'set_featured_image'    => __( 'Set featured image', 'caixabank_tools_official' ),
		'remove_featured_image' => __( 'Remove featured image', 'caixabank_tools_official' ),
		'use_featured_image'    => __( 'Use as featured image', 'caixabank_tools_official' ),
		'insert_into_item'      => __( 'Insert into item', 'caixabank_tools_official' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'caixabank_tools_official' ),
		'items_list'            => __( 'Items list', 'caixabank_tools_official' ),
		'items_list_navigation' => __( 'Items list navigation', 'caixabank_tools_official' ),
		'filter_items_list'     => __( 'Filter items list', 'caixabank_tools_official' ),
	);
	$args = array(
		'label'                 => __( 'Order', 'caixabank_tools_official' ),
		'description'           => __( 'Orders', 'caixabank_tools_official' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'comments', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => 'caixabank',
		'menu_position'         => 5,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'caixabank_orders', $args );

}
add_action( 'init', 'caixabank_orders', 0 );

function caixabank_remove_page_fields() {
 remove_meta_box(	'commentstatusdiv',	'caixabank_orders', 'normal' ); //removes comments status
 remove_meta_box(	'commentsdiv',		'caixabank_orders', 'normal' ); //removes comments
 remove_meta_box(	'authordiv' ,		'caixabank_orders', 'normal' ); //removes author
 remove_meta_box(	'postcustom',		'caixabank_orders', 'normal');
}
add_action( 'admin_menu' , 'caixabank_remove_page_fields' );

function caixabank_load_styles_cpt_orders() {
	global $post_type;
    if( 'caixabank_orders' == $post_type ){
		wp_register_style( 'caixabank_cpt_orders', CAIXABANK_DIR_URL . '/assets/css/caixabank-cpt.css', false, CAIXABANK_TOOLS_OFFICIAL_VERSION );
		wp_enqueue_style( 'caixabank_cpt_orders' );
		}
	}
add_action( 'admin_enqueue_scripts', 'caixabank_load_styles_cpt_orders' );
?>