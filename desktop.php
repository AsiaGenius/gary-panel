<?php
include "inc/session.php";





if (!isset($_COOKIE["token"])){

header("Location:logout.php");

}

if (base64_encode($_SESSION['token']) != base64_encode($_SERVER['SERVER_NAME'].$_SESSION['ip'])) {

header("Location:logout.php");

}

if(isset($_SESSION["token"]) && !empty($valid_user_id)&& !empty($valid_user_pass))
{





include "inc/func.php";




//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 10;
 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
	header("Location:logout.php");
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();












?>

<!DOCTYPE html>
<html>
  <head>
    <title>Painel legendRO</title>


<link rel="stylesheet" type="text/css" media="all" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link href='css/tabbedContent.css' rel='stylesheet' type='text/css' />
    <script src="js/tabbedContent.js" type="text/javascript"></script>

  <script>

  $(function() {
    $( ".draggable" ).draggable();
  });

  </script>


  </head>

  <body>



<style>
body {

}

body {
    background-image: url('http://wallpaperswide.com/download/background_logon_default_windows_7-wallpaper-1024x768.jpg');
    background-repeat: no-repeat;
    background-size: 100%;    background-color: #1698F1;
}
/*Footer Contact*/
.footer-contact{
    background:#2c2c2c;
	padding:20px 0;
	color:#a8a8a8;
}
.footer-contact h3, .footer-contact p{color:#a8a8a8;}
.footer-contact .title{ border-bottom: 1px solid #000;}
.footer-contact ul{list-style:none;}
.footer-contact ul li{
	line-height:24px;
}
.footer-contact ul li .glyphicon{font-size: 10px; top: 0;}


/*Footer CSS*/

footer {
    bottom: 0;
    position: absolute;
    width: 100%;
    height: 5%;
    background-color: #f7f7f7;
    background-image: -moz-linear-gradient(top, #354247,#181E1F);
    background-image: -ms-linear-gradient(top, #354247,#181E1F);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#354247), to(#181E1F));
    background-image: -webkit-linear-gradient(top, #354247,#181E1F);
    background-image: -o-linear-gradient(top, #354247,#181E1F);
    background-image: linear-gradient(top,#354247,#181E1F);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5354247, endColorstr='#181E1F', GradientType=0);
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;	    
}


footer .panel {
	box-shadow: none;
}
.collapse-footer {}
.collapse-footer p {
	font-size:14px;
	line-height:normal;
}
.collapse-footer .panel {
	background:none;
	background-color:transparent;
	border-radius:0;
	margin-bottom:0;
	border: none;
}
.collapse-footer .panel-heading {
	background-color:#707070;
	color:#231f20;
	border-radius:0;
}
.collapse-footer .nav-footer {
	padding:0;
	color:#312424;
	margin-left: 0;
}
.collapse-footer .nav-footer li {
	list-style:none;
}
.collapse-footer h5.title {
	border-bottom:1px #c4c4c4 solid;
	padding-bottom:0;
	font-size:18px;
	font-weight:bold;
	padding-bottom:6px;
	margin-top:4px;
	margin-bottom:4px;
}
.collapse-footer h5.title span {
	border-bottom:3px #312424 solid;
	bottom:1px;
	padding-bottom:4px;
}
.collapse-footer .col-lg-6 .nav-footer li {
	width:45%;
	margin-right:5%;
	float:left;
}
.collapse-footer .nav-footer li {
	
}
.collapse-footer .nav-footer li a {
	color:#312424;
	font-size:14px;
	line-height:18px;
	padding:5px 0;
	display:inherit;
}


.container {
width: auto;
padding: 0 15px;
    height: 96%;
}
.container .credit {
  margin: 20px 0;
}
</style>


<style>
.desligas{
color: #FDFDFD;
    margin-top: 7px;
    margin-left: 5px;
    font-size: 132%;
    width: 89%;
    float: left;
}

.desligas span{
    border-right: 1px solid #8A9198;
        width: 4%;}

.desligas span:hover{
    color:red;
    cursor:pointer;
}


.trayzim{
    color: #FDFDFD;
    margin-top: 4px;
    margin-left: 5px;
    font-size: 132%;
    width: 8%;
    text-align: center;
    float: left;
}

.trayzim h4{
    font-size: 68%;
    margin-bottom: 0%;
    margin-top: 0%;
}

.iconsvote{
background-image:url('http://img07.deviantart.net/9061/i/2012/127/f/7/lv_3___lunatic_by_pretty_destruction-d4ywouq.png');    background-size: 100%; background-repeat: no-repeat;
}

.iconssenha{
background-image:url('http://boite-mails.com/wp-content/uploads/motpasse.png');    background-size: 100%; background-repeat: no-repeat;
}

.iconschar{
background-image:url('http://img.informer.com/icons/png/48/2961/2961689.png');    background-size: 100%; background-repeat: no-repeat;
}


.pvp{
background-image:url('http://i.imgur.com/CiuUU8C.png');    background-size: 100%; background-repeat: no-repeat;
}

.bg{
background-image:url('http://i.imgur.com/CGxn40J.png');    background-size: 100%; background-repeat: no-repeat;
}

.hunt{
background-image:url('http://i.imgur.com/rw2wv3G.png');    background-size: 100%; background-repeat: no-repeat;
}

.woe{
background-image:url('http://i.imgur.com/a6o0BXf.png');    background-size: 100%; background-repeat: no-repeat;
}



.vote{


    width: 50px;
    height: 50px;
    margin-top: 52%;
    cursor:pointer;

}

.vote h5{
    position: relative;
    top: 105%;
    left: -23px;
    color: #F5F2F2;
	width: 100px;
    text-align: center;
}

.resetpass{
width: 30%;
    position: absolute;
    z-index: 1;
    border-radius: 3px;
    background-color: #f5f5f5;
    border: 1px solid #31708f;
}

.titlewindows{

    height: 33px;
    background-color: #d9edf7;
    border-bottom: 1px solid #AFCFDF;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    color: #31708f;

}

.titlewindows h4{

    margin-top: 5px;
    font-size: 16px;
    padding: 4px;

    cursor: move;
    

}

.titlew{
width: 128px;
    float: left;
}

.close{
    width: 6%;
    background-color: #033955;
    margin-top: 1%;
    margin-right: 2%;
    border-radius: 5px;
    color: #D1EBF9;
    font-size: 91%;
    float: right;
    padding: 1%;
    cursor: pointer;
}


.close:hover{
color: #FFFFFF;
}



.titlewpvp{
    margin-top: 0px;
    font-size: 16px;
    padding: 6px;
    float: left;
    width: 92%;
    text-align: center;    color: #D9EDF7;
}

.corpinho{
padding: 8%;
}

.corpinho p{
    color: #31709C;
}

.corpinho_top h5{
    color: #277197;
}


.controls{
margin-left: -4%;
    text-align: center;margin-bottom: 5%;
}

.repara{
    left: 38%;
    top: 20%;
}


.alerta_reseta{
width: 23%;
    height: 23%;
    position: absolute;
    background-color: rgba(217, 237, 247, 0.78);
    border-radius: 6px;
    border: 1px solid #327292;
    top: 20%;
    left: 41%;
    z-index: 2;


}


.corpo_reseta{
height: 71%;

}


.corpo_reseta p{
padding: 7%;
    font-size: 85%;
    color: #0E7999;
    text-align: justify;
}


.votepoint{

    background-color: whitesmoke;
    position: absolute;
    border-radius: 6px;
    border: 1px solid #A6A6A6;
    z-index: 1;
	    width: 35%; overflow:hidden;
	top:10%;
	left:32%;
}

.votepoint button{
float: right;
}

.votepoint_title{

background-color: #D9EDF7;
    border-bottom: 1px solid #AFCFDF;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    height: 33px;
    padding-left: 1%;
    padding-right: 1%;

}





.rankpvp{

        background-color: #A9E0FB;
    position: absolute;
    border-radius: 6px;
    border: 1px solid #A9E0FB;
    z-index: 1;
	    width: 35%; overflow:hidden;
	top:10%;
	left:34%;
}

.rankpvp button{
float: right;
}

.rankpvp_title{

background-color: #35B0EE;
    border-bottom: 1px solid #AFCFDF;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    height: 33px;
    padding-left: 1%;
    padding-right: 1%;

}


.corpinho_top{
padding: 2%;
}

.corpinho_top ul{
margin-left: -50px;
    width: 114%;
}


.liA{
list-style: none;
    background-color: #E6E6E6;height: 50px;
    padding: 2%;
}

.liB{
list-style: none;
    background-color: #F7F7F7;height: 50px;
    padding: 2%;
}


.tabbed_contete{
position: absolute;
left: 18%;
top: 21%;
color: white;
}


.vote2{
    position: relative;
    width: 50px;
    height: 50px;
    margin-top: -20%;
    cursor: pointer;
    margin-left: 14%;
}


.vote2 h5{
    position: relative;
    top: 105%;
    left: -23px;
    color: #F5F2F2;
	width: 100px;
    text-align: center;
}

.lista_pvp h5{
width: 25%;
    float: left;
}

.lista_pvp li{
list-style: none;
padding-left: 3%;
}


.lista_pvp ul{
margin-left: -11%;

}



.lista_pvp li:nth-child(1) {
        background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
font-family: sans-serif;
    font-size: 91%;
    font-weight: 900;
    color: #0F6D9C
}



li[data-type="ouro"]{
background-image:url('https://cdn2.iconfinder.com/data/icons/ledicons/trophy.png'); 
background-repeat: no-repeat;
background-position: 4%;
}


li[data-type="prata"]{
background-image:url('http://icons.iconarchive.com/icons/led24.de/led/16/trophy-silver-icon.png'); 
background-repeat: no-repeat;
background-position: 4%;
}


li[data-type="bronze"]{
background-image:url('http://www.veryicon.com/icon/png/System/Led/trophy%20bronze.png'); 
background-repeat: no-repeat;
background-position: 4%;
}

li[data-type="normal"]{
background-image:url('http://www.veryicon.com/icon/ico/System/Silk/medal%20gold%203.ico'); 
background-repeat: no-repeat;
background-position: 4%;
}





.lista_pvp li:nth-child(2) {
    background-color: #A9E0FB;
padding-left: 12%;
    padding-bottom: 8%;
}



.lista_pvp li:nth-child(3) {
        background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(4) {
    background-color: #A9E0FB;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(5) {
        background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(6) {
    background-color: #A9E0FB;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(7) {
        background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(8) {
    background-color: #A9E0FB;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(9) {
        background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(10) {
    background-color: #A9E0FB;
padding-left: 12%;
    padding-bottom: 8%;
}

.lista_pvp li:nth-child(11) {
    background-color: #D9EDF7;
padding-left: 12%;
    padding-bottom: 8%;
}
</style>



<div class="container">  


<div class="resetpass repara draggable" style="<?php echo $escondido?>">

<div class="titlewindows">

<h4 class="titlew">Resetar Senha</h4>
<h4 class="close" onclick="$('.resetpass').hide();">X</h4>


</div>

<div class="corpinho">
<p>Utilize sempre carácters minúsculo e maiúsculos e sinais, mantenha sua senha sempre protegida!</p>
<p>A senha deve conter: Letras maiusculas e minúculas, números e sinais. Ex.: Legend2016!)</p>

<form action="" method="post">



<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="oldsenha" type="password" class="form-control" name="oldsenha" value="" placeholder="Senha Antiga" required="required">                                        
</div>


<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="senha" type="password" class="form-control" name="senha" value="" placeholder="Nova Senha" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="nsenha" type="password" class="form-control" name="nsenha" value="" placeholder="Confirmar Nova senha" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> 
					<input id="tipo" name="tipo" type="hidden" value="reset">                                       
</div>



<div class="col-sm-12 controls">
<button id="resetarsenha" type="submit" class="btn btn-success">Trocar Senha</a>
</div>
<?php echo $status ?>


</form>

</div>


</div>



<div class="alerta_reseta draggable" style="<?php echo $escondidochar?>">

<div class="corpo_reseta">
<h5 class="close" onclick="$('.alerta_reseta').hide();">X</h5>
<p>Só use essa opção, caso seu personagem esteja preso em algum mapa! Tem certeza que deseja continuar? Todos os personagens serão afetados.</p>

</div>

<div class="col-sm-6 controls" style="margin-left: 3%;">
<form action="" method="post">
<input id="tipo" name="tipo" type="hidden" value="charreset">
<button id="resetarsenhas" type="submit" class="btn btn-success" disabled><span id='time-remaining'></span></a>
</form>
</div>


<script type='text/javascript'>

jQuery(function ($) {

	$("#resetarsenhacancel").click(function () { $("#resetarsenhas").prop('disabled',true); });
	
    $(".iconschar").click(function () {


    var secondsBeforeExpire = 60;
    
    // This will trigger your timer to begin
    var timer = setInterval(function(){
        // If the timer has expired, disable your button and stop the timer
        if(secondsBeforeExpire <= 0){
            clearInterval(timer);
            $("#resetarsenhas").prop('disabled',false);
	    $("#time-remaining").text("Resetar Posição");
		
        }
        // Otherwise the timer should tick and display the results
        else{
            // Decrement your time remaining
            secondsBeforeExpire--;
            $("#time-remaining").text("Aguarde "+secondsBeforeExpire+ " seg");      
        }
    },1000);

});
});


    

</script>


<div class="col-sm-6 controls">
<button id="resetarsenhacancel" type="submit" class="btn btn-warning" onclick="$('.alerta_reseta').hide(); ">Cancelar</a>
</div>
</div>










<div class="col-md-6" style="width: 16%;">


<div class="vote iconsvote draggable" onclick="$('.votepoint').show(); ">
<h5>VotePoint</h5>
</div>


<div class="vote iconssenha draggable draggable" onclick="$('.resetpass').show();">
<h5>Mudar Senha</h5>
</div>


<div class="vote iconschar draggable" onclick="$('.alerta_reseta').show();">
<h5>Resetar Posição</h5>
</div>


<div class="vote pvp draggable" onclick="$('.rankpvp').show();">
<h5>Rank PVP</h5>
</div>
</div>

<div class="col-md-6" style="width: 16%;">
<div class="vote bg draggable" onclick="alert('Em desenvolvimento.');">
<h5>Rank BG</h5>
</div>


<div class="vote hunt draggable" onclick="alert('Em desenvolvimento.');">
<h5>Rank Hunt</h5>
</div>


<div class="vote woe draggable" onclick="alert('Em desenvolvimento.');">
<h5>Rank Woe</h5>
</div>

</div>


        

</div>    

<footer role="contentinfo" class="site-footer" id="colophon">

  <div class="desligas col-md-8">
	<a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
  </div>

  <div class="trayzim col-md-8">
	<h4>legendRO</h4>
	<h4>2015-2016</h4>
  </div>



</footer>


  </body>




</html>

<?php

}
else
{
	//Send every user who tries to access this page directly without valid session to the login page. 
	//The login page is the door that every user needs to pass to this page
	header("location: index.php");
}
?>