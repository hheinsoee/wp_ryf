<?php
$item_cat = get_queried_object();
if (isset($_GET['json'])) {

    include(get_template_directory() . '/functions/api.php');
} else {
?>
    <?php get_header(); ?>

    <?php get_template_part('components/nav_small', null, 'shop'); ?>
    <div class="bg-primary text-light sticky-top offsetNav">
        <?php get_template_part('components/shopCategories_nav'); ?>
    </div>
    <div class="bg-dark text-light" style="min-height: 100vh;">
        <div class="container">
            <h2><?php echo $item_cat->name; ?></h2>
            <div class="row g-2">

                <?php //Show Item
                $query = new WP_Query(array(
                    'post_type' => 'item',          // name of post type.
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'item_category',   // taxonomy name
                            'field' => 'term_id',           // term_id, slug or name
                            'terms' => $item_cat->term_id,                  // term id, term slug or term name
                        )
                    )
                ));

                while ($query->have_posts()) :
                    $query->the_post();
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <?php get_template_part('views/item/small', null, $post);
                        ?>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>


            </div>
        </div>
    </div>
    <?php
    get_footer();
    wp_footer();
    ?>
<?php
}
?>