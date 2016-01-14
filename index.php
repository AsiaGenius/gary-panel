<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_lifetime', 5); 
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool'); //is whirlpool that necessary?
ini_set('session.use_only_cookies', 1);
ini_set('session.hash_bits_per_character', 6);
ini_set('session.cookie_secure', 0);
ini_set('session.entropy_length', 512);
ini_set('session.use_trans_sid', 0);


$cookie_name = 'token';
$res = setcookie($cookie_name, '', time() - 3600);

ob_start();

session_unset();

session_destroy();


$reset = $_GET['i'];

if ($reset == "r"){

$avisa = "<span style='color:red'>Sua nova senha foi enviada para o seu endereço de e-mail!</span>";

}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Painel legendRO</title>


<link rel="stylesheet" type="text/css" media="all" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<script type="text/javascript" src="../files/jquery-1.7.2.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="save_details.js"></script>




  </head>





  <body>

<style>
body {
background-color: #565353;
}
</style>


<!-- Facebook Conversion Code for Cadastros - legendRO muito bom -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6033828315719', {'value':'0.00','currency':'BRL'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6033828315719&amp;cd[value]=0.00&amp;cd[currency]=BRL&amp;noscript=1" /></noscript>



<div class="container">

<div style="    margin: auto;
    width: 320px;
    height: 100px;
    margin-top: 40px;
    margin-bottom: -23px;">
<img src="http://i.imgur.com/Rk0OZZZ.png">
</div>
    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Acesso</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a onclick="$('#loginbox').hide(); $('#recoverbox').show()" href="#">Esqueceu a senha?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginformacesso" class="form-horizontal" role="form" method="post" action="save_details.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="username" value="" placeholder="login">                                        
                                    </div>
                                


 





                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="passwd" type="password" class="form-control" name="password" placeholder="senha">
					<input id="page" type="hidden" value="users_login">
                                    </div>
                                    

                                <div class="g-recaptcha" data-sitekey="6LfI9BMTAAAAADJdluIdPoOQvSB1fCLZ8md_r3b9"></div>

                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar dados
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="logar" href="javascript:void(0);" class="btn btn-success acessaraconta">Acessar</a>
               
<div class="lebels_fields" align="left" id="login_status"><?php echo $avisa; ?></div><br clear="all">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Não tem uma conta? 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Cadastre-se!
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>


<script>
 $(".acessaraconta").click(function () {
    /* Check if the captcha is complete */
    if ($("#g-recaptcha-response").val()) {
        $.ajax({
            type: 'POST',
            url: "verify.php", // The file we're making the request to
            dataType: 'html',
            async: true,
            data: {
                captchaResponse: $("#g-recaptcha-response").val() // The generated response from the widget sent as a POST parameter
            },
            success: function (data) {
                users_login();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#login_status").html('<div class="info">Bot!</div>');
            }
        });
    } else {
       $("#login_status").html('<div class="info">Resolva o Catpcha!</div>');


    }
});
</script>



<div id="recoverbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Recuperar Senha</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a onclick="$('#loginbox').show(); $('#recoverbox').hide()" href="#">Login?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="reset.php" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="remail" type="text" class="form-control" name="remail" value="" placeholder="e-mail utilizado na conta">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="rlogin" type="text" class="form-control" name="rlogin" placeholder="login">
					<input id="recuperar" type="hidden" value="recuperar">
                                    </div>
			<div class="lebels_fields" align="left" id="login_status-reset"></div>
                                    
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button id="submit" name="submit" class="btn btn-success">Recuperar Senha</a>
                                      

                                    </div>

                                </div>


                                  
                            </form>     



                        </div>                     
                    </div>
</div>



        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Cadastro</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Logar</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Login</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="firstname" placeholder="Informe seu login">
                                    </div>
                                </div>

				<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">E-mail</label>
                                    <div class="col-md-9">
					<input type="text" class="form-control" id="correio" placeholder="Informe seu email" value="" >
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Sua senha</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="passinha" placeholder="Senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    </div>
                                </div>
				<div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirmar</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="passinhas" placeholder="Confirme sua senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    </div>
                                </div>

				<div class="form-group">
                                    <label for="sexo" class="col-md-3 control-label">Sexo</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="sexo" style="width: 30%; float: left;margin-right: 6%;">
					<option value="">?</option>
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
					</select>
                                    </div>
                                </div>

                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Data de Nascimento</label>
                                    <div class="col-md-9">
                         
					<select class="form-control" id="lastname" style="width: 29%; float: left;margin-right: 6%;">
  					<option value="">Ano</option>
  					<option value="2005">2005</option>
  					<option value="2004">2004</option>
  					<option value="2003">2003</option>
  					<option value="2002">2002</option>
  					<option value="2001">2001</option>
  					<option value="2000">2000</option>
  					<option value="1999">1999</option>
  					<option value="1998">1998</option>
  					<option value="1997">1997</option>
  					<option value="1996">1996</option>
  					<option value="1995">1995</option>
  					<option value="1994">1994</option>
  					<option value="1993">1993</option>
  					<option value="1992">1992</option>
  					<option value="1991">1991</option>
  					<option value="1990">1990</option>
  					<option value="1989">1989</option>
  					<option value="1988">1988</option>
  					<option value="1987">1987</option>
  					<option value="1986">1986</option>
  					<option value="1985">1985</option>
  					<option value="1984">1984</option>
  					<option value="1983">1983</option>
  					<option value="1982">1982</option>
  					<option value="1981">1981</option>
  					<option value="1980">1980</option>
  					<option value="1979">1979</option>
  					<option value="1978">1978</option>
  					<option value="1977">1977</option>
  					<option value="1976">1976</option>
  					<option value="1975">1975</option>
  					<option value="1974">1974</option>
  					<option value="1973">1973</option>
  					<option value="1972">1972</option>
  					<option value="1971">1971</option>
  					<option value="1970">1970</option>
  					<option value="1969">1969</option>
  					<option value="1968">1968</option>
  					<option value="1967">1967</option>
  					<option value="1966">1966</option>
  					<option value="1965">1965</option>
  					<option value="1964">1964</option>
  					<option value="1963">1963</option>
  					<option value="1962">1962</option>
  					<option value="1961">1961</option>
  					<option value="1960">1960</option>


					</select>

					<select class="form-control" id="mes" style="width: 30%;float: left;margin-right: 6%;">
  					<option value="">Mês</option>
  					<option value="01">01</option>
  					<option value="02">02</option>
  					<option value="03">03</option>
  					<option value="04">04</option>
  					<option value="05">05</option>
  					<option value="06">06</option>
  					<option value="07">07</option>
  					<option value="08">08</option>
  					<option value="09">09</option>
  					<option value="10">10</option>
  					<option value="11">11</option>
  					<option value="12">12</option>

					
					</select>


					<select class="form-control" id="dia" style="width: 29%;">
  					<option value="">Dia</option>
  					<option value="01">01</option>
  					<option value="01">02</option>
  					<option value="01">03</option>
  					<option value="01">04</option>
  					<option value="01">05</option>
  					<option value="01">06</option>
  					<option value="01">07</option>
  					<option value="01">08</option>
  					<option value="01">09</option>
  					<option value="01">10</option>
  					<option value="01">11</option>
  					<option value="01">12</option>
  					<option value="01">13</option>
  					<option value="01">14</option>
  					<option value="01">15</option>
  					<option value="01">16</option>
  					<option value="01">17</option>
  					<option value="01">18</option>
  					<option value="01">19</option>
  					<option value="01">20</option>
  					<option value="01">21</option>
  					<option value="01">22</option>
  					<option value="01">23</option>
  					<option value="01">24</option>
  					<option value="01">25</option>
  					<option value="01">26</option>
  					<option value="01">27</option>
  					<option value="01">28</option>
  					<option value="01">29</option>
  					<option value="01">30</option>
  					<option value="01">31</option>


					</select>


                                    </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">

                                        <a href="javascript:void(0);" onclick="users_registration(); "<button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Cadastro</button></a>

                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
<div class="lebels_fields" align="left" id="signup_status"></div><br clear="all">
                                         </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>






               
               
                
         </div> 
    </div>    



  </body>
</html>


