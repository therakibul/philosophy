<?php get_header(); ?>
<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title();?>
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"><?php echo get_the_date();?></li>
                <li class="cat">
                    In
                    <?php the_category(" ", "", "");?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail("large");?>
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">
            <?php  the_content();?>

            <?php  
                $chapters = new WP_Query([
                    "post_type" => "chapter",
                    "posts_per_page" => -1,
                    "meta_key" => "parent_book",
                    "meta_value" => get_the_ID()
                ]);
            ?>
            <?php if($chapters->post_count > 0):?>
            <h3>Chapter</h3>
            <?php  
                while($chapters->have_posts()){
                    $chapters->the_post();
                    printf("<a href='%s'>%s</a><br>", get_the_permalink(), get_the_title());
                }
            ?>
            <?php endif; ?>
        </div> <!-- end s-content__main -->

    </article>


</section> <!-- s-content -->

<?php get_footer(); ?>