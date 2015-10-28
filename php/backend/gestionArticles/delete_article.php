<?php  
/*==========  INITIALISATION DES DONNEES  ==========*/
$idAuteur = $_SESSION["Auth"]["MembreID"];	
$dateArticle = date("Y-m-d H:i:s");
$db = connectDB();


if(isset($_GET['delete'])){
    $id =$_GET['delete'];	

    // On récupére le nom de l'article supprimé
    $sqlNomArticle = "SELECT Nom FROM article_article WHERE ArticleID=$id";
	$queryNomArticle = $db->query($sqlNomArticle);
	$dataArticle = $queryNomArticle->fetchall();
	$titreArticle = $dataArticle[0]['Nom'];   

    // SUPPRESSION de l'image
    if(file_exists("../../webroot/media/images/articles/$id.jpg")) {
        unlink($_SERVER['HTTP_HOST']."/webroot/media/images/articles/$id.jpg");
        unlink($_SERVER['HTTP_HOST']."/webroot/media/images/articles/".$id."_100x100.jpg");
        $sqlDeleteImage = "DELETE FROM article_images WHERE ArticleID=$id";
        $queryDeleteImage = $db->query($sqlDeleteImage);
    } else{
        var_dump($_SERVER['HTTP_HOST']."/webroot/media/images/articles/10.jpg");
        unlink($_SERVER['DOCUMENT_ROOT']."/webroot/media/images/articles/$id.png");
        unlink($_SERVER['DOCUMENT_ROOT']."/webroot/media/images/articles/".$id."_100x100.png");
        $sqlDeleteImage = "DELETE FROM article_images WHERE ArticleID=$id";
        $queryDeleteImage = $db->query($sqlDeleteImage);
    }

    // SUPPRESSION de l'Article

   $sqlDeleteArticle = "DELETE FROM article_article WHERE ArticleID=$id";
   $queryDeleteArticle = $db->query($sqlDeleteArticle);
   $_SESSION['articleDelete']['success'] = "L'articles a été suppriméeeee avec succés.";   

   //On insère une entrée dans l'historique des activités
   $texte = '<i class="fa fa-minus-square"></i> Suppression de l\'article '.$titreArticle;
	$sqlLogArticle = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateArticle,:texte);");
	$sqlLogArticle -> bindParam(':idAuteur',$idAuteur);			
	$sqlLogArticle -> bindParam(':dateArticle',$dateArticle);
	$sqlLogArticle -> bindParam(':texte',$texte);
	$sqlLogArticle -> execute();
   header('Location:listeArticles.php');
    die();
    
}
$db = null;
?>
