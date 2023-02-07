<?php

function player_post()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('player', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('player', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('player', 'twentytwenty'),
        'parent_item_colon'   => __('Parent player', 'twentytwenty'),
        'all_items'           => __('player အားလုံး', 'twentytwenty'),
        'view_item'           => __('player ကိုကြည့်ရန်', 'twentytwenty'),
        'add_new_item'        => __('player သစ်ထည့်ရန်', 'twentytwenty'),
        'add_new'             => __('အသစ်ထပ်ထည့်ရန်', 'twentytwenty'),
        'edit_item'           => __('player အချက်အလက်ပြင်ရန်', 'twentytwenty'),
        'update_item'         => __('ပြင်ဆင်ပြီး', 'twentytwenty'),
        'search_items'        => __('ရှိသော playerများ ရှာရန်', 'twentytwenty'),
        'not_found'           => __('မတွေ့ရှိပါ', 'twentytwenty'),
        'not_found_in_trash'  => __('ဘာမှမရှိ', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('players', 'twentytwenty'),
        'description'         => __('', 'twentytwenty'),
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'player', 'with_front' => false),
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
        'menu_icon'            => 'dashicons-groups',

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
    register_post_type('player', $args);
    flush_rewrite_rules();
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action('init', 'player_post');


/////////////////////////////////////////////////////////////////////////

function add_player()
{
    add_meta_box(
        'wpa-player',
        'player Imformation',
        'playerInput',
        'player', //player, post, page
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
add_action('admin_menu', 'add_player');


function playerInput()
{
    global $post;
    wp_nonce_field('player', 'player_nonce');


    $meta = get_post_meta($post->ID, 'player', true);

    $no = @isset($meta['no']) ? @$meta['no'] : '';
    $dob = @isset($meta['dob']) ? @$meta['dob'] : '';
    $pob = @isset($meta['pob']) ? @$meta['pob'] : '';

?>
    NO
    <input type="number" name="player[no]" id="" value="<?php echo $no; ?>">
    မွေးနိန့်
    <input type="date" name="player[dob]" id="" value="<?php echo $dob; ?>">
    ဇာတိ
    <input type="text" name="player[pob]" id="" value="<?php echo $pob; ?>">

<?php

}


add_filter('enter_title_here', 'my_enter_title_here', 10, 2);
function my_enter_title_here($title, $post)
{
    if ('player' == $post->post_type) {
        $title = 'Player Name';
    }
    return $title;
}

add_action('save_post', 'player_save');
function player_save($post_id)
{
    global $custom_meta_fields;
    if (
        !isset($_POST['player_nonce']) ||
        !wp_verify_nonce($_POST['player_nonce'], 'player')
    )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    update_post_meta(
        $post_id,
        'player',
        $_POST['player']
    );
}

// add_action('wp_insert_post', 'change_slug');
// function change_slug($post_id)
// {

//     // Making sure this runs only when a 'player' post type is created
//     $slug = 'player';
//     if ($slug != $_POST['post_type']) {
//         return;
//     }


//     wp_update_post(array(
//         'ID' => $post_id,
//         'post_name' => $post_id // slug
//     ));
// }




//admin panel

function custom_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'image' => 'Image',
        'title' => 'အမည်',
        'tags' => 'tags',
    );
    return $columns;
}

add_filter('manage_player_posts_columns', 'custom_columns');

function custom_columns_data($column, $post_id)
{
    switch ($column) {
        case 'image':
            the_post_thumbnail('xs');
            break;
        case 'tags':
            echo get_post_meta($post_id, 'player', true)['tags'];
            break;
    }
}
add_action('manage_player_posts_custom_column', 'custom_columns_data', 10, 2);
?>