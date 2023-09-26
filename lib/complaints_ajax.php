<?php

    add_action('wp_ajax_datatables_endpoint', 'my_custom_ajax_endpoint'); //logged in
    add_action('wp_ajax_no_priv_datatables_endpoint', 'my_custom_ajax_endpoint'); //not logged in
    function my_custom_ajax_endpoint(){

        $response = []; 
        global $wpdb;
        //Get WordPress posts - you can get your own custom posts types etc here
        $posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_complaints` ORDER BY `wp_complaints`.`id` ASC "));
        $complaints=array();
        foreach($posts as $post){
             
            $data = new stdClass();
            $data->id = $post->id;
            $data->user_name = get_userdata($post->user_id)->display_name;
            $data->complaint = $post->complaint;
            $data->status = $post->status;
            $data->reply = $post->reply;
            $data->view = '<a class="btn btn-primary" href="'. get_bloginfo("url").'/wp-admin/admin.php?page=complaint_view&id='.$post->id.'" role="button">View</a>';
            
            if($post->status == 'closed') {
                $data->add_reply = '<a class="btn btn-primary" href="'.get_bloginfo("url").'/wp-admin/admin.php?page=complaint_view&edit=1&id='.$post->id.'" role="button">Edit</a>';
            }else {
                $data->add_reply = '<a class="btn btn-primary" href="'.get_bloginfo("url").'/wp-admin/admin.php?page=complaint_view&id='.$post->id.'" role="button">Add Reply</a>';
            }
            array_push($complaints, $data);
        
        }

        //Add two properties to our response - 'data' and 'recordsTotal'
        $response['data'] = !empty($complaints) ? $complaints : []; //array of post objects if we have any, otherwise an empty array        
        $response['recordsTotal'] = !empty($posts) ? count($posts) : 0; //total number of posts without any filtering applied
        
        wp_send_json($response); //json_encodes our $response and sends it back with the appropriate headers

    }