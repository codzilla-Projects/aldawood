<!DOCTYPE html>
<html>
<head>
	<title>
		<?php is_front_page() ? bloginfo('name') : wp_title(''); ?>
	</title>
	<meta charset="<?php bloginfo('charset') ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="email" content="" />
    <meta name="website" content="" />
    <meta name="Version" content="" />
    <link rel="shortcut icon" href="assets/images/logo/favourite_icon.png">
    
    	<?php wp_head(); ?>
</head>
  <body>

    <!-- body_wrap - start -->
    <div class="body_wrap">

      <!-- backtotop - start -->
      <div class="backtotop">
        <a href="#" class="scroll">
          <i class="far fa-arrow-up"></i>
          <i class="far fa-arrow-up"></i>
        </a>
      </div>
      <!-- backtotop - end -->

      <!-- preloader - start -->
      <div id="preloader" class="cms-loader" style="display: block;">
        <div class="spanned">
          <div class="coffee_cup"></div>
        </div>
      </div>
      <!-- preloader - end -->

      <!-- header_section - start
      ================================================== -->
      <header class="header_section">
        <div class="content_wrap">
          <div class="container maxw_1560">
            <div class="row align-items-center">

              <div class="col-lg-2 col-md-6 col-6">
                <div class="brand_logo">
                  <a class="brand_link" href="index.html">
                    <img src="<?=get_option('dawood_logo_dark'); ?>" srcset="<?=get_option('dawood_logo_dark'); ?> 2x" alt="logo_not_found">
                  </a>
                </div>
              </div>

              <div class="col-lg-10 col-md-6 col-6">
                <nav class="main_menu navbar navbar-expand-lg">
                  <button class="mobile_menu_btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fal fa-bars"></i></span>
                  </button>
                  <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                    <?php dawood_menu(); ?>
                  </div>

                  <ul class="header_btns_group ul_li_right">
                    <li>
                      <button type="button" class="main_search_btn" data-bs-toggle="collapse" data-bs-target="#main_search_collapse" aria-expanded="false" aria-controls="main_search_collapse">
                        <i class="fal fa-search"></i>
                      </button>
                    </li>
                    <li>
                      <a class="btn btn_primary text-uppercase" href="contact.html">Contact Us</a>
                    </li>
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>

        <!-- collapse search - start -->
        <div class="main_search_collapse collapse" id="main_search_collapse">
          <div class="main_search_form card">
            <div class="container maxw_1560">
              <form action="#">
                <div class="form_item">
                  <input type="search" name="search" placeholder="Search here...">
                  <button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- collapse search - end -->
      </header>
      <!-- header_section - end
      ================================================== -->