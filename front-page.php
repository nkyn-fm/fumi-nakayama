<?php get_header(); ?>

<main class="appear_cont">
    <section id="mv">
        <div class="mv_image forPC">
            <?php while( have_rows('top_main_pc','option') ): the_row(); ?>
            <div class="item">
                <img src="<?php echo get_sub_field('top_main_img_pc'); ?>" alt="">
            </div>
            <?php endwhile; ?>
        </div>

        <div class="mv_image forSP">
            <?php while( have_rows('top_main_sp','option') ): the_row(); ?>
            <div class="item">
                <img src="<?php echo get_sub_field('top_main_img_sp'); ?>" alt="">
            </div>
            <?php endwhile; ?>
        </div>
        
    </section>
    <section id="photograph">
        <?php while( have_rows('top_gallery','option') ): the_row(); ?>
        <div class="photo-slide"><?php while( have_rows('photo_slide','option') ): the_row(); ?><div class="item"><a href="<?php echo get_sub_field('photo_slide_img'); ?>" data-fancybox="gallery" data-caption="<?php echo get_sub_field('photo_slide_cap'); ?>"><img src="<?php echo get_sub_field('photo_slide_img'); ?>" alt=""></a></div><?php endwhile; ?></div>
        <?php endwhile; ?>
    </section>
    <section id="information">
        <div class="inner">
            <h2 class="eng">Information</h2>
            <div class="info_list">
                <?php
                $news = array(
                    'post_type' => 'post', // 投稿タイプの指定
                    'orderby' => 'date', // 日付順で表示
                    'category_name' => 'information',
                    'posts_per_page' => 3 // 投稿数
                );
                $news_posts = get_posts( $news );
                if ( $news_posts ) {
                    global $post;
                    foreach( $news_posts as $post ) {
                        setup_postdata( $post );
                ?>
                <div class="item">
                    <a href="<?php the_permalink() ?>">
                        <figure>
                            <?php if (has_post_thumbnail()) :
                        the_post_thumbnail('medium');
                        else: ?>
                            <img alt="" src="<?php bloginfo('template_directory'); ?>/images/common/noimage.png" />
                            <?php endif; ?>
                        </figure>
                        <div class="text">
                            <span class="ymd eng">2<?php the_time('Y.m.d'); ?></span>
                            <span class="title"><?php the_title(); ?></span>
                        </div>
                    </a>
                </div>
                <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
