<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool'); //is whirlpool that necessary?
ini_set('session.use_only_cookies', 1);
ini_set('session.hash_bits_per_character', 6);
ini_set('session.cookie_secure', 0);
ini_set('session.entropy_length', 512);
ini_set('session.use_trans_sid', 0);


session_start();
ob_start();


$sess_name = session_name();



session_regenerate_id(); 




// Store some stuff...
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

// Set a cookie
// Not a super secure token, but better than user/pass in cookies.
// Point here is just to show that it must be done before any output or before the redirection header.
$_SESSION['token'] = $_SERVER['SERVER_NAME'].$_SESSION['ip'];




$valid_user_id = trim($_SESSION["VALID_USER_ID"]);
$valid_user_pass = trim($_SESSION["VALID_USER_PASS"]);


include "database_connection.php";

$nick = $valid_user_id;
$result = mysql_query(" SELECT account_id FROM login WHERE userid='".$nick."'");
if (!$result) {
    echo "Erro 119987, contate o administrador!";
    exit;
}
$nick= mysql_fetch_row($result);
$check_for_voteuser = mysql_query("select * from `cp_v4p_voters` where `account_id` = '".$nick[0]."'");
if(mysql_num_rows($check_for_voteuser) < 1)
{
mysql_query("INSERT INTO cp_v4p_voters (account_id, points) VALUES ('".$nick[0]."','0')");
}


function makeRandomPassword() { 
          $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
          } 
          return $pass; 
    } 

?>