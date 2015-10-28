<?php
	unset($_SESSION['ajoutCarte']['erreurs']);
	$listeErr = array();
	
	//NOM
	if(isset($nom) and (""==$nom or strlen($nom)<3 or strlen($nom)>100)) {
		array_push($listeErr, "Le nom d'une carte doit contenir entre 3 et 100 caractères.");
	} else {
		if(preg_match("#[^A-Za-z',\s-!]#", $nom) == 1) {
			array_push($listeErr, "Le nom d'une carte ne peut pas contenir de caractères spéciaux ni de chiffres.");
		}
	}
	
	if(isset($type)) {
		//VERTUS
		if(!in_array($type, $typesVertus)) {
			unset($vertus);
		}

		//COUT
		if(isset($cout) and in_array($type, $typesCout)) {
			if(""==$cout or $cout<0 or $cout>15) {
				array_push($listeErr, "Le coût doit être compris entre 0 et 15.");
			}
		}

		//FORCE
		if(isset($force) and in_array($type, $typesForce)) {
			if(""==$force or $force<0 or $force>15) {
				array_push($listeErr, "La force doit être comprise entre 0 et 15.");
			}
		}

		//PRISE
		if(isset($prise) and in_array($type, $typesPrise)) {
			if(""==$prise or $prise<0 or $prise>15) {
				array_push($listeErr, "La prise doit être comprise entre 0 et 15.");
			}
		}

		//OR
		if(isset($or) and in_array($type, $typesOr)) {
			if($or<-5 or $or>5) {
				array_push($listeErr, "L'or doit être compris entre -5 et 5.");
			}
		}

		//INFLUENCE
		if(isset($influence) and in_array($type, $typesInfluence)) {
			if($influence<0 or $influence>5) {
				array_push($listeErr, "L'influence doit être comprise entre 0 et 5.");
			}
		}

		//INITIATIVE
		if(isset($initiative) and in_array($type, $typesInitiative)) {
			if($initiative<-5 or $initiative>15) {
				array_push($listeErr, "L'initiative doit être comprise entre -5 et 15.");
			}
		}
	}

	//IMAGE
	if(isset($image) and (preg_match("#[^A-Za-z0-9]#", $image) == 1)) {
		array_push($listeErr, "Le nom de l'image doit être un seul mot, composé uniquement de lettres (min et maj) et de chiffres.");
	}

	//MAISONS
	if(empty($maisons)) {
		array_push($listeErr, "La carte doit appartenir à au moins une maison.");
	} else {
		if(in_array(1, $maisons) and count($maisons)>1) {
			array_push($listeErr, "La maison Neutre n'est pas compatible avec les autres maisons.");
		}
	}

	//ICONES
	if(isset($type) and !in_array($type, $typesIcones)) {
		unset($icones);
	}
	
	//NOUVEAUX TRAITS
	foreach($traits_toAdd as $trait) {
		if(preg_match("#[^A-Za-z\s]#", $trait) == 1) {
			array_push($listeErr, "'$trait' n'est pas un nom de trait correct.");
		}
	}
	
	
	if(!empty($listeErr)) {
		$erreurs = "";
		foreach($listeErr as $erreur) {
			$erreurs .= $erreur.'<br/>';
		}
		$_SESSION['ajoutCarte']['erreurs'] = $erreurs;
		header("Location: ../formAjoutCarte.php");
		exit;
	}
?>