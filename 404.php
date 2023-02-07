<?php
get_header();
?>

<div class="d-flex justify-content-center align-items-center bg-primary text-light" style="height: 100vh;">
  <div>
    <div class="h1">404</div>
    <h2>Page not found!</h2>

    <div class="low">back to home</div>
    <a class="navbar-brand d-flex" href="/ ">
      <?php
      if (has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
      ?>
        <img crossOrigin="anonymous" style="
					height: 7vmin;
					/* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
					max-height: 60px;
					min-height: 40px;
					" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
        &nbsp;
      <?php
      }
      ?>
      <div style="line-height: 1vmin;" class="d-none d-sm-block">
        <h1 class="h4 my-1"><?= get_bloginfo('name'); ?></h1>
        <div style="position:absolute;font-size:9pt;"><?= get_bloginfo('description'); ?></div>
      </div>
    </a>
  </div>
</div>