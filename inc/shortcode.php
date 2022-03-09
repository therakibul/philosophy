<?php 

    require dirname(__FILE__)."/gmap-ui.php";
    function shortcode_for_btn1($attributes){
        $default = [
            "title" => "Button",
            "type" => "primary",
            "url" => "#"
        ]; 
        $attributes = shortcode_atts($default, $attributes);
       return sprintf('<a class="btn btn--%s full-width" href="%s">%s</a>', $attributes["type"], $attributes['url'], $attributes['title']);
    }

    add_shortcode("btn1", "shortcode_for_btn1");

    function shortcode_for_btn2($attributes, $content){
        $default = [
            "type" => "primary",
            "url" => "#"
        ]; 
        $attributes = shortcode_atts($default, $attributes);
       return sprintf('<a class="btn btn--%s full-width" href="%s">%s</a>', $attributes["type"], $attributes['url'], do_shortcode($content));
    }

    add_shortcode("btn2", "shortcode_for_btn2");


    function shortcode_for_gmap($attributes){
        $default = [
            "place" => "Dhaka",
            "zoom" => 12,
            "width" => "100%",
            "height" => 700
        ];
        $attributes = shortcode_atts($default, $attributes);
        $shortcode_output = <<<EOL

        <iframe width="{$attributes['width']}" height="{$attributes['height']}" id="gmap_canvas" src="https://maps.google.com/maps?q={$attributes['place']}&t=&z={$attributes['zoom']}&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
EOL;
        return $shortcode_output;
    }
    add_shortcode("gmap", "shortcode_for_gmap");
?>