<?php

$photo = get_posts(
    array(
        'post_type' => 'ry_photo'
    )
);

$myposts = [];
if ($photo) :
    foreach ($photo as $post) {

        setup_postdata($post);
        $myposts[] =
            (object) array_merge(
                (array)$post,
                (array)array("images" => images()),
                (array) array("url" => esc_url(get_permalink())),
                (array) array("post_format" => get_post_format()),
                (array) array('post_excerpt' => get_the_excerpt())
            );
    }
else :
endif;

?>

<div class="swiper recentsClub" style="height: 80vh;">
    <div class="swiper-wrapper">
        <?php
        foreach ($myposts as $post) {
        ?>
            <div class="swiper-slide">


                <div id="border<?php echo $post->ID; ?>" style="max-width:400px;position: absolute;top:40vh;margin-left:5vmax;background-color:hsla(0deg,0%,0%,20%)" class="glass p-3 text-light">
                    <h3 class="h2" id="color<?php echo $post->ID; ?>">
                        <?php echo $post->post_title; ?>
                    </h3>
                    <p>
                        <?php echo $post->post_excerpt; ?>
                    </p>
                </div>
                <?php
                if ($post->images) {
                ?>
                    <img crossOrigin="anonymous" class="rybg" style="width:100%;height:100%;object-fit:cover;" loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo $post->images['full']; ?>" id="img<?php echo $post->ID; ?>" />
                    <script>
                        var fac<?php echo $post->ID; ?> = new FastAverageColor();

                        fac<?php echo $post->ID; ?>.getColorAsync(document.querySelector('#img<?php echo $post->ID; ?>'))
                            .then(color => {
                                var hue = hexToHSL((color.hex).replace('#', '')).h;

                                var container<?php echo $post->ID; ?> = document.querySelectorAll('#color<?php echo $post->ID; ?>');
                                var border<?php echo $post->ID; ?> = document.querySelectorAll('#border<?php echo $post->ID; ?>');

                                [].forEach.call(container<?php echo $post->ID; ?>, function(el) {
                                    el.style.color = `hsl(${hue}, 100% , 80%)`;
                                });
                                [].forEach.call(border<?php echo $post->ID; ?>, function(el) {
                                    el.style.borderBottom = `3px solid hsl(${hue}, 100% , 80%)`;
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
        <?php
        }
        ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
<script>
    var swiper = new Swiper(".recentsClub", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        // effect: "fade",
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>