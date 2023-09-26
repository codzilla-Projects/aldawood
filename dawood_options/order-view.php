<?php 

function order_view_content_area_callback(){

     global $wpdb;

    $order_id = $_GET['id'];
	$orders = $wpdb->get_results( 
	$wpdb->prepare("SELECT * FROM `wp_orders` WHERE id=%d" ,$order_id) 
	);
    
	foreach ($orders as $order) {
		$single_order = $order;
	}
//    var_dump($single_order);die();
    $order_status =  $single_order->order_status;
    if( isset( $_POST['Editorder'] ) && !empty( $_POST['Editorder'] ) ){

      if(!empty($_POST['order_status'])){

       
        $table_name = "wp_orders";
        $order_update = $wpdb->update(
        $table_name,
        array(
        'order_status'=>$_POST['order_status'],
        ),
        array('id' => $order_id)
        );


      }else{

        $order_update = 0;

      }

    }
    
?>



<div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 ">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center"><span>Order Details</span></h1>
              </div>
              <div class="card-body">
                 <!-- Content Wrapper. Contains page content -->


                <?php if( isset($order_update) && ($order_update == 1) ){ 
                  echo "<div class='alert alert-success margin-top text-center col-md-6 col-md-offset-3'><h4>Order status updated successfully.</h4><br></div><div class='clearfix'></div>";
                  echo "<div class='clearfix'></div>";
        
                  echo "<script type='text/javascript'>window.setTimeout(function(){window.location.href = '".get_bloginfo( 'url')."/wp-admin/admin.php?page=order_view&id=".$order->id.";'}, 500);</script>";
                 } ?>

                  
                  <div class="alert alert-light dawood_alert" role="alert">
                      <h4 class="alert-heading"> Order By: <?php echo get_userdata($single_order->user_id)->display_name; ?></h4>
                      <p class="pull-right"><?php echo date("F j, Y, g:i a" , strtotime($single_order->created_at) ); ?></p>
                      <form role="form" method="post" id="editPrpfilesForm">
                                   
                        <div class="row mb-3">
                          <label for="colFormLabel" class="col-sm-2 col-form-label">Order Status : </label>
                          <div class="col-sm-3">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="order_status">
                              <option value="processing" selected <?php selected( $order_status, 'processing' ); ?>>Processing</option>
                              <option value="delivering" <?php selected( $order_status, 'delivering' ); ?>>Delivering</option>
                              <option value="completed" <?php selected( $order_status, 'completed' ); ?>>Completed</option>
                              <option value="cancelled" <?php selected( $order_status, 'cancelled' ); ?>>Cancelled</option>
                              <option value="refunded" <?php selected( $order_status, 'refunded' ); ?>>Refunded</option>
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <input type="hidden" name="complaint_id" value="<?php echo $single_order->id; ?>">
                             <input type="submit" name="Editorder" class="btn btn-primary" value="Update" >
                          </div>
                            
                        </div>                             

                     </form>
                      
                  </div>
                  <?php  $orders_meta = $wpdb->get_results( 
                            $wpdb->prepare("SELECT * FROM `wp_order_meta` WHERE order_id=%d" ,$order_id) 
                            );	
                  $i = 1;
                  foreach ($orders_meta as $order_meta){
                      
                      $product_id = $order_meta->product_id;

                      $product = get_post($product_id);
                      $post_type = $product->post_type;
                       
                      
                      ?>
                      <div class="alert alert-light dawood_alert" role="alert">
                          <h4 class="alert-heading"> Product no <?= $i;?> Details</h4>

                            <div class="row">
                              <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Product name : </label>

                              </div>
                              <div class="col-sm-3">
                                  <p class="pull-right order_details"><?php echo $product->post_title; ?></p>

                              </div>
                                <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Type : </label>

                              </div>
                              <div class="col-sm-3">
                                  <p class="pull-right order_details"><?php echo $order_meta->type; ?></p>

                              </div>
                          </div>
                          
                          <div class="row">
                              <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Price : </label>

                              </div>
                              <div class="col-sm-3">
                                  <p class="pull-right order_details"><?php echo $order_meta->price; ?></p>

                              </div>
                              <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Sale price : </label>

                              </div>
                              <div class="col-sm-3">
                                  <p class="pull-right order_details"><?php echo $order_meta->sale_price; ?></p>

                              </div>
                          </div>
                            

                         
                          <?php $extras = unserialize($order_meta->extras);
                           foreach($extras as $extra):
                                $extra_values = get_object_vars($extra);
                      
                                foreach($extra_values as $extra_id => $price){
                                    $term = get_term_by( 'id', $extra_id, 'product-extras' );
                                   ?>
                                    <div class="row ">
                                      <div class="col-sm-3">
                                        <label for="colFormLabel" class="col-form-label">Extra : </label>

                                      </div>
                                      <div class="col-sm-3">
                                          <p class="pull-right order_details"><?php echo $term->name; ?></p>

                                      </div>
                                      <div class="col-sm-3">
                                        <label for="colFormLabel" class="col-form-label">Price : </label>

                                      </div>
                                      <div class="col-sm-3">
                                          <p class="pull-right order_details"><?php echo $price; ?></p>

                                      </div>

                                   </div> 
                                    
                                
                              
                               
                           <?php }

                            endforeach;
                            $components = unserialize($order_meta->components);
//                      var_dump($components);die();
                            foreach($components as $component):
                                $component_values = get_object_vars($component);
                                if($order_meta->type == 'kilogram'){
                                    foreach($component_values as $key => $comp_value){
                                       ?>
                                        <div class="row ">
                                          <div class="col-sm-3">
                                            <label for="colFormLabel" class="col-form-label">Weight : </label>

                                          </div>
                                          <div class="col-sm-3">
                                              <p class="pull-right order_details"><?php echo $comp_value; ?> gm</p>

                                          </div>


                                       </div> 

                                    <?php }
                                    
                                }else{
                                    foreach($component_values as $parent_id => $child_id){
                                        $comp_term = get_term_by( 'id', $child_id, 'components' );
                                       ?>
                                        <div class="row ">
                                          <div class="col-sm-3">
                                            <label for="colFormLabel" class="col-form-label">Component : </label>

                                          </div>
                                          <div class="col-sm-3">
                                              <p class="pull-right order_details"><?php echo $comp_term->name; ?></p>

                                          </div>


                                       </div> 

                                    <?php }
                                    
                                }
                                

                            endforeach;
                          ?>

                           <div class="row ">
                              <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Quantity : </label>

                              </div>
                              <div class="col-sm-3">
                                  <p class="pull-right order_details"><?php echo $order_meta->quantity; ?></p>

                              </div>

                           </div> 
                           <div class="row ">
                              <div class="col-sm-3">
                                <label for="colFormLabel" class="col-form-label">Total Price : </label>

                              </div>
                              <div class="col-sm-7">
                                  <p class="pull-right order_details"><?php echo $order_meta->total_price; ?></p>

                              </div>

                           </div>

                      </div>
                   <?php
                   $i++;
                   }?>
                  
                  <div class="alert alert-light dawood_alert" role="alert">
                      <h4 class="alert-heading"> Order final details</h4>
                                   
                        <div class="row ">
                          <div class="col-sm-3">
                            <label for="colFormLabel" class="col-form-label">Order Total Money : </label>
                            
                          </div>
                          <div class="col-sm-2">
                              <p class="pull-right order_details"><?php echo $single_order->total; ?></p>
                            
                          </div>
                      </div>
                      <div class="row ">
                          <div class="col-sm-3">
                            <label for="colFormLabel" class="col-form-label">Phone : </label>
                            
                          </div>
                          <div class="col-sm-4">
                              <p class="pull-right order_details"><?php echo $single_order->phone; ?></p>
                            
                          </div>
                      </div>
                      <div class="row ">
                          <div class="col-sm-3">
                            <label for="colFormLabel" class="col-form-label">Address : </label>
                            
                          </div>
                          <div class="col-sm-7">
                              <p class="pull-right order_details"><?php echo $single_order->address; ?></p>
                            
                          </div>
                         
                            
                       </div>     
                      <div class="row ">
                          <div class="col-sm-2">
                            <label for="colFormLabel" class="col-form-label">Comments : </label>
                            
                          </div>
                          <div class="col-sm-7">
                              <p class="pull-right order_details"><?php echo $single_order->comments; ?></p>
                            
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