<?php
require_once 'inc/shortcode.php';

/** add styles and scripts **/
function ydownloader_scripts()
{
  wp_enqueue_script('ydownloader_scripts', plugin_dir_url(__FILE__) . 'inc/script.js', array('jquery'));
  wp_localize_script('ydownloader_scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
function ydownloader_styles()
{
  wp_enqueue_style('ydownloader_styles', plugin_dir_url(__FILE__) . 'inc/style.css');
}
add_action('wp_enqueue_scripts', 'ydownloader_scripts');
add_action('wp_enqueue_scripts', 'ydownloader_styles');

/** Ajax Call */
function get_data()
{
  $video_url = $_POST['videoUrl'];
  $url = filter_var($video_url, FILTER_SANITIZE_URL);
  if (!empty($url)) {
    if (strpos($url, 'youtube.com') !== false) {
      $url1 = parse_url($url, PHP_URL_QUERY);
      parse_str($url1, $url2);
      $imgId = $url2['v'];
      if (!empty($imgId)) {
        echo $imgId;
      } else {
        echo 0;
      }
    } elseif (strpos($url, 'youtu.be') !== false) {
      $url1 = parse_url($url, PHP_URL_PATH);
      $url2 = trim($url1, '/');
      $imgId = $url2;
      if (!empty($imgId)) {
        echo $imgId;
      } else {
        echo 0;
      }
    } else {
      echo 0;
    }
  } else {
    echo 0;
  }

  wp_die();  //die();
}

add_action('wp_ajax_nopriv_get_data', 'get_data');
add_action('wp_ajax_get_data', 'get_data');
