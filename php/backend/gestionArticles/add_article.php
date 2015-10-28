<?php 
	$idAuteur = $_SESSION["Auth"]["MembreID"];	
	/*==========  Inclusion  ==========*/
	
	require '../../Lib/image.php';
	
	/*==========  Initialisation des valeurs  ==========*/

	$titreArticle ="";
	$extraitArticle ="";
	$texteArticle ="";
	$dateArticle = date("Y-m-d H:i:s");
	$online=1;
	$extension ="";
	$valider ='Poster';

	/*==========  Test de controle des champs ==========*/

	if(isset($_REQUEST['validation']) AND $_REQUEST['validation']=== $valider) {
		/*==========  Initialisation des valeurs en lien avec le formulaire ==========*/
		$titreArticle =$_POST['titre'];
		$extraitArticle =$_POST['extrait'];
		$texteArticle =$_POST['article'];
		$categorie =$_POST['categorie'];

		if (!empty($titreArticle) AND !empty($extraitArticle) AND !empty($texteArticle) AND !empty($idAuteur) AND !empty($categorie) ) {
			$sqlArticle = $db->prepare( "INSERT INTO `article_article`(`Nom`, `Contenu`, `Extrait`, `Online`, `Creation`, `Auteur`, `Categorie`) 
										 VALUES (:titreArticle,:texteArticle,:extraitArticle,:online,:dateArticle,:idAuteur,:categorie);");
			$sqlArticle -> bindParam(':titreArticle',$titreArticle);
			$sqlArticle -> bindParam(':texteArticle',$texteArticle);
			$sqlArticle -> bindParam(':extraitArticle',$extraitArticle);
			$sqlArticle -> bindParam(':online',$online);
			$sqlArticle -> bindParam(':dateArticle',$dateArticle);
			$sqlArticle -> bindParam(':idAuteur',$idAuteur);
			$sqlArticle -> bindParam(':categorie',$categorie);
			$sqlArticle->execute();

			/*==========  Ajout d'images  ==========*/
	        $articles_id = $db->lastInsertId();
	        $files = $_FILES['images'];	        
	        $extension = pathinfo($files['name'], PATHINFO_EXTENSION); 
	        if($extension == 'jpg' OR $extension == 'png' ){
	        	   $image_name = $articles_id.'.'.$extension;
	               $db->query("INSERT INTO `article_images`(`Nom`, `ArticleID`) VALUES ('$image_name','$articles_id')");
	               move_uploaded_file($files['tmp_name'], '../../webroot/media/images/articles/' . $image_name);
	               resizeImage('../../webroot/media/images/articles/' . $image_name, 100,100);
	        }   
	        $texte = '<i class="fa fa-plus-square"></i> Ajout de l\'article '.$titreArticle;
			$sqlLogArticle = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateArticle,:texte);");
			$sqlLogArticle -> bindParam(':idAuteur',$idAuteur);			
			$sqlLogArticle -> bindParam(':dateArticle',$dateArticle);
			$sqlLogArticle -> bindParam(':texte',$texte);
			$sqlLogArticle -> execute();
			$texte = '<i class="fa fa-plus-square"></i> Ajout de l\'image de l\'article '.$titreArticle;
			$sqlLogImage = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateArticle,:texte);");
			$sqlLogImage -> bindParam(':idAuteur',$idAuteur);			
			$sqlLogImage -> bindParam(':dateArticle',$dateArticle);
			$sqlLogImage -> bindParam(':texte',$texte);
			$sqlLogImage -> execute();
			$_SESSION['articleAjout']['success'] = "L'articles a été ajouter avec succés.";
			header('Location:listeArticles.php');
		}
		else{
			echo'Veuillez saisir un titre';
		}
	}
	$db = null;

 ?>
