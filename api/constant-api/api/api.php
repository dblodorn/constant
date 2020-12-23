<?php
  require_once('utils.php');
  
  require_once('project-post-functions.php');
  require_once('projects.php');
  require_once('single-project.php');
  require_once('artists.php');
  require_once('single-artist.php');
  // ENDPOINTS //
  function main_data(){
    $data = array();
    $data['options'] = get_fields('options');
    $data['artists'] = all_artists();
    $data['projects'] = all_projects();
    return $data;
  }
  
  function api_setup_endpoints() {
    $namespace = 'api/v1';
    
    register_rest_route( $namespace, '/data/', array(
      'methods' => 'GET',
      'callback' => 'main_data'
    ));

    // will work like /route/?name=post-slug
    
    register_rest_route( $namespace, '/project/', array(
      'methods' => 'GET',
      'callback' => 'get_project_post'
    ));

    register_rest_route( $namespace, '/artist/', array(
      'methods' => 'GET',
      'callback' => 'get_artist_post'
    ));
  }

  add_action( 'rest_api_init', 'api_setup_endpoints' );
