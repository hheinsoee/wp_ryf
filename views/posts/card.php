<?php $post = $args; ?>
<a href="<?php echo esc_url(get_permalink()); ?>">
    <div class="postThumbnail feature">
        <div style="position: relative;">
            <div style="z-index:1;position: absolute;height:100%; width:100%;" class="p-3 d-flex flex-column justify-content-between text-light" id="gradient_<?php echo $post->ID; ?>">
                <div>
                    <div style="z-index:1;" class="d-flex justify-content-end align-items-center px-2 my-1 low">
                        <img crossOrigin="anonymous" style="width:2rem;height:2rem" class="logo" src="<?php echo get_template_directory_uri() . '/assets/images/ryf_w_t.png'; ?>" />
                    </div>
                </div>
                <div>
                    <h3 class="h6">
                        <?php echo $post->post_title; ?>
                    </h3>
                    <div class="bar" id="bg<?php echo $post->ID; ?>"></div>
                    <div class="low">
                        <small>
                            <?php
                            hein_time(null, 'recent') .
                                hein_time(null, 'date'); ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="media" style="padding-bottom: 120%;">
                <?php
                if (images()['m']) {
                ?>
                    <img crossOrigin="anonymous" loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo images()['m']; ?>" id="img<?php echo $post->ID; ?>" />
                    <script>
                        var fac<?php echo $post->ID; ?> = new FastAverageColor();

                        fac<?php echo $post->ID; ?>.getColorAsync(document.querySelector('#img<?php echo $post->ID; ?>'))
                            .then(color => {
                                var hue = hexToHSL((color.hex).replace('#', '')).h;

                                var container<?php echo $post->ID; ?> = document.querySelectorAll('#gradient_<?php echo $post->ID; ?>');
                                var bg<?php echo $post->ID; ?> = document.querySelectorAll('#bg<?php echo $post->ID; ?>');

                                [].forEach.call(container<?php echo $post->ID; ?>, function(el) {
                                    el.style.background = `linear-gradient(transparent 30%, hsl(${hue}, 100% , 35%) 90%)`;
                                });
                                [].forEach.call(bg<?php echo $post->ID; ?>, function(bg) {
                                    bg.style.background = `hsl(${hue}, 100% , 50%)`;
                                });
                            })
                            .catch(e => {
                                console.log(e);
                            });
                    </script>
                <?php
                } else {
                ?>
                    <div class="bg-dark img"></div>
                <?php
                };
                ?>
            </div>
        </div>
    </div>
</a>