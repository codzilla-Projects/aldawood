<?php 
 get_header(); ?>

 <!-- main body - start
      ================================================== -->
      <main>

        <!-- slider_section - start
        ================================================== -->
        <section class="slider_section slider_dark" style="background-image: url(<?= DAWOOD_URL ?>assets/images/backgrounds/bg_01.png);">
            <?php 
            $sliders = dawood_get_sliders();
                if($sliders->have_posts()) : 
            ?>
          <div class="main_slider pb-0 wow fadeInUp" data-wow-delay=".1s">
             <?php while($sliders->have_posts()) : $sliders->the_post(); ?>
            <div class="slider_item text-white" style="background-image: url(<?php the_post_thumbnail_url();  ?>);">   
              <div class="container">
                <div class="row justify-content-lg-start justify-content-md-center">
                  <div class="col-lg-6 col-md-8">
                    <h3 class="title_text text-white text-uppercase" data-animation="fadeInUp" data-delay=".2s">
                     <?php the_title(); ?>
                    </h3>
                    <p data-animation="fadeInUp" data-delay=".4s">
                      <?php the_content(); ?>
                    </p>
                    <ul class="btns_group ul_li" data-animation="fadeInUp" data-delay=".6s">
                      <li><a class="btn btn_primary text-uppercase" href="menu.html">testy Coffee</a></li>
                      <li><a class="btn btn_border border_white text-uppercase" href="shop_details.html">Learn more</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="shape_image">
                <img src="<?= DAWOOD_URL ?>assets/images/slider/shape_01.png" alt="image_not_found">
              </div>
            </div>
            <?php endwhile;?> 
          </div>
          <?php wp_reset_query(); endif ?>
          <div class="carousel_nav">
            <button class="main_left_arrow" type="button"><i class="fal fa-arrow-up"></i></button>
            <button class="main_right_arrow" type="button"><i class="fal fa-arrow-down"></i></button>
          </div>
          <div class="slider_social_wrap">
            <div class="container maxw_1560">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 col-md-4 order-last">
                  <?php $video_link = get_option('dawood_video_link');  
                        if(!empty($video_link)) :
                    ?>
                  <a class="popup_video video_btn1 text-uppercase wow fadeInRight" href="<?= $video_link;?>">
                    <span class="pulse"><i class="fas fa-play"></i></span>
                    <small>Play video</small>
                  </a>
                  <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-8">
                  <ul class="social_links social_text ul_li text-uppercase wow fadeInLeft">
                    <?php $facebook = get_option('dawood_fb');  
                        if(!empty($facebook)) :
                    ?>
                    <li><a href="<?= $facebook; ?>"><i class="fab fa-facebook-f"></i> facebook</a></li>
                    <?php endif; ?>
                    <?php $twitter = get_option('dawood_tw');  
                        if(!empty($twitter)) :
                    ?>
                    <li><a href="<?= $twitter; ?>"><i class="fab fa-twitter"></i> twitter</a></li>
                    <?php endif; ?>
                    <?php $insta = get_option('dawood_insta');  
                        if(!empty($insta)) :
                    ?>
                    <li><a href="<?= $insta; ?>"><i class="fab fa-instagram"></i> instagram</a></li>
                    <?php endif; ?>
                    <?php $youtube = get_option('dawood_youtube');  
                        if(!empty($youtube)) :
                    ?>
                    <li><a href="<?= $youtube; ?>"><i class="fab fa-youtube"></i> youtube</a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- slider_section - end
        ================================================== -->

        <!-- about_section - start
        ================================================== -->
        <section class="about_section sec_ptb_120">
          <div class="container">
            <div class="row align-items-center justify-content-lg-between">
              <?php 
                if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); 
                    $post_title = get_the_title();
                ?>
                <div class="col-lg-6 col-md-6 order-last">
                  <div class="about_image1 wow fadeInRight" data-wow-delay=".1s">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="image_not_found">
                  <div class="inner-banner">
                    <div class="item-meta">
                      <div class="innner-meta">
                        <div class="year_content_wrap text-uppercase" style="background-image: url(<?= DAWOOD_URL ?>assets/images/about/bg_01.png);">
                          <div class="content_wrap">
                            <span>10 <small>+ years of</small></span>
                            <strong>experience</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="about_content">
                  <div class="section_title text-uppercase">
                    <h2 class="small_title"><i class="fas fa-coffee"></i> about us</h2>
                    <h3 class="big_title wow fadeInUp" data-wow-delay=".1s">
                      There is all about Eldawood coffee
                    </h3>
                  </div>
                  <?php the_content(); ?>
                </div>
              </div>
              <?php endwhile; endif;?>
            </div>
          </div>
        </section>
        <!-- about_section - end
        ================================================== -->

        <!-- recipe_menu_section - start
        ================================================== -->
        <section class="recipe_menu_section sec_ptb_120 bg_gray deco_wrap">
          <div class="container">
            <div class="section_title text-uppercase text-center">
              <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> Our special Menu</h2>
              <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                Eldawood coffee house
              </h3>
            </div>

            <ul class="filters-button-group ul_li_center wow fadeInUp" data-wow-delay=".3s">
              <li><button class="button text-uppercase active" data-filter="*"><?php _e('All','dawood'); ?></button></li>
               <?php 
                  $terms          = get_terms( array( 
                  'taxonomy'      => 'product-category', 
                  'orderby'       => 'name',
                  'order'         => 'ASC',
                  'hide_empty'    => false, //can be 1, '1' too
                  
                  ) );
                  ?>
                  <?php
                     foreach ( $terms as $term ) {
                        if ($term->count != 0) :
                        ?>
              <li><button class="button text-uppercase" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name;?></button></li>
              <?php endif; ?>
              <?php }?>
            </ul>

            <div class="recipe_item_grid grid wow fadeInUp" data-wow-delay=".4s">
              <?php
                 $args = array(
                    'post_type'       => 'product',
                    'post_status'     => 'publish',
                    'posts_per_page'  => -1,
                    'orderby'         => 'date',
                    'order'           => 'ASC',

                );
                 $items = new WP_Query( $args ); 
                 if($items->have_posts()) {?> 
                  <?php
                    while($items->have_posts()) : $items->the_post(); 
                    $product_price  = get_post_meta(get_the_ID(),'single_price',true);?>
                  <?php $post_terms = get_the_terms(get_the_ID(),'product-category');?>
              <div class="element-item <?php foreach($post_terms as $post_term){echo $post_term->slug. ' '; }?> ramadanitems" data-category="<?php foreach($post_terms as $post_term){echo $post_term->slug. ' '; }?>">
                <div class="recipe_item">
                  <div class="content_col">
                     <div class="entry-image">
                        <a class="item_image " href="<?php the_permalink(); ?>">
                          <img src="<?php the_post_thumbnail_url(); ?>" alt="image_not_found">
                        </a>
                      </div>
                    <div class="item_content">
                      <h3 class="item_title text-uppercase">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <p class="mb-0">
                        <?php the_excerpt(); ?> 
                      </p>
                    </div>
                  </div>
                  <?php
                      if(!empty($product_price)):
                  ?>
                  <div class="content_col">
                    <strong class="item_price">
                      <sub>EGP</sub><?=$product_price ?>
                    </strong>
                  </div>
                  <?php endif; ?>
               </div>
              </div>
              <?php endwhile;?>
                <?php wp_reset_query();}?>
            </div>
          </div>
          <div class="deco_big_text text-uppercase text-center wow fadeInUp" data-wow-delay=".1s">
            ELDAWOOD
          </div>
          <div class="deco_item shape_1">
            <img src="<?= DAWOOD_URL ?>assets/images/menu/shape_01.png" alt="image_not_found">
          </div>
          <div class="deco_item shape_2">
            <img src="<?= DAWOOD_URL ?>assets/images/menu/shape_02.png" alt="image_not_found">
          </div>
        </section>
        <!-- recipe_menu_section - end
        ================================================== -->

        <!-- offer_section - start
        ================================================== -->
        <section class="offer_section">
          <div class="container-fluid p-0">
            <div class="row g-0">
              <div class="col-lg-5">
                <div class="offer_video wow fadeIn" data-wow-delay=".1s">
                  <div class="overlay"></div>
                  <img src="<?= get_option('dawood_video_img');?>" alt="image_not_found">
                  <a class="popup_video video_btn2" href="<?= get_option('dawood_video_link');?>">
                    <span class="pulse"><i class="fas fa-play"></i></span>
                    <small class="text-uppercase">Play Video</small>
                  </a>
                </div>
              </div>

              <div class="col-lg-7">
                <div class="offer_area">
                  <div class="offer_content">
                    <div class="section_title text-uppercase">
                      <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> what we offer</h2>
                      <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                        <?= get_option('video_title');?>
                      </h3>
                    </div>

                    <p class="wow fadeInUp" data-wow-delay=".3s">
                      <?= get_option('video_content');?>
                    </p>
                  </div>
                </div>

                <div class="row g-0">
                  <div class="offerinfo_col col-lg-6">
                    <div class="offer_info_item table_reservation_contact text-uppercase wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                      <h3 class="offer_info_title text-center">Eldawood Coffee</h3>
                          <img src="<?= DAWOOD_URL ?>assets/images/eldawood-logo-coffee.png">
                          <a class="btn btn_secondary text-uppercase w-100" href="<?=DAWOOD_URL?>/cafe">Eldawood Coffee</a>
                    </div>
                  </div>

                  <div class="offerinfo_col col-lg-6">
                    <div class="offer_info_item opening_time text-uppercase text-white wow fadeInUp" data-wow-delay=".2s" style="background-image: url(<?= DAWOOD_URL ?>assets/images/offer/bg_01.png);">
                      <h3 class="offer_info_title text-white text-center">Eldawood Nuts</h3>
                          <img src="<?= DAWOOD_URL ?>assets/images/logo--nuts.png">
                          <a class="btn btn_secondary text-uppercase w-100" href="<?=DAWOOD_URL?>/nuts">Eldawood Nuts</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- offer_section - end
        ================================================== -->

        <!-- testimonial_section - start
        ================================================== -->
        <!-- <section class="testimonial_section sec_ptb_120 deco_wrap" style="background-image: url(assets/images/backgrounds/bg_02.png);">
          <div class="container">
            <div class="testimonial_slider wow fadeInUp" data-wow-delay=".2s">
              <div class="testimonial_item_1 slider_item">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="item_image">
                      <img src="<?= DAWOOD_URL ?>assets/images/testimonial/test1.png" alt="image_not_found">
                      <div class="quote_icon">
                        <img src="<?= DAWOOD_URL ?>assets/images/testimonial/icon_01.png" alt="image_not_found">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item_content">
                      <div class="section_title text-uppercase">
                        <h3 class="small_title"><i class="fas fa-coffee"></i> Client Testimonial</h3>
                        <h4 class="big_title">
                          Our client say something about Eldawood
                        </h4>
                      </div>
                      <p>
                        Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatuey.
                      </p>
                      <div class="testimonial_admin text-uppercase">
                        <h5 class="admin_name">rasalina De Willamson</h5>
                        <span class="admin_title">Founder & CO</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="testimonial_item_1 slider_item">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="item_image">
                      <img src="<?= DAWOOD_URL ?>assets/images/testimonial/test1.png" alt="image_not_found">
                      <div class="quote_icon">
                        <img src="<?= DAWOOD_URL ?>assets/images/testimonial/icon_01.png" alt="image_not_found">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item_content">
                      <div class="section_title text-uppercase">
                        <h3 class="small_title"><i class="fas fa-coffee"></i> Client Testimonial</h3>
                        <h4 class="big_title">
                          Our client say something about Eldawood
                        </h4>
                      </div>
                      <p>
                        Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatuey.
                      </p>
                      <div class="testimonial_admin text-uppercase">
                        <h5 class="admin_name">rasalina De Willamson</h5>
                        <span class="admin_title">Founder & CO</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="testimonial_item_1 slider_item">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="item_image">
                      <img src="<?= DAWOOD_URL ?>assets/images/testimonial/test1.png" alt="image_not_found">
                      <div class="quote_icon">
                        <img src="<?= DAWOOD_URL ?>assets/images/testimonial/icon_01.png" alt="image_not_found">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item_content">
                      <div class="section_title text-uppercase">
                        <h3 class="small_title"><i class="fas fa-coffee"></i> Client Testimonial</h3>
                        <h4 class="big_title">
                          Our client say something about Eldawood
                        </h4>
                      </div>
                      <p>
                        Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatuey.
                      </p>
                      <div class="testimonial_admin text-uppercase">
                        <h5 class="admin_name">rasalina De Willamson</h5>
                        <span class="admin_title">Founder & CO</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="testimonial_item_1 slider_item">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="item_image">
                      <img src="<?= DAWOOD_URL ?>assets/images/testimonial/test1.png" alt="image_not_found">
                      <div class="quote_icon">
                        <img src="<?= DAWOOD_URL ?>assets/images/testimonial/icon_01.png" alt="image_not_found">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="item_content">
                      <div class="section_title text-uppercase">
                        <h3 class="small_title"><i class="fas fa-coffee"></i> Client Testimonial</h3>
                        <h4 class="big_title">
                          Our client say something about Eldawood
                        </h4>
                      </div>
                      <p>
                        Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatuey.
                      </p>
                      <div class="testimonial_admin text-uppercase">
                        <h5 class="admin_name">rasalina De Willamson</h5>
                        <span class="admin_title">Founder & CO</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="deco_item thumbnail_1 wow fadeInUp" data-wow-delay=".1s">
            <img src="<?= DAWOOD_URL ?>assets/images/testimonial/logo.png" alt="image_not_found">
          </div>
          <div class="deco_item thumbnail_2 wow fadeInUp" data-wow-delay=".2s">
            <img src="<?= DAWOOD_URL ?>assets/images/testimonial/logo.png" alt="image_not_found">
          </div>
          <div class="deco_item thumbnail_3 wow fadeInUp" data-wow-delay=".3s">
            <img src="<?= DAWOOD_URL ?>assets/images/testimonial/logo.png" alt="image_not_found">
          </div>
          <div class="deco_item thumbnail_4 wow fadeInUp" data-wow-delay=".4s">
            <img src="<?= DAWOOD_URL ?>assets/images/testimonial/logo.png" alt="image_not_found">
          </div>
        </section> -->
        <!-- testimonial_section - end
        ================================================== -->

        <!-- shop_section - start
        ================================================== -->
        <section class="shop_section sec_ptb_120 bg_gray">
          <div class="container">
            <div class="section_title text-uppercase">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                  <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> special online shop</h2>
                  <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                    Our popular product
                  </h3>
                </div>

                <div class="col-lg-6 col-md-4">
                  <div class="abtn_wrap text-lg-end text-md-end wow fadeInUp" data-wow-delay=".3s">
                    <a class="btn btn_border border_black" href="shop.html">See all product</a>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            $products = dawood_get_products();
                if($products->have_posts()) : 
            ?>
            <div class="row justify-content-center">
              <?php while($products->have_posts()) : $products->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="shop_card wow fadeInUp" data-wow-delay=".1s">
                  <a class="item_image" href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="image_not_found">
                  </a>
                  <div class="item_content">
                    <h3 class="item_title text-uppercase">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                  </div>
                </div>
              </div>
              <?php endwhile;?> 
            </div>
            <?php wp_reset_query(); endif ?>
          </div>
        </section>
        <!-- shop_section - end
        ================================================== -->

        <!-- blog_section - start
        ================================================== -->
        <!-- <section class="blog_section sec_ptb_120" style="background-image: url(assets/images/backgrounds/bg_03.png);">
          <div class="container">

            <div class="section_title text-uppercase text-center">
              <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> News & Blog</h2>
              <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">Latest news & Blog</h3>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog_grid wow fadeInUp" data-wow-delay=".1s">
                  <div class="post_date bg_default_brown text-uppercase">5,jan</div>
                  <a class="item_image" href="blog_details.html">
                    <img src="<?= DAWOOD_URL ?>assets/images/blog/1.jpg" alt="image_not_found">
                  </a>
                  <div class="item_content">
                    <h3 class="item_title text-uppercase">
                      <a href="blog_details.html">Americano Spacial Coffee</a>
                    </h3>
                    <p>
                      The coffee is brewed by  first roasting the green coffee beans over hot coals in a brazier.Once the beans are roasted each participant is given...
                    </p>
                    <a class="btn_text text-uppercase" href="blog_details.html"><span>Read More</span> <i class="far fa-angle-double-right"></i></a>
                    <ul class="post_meta ul_li">
                      <li><a href="#!"><i class="fal fa-user"></i> Rasalina De</a></li>
                      <li><a href="#!"><i class="fal fa-heart"></i> 36 like</a></li>
                      <li><a href="#!"><i class="fal fa-comment-alt"></i> 8 comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog_grid wow fadeInUp" data-wow-delay=".2s">
                  <div class="post_date bg_default_brown text-uppercase">5,jan</div>
                  <a class="item_image" href="blog_details.html">
                    <img src="<?= DAWOOD_URL ?>assets/images/blog/2.jpg" alt="image_not_found">
                  </a>
                  <div class="item_content">
                    <h3 class="item_title text-uppercase">
                      <a href="blog_details.html">Americano Spacial Coffee</a>
                    </h3>
                    <p>
                      The coffee is brewed by  first roasting the green coffee beans over hot coals in a brazier.Once the beans are roasted each participant is given...
                    </p>
                    <a class="btn_text text-uppercase" href="blog_details.html"><span>Read More</span> <i class="far fa-angle-double-right"></i></a>
                    <ul class="post_meta ul_li">
                      <li><a href="#!"><i class="fal fa-user"></i> Rasalina De</a></li>
                      <li><a href="#!"><i class="fal fa-heart"></i> 36 like</a></li>
                      <li><a href="#!"><i class="fal fa-comment-alt"></i> 8 comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog_grid wow fadeInUp" data-wow-delay=".3s">
                  <div class="post_date bg_default_brown text-uppercase">5,jan</div>
                  <a class="item_image" href="blog_details.html">
                    <img src="<?= DAWOOD_URL ?>assets/images/blog/3.jpg" alt="image_not_found">
                  </a>
                  <div class="item_content">
                    <h3 class="item_title text-uppercase">
                      <a href="blog_details.html">Americano Spacial Coffee</a>
                    </h3>
                    <p>
                      The coffee is brewed by  first roasting the green coffee beans over hot coals in a brazier.Once the beans are roasted each participant is given...
                    </p>
                    <a class="btn_text text-uppercase" href="blog_details.html"><span>Read More</span> <i class="far fa-angle-double-right"></i></a>
                    <ul class="post_meta ul_li">
                      <li><a href="#!"><i class="fal fa-user"></i> Rasalina De</a></li>
                      <li><a href="#!"><i class="fal fa-heart"></i> 36 like</a></li>
                      <li><a href="#!"><i class="fal fa-comment-alt"></i> 8 comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="load_more text-center wow fadeInUp" data-wow-delay=".4s">
              <a class="btn btn_border border_black text-uppercase" href="#!">See all Blog</a>
            </div>

          </div>
        </section> -->
        <!-- blog_section - end
        ================================================== -->

      </main>
      <!-- main body - end
      ================================================== -->
 <?php get_footer(); ?>