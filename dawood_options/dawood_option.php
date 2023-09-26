<?php 

function main_content_area_callback(){

	$wp_editor_settings = array( 

		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue

		'textarea_rows'=> 2

	);    

	if( isset( $_POST['dawood_save'] ) && !empty( $_POST['dawood_save']) ){

		foreach ($_POST as $key => $value) {

			if(in_array($key,['footer_about_us_content'])){

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
				<h1 class="text-center cl-title"><span>Theme Options</span></h1>
			</header>
		</div>
			<br/>
		<div class="col-sm-3 col-md-3 col-lg-3  pl-0">

			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<a class="nav-link   active" id="v-pills-firstsection-tab" data-toggle="pill" href="#v-pills-firstsection" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">Logo</a>

				<a class="nav-link  " id="v-pills-secondsection-tab" data-toggle="pill" href="#v-pills-secondsection" role="tab" aria-controls="v-pills-secondsection" aria-selected="false">Contact Us </a>

				<a class="nav-link  " id="v-pills-thirdsection-tab" data-toggle="pill" href="#v-pills-thirdsection" role="tab" aria-controls="v-pills-thirdsection" aria-selected="false">Social Media </a>


			</div>

		</div>

		<div class="col-sm-9 col-md-9 col-lg-9 gray_back pl-0">

	  		<form class="form-horizontal" method="post" action="#">

			    <div class="tab-content" id="v-pills-tabContent">

			        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">

						<div class="form-group">

						  <label for="dawood_website_logo" class="col-sm-12   control-label   text-white">Logo Dark</label>

						  <div class="col-sm-12  ">

						    <input class="first_img_url dawood_half" type="text" name="dawood_logo_dark" size="60" value="<?php echo get_option('dawood_logo_dark'); ?>">

						    <a href="#" class="first_img_upload btn btn-info">Choose </a>

						    <img  class="first_img rounded img-fluid" src="<?php echo get_option('dawood_logo_dark'); ?>" height="100" style="max-width:50%" />

						  </div>

						</div>
                        <div  class="form-group">

						  <label for="dawood_website_logo" class="col-sm-12   control-label   text-white">Logo Light</label>

						  <div class="col-sm-12  ">

						    <input class="second_img_url dawood_half" type="text" name="dawood_logo_light" size="60" value="<?php echo get_option('dawood_logo_light'); ?>">

						    <a href="#" class="second_img_upload btn btn-info">Choose </a>

						    <img  class="second_img rounded img-fluid" src="<?php echo get_option('dawood_logo_light'); ?>" height="100" style="max-width:50%" />

						  </div>

						</div>
                        
                        <div  class="form-group">

						  <label for="dawood_website_logo" class="col-sm-12   control-label   text-white">Favicon</label>

						  <div class="col-sm-12  ">

						    <input class="third_img_url dawood_half" type="text" name="dawood_favicon" size="60" value="<?php echo get_option('dawood_favicon'); ?>">

						    <a href="#" class="third_img_upload btn btn-info">Choose </a>

						    <img  class="third_img rounded img-fluid" src="<?php echo get_option('dawood_favicon'); ?>" height="100" style="max-width:50%" />

						  </div>

						</div>
			        </div>

			        <div class="tab-pane fade" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">

						<div class="form-group">

							<label for="dawood_phone" class="col-sm-12   control-label   text-white">Phone 1</label>

							<div class="col-sm-12  ">

								<input type="tel" class="form-control  " id="dawood_phone" name="dawood_phone" value="<?php echo get_option('dawood_phone'); ?>">

							</div>

						</div>
                        
                        <div class="form-group">

							<label for="dawood_whatsapp" class="col-sm-12   control-label   text-white">Whatsapp</label>

							<div class="col-sm-12  ">

								<input type="number" class="form-control  " id="dawood_whatsapp" name="dawood_whatsapp" value="<?php echo get_option('dawood_whatsapp'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="dawood_email" class="col-sm-12   control-label   text-white">Email </label>

							<div class="col-sm-12  ">

								<input type="email" class="form-control  " id="dawood_email" name="dawood_email" value="<?php echo get_option('dawood_email'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="dawood_location" class="col-sm-12   control-label   text-white">Address </label>

							<div class="col-sm-12  ">

								<input type="location" class="form-control  " id="dawood_location" name="dawood_location" value="<?php echo get_option('dawood_location'); ?>">

							</div>

						</div>

				    </div>	      

					<div class="tab-pane fade" id="v-pills-thirdsection" role="tabpanel" aria-labelledby="v-pills-thirdsection-tab">

						<div class="form-group">

							<label for="dawood_fb" class="col-sm-12   control-label   text-white">Facebook </label>

							<div class="col-sm-12  ">

								<input type="text" class="form-control  " id="dawood_fb" name="dawood_fb" value="<?php echo get_option('dawood_fb'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="dawood_tw" class="col-sm-12   control-label   text-white">Facebook </label>

							<div class="col-sm-12  ">

								<input type="text" class="form-control  " id="dawood_tw" name="dawood_tw" value="<?php echo get_option('dawood_tw'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="dawood_insta" class="col-sm-12   control-label   text-white">Instagram</label>

							<div class="col-sm-12  ">

								<input type="text" class="form-control  " id="dawood_insta" name="dawood_insta" value="<?php echo get_option('dawood_insta'); ?>">

							</div>

						</div>

						<div class="form-group">

							<label for="dawood_youtube" class="col-sm-12   control-label   text-white">Youtube</label>

							<div class="col-sm-12  ">

								<input type="text" class="form-control  " id="dawood_youtube" name="dawood_youtube" value="<?php echo get_option('dawood_youtube'); ?>">

							</div>

						</div>

<!--
						<div class="form-group">

							<label for="dawood_youtube" class="col-sm-12   control-label   text-white">Youtube </label>

							<div class="col-sm-12  ">

								<input type="text" class="form-control  " id="dawood_youtube" name="dawood_youtube" value="<?php //echo get_option('dawood_youtube'); ?>">

							</div>

						</div>
-->

					</div>

				

			    </div>

				<div class="form-group mt-4">

					<div class="col-sm-12">

					<input type="submit" class="btn btn-default btn-block btn-lg dawood_save_route" name="dawood_save" value="Save Setting ">

					</div>

				</div>

			</form>

	 	</div>

	</div>

</div><!-- /container -->

<?php

}