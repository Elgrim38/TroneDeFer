<?php  
$db = connectDB();
/*==========  INITIALISATION DES DONNEES  ==========*/
$idAuteur = $_SESSION["Auth"]["MembreID"];	
$dateCategory = date("Y-m-d H:i:s");if(isset($_GET['delete'])){
    $id = $_GET['delete'];	

    // On récupére le nom de la catégorie supprimé
    $sqlNomCateory = "SELECT Nom FROM article_categorie WHERE CategorieID=$id";
	$queryNomCategory = $db->query($sqlNomCateory);
	$dataCategory = $queryNomCategory->fetchall();
	$titreCategory = $dataCategory[0]['Nom'];   

	// SUPPRESSION
    $sqlDeleteCategory = "DELETE FROM article_categorie WHERE CategorieID=$id";
    $queryDeleteCategory = $db->query($sqlDeleteCategory);
   	
    $_SESSION['categoryDelete']['success'] = "La catégorie a été supprimé avec succés.";
    
    //On insère une entrée dans l'historique des activités
    $texte = '<i class="fa fa-minus-square"></i> Suppression de la catégorie '.$titreCategory;
	$sqlLogCategory = $db->prepare("INSERT INTO `logs`(`membreID`, `creation`, `action`) VALUES (:idAuteur,:dateCategory,:texte);");
	$sqlLogCategory -> bindParam(':idAuteur',$idAuteur);			
	$sqlLogCategory -> bindParam(':dateCategory',$dateCategory);
	$sqlLogCategory -> bindParam(':texte',$texte);
	$sqlLogCategory -> execute();
    header('Location:listeCategorie.php');
    die();
}
?>