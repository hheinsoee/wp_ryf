<?php

/**
 * Template Name: Article
 * Template Post Type: post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<?php echo __FILE__; ?>

<main id="site-content" role="main">

	<?php

	if (have_posts()) {
	?>
		<article>
			<img class="_image" src="<?php echo get_template_directory_uri() . '/assets/img/football.webp'; ?> " alt="">
			<header>
				<div>
					<div class="read_plane _p">
						<?php the_title('<h1>', '</h1>'); ?>
					</div>
				</div>
			</header>
			<div class="read_plane _p">
				<div class="flex f_f">
					<span>author</span>
					<span>Monday 02 May 2022 18:30</span>
				</div>

				<div class="flex f_f">
					share buttom
				</div>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>

		</article>
	<?php
	}

	?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>