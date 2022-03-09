<?php  
    $feature_posts = new WP_Query([
        "post_type" => "post",
        "posts_per_page" => 3,
        "meta_key" => "feature_post",
        "meta_value" => "1"
    ]);


    $post_data = [];

    while($feature_posts->have_posts()){
        $feature_posts->the_post();
        $categories = get_the_category();
        $category = $categories[mt_rand(0, count($categories) - 1)];
        $post_data[] = [
            "title" => get_the_title(),
            "permalink" => get_the_permalink(),
            "thumbnail" => get_the_post_thumbnail_url(get_the_ID(), "large"),
            "author" => get_the_author(),
            "date" => get_the_date(),
            "author_post_url" => get_author_posts_url(get_the_author_meta("ID")),
            "avatar_url" => get_avatar_url(get_the_author_meta("ID")),
            "cat" => $category->name,
            "catlink" => get_category_link($category),
        ];
    }
?>

<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

            <div class="featured__column featured__column--big">
                <div class="entry" style="background-image:url('<?php echo $post_data[0]["thumbnail"]?>');">

                    <div class="entry__content">
                        <span class="entry__category"><a
                                href="<?php echo $post_data[0]["catlink"]?>"><?php echo $post_data[0]["cat"]?></a></span>

                        <h1><a href="<?php echo $post_data[0]["permalink"]?>"
                                title="<?php echo $post_data[0]["title"]?>"><?php echo $post_data[0]["title"]?></a></h1>

                        <div class="entry__info">
                            <a href="<?php echo $post_data[0]["author_post_url"]?>" class="entry__profile-pic">
                                <img class="avatar" src="<?php echo $post_data[0]["avatar_url"]?>" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a
                                        href="<?php echo $post_data[0]["author_post_url"]?>"><?php echo $post_data[0]["author"]?></a>
                                </li>
                                <li><?php echo $post_data[0]["date"]?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->
            </div> <!-- end featured__big -->

            <div class="featured__column featured__column--small">
                <?php for($i = 1 ; $i <= 2; $i++ ): ?>
                <div class="entry" style="background-image:url('<?php echo $post_data[$i]["thumbnail"]?>');">

                    <div class="entry__content">
                        <span class="entry__category"><a
                                href="<?php echo $post_data[$i]["catlink"]?>"><?php echo $post_data[$i]["cat"]?></a></span>

                        <h1><a href="<?php echo $post_data[$i]["permalink"]?>"
                                title="<?php echo $post_data[$i]["title"]?>"><?php echo $post_data[$i]["title"]?></a>
                        </h1>

                        <div class="entry__info">
                            <a href="<?php echo $post_data[0]["author_post_url"];?>" class="entry__profile-pic">
                                <img class="avatar" src="<?php echo $post_data[$i]["avatar_url"]?>" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a
                                        href="<?php echo $post_data[$i]["author_post_url"]?>"><?php echo $post_data[$i]["author"]?></a>
                                </li>
                                <li><?php echo $post_data[$i]["date"]?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->
                <?php endfor; ?>

            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->