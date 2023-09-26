<?php 


/*
function dawood_create_complaint_table(){

  require_once (ABSPATH .'/wp-admin/includes/upgrade.php');
  global $wpdb;
  global $wp_queries, $charset_collate;
  
  $table_name = $wpdb->prefix . "complaints";
  $charset_collate = '';
  $charset_collate .= " COLLATE utf8_general_ci"; 

  if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name){
    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
      id BIGINT(20) UNSIGNED AUTO_INCREMENT ,  
      user_id BIGINT(20),
      complaint LONGTEXT,
      reply LONGTEXT,
      replier_id BIGINT(20),
      status VARCHAR(50),
      date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      reply_date TIMESTAMP DEFAULT 0,
      PRIMARY KEY (id) ) {$charset_collate} ";
    dbDelta($sql);
  }
   
}
function dawood_create_orders_table(){

  require_once (ABSPATH .'/wp-admin/includes/upgrade.php');
  global $wpdb;
  global $wp_queries, $charset_collate;
  
  $table_name = $wpdb->prefix . "orders";
  $charset_collate = '';
  $charset_collate .= " COLLATE utf8_general_ci"; 

  if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name){
    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
      id BIGINT(20) UNSIGNED AUTO_INCREMENT ,  
      user_id BIGINT(20),
      order_status VARCHAR(50),
      address LONGTEXT,
      phone VARCHAR(100),
      total DOUBLE,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id) ) {$charset_collate} ";
    dbDelta($sql);
  }
  
}

function dawood_create_order_meta_table(){

  require_once (ABSPATH .'/wp-admin/includes/upgrade.php');
  global $wpdb;
  global $wp_queries, $charset_collate;
  
  $table_name = $wpdb->prefix . "order_meta";
  $table_name2 = $wpdb->prefix . "orders";
  $charset_collate = '';
  $charset_collate .= " COLLATE utf8_general_ci"; 

  if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name){
    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
      id BIGINT(20) UNSIGNED AUTO_INCREMENT ,  
      order_id BIGINT(20),
      product_id BIGINT(20),
      price DOUBLE,
      sale_price DOUBLE,
      type VARCHAR(50),
      extras LONGTEXT,
      components LONGTEXT,
      quantity INTEGER(10),
      total_price DOUBLE,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id) ) {$charset_collate} ";
    dbDelta($sql);
  }
  
}

function dawood_create_reviews_table(){

  require_once (ABSPATH .'/wp-admin/includes/upgrade.php');
  global $wpdb;
  global $wp_queries, $charset_collate;
  
  $table_name = $wpdb->prefix . "reviews";
  $charset_collate = '';
  $charset_collate .= " COLLATE utf8_general_ci"; 

  if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name){
    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
      id BIGINT(20) UNSIGNED AUTO_INCREMENT ,  
      user_id BIGINT(20),
      order_id BIGINT(20),
      review LONGTEXT,
      stars INTEGER(10),
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (id) ) {$charset_collate} ";
    dbDelta($sql);
  }
   
}

$new_table=dawood_create_reviews_table();

*/
function dawood_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            width: auto;
            height: 75px;
            background-size: cover !important;
            margin: 0 auto;
            padding: 20px;
            background: #aed135 url(<?php echo get_option('dawood_logo_dark'); ?>);
        }
        p#nav>a{
            display: none;
        }
        .login form{
            background: #4F5457!important;
        }
        .login label{
            font-weight: 600!important;
            color: #fff!important;
        }
        .wp-core-ui p .button {
            background: #920100;
            border-color: #920100;
        }
        .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
            background: #ec1c24!important;
            border-color: #ec1c24!important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'dawood_login_logo' );

function remove_wp_logo($wp_admin_bar) {
  $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);

function change_footer_admin() {
  echo '<span id="footer-thankyou"><a href="codzilla.net" target="_blank">Codezilla</a></span>';
}
add_filter('admin_footer_text', 'change_footer_admin');


function tour_clean($string){
    return trim(stripslashes(htmlspecialchars($string)));
}

function dawood_get_sliders(){
    $args = array(
        'post_type'       => 'slider',
        'post_status'     => 'publish',
        'posts_per_page'  =>  -1,
        'orderby'         => 'date',
        'order'           => 'ASC'
    );
    return $posts = new WP_Query( $args );    
}

function dawood_get_products(){
    $args = array(
        'post_type'       => 'product',
        'post_status'     => 'publish',
        'posts_per_page'  =>  -1,
        'orderby'         => 'date',
        'order'           => 'ASC'
    );
    return $posts = new WP_Query( $args );    
}

function dawood_get_product_cafe(){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'product',
        'post_status'     => 'publish',
        'posts_per_page'  =>  3,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'meta_key'        => 'dawood_product_type',
        'meta_value'      => '0',
    );
    return $posts = new WP_Query( $args );    
}

function dawood_get_product_nuts(){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'product',
        'post_status'     => 'publish',
        'posts_per_page'  =>  -1,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'meta_key'        => 'dawood_product_type',
        'meta_value'      => '1',
    );
    return $posts = new WP_Query( $args );    
}