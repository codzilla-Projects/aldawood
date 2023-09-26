<?php 

function users_report_content_area_callback(){

    global $wpdb;
    
    
    if( isset( $_POST['GetTotal'] ) && !empty( $_POST['GetTotal'] ) ){

      if(!empty($_POST['date_from']) && !empty($_POST['date_to'])){

        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $get_total = $wpdb->get_var( 
            $wpdb->prepare("SELECT SUM(total) as total FROM wp_orders where created_at between '".$date_from."' and '".$date_to."'") );
          //var_dump($get_total);die();
        

      }else{

        $get_total = 0;

      }

    }
    
?>



<div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Get most purchased user</span></h1>
              </div>
              <div class="card-body">
                 <!-- Content Wrapper. Contains page content -->


                <?php if( isset($get_total) && ($get_total == 0) ) : ?>
                    <div class="alert alert-danger margin-top text-center col-md-6 col-md-offset-3"><h4>Enter Specific Dates</h4></div>
                    <div class="clearfix"></div>
                <?php endif; ?>

                <?php if( isset($get_total) && ($get_total != 0)  && !empty($get_total) ){ 
                  echo "<div class='alert alert-success margin-top text-center col-md-6 col-md-offset-3'><h4>Total orders from  " . $date_from . " to " . $date_to . " is equal " . $get_total ."</h4><br></div><div class='clearfix'></div>";
                 
                 } ?>

                

                  <div class="alert alert-light dawood_alert" role="alert">
                      <h4 class="alert-heading"> Enter specific dates below to get your orders report</h4>
                      
                      <div class="row d-block mt-5">

                        <div class="col-xs-12 pl-4">

                            <form role="form" method="post" id="editPrpfilesForm">

                                <div class="row mb-3">
                                  <div class="col-2">
                                    <label for="date_from" class="form-label">Date From: </label>
                                  </div>
                                  <div class="col-4">
                                    <input type="date" class="form-control" name="date_from" id="date_from" placeholder="Date From">
                                  </div>
                                </div>
                                
                                <div class="row mb-3">
                                  <div class="col-2">
                                      <label for="date_to" class="form-label">Date To: </label>
                                  </div>
                                  <div class="col-4">
                                    <input type="date" class="form-control" name="date_to" id="date_to" placeholder="Date To">
                                  </div>
                                </div>
                                

                              <input type="submit" name="GetTotal" class="btn btn-info btn-lg " value="Submit" style="margin:15px auto;">

                            </form>



                        </div>

                      </div>
                    </div>
                  

                
              </div>
            </div>
        </div>
    </div>
</div>

    
<?php 

}