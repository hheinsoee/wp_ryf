<?php $post = $args; ?>
<a href="<?php echo esc_url(get_permalink()); ?>">
    <div class="">
        <h3 class="h6">
            <?php echo $post->post_title; ?>
        </h3>

        <div class="low">
            <small>
                <?php
                hein_time(null, 'recent') .
                    hein_time(null, 'date'); ?>
            </small>
        </div>
    </div>
</a>