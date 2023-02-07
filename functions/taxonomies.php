<?php

function create_brand()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Brands', 'taxonomy general name'),
        'singular_name' => _x('Brands', 'taxonomy singular name'),
        'search_items' =>  __('Search Brands'),
        'popular_items' => __('Popular Brands'),
        'all_items' => __('All Brands'),
        'parent_item' => __('Parent Brands'),
        'parent_item_colon' => __('Parent Brands:'),
        'edit_item' => __('Edit Brands'),
        'update_item' => __('Update Brands'),
        'add_new_item' => __('Add New Brands'),
        'new_item_name' => __('New Brands Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'item_category', 'with_front' => false),
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true,
        'show_option_none' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'has_archive' => true,
        'show_in_rest' => true,

    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('brand', ['item'], $args);
    flush_rewrite_rules();
}
add_action('init', 'create_brand', 0);
















function create_item_category()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Item Category', 'taxonomy general name'),
        'singular_name' => _x('Item Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Item Category'),
        'popular_items' => __('Popular Item Category'),
        'all_items' => __('All Item Category'),
        'parent_item' => __('Parent Item Category'),
        'parent_item_colon' => __('Parent Item Category:'),
        'edit_item' => __('Edit Item Category'),
        'update_item' => __('Update Item Category'),
        'add_new_item' => __('Add New Item Category'),
        'new_item_name' => __('New Item Category Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'item_category', 'with_front' => false),
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true,
        'show_option_none' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'has_archive' => true,
        'show_in_rest' => true,

    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('item_category', ['item'], $args);
    flush_rewrite_rules();
}
add_action('init', 'create_item_category', 0);





























function create_fc()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Fooball Club', 'taxonomy general name'),
        'singular_name' => _x('Fooball Club', 'taxonomy singular name'),
        'search_items' =>  __('Search Fooball Club'),
        'popular_items' => __('Popular Fooball Club'),
        'all_items' => __('All Fooball Club'),
        'parent_item' => __('Parent Fooball Club'),
        'parent_item_colon' => __('Parent Fooball Club:'),
        'edit_item' => __('Edit Fooball Club'),
        'update_item' => __('Update Fooball Club'),
        'add_new_item' => __('Add New Fooball Club'),
        'new_item_name' => __('New Fooball Club Name'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'fc', 'with_front' => false),
        'public' => true,
        'publicly_queryable'  => true,
        'show_ui' => true,
        'show_option_none' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'has_archive' => true,
        'show_in_rest' => true,

    );

    /* register_taxonomy() to register taxonomy
*/
    register_taxonomy('fc', ['post', 'player'], $args);
    flush_rewrite_rules();
}
add_action('init', 'create_fc', 0);











if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_6356be53de0d1',
        'title' => 'tast',
        'fields' => array(
            array(
                'key' => 'field_6356be54cd143',
                'label' => 'logo',
                'name' => 'logo',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'preview_size' => 'medium',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'fc',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 1,
    ));

endif;
