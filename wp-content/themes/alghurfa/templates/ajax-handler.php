<?php // ajax handlers
//mimic the actuall admin-ajax
define('DOING_AJAX', true);

if (!isset($_POST['action'])) {
  die('-1');
}

//make sure you update this line
//to the relative location of the wp-load.php
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once ($path.'wp-load.php');

//Typical headers
header('Content-Type: text/html');
send_nosniff_header();

//Disable caching
header('Cache-Control: no-cache');
header('Pragma: no-cache');

$action = esc_attr(trim($_POST['action']));

//A bit of security
$allowed_actions = array(
  'get_issue',
  'get_posttypes',
  'get_related_posts',
  'get_collaborators',
);

if (in_array($action, $allowed_actions)) {
  if (is_user_logged_in()) {
    add_action('MY_AJAX_HANDLER_'.$action.'', ''.$action.'_callback');
    do_action('MY_AJAX_HANDLER_'.$action);
  } else {
    add_action('MY_AJAX_HANDLER_nopriv_'.$action.'', ''.$action.'_callback');
    do_action('MY_AJAX_HANDLER_nopriv_'.$action);
  }
} else {
  die('-1');
}

?>