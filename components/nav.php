<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black text-light sticky-top px-3 py-0" style="z-index:1021">
    <div class="container-fluid px-0 px-sm-2">
        <a class="navbar-brand d-flex" href="/ ">

            
            <?php
            if (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
                <div style="width: 45px;">
                    <img crossOrigin="anonymous" style="width:inherit;position:absolute" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                </div>
                &nbsp;
            <?php
            }
            ?>
            <div class="d-none d-sm-block">
                <h1 class="h4 my-1"><?= get_bloginfo('name'); ?></h1>
                <div class="bg-primary px-1" style="position:absolute;font-size:9pt;"><?= get_bloginfo('description'); ?></div>
            </div>
        </a>



        <div class="d-flex d-lg-none align-items-center">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" class="p-2"><i class="fa-solid fa-magnifying-glass fa-lg"></i></span>
            <a class="mx-1 px-2" href="tel:<?= myInfo()['phone']; ?>" title="<?= myInfo()['phone']; ?>"><i class="fa-solid fa-phone fa-lg"></i></a>
            <a class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>"><i class="fa-brands fa-facebook fa-lg"></i></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/?blog">
                        <i class="fa-solid fa-newspaper"></i> Blog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="#">
                        <i class="fa-solid fa-rainbow"></i> Stadium
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/?fc">
                        <i class="fa-sharp fa-solid fa-people-group"></i> F.Club
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="class" href="/item">
                        <i class="fa-solid fa-shop"></i> Shop
                    </a>
                </li>
            </ul>
        </div>

        <div class="d-none d-lg-flex align-items-center">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" class="p-2"><i class="fa-solid fa-magnifying-glass fa-lg"></i></span>
            <a class="mx-1 px-2" href="tel:<?= myInfo()['phone']; ?>" title="<?= myInfo()['phone']; ?>"><i class="fa-solid fa-phone fa-lg"></i></a>
            <a class="mx-1 px-2" href="https://fb.com/<?= myInfo()['fb_page_id']; ?>" title="<?= myInfo()['fb_page_id']; ?>"><i class="fa-brands fa-facebook fa-lg"></i></a>
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
        <?php get_search_form(); 
        ?>
    </div>
</div>