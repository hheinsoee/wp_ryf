<?php

function item_post()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('item', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('item', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('item', 'twentytwenty'),
        'parent_item_colon'   => __('Parent item', 'twentytwenty'),
        'all_items'           => __('item အားလုံး', 'twentytwenty'),
        'view_item'           => __('item ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('item သစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('item အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော itemများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('items', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'item', 'with_front' => false),
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
        'menu_icon'            => 'dashicons-products',

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
    register_post_type('item', $args);
    flush_rewrite_rules();
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'item_post');


/////////////////////////////////////////////////////////////////////////

function add_item()
{
    add_meta_box(
        'wpa-item',
        'item Imformation',
        'itemInput',
        'item', //item, post, page
        'advanced',
        'default',
        null
    );

    //   add_meta_box(
    //       string $id,
    //       string $title,
    //       callable $callback,
    //       string|array|WP_Screen $screen = null,
    //       string $context = 'advanced',
    //       string $priority = 'default',
    //       array $callback_args = null
    //       )

}
add_action('admin_menu', 'add_item');


function itemInput()
{
    global $post;
    wp_nonce_field('item', 'item_nonce');


    $meta = get_post_meta($post->ID, 'item', true);

    $price = @isset($meta['price']) ? @$meta['price'] : '';

?>
    Price
    <input type="number" name="item[price]" id="" placeholder="Price" min="0" value="<?php echo $price; ?>">Ks

<?php

}


add_filter('enter_title_here', 'item_title', 10, 2);
function item_title($title, $post)
{
    if ('item' == $post->post_type) {
        $title = 'item Name';
    }
    return $title;
}

add_action('save_post', 'item_save');
function item_save($post_id)
{
    global $custom_meta_fields;
    if (
        !isset($_POST['item_nonce']) ||
        !wp_verify_nonce($_POST['item_nonce'], 'item')
    )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    update_post_meta(
        $post_id,
        'item',
        $_POST['item']
    );
}

// add_action('wp_insert_post', 'change_slug');
// function change_slug($post_id)
// {

//     // Making sure this runs only when a 'item' post type is created
//     $slug = 'item';
//     if ($slug != $_POST['post_type']) {
//         return;
//     }


//     wp_update_post(array(
//         'ID' => $post_id,
//         'post_name' => $post_id // slug
//     ));
// }




//admin panel

function item_colums($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'image' => 'Image',
        'title' => 'အမည်',
        'brand' => 'တံဆိပ်',
        'tags' => 'tags',
    );
    return $columns;
}

add_filter('manage_item_posts_columns', 'item_colums');

function item_colums_data($column, $post_id)
{
    switch ($column) {
        case 'image':
            the_post_thumbnail('xs');
            break;
        case 'brand':
            if ($brands = get_the_terms($post_id, 'brand', true)) {
                foreach ($brands as $k => $brand) {
                    if ($k !== 0) echo ", ";
                    echo $brand->name;
                };
            }
            break;
        case 'tags':
            echo get_post_meta($post_id, 'item', true)['tags'];
            break;
    }
}
add_action('manage_item_posts_custom_column', 'item_colums_data', 10, 2);
?>