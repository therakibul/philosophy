<?php  
    require_once "inc/attachments.php";
    require_once "inc/shortcode.php";

    function philosophy_setup_theme(){
        load_theme_textdomain("philosophy", get_theme_file_path("languages"));
        add_theme_support("title-tag");
        add_theme_support("post-thumbnails");
        add_theme_support("post-formats", ["audio", "image", "gallery", "link", "quote", "video"]);
        register_nav_menu("top-menu", __("Top Menu", "philosophy"));

        add_image_size("philosophy-blog-image", 400, 460, true);
    }
    add_action("after_setup_theme", "philosophy_setup_theme");

    function philosophy_assets(){
        wp_enqueue_style("font-awesome-css", get_theme_file_uri("assets/css/font-awesome/css/font-awesome.min.css"), null, "1.0"); 
        wp_enqueue_style("fonts-css", get_theme_file_uri("assets/css/fonts.css"), null, "1.0");
        wp_enqueue_style("base-css", get_theme_file_uri("assets/css/base.css"), null, "1.0");
        wp_enqueue_style("vendor-css", get_theme_file_uri("assets/css/vendor.css"), null, "1.0");
        wp_enqueue_style("main-css", get_theme_file_uri("assets/css/main.css"), null, "1.0");
        wp_enqueue_style("philosophy-css", get_stylesheet_uri(), null, time());
 

        wp_enqueue_script("modernizr-js", get_theme_file_uri("assets/js/modernizr.js"), null, "1.0", false);
        wp_enqueue_script("pace.min-js", get_theme_file_uri("assets/js/pace.min.js"), null, "1.0", false);
        
        wp_enqueue_script("plugins-js", get_theme_file_uri("assets/js/plugins.js"), ["jquery"], "1.0", true);
        wp_enqueue_script("main-js", get_theme_file_uri("assets/js/main.js"), ["jquery"], "1.0", true);
        if(is_page_template("ajax.php")){
            $ajax_url = admin_url("admin-ajax.php");
            wp_enqueue_script("ajax-js", get_theme_file_uri("assets/js/ajax.js"), ["jquery"], "1.0", true);
            wp_localize_script("ajax-js", "ajax_url", ["preview" => $ajax_url]);
        }


    }
    add_action("wp_enqueue_scripts", "philosophy_assets");


    function philosophy_page_navigation(){
        global $wp_query;
        $pgn = paginate_links([
            "current" => max(1, get_query_var("paged")),
            "total" => $wp_query->max_num_pages,
            "type" => "list"
        ]);

        $pgn = str_replace('page-numbers', "pgn__num", $pgn);
        $pgn = str_replace("<ul class='pgn__num'>", "<ul>", $pgn);
        $pgn = str_replace("prev pgn__num", "pgn__prev", $pgn);
        $pgn = str_replace("next pgn__num", "pgn__next", $pgn);

        echo $pgn;
    }


    add_filter("blog_home_class", function($class){
        if(!is_home()){
            $class = "";
        }
        return $class;
    });


    remove_action("term_description", "wpautop");



    add_filter("get_search_form", function($newForm){
        $input = <<<EOL
            <input type='hidden' name='post_type' value='post'>
EOL;
        
        if(is_post_type_archive("book")){
            $input = <<<EOL
                    <input type='hidden' name='post_type' value='book'>
EOL;
        }

        $newForm = <<<EOL
        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
                        title="Search for:" autocomplete="off">
                </label>
                {$input}
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div> <!-- end header__search -->
EOL;
        return $newForm;
    });



    add_filter("post_type_link", function($post_link, $id){
        $p = get_post($id);
        if(is_object($p) && "chapter" == get_post_type($id)){
            $parent_post_id = get_field("parent_book");
            $parent_post = get_post($parent_post_id);
            if($parent_post){
                $post_link = str_replace("%book%", $parent_post->post_name, $post_link);
            }
        }
        if(is_object($p) && "book" == get_post_type($id)){
            $genres = wp_get_post_terms($p->ID, "genre");
            if(is_array($genres) && count($genres) > 0){
                $slug = $genres[0]->slug;
                $post_link = str_replace("%genre%", $slug, $post_link);
            }else{
                $slug = "generic";
                $post_link = str_replace("%genre%", $slug, $post_link);
            }
            
        }
        return $post_link;
    }, 10, 2);


    function philosophy_footer_taxonomy_title($title){
        if(is_post_type_archive("book") || is_tax("language")){
            $title = "Language";
        }
        return $title;
    }
    add_filter("footer_taxonomy_title", "philosophy_footer_taxonomy_title");

    function philosophy_footer_taxonomy_terms($terms){
        if(is_post_type_archive("book") || is_tax("language")){
            $terms = get_terms([
                "taxonomy" => "language",
                "hide_empty" => false
            ]);
        }
        return $terms;
    }
    add_filter("footer_taxonomy_terms", "philosophy_footer_taxonomy_terms");

    function philosophy_simple_ajax_call(){
        $n = $_POST["n"];
        if(wp_verify_nonce($n, "wp_my_ajax")){
            $message = $_POST["message"];
            echo strtoupper($message);
        }else{
            echo "Nonce verification failed";
        }
        die();
    }
    add_action("wp_ajax_wp_my_ajax", "philosophy_simple_ajax_call");


    function philosophy_purchase_code_verification(){
        add_settings_field("username", "Username", "display_user_name", "general");
        add_settings_field("password", "Password", "display_password", "general");

        register_setting("general", "username");
        register_setting("general", "password");
    }

    function display_user_name(){
        $username = get_option("username");
        printf("<input type='text' name='username'>");
    }

    function display_password(){
        $password = get_option("password");
        printf("<input type='text' name='password'>");
    }
    add_action("admin_init", "philosophy_purchase_code_verification");
?>