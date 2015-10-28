<?php
	session_start();
	unset($_SESSION['cycle']['success']);
	$listeErr = array();
	
	//-- DECLARATION DES VARIABLES --
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateCycle = date("Y-m-d H:i:s");
	
	// Récupération des données du formulaire
	$nom = $_SESSION['cycle']['nom'] = $_POST['nom'];
	
	
	//-- VERIFICATION DU NOM --
	if(""==$nom or strlen($nom)<3 or strlen($nom)>100) {
		$_SESSION['cycle']['erreurs'] = "Le nom d'un cycle doit contenir entre 3 et 100 caractères.";
		header("Location: ../gestionCycles.php");
		exit;
	} else {
		if(preg_match("#[^A-Za-z'\s]#", $nom) == 1) {
			$_SESSION['cycle']['erreurs'] = "Le nom d'un cycle ne peut pas contenir de caractères spéciaux ni de chiffres.";
			header("Location: ../gestionCycles.php");
			exit;
		}
	}
	
	
	//-- INSERTION EN BASE DE DONNEES --
	// Connexion à la base de données
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// Insertion dans la table Cycle
	$queryCycle = "INSERT INTO carte_cycle(CycleNom)
					   VALUES(:nom);";
	$sqlCycle = $db->prepare($queryCycle);
	$sqlCycle->bindParam(':nom', $nom);
	$sqlCycle->execute();
	
	// Insertion d'une entrée dans l'historique des activités
	$texte = "<i class='fa fa-plus-square'></i> Ajout du cycle $nom";
	$sqlLogCarte = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`)
								 VALUES(:idAuteur, :dateCycle, :texte);");
	$sqlLogCarte -> bindParam(':idAuteur', $idAuteur);			
	$sqlLogCarte -> bindParam(':dateCycle', $dateCycle);
	$sqlLogCarte -> bindParam(':texte', $texte);
	$sqlLogCarte -> execute();
	
	//Suppression les variables de session pour que le formulaire soit remis )à vide
	unset($_SESSION['cycle']);
	$_SESSION['cycle']['success'] = "Le cycle a été créé avec succès.";
	
	// Déconnexion et retour à la liste
	$db = null;
	header("Location: ../gestionCycles.php");
	exit;
?>