<?php
	session_start();
	unset($_SESSION['extension']['success']);
	$listeErr = array();
	
	//-- DECLARATION DES VARIABLES --
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateExtension = date("Y-m-d H:i:s");
	
	// Récupération des données du formulaire
	$nom = $_SESSION['extension']['nom'] = $_POST['nom'];
	$cycle = $_SESSION['extension']['cycle'] = $_POST['cycle'];
	
	
	//-- VERIFICATION DU NOM --
	if(""==$nom or strlen($nom)<3 or strlen($nom)>100) {
		$_SESSION['extension']['erreurs'] = "Le nom d'une extension doit contenir entre 3 et 100 caractères.";
		header("Location: ../gestionExtensions.php");
		exit;
	} else {
		if(preg_match("#[^A-Za-z'\s]#", $nom) == 1) {
			$_SESSION['extension']['erreurs'] = "Le nom d'une extension ne peut pas contenir de caractères spéciaux ni de chiffres.";
			header("Location: ../gestionExtensions.php");
			exit;
		}
	}
	
	
	//-- INSERTION EN BASE DE DONNEES --
	// Connexion à la base de données
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// Insertion dans la table Extension
	$queryExtension = "INSERT INTO carte_extension(ExtensionNom, Cycle)
					   VALUES(:nom, :cycle);";
	$sqlExtension = $db->prepare($queryExtension);
	$sqlExtension->bindParam(':nom', $nom);
	$sqlExtension->bindParam(':cycle', $cycle);
	$sqlExtension->execute();
	
	// Insertion d'une entrée dans l'historique des activités
	$texte = "<i class='fa fa-plus-square'></i> Ajout de l'extension $nom";
	$sqlLogCarte = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`)
								 VALUES(:idAuteur, :dateExtension, :texte);");
	$sqlLogCarte -> bindParam(':idAuteur', $idAuteur);			
	$sqlLogCarte -> bindParam(':dateExtension', $dateExtension);
	$sqlLogCarte -> bindParam(':texte', $texte);
	$sqlLogCarte -> execute();
	
	//Suppression les variables de session pour que le formulaire soit remis à vide
	unset($_SESSION['extension']);
	$_SESSION['extension']['success'] = "L'extension a été créée avec succès.";
	
	// Déconnexion et retour à la liste
	$db = null;
	header("Location: ../gestionExtensions.php");
	exit;
?>