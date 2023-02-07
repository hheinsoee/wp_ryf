<?php


$myposts = [];
if (have_posts()) :

    while (have_posts()) :
        the_post();
        $myposts[] =
            (object) array_merge(
                (array)$post,
                (array)array("images" => images()),
                (array) array("url" => esc_url(get_permalink())),
                (array) array("post_format" => get_post_format()),
                (array) array('post_excerpt' => get_the_excerpt())
            );
    endwhile;
else :
endif;

?>

<div class="swiper headSlider">
    <div class="swiper-wrapper">
        <?php
        foreach ($myposts as $p) {
        ?>
            <div class="swiper-slide portrait">
                <?php
                thumbnail($p, 'feature');
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script>
    var swiper = new Swiper(".headSlider", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            "@0.00": {
                slidesPerView: 1.3,
            },
            "@0.75": {
                slidesPerView: 2.1,
            },
            "@1.00": {
                slidesPerView: 3.6,
            },
            "@1.50": {
                slidesPerView: 4.2,
                // spaceBetween: 50,
            },
        },
    });
</script>