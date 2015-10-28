<?php 

$db = connectDB();
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$sqlNom = "SELECT `Nom`,`Contenu`,`Extrait`,`Categorie` FROM `article_article` WHERE `ArticleID`= $id";
	echo $sqlNom;
	$queryNom = $db->query($sqlNom);
	$dataArticle = $queryNom->fetch();
	$nomArticle = $dataArticle['Nom'];
	$contenuArticle= $dataArticle['Contenu'];
	$extraitArticle= $dataArticle['Extrait'];
	$dateModif = date("Y-m-d H:i:s");
	$idCategorie= $dataArticle['Categorie'];
	$categoriePrecedente = $dataArticle['Categorie'];
	$valider = "Editer";
	if(isset($_REQUEST['Validation']) AND $_REQUEST['Validation']=== $valider) {
		$id = $_REQUEST['id'];
		$nomArticle = $_REQUEST['titre'];		
		$contenuArticle= $_REQUEST['article'];
		$extraitArticle= $_REQUEST['extrait'];
		$idCategorie= $_REQUEST['categorie'];
		$udapteArticle = $db->prepare("UPDATE article_article SET Nom = :nom,Contenu = :contenu, Extrait = :extrait, Modification=:date WHERE ArticleID = :id;");
		$udapteArticle ->bindParam(':nom', $nomArticle);
		$udapteArticle ->bindParam(':contenu', $contenuArticle);
		$udapteArticle ->bindParam(':extrait', $nomArticle);
		$udapteArticle ->bindParam(':date', $contenuArticle);
		$udapteArticle ->bindParam(':id', $id);
		$udapteArticle->execute();
		header("Location : listeArticles.php");
	}
}

?>