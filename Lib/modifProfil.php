<?php 
	session_start();
	include("connectDB.php");    
    // On récupère l'ID de l'article depuis l'URL
    $db = connectDB();
	/*
    * Autoremplissage du formulaire
    */
    $id=$_SESSION['Auth']['MembreID'];
	$sqlFormAutoRemplissage = "SELECT * FROM membre_membre WHERE Membreid = $id";
	$queryFormAutoRemplissages= $db->query($sqlFormAutoRemplissage);
	$arrayProfil = $queryFormAutoRemplissages->fetchAll();	
	$pseudo = $arrayProfil[0]['Pseudo'];
	$mail = $arrayProfil[0]["Mail"];
	$birthday = $arrayProfil[0]['DateNaissance'];
	$birthday = date("d/m/Y",strtotime($birthday));
	$favoriteHouse = $arrayProfil[0]['MaisonFavorite'];
	$pays = $arrayProfil[0]['Pays'];
	$ville = $arrayProfil[0]['Ville'];
	$meta = $arrayProfil[0]['Meta'];
	$facebook = $arrayProfil[0]['Facebook'];
	$twitter = $arrayProfil[0]['Twitter'];
	$octgn = $arrayProfil[0]['OCTGN'];
	$skype = $arrayProfil[0]['Skype'];
	$password = $arrayProfil[0]['Password'];
	
	/*
    * Insertion des Modifications dans la base donnée 
    */
   if($valider=='Valider'){
		if (!empty($_POST['pseudo']) AND strlen($_POST['pseudo'])>5 AND $_POST['pseudo']!= $pseudo) {
			$pseudo = $_POST['pseudo'];
		}
		if (!empty($_POST['email']) AND filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL ) AND $_POST['email']!= $mail) {
			$mail = $_POST['email'];
		}
		if (!empty($_POST['ville']) AND $_POST['ville']!= $ville) {
			$ville = $_POST['ville'];
		}
		if (!empty($_POST['pays']) AND $_POST['pays']!= $pays) {
			$pays = $_POST['pays'];
		}
		if (!empty($_POST['meta']) AND $_POST['meta']!= $meta) {
			$meta = $_POST['meta'];   
		}    	
		if (!empty($_POST['house']) AND $_POST['house']!= $favoriteHouse) {
			$favoriteHouse = $_POST['house'];
		}
		if (!empty($_POST['naissance']) AND $_POST['naissance']!= $birthday) {
			$birthday = $_POST['naissance'];			
			$birthday = str_replace('/','-',$birthday);			
			$birthday = date("Y-m-d",strtotime($birthday));			
		}
		if (!empty($_POST['facebook']) AND $_POST['facebook']!= $facebook) {
			$facebook = $_POST['facebook'];
		}
		if (!empty($_POST['twitter']) AND $_POST['twitter']!= $twitter) {
			$twitter = $_POST['twitter'];
		}
		if (!empty($_POST['skype']) AND $_POST['skype']!= $skype) {
			$skype = $_POST['skype'];
		}
		if (!empty($_POST['octgn']) AND $_POST['octgn']!= $octgn) {
			$octgn = $_POST['octgn'];
		}
		if (!empty($_POST['password']) AND strlen($_POST['password'])>=6 AND $_POST['password'] == $_POST['passwordConfirm']) {
			$password = sha1($_POST['password']);
		}

		$sqlModifProfil = $db->prepare("UPDATE `membre_membre` SET `Password`=:password,`DateNaissance`=:naissance
			,`Pays`=:pays,`Ville`=:ville,`Meta`=:meta,`MaisonFavorite`=:house,`Facebook`=:facebook,`Twitter`=:twitter
			,`Skype`=:skype,`OCTGN`=:octgn WHERE `membreID`=$id");
		$sqlModifProfil -> bindParam(':password',$password);
		$sqlModifProfil -> bindParam(':naissance',$birthday);
		$sqlModifProfil -> bindParam(':pays',$pays);
		$sqlModifProfil -> bindParam(':ville',$ville);
		$sqlModifProfil -> bindParam(':meta',$meta);
		$sqlModifProfil -> bindParam(':house',$favoriteHouse);
		$sqlModifProfil -> bindParam(':facebook',$facebook);
		$sqlModifProfil -> bindParam(':twitter',$twitter);
		$sqlModifProfil -> bindParam(':octgn',$octgn);
		$sqlModifProfil -> bindParam(':skype',$skype);
		$sqlModifProfil ->execute();
		echo'
		<div class="alert alert-success  alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Modification effectué
		</div>
		';
	}
	