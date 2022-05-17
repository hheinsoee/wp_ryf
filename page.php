<?php get_header(); ?>
<div>
	<?php
	if (have_posts()) :

		while (have_posts()) :

			the_post();
	?>
			<div>
				<article style="flex:3" class="read_plane" <?php post_class(); ?>>
					<?php
					if (has_post_thumbnail()) {
					?>
						<div id='photo_<?php echo get_the_ID(); ?>'>
							<?php the_post_thumbnail('large'); ?>
						</div>
					<?php
					} else {
						echo "<br/><br/>";
					}
					?>
					<header class="entry-header m10">
						<?php the_title('<h1 class="entry-title">', '</h1>'); 
						edit_post_link(__('edit'), ''); ?>
					</header>

					<div class="entry-content  class=" container"">
						<?php the_content(); ?>
					</div>
					<! – .entry-content –>
						<div class="userActionBar">
							<?php social(''); ?>
						</div>
				</article>
				<! – #post-## –>
			</div>
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;


		endwhile;

	else :
		?>
		<article class="no-results">

			<header class="entry-header">
				<h1 class="page-title"><?php esc_html_e('Nothing Found', 'western-news'); ?></h1>
			</header>
			<! – .entry-header –>

				<div class="entry-content">
					<p><?php esc_html_e('It looks like nothing was found at this location.', 'western-news'); ?></p>
				</div>
				<! – .entry-content –>

		</article>
		<! – .no-results –>
		<?php
	endif;
		?>
</div>
<! – .site-content –>

	<?php get_footer(); ?>
	<?php wp_footer(); ?>