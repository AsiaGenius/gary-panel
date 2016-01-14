<?php
include "func/database_connection.php";


//This code runs if the form has been submitted
if (isset($_POST['submit']))
{

$email = $_POST['remail'];
$login = $_POST['rlogin'];

// checks if the username is in use
$check = mysql_query("SELECT email FROM login WHERE email = '$email' and userid = '$login'")or die(mysql_error());
$check2 = mysql_num_rows($check);

//if the name exists it gives an error
if ($check2 == 0) {
echo 'Não encontramos os dados fornecidos!';
exit;
}

// if no errors then carry on
if (!$error) {

$query = mysql_query("SELECT email FROM login WHERE email = '$email' ")or die (mysql_error());
$r = mysql_fetch_object($query);

//create a new random password

$password = substr(md5(uniqid(rand(),1)),3,10);
$pass = md5($password); //encrypted version for database entry

//send email
$to = "$email";
$subject = "legendRO";
$body = "Nova senha legendRO; $password";
$additionalheaders = "From: <financeiro@legendro.com.br>rn";
$additionalheaders .= "Reply-To: financeiro@legendro.com.br";
mail($to, $subject, $body, $additionalheaders);

//update database
$sql = mysql_query("UPDATE login SET user_pass='$pass' WHERE email = '$email'")or die (mysql_error());
$rsent = true;
header("Location:../index.php?i=r");

}// close errors
}// close if form sent

?>