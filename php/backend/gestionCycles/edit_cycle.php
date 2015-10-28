<?php
	session_start();
	unset($_SESSION['cycle']['success']);
	$listeErr = array();
	
	//-- DECLARATION DES VARIABLES --
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateCycle = date("Y-m-d H:i:s");
	
	// Récupération des données du formulaire
	$id = $_SESSION['cycle']['id'] = $_POST['id'];
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
	
	
	//-- MISE A JOUR EN BASE DE DONNEES --
	// Connexion à la base de données
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// MàJ dans la table Cycle
	$queryCycle = "UPDATE carte_cycle
				   SET CycleNom = :nom
				   WHERE CycleID = :id;";
	$sqlCycle = $db->prepare($queryCycle);
	$sqlCycle->bindParam(':nom', $nom);
	$sqlCycle->bindParam(':id', $id);
	$sqlCycle->execute();
	
	// Insertion d'une entrée dans l'historique des activités
	$texte = "<i class='fa fa-pencil-square'></i> Mise à jour du cycle $nom";
	$sqlLogCarte = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`)
								 VALUES(:idAuteur, :dateCycle, :texte);");
	$sqlLogCarte -> bindParam(':idAuteur', $idAuteur);			
	$sqlLogCarte -> bindParam(':dateCycle', $dateCycle);
	$sqlLogCarte -> bindParam(':texte', $texte);
	$sqlLogCarte -> execute();
	
	//Suppression les variables de session pour que le formulaire soit remis à vide
	unset($_SESSION['cycle']);
	$_SESSION['cycle']['success'] = "Le cycle a été mis à jour avec succès.";
	
	// Déconnexion et retour à la liste
	$db = null;
	header("Location: ../gestionCycles.php");
	exit;
?>