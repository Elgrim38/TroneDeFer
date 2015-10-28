<?php 
	require_once"../../Lib/connectDB.php";
	$db= connectDB();
	/**
	*
	* Requete Sql pour récupéré l'ensemble des articles
	*
	**/
    $sqlArticles =  "SELECT `article_article`.`ArticleID`, `article_article`.`Nom` AS `NomArticle`, `Extrait`, `Creation`, `Modification`, `Auteur`, `article_categorie`.`Nom` AS `CategorieArticle`, `article_images`.`Nom` AS                                `ImageArticle`,`Pseudo` 
                     From `article_article` 
                     RIGHT OUTER JOIN `article_categorie` ON `article_article`.`Categorie` = `article_categorie`.`CategorieID` 
                     RIGHT OUTER JOIN `article_images` ON `article_article`.`ArticleID` = `article_images`.`ArticleID` 
                     RIGHT OUTER JOIN `membre_membre` ON `article_article`.`Auteur` = `membre_membre`.`MembreID` 
                     Where `Auteur` != 'NULL' ORDER BY `article_article`.`Creation` DESC";
    
    $reqArticles = $db->query($sqlArticles);
    $dataArticles = $reqArticles->fetchAll(); 
?>