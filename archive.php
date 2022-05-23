<?php get_header(); ?>
<?php
$category = get_the_category();
$cat_id   = $category[0]->cat_ID;
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->category_nicename;
?>
<main>
    <div id="second_cont" class="information">
        <div class="information_wrap">
            <div class="info_list">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
                $option = array(
                    'post_type' => 'post', // 投稿タイプの指定
                    'orderby' => 'date', // 日付順で表示
                    'paged' => $paged,
                    'category_name' => $cat_slug, // カテゴリIDもしくはスラッグ名
                    'posts_per_page' => -1 // すべての投稿を表示
                );

                $posts = new WP_Query($option);

                if ( $posts->have_posts() ) :
                while ( $posts->have_posts() ) : $posts->the_post();
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
                <?php endwhile; ?>
                <?php  endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>