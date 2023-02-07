<?php
get_header();
?>
<?php if (isset($_GET['post_type'])) {
    switch ($_GET['post_type']) {
        case 'player':
            get_myNav();
            # code...
            break;

        case 'item':
            get_template_part('components/nav_small', null, 'shop'); ?>
            <div class="bg-primary text-light sticky-top offsetNav">
                <?php get_template_part('components/shopCategories_nav'); ?>
            </div>
            <div class="container">
                <?php get_search_form(); ?>
                <h2 class="h5">search result for <span class="h2"><?php the_search_query(); ?></span></h2>
                <div class="row g-2">
                    <?php

                    if (have_posts()) :

                        while (have_posts()) :
                            the_post();
                    ?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <?php
                                get_template_part('views/item/small', null, $post);
                                ?>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
    <?php
            break;

        case 'fc':
            get_myNav();
            break;

        default:
            get_myNav();
            search_post();
            break;
    }
} else {
    search_post();
}
function search_post()
{
    ?>
    <div class="container p-2 py-5">
        <?php get_search_form();?>
        <h2 class="h5">search result for <span class="h2"><?php the_search_query(); ?></span></h2>
        <?php

        if (have_posts()) :

            while (have_posts()) :
                the_post();
                get_template_part('content', 'list');

            endwhile;
        endif;
        ?>
    </div>
<?php
}

get_footer(); ?>
<?php wp_footer(); ?>