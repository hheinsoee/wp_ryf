<?php get_header();
get_myNav();
?>
<?php
if (have_posts()) :

    while (have_posts()) :

        the_post();
        $post_categories = wp_get_post_categories(get_the_ID());
        $cats = array();

        // foreach($post_categories as $c){
        // 	$cat = get_category( $c );
        // 	$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug , 'id' => $cat->term_id );
        // }
?>
        <article class="container">
            <?php
            if (has_post_thumbnail()) {
            ?>
                <div>
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php
            } else {
                echo "<br/><br/>";
            }
            ?>
            <header class="entry-header m10">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                <?php
                foreach ($post_categories as $c) {
                    $cat = get_category($c);
                ?><a class="_cat" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a><?php
                                                                                                                    }
                                                                                                                        ?><?php edit_post_link(__('edit'), ''); ?>
            </header>

            <div class="entry-content">
                <?php the_content(esc_html__('Continue reading &rarr;', 'western-news')); ?>
            </div>
            <! – .entry-content –>
        </article>
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    // 	comments_template();
    // endif;


    endwhile;

else :
    ?>
    <article class="no-results">

        <header class="entry-header">
            <h1 class="page-title"><?php esc_html_e('Nothing Found', 'western-news'); ?></h1>
        </header>
        <! – .entry-header –>

            <div class="entry-content">
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'western-news'); ?></p>
            </div>
            <! – .entry-content –>

    </article>
    <! – .no-results –>
    <?php
endif;
    ?>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>

    </body>

    </html>