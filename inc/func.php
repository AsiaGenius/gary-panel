<?php

//RESETAR SENHA/////////////




if($_POST["tipo"] == "reset")
{

$escondido = "display:block";

include "database_connection.php";

$oldsenha = $_POST['oldsenha'];
$senha = $_POST['senha'];
$nsenha = $_POST['nsenha'];


if ($valid_user_pass !=  md5($oldsenha) ){
$status = "Atenчуo, Senha incorreta!";
}

elseif (md5($senha) != md5($nsenha)) {
$status = "Atenчуo, senhas nуo conferem!";
}

else {

$encrypted_md5_password = md5($nsenha);

$resetpass = mysql_query("update `login` set `user_pass` = '".$encrypted_md5_password."' where `userid` = '".$valid_user_id."'");


if(mysql_affected_rows() > 0){
$status = "Senha atualizada com sucesso!";

session_unset();

session_destroy();



header("location: index.php");
}else{
  $status = "Erro, tente novamente.".mysql_error();
}




}




} else {
$escondido = "display:none";
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





///CHAR RESET///

if($_POST["tipo"] == "charreset")
{





include "database_connection.php";

$escondidochar = "display:block";

$nick = $valid_user_id;

$result = mysql_query(" SELECT account_id FROM login WHERE userid='".$nick."'");


if (!$result) {
    echo "Erro contate o administrador!";
    exit;
}

$row = mysql_fetch_row($result);


$resetpass = mysql_query("update `char` set `last_map` = 'prontera' where `account_id` = '".$row[0]."'");

if (!$resetpass) {
    echo "Erro contate o administrador!";
    exit;
} else {
$escondidochar = "display:none";
}



} else {

$escondidochar = "display:none";

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




?>