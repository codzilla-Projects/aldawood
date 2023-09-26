<?php 
    get_header();
    get_template_part('page_title');
?> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); 
    $post_title = get_the_title();
?> 

        <!-- shop_section - start
        ================================================== -->
        <section class="shop_section sec_ptb_120 bg_gray">
          <div class="container">
            <div class="section_title text-uppercase">
              <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                  <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> special online shop</h2>
                  <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                    Our popular product
                  </h3>
                </div>
              </div>
            </div>

            <div class="row justify-content-center">
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
            </div>
            <ul class="pagination_nav ul_li_center">
              <li><a href="#!"><i class="fal fa-angle-double-left"></i></a></li>
              <li class="active"><a href="#!">1</a></li>
              <li><a href="#!">2</a></li>
              <li><a href="#!">3</a></li>
              <li><a href="#!"><i class="fal fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </section>
        <!-- shop_section - end
        ================================================== -->

      </main>
      <!-- main body - end
      ================================================== -->
<?php endwhile; endif;?>
<?php 
    get_footer();
?> 