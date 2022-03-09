<?php if(class_exists("Attachments")):?>
<?php $attachments = new Attachments( 'gallery' ); ?>
<?php if( $attachments->exist() ) : ?>
<article class="masonry__brick entry format-gallery" data-aos="fade-up">

    <div class="entry__thumb slider">
        <div class="slider__slides">
            <?php while( $attachments->get() ) : ?>
            <div class="slider__slide">
                <?php echo $attachments->image( 'philosophy-blog-image' ); ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php get_template_part("template-parts/summary");?>
</article> <!-- end article -->
<?php endif; ?>
<?php endif; ?>