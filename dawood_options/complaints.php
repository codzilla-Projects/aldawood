<?php 

function complaints_content_area_callback(){
    ?>
<div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Complaints Data</span></h1>
              </div>
              <div class="card-body">
                <table id='compTable' class='display dataTable' >
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">User</th>
                      <th scope="col">Compaint</th>
                      <th scope="col">Status</th>
                      <th scope="col">Reply</th>
                      <th scope="col">View</th>
                      <th scope="col">Add Reply</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                   
                </table>
              </div>
            </div>
			
		</div>
        <br/>
        
    </div>
</div>

<?php

}