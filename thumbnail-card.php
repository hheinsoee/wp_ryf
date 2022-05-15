<section style="height: 100%;">
    <a class="card flex-row flex-wrap" href="<?php echo esc_url(get_permalink()); ?>" style="height:inherit;">
        <?php if (has_post_thumbnail()) {
        ?>
            <div class="_media" style="flex:1;min-width:200px;">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php

            $is_image = true;
        } else {
            $is_image = false;
        }
        ?>
        <div class="card-body d-flex flex-column" style="flex:1;min-width:200px;">
            <div class="_ani"></div>
            <?php the_title('<h3 class="card-title">', '</h3>'); ?>
            <p class="card-text">
                <?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...<i>see more</i>'), ENT_QUOTES, 'UTF-8') ?>
            </p>
            <div class="flex-fill"></div>
            <?php
            $post_categories = wp_get_post_categories(get_the_ID());
            foreach ($post_categories as $c) {
            ?>
                <i><?php echo get_category($c)->name; ?></i>
            <?php
            }
            ?>
            <div class=" text-muted">
                <small><?php hein_time('date') . hein_time('recent'); ?></small>
            </div>
        </div>
    </a>
</section>