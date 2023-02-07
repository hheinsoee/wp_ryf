<?php get_header(); ?>
<?php get_template_part('components/nav_small', null, 'blog'); ?>
<div class="bg-dark text-light sticky-top offsetNav">
    <?php get_template_part('components/allCategories_nav'); ?>
</div>
<div class="row g-2 m-2">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <?php get_template_part('views/posts/card', null, $post);
            ?>
        </div>
    <?php
    endwhile;
    ?>
</div>
<?php
get_footer();
wp_footer();
?>