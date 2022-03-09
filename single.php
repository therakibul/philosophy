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

            <p class="s-content__tags">
                <span>Post Tags</span>

                <span class="s-content__tag-list">
                    <?php the_tags(" ", "", "");?>
                </span>
            </p> <!-- end s-content__tags -->


            <div class="s-content__pagenav">
                <?php  
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                
                ?>
                <div class="s-content__nav">
                    <?php if($prev_post): ?>
                    <div class="s-content__prev">
                        <a href="<?php the_permalink($prev_post);?>" rel="prev">
                            <span>Previous Post</span>
                            <?php echo get_the_title($prev_post);?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($next_post): ?>
                    <div class="s-content__next">
                        <a href="<?php the_permalink($next_post);?>" rel="next">
                            <span>Next Post</span>
                            <?php echo get_the_title($next_post);?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>
</section> <!-- s-content -->

<?php get_footer(); ?>