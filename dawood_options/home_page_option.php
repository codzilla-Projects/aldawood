<?php 

function home_page_area_callback(){

	$wp_editor_settings = array( 

		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue

		'textarea_rows'=> 2

	);    

	if( isset( $_POST['dawood_save'] ) && !empty( $_POST['dawood_save']) ){

		foreach ($_POST as $key => $value) {

			if(in_array($key,['video_content','footer_content'])){

				$value = stripcslashes($value);

			}				

			update_option( $key, $value);

		}

	}

?>

<div  class="container-fluid  padding-left-4">

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12 bg-col12">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<h1 class="text-center cl-title"><span>Home Page Options</span></h1>
			</header>
		</div>
			<br/>
			<div class="col-sm-3 col-md-3 col-lg-3  pl-0">

			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<a class="nav-link   active" id="v-pills-firstsection-tab" data-toggle="pill" href="#v-pills-firstsection" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">Video Section</a>

				<a class="nav-link  " id="v-pills-secondsection-tab" data-toggle="pill" href="#v-pills-secondsection" role="tab" aria-controls="v-pills-secondsection" aria-selected="false">Footer </a>

			</div>

		</div>
		<div class="col-sm-9 col-md-9 col-lg-9 gray_back pl-0">

	  		<form class="form-horizontal" method="post" action="#">

			    <div class="tab-content" id="v-pills-tabContent">

			        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">

						<div class="form-group">
						  <label for="dawood_video_link" class="col-sm-12 control-label text-white">Dawood Video Link</label>
						  <div class="col-sm-12  ">
							<input type="text" class="form-control  " id="dawood_video_link" name="dawood_video_link" value="<?php echo get_option('dawood_video_link'); ?>">
							</div>
						</div>

						<div class="form-group">
						  <label for="dawood_video_img" class="col-sm-12 control-label text-white">Dawood Video Background Image</label>
						  <div class="col-sm-12  ">
						    <input class="dawood_video_img_url dawood_half w-full" type="text" name="dawood_video_img" size="60" value="<?php echo get_option('dawood_video_img'); ?>">
						    <a href="#" class="dawood_video_img_upload btn btn-info">Choose </a>
						    <img  class="dawood_video_img rounded img-fluid" src="<?php echo get_option('dawood_video_img'); ?>" height="100" style="max-width:15%" />
						  </div>
						</div>

						<div class="form-group">
							<label for="video_title" class="col-sm-12   control-label   text-white">Title</label>
							<div class="col-sm-12  ">
								<input type="tel" class="form-control  " id="video_title" name="video_title" value="<?php echo get_option('video_title'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="video_content" class="col-sm-12 control-label text-white">Content</label>
							<div class="col-sm-12">

		                        <?php wp_editor( get_option('video_content'), 'video_content',  array('textarea_rows'=>5,'textarea_name'=> 'video_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'video_content','class'=>'form-control text-right',) );  ?>
							</div>
						</div>

						<div class="form-group">
						  <label for="dawood_video_img_right" class="col-sm-12 control-label text-white">Dawood Video right Image</label>
						  <div class="col-sm-12  ">
						    <input class="dawood_video_img_right_url dawood_half w-full" type="text" name="dawood_video_img_right" size="60" value="<?php echo get_option('dawood_video_img_right'); ?>">
						    <a href="#" class="dawood_video_img_right_upload btn btn-info">Choose </a>
						    <img  class="dawood_video_img_right rounded img-fluid" src="<?php echo get_option('dawood_video_img_right'); ?>" height="100" style="max-width:15%" />
						  </div>
						</div>

						<div class="form-group">
						  <label for="dawood_video_img_offer" class="col-sm-12 control-label text-white">Dawood Video Offer Image</label>
						  <div class="col-sm-12  ">
						    <input class="dawood_video_img_offer_url dawood_half w-full" type="text" name="dawood_video_img_offer" size="60" value="<?php echo get_option('dawood_video_img_offer'); ?>">
						    <a href="#" class="dawood_video_img_offer_upload btn btn-info">Choose </a>
						    <img  class="dawood_video_img_offer rounded img-fluid" src="<?php echo get_option('dawood_video_img_offer'); ?>" height="100" style="max-width:15%" />
						  </div>
						</div>
					</div>
					<div class="tab-pane fade" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">
						<div class="form-group">
							<label for="footer_content" class="col-sm-12 control-label text-white">Content</label>
							<div class="col-sm-12">

		                        <?php wp_editor( get_option('footer_content'), 'footer_content',  array('textarea_rows'=>5,'textarea_name'=> 'footer_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'footer_content','class'=>'form-control text-right',) );  ?>
							</div>
						</div>
					</div>
					<div class="form-group mt-4">

						<div class="col-sm-12">

							<input type="submit" class="btn btn-default btn-block btn-lg dawood_save_route" name="dawood_save" value="Save Setting ">

						</div>

					</div>
				</div>

			</form>

	 	</div>

	</div>

</div><!-- /container -->

<?php

}