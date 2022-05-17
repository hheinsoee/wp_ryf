<?php
include __DIR__ . "/function/heinSEO.php";
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'gallery', 'video', 'link', 'image'));
add_image_size('tiny', 70, 70);
add_image_size('small', 200, 200);
add_image_size('medium', 400, 400);
add_image_size('big', 800, 800);
add_image_size('large', 1000, 1000);

function ryf_custom_logo_setup()
{
    $defaults = array(
        'height'               => 400,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'ryf_custom_logo_setup');

register_nav_menus(
    array(
        'main_menu' => __('Main Menu', 'ryf'),
        'blog_menu' => __('Blog Menu', 'ryf'),
        'foot_menu' => __('Foot Menu', 'ryf')
    )
);
// Register custom navigation walker
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// // bootstrap 
// function fontawesome()
// {
//     wp_register_script('fontawesome', 'https://kit.fontawesome.com/1afb5394df.js');
//     wp_enqueue_script('fontawesome');
//     wp_script_add_data( 'fontawesome', array( 'crossorigin' ) , array( 'anonymous' ) );
// }
// add_action('init', 'fontawesome');

function wpt_register_js()
{
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/dist/js/bootstrap.bundle.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action('init', 'wpt_register_js');

function wpt_register_css()
{
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/assets/dist/css/bootstrap.min.css');
    wp_enqueue_style('icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css');
    wp_enqueue_style('bootstrap.min');
}
add_action('wp_enqueue_scripts', 'wpt_register_css');

// fyf style 
function ryf_theme()
{
    wp_enqueue_style('ryf', get_template_directory_uri() . '/assets/css/style.css?v=' . filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
    wp_enqueue_script('ryf-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ryf_theme');


function footerScript()
{
    wp_enqueue_script('footer', get_template_directory_uri() . '/assets/js/foot.js', array('jquery'));
}
add_action('wp_footer', 'footerScript');


function hein_time($type = '')
{
    // $mm_time = new DateTimeZone('Asia/Rangoon');
    // $datetime->setTimezone($mm_time);
    // $datetime->
    // $time=get_the_time().' '.get_the_date();	

    $time_int = get_post_time('U', true);
    $now_int = strtotime(date("H:i:s d-M-Y"));

    $time_dif = $now_int - $time_int;
    $year = 60 * 60 * 24 * 30 * 12;
    $month = 60 * 60 * 24 * 30;
    $day = 60 * 60 * 24;
    $hour = 60 * 60;
    $min = 60;

    if ($time_dif < $hour) {
        $className = "blink_me";
    } else {
        $className = "";
    }
    switch ($type) {
        case 'date':
?>
            <time class="<?php echo $className; ?>">
                <span id="postTime" time="<?php echo $time_int; ?>"></span>
            </time>
        <?php
            break;
        case 'recent':
        ?>
            <time class="<?php echo $className; ?>">
                (
                <?php
                if ($time_dif >= $year) {
                    $long = round($time_dif / $year);
                    echo $long . 'နှစ်';
                    //echo $long>1?'s':'';
                    echo 'ခန့်က';
                } elseif ($time_dif >= $month) {
                    $long = round($time_dif / $month);
                    echo $long . 'လ';
                    //echo $long>1?'s':'';
                    echo 'ခန့်က';
                } elseif ($time_dif >= $day) {
                    $long = round($time_dif / $day);
                    echo $long . 'ရက်';
                    //echo $long>1?'s':'';
                    echo 'ခန့်က';
                } elseif ($time_dif >= $hour) {
                    $long = round($time_dif / $hour);
                    echo $long . 'နာရီကြာ';
                    //echo $long>1?'s':'';
                    echo 'ခန့်က';
                } elseif ($time_dif >= $min) {
                    $long = round($time_dif / $min);
                    echo $long . 'မိနစ်';
                    //echo $long>1?'s':'';
                    echo 'ခန့်က';
                } else {
                    echo 'ယခု';
                }
                ?>
                )
            </time>
        <?php
            break;
        default:
            $time_dif > $day * 7 ? hein_time('date') : hein_time('recent');
            break;
    }
    // echo ' <i>'.date("d-m-Y (D)",strtotime($time)).'</i>';
}
function social($type = '', $theUrl = null)
{

    $theUrl = $theUrl == null ? esc_url(get_permalink()) : $theUrl;
    switch ($type) {
        case 'fb_like':
        ?>
            <div class="fb-like" data-href="<?php echo $theUrl; ?>" data-width="300px" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
        <?php
            break;
        case 'fb_comment':
        ?>
            <div class="fb-comments" data-href="<?php echo $theUrl; ?>" data-width="" data-numposts="5"></div>
        <?php
            break;
        default:
        ?>
            <div class="d-flex">
                <div class="fb-like hein_facebook hein_facebook_like" data-href="<?php echo $theUrl; ?>" data-width="300px" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                <buttom type="button" id="hein_share" class="btn btn-primary btn-sm"><i class="fa fa-share-alt"></i>&nbsp;share</buttom>
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
