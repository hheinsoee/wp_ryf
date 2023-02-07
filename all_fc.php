<?php get_header(); ?>
<?php get_template_part('components/nav', null, 'fc'); ?>
<div>
    <div class="bg-dark text-light py-5 minFullHeight">
    <center class="py-5">
        <h2 class="h1">Futsal Clubs</h2>
    </center>
        <?php
        $fcs = get_terms(array(
            'taxonomy' => 'fc',
            'hide_empty' => false,
        ));
        // The Loop
        if ($fcs) {
        ?>
            <div class="container">
                <div class="row g-5">
                    <?php
                    foreach ($fcs as $fc) {
                    ?>
                    <div class="col-4 col-sm-3 col-md-2">
                        <?php
                        get_template_part('views/fc/small', null, $fc);
                        ?>
                    </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php
        } else {
            // no posts found
        }
        ?>
    </div>
</div>
<?php
get_footer();
wp_footer();
?>