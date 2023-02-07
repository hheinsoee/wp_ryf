<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black text-light sticky-top p-0" style="z-index:2">
    <div class="container">
        <a class="navbar-brand d-flex" href="/ ">
            <?php
            if (@$args == "shop") {
            ?>
                <div style="width: 30px;">
                    <img crossOrigin="anonymous" style="width:inherit;" src="<?php echo get_template_directory_uri() . "/assets/images/rys.png"; ?>" alt="Rakhine Youth Sports Corner" />
                </div>
            <?php
            } elseif (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <div style="width: 30px;">
                    <img crossOrigin="anonymous" style="width:inherit;position:absolute" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                </div>
                &nbsp;
            <?php
            }
            ?>
        </a>
        <ul class="d-flex align-items-center nav me-auto m-0 ">

            <li class="nav-item <?php if (@$args == "blog") {
                                    echo 'text-primary';
                                } ?>">
                <a class="p-2" aria-current="class" href="/?blog">
                    <i class="fa-solid fa-newspaper"></i> <span class="d-none d-md-inline-block">Blog</span>
                </a>
            </li>

            <li class="nav-item <?php if (@$args == "stadium") {
                                    echo 'text-primary';
                                } ?>">
                <a class="p-2" aria-current="class" href="#">
                    <i class="fa-solid fa-rainbow"></i> <span class="d-none d-md-inline-block">Stadium</span>
                </a>
            </li>

            <li class="nav-item  <?php if (@$args == "fc") {
                                        echo 'text-primary';
                                    } ?>">
                <a class="p-2" aria-current="class" href="/?fc">
                    <i class="fa-sharp fa-solid fa-people-group"></i> <span class="d-none d-md-inline-block">F.Club</span>
                </a>
            </li>

            <li class="nav-item <?php if (@$args == "shop") {
                                    echo 'text-primary';
                                } ?>">
                <a class="p-2" aria-current="class" href="/item">
                    <i class="fa-solid fa-shop"></i> <span class="d-none d-md-inline-block">Shop</span>
                </a>
            </li>
        </ul>

        <div class="d-flex align-items-center nav ms-auto m-0 ">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" class="p-2"><i class="fa-solid fa-magnifying-glass"></i></span>
            <a class="p-2" href="tel:<?= myInfo()['phone']; ?>" title="<?= myInfo()['phone']; ?>"><i class="fa-solid fa-phone  "></i></a>
            <a class="p-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>"><i class="fa-brands fa-facebook "></i></a>

        </div>
    </div>
</nav>


<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <div></div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body container">
        <div class="h2" id="offcanvasTopLabel">Search</div>
        <?php get_search_form(); ?>
    </div>
</div>