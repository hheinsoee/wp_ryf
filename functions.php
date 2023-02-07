<?php
include_once(__DIR__ . "/functions/seo.php");
include_once(__DIR__ . "/functions/taxonomies.php");
include_once(__DIR__ . "/functions/menus.php");
include_once(__DIR__ . "/functions/social.php");
include_once(__DIR__ . "/functions/_player.php");
include_once(__DIR__ . "/functions/_item.php");
include_once(__DIR__ . "/functions/_ry_photo.php");
include_once(__DIR__ . "/services/time.php");
// include_once(__DIR__ . "/functions/metabox.php");

function myInfo()
{
    $json = file_get_contents(get_template_directory_uri() . '/assets/json/info.json');
    $json_data = json_decode($json, true);
    return $json_data;
}

//image sizing
add_image_size('xs', 70, 70);
add_image_size('s', 200, 200);
add_image_size('m', 400, 400);
add_image_size('l', 800, 800);
add_image_size('xl', 1000, 1000);
function images($id=null)
{
    return array(
        "xs" => get_the_post_thumbnail_url($id, 'xs'),
        "s" => get_the_post_thumbnail_url($id, 's'),
        "m" => get_the_post_thumbnail_url($id, 'm'),
        "l" => get_the_post_thumbnail_url($id, 'l'),
        "xl" => get_the_post_thumbnail_url($id, 'xl'),
        "full" => get_the_post_thumbnail_url($id)
    );
}
function get_Mynav()
{
    include(get_template_directory() . '/components/nav.php');
}
function hein_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'hein_theme_support');


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



//bootstrap start

function wpt_register_css()
{
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap.min');
}
add_action('wp_enqueue_scripts', 'wpt_register_css');


function wpt_register_js()
{
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', 'jquery');
    wp_register_script('myScript', get_template_directory_uri() . '/assets/js/index.js');
    wp_register_script('color', get_template_directory_uri() . '/assets/js/color.js');
    wp_enqueue_script('jquery.bootstrap.min');
    wp_enqueue_script('myScript');
    wp_enqueue_script('color');
}
add_action('init', 'wpt_register_js');

//bootstrap end



// fontAwesome 
function fontAwesome()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.css', array(), $version, 'all');
    wp_enqueue_style('brands', get_template_directory_uri() . '/assets/fontawesome/css/brands.css', array(), $version, 'all');
    wp_enqueue_style('solid', get_template_directory_uri() . '/assets/fontawesome/css/solid.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'fontAwesome');

function hein_register_style()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('hein_style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    wp_enqueue_style('slider', get_template_directory_uri() . '/assets/css/slider.css', array(), $version, 'all');
    wp_enqueue_style('bootstrap-overwrite', get_template_directory_uri() . '/assets/css/bootstrap-overwrite.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'hein_register_style');

function hein_register_script()
{
    wp_enqueue_script('hein_script', get_template_directory_uri() . '/assets/js/index.js', array(), $version);
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', array(), $version);
}
add_action('wp_enqueue_scripts', 'hein_register_script');


function footerScript()
{
?>
    <script src="<?= get_template_directory_uri() . '/assets/js/footer.js'; ?>"></script>
<?php
}
add_action('wp_footer', 'footerScript');


// important အမှားကာကွယ်ရန်
function wpdocs_remove_menus()
{

    // remove_menu_page( 'index.php' ); //Dashboard
    remove_menu_page('jetpack'); //Jetpack*
    // remove_menu_page( 'edit.php' ); //Posts
    // remove_menu_page( 'upload.php' ); //Media
    // remove_menu_page( 'edit.php?post_type=page' ); //Pages
    remove_menu_page('edit-comments.php'); //Comments
    // remove_menu_page( 'themes.php' ); //Appearance
    // remove_menu_page('plugins.php'); //Plugins
    // remove_menu_page( 'users.php' ); //Users
    remove_menu_page('tools.php'); //Tools
    // remove_menu_page( 'options-general.php' ); //Settings

}
/**
 * Remove Appearance > Themes and Appearance > Theme Editor admin menu items
 */
function wpdd_remove_menu_items()
{
// remove_submenu_page('themes.php', 'themes.php');
remove_submenu_page('themes.php', 'theme-editor.php');
}
add_action('admin_menu', 'wpdocs_remove_menus');
add_action('admin_menu', 'wpdd_remove_menu_items', 999);