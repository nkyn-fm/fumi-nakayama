<?php get_header(); ?>

<main>
    <div id="second_cont" class="post">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <div class="inner">
                <?php if(function_exists('bcn_display')){ bcn_display(); }?>
            </div>
        </div>
        <article class="post">
            <h1 class="post_h1"><?php the_title(); ?></h1>
            <figure class="post_img"><?php if (has_post_thumbnail()) :the_post_thumbnail('full'); endif; ?></figure>
            <div class="ymd eng"><?php the_time('Y.m.d'); ?></div>
            <?php remove_filter('the_content', 'wpautop'); ?>
            <?php the_content(); ?>
        </article>
    </div>
</main>

<?php get_footer(); ?>