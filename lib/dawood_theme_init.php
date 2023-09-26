<?php
add_action( 'init', 'dawood_custom_post_types' );
/**********************
** create CPT Types
**********************/
function dawood_custom_post_types() {

 $cpts = [
    array(
        'single'   => 'Product',
        'plural'   => 'Products',
        'cptname'  => 'product',
        'icon'     => 'dashicons-store',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'show_in_menu'=> true,
        'position' => 5
        ), 
     array(
        'single'   => 'Slider',
        'plural'   => 'Sliders',
        'cptname'  => 'Slider',
        'icon'     => 'dashicons-store',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'show_in_menu'=> true,
        'position' => 5
        )
 ];
 foreach ($cpts as $cpt) {

     $labels = array(
        'name'                  => _x( $cpt['single'], 'Post Type General Name', 'dawood' ),
        'singular_name'         => _x( $cpt['single'], 'Post Type Singular Name', 'dawood' ),
        'menu_name'             => __( $cpt['plural'], 'dawood' ),
        'all_items'             => __( 'All '.$cpt['plural'], 'dawood' ),
        'add_new_item'          => __( 'Add New '.$cpt['single'] , 'dawood' ),
        'add_new'               => __( 'Add New', 'dawood' ),
        'new_item'              => __( 'New '.$cpt['single'], 'dawood' ),
        'edit_item'             => __( 'Edit '.$cpt['single'], 'dawood' ),
        'update_item'           => __( 'Update '.$cpt['single'], 'dawood' ),
        'view_item'             => __( 'View '.$cpt['single'], 'dawood' ),
        'search_items'          => __( 'Search '.$cpt['plural'], 'dawood' ),
        'not_found'             => __( 'Not found', 'dawood' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'dawood' ),
        'featured_image'        => __( 'Featured Image', 'dawood' ),
        'set_featured_image'    => __( 'Set featured image', 'dawood' ),
        'remove_featured_image' => __( 'Remove featured image', 'dawood' ),
        'use_featured_image'    => __( 'Use as featured image', 'dawood' ),
      );
      $args = array(
        'label'                 => __( $cpt['plural'], 'dawood' ),
        'description'           => __( $cpt['plural'].' Description', 'dawood' ),
        'labels'                => $labels,
        'supports'              => ["title","editor","thumbnail","excerpt"],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          =>$cpt['show_in_menu'],
        'menu_position'         => $cpt['position'],
        'menu_icon'             => $cpt['icon'],
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        
      );
    
    // Register Custom Post Type>
	register_post_type( $cpt['cptname'], $args );

    }   

}



add_filter( 'rwmb_meta_boxes', 'dawood_add_gallery_images_to_portfolio' );

function dawood_add_gallery_images_to_portfolio( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Gallery Images', 'dawood' ),
        'post_types' => array('product'),
        'fields'     => array(
            array(
                'name' => esc_html__( 'Upload Images'),
                'id'   => "thumbnail_id",
                'type' => 'image_advanced',
            ),
        ),
    );

    return $meta_boxes;
    

}

function dawood_register_custom_menu_pages() {

    add_menu_page(

        'website options',

        'Theme Options',

        'manage_options',

        'content-area',

        'main_content_area_callback',

        DAWOOD_URL.'logo.png',

        2

    );  
    add_menu_page(

        'Home Page options',

        'Homepage Options',

        'manage_options',

        'home-area',

        'home_page_area_callback',

        DAWOOD_URL.'logo.png',

        3

    );
    add_menu_page(

        'Complaints',

        'complaints',

        'manage_options',

        'complaints-area',

        'complaints_content_area_callback',

       'dashicons-format-status',

        7

    );   

    add_menu_page(

        'Orders',

        'orders',

        'manage_options',

        'orders-area',

        'orders_content_area_callback',

       'dashicons-cart',

        6

    );
    add_menu_page(

        'Reviews',

        'reviews',

        'manage_options',

        'reviews-area',

        'reviews_content_area_callback',

       'dashicons-star-filled',

        8

    );
    add_menu_page(

        'Reports',

        'reports',

        'manage_options',

        'reports-area',

        'reports_content_area_callback',

       'dashicons-chart-pie',

        9

    );
    add_submenu_page(

        'reports-area',

        'Orders Reports',

        'Orders Reports',

        'manage_options',

        'orders_report',

        'orders_report_content_area_callback'

    );
    add_submenu_page(

        'reports-area',

        'Users Reports',

        'Users Reports',

        'manage_options',

        'users_report',

        'users_report_content_area_callback'

    );
    
    add_submenu_page(

        null,

        'Complaint View',

        'Complaint View',

        'manage_options',

        'complaint_view',

        'complaint_view_content_area_callback'

    );
    add_submenu_page(

        null,

        'Order View',

        'Order View',

        'manage_options',

        'order_view',

        'order_view_content_area_callback'

    );
    

  

   
}

add_action( 'admin_menu', 'dawood_register_custom_menu_pages' );

require_once ( DAWOOD_ROOT . 'dawood_options/dawood_option.php');
require_once ( DAWOOD_ROOT . 'dawood_options/home_page_option.php');
require_once ( DAWOOD_ROOT . 'dawood_options/complaints.php');
require_once ( DAWOOD_ROOT . 'dawood_options/orders.php');
require_once ( DAWOOD_ROOT . 'dawood_options/reviews.php');
require_once ( DAWOOD_ROOT . 'dawood_options/complaint-view.php');
require_once ( DAWOOD_ROOT . 'dawood_options/order-view.php');
//require_once ( DAWOOD_ROOT . 'dawood_options/pagination_data.php');
require_once ( DAWOOD_ROOT . 'dawood_options/reports.php');
require_once ( DAWOOD_ROOT . 'dawood_options/report_one.php');
require_once ( DAWOOD_ROOT . 'dawood_options/report_users.php');
