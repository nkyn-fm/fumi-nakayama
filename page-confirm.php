<?php
/*
Template Name: お問い合わせ確認
 */
?>
<?php get_header(); ?>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;  //投稿や固定ページのスラッグ
?>

<main>
    <div id="second_cont" class="contact">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <div class="inner">
                <?php if(function_exists('bcn_display')){ bcn_display(); }?>
            </div>
        </div>
        <?php if(have_posts()): while(have_posts()):the_post(); ?>
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
        <?php endwhile;endif; ?>
    </div>
</main>

<?php get_footer(); ?>
