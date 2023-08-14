<?php 
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 

/* add_action( 'admin_init', 'add_background_img_post' );
add_action( 'admin_head-post.php', 'print_scripts_background_img' );
add_action( 'admin_head-post-new.php', 'print_scripts_background_img' );
add_action( 'save_post', 'update_post_background_img', 10, 2 ); */
function add_background_img_post() {
    add_meta_box(
        'background_imgs',
        'Background Image',
        'exthemes_image_post',
        'post',
        'side',
		'low'
    );
}

function exthemes_image_post() {
    global $post;
    $background_imgs = get_post_meta( $post->ID, 'background_images', true );
    wp_nonce_field( plugin_basename( __FILE__ ), 'noncename_background_imgs' );
?>
<div id="dynamic_form">
    <div id="field_wrap">
<?php if ( isset( $background_imgs['image_url'] ) ) {
        for( $i = 0; $i < count( $background_imgs['image_url'] ); $i++ ) {  ?>
        <div class="field_row">
			  <div class="field_left">
				<div class="form_field">
				  <label>Add Your Image URL or choice your image</label>
				  <input type="text" class="meta_image_url" name="backgrounds[image_url][]" value="<?php esc_html_e( $background_imgs['image_url'][$i] ); ?>" />
				</div>
			  </div>
			  <div class="field_right image_wrap">
				<img src="<?php esc_html_e( $background_imgs['image_url'][$i] ); ?>" height="60" width="60" style="margin-left: 2px;"/>
			  </div>
			  <div class="field_right">
				<input class="button" type="button" value="Choose File" onclick="add_image(this)" /><br />
				<input class="button" type="button" value="Remove" onclick="remove_field(this)" />
			  </div>
			  <div class="clear" ></div> 
        </div>
<?php  } } ?>
    </div>
 
    <div id="master-row">
    <div class="field_row">
        <div class="field_left">
            <div class="form_field">
                <label>Add Your Image URL or choice your image</label> 
                <input class="meta_image_url" value="" type="text" name="backgrounds[image_url][]" />
            </div>
        </div>
        <div class="field_right image_wrap">
        </div> 
        <div class="field_right"> 
            <input type="button" class="button" value="Choose File" onclick="add_image(this)" />
            <br />
            <input class="button" type="button" value="Remove" onclick="remove_field(this)" /> 
        </div>
        <div class="clear"></div>
    </div>
    </div>
    <div id="add_field_row"  >
      <input class="button" type="button" value="Add Background" onclick="add_field_row();" />
    </div>
	
</div>
<?php
}
function print_scripts_background_img() {
    global $post;
    if( 'post' != $post->post_type )// here you can set post type name
        return;
?>  
    <style type="text/css">
      .field_left {
        float:left;
      }
      .field_right {
        float:left;
        margin-right:10px;
		margin-top: 5px;
      }
      .clear {
        clear:both;
      }
      #dynamic_form {
        width:auto;
      }
      #dynamic_form input[type=text] {
       width: 100%;
      }
      #dynamic_form .field_row {
        border:2px dashed ;
        margin-bottom:10px;
        padding:10px;
      }
      #dynamic_form label {
        padding:0 6px;
		padding-bottom: 10px;
      }
    </style>
    <script type="text/javascript">
        function add_image(obj) {
            var parent=jQuery(obj).parent().parent('div.field_row');
            var inputField = jQuery(parent).find("input.meta_image_url");
            tb_show('', 'media-upload.php?TB_iframe=true');
            window.send_to_editor = function(html) {
                var url = jQuery(html).find('img').attr('src');
                inputField.val(url);
                jQuery(parent)
                .find("div.image_wrap")
                .html('<img src="'+url+'" height="48" width="48" />');
                // inputField.closest('p').prev('.awdMetaImage').html('<img height=120 width=120 src="'+url+'"/><p>URL: '+ url + '</p>'); 
                tb_remove();
            };
            return false;  
        }
        function remove_field(obj) {
            var parent=jQuery(obj).parent().parent();
            //console.log(parent)
            parent.remove();
        }
        function add_field_row() {
            var row = jQuery('#master-row').html();
            jQuery(row).appendTo('#field_wrap');
        }
    </script>
<?php
}
/**
 * Save post action, process fields
 */
function update_post_background_img( $post_id, $post_object ) {
    // Doing revision, exit earlier **can be removed**
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    // Doing revision, exit earlier
    if ( 'revision' == $post_object->post_type )
        return;
    // Verify authenticity
    if ( !wp_verify_nonce( $_POST['noncename_background_imgs'], plugin_basename( __FILE__ ) ) )
        return;
    // Correct post type
    if ( 'post' != $_POST['post_type'] ) // here you can set post type name
        return;
    if ( $_POST['backgrounds'] ) 
    {
        // Build array for saving post meta if (++$i == 1) break;
        $background_imgs = array();
        for ($i = 0; $i < count( $_POST['backgrounds']['image_url'] ); $i++ ) 
        {
            if ( '' != $_POST['backgrounds']['image_url'][ $i ] ) 
            {
                $background_imgs['image_url'][]  = $_POST['backgrounds']['image_url'][ $i ];
            }
        } 
        if ( $background_imgs ) 
            update_post_meta( $post_id, 'background_images', $background_imgs );
        else 
            delete_post_meta( $post_id, 'background_images' );
    } 
    // Nothing received, all fields are empty, delete option
    else 
    {
        delete_post_meta( $post_id, 'background_images' );
    }
}

/*-----------------------------------------------------------------------------------*/
//init the meta box
add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){
    //on which post types should the box appear?
    $post_types = array('post' );
    foreach($post_types as $pt){
        add_meta_box('custom_postimage_meta_box',__( 'Backgrounds Images', THEMES_NAMES),'custom_postimage_meta_box_func',$pt,'side','low');
    }
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('background_images' );

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image', THEMES_NAMES); ?></a><br>
            <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image', THEMES_NAMES); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image', THEMES_NAMES); ?>',
            button: {
                text: '<?php _e('select image', THEMES_NAMES); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}

function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('background_images');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}