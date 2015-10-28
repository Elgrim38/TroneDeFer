<?php
	/*
     * Module d'inscription :
	 * Gestion des erreurs
     */
	function verifInscription($pseudo,$mail,$mdp,$mdp2) {
		$InscriptionOk = 1;		
		//Pseudo VIDE
		if(empty($pseudo)) {
			$error_pseudo_vide = '	<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Attention !</strong> Veuillez choisir un pseudo.
									</div>
			';
			$InscriptionOk = 0;
			echo $error_pseudo_vide;
		} else {
			//Pseudo TROP COURT
			if(strlen($pseudo) < 5) {
				$error_pseudo_longueur = '	<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
												<strong>Attention !</strong> Votre pseudo est trop court (minimum 5 caractères).
											</div>
				';
				$InscriptionOk = 0;
				echo $error_pseudo_longueur;
			}
			//Pseudo TROP LONG
			else if(strlen($pseudo) > 20) {
				$error_pseudo_longueur = '	<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
												<strong>Attention !</strong> Votre pseudo est trop long (maximum 20 caractères).
											</div>
				';
				$InscriptionOk = 0;
				echo $error_pseudo_longueur;
			}
		}
		
		//Pseudo DEJA UTILISE
		$sqlPseudo = "	SELECT Pseudo
						FROM membre
						WHERE Pseudo = '$pseudo';
		";
		echo $sqlPseudo;
		$reqPseudo = $db->query($sqlPseudo);
		echo "a";
		//echo is_null($reqPseudo)?"vide":$reqPseudo;
		$count = $reqPseudo->rowCount();
		
		if($count >= 1) {
			$error_pseudo_use = '	<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Attention !</strong> Ce pseudo est déjà utilisé.
									</div>
			';
			$InscriptionOk = 0;
			echo $error_pseudo_use;
		}

		//E-mail VIDE
		if(empty($mail)) {
			$error_mail_vide = '	<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Attention !</strong> Veuillez fournir votre adresse e-mail.
									</div>
			';
			$InscriptionOk = 0;
			echo $error_mail_vide;
		}

		//E-mail DEJA UTILISE
		$sqlMail = "	SELECT Mail
						FROM membre
						WHERE Mail = '$mail';
		";
		$reqMail = $db->query($sqlMail);
		$count = $reqMail->rowCount();
		if($count >= 1) {
			$error_mail_use = '	<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Attention !</strong> Cette adresse e-mail est déjà utilisée.
								</div>
			';
			$InscriptionOk = 0;
			echo $error_mail_use;
		}
		
		//Mot de passe VIDE
		if(empty($mdp)) {
			$error_password_vide = '	<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<strong>Attention !</strong> Veuillez choisir un mot de passe.
										</div>
			';
			$InscriptionOk = 0;
			echo $error_password_vide;                          
		} else {
			//Mot de passe TROP COURT 
			echo strlen($mdp);
			if(strlen($mdp) < 5) {
				$error_password_longueur = '	<div class="alert alert-danger alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<strong>Attention !</strong> Votre mot de passe est trop court (minimum 5 caractères).
												</div>
				';
				$InscriptionOk = 0;
				echo $error_password_longueur;
			}
			//Mot de passe TROP LONG
			else if(strlen($mdp) > 105) {
				$error_password_longueur = '	<div class="alert alert-danger alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<strong>Attention !</strong> Votre mot de passe est trop long (maximum x caractères).
												</div>
				';
				$InscriptionOk = 0;
				echo $error_password_longueur;
			}
		}


		//Mots de passe DIFFERENTS
		if($mdp !== $mdp2) {
			$error_passwords_identiques = '	<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Attention !</strong> Les mots de passe renseignés ne sont pas identiques.
											</div>
			';
			$InscriptionOk = 0;
			echo $error_passwords_identiques;                         
		}
		
		//Inscription VALIDE
		if($InscriptionOk == 1) {
			$InscriptionOkMsg = '	<div class="alert alert-succes alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Vous êtes maintenant inscrit !</strong> Un message de confirmation a été envoyé à votre adresse e-mail.
									  </div>
			';
			echo $InscriptionOkMsg;

		}
		return $InscriptionOk;
	}
?>    
