<?php

function ry_photo_post()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('RY photo', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('RY photo', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('RY photo', 'twentytwenty'),
        'parent_item_colon'   => __('Parent RY photo', 'twentytwenty'),
        'all_items'           => __('RY photo အားလုံး', 'twentytwenty'),
        'view_item'           => __('RY photo ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('RY photo သစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('RY photo အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော RY photoများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('RY photos', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'ry_photo', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_os'       => 10,

        // Features this CPT supports in Post Editor
        'supports'           =>  array(
            'title',
            'editor',
            // 'author',
            // 'post-formats',
            'thumbnail',
            'excerpt',
            // 'comments',
            // 'revisions',
            // 'custom-fields',
        ),

        'taxonomies'          => array('post_tag'),
        'menu_icon'            => 'dashicons-embed-photo',

        // You can associate this CPT with a taxonomy or custom taxonomy.
        // 'taxonomies'          => array( 'post_tag', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => true,

        // important
        'show_in_rest'        => true

    );

    // Registering your Custom Post Type
    register_post_type('ry_photo', $args);
    flush_rewrite_rules();
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'ry_photo_post');


/////////////////////////////////////////////////////////////////////////



add_filter('enter_title_here', 'ry_photo_title', 10, 2);
function ry_photo_title($title, $post)
{
    if ('ry_photo' == $post->post_type) {
        $title = 'RY Photo Title';
    }
    return $title;
}

add_action('save_post', 'ry_photo_save');
function ry_photo_save($post_id)
{
    global $custom_meta_fields;
    if (
        !isset($_POST['ry_photo_nonce']) ||
        !wp_verify_nonce($_POST['ry_photo_nonce'], 'ry_photo')
    )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    update_post_meta(
        $post_id,
        'ry_photo',
        $_POST['ry_photo']
    );
}

// add_action('wp_insert_post', 'change_slug');
// function change_slug($post_id)
// {

//     // Making sure this runs only when a 'ry_photo' post type is created
//     $slug = 'ry_photo';
//     if ($slug != $_POST['post_type']) {
//         return;
//     }


//     wp_update_post(array(
//         'ID' => $post_id,
//         'post_name' => $post_id // slug
//     ));
// }




//admin panel

function ry_photo_colum($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'image' => 'Image',
        'title' => 'အမည်',
        'tags' => 'tags',
    );
    return $columns;
}

add_filter('manage_ry_photo_posts_columns', 'ry_photo_colum');

function ry_photo_colum_data($column, $post_id)
{
    switch ($column) {
        case 'image':
            the_post_thumbnail('xs');
            break;
        case 'tags':
            echo get_post_meta($post_id, 'ry_photo', true)['tags'];
            break;
    }
}
add_action('manage_ry_photo_posts_custom_column', 'ry_photo_colum_data', 10, 2);
?>