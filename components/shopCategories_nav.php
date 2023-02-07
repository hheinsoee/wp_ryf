<?php
$fcs = get_terms(array(
    'taxonomy' => 'item_category',
    'hide_empty' => true,
));
if ($fcs) {
?>
    <div class="swiper categoriesSwiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($fcs as $fc) {
            ?>
                <span class="swiper-slide p-2" style="display: inline-block; width: fit-content; margin-right: 30px;">
                    <a href="
                    <?php
                    // echo get_term_link($fc->term_id);
                    $query = array_merge(
                        $_GET,
                        array("item_category" => $fc->slug)
                    );
                    echo "/item/?" . http_build_query($query);
                    // echo get_term_link($fc->slug);
                    ?>
                    ">
                        <?php echo $fc->name; ?>
                    </a>
                </span>
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
    const categoriesSwiper = new Swiper('.categoriesSwiper', {
        slidesPerView: "auto",
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        // pagination: {
        //     el: ".swiper-pagination",
        //     type: "progressbar",
        //     clickable: true,
        // },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });
</script>