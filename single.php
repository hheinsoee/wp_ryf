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
<main id="site-content" role="main">

	<?php

	if (have_posts()) {
	?>
		<article>
			<?php if (has_post_thumbnail()) {
			?>
				<div class="_image">
					<?php the_post_thumbnail('large'); ?>
				</div>
			<?php

				$is_image = true;
			} else {
				$is_image = false;
			}
			?>
			<header class="<?php if ($is_image) {
								echo "gradient";
							} ?>">
				<div>
					<div class="read_plane _p">
						<?php the_title('<h1>', '</h1>'); ?>
						<?php
						$post_categories = wp_get_post_categories(get_the_ID());
						foreach ($post_categories as $c) {
							$cat = get_category($c);
						?>
							<a class="_cat" href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
						<?php
						}
						?>
					</div>
				</div>
			</header>
			<div class="read_plane ">
				<div class="d-flex flex-wrap justify-content-between p">
					<div class="text-muted">
						<span><?php get_the_author_meta('display_name'); ?> </span>
						<span><?php hein_time('date'); ?> <?php hein_time('recent'); ?></span>
					</div>
					<div class="d-flex">
						<div class="flex-fill"></div>
						<?php social(); ?>
					</div>
				</div>
				<div class="entry-content p">
					<?php the_content(); ?>
				</div>
				<?php social('fb_comment'); ?>
			</div>

		</article>
	<?php
	}

	?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>