<a href="<?php echo esc_url(get_permalink($args->ID)); ?>">
    <div class="media" style="padding-bottom: 100%;">
        <?php
        if (images()['s']) {
        ?>
            <img crossOrigin="anonymous" loading="lazy" alt="<?php echo $args->post_title; ?>" src="<?php echo images($args->ID)['s']; ?>" id="img<?php echo $args->ID; ?>" />
        <?php
        } else {
        ?>
            <div class="bg-dark img"></div>
        <?php
        };
        ?>
    </div>


    <h3 class="h6">
        <?php echo $args->post_title; ?>
    </h3>
    </div>

</a>