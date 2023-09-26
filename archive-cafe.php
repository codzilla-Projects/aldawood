<?php 
/**
** Template Name: Cafe Template
**/
get_header(); 
get_template_part('page_title');
?>

<!-- shop_section - start
================================================== -->

<section class="shop_section sec_ptb_120 bg_gray">
    <?php
    $cafe = dawood_get_product_cafe();
    if($cafe->have_posts()) :  
?>
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
        <?php
        while($cafe->have_posts()) : $cafe->the_post(); 
        $post_id = get_the_ID();
        $likes = get_post_meta( $cafe->post_ID, "dawood_product_type", true); 
    ?>
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
        <?php    
            $args = array(
               'format'             => '?paged=%#%',
               'current'            => max( 1, get_query_var('paged') ),
               'total'              => $cafe->max_num_pages,
               'show_all'           => false,
               'end_size'           => 1,
               'mid_size'           => 2,
               'prev_next'          => true,
               'next_text'          => '<i class="fal fa-angle-double-right"></i>',
               'prev_text'          => '<i class="fal fa-angle-double-left"></i>',
               'type'               => 'list',
              );
        ?>
        <?php echo paginate_links($args); ?>
  </div>
  <?php wp_reset_query(); endif ?>
</section>
<!-- shop_section - end
================================================== -->

</main>
<!-- main body - end
================================================== -->
<?php get_footer(); ?>