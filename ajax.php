<?php  
    /*
        Template Name: Ajax
    */ 
?>

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

            <h3>Ajax</h3>
            <form>
                <input type="text" name="info" id="info">
                <?php wp_nonce_field("wp_my_ajax");?>
                <input type="button" name="btn" id="btn" value="Enter">
            </form>
        </div> <!-- end s-content__main -->

    </article>


</section> <!-- s-content -->

<?php get_footer(); ?>