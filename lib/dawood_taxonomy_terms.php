<?php

/************************
** create Custom Taxonomies for product post type
************************/
add_action( 'init', 'sabah_custom_tax', 0 );
function sabah_custom_tax() 
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Components', 'taxonomy general name' ),
            'singular_name' => _x( 'Component', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Components','platinum' ),
            'popular_items' => __( 'Popular Components' ,'platinum'),
            'all_items' => __( 'All Components' ),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Component' ), 
            'update_item' => __( 'Update Component' ),
            'add_new_item' => __( 'Add New Component' ),
            'new_item_name' => __( 'New Component' ),
            'separate_items_with_commas' => __( 'Separate Component with commas' ),
            'add_or_remove_items' => __( 'Add or remove Component' ),
            'choose_from_most_used' => __( 'Choose from the most used Component' ),
            'menu_name' => __( 'Components' ),
          ),
          'tax_name' => 'components',
          'post_types' =>  array('product'),
          'slug' => 'components'          
        ),
        array(
          'labels' => array(
            'name' => _x( 'Extras', 'taxonomy general name' ),
            'singular_name' => _x( 'Extras', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Extras','platinum' ),
            'popular_items' => __( 'Popular Extras' ,'platinum'),
            'all_items' => __( 'All Extras' ),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Extras' ), 
            'update_item' => __( 'Update Extras' ),
            'add_new_item' => __( 'Add New Extras' ),
            'new_item_name' => __( 'New Product Extras' ),
            'separate_items_with_commas' => __( 'Separate Extras with commas' ),
            'add_or_remove_items' => __( 'Add or remove Extras' ),
            'choose_from_most_used' => __( 'Choose from the most used Extras' ),
            'menu_name' => __( 'Extras' ),
          ),
          'tax_name' => 'product-extras',
          'post_types' =>  array('product'),
          'slug' => 'product-extras'          
        ),
        array(
          'labels' => array(
            'name' => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Category','platinum' ),
            'popular_items' => __( 'Popular Categories' ,'platinum'),
            'all_items' => __( 'All Categories' ),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Category' ), 
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Product Category' ),
            'separate_items_with_commas' => __( 'Separate Categories with commas' ),
            'add_or_remove_items' => __( 'Add or remove Category' ),
            'choose_from_most_used' => __( 'Choose from the most used Categories' ),
            'menu_name' => __( 'Categories' ),
          ),
          'tax_name' => 'product-category',
          'post_types' =>  array('product'),
          'slug' => 'product-category'          
        ),
        
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}



/*******************************************************
******** Add Type To Product Category Taxonomy************
*********************************************************/

add_action( 'product-category_add_form_fields', 'dawood_category_add_term_fields' );

function dawood_category_add_term_fields( $taxonomy ) {

	echo '<div class="form-field">
	<label for="product_category_type">Type</label>
	 <select name="product_category_type" id="product_category_type">
        <option value="cafe" >Cafe</option>
        <option value="nuts">Nuts</option>
    </select>
	<p>Enter a value for this field</p>
	</div>';

}

add_action( 'product-category_edit_form_fields', 'dawood_category_edit_term_fields', 10, 2 );

function dawood_category_edit_term_fields( $term, $taxonomy ) {

	$value = get_term_meta( $term->term_id, 'product_category_type', true );
	
	echo '<tr class="form-field">
	<th>
		<label for="product_category_type">Type</label>
	</th>
	<td>
        <select name="product_category_type" id="product_category_type">
            
            <option selected disabled hidden>Please select</option>
            <option value="cafe" '. selected( $value, 'cafe' ) .'>Cafe</option>
            <option value="nuts" '. selected( $value, 'nuts' ) .'>Nuts</option>
            </select>
		<p class="description">Enter a value for this field.</p>
	</td>
	</tr>';

}
add_action( 'created_product-category', 'dawood_category_save_term_fields' );
add_action( 'edited_product-category', 'dawood_category_save_term_fields' );

function dawood_category_save_term_fields( $term_id ) {

	update_term_meta(
		$term_id,
		'product_category_type',
		sanitize_text_field( $_POST[ 'product_category_type' ] )
	);

}


/*******************************************************
******** Add Show in home To Product Category Taxonomy************
*********************************************************/

add_action( 'product-category_add_form_fields', 'dawood_category_add_show_inhome' );

function dawood_category_add_show_inhome( $taxonomy ) {

    echo'<div class="form-group row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="category_show_inhome">Show In Application home screen: </label>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <input type="checkbox" name="category_show_inhome" value="1" >
                        <p >Show in home apllication screen : (If yes check this)</p><br>
                    </div>
                </div>
            </div>
        </div>';

}

add_action( 'product-category_edit_form_fields', 'dawood_category_edit_show_inhome', 10, 2 );

function dawood_category_edit_show_inhome( $term, $taxonomy ) {

	$value = get_term_meta( $term->term_id, 'category_show_inhome', true );
	
	echo '<tr class="form-field">
	<th>
		<label for="product_category_type">Type</label>
	</th>
	<td>
        <input type="checkbox" name="category_show_inhome" value="1" ';
       if( $value == '1' ){echo "checked";}
    echo '>
		<p class="description">Show in home screen : (If yes check this)</p>
	</td>
	</tr>';

}
add_action( 'created_product-category', 'dawood_category_save_show_inhome' );
add_action( 'edited_product-category', 'dawood_category_save_show_inhome' );

function dawood_category_save_show_inhome( $term_id ) {

	update_term_meta(
		$term_id,
		'category_show_inhome',
		sanitize_text_field( $_POST[ 'category_show_inhome' ] )
	);

}

/**********************************************************
******** Add Arabic Name To Categories Taxonomy************
***********************************************************/

// Add term page
function dawood_categories_add_arabic_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[product_category_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label>
		<input type="text" name="term_meta[product_category_ar_name]" id="term_meta[product_category_ar_name]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
	</div>
<?php
}
add_action( 'product-category_add_form_fields', 'dawood_categories_add_arabic_meta_field', 10, 2 );


// Edit term page
function dawood_categories_edit_arabic_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[product_category_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[product_category_ar_name]" id="term_meta[product_category_ar_name]" value="<?php echo esc_attr( $term_meta['product_category_ar_name'] ) ? esc_attr( $term_meta['product_category_ar_name'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product-category_edit_form_fields', 'dawood_categories_edit_arabic_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_product_category_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_product-category', 'save_product_category_custom_meta', 10, 2 );  
add_action( 'create_product-category', 'save_product_category_custom_meta', 10, 2 );

/* Add Image Upload to Series Taxonomy */

// Add Upload fields to "Add New Taxonomy" form
function add_series_image_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="series_image"><?php _e( 'Series Image:', 'dawood' ); ?></label>
		<input type="text" name="series_image[image]" id="series_image[image]" class="series-image" value="<?php echo $seriesimage; ?>">
		<input class="upload_image_button button" name="_add_series_image" id="_add_series_image" type="button" value="Select/Upload Image" />
		<script>
			jQuery(document).ready(function() {
				jQuery('#_add_series_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('.series-image').val(attachment.url);
					}
					wp.media.editor.open(this);
					return false;
				});
			});
		</script>
	</div>
<?php
}
add_action( 'product-category_add_form_fields', 'add_series_image_field', 10, 2 );

// Add Upload fields to "Edit Taxonomy" form
function journey_series_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "category_$t_id" ); ?>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="_series_image"><?php _e( 'Series Image', 'journey' ); ?></label></th>
		<td>
			<?php
				$seriesimage = esc_attr( $term_meta['image'] ) ? esc_attr( $term_meta['image'] ) : ''; 
				?>
			<input type="text" name="series_image[image]" id="series_image[image]" class="series-image" value="<?php echo $seriesimage; ?>">
			<input class="upload_image_button button" name="_series_image" id="_series_image" type="button" value="Select/Upload Image" />
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"></th>
		<td style="height: 150px;">
			<style>
				div.img-wrap img {
					width: 450px;
					height: 300px;
				}
			</style>
			<div class="img-wrap">
				<img src="<?php echo $seriesimage; ?>" id="series-img">
			</div>
			<script>
			jQuery(document).ready(function() {
				jQuery('#_series_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('#series-img').attr("src",attachment.url)
						jQuery('.series-image').val(attachment.url)
					}
					wp.media.editor.open(this);
					return false;
				});
			});
			</script>
		</td>
	</tr>
<?php
}
add_action( 'product-category_edit_form_fields', 'journey_series_edit_meta_field', 10, 2 );

// Save Taxonomy Image fields callback function.
function save_series_custom_meta( $term_id ) {
	if ( isset( $_POST['series_image'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "category_$t_id" );
		$cat_keys = array_keys( $_POST['series_image'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['series_image'][$key] ) ) {
				$term_meta[$key] = $_POST['series_image'][$key];
			}
		}
		// Save the option array.
		update_option( "category_$t_id", $term_meta );
	}
}  
add_action( 'edited_product-category', 'save_series_custom_meta', 10, 2 );  
add_action( 'create_product-category', 'save_series_custom_meta', 10, 2 );
/************************************************
******** Add Price To Extras Taxonomy************
************************************************/

// Add term page
function dawood_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[product_extras_price]"><?php _e( 'Price', 'dawood' ); ?></label>
		<input type="number" name="term_meta[product_extras_price]" id="term_meta[product_extras_price]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
	</div>
<?php
}
add_action( 'product-extras_add_form_fields', 'dawood_taxonomy_add_new_meta_field', 10, 2 );


// Edit term page
function dawood_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[product_extras_price]"><?php _e( 'Price', 'dawood' ); ?></label></th>
		<td>
			<input type="number" name="term_meta[product_extras_price]" id="term_meta[product_extras_price]" value="<?php echo esc_attr( $term_meta['product_extras_price'] ) ? esc_attr( $term_meta['product_extras_price'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product-extras_edit_form_fields', 'dawood_taxonomy_edit_meta_field', 10, 2 );


/************************************************
******** Add Arabic Name To Extras Taxonomy************
************************************************/

// Add term page
function dawood_extra_add_arabic_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[product_extras_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label>
		<input type="text" name="term_meta[product_extras_ar_name]" id="term_meta[product_extras_ar_name]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
	</div>
<?php
}
add_action( 'product-extras_add_form_fields', 'dawood_extra_add_arabic_meta_field', 10, 2 );


// Edit term page
function dawood_extra_edit_arabic_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[product_extras_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[product_extras_ar_name]" id="term_meta[product_extras_ar_name]" value="<?php echo esc_attr( $term_meta['product_extras_ar_name'] ) ? esc_attr( $term_meta['product_extras_ar_name'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product-extras_edit_form_fields', 'dawood_extra_edit_arabic_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_product-extras', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_product-extras', 'save_taxonomy_custom_meta', 10, 2 );


/***************************************************
******** Add Arabic Name To Components Taxonomy*****
****************************************************/

// Add term page
function dawood_components_add_arabic_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[product_component_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label>
		<input type="text" name="term_meta[product_component_ar_name]" id="term_meta[product_component_ar_name]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
	</div>
<?php
}
add_action( 'components_add_form_fields', 'dawood_components_add_arabic_meta_field', 10, 2 );


// Edit term page
function dawood_components_edit_arabic_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[product_component_ar_name]"><?php _e( 'Arabic Name', 'dawood' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[product_component_ar_name]" id="term_meta[product_component_ar_name]" value="<?php echo esc_attr( $term_meta['product_component_ar_name'] ) ? esc_attr( $term_meta['product_component_ar_name'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','dawood' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'components_edit_form_fields', 'dawood_components_edit_arabic_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_components_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_components', 'save_components_custom_meta', 10, 2 );  
add_action( 'create_components', 'save_components_custom_meta', 10, 2 );