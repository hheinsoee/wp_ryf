<a href="<?php echo esc_url(get_permalink($args->ID)); ?>">
    <div class="postThumbnail feature">
        <div style="position: relative;">
            <div style="z-index:1;position: absolute;height:100%; width:100%;" class="p-3 d-flex flex-column justify-content-between text-light">
                <div></div>
                <div>
                </div>
            </div>
            <div class="media" style="padding-bottom: 100%;" id="bg_<?php echo $args->ID; ?>">
                <?php
                if (images()['m']) {
                ?>
                    <img 
                    class="img" 
                    crossOrigin="anonymous" 
                    loading="lazy" 
                    alt="<?php echo $args->post_title; ?>" 
                    src="<?php echo images($args->ID)['m']; ?>" 
                    id="img<?php echo $args->ID; ?>" />
                <?php
                } else {
                ?>
                    <div class="bg-dark img"></div>
                <?php
                };
                ?>
            </div>
            <div class="p-2 text-light">

                <h3 class="h6">
                    <?php echo $args->post_title; ?>
                </h3>
                <?php
                if ($itemMeta = get_post_meta($args->ID, 'item', true)) {
                    // print_r($itemMeta);
                ?>
                    <span><?php echo number_format($itemMeta['price'] ? $itemMeta['price'] : 0) . " Kyats"; ?></span>
                <?php
                } else {
                }
                ?>
            </div>
        </div>
    </div>
</a>
<?php
if (images()['m']) {
?>
    <script>
        var fac<?php echo $args->ID; ?> = new FastAverageColor();

        fac<?php echo $args->ID; ?>.getColorAsync(document.querySelector('#img<?php echo $args->ID; ?>'))
            .then(color => {
                var hue = hexToHSL((color.hex).replace('#', '')).h;
                var bg<?php echo $args->ID; ?> = document.querySelectorAll('#bg_<?php echo $args->ID; ?>');
                [].forEach.call(bg<?php echo $args->ID; ?>, function(el) {
                    el.style.borderBottom = `3px solid hsl(${hue}, 70% , 50%)`;
                });
            })
            .catch(e => {
                console.log(e);
            });
    </script>
<?php
}
