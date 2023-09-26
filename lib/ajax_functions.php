<?php

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
//$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value
//
//## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (complaint like '%".$searchValue."%' or 
        status like '%".$searchValue."%' or 
        reply like'%".$searchValue."%' ) ";
}
 global $wpdb;
//$complaints = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_complaints` ORDER BY `wp_complaints`.`id` DESC "));
## Total number of records without filtering
$records = $wpdb->get_results($wpdb->prepare("select * from wp_complaints WHERE 1"));
$totalRecords = count($records);

## Total number of record with filtering
$sel = $wpdb->get_results($wpdb->prepare("select * from wp_complaints WHERE 1 "));
$totalRecordwithFilter =count($sel);

## Fetch records
$complaints =$wpdb->get_results($wpdb->prepare( "select * from wp_complaints WHERE 1 "));
$data = array();

foreach ($complaints as $complaint) {
   $data[] = array( 
      "id"=>$complaint->id,
      "complaint"=>$complaint->complaint,
      "status"=>$complaint->status,
      "reply"=>$complaint->reply,
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
//die();