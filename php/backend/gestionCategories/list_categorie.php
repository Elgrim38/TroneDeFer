<?php 
	/**
	*
	* Requete Sql pour récupéré l'ensemble des articles
	*
	**/
	$db= connectDB();	
	$sqlArticles =  "Select * FROM article_categorie;";
	$reqArticles = $db->query($sqlArticles);
	$dataArticles = $reqArticles->fetchAll();
	$db=null;
 ?>