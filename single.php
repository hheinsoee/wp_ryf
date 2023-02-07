<?php
get_header();
get_myNav();
?>
<div class="">
    <article class="row g-0">
        <?php
        if (has_post_thumbnail()) {
        ?>
            <div class="col-12 col-sm-12 col-md-5 d-flex justify-content-center " id="bg<?php echo $post->ID; ?>">
                <div class="sticky-top offsetNav">
                    <div class="sticky-top offsetNav text-light">
                        <img id="img<?php echo $post->ID; ?>" crossOrigin="anonymous" style="width: 100%;max-height:calc(80vmin - 100px);object-fit:cover;" class="thumbnail" src="<?php echo images()['l']; ?>" alt="">
                        <div class="p-3">
                            <h2 class="h5"><?php the_title('<b>', '</b>'); ?></h2>
                            <?php hein_time(null, 'recent'); ?> -
                            <?php hein_time(null, 'date'); ?>
                            <?php social(); ?>
                        </div>
                    </div>
                </div>
                <script>
                    var fac<?php echo $post->ID; ?> = new FastAverageColor();
                    fac<?php echo $post->ID; ?>.getColorAsync(document.querySelector('#img<?php echo $post->ID; ?>'))
                        .then(color => {
                            var hue = hexToHSL((color.hex).replace('#', '')).h;

                            var bg<?php echo $post->ID; ?> = document.querySelectorAll('#bg<?php echo $post->ID; ?>');

                            [].forEach.call(bg<?php echo $post->ID; ?>, function(bg) {
                                bg.style.background = `hsl(${hue}, 70% , 40%)`;
                            });
                        })
                        .catch(e => {
                            console.log(e);
                        });
                </script>
            </div>
        <?php
        }
        ?>

        <div class="col-12 col-sm-12 col-md-7 p-3 p-lg-5 minFullHeight">
            <div class="mt-3 read">
                <?php echo $post->post_content; ?>
            </div>
            <?php social(null, 'fb_comment'); ?>
        </div>
    </article>
</div>
<?php
wp_footer();
?>
</body>

</html>