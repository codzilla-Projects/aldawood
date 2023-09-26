<?php 
function aldawood_scripts_styles() {
	wp_enqueue_style( 'dawood-bootstrap-css', DAWOOD_URL . 'assets/css/bootstrap.min.css' );

  	wp_enqueue_style( 'dawood-fontawesome-css', DAWOOD_URL . 'assets/css/fontawesome.css' );

  	wp_enqueue_style( 'dawood-animate-css', DAWOOD_URL . 'assets/css/animate.css' );

  	wp_enqueue_style( 'dawood-slick-css', DAWOOD_URL . 'assets/css/slick.css' );

  	wp_enqueue_style( 'dawood-slick-theme-css', DAWOOD_URL . 'assets/css/slick-theme.css' );

  	wp_enqueue_style( 'dawood-magnific-popup-css', DAWOOD_URL . 'assets/css/magnific-popup.css' );

  	wp_enqueue_style( 'dawood-jquery-ui-css', DAWOOD_URL . 'assets/css/jquery-ui.css' );

  	wp_enqueue_style( 'dawood-style-css', DAWOOD_URL . 'assets/css/style.css' );


  	wp_enqueue_script( 'dawood-jquery-js',  DAWOOD_URL . 'assets/js/jquery.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-bootstrap-js',  DAWOOD_URL . 'assets/js/bootstrap.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-wow-js',  DAWOOD_URL . 'assets/js/wow.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-slick-js',  DAWOOD_URL . 'assets/js/slick.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-magnific-popup-js',  DAWOOD_URL . 'assets/js/magnific-popup.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-isotope-js',  DAWOOD_URL . 'assets/js/isotope.pkgd.min.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-jquery-ui-js',  DAWOOD_URL . 'assets/js/jquery-ui.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-mCustomScrollbar-js',  DAWOOD_URL . 'assets/js/mCustomScrollbar.js' , array() ,false, true );

  	wp_enqueue_script( 'dawood-main-js',  DAWOOD_URL . 'assets/js/main.js' , array() ,false, true );

}
add_action( 'wp_enqueue_scripts', 'aldawood_scripts_styles' );



function aldawood_admin_scripts_styles($hook) {
    //var_dump($hook);

    wp_enqueue_script( 'product-pricing', DAWOOD_URL .'assets/admin/js/product-pricing.js', array() ,false, true );
    
    
	$aldawood_pages =['term.php','edit-tags.php','toplevel_page_complaints-area','toplevel_page_home-area','toplevel_page_reviews-area', 'toplevel_page_orders-area' ,'toplevel_page_content-area','dawood-options_page_home-page-content','admin_page_complaint_view', 'admin_page_order_view', 'toplevel_page_reports-area','reports_page_orders_report','reports_page_users_report'];

	wp_enqueue_style( 'dawood-main', DAWOOD_URL . 'assets/admin/css/main-style.css');
	if( in_array($hook, $aldawood_pages) ) {
		wp_enqueue_style( 'dawood-bootsrtap', DAWOOD_URL . 'assets/admin/css/bootstrap.min.css');
		wp_enqueue_style( 'dawood-style', DAWOOD_URL . 'assets/admin/css/style.css');
		wp_enqueue_script( 'dawood-bootsrtap', DAWOOD_URL .'assets/admin/js/bootstrap.min.js', array() ,false, true );
		wp_enqueue_script( 'dawood-script', DAWOOD_URL .'assets/admin/js/script.js', array() ,false, true );
		if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}
    
    $table_pages =['toplevel_page_complaints-area','toplevel_page_reviews-area', 'toplevel_page_orders-area' ];
    if( in_array($hook, $table_pages) ) {
		wp_enqueue_style( 'dawood-jquery-dataTables-css', DAWOOD_URL . 'assets/admin/data-tables/css/jquery.dataTables.min.css');
		wp_enqueue_script( 'dawood-jquery-dataTables', DAWOOD_URL .'assets/admin/data-tables/js/jquery.dataTables.min.js', array() ,false, true );
//		wp_enqueue_script( 'dawood-table-pagination', DAWOOD_URL .'assets/admin/data-tables/js/bootstrap-table-pagination.js', array() ,false, true );
        $ajax_url = DAWOOD_URL .'dawood_options/';
//        wp_enqueue_script( 'dawood-pagination', DAWOOD_URL .'assets/admin/data-tables/js/pagination.js', array() );
//        wp_localize_script( 'dawood-pagination', 'my_ajax_object', array( 'ajax_url' => $ajax_url) );
        wp_enqueue_script( 'complaints-pagination', DAWOOD_URL .'assets/admin/data-tables/js/complaint.js', array() );
        wp_enqueue_script( 'orders-pagination', DAWOOD_URL .'assets/admin/data-tables/js/orders.js', array() );
        wp_enqueue_script( 'reviews-pagination', DAWOOD_URL .'assets/admin/data-tables/js/reviews.js', array() );
//        wp_localize_script( 'complaints-pagination', 'my_ajax_object', array( 'ajax_url' => $ajax_url) );
        
    }

}
 
add_action('admin_enqueue_scripts', 'aldawood_admin_scripts_styles');


