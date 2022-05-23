<?php
/*
Template Name: ポートフォリオ
 */
?>
<?php get_header(); ?>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;  //投稿や固定ページのスラッグ
?>

<main>
    <div id="second_cont" class="appear_cont portfolio">
        <div class="portfolio_wrap">
            <div id="portrait" class="photo_cate">
                <h2 class="portfolio_menu">Portrait</h2>
                <div class="gallery">
                    <?php while( have_rows('portfolio_portrait') ): the_row(); ?>
                    <div class="photo-slide">
                        <?php while( have_rows('photo_slide') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="portrait" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div id="fashion" class="photo_cate">
                <h2 class="portfolio_menu">Fashion</h2>
                <div class="gallery">
                    <?php while( have_rows('portfolio_fashion') ): the_row(); ?>
                    <div class="photo-slide">
                        <?php while( have_rows('photo_slide') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="fashion" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div id="creative" class="photo_cate">
                <h2 class="portfolio_menu">Creative</h2>
                <div class="gallery">
                    <?php while( have_rows('portfolio_creative') ): the_row(); ?>
                    <div class="photo-slide">
                        <?php while( have_rows('photo_slide') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="creative" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div id="travel" class="photo_cate">
                <h2 class="portfolio_menu">Travel</h2>
                <div class="gallery">
                    <?php while( have_rows('portfolio_travel') ): the_row(); ?>
                    <div class="photo-slide">
                        <?php while( have_rows('photo_slide') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="travel" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div id="gravure" class="photo_cate">
                <h2 class="portfolio_menu">Gravure</h2>
                <div class="gallery">
                    <?php while( have_rows('portfolio_gravure') ): the_row(); ?>
                    <div class="photo-slide">
                        <?php while( have_rows('photo_slide') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="gravure" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div><?php endwhile; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
