<?php 
error_reporting(1);
define('DAWOOD_ROOT', get_template_directory() . '/');
define('DAWOOD_URL', get_template_directory_uri() . '/');
define('DAWOOD_ADMIN', admin_url());
define('LOGO_cafe', 'http://dawood.codzilla.net/wp-content/uploads/2021/11/logo_cafe.png');
define('LOGO_nuts', 'http://dawood.codzilla.net/wp-content/uploads/2021/11/logo_nuts.jpg');

add_theme_support( 'post-thumbnails' );

require_once ( DAWOOD_ROOT . 'lib/dawood_theme_init.php');
require_once ( DAWOOD_ROOT . 'lib/dawood_enqueue_scripts.php');
//require_once ( DAWOOD_ROOT . 'lib/ajax_functions.php');
require_once ( DAWOOD_ROOT . 'lib/dawood_functions.php');
require_once ( DAWOOD_ROOT . 'lib/dawood_taxonomy_terms.php');
require_once ( DAWOOD_ROOT . 'lib/dawood_meta_fields.php');
require_once ( DAWOOD_ROOT . 'lib/users_role_and_meta.php');
require_once ( DAWOOD_ROOT . 'lib/complaints_ajax.php');
require_once ( DAWOOD_ROOT . 'lib/orders_ajax.php');
require_once ( DAWOOD_ROOT . 'lib/reviews_ajax.php');
require_once('wp_bootstrap_navwalker.php');

function ha_load_theme_textdomain() {
    load_theme_textdomain( 'dawood', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ha_load_theme_textdomain' );

function dawood_ajax_header(){
 echo '<script type="text/javascript">  var theme_ajax_url="'.admin_url('admin-ajax.php' ).'"; var nonce = "'.wp_create_nonce("dawood_nonce").'";</script>';
  echo '<script type="text/javascript">  var ajax_url="'.admin_url('admin-ajax.php' ).'"; var nonce = "'.wp_create_nonce("dawood_nonce").'";</script>';
}
add_action('wp_head','dawood_ajax_header' );
/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

register_nav_menus(array(

        'bootstrap-menu'     => 'Navigation Bar',
       /* 'company-menu'       => 'Company Menu',
        'links-menu'         => 'Links Menu',*/

    ));
function dawood_menu() {
    
wp_nav_menu( array(

    'menu'              => 'Main Menu',
    'theme_location'    => 'navigation-menu',
    'menu_class'        => 'main_menu_list ul_li',
    'depth'             => 3,
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker())
 );

}

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    if (!$data['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;
        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }
        $data['ext'] = $ext;
        $data['type'] = $type;
        $data['proper_filename'] = $proper_filename;
    }
    return $data;


}, 10, 4);


add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
});


add_action('admin_head', function () {
    echo '<style type="text/css">
         .media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }</style>';
});



//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);




/************/

//add_action( 'load-index.php', 'hide_welcome_screen' );
//
//
//
//function hide_welcome_screen() {
//
//    $user_id = get_current_user_id();
//
//   update_user_meta( $user_id, 'show_welcome_panel', 0 );
//
//}

/************/

add_action('admin_head', 'my_custom_admin_head');



function my_custom_admin_head() {

    echo '<style>[for="wp_welcome_panel-hide"] {display: none !important;}#contextual-help-link-wrap,.update-nag,.update-nag.update-nag,#wpfooter,.wp-first-item.hide-if-no-customize,.toplevel_page_wp_admin_ui_customize{display:none!important}</style>';

}

/************/

//add_action( 'admin_menu', 'custom_menu_page_removing',999 );



/*function custom_menu_page_removing() {
//    remove_menu_page( 'index.php' );
//    remove_menu_page( 'users.php' );
    remove_menu_page( 'update-core.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit.php?post_type=page' );
//    remove_menu_page( 'upload.php' );
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );          //themes
    remove_menu_page( 'plugins.php' );          //plugins
	remove_menu_page( 'export.php' );          //export
	remove_menu_page( 'tools.php' );          //tools
    remove_menu_page( 'options-general.php' );        //Settings
    remove_submenu_page( 'options-general.php', 'privacy.php' );
    remove_submenu_page( 'tools.php', 'export.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );
    remove_menu_page( 'profile.php' );          
}*/

//function admin_redirects() {
    //global $pagenow;
    /* Redirect Customizer to Theme options */
    //if($pagenow == 'customize.php' || $pagenow == 'themes.php' || $pagenow =='update-core.php' || $pagenow == 'plugins.php' || $pagenow == 'edit-comments.php' || $pagenow =='export.php' || $pagenow =='theme-editor.php'){
      //  wp_redirect(admin_url('/', 'http'), 301);
       // exit;
    //}
//}
//add_action('admin_init', 'admin_redirects');


//function disable_default_dashboard_widgets() {

    //global $wp_meta_boxes;
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

//}
//add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

/**
 * Remove WP logo and comments from the Toolbar.
 *
 //* @param WP_Admin_Bar $wp_admin_bar WP_Admin Bar instance.
 */
//function wpdocs_remove_logo_comments( $wp_admin_bar ) {
    // Remove wp-logo and comments from the menu bar.
   // $wp_admin_bar->remove_node( 'wp-logo' );  
    //$wp_admin_bar->remove_node( 'comments' );
    //$wp_admin_bar->remove_node( 'new-post' );

    //$wp_admin_bar->remove_node( 'new-media' );

    //$wp_admin_bar->remove_node( 'new-page' );
    //$wp_admin_bar->remove_node( 'customize' );

    //$wp_admin_bar->remove_node( 'new-user' );
    //$wp_admin_bar->remove_node( 'updates' );
    //$wp_admin_bar->remove_node( 'my-site-logo' );
//}
//add_action( 'admin_bar_menu', 'wpdocs_remove_logo_comments', 999 );

