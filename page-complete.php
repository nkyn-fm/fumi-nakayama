<?php
/*
Template Name: お問い合わせ完了
 */
?>
<?php get_header(); ?>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;  //投稿や固定ページのスラッグ
?>

<main>
    <div id="second_cont" class="post <?php echo $slug; ?>">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <div class="inner">
                <?php if(function_exists('bcn_display')){ bcn_display(); }?>
            </div>
        </div>
        <article class="post">
            <h1 class="post_h1"><?php the_title(); ?></h1>
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <?php remove_filter('the_content', 'wpautop'); ?>
            <?php the_content(); ?>
            <?php endwhile;endif; ?>
        </article>
    </div>
</main>

<?php get_footer(); ?>
