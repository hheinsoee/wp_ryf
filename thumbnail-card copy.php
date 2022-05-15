<article>
    <a class="_thumbnail flex" href="<?php echo esc_url(get_permalink()); ?>">
        <div class="_media">
            <img src="https://assets.manutd.com/AssetPicker/images/0/0/16/147/1086298/GettyImages_12337801191650885693871_xlarge.webp" alt="<?php the_title(); ?>">
        </div>
        <div class="_content flex_col f_f">
            <div>
                <div class="_header">
                    <div class="_ani"></div>
                    <?php the_title('<h2>', '</h2>'); ?>
                </div>
                <div class="_body">
                    <?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...<i>see more</i>'), ENT_QUOTES, 'UTF-8') ?>
                </div>
            </div>
            <div class="_footer">
                <div class="flex f_f">
                    <div>
                        <span>1hr</span> | <span>category</span>
                    </div>
                    <span>share</span>
                </div>
            </div>
        </div>
    </a>
</article>