<?php
get_header();

get_template_part('components/nav_small', null, 'shop');
$itemMeta = get_post_meta($post->ID, 'item', true);

?>

<div class="bg-secondary text-light sticky-top offsetNav">
    <?php get_template_part('components/shopCategories_nav'); ?>
</div>
<div class="bg-dark text-light py-3" style="min-height: 100vh;">
    <div class="row mx-auto" style="max-width: 800px;">
        <?php
        if (has_post_thumbnail()) {
        ?>
            <div class="col-12 col-sm-6">
                <img class="img" crossOrigin="anonymous" src="<?php echo images()['l']; ?>" alt="" style="width:100%">
            </div>
        <?php
        }
        ?>
        <div class="col">
            <div>
                <h5 class="p-1"><?php the_title('<b>', '</b>'); ?></h5>
                <div>
                    <price class="h5">
                        <?php echo number_format($itemMeta['price'] ? $itemMeta['price'] : 0) . " Ks"; ?>
                    </price>
                </div>
            </div>
            <div class="pt-5">
                <?php social(); ?>
                <div class="text-muted"><?php echo the_content(); ?></div>
            </div>
        </div>
    </div>

    <div>
        <h3>ဆက်စပ်ပစည်းများ</h3>
        <div class="row g-2">
            <?php
            $related = get_posts(
                array(
                    'post_type' => "item",
                    'category__in' => wp_get_post_categories($post->ID),
                    'numberposts' => 6,
                    'post__not_in' => array($post->ID)
                )
            );
            if ($related) foreach ($related as $post) {
                setup_postdata($post); ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <?php get_template_part('views/item/small', null, $post);
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
    <script type="application/ld+json">
        {
            "@context": "<?php echo home_url($wp->request); ?>",
            "@type": "Product",
            "name": "<?php echo get_the_title(); ?>",
            "description": "<?php echo $post->post_content; ?>",
            "offers": {
                "@type": "Offer",
                "price": <?php echo $itemMeta['price']; ?>,
                "priceCurrency": "MMK"
            }
        }
    </script>
<?php


get_footer();
wp_footer();
?>
</body>

</html>