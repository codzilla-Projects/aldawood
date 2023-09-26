<!-- main body - start
================================================== -->
<main>
  <!-- breadcrumb_section - start
  ================================================== -->
  <section class="breadcrumb_section text-uppercase" style="background-image: url(<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo DAWOOD_URL .'assets/images/breadcrumb/bg-page-title.jpg' ;} else{ echo $page_image;}?>);">
    <div class="container">
      <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">Category</h1>
      <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
        <li><a href="<?php bloginfo('url'); ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <div class="breadcrumb_icon_wrap">
      <div class="container">
        <div class="breadcrumb_icon wow fadeInUp" data-wow-delay=".3s">
          <img src="<?= DAWOOD_URL . 'assets/images/feature/icon_01.png';?>" alt="icon_not_found">
          <span class="bg_shape"></span>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb_section - end
  ================================================== -->