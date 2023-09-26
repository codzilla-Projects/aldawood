<?php 

function reviews_content_area_callback(){
?>
    <div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Orders Reviews</span></h1>
              </div>
              <div class="card-body">
                <table id='reviewsTable' class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">User</th>
                      <th scope="col">Order ID</th>
                      <th scope="col">Review</th>
                      <th scope="col">Stars</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
			
		</div>
        <br/>
        
    </div>
</div>


<?php

}