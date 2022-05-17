<?php
wp_nav_menu(
    array(
        'menu' => 'blog_menu',
        'theme_location' => 'blog_menu',
        'depth' => 2,
        'container' => false,
        'menu_class' => 'nav nav-tabs',
        'li-class' => 'nav-item',
        'a_class' => 'nav-link',
        'active_class' => 'active',
        //Process nav menu using our custom nav walker
        'walker' => new wp_bootstrap_navwalker()
    )
);
