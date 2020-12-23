<?php
  function get_artist_post(WP_REST_Request $request){
    $slug = $request['name'];
    if ($slug) {
      $args = array(
        'name' => $slug,
        'post_type' => 'artist',
        'posts_per_page' => -1
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
          $post = get_post($post_id);
          $data = project_data($post, $p);
        endwhile;
      endif;
    }
    return $data;
  }
