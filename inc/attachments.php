<?php 
    define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
    add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

    function philosophy_my_attachments( $attachments ){

        $post_id = 0;
        if(isset($_REQUEST["post"]) || isset($_REQUEST["post_ID"])){
            $post_id = empty($_REQUEST["post"]) ? $_REQUEST["post_ID"] : $_REQUEST["post"];
        }

        if("gallery" != get_post_format($post_id)){
            return;
        }

        $fields         = array(
            array(
                'name'      => 'title',                         // unique field name
                'type'      => 'text',                          // registered field type
                'label'     => __( 'Title', 'attachments' ),    // label to display
                'default'   => 'title',                         // default value upon selection
            ),
            
        );
        $args = array(

            // title of the meta box (string)
            'label'         => 'My Attachments',

            // all post types to utilize (string|array)
            'post_type'     => array( 'post', 'page' ),

            // meta box position (string) (normal, side or advanced)
            'position'      => 'normal',

            // meta box priority (string) (high, default, low, core)
            'priority'      => 'high',

            // allowed file type(s) (array) (image|video|text|audio|application)
            'filetype'      => null,  // no filetype limit

            // include a note within the meta box (string)
            'note'          => 'Attach files here!',

            // by default new Attachments will be appended to the list
            // but you can have then prepend if you set this to false
            'append'        => true,

            // text for 'Attach' button in meta box (string)
            'button_text'   => __( 'Attach Files', 'attachments' ),

            // text for modal 'Attach' button (string)
            'modal_text'    => __( 'Attach', 'attachments' ),

            // which tab should be the default in the modal (string) (browse|upload)
            'router'        => 'browse',

            // whether Attachments should set 'Uploaded to' (if not already set)
            'post_parent'   => false,

            // fields array
            'fields'        => $fields,

        );

        $attachments->register( 'gallery', $args ); // unique instance name
    }

    add_action( 'attachments_register', 'philosophy_my_attachments' );
?>