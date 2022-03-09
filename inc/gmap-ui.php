<?php  
    function gmap_shortcode_ui(){
        $fields = array(
            array(
                'label' => 'Place',
                'attr'  => 'place',
                'type'  => 'text',
            ),
            array(
                'label' => 'Width',
                'attr'  => 'width',
                'type'  => 'text',
            ),
            array(
                'label' => 'Height',
                'attr'  => 'height',
                'type'  => 'text',
            ),
            array(
                'label' => 'Zoom',
                'attr'  => 'zoom',
                'type'  => 'text',
            ),
	    );

        $settings = array(
		    'label' => 'Google Map UI',
		    'listItemImage' => 'dashicons-video-alt3',
		    'attrs' => $fields,
	    );

        shortcode_ui_register_for_shortcode( 'gmap', $settings );
    }

    add_action( 'register_shortcode_ui', 'gmap_shortcode_ui' );
?>