<?php

    add_action('wp_ajax_datatables_reviews_endpoint', 'my_reviews_ajax_endpoint'); //logged in
    add_action('wp_ajax_no_priv_datatables_reviews_endpoint', 'my_reviews_ajax_endpoint'); //not logged in
    function my_reviews_ajax_endpoint(){

        $response = []; 
        global $wpdb;
        //Get WordPress posts - you can get your own custom posts types etc here
        $posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_reviews` ORDER BY `wp_reviews`.`id` DESC"));
        $reviews=array();
        foreach($posts as $post){

            $data = new stdClass();
            $data->id = $post->id;
            $user = get_user_by('id', $post->user_id);
            $user_name = get_userdata($post->user_id)->display_name;
            $data->user_name = $user_name;
            $data->order_id = $post->order_id;
            $data->review = $post->review;
            $data->stars = $post->stars;
            $data->created_at = $post->created_at;
            
            array_push($reviews, $data);
        
        }

        //Add two properties to our response - 'data' and 'recordsTotal'
        $response['data'] = !empty($reviews) ? $reviews : []; //array of post objects if we have any, otherwise an empty array        
        $response['recordsTotal'] = !empty($posts) ? count($posts) : 0; //total number of posts without any filtering applied
        
        wp_send_json($response); //json_encodes our $response and sends it back with the appropriate headers

    }