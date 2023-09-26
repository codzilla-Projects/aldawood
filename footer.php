      <!-- footer_section - start
      ================================================== -->
      <footer class="footer_section text-white deco_wrap" style="background-image: url(<?= DAWOOD_URL ?>assets/images/backgrounds/bg-footer.jpg);">
        <div class="overlay"></div>
        <div class="footer_widget_area">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6 col-sm-7">
                <div class="footer_subscribe_form text-center">
                  <h2 class="form_title text-uppercase wow fadeInUp" data-wow-delay=".1s">Coffee Build your Fresh mind</h2>
                  <form action="#">
                    <div class="form_item wow fadeInUp" data-wow-delay=".2s">
                      <input type="email" name="email" placeholder="Enter your email">
                      <button class="btn btn_primary text-uppercase" type="submit">Subscribe Now</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row justify-content-lg-between">
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="footer_widget footer_about wow fadeInUp" data-wow-delay=".1s">
                  <div class="brand_logo">
                    <a class="brand_link" href="index.html">
                      <img src="<?=get_option('dawood_logo_light') ?>" srcset="assets/images/logo/logo_white_2x.png 2x" alt="logo_not_found">
                    </a>
                  </div>

                  <p>
                    <?=get_option('footer_content') ?>
                  </p>

                  <ul class="social_links social_icons ul_li">
                     <?php $facebook = get_option('dawood_fb');  
                        if(!empty($facebook)) :
                    ?>
                    <li><a href="<?= $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php $twitter = get_option('dawood_tw');  
                        if(!empty($twitter)) :
                    ?>
                    <li><a href="<?= $twitter; ?>"><i class="fab fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php $insta = get_option('dawood_insta');  
                        if(!empty($insta)) :
                    ?>
                    <li><a href="<?= $insta; ?>"><i class="fab fa-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php $youtube = get_option('dawood_youtube');  
                        if(!empty($youtube)) :
                    ?>
                    <li><a href="<?= $youtube; ?>"><i class="fab fa-youtube"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="footer_widget footer_recent_post wow fadeInUp" data-wow-delay=".4s">
                  <h3 class="footer_widget_title text-uppercase">Recent News</h3>

                  <div class="recent_post">
                    <a class="item_image" href="blog_details.html">
                      <img src="assets/images/recent_post/1.jpg" alt="image_not_found">
                    </a>
                    <div class="item_content">
                      <h4 class="item_title">
                        <a href="blog_details.html">Best Smell of Americano Coffee Trins</a>
                      </h4>
                      <span class="post_date text-uppercase">December 30 - 2021</span>
                    </div>
                  </div>

                  <div class="recent_post">
                    <a class="item_image" href="blog_details.html">
                      <img src="assets/images/recent_post/2.jpg" alt="image_not_found">
                    </a>
                    <div class="item_content">
                      <h4 class="item_title">
                        <a href="blog_details.html">Best Smell of Americano Coffee Trins</a>
                      </h4>
                      <span class="post_date text-uppercase">December 30 - 2021</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="footer_widget footer_contact wow fadeInUp" data-wow-delay=".2s">
                  <h3 class="footer_widget_title text-uppercase">Contact us</h3>
                  <ul class="ul_li_block">
                    <li><strong class="text-uppercase">Adress:</strong> 
                        al embabi Tanta, 
                        Gharbia Governorate, Egypt
                    </li>
                    <li><strong class="text-uppercase">Mail:</strong> Info@webmail@gmail.com</li>
                    <li><strong class="text-uppercase">Phone:</strong> (20) 1552946663</li>
                    <li><strong class="text-uppercase">Fax id:</strong> +9 659459 49594</li>
                  </ul>
                </div>
              </div>

              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="footer_widget footer_opening_time wow fadeInUp" data-wow-delay=".3s">
                  <h3 class="footer_widget_title text-uppercase">Opening Hours</h3>
                  <ul class="ul_li_block">
                    <li>
                      Monday
                      <span>9:00 - 18:00</span>
                    </li>
                    <li>
                      tuesday
                      <span>10:00 - 18:00</span>
                    </li>
                    <li>
                      wednestday
                      <span>11:00 - 18:00</span>
                    </li>
                    <li>
                      Thusday
                      <span>12:00 - 18:00</span>
                    </li>
                    <li>
                      Friday
                      <span>14:00 - 18:00</span>
                    </li>
                    <li>
                      saterday
                      <span>16:00 - 18:00</span>
                    </li>
                    <li>
                      Sunday
                      <span>closed</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="footer_bottom text-center">
            <p class="copyright_text mb-0 wow fadeInUp" data-wow-delay=".2s">Copyright@ 2021 Desing by <a class="btn_text" href="https://codzilla.net/"> <img src="<?= DAWOOD_URL ?>assets/images/codezilla-line-silver.svg"><span>Codezilla</span></a></p>
          </div>
        </div>
      </footer>
      <!-- footer_section - end
      ================================================== -->

    </div>
    <!-- body_wrap - end -->
    <?php  wp_footer(); ?>
  </body>
</html>
