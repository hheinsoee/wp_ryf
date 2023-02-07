<?php
$fc = get_queried_object();
if (isset($_GET['json'])) {

    include(get_template_directory() . '/functions/api.php');
} else {
?>
    <?php get_header(); ?>
    <?php get_myNav(); ?>
    <div class="color_bg<?php echo $fc->term_id; ?> color_text<?php echo $fc->term_id; ?>" style="min-height:90vh;">
        <div class="py-5">
            <center>
                <?php
                if ($logo = get_field('logo', 'fc_' . $fc->term_id)) {
                ?>
                    <img crossOrigin="anonymous" class="logo" id="img_<?php echo $fc->term_id; ?>" src="<?php echo $logo; ?>" alt="<?php echo $fc->name; ?>">
                <?php
                } ?>
                <h2><?php echo $fc->name; ?></h2>
                <?php echo $fc->description; ?>
                <br />
                <?php social(get_term_link($fc->term_id)); ?>
            </center>
        </div>
        <?php //Show Player 
        ?>
        <div class="container text-light my-5" style="max-width: 600px;">
            <center>
                <h2 class="h4">Players</h2>
            </center>
            <table class="table text-light" style="border: none;">

                <tbody>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'player',      // name of post type.   
                        'posts_per_page' => -1, 
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'fc',   // taxonomy name
                                'field' => 'term_id',           // term_id, slug or name
                                'terms' => $fc->term_id,                  // term id, term slug or term name
                            )
                        )
                    ));

                    while ($query->have_posts()) :
                        $query->the_post();
                        $playerMeta = get_post_meta($post->ID, 'player', true);
                    ?>
                        <tr>
                            <td style="width: 90px;">
                                <div class="media" style="padding-bottom: 100%;">
                                    <?php
                                    if (images()['s']) {
                                    ?>
                                        <img crossOrigin="anonymous" loading="lazy" alt="<?php echo $post->post_title; ?>" src="<?php echo images($post->ID)['s']; ?>" />
                                    <?php
                                    } else {
                                    ?>
                                        <div class="bg-dark img"></div>
                                    <?php
                                    };
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div class="h1 m-0"><?php echo @$playerMeta['no']; ?></div>
                                <?php echo $post->post_title; ?>
                            </td>
                            <td>
                                <?php
                                $date = new DateTime($playerMeta['dob']);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                ?>
                                <span><?php echo $interval->y . " years"; ?></span>
                                <div class="low small">
                                    <i>
                                        <span>from <?php echo @$playerMeta['pob']; ?></span>
                                    </i>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="container border-top">
            <h3 class="h6 my-4"><?php echo $fc->name; ?> နှင့် ဆက်စပ် အကြောင်းအရာများ</h3>
            <div class="row g-1">
                <?php
                while (have_posts()) :
                    the_post();
                ?><div class="col-12 col-sm-6 col-md-4 col-lg-3 m-2 color_border<?php echo $fc->term_id; ?>">
                        <?php
                        get_template_part('views/posts/small', null, $post);
                        ?>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>


    </div>
    <script>
        var fac<?php echo $fc->term_id; ?> = new FastAverageColor();

        fac<?php echo $fc->term_id; ?>.getColorAsync(document.querySelector('#img_<?php echo $fc->term_id; ?>'))
            .then(color => {
                var hue = hexToHSL((color.hex).replace('#', '')).h;

                var bg<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_bg<?php echo $fc->term_id; ?>');
                var text<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_text<?php echo $fc->term_id; ?>');
                var border<?php echo $fc->term_id; ?> = document.querySelectorAll('.color_border<?php echo $fc->term_id; ?>');

                [].forEach.call(bg<?php echo $fc->term_id; ?>, function(el) {
                    el.style.background = `radial-gradient(circle at center, hsl(${hue}, 80% , 15%),hsl(${hue}, 80% , 5%))`;
                });
                [].forEach.call(text<?php echo $fc->term_id; ?>, function(el) {
                    el.style.color = `hsl(${hue}, 100% , 85%)`;
                });
                [].forEach.call(border<?php echo $fc->term_id; ?>, function(el) {
                    el.style.borderBottom = `1pt solid hsl(${hue}, 100% , 50%)`;
                    el.style.paddingBottom = `10pt`;
                });
            })
            .catch(e => {
                console.log(e);
            });
    </script>

    <?php
    get_footer();
    wp_footer();
    ?>
<?php
}
?>