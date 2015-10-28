<?php
	include_once("Lib/connectDB.php"); 
    $_SESSION['Auth']['MembreID'] = "";
	$db = connectDB();
	
	/*
	* Connexion
	*/
	if ($validation == 'Connexion') {
		if(isset($_POST['pseudo']) && isset($_POST['password'])){
			
		    $pseudo = $db->quote($_POST['pseudo']);
		    $password = sha1($_POST['password']);
		    $select = $db->query("SELECT * FROM membre_membre WHERE pseudo=$pseudo AND password='$password'");
		    if($select->rowCount() > 0){
		        $_SESSION['Auth'] = $select->fetch();     
		        header('Location: php/index.php');
		    }
		    else{
		    	require 'gestionErreur.php';
		    }
		}
		else{
			require 'gestionErreur.php';
		}
	}
	
	
	// Inscription 
	
if($validation=='Inscription'){	
		/*
		* Initialisation des valeurs
		*/		
		$pseudo =$_POST['pseudo'];
		$mail =$_POST['email'];
		$rang = 3;
		$actif = 0; 
		$statut = 0;
		$token = sha1(uniqid(rand()));
		$mdp = $_POST['password'];
		$mdp2= $_POST['password_confirm'];
		if(strlen($_POST['pseudo'])>5 and strlen($_POST['password'])>=6 and filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL ) and $_POST['password']===$_POST['password_confirm']){
			$sqlPseudo ="SELECT Pseudo,Mail,Token FROM membre_membre WHERE pseudo ='$pseudo'";
			$reqPseudo = $db->query($sqlPseudo);
			$countPseudo= $reqPseudo->rowCount();
			if ($countPseudo>0) {
				require_once 'gestionErreur.php';	
			}
			else{
				$mdp = sha1($_POST['password']);
				$mdp2= sha1($_POST['password_confirm']);
				$sqlInscription = $db->prepare("INSERT INTO membre_membre (`Pseudo`, `Mail`, `Password`, `Token`,`Rang`,`Actif`) VALUES (:name, :mail, :mdp, :token , :rang, :actif)");        
				$sqlInscription->bindParam(':name', $pseudo);
				$sqlInscription->bindParam(':mail', $mail);
				$sqlInscription->bindParam(':mdp', $mdp);
				$sqlInscription->bindParam(':token', $token);
				$sqlInscription->bindParam(':rang', $rang, PDO::PARAM_INT);    
				$sqlInscription->bindParam(':actif', $actif, PDO::PARAM_INT);    
				$sqlInscription->execute();
				
				$to      = $mail;
	     		$subject = 'Activation de votre compte';
				$message = '<p>Bonjour '.$pseudo.',</p>
						<p>
						Merci de vous être inscrit sur Le Trône de Fer JCE et bienvenue parmi nous !
						Pour finaliser votre inscription, il ne vous reste plus qu\'à suivre le lien ci-dessous : <br/>
						<a href="http://letronedeferjce.com/php/activation.php?id='.$token.'">Cliquer ici pour activer votre compte</a>
						</p> 
						A bientôt sur Le Trône de Fer JCE !';
				 $headers  = 'MIME-Version: 1.0' . "\r\n";
	    		 $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				mail($to,$subject,$message,$headers);
				$_SESSION['inscription']['success'] = "<span class='strong'>Votre demande a été prise en compte</span> ! Un message a été envoyé à votre adresse e-mail.";
			}
		} else {
			require_once 'gestionErreur.php';
		}
	}

if($validation=='Envoyer'){		
		/*
		* Initialisation des valeurs
		*/		
		$mail =$_POST['email'];
		if (!empty($mail) AND filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL )){
			$sqlPassword = "SELECT Pseudo,Mail,Token FROM membre_membre WHERE mail ='$mail'";
			$reqPassword = $db->query($sqlPassword);
			$dataPassword = $reqPassword->fetch();
			$countPassword = $reqPassword->rowCount();
			if ($countPassword > 0) {
				$to      = $mail;
	     		$subject = 'Changement de votre mot de passe';
				$message = '<p>Bonjour '.$dataPassword['Pseudo'].',</p>
						<p>
						Pour finaliser le changement de votre mot de passe, il ne vous reste plus qu\'à suivre le lien ci-dessous : <br/>
						<a href="http://letronedeferjce.com/php/resetPassword.php?id='.$dataPassword['Token'].'">Cliquer ici pour changer votre mot de passe</a>
						</p> 
						A bientôt sur Le Trône de Fer JCE !';
				 $headers  = 'MIME-Version: 1.0' . "\r\n";
	    		 $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				 mail($to,$subject,$message,$headers);
				 $_SESSION['password']['success'] = "<span class='strong'>Votre demande a été prise en compte</span> ! Un message a été envoyé à votre adresse e-mail.";
			} else {
				require_once 'gestionErreur.php';
			}
		} else {
			require_once 'gestionErreur.php';
		}
	}