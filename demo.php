<?php 

$password = '123456';
$hash = password_hash($password, PASSWORD_BCRYPT);

if( password_verify($password, $hash) ){

  echo 'match!';

}