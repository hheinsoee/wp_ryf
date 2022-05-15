<?php get_header(); ?>
<main id="site-content" role="main">

  <?php
  add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
      $title = single_cat_title('', false);
    } elseif (is_tag()) {
      $title = single_tag_title('', false);
    } elseif (is_author()) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
      $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
      $title = post_type_archive_title('', false);
    }
    return $title;
  });

  if (have_posts()) :
  ?>
    <div class="container row_3" style="flex-direction: row-reverse;">
      <div style="flex:3;padding-top:30px;" class="site-content container">
        <header class="page-header">
          <?php
          the_archive_title('<h1 class="m10">', '</h1>');
          the_archive_description('<div class="archive-description">', '</div>');

          ?>
        </header><!-- .page-header -->
        <div class="row g-lg-4 mt-2 g-md-3 g-2 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">

          <?php
          $index = 1;
          while (have_posts()) :
            the_post();
          ?>
            <div class="col">
              <?php
              $feature_content = array(1, 3, 5, 7);
              if (in_array($index, $feature_content)) {
                get_template_part('thumbnail', 'feature');
              } else {
                get_template_part('thumbnail', 'card');
              }
              $index++;
              ?>
            </div>
          <?php
          endwhile;
          ?>

        </div>
        <div class="">
          <?php
          the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => __('ရှေ့သို့', 'textdomain'),
            'next_text' => __('ယခင်သို့', 'textdomain'),
            'screen_reader_text' => __('&nbsp;')
          ));
          ?>
        </div>
      </div><!-- .site-content -->
    </div>
  <?php
  else :
  ?><div class="container p10">
      <header class="page-header">
        <?php
        the_archive_title('<h1>', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        the_posts_navigation();
        ?>
      </header><!-- .page-header -->
      <?php get_template_part('nocontent'); ?>
    </div><?php
        endif;

        get_footer();
