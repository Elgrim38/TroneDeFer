<?php
	require_once '../Lib/connectDB.php';
	$db = connectDB();
	$token = $_GET['id'];
	$sqlActivation = "SELECT * FROM membre_membre WHERE token = '$token'";
	$reqActivation = $db->query($sqlActivation);
	$countActivation = $reqActivation->rowCount();
	if($countActivation == 1){
			$sqlActivation = "UPDATE `membre_membre` SET `actif`='1'";
			$reqActivation = $db->query($sqlActivation);
			$_SESSION[activation][success]="<strong>Vous êtes maintenant inscrit !</strong> Un message de confirmation a été envoyé à votre adresse e-mail.";
			header("Location:http://www.letronedeferjce.com");
	}
	else{
	
	}
?>