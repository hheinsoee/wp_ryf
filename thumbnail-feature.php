<section style="height: 100%;">
    <a class="card _feature" href="<?php echo esc_url(get_permalink()); ?>" style="height:inherit">
        <?php if (has_post_thumbnail()) {
        ?>
            <div class="_media" style="height:inherit;">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php

            $is_image = true;
        } else {
            $is_image = false;
        }
        ?>
        <div class="card-body bg_logo <?php if($is_image){echo "gradient";}?>">
            <?php the_title('<h5 class="h2 card-title">', '</h5>'); ?>
            <div class="_ani"></div>
            <div>
                <?php
                $post_categories = wp_get_post_categories(get_the_ID());
                foreach ($post_categories as $c) {
                ?>
                    <i><?php echo get_category($c)->name; ?></i>
                <?php
                }
                ?>
            </div>
            <small class="text-muted"><?php hein_time('date') . hein_time('recent'); ?></small>
            <?php if(!$is_image){?>
            <p class="card-text">
                <?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 200, ' ...<i>see more</i>'), ENT_QUOTES, 'UTF-8') ?>
            </p>
            <?php } ?>
        </div>
    </a>
</section>