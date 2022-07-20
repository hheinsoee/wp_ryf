<div class="shop_banner bg-dark text-light" style="height: 300px;display:flex;justify-content:center;align-items:center">
    <center>
        <span class="h2">Shop</span> is
        <div>comming soon</div>
    </center>
</div>
<iframe style="filter: invert(1) hue-rotate(3.142rad);"
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3745.5618145772323!2d92.89251511541501!3d20.152320422492874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30b04f86cd28f6a9%3A0xd5d01ca2bd727717!2sRakhine%20Youth%20Futsal%20Stadium!5e0!3m2!1sen!2smm!4v1658330940370!5m2!1sen!2smm" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<footer class="mt-5">
    <!-- <div class="py-5 px-2">
        <center>main sponsored by</center>
        <div class="p m">
            <div class="d-flex justify-content-center">
                <img class="logo_size mx-3 p-1" src="<?php //echo get_template_directory_uri(); ?>/assets/img/sponsor/tz.png" alt="">
                <img class="logo_size mx-3 p-1" src="<?php //echo get_template_directory_uri(); ?>/assets/img/sponsor/tz.png" alt="">
                <img class="logo_size mx-3 p-1" src="<?php //echo get_template_directory_uri(); ?>/assets/img/sponsor/tz.png" alt="">
                <img class="logo_size mx-3 p-1" src="<?php //echo get_template_directory_uri(); ?>/assets/img/sponsor/tz.png" alt="">
            </div>
        </div>
    </div> -->
    <center><small><a href="https://www.heinsoe.com" target="_blank">website is sponsored by www.heinsoe.com</a></small></center>
    <div class="text-light bg-dark">
        <div class="d-md-flex d-lg-flex justify-content-center py-5 px-2 h3">
            <div class="m-3"><a class="bi bi-facebook p" href="https://fb.com/rakhineyouthfutsal">&nbsp;Facebook</a></div>
            <div class="m-3"><a class="bi bi-messenger p" href="https://m.me/rakhineyouthfutsal">&nbsp;Messenger</a></div>
            <div class="m-3"><a class="bi bi-youtube p" href="https://www.youtube.com/channel/UCGQNfG6mK_QEElIcznSjhyw">&nbsp;Youtube</a></div>
        </div>
        <hr />
        <small class="d-flex flex-wrap justify-content-between px-3 pb-3">
            <div class="li_to_inline">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'foot_menu',
                        'theme_location' => 'foot_menu',
                        'depth' => 3,
                        'container' => false,
                        'menu_class' => '',
                        'li-class' => '',
                        'a_class' => 'k',
                        'active_class' => '',
                        //Process nav menu using our custom nav walker
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                ?>
            </div>
            <div>
                &copy;&nbsp;<?php echo date('Y') . " " . get_bloginfo('name'); ?>
            </div>
        </small>
    </div>
</footer>
<?php wp_footer(); //footer script
?>