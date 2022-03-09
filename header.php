<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <?php wp_head(); ?>

</head>

<body id="top" <?php body_class();?>>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader <?php echo apply_filters("blog_home_class", "s-pageheader--home");?>">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/logo.svg" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <?php get_search_form();?>


                <?php get_template_part("template-parts/common/nav");?>

            </div> <!-- header-content -->
        </header> <!-- header -->


        <?php  
            if(is_home()){
                get_template_part("template-parts/blog-home/feature-post");
            }
        ?>

    </section> <!-- end s-pageheader -->