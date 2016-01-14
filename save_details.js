




function users_registration() 

{

	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var sese = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
	var firstname = $("#firstname").val();
	var sexo = $("#sexo").val();
	var ano = $("#lastname").val();
	var mes = $("#mes").val();
	var dia= $("#dia").val();
	var separador= "-"
	var lastname = ano+separador+mes+separador+dia

	var correio = $("#correio").val();

	var passinha = $("#passinha").val();
	var passinhas = $("#passinhas").val();

	

	if(firstname == "")

	{

		$("#signup_status").html('<div class="info">Digite seu login!</div>');

		$("#firstname").focus();

	}

	else if(sese.test(passinha) == false )

	{

		$("#signup_status").html('<div class="info">Sua senha deve possuir no mínimo 6 dígitos, incluindo números, letras (maisculas e minusculas).</div>');

		$("#passinha").focus();

	}


	else if(lastname == "")

	{

		$("#signup_status").html('<div class="info">Digite sua data de nascimento!</div>');

		$("#lastname").focus();

	}

	else if(mes == "")

	{

		$("#signup_status").html('<div class="info">Digite sua data de nascimento!</div>');

		$("#mes").focus();

	}

	else if(dia == "")

	{

		$("#signup_status").html('<div class="info">Digite sua data de nascimento!</div>');

		$("#dia").focus();

	}

	else if(correio == "")

	{

		$("#signup_status").html('<div class="info">Digite seu email!</div>');

		$("#correio").focus();

	}


	else if(reg.test(correio) == false)

	{

		$("#signup_status").html('<div class="info">E-mail inválido.</div>');

		$("#correio").focus();

	}

	else if(passinha == "")

	{

		$("#signup_status").html('<div class="info">Informe sua senha!</div>');

		$("#passinha").focus();

	}

	


	else if(passinha != passinhas)

	{

		$("#signup_status").html('<div class="info">As senhas não são iguais!</div>');

		$("#passinhas").focus();

	}

	else

	{

		var dataString = 'sexo='+ sexo +'&firstname='+ firstname + '&lastname=' + lastname + '&correio=' + correio + '&passinha=' + passinha + '&page=users_registration';

		$.ajax({

			type: "POST",

			url: "save_details.php",

			data: dataString,

			cache: false,

			beforeSend: function() 

			{

				$("#signup_status").html('<br clear="all"><br clear="all"><div align="left"><font style="font-family:Verdana, Geneva, sans-serif; font-size:15px; color:black;">Aguarde...</font> </div><br clear="all">');

			},

			success: function(response)

			{

				var response_brought = response.indexOf('yess');

				if (response_brought != -1) 

				{

					$("#signup_status").html('');

					window.location.replace(response);

				}

				else

				{

					$("#signup_status").fadeIn(1000).html(response);

				}

			}

		});

	}

}



function users_login() 

{

	var email = $("#email").val();

	var passwd = $("#passwd").val();

	

	if(email == "")

	{

		$("#login_status").html('<div class="info">Informe seu login corretamente!</div>');

		$("#email").focus();

	}

	else if(passwd == "")

	{

		$("#login_status").html('<div class="info">Informe sua senha corretamente!</div>');

		$("#passwd").focus();

	}



	else



	{

		var dataString = 'email=' + email + '&passwd=' + passwd + '&page=users_login';

		$.ajax({

			type: "POST",

			url: "save_details.php",

			data: dataString,

			cache: false,

			beforeSend: function() 

			{

				$("#login_status").html('<br clear="all"><br clear="all"><div align="left"><font style="font-family:Verdana, Geneva, sans-serif; font-size:15px; color:black;">Aguarde...</font> </div><br clear="all">');

			},

			success: function(response)

			{

				var response_brought = response.indexOf('yes');

				if (response_brought != -1) 

				{

					$("#login_status").html('');

					window.location.replace(response);

				}

				else

				{

					$("#login_status").fadeIn(1000).html(response);

				}

			}

		});

	}

}







