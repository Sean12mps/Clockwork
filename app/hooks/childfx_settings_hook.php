<?php 

add_filter( 'calibrefx_theme_settings_defaults', 'codename_theme_settings_default', $priority = 10, $accepted_args = 1 );
function codename_theme_settings_default($default_arr = array()){
    $codename_default=array(
    );

    return array_merge($default_arr, $codename_default);
}

add_action( 'calibrefx_theme_settings_meta_section', 'codename_meta_sections' );
function codename_meta_sections(){
    global $calibrefx_target_form;
    
    // calibrefx_add_meta_section('design', __('Design Settings', 'calibrefx'), $calibrefx_target_form,10);
}

add_action( 'calibrefx_theme_settings_meta_box', 'codename_meta_boxes' );
function codename_meta_boxes(){
    global $calibrefx;
  
    //calibrefx_add_meta_box('design', 'basic', 'codemaniac-custom-logo', __('Custom Logo & Favicon', 'calibrefx'), 'codename_custom_logo', $calibrefx->theme_settings->pagehook, 'main', 'low');
}


//Below is the sample
/*
function codemaniac_custom_logo(){
    $logo = esc_attr(calibrefx_get_option('custom_logo'));
    $logo_id = esc_attr(calibrefx_get_option('custom_logo_id'));
?>
    <div class="controls">
        <p><label for="custom_logo"><strong>Custom Logo</strong></label></p>
        <input type="text" name="calibrefx-settings[custom_logo]" id="custom_logo" value="<?php echo $logo; ?>" class="uploaded-input image_url" />
        <input type="hidden" name="calibrefx-settings[custom_logo_id]" class="image_id" value="<?php echo $logo_id; ?>" />
        <div class="upload_button_div">
            <span class="button image_upload_button image_upload" id="upload_custom_logo">Upload Image</span>
            <span class="button image_reset_button hide image_reset" id="reset_custom_logo">Remove</span>
            <div class="clear"></div>
        </div>
        <?php if(empty($logo)){ ?>
        <div class="preview_image image_preview" id="preview_logo"></div>
        <?php }else{ ?>
         <div class="preview_image image_preview" id="preview_logo"><img src="<?php echo $logo; ?>" /></div>
        <?php } ?>
        <p class="description">Recommended image size <?php echo CHILD_LOGO_WIDTH; ?>x<?php echo CHILD_LOGO_HEIGHT; ?> pixels</p>
    </div>
<?php
}*/
