<?php
	session_start();
	unset($_SESSION['ajoutCarte']['success']);
	
	//-- DECLARATION DES VARIABLES --
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateCarte = date("Y-m-d H:i:s");
	
	// Récupération des données du formulaire
	$nom = $_SESSION['ajoutCarte']['nom'] = $_POST["nom"];
	$extension = $_SESSION['ajoutCarte']['extension'] = $_POST["extension"];
	$type = $_SESSION['ajoutCarte']['type'] = $_POST["type"];
	$texte = $_SESSION['ajoutCarte']['texte'] = $_POST["texte"];
	$vertus = $_SESSION['ajoutCarte']['vertus'] = $_POST["vertus"];
	$cout = $_SESSION['ajoutCarte']['cout'] = $_POST["cout"];
	$force = $_SESSION['ajoutCarte']['force'] = $_POST["force"];
	$prise = $_SESSION['ajoutCarte']['prise'] = $_POST["prise"];
	$or = $_SESSION['ajoutCarte']['or'] = $_POST["or"];
	$influence = $_SESSION['ajoutCarte']['influence'] = $_POST["influence"];
	$initiative = $_SESSION['ajoutCarte']['initiative'] = $_POST["initiative"];
	$image = $_SESSION['ajoutCarte']['image'] = $_POST["image"];
	$maisons = $_SESSION['ajoutCarte']['maisons'] = $_POST["maisons"];
	$icones = $_SESSION['ajoutCarte']['icones'] = $_POST["icones"];
	$traits_exist = $_SESSION['ajoutCarte']['traits'] = $_POST["traits"];
	if(!empty($_POST["lstToAdd"])) {
		$traits_toAdd = explode(";", $_POST["lstToAdd"]);
	}

	// Tableaux indiquant les types de cartes pour lesquels les différentes valeurs doivent être prises en compte
	$VERTU_OMBRE = 5;
	$TYPE_PERSONNAGE = 1;
	$TYPE_LIEU = 2;
	$TYPE_AGENDA = 3;
	$TYPE_ATTACHEMENT = 4;
	$TYPE_EVENEMENT = 5;
	$TYPE_COMPLOT = 6;
	
	$typesCout = 		array($TYPE_PERSONNAGE, $TYPE_LIEU, 			  $TYPE_ATTACHEMENT								   );
	$typesForce = 		array($TYPE_PERSONNAGE																			   );
	$typesPrise = 		array(																				  $TYPE_COMPLOT);
	$typesOr = 			array($TYPE_PERSONNAGE,	$TYPE_LIEU,	$TYPE_AGENDA, $TYPE_ATTACHEMENT,				  $TYPE_COMPLOT);
	$typesInfluence = 	array($TYPE_PERSONNAGE, $TYPE_LIEU, $TYPE_AGENDA, $TYPE_ATTACHEMENT								   );
	$typesInitiative = 	array($TYPE_PERSONNAGE, $TYPE_LIEU, $TYPE_AGENDA, $TYPE_ATTACHEMENT, 				  $TYPE_COMPLOT);
	$typesIcones = 		array($TYPE_PERSONNAGE																			   );
	$typesVertus = 		array($TYPE_PERSONNAGE, $TYPE_LIEU, 			  $TYPE_ATTACHEMENT, $TYPE_EVENEMENT			   );

	$echappement = array("'" => "''", '"' => '""');
	
	
	//-- VERIFICATION DES VALEURS --
	include_once 'verif_carte.php';
	
	
	//-- INSERTIONS EN BASE DE DONNEES --
	// Connexion à la base
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// Table CARTE
	$nom = strtr($nom, $echappement);
	$texte = strtr($texte, $echappement);
	
	$queryCarteL1 = "INSERT INTO carte_carte(Nom, Extension, Type, Texte, Image";
	$queryCarteL2 = "VALUES('$nom', $extension, $type, '$texte', '$image.jpg'";
	
	if(""!=$cout and in_array($type, $typesCout)) {
		$queryCarteL1 .= ", Cout";
		$queryCarteL2 .= ", $cout";
	}

	if(""!=$or and in_array($type, $typesOr)) {
		$queryCarteL1 .= ", Gold";
		$queryCarteL2 .= ", $or";
	}

	if(""!=$influence and in_array($type, $typesInfluence)) {
		$queryCarteL1 .= ", Influence";
		$queryCarteL2 .= ", $influence";
	}

	if(""!=$initiative and in_array($type, $typesInitiative)) {
		$queryCarteL1 .= ", Initiative";
		$queryCarteL2 .= ", $initiative";
	}

	if(""!=$force and in_array($type, $typesForce)) {
		$queryCarteL1 .= ", `Force`";
		$queryCarteL2 .= ", $force";
	}

	if(""!=$prise and in_array($type, $typesPrise)) {
		$queryCarteL1 .= ", Prise";
		$queryCarteL2 .= ", $prise";
	}

	$queryCarteL1 .= ") ";
	$queryCarteL2 .= ");";
	$queryCarte = $queryCarteL1.$queryCarteL2;
	$db->query($queryCarte);
	$carteID = $db->lastInsertId();

	// Table VERTU (qualifier)
	if(isset($vertus)) {
		if($TYPE_PERSONNAGE == $type or
				(in_array($VERTU_OMBRE, $vertus) and count($vertus)==1))
		{
			foreach($vertus as $vertu) {
				$queryVertus = "INSERT INTO carte_qualifier 
								VALUES($carteID, $vertu);";
				$db->query($queryVertus);
			}
		}
	}

	// Table MAISON (appartenir)
	foreach($maisons as $maison) {
		$queryMaisons = "INSERT INTO carte_appartenir 
						 VALUES($carteID, $maison);";
		$db->query($queryMaisons);
	}
	
	// Table ICONE (defier)
	if(isset($icones)) {
		foreach($icones as $icone) {
			$queryIcones = "INSERT INTO carte_defier 
							VALUES($carteID, $icone);";
			$queryIcones1= $db->query($queryIcones);
		}
	}

	// Table TRAIT (adouber)
	if(!empty($traits_exist)) {
		foreach($traits_exist as $trait) {
			$queryTraits = "INSERT INTO carte_adouber 
							VALUES($carteID, $trait);";
			$db->query($queryTraits);
		}
	}

	if(isset($traits_toAdd)) {
		foreach($traits_toAdd as $trait) {
			$trait = strtr($trait, $echappement);
			$queryAddTraits = "INSERT INTO carte_trait(TraitAdresse)
							   VALUES('$trait');";
			$db->query($queryAddTraits);
			$traitID = $db->lastInsertId();
			$queryAdouber = "INSERT INTO carte_adouber
							 VALUES($carteID, $traitID);";
			$db->query($queryAdouber);
		}
	}

	
	//On supprime les variables de session pour que le formulaire soit remis à vide - sauf l'extension
	unset($_SESSION['ajoutCarte']);
	$_SESSION['ajoutCarte']['extension'] = $extension;
	$_SESSION['ajoutCarte']['success'] = "La carte a été créée avec succès.";

	//On insère une entrée dans l'historique des activités
	$texte = '<i class="fa fa-plus-square"></i> Ajout de la carte '.$nom;
	$sqlLogCarte = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`)
								 VALUES(:idAuteur, :dateCarte, :texte);");
	$sqlLogCarte -> bindParam(':idAuteur', $idAuteur);			
	$sqlLogCarte -> bindParam(':dateCarte', $dateCarte);
	$sqlLogCarte -> bindParam(':texte', $texte);
	$sqlLogCarte -> execute();
	
	// Déconnexion et retour au formulaire
	$db = null;
	header("Location: ../formAjoutCarte.php");
	exit;
?>