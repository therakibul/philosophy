<?php get_header(); ?>

<!-- s-content
    ================================================== -->
<section class="s-content">
    <h2 class="text-center">All Our Books</h2>
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php  
                while(have_posts()){
                    the_post();
                    get_template_part("template-parts/post-formats/post", get_post_format());
                }
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