<?php  
    /*
        Template Name: Feature Books
    */ 
?>

<?php get_header(); ?>

<!-- s-content
    ================================================== -->
<section class="s-content">
    <h3 class="text-center">Feature Books</h3>
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <?php  

                $feature_books = new WP_Query([
                    "post_type" => "book",
                    "posts_per_page" => -1,
                    "meta_key" => "feature_book",
                    "meta_value" => "1"
                ]);

                while($feature_books->have_posts()){
                    $feature_books->the_post();
                    get_template_part("template-parts/post-formats/post", get_post_format());
                }
                wp_reset_query();
            ?>

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php philosophy_page_navigation();?>
            </nav>
        </div>
    </div>

</section> <!-- s-content -->
<?php get_footer();?>