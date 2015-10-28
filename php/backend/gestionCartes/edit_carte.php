<?php
	/* RAPPEL : Conditions ternaires
	 * Exemple :
	 *	[$var1 == "toto" ? $var2 = "ok" : echo "erreur";]
	 * est la même chose que :
	 *	if($var1 == "toto") {
	 *		$var2 = "ok";
	 *	} else {
	 *		echo "erreur";
	 *	}
	 */
	session_start();
	unset($_SESSION['ajoutCarte']['success']);
	
	
	//-- DECLARATION DES VARIABLES --
	//Description variables pour la gestion des traits
	/* $traits_old : traits associés à la carte AVANT modif [tableau d'IDs]
	 * $traits_new : traits associés à la carte APRES modif [tableau d'IDs]
	 * $traits_toDel : traits à désassocier de la carte (à supprimer de carte_adouber) [tableau d'IDs]
	 * $traits_toAdd : traits à créer (à ajouter dans carte_trait) [tableau de Strings] s'il y en a puis,
	 * 	une fois que c'est fait, traits à associer à la carte (à ajouter dans carte_adouber) [tableau d'IDs]
	 */
	
	// Données pour l'historique
	$idAuteur = $_SESSION["Auth"]["MembreID"];
	$dateCarte = date("Y-m-d H:i:s");
	
	// Autres variables
	$carteId = $_SESSION['ajoutCarte']['edit'];
	$modifications = array();
	$echappement = array("'" => "''", '"' => '""');
	
	
	//-- COMPARAISON DES ANCIENNES ET NOUVELLES DONNEES --
	// Champs texte et listboxes
	if($_SESSION['ajoutCarte']['nom'] != $_POST["nom"]) {
		$nom = $_POST["nom"];
		$modifications["Nom"] = "'".strtr($nom, $echappement)."'";
	}
	if($_SESSION['ajoutCarte']['extension'] != $_POST["extension"]) {
		$extens = $_POST["extension"];
		$modifications["Extension"] = $extens;
	}
	if($_SESSION['ajoutCarte']['type'] != $_POST["type"]) {
		$type = $_POST["type"];
		$modifications["Type"] = $type;
	}
	if($_SESSION['ajoutCarte']['texte'] != $_POST["texte"]) {
		$texte = $_POST["texte"];
		$modifications["Texte"] = "'".strtr($texte, $echappement)."'";
	}
	if($_SESSION['ajoutCarte']['cout'] != $_POST["cout"]) {
		$cout = $_POST["cout"];
		$modifications["Cout"] = ($cout == "" ? "NULL" : $cout);
	}
	if($_SESSION['ajoutCarte']['force'] != $_POST["force"]) {
		$force = $_POST["force"];
		$modifications["`Force`"] = ($force == "" ? "NULL" : $force);
	}
	if($_SESSION['ajoutCarte']['prise'] != $_POST["prise"]) {
		$prise = $_POST["prise"];
		$modifications["Prise"] = ($prise == "" ? "NULL" : $prise);
	}
	if($_SESSION['ajoutCarte']['or'] != $_POST["or"]) {
		$or = $_POST["or"];
		$modifications["Gold"] = ($or == "" ? "NULL" : $or);
	}
	if($_SESSION['ajoutCarte']['influence'] != $_POST["influence"]) {
		$influ = $_POST["influence"];
		$modifications["Influence"] = ($influ == "" ? "NULL" : $influ);
	}
	if($_SESSION['ajoutCarte']['initiative'] != $_POST["initiative"]) {
		$init = $_POST["initiative"];
		$modifications["Initiative"] = ($init == "" ? "NULL" : $init);
	}
	if($_SESSION['ajoutCarte']['image'] != $_POST["image"]) {
		$image = $_POST["image"];
		$modifications["Image"] = "'".$image.".jpg'";
	}
	
	// Checkboxes
	$vertus_toDel = array_diff($_SESSION['ajoutCarte']['vertus'], $_POST["vertus"]);
	$vertus_toAdd = array_diff($_POST["vertus"], $_SESSION['ajoutCarte']['vertus']);
	$vertus = $_POST["vertus"];
	$icones_toDel = array_diff($_SESSION['ajoutCarte']['icones'], $_POST["icones"]);
	$icones_toAdd = array_diff($_POST["icones"], $_SESSION['ajoutCarte']['icones']);
	$icones = $_POST["icones"];
	$maisons_toDel = array_diff($_SESSION['ajoutCarte']['maisons'], $_POST["maisons"]);
	$maisons_toAdd = array_diff($_POST["maisons"], $_SESSION['ajoutCarte']['maisons']);
	$maisons = $_POST["maisons"];
	
	// Traits (gestion des traits à créer)
	if(!empty($_POST["lstToAdd"])) {
		$traits_toAdd = explode(";", $_POST["lstToAdd"]);
	}
	$traits_old = $_SESSION['ajoutCarte']['traits'];
	$traits_new = $_POST["traits"];
	
	
	//-- VERIFICATION DES VALEURS --
	include_once 'verif_carte.php';
	
	
	//-- MISES A JOUR EN BASE DE DONNEES --
	// Connexion à la base
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	// Table CARTE
	if(!empty($modifications)) {
		$queryCarteDeb = "UPDATE carte_carte SET ";
		$queryCarteMil = "";
		foreach($modifications as $col => $val) {
			$queryCarteMil .= "$col = $val, ";
		}
		$queryCarteMil = substr($queryCarteMil, 0, -2);
		$queryCarteFin = " WHERE CarteID = $carteId;";
		$queryCarte = $queryCarteDeb.$queryCarteMil.$queryCarteFin;
		$db->query($queryCarte);
	}
	
	// Table VERTU (qualifier)
	foreach($vertus_toDel as $vertu) {
		$queryVertusDel = "DELETE FROM carte_qualifier 
						   WHERE CarteID = $carteId 
						   AND VertuID = $vertu;";
		$db->query($queryVertusDel);
	}
	foreach($vertus_toAdd as $vertu) {
		$queryVertusAdd = "INSERT INTO carte_qualifier 
						   VALUES($carteId, $vertu);";
		$db->query($queryVertusAdd);
	}
	
	// Table MAISON (appartenir)
	foreach($maisons_toDel as $maison) {
		$queryMaisonsDel = "DELETE FROM carte_appartenir 
							WHERE CarteID = $carteId 
							AND AffiliationID = $maison;";
		$db->query($queryMaisonsDel);
	}
	foreach($maisons_toAdd as $maison) {
		$queryMaisonsAdd = "INSERT INTO carte_appartenir 
							VALUES($carteId, $maison);";
		$db->query($queryMaisonsAdd);
	}
	
	// Table ICONE (defier)
	foreach($icones_toDel as $icone) {
		$queryIconesDel = "DELETE FROM carte_defier 
						   WHERE CarteID = $carteId 
						   AND IconeID = $icone;";
		$db->query($queryIconesDel);
	}
	foreach($icones_toAdd as $icone) {
		$queryIconesAdd = "INSERT INTO carte_defier
						   VALUES($carteId, $icone);";
		$db->query($queryIconesAdd);
	}
	
	// Table TRAIT (adouber)
	// création des traits qui n'existent pas encore
	foreach($traits_toAdd as $trait) {
		$trait = strtr($trait, $echappement);
		$queryTraitsCreate = "INSERT INTO carte_trait(TraitAdresse)
							  VALUES('$trait');";
		$db->query($queryTraitsCreate);
		// au fur et à mesure on les ajoute dans la liste des traits finaux
		$traitID = $db->lastInsertId();
		array_push($traits_new, $traitID);
	}
	//suppression des traits en trop
	$traits_toDel = array_diff($traits_old, $traits_new);
	foreach($traits_toDel as $trait) {
		$queryTraitsDel = "DELETE FROM carte_adouber 
						   WHERE CarteID = $carteId 
						   AND TraitID = $trait;";
		$db->query($queryTraitsDel);
	}
	// ajout des traits manquants
	$traits_toAdd = array_diff($traits_new, $traits_old);
	foreach($traits_toAdd as $trait) {
		$queryTraitsAdd = "INSERT INTO carte_adouber
						   VALUES($carteId, $trait);";
		$db->query($queryTraitsAdd);
	}
	
	
	//-- FIN DU TRAITEMENT --
	// On supprime les variables de session pour que le formulaire soit remis à vide. Cela
	// réinitialise aussi la variable de session Edit, donc on revient au formulaire en mode Nouvelle carte
	unset($_SESSION['ajoutCarte']);
	$_SESSION['ajoutCarte']['success'] = "Les modifications ont été sauvegardées avec succès.";
	
	// On insère une entrée dans l'historique des activités
	$texte = '<i class="fa fa-plus-square"></i> Mise à jour de la carte '.$_POST["nom"];
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