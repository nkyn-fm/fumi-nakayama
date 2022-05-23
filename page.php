<?php
/*
Template Name: デフォルト
 */
?>
<?php get_header(); ?>

<?php
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;  //投稿や固定ページのスラッグ
?>

<main>
    <?php if( is_page( array('about') ) ) : ?>
    <div id="second_cont" class="appear_cont <?php echo $slug; ?>">
        <?php else: ?>
        <div id="second_cont" class="<?php echo $slug; ?>">
        <?php endif; ?>
        <?php if(have_posts()): while(have_posts()):the_post(); ?>
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
        <?php endwhile;endif; ?>
    </div>
</main>

<?php get_footer(); ?>
