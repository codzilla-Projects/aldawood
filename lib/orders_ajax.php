<?php

    add_action('wp_ajax_datatables_orders_endpoint', 'my_orders_ajax_endpoint'); //logged in
    add_action('wp_ajax_no_priv_datatables_orders_endpoint', 'my_orders_ajax_endpoint'); //not logged in
    function my_orders_ajax_endpoint(){

        $response = []; 
        global $wpdb;
        
        //Get WordPress posts - you can get your own custom posts types etc here
        $posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_orders` ORDER BY `wp_orders`.`id` DESC "));
        $orders=array();
        foreach($posts as $post){

            $data = new stdClass();
            $data->id = $post->id;
            $data->user_name = get_userdata($post->user_id)->display_name;
            $data->total = $post->total;
            $data->order_status = $post->order_status;
            $data->address = $post->address;
            $data->phone = $post->phone;
            $data->created_at = $post->created_at;
            $data->view = '<a class="btn btn-primary" href="'.get_bloginfo("url").'/wp-admin/admin.php?page=order_view&id='.$post->id.'" role="button">View</a>';
            
            
            array_push($orders, $data);
        
        }

        //Add two properties to our response - 'data' and 'recordsTotal'
        $response['data'] = !empty($orders) ? $orders : []; //array of post objects if we have any, otherwise an empty array        
        $response['recordsTotal'] = !empty($posts) ? count($posts) : 0; //total number of posts without any filtering applied
        
        wp_send_json($response); //json_encodes our $response and sends it back with the appropriate headers

    }