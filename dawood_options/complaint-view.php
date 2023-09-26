<?php 

function complaint_view_content_area_callback(){

     global $wpdb;

    $complaint_id = $_GET['id'];
	$complaints = $wpdb->get_results( 
	$wpdb->prepare("SELECT * FROM `wp_complaints` WHERE id=%d" ,$complaint_id) 
	);	
	foreach ($complaints as $complaint) {
		$single_complaint = $complaint;
	}
    
    if( isset( $_POST['Editcomplaint'] ) && !empty( $_POST['Editcomplaint'] ) ){

      if(!empty($_POST['content'])){

       
        $table_name = "wp_complaints";
        $complaint_update = $wpdb->update(
        $table_name,
        array(
        'status'=>"closed",
        'reply'=>$_POST['content'],
        'replier_id' => wp_get_current_user()->ID,
        'reply_date'  => date('d-m-y h:i:s'),
        ),
        array('id' => $complaint_id)
        );


      }else{

        $complaint_update = 0;

      }

    }
    
?>



<div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Complaint Data</span></h1>
              </div>
              <div class="card-body">
                 <!-- Content Wrapper. Contains page content -->


                <?php if( isset($complaint_update) && ($complaint_update == 0) ) : ?>
                    <div class="alert alert-danger margin-top text-center col-md-6 col-md-offset-3"><h4>Where is the reply ?</h4></div>
                    <div class="clearfix"></div>
                <?php endif; ?>

                <?php if( isset($complaint_update) && ($complaint_update == 1) ){ 
                  echo "<div class='alert alert-success margin-top text-center col-md-6 col-md-offset-3'><h4>Reply has been sent successfully.</h4><br></div><div class='clearfix'></div>";
                  echo "<script type='text/javascript'>window.setTimeout(function(){window.location.href = '".get_bloginfo( 'url')."/wp-admin/admin.php?page=complaints-area';}, 200);</script>";
                 } ?>

                  <div class="box ">

                    <div class="box-header with-border">
                        
                      <h3>

                        Complaint By: <?php echo get_userdata($single_complaint->user_id)->display_name; ?>

                      </h3>
                      <p class="pull-right"><?php echo date("F j, Y, g:i a" , strtotime($single_complaint->date_added) ); ?></p>

                    </div>

                    <div class="box-body pl-3">

                      <div class="row">

                        <div class="col-xs-12">

                            <?php  echo stripslashes($single_complaint->complaint); ?>

                        </div>

                      </div>

                    </div>

                    <!-- /.box-body -->

                  </div>

                  <!-- /.box -->    
                  
                  <?php if($single_complaint->status == 'open') { ?>

                  <div class="box">

                    <div class="box-header with-border">

                      <h3 class="box-title"><?php echo "Reply to the complaint "; ?></h3>

                    </div>

                    <div class="box-body">

                      <div class="row">

                        <div class="col-xs-12">

                            <form role="form" method="post" id="editPrpfilesForm">

                               <textarea name="content" rows="8" cols="96"></textarea><br>         

                              <input type="hidden" name="complaint_id" value="<?php echo $single_complaint->id; ?>">

                              <input type="submit" name="Editcomplaint" class="btn btn-info btn-lg " value="Reply" style="margin:15px auto;display:block;">

                            </form>



                        </div>

                      </div>

                    </div>

                    <!-- /.box-body -->

                  </div>

                  <!-- /.box -->

                <?php }else{ ?>

                  <div class="box">

                    <div class="box-header with-border">

                      <h3 class="box-title"><?php echo "Complaint Reply"; ?></h3>

                      <p class="pull-right"><?php echo date("F j, Y, g:i a" , strtotime($single_complaint->reply_date) ); ?></p>

                    </div>


                    <div class="box-body">

                      <div class="row">

                        <div class="col-xs-12">
                          <?php if( isset($_GET['edit']) &&  ($_GET['edit'] == 1) ) : ?>
                            <form role="form" method="post" id="editPrpfilesForm">

                               
                             <textarea name="content" rows="8" cols="96"><?php echo $single_complaint->reply; ?></textarea><br>
                   
                              <input type="hidden" name="complaint_id" value="<?php echo $single_complaint->id; ?>">

                              <input type="submit" name="Editcomplaint" class="btn btn-info btn-lg " value="Update" style="margin:15px auto;display:block;">

                            </form>
                          <?php else: ?>
                             <?php  echo stripslashes($single_complaint->reply); ?>
                          <?php endif; ?>
                        </div>

                      </div>

                    </div>

                    <!-- /.box-body -->

                  </div>

                  <!-- /.box -->

      <?php } ?>


                
              </div>
            </div>
        </div>
    </div>
</div>

    
<?php 

}