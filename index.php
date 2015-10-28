<!doctype html>
<?php
session_start();
$validation =$_POST['validation'];	
if(isset($_SESSION['Auth']['MembreID']) AND $_SESSION['Auth']['MembreID']!="" AND $_SESSION['Auth']['Actif']=="1") {
	header("Location: http://www.letronedeferjce.com/php");
}

include('Lib/connexion.php'); ?>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<META Http-Equiv="Cache-Control" Content="no-cache">
		<META Http-Equiv="Pragma" Content="no-cache">
			<META Http-Equiv="Expires" Content="0"> 
				<title>Page de connexion</title>
				<link rel="stylesheet" href="webroot/css/bootstrap.min.css">
				<link rel="stylesheet" href="webroot/css/custom.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
				<script type= "text/javascript" src="webroot/js/bootstrap.min.js"></script>
				<link href='http://fonts.googleapis.com/css?family=Scada' rel='stylesheet' type='text/css'>
			</head>
			<body>		
				<div id="getInscription">
					<form id="UserSignup" action="" method="post" >
						<h2>Inscription</h2>
						<a href="#" name="getInscription" class="btn-success closeForm">X</a>				
						<input required type="text" name="pseudo" placeholder="Nom d'utilisateur">
						<input required name="password" type="password" placeholder="Mot de passe">				
						<input required name="password_confirm"type="password" placeholder="Confirmation de votre mot de passe" >				
						<input required name="email"type="email" placeholder="Mail">
						<input required type="submit" class="btn btn-success" name="validation" value="Inscription">
					</form>		
				</div>
				<div id="getNewPassword">
					<form id="UserGetNewPassword" method="post" action="#">
						<p id="UserGetNewPasswordParaph">Saissisez l'adresse e-mail associée à votre compte :</p>
						<a href="#" name="getNewPassword" class="btn-success closeForm">X</a>
						<input required type="email" name="email" placeholder="Saississez votre adresse mail">
						<input type="submit" class="btn btn-success" name="validation" value="Envoyer">
					</form>
				</div>	
				<div id="UserLoginForm"class="home-content">
					<form method="post" action="" method="post">
						<?php 
						if (isset($_SESSION['inscription']['erreurs']) AND $_SESSION['inscription']['erreurs']!="") {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['inscription']['erreurs'].'</div>';
							unset($_SESSION['inscription']['erreurs']);
						}
						if (isset($_SESSION['inscription']['success']) AND $_SESSION['inscription']['success']!="") {
							echo '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['inscription']['success'].'</div>';
							unset($_SESSION['inscription']['success']);
						}
						if (isset($_SESSION['activation']['success']) AND $_SESSION['activation']['success']!="") {
							echo '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['activation']['success'].'</div>';
							unset($_SESSION['activation']['success']);
						}
						if (isset($_SESSION['connexion']['erreurs']) AND $_SESSION['connexion']['erreurs']!="") {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['connexion']['erreurs'].'</div>';
							unset($_SESSION['connexion']['erreurs']);
						}
						if (isset($_SESSION['password']['success']) AND $_SESSION['password']['success']!="") {
							echo '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['password']['success'].'</div>';
							unset($_SESSION['password']['success']);
						}
						if (isset($_SESSION['password']['erreurs']) AND $_SESSION['password']['erreurs']!="") {
							echo '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							'.$_SESSION['password']['erreurs'].'</div>';
							unset($_SESSION['password']['erreurs']);
						}
						?>
						<h2>Connexion</h2>
						<input required type="text" name="pseudo" placeholder="Nom d'utilisateur">
						<input required type="password" name="password" placeholder="Mot de passe">
						<input required type="submit" class="btn btn-success" name="validation" value="Connexion">			
						<div class="clear"></div>
						<div style='width:100%;'>
							<div style='text-align:left; float:left'>
								<a id="getNewPassword-link" href="#">Mot de passe oublié</a>
							</div>
							<div  style='text-align:right; float:right'>
								<a id="getInscription-link" href="#">Inscription</a>	
							</div>
						</div>
					</form>
					<div class="clear"></div>		
				</div>	
			</body>
			<script>
			$(document).ready(function() {	
				$(".home-content form a").click(function() {		
					$(".home-content").animate({left:'0%',marginLeft:'0px',backgroundColor:'#5e5e5e',},500);
					$(".home-content a, .home-content label").animate({color:'#fff'},1);
					return false;	
				});
				$("#getInscription-link").click(function() {
					var  gi = $("#getInscription");
					gi.css('display', 'block');
					gi.animate({right:'-160px',backgroundColor:'rgba(0,0,0,0.5)',marginRight:'50%'},500);
					var style = $("#getNewPassword").attr('style');
					if(style != undefined && style !='') {
						var  gnp = $("#getNewPassword");
						gnp.animate({marginTop :'100%'},250,function() {
							gnp.css('display','none');
							gnp.attr('style' , '');
							var  gi = $("#getInscription");
							gi.css('display', 'block');
							gi.animate({right:'-160px',backgroundColor:'rgba(0,0,0,0.5)',marginRight:'50%'},250);
						});
					} else {	
						var  gi = $("#getInscription");
						gi.css('display', 'block');
						gi.animate({right:'-160px',backgroundColor:'rgba(0,0,0,0.5)',marginRight:'50%'},250);
					}
					return false;	
				});

				$("#getNewPassword-link").click(function() {
					var style = $("#getInscription").attr('style');
					if (style != undefined && style != '') {
						var  gi = $("#getInscription");
						gi.animate({marginTop :'100%'},250,function() {
							gi.css('display','none');
							gi.attr('style' , '');
							var  gnp = $("#getNewPassword");
							gnp.css('display', 'block');
							gnp.animate({right:'-160px',backgroundColor:'rgba(0,0,0,0.5)',marginRight:'50%'},250);
						});
					} else {
						var  gnp = $("#getNewPassword");
						gnp.css('display', 'block');
						gnp.animate({right:'-160px',backgroundColor:'rgba(0,0,0,0.5)',marginRight:'50%'},500);
					}
					return false;	
				});	

				$(".closeForm").click(function() {
					$('#getInscription').attr('style' , ''),1,
					$(".home-content").animate({left:'50%',marginLeft:'-160px',backgroundColor:'rgba(0,0,0,0.5)',},500);	
					return false;
				});

				$(".closeForm").click(function() {
					$("#getNewPassword").attr('style' , ''),1,function() {
						$(".home-content").animate({margin: 'auto auto',margin_left:'42%',backgroundColor:'rgba(0,0,0,0.5)',},500);
						return false;
					};
				});		
			});
</script>
