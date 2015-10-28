<?php
	session_start();
	unset($_SESSION['extension']['success']);
	$listeErr = array();
	
	//-- DECLARATION DES VARIABLES --
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateExtension = date("Y-m-d H:i:s");
	
	// Récupération des données du formulaire
	$id = $_SESSION['extension']['id'] = $_POST['id'];
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
	
	
	//-- MISE A JOUR EN BASE DE DONNEES --
	// Connexion à la base de données
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// MàJ dans la table Extension
	$queryExtension = "UPDATE carte_extension
					   SET ExtensionNom = :nom, Cycle = :cycle
					   WHERE ExtensionID = :id;";
	$sqlExtension = $db->prepare($queryExtension);
	$sqlExtension->bindParam(':nom', $nom);
	$sqlExtension->bindParam(':cycle', $cycle);
	$sqlExtension->bindParam(':id', $id);
	$sqlExtension->execute();
	
	// Insertion d'une entrée dans l'historique des activités
	$texte = "<i class='fa fa-pencil-square'></i> Mise à jour de l'extension $nom";
	$sqlLogCarte = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`)
								 VALUES(:idAuteur, :dateExtension, :texte);");
	$sqlLogCarte -> bindParam(':idAuteur', $idAuteur);			
	$sqlLogCarte -> bindParam(':dateExtension', $dateExtension);
	$sqlLogCarte -> bindParam(':texte', $texte);
	$sqlLogCarte -> execute();
	
	//Suppression les variables de session pour que le formulaire soit remis à vide
	unset($_SESSION['extension']);
	$_SESSION['extension']['success'] = "L'extension a été mise à jour avec succès.";
	
	// Déconnexion et retour à la liste
	$db = null;
	header("Location: ../gestionExtensions.php");
	exit;
?>