<?php
get_header();
include_once __DIR__ . '/include/blogNav.php';
?>
<div class="container">
    <div class="row g-lg-4 mt-2 g-md-3 g-2 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">
        <?php
        $args = array(
            'posts_per_page' => 3,
            'paged' => 1,
            'offset' => 0,
            // 'post_type' => 'my_custom_type'
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'category', //double check your taxonomy name in you dd 
            //         'field'    => 'id',
            //         'terms'    => $cat_id,
            //     ),
            //    ),
        );
        $wp_query = new WP_query($args);

        if ($wp_query->have_posts()) {
            $index = 1;
            while ($wp_query->have_posts()) {
                $feature_content = array(1);
                $wp_query->the_post();
                if (in_array($index, $feature_content)) {
                    get_template_part('thumbnail', 'feature');
                } else {
                    get_template_part('thumbnail', 'card');
                }
                $index++;
            }
        } else {
            // no posts found
        }
        ?>
    </div>

</div>

<div class="container">
    <div class="
    row
    my-2
    g-2
    g-lg-4
    g-md-3 
    row-cols-1 
    row-cols-sm-2 
    row-cols-md-3 
    row-cols-lg-4">
        <?php
        $args_2 = array(
            'posts_per_page' => 8,
            'paged' => 1,
            'offset' => 2,
            // 'post_type' => 'my_custom_type'
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'category', //double check your taxonomy name in you dd 
            //         'field'    => 'id',
            //         'terms'    => $cat_id,
            //     ),
            //    ),
        );
        $wp_query_2 = new WP_query($args_2);

        if ($wp_query_2->have_posts()) {
            while ($wp_query_2->have_posts()) {
                $wp_query_2->the_post();
        ?>
                <div class="col"><?php get_template_part('thumbnail', 'feature'); ?></div>
        <?php
            }
        } else {
            // no posts found
        }
        ?>
    </div>
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata();

get_footer();
