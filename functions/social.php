<?php
function social($theUrl = null, $type = null)
{
    $theUrl = $theUrl == null ? esc_url(get_permalink()) : $theUrl;
    switch ($type) {
        case 'fb_like':
?>
            <div class="fb-like" data-href="<?php echo $theUrl; ?>" data-width="300px" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
        <?php
            break;
        case 'fb_comment':
        ?>
            <div class="fb-comments" data-href="<?php echo $theUrl; ?>" data-width="100%" data-numposts="5"></div>
        <?php
            break;
        default:
        ?>
            <div class="d-inline-flex flex-wrap align-items-center">
                <div class="fb-like hein_facebook hein_facebook_like m-1 " data-href="<?php echo $theUrl; ?>" data-width="300px" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                <buttom type="button" id="hein_share" class=" m-1 btn btn-primary text-light py-0 d-inline-flex
    justify-conten-center
    align-items-center">share external&nbsp;<i class="fa-solid fa-share"></i></buttom>
            </div>
            <script>
                const shareData = {
                    title: '<?php echo the_title(); ?>',
                    text: '<?php echo html_entity_decode(wp_trim_words(get_the_excerpt(), 40), ENT_QUOTES, 'UTF-8'); ?>',
                    url: '<?php echo $theUrl; ?>',
                }

                const btn = document.getElementById('hein_share');
                // const resultPara = document.querySelector('.result');

                // Must be triggered some kind of "user activation"
                btn.addEventListener('click', async () => {
                    try {
                        await navigator.share(shareData)
                        // resultPara.textContent = 'MDN shared successfully'
                    } catch (err) {
                        // resultPara.textContent = 'Error: ' + err
                    }
                });
            </script>
<?php
            # code...
            break;
    }
}
