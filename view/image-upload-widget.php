<?php

add_action( 'widgets_init', create_function( '', 'register_widget("msd_image_upload_widget_plugin");' ) );

class msd_image_upload_widget_plugin extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $msd_image_widget_ops = array(
            'classname' => 'msd_image_upload',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'msd_image_upload', 'Image Upload Widget', $msd_image_widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'msd_image_upload_scripts'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function msd_image_upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . 'upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

    /**
     * Outputs the HTML for this widget in fontend.
     *    
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
         ?> 
         
         <div class="col-md-3">
            <div class="sponsor-image_link"><a href="<?php echo $instance['image_link'];?>">
                <img src="<?php echo $instance['image'];?>" /></a>
            </div>
         </div>
        

         <?php
    

    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.     
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *     
     **/
    public function form( $instance )
    {
        $image_link = __(' ');
        if(isset($instance['image_link']))
        {
            $image_link = $instance['image_link'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'image_link' ); ?>"><?php _e( 'Image Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_link' ); ?>" name="<?php echo $this->get_field_name( 'image_link' ); ?>" type="text" value="<?php echo esc_attr( $image_link ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="msd_image_upload" type="button" value="Upload Image" />

           <!-- <input  name ="<?php echo $this->get_field_name( 'image' ); ?>" type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" value="<?php echo esc_url( $image ); ?>" />
           <a href="#" class="msd_image_upload button button-primary" >Image</a>
 -->
        </p>
    <?php
    }
}




