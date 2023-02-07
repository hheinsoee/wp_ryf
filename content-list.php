<a href="<?php echo esc_url(get_permalink()); ?>">
	<div class="">
		<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
		<div class="low small"><?=date("d-m-Y", get_post_time('U', true));?></div>
		<div>
			<small class="card-text"><?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8') ?></small>
		</div>
	</div>
</a>