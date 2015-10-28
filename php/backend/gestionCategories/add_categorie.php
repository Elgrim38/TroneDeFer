<?php 
	$db=connectDB();
	/*==========  INITIALISATION DES VALEURS  ==========*/
		$idAuteur = $_SESSION["Auth"]["MembreID"];	
		$dateArticle = date("Y-m-d H:i:s");	
		$nomCategorie ="";
		$id = "";
		$valider="Ajouter";

	/*==========  Test de controle des champs ==========*/
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$sqlNom = "SELECT `Nom` FROM `article_categorie` WHERE `CategorieID` = $id";
		$queryNom = $db->query($sqlNom);
		$dataCategorie = $queryNom->fetch();
		$nomCategorie = $dataCategorie['Nom'];
		$categoriePrecedente = $dataCategorie['Nom'];
		$valider = "Editer";
		if(isset($_REQUEST['Validation']) AND $_REQUEST['Validation']=== $valider) {
			$nomCategorie = $_REQUEST['nomCategorie'];
			/*==========  REQUETE SQL POUR LA MISE A JOUR DE LA CATEGORIE   ==========*/
			$sqlCategorie= "UPDATE `article_categorie` SET `Nom`='$nomCategorie' WHERE `CategorieID` = '$id' ";
			//$sqlCategorie->bindparam(':nomCategorie',$nomCategorie);
			//$sqlCategorie->bindparam(':id',$id);
			//$sqlCategorie->execute();
			$queryCategorie = $db->query($sqlCategorie);
			$texte = '<i class="fa fa-pencil-square-o"></i> Edition de la catégorie '.$categoriePrecedente.' par '.$nomCategorie;
			//On insère une entrée dans l'historique des activités			
			$sqlLogArticle = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateArticle,:texte);");
			$sqlLogArticle -> bindParam(':idAuteur',$idAuteur);			
			$sqlLogArticle -> bindParam(':dateArticle',$dateArticle);
			$sqlLogArticle -> bindParam(':texte',$texte);
			$sqlLogArticle -> execute();

			//Suppression les variables de session pour que le formulaire soit remis à vide
			unset($_SESSION['categorie']);
			$_SESSION['categorie']['success'] = "la catégorie a été modifiée avec succès.";
			header('Location:listeCategorie.php');
		}
	}
	else{
		if(isset($_REQUEST['Validation']) AND $_REQUEST['Validation']==='Ajouter') {
			$nomCategorie = $_REQUEST['nomCategorie'];
			/*==========  REQUETE SQL POUR LA CREATION DE LA CATEGORIE   ==========*/
			$sqlCategorie = $db->prepare("INSERT INTO `article_categorie`(`Nom`) VALUES (:nomCategorie)");
			$sqlCategorie->bindparam(':nomCategorie',$nomCategorie);
			$sqlCategorie->execute();
			$texte = '<i class="fa fa-plus-square"></i> Ajout de la catégorie '.$nomCategorie;
			//On insère une entrée dans l'historique des activités			
			$sqlLogArticle = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateArticle,:texte);");
			$sqlLogArticle -> bindParam(':idAuteur',$idAuteur);			
			$sqlLogArticle -> bindParam(':dateArticle',$dateArticle);
			$sqlLogArticle -> bindParam(':texte',$texte);
			$sqlLogArticle -> execute();
			//Suppression les variables de session pour que le formulaire soit remis à vide
			unset($_SESSION['categorie']);
			$_SESSION['categorie']['success'] = "la catégorie a été créée avec succès.";
			header('Location:listeCategorie.php');
		}		
	}

 ?>