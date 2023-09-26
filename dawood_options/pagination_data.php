<?php


global $wpdb;
$resultset = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_complaints` WHERE 1 "));
//var_dump($resultset);die();

$results = array(
	"sEcho" => 1,
    "iTotalRecords" => count($resultset),
    "iTotalDisplayRecords" => count($resultset),
      "aaData"=>$data);
echo json_encode($results);
//exit;
