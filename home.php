<?php

if (isset($_GET['json'])) {
    include(get_template_directory() . '/functions/api.php');
} elseif (isset($_GET['blog'])) {
    get_template_part('blog');
} elseif (isset($_GET['fc'])) {
    get_template_part('all_fc');
} else {
    get_header(); ?>
    <div class="mytransparent-nav" id="navContainer">
        <?php get_myNav(); ?>
    </div>
    <script>
        // document.querySelector('.navbar').classList.remove('glass');
        document.addEventListener("DOMContentLoaded", function() {

                navContainer = document.querySelector('#navContainer');
                document.querySelector('.navbar').classList.remove('bg-black');

                var last_scroll_top = 0;
                window.addEventListener('scroll', function() {
                    let scroll_top = window.scrollY;
                    let isOver = scroll_top * 2 - window.innerHeight > 0
                    if (isOver) {
                        document.querySelector('#navContainer').classList.remove('mytransparent-nav');
                        document.querySelector('.navbar').classList.add('bg-black');
                        // document.querySelector('.navbar').classList.add('glass');
                    } else {
                        document.querySelector('#navContainer').classList.add('mytransparent-nav')
                        document.querySelector('.navbar').classList.remove('bg-black');
                        // document.querySelector('.navbar').classList.remove('glass');
                    }
                });
                // window.addEventListener
            }
            // if

        );
        // DOMContentLoaded  end
    </script>

    <header>
        <div style="
    background: url(<?php echo get_template_directory_uri() . "/assets/images/renaissance_yg.jpg"; ?>);
    background-size: cover;
    background-position: center;
    ">

            <h2 class="d-none">RY Photo</h2>
            <?php get_template_part('components/slider'); ?>
            <h2 class="d-none">Football Club</h2>
            <div>
                <div class="bg-dark glass" style="flex:1; width: 100%;">
                    <section style="flex:1;width:100%" class="py-4">
                        <?php get_template_part('components/recent_club'); ?>
                    </section>
                </div>
            </div>
        </div>
    </header>


    <section class="text-light p-3 py-5 bg-black">
        <?php get_template_part('components/recent_item'); ?>
        <center>
            <a class="nav-link" aria-current="class" href="/item">
                Go to <i class="fa-solid fa-shop"></i> Shop
            </a>
        </center>
    </section>



    <div class="text-light py-5 bg-dark">
        <h2 class="h4 container p-4" id="article">Blog</h2>
        <?php

        if (have_posts()) :
        ?>
            <div class="articleSwiper swiper">
                <div class="swiper-wrapper">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <div class="swiper-slide m-2" style="max-width: 300px;">
                            <?php get_template_part('views/posts/card', null, $post);
                            ?>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
            <script>
                const articleSwiper = new Swiper('.articleSwiper', {
                    // Optional parameters
                    // direction: 'vertical',
                    slidesPerView: "auto",
                    spaceBetween: 0,
                    loop: false,
                    // autoplay: {
                    //     delay: 2500,
                    //     disableOnInteraction: true,
                    // },
                    // effect: "coverflow",
                    grabCursor: true,
                    centeredSlides: false,
                });
            </script>
        <?php
        else :
        endif;

        ?>
    </div>
    <?php
    get_footer();
    wp_footer();
    ?>
    </body>

    </html>
<?php
}
?>