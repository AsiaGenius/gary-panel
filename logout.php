<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_lifetime', 5); 
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool'); //is whirlpool that necessary?
ini_set('session.use_only_cookies', 1);
ini_set('session.hash_bits_per_character', 6);
ini_set('session.cookie_secure', 1);
ini_set('session.entropy_length', 512);
ini_set('session.use_trans_sid', 0);


$cookie_name = 'token';
$res = setcookie($cookie_name, '', time() - 3600);

ob_start();

session_unset();

session_destroy();



header("location: ../index.php");

?>