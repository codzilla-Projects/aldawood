<?php 
/*********************************

Add Meta Box To Product

**********************************/

function dawood_add_product_data_meta() {

    add_meta_box( "all_pricing", "Pricing" , "dawood_product_pricing_data_callback", array('product'), "normal" );
    add_meta_box( "product_extra_ardata", "Additional Data" , "dawood_product_ardata_callback", array('product'), "normal" );
    add_meta_box( "product_best_seller", "Product Is" , "dawood_product_side_callback", array('product'), "side" );
}

add_action( 'add_meta_boxes', 'dawood_add_product_data_meta' );

/* Display the post meta box. */
function dawood_product_side_callback( $object, $box ) { 
    $product_featured = get_post_meta( $object->ID, 'dawood_product_featured', true );
    $product_best_seller = get_post_meta( $object->ID, 'dawood_product_best_seller', true );
?>
    <div class="form-group">
        <input type="checkbox" name="dawood_product_featured" value="1" <?= $product_featured == '1' ?'checked': ''; ?> >
        <label >Featured : (If yes check this)</label>
    </div> 
    <br>
    <div class="form-group">
        <input type="checkbox" name="dawood_product_best_seller" value="1" <?= $product_best_seller == '1' ?'checked': ''; ?> >
        <label >Best Seller : (If yes check this)</label>
    </div>
<?php
}
function dawood_product_ardata_callback( $object, $box ) { 
    $product_stock_status    = get_post_meta( $object->ID, 'product_stock_status', true );
    $dawood_product_type     = get_post_meta( $object->ID, 'dawood_product_type', true );
    $dawood_pricing_type     = get_post_meta( $object->ID, 'dawood_pricing_type', true );
    $dawood_product_ar_name  = get_post_meta( $object->ID, 'dawood_product_ar_name', true );
    $dawood_product_ar_desc  = get_post_meta( $object->ID, 'dawood_product_ar_desc', true );
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    
    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="dawood_product_ar_name"><?php _e('Arabic Name: ','dawood'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text"  name="dawood_product_ar_name" class="form-control w-100" value="<?php echo $dawood_product_ar_name; ?>"><br>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="dawood_product_ar_desc"><?php _e('Arabic Description: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <textarea name="dawood_product_ar_desc" rows="8" cols="96"><?php echo $dawood_product_ar_desc; ?></textarea><br>
                    </div>
                </div>
            </div>
    </div>
    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="product_stock_status"><?php _e('Stock Status: ','dawood'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="product_stock_status" id="product_stock_status">
                        <?php if(empty($product_stock_status)) : ?>
                          <option disabled hidden><?php esc_attr_e( 'Please select' ); ?></option>
                        <?php endif; ?>
                      <option value="1" selected <?php selected( $product_stock_status, '1' ); ?>>In Stock</option>
                      <option value="0" <?php selected( $product_stock_status, '0' ); ?>>Out of Stock</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="dawood_product_type"><?php _e('Product Type: ','dawood'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="dawood_product_type" id="dawood_product_type">
                        <?php if(empty($dawood_product_type)) : ?>
                          <option disabled hidden><?php esc_attr_e( 'Please select' ); ?></option>
                        <?php endif; ?>
                      <option value="0" selected <?php selected( $dawood_product_type, '0' ); ?>>Cafe</option>
                      <option value="1" <?php selected( $dawood_product_type, '1' ); ?>>Nuts</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="dawood_pricing_type"><?php _e('Pricing Type: ','dawood'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="dawood_pricing_type" id="pricing_type">
                      <option value="doubleSingle" selected <?php selected( $dawood_pricing_type, 'doubleSingle' ); ?>>Single / Double</option>
                      <option value="classicFlavor" <?php selected( $dawood_pricing_type, 'classicFlavor' ); ?>>Classic / Flavor</option>
                      <option value="mediumLarge" <?php selected( $dawood_pricing_type, 'mediumLarge' ); ?>>Medium / Large</option>
                      <option value="kilogramPricing" <?php selected( $dawood_pricing_type, 'kilogramPricing' ); ?>>Kilogram</option>
                      <option value="cupConoKg" <?php selected( $dawood_pricing_type, 'cupConoKg' ); ?>>Cup / Cono / Kg</option>
                      <option value="oneSizePricing" <?php selected( $dawood_pricing_type, 'oneSizePricing' ); ?>>One Size</option>
                      <option value="quarterEighth" <?php selected( $dawood_pricing_type, 'quarterEighth' ); ?>>Quarter / Eighth</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>



<?php

}

function dawood_product_pricing_data_callback( $object, $box ) { 
    $kilogram_price  = get_post_meta( $object->ID, 'kilogram_price', true );
    $kilogram_sale_price  = get_post_meta( $object->ID, 'kilogram_sale_price', true );
    
    $medium_price  = get_post_meta( $object->ID, 'medium_price', true );
    $medium_sale_price  = get_post_meta( $object->ID, 'medium_sale_price', true );
    $large_price  = get_post_meta( $object->ID, 'large_price', true );
    $large_sale_price  = get_post_meta( $object->ID, 'large_sale_price', true );
    
    $single_price  = get_post_meta( $object->ID, 'single_price', true );
    $single_sale_price  = get_post_meta( $object->ID, 'single_sale_price', true );
    $double_price  = get_post_meta( $object->ID, 'double_price', true );
    $double_sale_price  = get_post_meta( $object->ID, 'double_sale_price', true );
   
    $classic_price  = get_post_meta( $object->ID, 'classic_price', true );
    $classic_sale_price = get_post_meta( $object->ID, 'classic_sale_price', true );
    $flavor_price  = get_post_meta( $object->ID, 'flavor_price', true );
    $flavor_sale_price  = get_post_meta( $object->ID, 'flavor_sale_price', true );
    $cup_price  = get_post_meta( $object->ID, 'cup_price', true );
    $cup_sale_price = get_post_meta( $object->ID, 'cup_sale_price', true );
    $cono_price  = get_post_meta( $object->ID, 'cono_price', true );
    $cono_sale_price  = get_post_meta( $object->ID, 'cono_sale_price', true );
    $kg_price  = get_post_meta( $object->ID, 'kg_price', true );
    $kg_sale_price  = get_post_meta( $object->ID, 'kg_sale_price', true );
    
    $onesize_price  = get_post_meta( $object->ID, 'onesize_price', true );
    $onesize_sale_price  = get_post_meta( $object->ID, 'onesize_sale_price', true );
   
    $quarter_price  = get_post_meta( $object->ID, 'quarter_price', true );
    $quarter_sale_price = get_post_meta( $object->ID, 'quarter_sale_price', true );
    $eighth_price  = get_post_meta( $object->ID, 'eighth_price', true );
    $eighth_sale_price  = get_post_meta( $object->ID, 'eighth_sale_price', true );
   
   
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    

    <div id="doubleSingle" class="all_pricing">
        
        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="single_price"><?php _e('Single Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="single_price" class="form-control w-100" value="<?php echo $single_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="single_sale_price"><?php _e('Single Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="single_sale_price" class="form-control w-100" value="<?php echo $single_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="double_price"><?php _e('Double Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="double_price" class="form-control w-100" value="<?php echo $double_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="double_sale_price"><?php _e('Double Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="double_sale_price" class="form-control w-100" value="<?php echo $double_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="classicFlavor" class="all_pricing">
    
        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="classic_price"><?php _e('Classic Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="classic_price" class="form-control w-100" value="<?php echo $classic_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="classic_sale_price"><?php _e('Classic Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="classic_sale_price" class="form-control w-100" value="<?php echo $classic_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="flavor_price"><?php _e('Flavor Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="flavor_price" class="form-control w-100" value="<?php echo $flavor_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="flavor_sale_price"><?php _e('Flavor Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="flavor_sale_price" class="form-control w-100" value="<?php echo $flavor_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="mediumLarge" class="all_pricing">

        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="medium_price"><?php _e('Medium Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="medium_price" class="form-control w-100" value="<?php echo $medium_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="medium_sale_price"><?php _e('Medium Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="medium_sale_price" class="form-control w-100" value="<?php echo $medium_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="large_price"><?php _e('Large Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="large_price" class="form-control w-100" value="<?php echo $large_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="large_sale_price"><?php _e('Large Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="large_sale_price" class="form-control w-100" value="<?php echo $large_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div id="kilogramPricing" class="all_pricing">
        
        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="kilogram_price"><?php _e('Kilogram Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="kilogram_price" class="form-control w-100" value="<?php echo $kilogram_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="kilogram_sale_price"><?php _e('Kilogram Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="kilogram_sale_price" class="form-control w-100" value="<?php echo $kilogram_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
 
    <div id="cupConoKg" class="all_pricing" >

        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="cup_price"><?php _e('Cup Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="cup_price" class="form-control w-100" value="<?php echo $cup_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="cup_sale_price"><?php _e('Cup Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="cup_sale_price" class="form-control w-100" value="<?php echo $cup_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="cono_price"><?php _e('Cono Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="cono_price" class="form-control w-100" value="<?php echo $cono_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="cono_sale_price"><?php _e('Cono Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="cono_sale_price" class="form-control w-100" value="<?php echo $cono_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="kg_price"><?php _e('Kg Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="kg_price" class="form-control w-100" value="<?php echo $kg_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="kg_sale_price"><?php _e('Kg Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="kg_sale_price" class="form-control w-100" value="<?php echo $kg_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
 

    <div id="oneSizePricing" class="all_pricing">
        
        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="onesize_price"><?php _e('One Size Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="onesize_price" class="form-control w-100" value="<?php echo $onesize_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="onesize_sale_price"><?php _e('One Size Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="onesize_sale_price" class="form-control w-100" value="<?php echo $onesize_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div id="quarterEighth" class="all_pricing">
        
        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="quarter_price"><?php _e('One quarter Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="quarter_price" class="form-control w-100" value="<?php echo $quarter_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="quarter_sale_price"><?php _e('One quarter Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="quarter_sale_price" class="form-control w-100" value="<?php echo $quarter_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="eighth_price"><?php _e('One eighth Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="eighth_price" class="form-control w-100" value="<?php echo $eighth_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <label for="eighth_sale_price"><?php _e('One eighth Sale Price: ','dawood'); ?></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="number"  name="eighth_sale_price" class="form-control w-100" value="<?php echo $eighth_sale_price; ?>"><br>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
   
<?php

}

add_action( 'save_post', 'dawood_save_custom_meta', 10, 2 );

function dawood_save_custom_meta($post_id){


    if( isset($_POST['dawood_product_featured']) ){

        update_post_meta($post_id, 'dawood_product_featured', $_POST['dawood_product_featured']);

    }else

        delete_post_meta($post_id,'dawood_product_featured');
    
    
    if( isset($_POST['dawood_product_best_seller']) ){

        update_post_meta($post_id, 'dawood_product_best_seller', $_POST['dawood_product_best_seller']);

    }else

        delete_post_meta($post_id,'dawood_product_best_seller');
    
    
    if( isset($_POST['dawood_product_type']) ){

        update_post_meta($post_id, 'dawood_product_type', $_POST['dawood_product_type']);

    }else

        delete_post_meta($post_id,'dawood_product_type');
    
    
    if( isset($_POST['medium_price']) ){

        update_post_meta($post_id, 'medium_price', $_POST['medium_price']);

    }else

        delete_post_meta($post_id,'medium_price');
    
    
    if( isset($_POST['medium_sale_price']) ){

        update_post_meta($post_id, 'medium_sale_price', $_POST['medium_sale_price']);

    }else

        delete_post_meta($post_id,'medium_sale_price');
    
   
    
    if( isset($_POST['large_price']) ){

        update_post_meta($post_id, 'large_price', $_POST['large_price']);

    }else

        delete_post_meta($post_id,'large_price');
    
   
    
    if( isset($_POST['large_sale_price']) ){

        update_post_meta($post_id, 'large_sale_price', $_POST['large_sale_price']);

    }else

        delete_post_meta($post_id,'large_sale_price');
       
    
    if( isset($_POST['dawood_product_ar_name']) ){

        update_post_meta($post_id, 'dawood_product_ar_name', $_POST['dawood_product_ar_name']);

    }else

        delete_post_meta($post_id,'dawood_product_ar_name');
       
    
    if( isset($_POST['dawood_product_ar_desc']) ){

        update_post_meta($post_id, 'dawood_product_ar_desc', $_POST['dawood_product_ar_desc']);

    }

    else

        delete_post_meta($post_id,'dawood_product_ar_desc');
    
    
    if( isset($_POST['kilogram_price']) ){

        update_post_meta($post_id, 'kilogram_price', $_POST['kilogram_price']);

    }else

        delete_post_meta($post_id,'kilogram_price');
    
    
    if( isset($_POST['kilogram_sale_price']) ){

        update_post_meta($post_id, 'kilogram_sale_price', $_POST['kilogram_sale_price']);

    }else

        delete_post_meta($post_id,'kilogram_sale_price');
    

    if( isset($_POST['single_price']) ){

        update_post_meta($post_id, 'single_price', $_POST['single_price']);

    }else

        delete_post_meta($post_id,'single_price');
    

    
    if( isset($_POST['single_sale_price']) ){

        update_post_meta($post_id, 'single_sale_price', $_POST['single_sale_price']);

    }else

        delete_post_meta($post_id,'single_sale_price');
    

    
    if( isset($_POST['double_price']) ){

        update_post_meta($post_id, 'double_price', $_POST['double_price']);

    }else

        delete_post_meta($post_id,'double_price');
    

    
    if( isset($_POST['double_sale_price']) ){

        update_post_meta($post_id, 'double_sale_price', $_POST['double_sale_price']);

    }else

        delete_post_meta($post_id,'double_sale_price');
    
   
    if( isset($_POST['classic_price']) ){

        update_post_meta($post_id, 'classic_price', $_POST['classic_price']);

    }else

        delete_post_meta($post_id,'classic_price');
    

    if( isset($_POST['classic_sale_price']) ){

        update_post_meta($post_id, 'classic_sale_price', $_POST['classic_sale_price']);

    }else

        delete_post_meta($post_id,'classic_sale_price');
    

    if( isset($_POST['flavor_price']) ){

        update_post_meta($post_id, 'flavor_price', $_POST['flavor_price']);

    }else

        delete_post_meta($post_id,'flavor_price');
    

    if( isset($_POST['flavor_sale_price']) ){

        update_post_meta($post_id, 'flavor_sale_price', $_POST['flavor_sale_price']);

    }else

        delete_post_meta($post_id,'flavor_sale_price');

    if( isset($_POST['cup_price']) ){

        update_post_meta($post_id, 'cup_price', $_POST['cup_price']);

    }else

        delete_post_meta($post_id,'cup_price');
    
    
    if( isset($_POST['cup_sale_price']) ){

        update_post_meta($post_id, 'cup_sale_price', $_POST['cup_sale_price']);

    }else

        delete_post_meta($post_id,'cup_sale_price');
    
    
    if( isset($_POST['cono_price']) ){

        update_post_meta($post_id, 'cono_price', $_POST['cono_price']);

    }else

        delete_post_meta($post_id,'cono_price');
    
    
    
    if( isset($_POST['cono_sale_price']) ){

        update_post_meta($post_id, 'cono_sale_price', $_POST['cono_sale_price']);

    }else

        delete_post_meta($post_id,'cono_sale_price');
    
    
    if( isset($_POST['kg_price']) ){

        update_post_meta($post_id, 'kg_price', $_POST['kg_price']);

    }else

        delete_post_meta($post_id,'kg_price');
    
    
    if( isset($_POST['kg_sale_price']) ){

        update_post_meta($post_id, 'kg_sale_price', $_POST['kg_sale_price']);

    }else

        delete_post_meta($post_id,'kg_sale_price');
    
    
    if( isset($_POST['onesize_price']) ){

        update_post_meta($post_id, 'onesize_price', $_POST['onesize_price']);

    }else

        delete_post_meta($post_id,'onesize_price');
    
    
    
    if( isset($_POST['onesize_sale_price']) ){

        update_post_meta($post_id, 'onesize_sale_price', $_POST['onesize_sale_price']);

    }else

        delete_post_meta($post_id,'onesize_sale_price');
    
  
    if( isset($_POST['dawood_pricing_type']) ){

        update_post_meta($post_id, 'dawood_pricing_type', $_POST['dawood_pricing_type']);

    }else

        delete_post_meta($post_id,'dawood_pricing_type');
    
  
    if( isset($_POST['product_stock_status']) ){

        update_post_meta($post_id, 'product_stock_status', $_POST['product_stock_status']);

    }else

        delete_post_meta($post_id,'product_stock_status');
    

    if( isset($_POST['quarter_price']) ){

        update_post_meta($post_id, 'quarter_price', $_POST['quarter_price']);

    }else

        delete_post_meta($post_id,'quarter_price');
    
    if( isset($_POST['quarter_sale_price']) ){

            update_post_meta($post_id, 'quarter_sale_price', $_POST['quarter_sale_price']);

        }else

            delete_post_meta($post_id,'quarter_sale_price');

    if( isset($_POST['eighth_price']) ){

            update_post_meta($post_id, 'eighth_price', $_POST['eighth_price']);

        }else

            delete_post_meta($post_id,'eighth_price');

    if( isset($_POST['eighth_sale_price']) ){

            update_post_meta($post_id, 'eighth_sale_price', $_POST['eighth_sale_price']);

        }else

            delete_post_meta($post_id,'eighth_sale_price');



}


