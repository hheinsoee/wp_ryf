<?php
$args=array(
'posts_per_page' => 50,    
'post_type' => 'my_custom_type'
'tax_query' => array(
    array(
        'taxonomy' => 'category', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat_id,
    ),
   ),
 );
$wp_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
    echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>