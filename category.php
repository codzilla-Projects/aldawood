<?php 
    get_header();
?> 
<?php 
    $category = get_category( get_query_var( 'cat' ) );
    $cat_id   = $category->cat_ID;
    $services = dawood_get_product_cat($cat_id);
    if($services->have_posts()) :
 ?>
 <?php                                                   
    while($services->have_posts()) : $services->the_post(); 
    $service_title = get_the_title();
?>
<?=$service_title; ?>
<?php endwhile; ?>  

<?php     
    $args = array(
       'format'             => '?paged=%#%',
       'current'            => max( 1, get_query_var('paged') ),
       'total'              => $services->max_num_pages,
       'show_all'           => false,
       'end_size'           => 1,
       'mid_size'           => 2,
       'prev_next'          => true,
       'next_text'          => '»',
       'prev_text'          => '«',
       'type'               => 'list',
   );
?>

<?php echo paginate_links($args); ?>
<?php wp_reset_query(); ?>
<?php endif ?>
<?php 
    get_footer();
?> 