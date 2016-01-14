<?php

include "database_connection.php";

include "session.php";



if(isset($_POST["page"]) && !empty($_POST["page"]))

{


if($_POST["page"] == "users_senha")

	{

		$email = trim(strip_tags($_POST['emailr']));

		$login = trim(strip_tags($_POST['loginr']));

		$check_exist = mysql_query("select * from `login` where `userid` = '".mysql_real_escape_string($login)."' and '".mysql_real_escape_string($email)."'");


		if($email == "" || $login)

		{

			echo '<br><div class="info">Dados incompletos.</div><br>';

		}



		else if(mysql_num_rows($check_exist) < 1)

		{

			echo '<br><div class="info">Dados não encontrados!</div><br>';

		}


		else {


			$random_password = makeRandomPassword();
			$db_password = md5($random_password);
			
			if(mysql_query("update `login` set `user_pass` = '".$db_password."' where `userid` = '".$login."'"))

			{
				

				echo 'Senha alterada!';

				

			}









		     }



	}











	//Sign-up Page Starts here

	if($_POST["page"] == "users_registration")

	{

		$firstname = trim(strip_tags($_POST['firstname']));

		$lastname = trim(strip_tags($_POST['lastname']));

		$user_email = trim(strip_tags($_POST['correio']));
	
		$sex = trim(strip_tags($_POST['sexo']));

		$user_password = trim(strip_tags($_POST['passinha']));

		$encrypted_md5_password = md5($user_password);

		

		$check_for_duplicates = mysql_query("select * from `login` where `userid` = '".mysql_real_escape_string($firstname)."'");
		$check_for_duplicatesmail = mysql_query("select * from `login` where `email` = '".mysql_real_escape_string($user_email)."'");
				

		if($firstname == "" || $lastname == "" || $user_email == "" || $user_password == "" || $sex == "")

		{

			echo '<br><div class="info">Sorry, all fields are required to create a new account. Thanks.</div><br>';

		}

		elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $user_email))

		{

			echo '<br><div class="info">Sorry, Your email address is invalid, please enter a valid email address to proceed. Thanks.</div><br>';

		}

		else if(mysql_num_rows($check_for_duplicates) > 0)

		{

			echo '<br><div class="info">E-mail ou login consta em nossos bancos de dados!</div><br>';

		}
		else if(mysql_num_rows($check_for_duplicatesmail) > 0)

		{

			echo '<br><div class="info">E-mail ou login consta existe em nossos bancos de dados!</div><br>';

		}


		else

		{

			if(mysql_query("INSERT INTO login (userid, user_pass, email, birthdate, sex) VALUES ('".$firstname."','".$encrypted_md5_password."','".$user_email."','".$lastname."','".$sex."')"));

			{

				$_SESSION["sid"] = $user_email;
				$_SESSION["USER_FULLNAME"] = strip_tags($firstname.'&nbsp;'.$lastname);
				

				echo 'Cadastro realizado com sucesso!';

				

			}

			

		}

	}

	//Sign-up Page Ends here

	

	

	//Login Page Starts here

	elseif($_POST["page"] == "users_login") 

	{

		$user_email = trim(strip_tags($_POST['email']));

		$user_password = trim(strip_tags($_POST['passwd']));

		$encrypted_md5_password = md5($user_password);

		

		$validate_user_information = mysql_query("select * from `login` where `userid` = '".mysql_real_escape_string($user_email)."' and `user_pass` = '".mysql_real_escape_string($encrypted_md5_password)."'");

		

		if(mysql_num_rows($validate_user_information) == 1)

		{
			


			$get_user_information = mysql_fetch_array($validate_user_information);
			setcookie('token', base64_encode($_SESSION['token']),time()+600);
			$_SESSION["VALID_USER_ID"] = $user_email;
			$_SESSION["VALID_USER_PASS"] = $encrypted_md5_password;
			
			echo 'desktop.php?';
			echo 'yes';

			


		}

		else

		{

			echo '<br><div class="info">Sorry, you have provided incorrect information. Please enter correct user information to proceed. Thanks.</div><br>';

		}

	}

	//Login Page Ends here

}

?>