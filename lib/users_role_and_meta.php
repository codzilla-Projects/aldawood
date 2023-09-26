<?php


/**************************************
******** Add new User role  ********
**************************************/


function ui_new_role() {  
 
    //add the new user role
    add_role(
        'customer',
        'Customer',
        array(
            'read'         => true,
            'delete_posts' => false
        )
    );
 
}
add_action('admin_init', 'ui_new_role');


/*************

** Add Meta Fields To Roles

*************/

add_action( 'show_user_profile', 'extra_user_profile_fields' );

add_action( 'edit_user_profile', 'extra_user_profile_fields' );

add_action( "user_new_form", "extra_user_profile_fields" );



function extra_user_profile_fields( $user ) { 

	?>


<div class="all_roles" id="customer">
    <h3><?php _e("Extra information", "blank"); ?></h3>
    <table class="form-table ha_trainee_meta">

        <tr>

            <th><label for="user_phone"><?php _e("Phone"); ?></label></th>

            <td>

                <input type="text" name="user_phone" id="user_phone" value="<?php echo esc_attr( get_user_meta( $user->ID , 'user_phone', true ) ); ?>" class="regular-text" /><br />

                <span class="description"><?php _e("Please enter your phone."); ?></span>

            </td>

        </tr>

        <tr>

            <th><label for="user_address"><?php _e("Address"); ?></label></th>

            <td>

                <input type="text" name="user_address" id="user_address" value="<?php echo esc_attr( get_user_meta( $user->ID , 'user_address', true ) ); ?>" class="regular-text" /><br />

                <span class="description"><?php _e("Please enter your address."); ?></span>

                <input type="text" name="user_cart" id="user_cart" hidden value="<?php echo esc_attr( get_user_meta( $user->ID , 'user_cart', true ) ); ?>" class="regular-text" /><br />
                
                <input type="text" name="user_google_id" id="user_googl_eid" hidden value="<?php echo esc_attr( get_user_meta( $user->ID , 'user_google_id', true ) ); ?>" class="regular-text" /><br />
                
                <input type="text" name="google_profilePic" id="google_profilePic" hidden value="<?php echo esc_attr( get_user_meta( $user->ID , 'google_profilePic', true ) ); ?>" class="regular-text" /><br />
                <input type="text" name="user_token" id="user_token" hidden value="<?php echo esc_attr( get_user_meta( $user->ID , 'user_token', true ) ); ?>" class="regular-text" /><br />
            </td>

        </tr>


    </table>
</div>

<?php	

}
function dawood_specific_user_data($user_id){

	$user_data = get_userdata($user_id);
	return $user_data;
}

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );

add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

	$user = dawood_specific_user_data($user_id);


    if($_POST['user_phone'] != ""){

		update_user_meta( $user_id, 'user_phone', $_POST['user_phone'] );

	} 
    
    if($_POST['user_address'] != ""){

		update_user_meta( $user_id, 'user_address', $_POST['user_address'] );

	} 
    
    if($_POST['user_cart'] != ""){

		update_user_meta( $user_id, 'user_cart', $_POST['user_cart'] );

	} 
    if($_POST['user_google_id'] != ""){

		update_user_meta( $user_id, 'user_google_id', $_POST['user_google_id'] );

	}

    if($_POST['google_profilePic'] != ""){

		update_user_meta( $user_id, 'google_profilePic', $_POST['google_profilePic'] );

	}
    
    if($_POST['user_token'] != ""){

		update_user_meta( $user_id, 'user_token', $_POST['user_token'] );

	}

    
    
}