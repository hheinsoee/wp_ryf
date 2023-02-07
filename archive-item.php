<?php
if (isset($_GET['json'])) {

    include(get_template_directory() . '/functions/api.php');
} else {
    get_header(); ?>
    <?php get_template_part('components/nav_small', null, 'shop'); ?>
    <div class="bg-secondary text-light sticky-top offsetNav">
        <?php get_template_part('components/shopCategories_nav'); ?>
    </div>

    <div class="bg-dark text-light" style="min-height: 100vh;">
        <div class="container">
            <h2><?php echo $item_cat->name; ?></h2>
            <div class="row g-2">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                        <?php get_template_part('views/item/small', null, $post);
                        ?>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php
    get_footer();
    wp_footer();
}
