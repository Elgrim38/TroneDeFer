<?php
	/*
     * Module d'inscription :
	 * Gestion des erreurs
     */
	if($validation=='Inscription' AND isset($validation)) {
		$listErr = array();
		
		if(empty($pseudo)) {
			array_push($listErr, "Veuillez choisir un pseudo.");
		} else {
			//Pseudo TROP COURT
			if(strlen($pseudo) < 5) {
				array_push($listErr, "Votre pseudo est trop court (min 5 caractères).");
			}
			//Pseudo TROP LONG
			else if(strlen($pseudo) > 20) {
				array_push($listErr, "Votre pseudo est trop long (max 20 caractères).");
			}
			//Caractères spéciaux
			if(preg_match("#[^a-zA-Z0-9_]# ", $pseudo) == 1)  {
				array_push($listErr, "Votre pseudo ne doit pas contenir de caractères spéciaux.");
			}
		}
		
		//Pseudo DEJA UTILISE
		$sqlPseudo = "	SELECT Pseudo
						FROM membre_membre
						WHERE Pseudo = '$pseudo';
		";
		$reqPseudo = $db->query($sqlPseudo);
		$count = $reqPseudo->rowCount();		
		if($count >= 1){
			array_push($listErr, "Ce pseudo est déjà utilisé.");
		}

		//E-mail VIDE
		if(empty($mail)) {
			array_push($listErr, "Veuillez fournir votre adresse e-mail.");
		}
		
		//Mot de passe VIDE
		echo $mdp." ".strlen($mdp);
		if(empty($mdp)) {
			array_push($listErr, "Veuillez choisir un mot de passe.");
		} else {
			//Mot de passe TROP COURT 
			if(strlen($mdp) < 5) {
				array_push($listErr, "Votre mot de passe est trop court (min 5 caractères).");
			}
			//Mot de passe TROP LONG
			else if(strlen($mdp) > 20) {
				array_push($listErr, "Votre mot de passe est trop long (max 20 caractères).");
			}
		}
		//Mots de passe DIFFERENTS
		if($mdp !== $mdp2) {
			array_push($listErr, "Les mots de passe renseignés ne sont pas identiques.");                  
		}
		
		unset($_SESSION['inscription']['erreurs']);
		$erreurs = "";
		foreach($listErr as $msg) {
			$erreurs .= $msg."<br/>";
		}
		if("" != $erreurs) {
			$_SESSION['inscription']['erreurs'] = "<strong>Attention !</strong><br/>".$erreurs;
		}
	}

	if($validation=='Connexion' AND isset($validation)) {
		if (empty($_POST['pseudo']) OR empty($_POST['password'])) {
			$_SESSION['connexion']['erreurs'] = "Un ou plusieurs champs obligatoires ont été omis ! Merci de vérifier à nouveau le formulaire.";
		}
		else{
			$select = $db->query("SELECT * FROM membre_membre WHERE pseudo=$pseudo AND password='$password'");
		    if($select->rowCount() <= 0){
		    	$_SESSION['connexion']['erreurs'] = "Utilisateur inconnu. Vérifiez le pseudo et le mot de passe indiqués.";
		    }
		}
	}
	if($validation=='Envoyer' AND isset($validation)) {	
		$select = $db->query("SELECT * FROM membre_membre WHERE mail='$mail'");
	    if($select->rowCount() <= 0){
	    	$_SESSION['connexion']['erreurs'] = "Adresse e-mail inconnue.";
	    }	
	}
?>    
