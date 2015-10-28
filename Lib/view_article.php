<?php 
session_start();
include("connectDB.php");    
// On récupère l'ID de l'article depuis l'URL
$db = connectDB();
$id = $_GET['view'];

$sqlArticles = "SELECT `article_article`.`ArticleID`, `article_article`.`Nom` AS `NomArticle`,`Contenu`, `Extrait`, `Creation`, `Modification`, `Auteur`, `article_categorie`.`Nom` AS `CategorieArticle`, `article_images`.`Nom` AS                                `ImageArticle`,`Pseudo` 
                FROM article_article
				RIGHT OUTER JOIN `article_categorie` ON `article_article`.`Categorie` = `article_categorie`.`CategorieID` 
                RIGHT OUTER JOIN `article_images` ON `article_article`.`ArticleID` = `article_images`.`ArticleID` 
                RIGHT OUTER JOIN `membre_membre` ON `article_article`.`Auteur` = `membre_membre`.`MembreID` 
				WHERE `article_article`.`ArticleId` = $id";

$queryArticles = $db->query($sqlArticles);
$arrayArticles = $queryArticles->fetchAll();
$countArticles = $queryArticles->rowCount();
if ($countArticles>0) {
	$titreArticles = $arrayArticles[0]["NomArticle"];
	$extraitArticles = $arrayArticles[0]['Extrait'];
	$texteArticles = $arrayArticles[0]['Contenu'];
	$dateBrutArticles = $arrayArticles[0]['Creation'];
	$dateArticles = date("d/m/Y",strtotime($dateBrutArticles));
	$heureArticles = date("H:i",strtotime($dateBrutArticles));
	$auteurArticles = $arrayArticles[0]['Pseudo'];
	$imageArticle = $arrayArticles[0]['ImageArticle'];
	$imagesExplode = explode('.',$imageArticle);
	$images =$imagesExplode[0].'_100x100.'.$imagesExplode[1];
 	$categorie =$arrayArticles[0]['CategorieArticle'];
}
?>