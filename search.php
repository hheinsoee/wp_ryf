<?php get_header(); ?>
<main id="site-content" role="main">
    <div class="container">
        <div>
            <br />
            <span class="h3">"<?php echo get_search_query(); ?>"</span> နှင့်ဆက်စပ်အကြောင်းအရာများ
            <br />
            <?php get_search_form(); ?>
            <br />
            <div>
                <?php
                $key = get_search_query();

                $arg1 = array(
                    's' => $key,
                    // 'exact' => true,
                    // 'sentence' =>true
                );
                $arg2 = array(
                    'meta_query' => array(
                        array(
                            'key' => 'seo',
                            'value' => 'heinsoe',
                            'compare' => 'LIKE',
                            'type' => 'STRING',
                        ),
                    ),
                );
                $q3 = new WP_Query($arg1, $arg2);

                if ($q3->have_posts()) :
                    while ($q3->have_posts()) :   /* Start the Loop */
                        $q3->the_post();
                        $post_tags = get_the_tags(get_the_ID());
                ?>
                        <article class="d-flex my-2 py-2">
                            <?php //newsup_post_image_display_type($post); 
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('tiny');
                                $is_image = true;
                            } else {
                                $is_image = false;
                            }
                            ?>
                            <div class="flex-fill px-2">
                            <h4 class="h6"><u><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></u></h4>
                            <!-- <small><?php //echo wp_trim_words(get_the_excerpt(), 70); ?></small> -->
                            <?php
                            if ($post_tags) {
                            ?>
                                <i>
                                    <?php
                                    foreach ($post_tags as $t) {
                                        $tag = get_category($t);
                                    ?>
                                        <a class="_tag" href="<?php echo get_category_link($tag->term_id); ?>">#<?php echo $tag->name; ?></a>
                                    <?php
                                    }
                                    ?>
                                </i>
                            <?php
                            }
                            ?>
                            </div>
                        </article>

                    <?php endwhile;
                else : ?>
                    <h2>"<?php echo get_search_query(); ?>" နှင့်ဆက်စပ်အကြောင်းအရာမတွေ့ရှိပါ</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
