<?php 
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<base href="http://letronedeferjce.com/php/resetPassword.php"> 
	<title><?php echo $titre; ?> </title>
	<link rel="stylesheet" href="../../webroot/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../webroot/css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../webroot/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../webroot/css/formAjoutCarte.css"/>
	<link rel="shortcut icon" href="../../webroot/media/images/icone.ico" type="image/x-icon"/>
	<link rel="icon" href="../../webroot/media/images/icone.ico" type="image/x-icon"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type= "text/javascript" src="../../webroot/js/bootstrap.min.js"></script>
	<script type= "text/javascript" src="../../webroot/js/rechercheAjax.js" ></script>
</head>
<body>      
	<div class="container hauteurContainer">
		<div class="row">
			<div class="center">
				<img src="../webroot/media/images/logo.png" alt="logo">
			</div>
			<div class="fdblanc">
				<?php
					require_once '../Lib/connectDB.php';
					$db = connectDB();
					if(isset($_POST['id'])) {
						$token = $_POST['id'];
					} else {
						$token = $_GET['id'];
					}

					$sqlPassword = "SELECT * FROM membre_membre WHERE token = '$token'";
					$reqPassword = $db->query($sqlPassword);
					$dataPassword = $reqPassword->fetch();
					$countPassword = $reqPassword->rowCount();
					if ($countPassword == 1) { 	
						if(isset($_POST['validation']) AND $_POST['validation'] == 'Enregistrer' AND !empty($_POST['password'])) {
							if($_POST['password'] == $_POST['passwordConfirm']) {
								$password= sha1($_POST['password']);
								$pseudo = $dataPassword['Pseudo'];
								$updatePassword = $db->query("UPDATE `membre_membre` SET `Password`='$password' WHERE Pseudo= '$pseudo'");
								$_SESSION['password']['success'] = 'Votre mot de passe a été modifié avec succès.';
								header('Location: http://letronedeferjce.com');
							} else {
								$_SESSION['password']['erreurs'] = 'Les deux mots de passe ne sont pas identiques.';
							}
						}				
				?>
					<div class="row">
						<form class="mt2" action="#" method="post">
							<div class="col-lg-12 col-sm-12 col-md-12">
								<div class="col-lg-12 col-sm-12 col-md-12">
									<h1 class="text-center">Réinitialisation du mot de passe</h1>
								</div>
								<?php 
									if (isset($_SESSION['password']['erreurs']) AND $_SESSION['password']['erreurs']!="") {
										echo '	<div class="col-lg-12 col-sm-12 col-md-12">
													<div class="alert alert-danger alert-dismissible" role="alert">
														<button type="button" class="close" data-dismiss="alert">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button>
														'.$_SESSION['password']['erreurs'].'
													</div>
												</div>
										';
										unset($_SESSION['password']['erreurs']);
									}
								 ?>
								<label class="control-label col-sm-4" for="mdp">Nouveau mot de passe :</label>
								<div class="col-sm-8 mb1">
									<input required type="password" name="password" class="form-control"  id="mdp">
								</div>
								<label class="control-label col-sm-4" for="confirmMdp">Confirmez le mot de passe :</label>
								<div class="col-sm-8 mb1">
									<input required type="password" class="form-control" name="passwordConfirm" id="confirmMdp">
								</div>
								<input type="hidden" name="id" <?php echo "value='".$token."'"; ?> />
								<div class="col-lg-3 col-sm-3 col-md-3"></div>								
								<div class="col-lg-6 col-sm-6 col-md-6">
									<input class="btn btn-success btn-lg btn-block" name="validation" type="submit" value="Enregistrer">
								</div>
							</div>
						</form>
					</div>
					<?php
				} 
				?>

			</div>
		</div>
	</div>
</body>
</html>