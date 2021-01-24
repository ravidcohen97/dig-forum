<?php 

session_start();
$uid = $_SESSION['user_id'] ?? null;
if( ! $uid ) header('location: signin.php');

require_once 'app/helpers.php';
$pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);
$pid = trim($pid);

if( $pid && is_numeric($pid) ){

  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
  $pid = mysqli_real_escape_string($link, $pid);
  $sql = "DELETE FROM posts WHERE id = $pid AND user_id = $uid";
  $result = mysqli_query($link, $sql);

  if( $result && mysqli_affected_rows($link) > 0 ){
    header('location: blog.php');
  } else {
    header('location: blog.php');
  }

}