<?php

/**
 * Customize the post endpoint for WP API and add support for filter parameter back in.
 *
 *
 * @link https://github.com/WP-API/rest-filter
 */
/**
 * Add post status, source, and source URL fields to API request
 */
add_action( 'rest_api_init', function() {
    
  register_rest_field( 
    'post',
    '_qod_quote_source',
    array(
      'get_callback'    => 'qod_get_quote_meta_fields',
      'update_callback' => 'qod_update_quote_meta_fields',
      'schema'          => null,
    )
  );
    
  register_rest_field( 
    'post',
    '_qod_quote_source_url',
    array(
      'get_callback'    => 'qod_get_quote_meta_fields',
      'update_callback' => 'qod_update_quote_meta_fields',
      'schema'          => null,
    )
  );
});
      
      
/**
 * Handler for fetching post meta fields.
 *
 * @param array           $object     Details of current post.
 * @param string          $field_name Name of field to add to response.
 * @param WP_REST_Request $request    Current request.
 * 
 * @return mixed
 */
function qod_get_quote_meta_fields( $object, $field_name, $request ) {
  return get_post_meta( $object['id'], $field_name, true );
}
      
/**
 * Handler for updating custom field data.
 *
 * @since 0.1.0
 *
 * @param mixed  $value      The value of the field.
 * @param object $object     The object from the response.
 * @param string $field_name Name of field.
 *
 * @return bool|int
 */
function qod_update_quote_meta_fields( $value, $object, $field_name ) {
  if ( ! $value || ! is_string( $value ) ) {
    return;
  }
  return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
}


function quotesAPI(){
    register_rest_route("quotes/v1", "post", array(
        "methods" => array(WP_REST_SERVER::READABLE, WP_REST_SERVER::CREATABLE),
        "callback" => "quotesResults"
    ));
}

add_action("rest_api_init", "quotesAPI");

// callback functionto get posts and create JSON
function quotesResults($data){

    $results = new WP_Query(array(
        "post_type" => "post",
        "posts_per_page" => -1
    ));

$resultsArr = array();

while($results->have_posts()):
    $results->the_post();

    array_push($resultsArr, array(
        "title" => get_the_title(),
        "content" => get_the_content(),
        "quotesURL" => get_post_meta(get_the_ID(), '_qod_quote_source', true),
        "quotesSource" => get_post_meta(get_the_ID(), '_qod_quote_source_url', true),
        "permalink" => get_the_permalink()
    ));
endwhile;

return $resultsArr;

}

;?>

