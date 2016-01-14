<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_lifetime', 0); 
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool'); //is whirlpool that necessary?
ini_set('session.use_only_cookies', 1);
ini_set('session.hash_bits_per_character', 6);
ini_set('session.cookie_secure', 1);
ini_set('session.entropy_length', 512);
ini_set('session.use_trans_sid', 0);


$sess_name = session_name();


if (session_start()){

session_regenerate_id(); 

// Store some stuff...
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

// Set a cookie
// Not a super secure token, but better than user/pass in cookies.
// Point here is just to show that it must be done before any output or before the redirection header.
$_SESSION['token'] = time() . rand() . $_SERVER['SERVER_NAME'].$_SESSION['ip'];

if (!isset($_COOKIE["token"])){

setcookie('token', $_SESSION['token'],time()+100);
$_SESSION['loggedin_time'] = time();

}





}



?>