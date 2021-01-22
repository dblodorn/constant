<?php
 
  function return_flex_video() {
    return array(
      'acf_fc_layout' => 'video',
      'copy' => get_sub_field( 'copy' ),
      'type' => get_sub_field( 'type' ),
      'url' => get_sub_field( 'url' ),
      'cover' => get_sub_field( 'cover' ),
      'autoplay' => get_sub_field( 'autoplay' ),
      'controls' => get_sub_field( 'controls' ),
      'muted' => get_sub_field( 'muted' ),
      'loops' => get_sub_field( 'loops' ),
    );
  }

  function return_flex_copy_block() {
    return array(
      'acf_fc_layout' => 'copy_block',
      'copy' => get_sub_field( 'copy' ),
    );
  }

  function return_flex_carousel() {
    $images = get_sub_field( 'images' );
    return array(
      'acf_fc_layout' => 'carousel',
      'images' => simple_slideshow_gallery($images),
      'image_fit' => get_sub_field( 'image_fit' ),
      'bullets' => get_sub_field( 'bullets' ),
      'autoplay' => get_sub_field( 'autoplay' ),
      'controls' => get_sub_field( 'controls' ),
    );
  }

  function return_flex_image_grid() {
    $images = get_sub_field( 'images' );
    return array(
      'acf_fc_layout' => 'image_grid',
      'images' => simple_slideshow_gallery($images),
      'type' => get_sub_field( 'type' ),
      'small_columns' => get_sub_field( 'small_columns' ),
      'medium_columns' => get_sub_field( 'medium_columns' ),
      'large_columns' => get_sub_field( 'large_columns' ),
      'grid_gap' => get_sub_field( 'grid_gap' ),
    );
  }

  function return_link_list() {
    $data = array();
    if ( have_rows( 'link_list' ) ) :
      while ( have_rows( 'link_list' ) ) : the_row();
        $data[] = array(
          'cta' => get_sub_field( 'link_cta' ),
          'url' => get_sub_field( 'link_url' ),
        );
      endwhile;
      return $data;
    else :
      return false;
    endif;
  }

  function return_flex_layout($id) {
    $fc_layout_modules = array();
    if ( have_rows( 'layout', $id ) ) :
      while ( have_rows( 'layout', $id ) ) : the_row();
        if(get_row_layout() == 'copy_block'):
          $data = return_flex_copy_block();
        elseif(get_row_layout() == 'carousel'):
          $data = return_flex_carousel();
        elseif(get_row_layout() == 'link_list'):
          $data = array(
            'acf_fc_layout' => 'link_list',
            'links' => return_link_list(),
          );
        elseif(get_row_layout() == 'image_grid'):
          $data = return_flex_image_grid();
        elseif(get_row_layout() == 'video'):
          $data = return_flex_video();
        else:
          $data = array(
            'acf_fc_layout' => 'blank'
          );
        endif;
        $fc_layout_modules[] = $data;
      endwhile;
    endif;
    return $fc_layout_modules;
  }

  function project_data($post, $p) {
    $type = $post->post_type;
    return array(
      'id' => $post->ID,
      'slug' => $post->post_name,
      'title' => $post->post_title,
      'post_type' => $type,
      'thumbnail' => return_thumb_url($post),
      'meta_description' => return_null_false(get_field( 'meta_description', $post->ID )),
      'key_image' => return_null_false(get_field( 'key_image', $post->ID )),
      'key_image_mask' => return_null_false(get_field( 'key_image_mask', $post->ID )),
      'feature_image_mask' => return_null_false(get_field( 'feature_image_mask', $post->ID )),
      'layout' => return_flex_layout($id)
    );
  }