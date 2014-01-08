<?php
/*
Plugin Name: Google+ Tools
Description: Google+ tools, such as +1 button and rel="author" links
Author: Will Norris
Author URI: http://willnorris.com/
*/


/**
 * Add rel=author link to head.
 */
function google_plus_rel_author() {
  if ( defined('GOOGLE_PLUS_ID') ) {
    echo '<link rel="author me" href="https://plus.google.com/' . GOOGLE_PLUS_ID . '" />' . "\n";
  }
}
add_action('wp_head', 'google_plus_rel_author');


/**
 * Return a +1 button for the specified post.
 */
function plusone_button($id=null, $args = '') {
  if (!$id) {
    global $post;
    $id = $post->ID;
  }

  $defaults = array(
    'href' => get_permalink($id)
  );
  $args = wp_parse_args($args, $defaults);

  $attrs = '';
  foreach ($args as $key => $value) {
    $attrs .= ' data-' .$key . '="' . esc_attr($value) . '"';
  }

  return '<div class="plusone-button"><div class="g-plusone"' . $attrs . '></div></div>';
}


/**
 * Render a +1 button for the 'plusone' shortcode.
 */
function plusone_shortcode($args) {
  return plusone_button(null, $args);
}
add_shortcode('plusone', 'plusone_shortcode');


/**
 * Add the +1 button script.
 */
function plusone_script() {
?>
  <script>
    var plus = document.createElement('script'); plus.async = true;
    plus.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(plus, s);
  </script>
<?php
}
add_action('wp_footer', 'plusone_script');

