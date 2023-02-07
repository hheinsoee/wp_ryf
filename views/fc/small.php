<?php $fc = $args; ?>
<a href="<?php echo get_term_link($fc->term_id) ?>">
    <center class="color_text<?php echo $fc->term_id; ?>">
        <div>
            <?php
            if ($logo = get_field('logo', 'fc_' . $fc->term_id)) {
            ?>
                <img crossOrigin="anonymous" loading="lazy" class="logo" alt="<?php echo $fc->name; ?>" src="<?php echo $logo; ?>" id="img<?php echo $fc->term_id; ?>" />
                <script>
                    var fac<?php echo $fc->term_id; ?> = new FastAverageColor();

                    fac<?php echo $fc->term_id; ?>.getColorAsync(document.querySelector('#img<?php echo $fc->term_id; ?>'))
                        .then(color => {
                            var hue = hexToHSL((color.hex).replace('#', '')).h;

                            var bg<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_bg<?php echo $fc->term_id; ?>');
                            var text<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_text<?php echo $fc->term_id; ?>');
                            var border<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_border<?php echo $fc->term_id; ?>');

                            [].forEach.call(bg<?php echo $fc->term_id; ?>, function(el) {
                                el.style.background = `hsl(${hue}, 100% , 50%)`;
                            });
                            [].forEach.call(text<?php echo $fc->term_id; ?>, function(el) {
                                el.style.color = `hsl(${hue}, 70% , 70%)`;
                            });
                            [].forEach.call(border<?php echo $fc->term_id; ?>, function(el) {
                                el.style.border = `4px solid hsl(${hue}, 100% , 50%)`;
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

        <h3 class="h6 p-2">
            <?php echo $fc->name; ?>
        </h3>
    </center>
</a>