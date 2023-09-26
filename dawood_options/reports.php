<?php 

function reports_content_area_callback(){
?>
   <div  class="container-fluid  padding-left-4">

	<div class="row">

		 <div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Al Dawood App Reports</span></h1>
              </div>
              <div class="card-body">
                  <a class="btn btn-primary report_btn" href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=orders_report'; ?>" role="button">Get orders total during specific duration</a>
                  <br>
                  <a class="btn btn-primary report_btn" href="<?php echo get_bloginfo('url').'/wp-admin/admin.php?page=users_report'; ?>" role="button">Get most purchased user</a>
              </div>
            </div>
          </div>
        
       </div>
       
    </div>

<?php

}