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
add_action( 'admin_init', 'add_image_gallery_post' );
add_action( 'admin_head-post.php', 'print_scripts_so_144459041' );
add_action( 'admin_head-post-new.php', 'print_scripts_so_144459041' );
add_action( 'save_post', 'update_post_gallery_so_144459041', 10, 2 );
function add_image_gallery_post() 
{
    add_meta_box(
        'post_gallery',
        'Screenshoots Poster Uploader',
        'exthemes_gallery_image_post',
        'post',
        'normal',
        'core'
    );
}
/**
 * Print the Meta Box content
 */
function exthemes_gallery_image_post() {
    global $post, $wpdb, $gets_data;
    $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'noncename_so_14445904' );
	$gambarX21			= get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212			= get_post_meta( $post->ID, 'wp_images_GP1', true );
    //$datos_imagenes = ''.$gambarX21.''.$gambarX212.'';
    //$datos_imagenes = get_post_meta($post->ID, 'wp_images_GP', true);
    $datos_imagenes		= $gambarX21;
    if ( $datos_imagenes === FALSE or $datos_imagenes == '' ) $datos_imagenes = $gambarX212;
   /*  for($i=0; $i<4; $i++){
        // echo $gambarX21[$i]."<br />";
    } */
    $datos_imagenes		= !empty($datos_imagenes) ? $datos_imagenes : array();
    $c = 4; 
	?>
	
	<style>p.flip {margin: 0px;padding: 5px;text-align: center;background: #2271b1;border: solid 1px #fff;color:white;}div.panel {width: 100%;height: auto;display: none;}</style>

   <center>
	<?php if($gambarX21){ ?>
	<p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Default Screenshoots Poster from Googleplay, you cant add or remove this,<br> but you can copy this link image url for you insert</strong></p> 
	<?php } else { ?>
	<p><strong style="text-transform:uppercase!important;color:#2271b1">Add your link image url here</strong></p> 
	<?php } ?>	
	</center>  
	<?php if($gambarX21){ ?>
	<p class="flip">Click here to see link image url </p>
	<?php } ?>
	
	
	<div id="dynamic_form">
    <div id="field_wrap">
	
	<span class="panel" style="display: none;">
	<?php
	$i = 0; 
	foreach($datos_imagenes as $elemento) { ?>
		<div class="field_row">
          <div class="field_left">
            <div class="form_field">
              <label><strong>Image URL</strong></label>
              <input type="text" class="meta_image_url" name="gallery-screenshot" value="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" >
            </div>
          </div>
          <div class="image_wrap field_right ">
            <img src="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" width="60" height="60">
          </div> 
          <div class="clear"></div> 
        </div>
	<?php $i++; } ?>	
	</span>
	
	</div>  
	</div> 
	 
	 
	<div id="dynamic_form">
    <div id="field_wrap">
    <?php 
    if ( isset( $gallery_data['image_url'] ) ) 
    {
        for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ ) 
        {
        ?>
        <div class="field_row">
          <div class="field_left">
            <div class="form_field">
              <label>Image URL</label>
              <input type="text"
                     class="meta_image_url"
                     name="gallery[image_url][]"
                     value="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>"
              />
            </div>
          </div>
          <div class="field_right image_wrap">
            <img src="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" height="60" width="60" />
          </div>
          <div class="field_right">
            <input class="button" type="button" value="Choose File" onclick="add_image(this)" /><br />
            <input class="button" type="button" value="Remove" onclick="remove_field(this)" />
          </div>
          <div class="clear" /></div> 
        
        <?php
        } // endif
    } // endforeach
    ?>
    </div>
	
	
    <div style="display:none" id="master-row">
    <div class="field_row">
        <div class="field_left">
            <div class="form_field">
                <label>Image URL</label>
                <input class="meta_image_url" value="" type="text" name="gallery[image_url][]" />
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
	
    <div id="add_field_row">
      <input class="button" type="button" value="Add New Images" onclick="add_field_row();" />
    </div>
	</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js' type='text/javascript'></script>
<script>
$(document).ready(function () {
  $(".flip").click(function () {
    $(".panel").slideToggle("slow");
  });
}); 
</script>

<?php
}
/**
 * Print styles and scripts
 */
function print_scripts_so_144459041()
{
    // Check for correct post_type
    global $post;
    if( 'post' != $post->post_type )// here you can set post type name
        return;
    ?>  
    <style type="text/css">
      .field_left {
        float:left;
      }
      .field_right {
        float:right;
        margin-left:10px;
      }
      .clear {
        clear:both;
      }
      #dynamic_form {
        width:auto;
      }
      #dynamic_form input[type=text] {
        width:445px;
      }
      #dynamic_form .field_row {
        border:2px dashed ;
        margin-bottom:10px;
        padding:10px;
      }
      #dynamic_form label {
        padding:0 6px;
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
function update_post_gallery_so_144459041( $post_id, $post_object ) 
{
    // Doing revision, exit earlier **can be removed**
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    // Doing revision, exit earlier
    if ( 'revision' == $post_object->post_type )
        return;
    // Verify authenticity
    if ( !wp_verify_nonce( $_POST['noncename_so_14445904'], plugin_basename( __FILE__ ) ) )
        return;
    // Correct post type
    if ( 'post' != $_POST['post_type'] ) // here you can set post type name
        return;
    if ( $_POST['gallery'] ) 
    {
        // Build array for saving post meta
        $gallery_data = array();
        for ($i = 0; $i < count( $_POST['gallery']['image_url'] ); $i++ ) 
        {
            if ( '' != $_POST['gallery']['image_url'][ $i ] ) 
            {
                $gallery_data['image_url'][]  = $_POST['gallery']['image_url'][ $i ];
            }
        }
        if ( $gallery_data ) 
            update_post_meta( $post_id, 'gallery_data', $gallery_data );
        else 
            delete_post_meta( $post_id, 'gallery_data' );
    } 
    // Nothing received, all fields are empty, delete option
    else 
    {
        delete_post_meta( $post_id, 'gallery_data' );
    }
}