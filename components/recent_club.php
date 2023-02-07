<?php
$fcs = get_terms(array(
    'taxonomy' => 'fc',
    'hide_empty' => false,
));
// The Loop
if ($fcs) {
?>
    <div class="swiper fClubSwiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($fcs as $fc) {
            ?>
                <div class="swiper-slide">
                    <?php
                    get_template_part('views/fc/small', null, $fc);
                    ?>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php
} else {
    // no posts found
}
?>
<script>
    const fClubSwiper = new Swiper('.fClubSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        loop: false,
        centeredSlides: false,
        breakpoints: {
            "@0.00": {
                slidesPerView: 3.7,
            },
            "@0.75": {
                slidesPerView: 4,
            },
            "@1.00": {
                slidesPerView: 6,
            },
            "@1.50": {
                slidesPerView: 8.2,
                // spaceBetween: 50,
            },
        },
    });
</script>