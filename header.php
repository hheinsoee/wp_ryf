<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="icon" type="image/x-icon" href="<?php //get_template_directory_uri();
													?>/assets/img/ryf.ico"> -->
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->

	<meta name="theme-color" content="#c70101">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php // wp_body_open();
	?>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId: 'your-app-id',
				autoLogAppEvents: true,
				xfbml: true,
				version: 'v13.0'
			});
		};
	</script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>


	<!-- nav start  -->
	<style>
		.scrolled-down {
			transform: translateY(-100%);
			transition: all 0.3s ease-in-out;
		}

		.scrolled-up {
			transform: translateY(0);
			transition: all 0.3s ease-in-out;
		}
	</style>
	<nav class="navbar shadow fixed-top __autohide navbar-expand-lg navbar-dark text-light bg-primary">
		<div class="container-fluid">
			<div>
				<a class="navbar-brand d-flex" href="/">
					<?php
					if (has_custom_logo()) {
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
					?>
						<img style="
					height: 7vmin;
					/* filter: drop-shadow(3px 0 0 white) drop-shadow(0 3px 0 white) drop-shadow(-3px 0 0 white) drop-shadow(0 -3px 0 white); */
					max-height: 50px;
					min-height: 30px;
					" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>">
						&nbsp;
					<?php
					}
					echo '<h1><b>' . get_bloginfo('name') . '</b></h1>';
					?>
				</a>
				<div style="position: absolute;">
				<?php social('fb_like', get_site_url()); ?>
				</div>
			</div>
			<div class="d-lg-none">
				<span class="bi bi-search" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">&nbsp;Search</span>
				&nbsp;
				<span type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</span>
			</div>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				wp_nav_menu(
					array(
						'menu' => 'main_menu',
						'theme_location' => 'main_menu',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll',
						'li-class' => 'nav-item',
						'a_class' => 'nav-link',
						'active_class' => 'active',
						//Process nav menu using our custom nav walker
						'walker' => new wp_bootstrap_navwalker()
					)
				);
				?>
			</div>
			<span class="bi bi-search d-none d-lg-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">&nbsp;Search</span>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {

			el_autohide = document.querySelector('.autohide');

			// add padding-top to bady (if necessary)
			navbar_height = document.querySelector('.navbar').offsetHeight;
			document.body.style.paddingTop = navbar_height + 'px';

			if (el_autohide) {
				var last_scroll_top = 0;
				window.addEventListener('scroll', function() {
					let scroll_top = window.scrollY;
					if (scroll_top < last_scroll_top) {
						el_autohide.classList.remove('scrolled-down');
						el_autohide.classList.add('scrolled-up');
					} else {
						el_autohide.classList.remove('scrolled-up');
						el_autohide.classList.add('scrolled-down');
					}
					last_scroll_top = scroll_top;
				});
				// window.addEventListener
			}
			// if

		});
	</script>