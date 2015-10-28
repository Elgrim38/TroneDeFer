<?php
session_start();
include("../../Lib/view_article.php");      

    // On récupère l'ID de l'article depuis l'URL
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
	$titre ="$titreArticles";
	include("../../Layouts/menu.php");
?>
<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12">
		<article>
			<div class="col-lg-12 col-sm-12 col-md-12">
				<div class="head"><h1 id="titre_article"><?php echo $titreArticles; ?></h1></div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12">
				<div class="resume">
					<img class="thumbs"src="http://www.letronedeferjce.com/webroot/media/images/articles/<?php echo $images?>" alt="$titreArticles"/>
					<p class='first'><?php echo $extraitArticles; ?></p>
					<p class="second">L'article a été écrit par <span class="gras"> <?php echo $auteurArticles; ?></span></p>
					<p class="second">Le <span class="gras"><?php echo  $dateArticles.'</span> à <span class="gras"> '.$heureArticles; ?></span></p>
					<p class="second">Catégorie de l'article : <span class="gras"><?php echo $categorie; ?></span></p>  
					<div class="clear"></div>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12">
				<div class="mt1">
					<?php echo $texteArticles; ?>
				</div>
			</div>
		</article>
	</div>
</div>
<?php 
}
else{
	$titre ="Article inexistant";
	include("../../Layouts/menu.php");
	echo "
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12'>
		<div class='col-lg-12 col-md-12 col-sm-12'>
			<div class='alert alert-danger' role='alert'>
				Cet article n'existe pas !
			</div>
		</div>
		<div class='col-lg-4 col-md-4 col-sm-3'></div>
		<div class='col-lg-4 col-md-5 col-sm-6'>
			<img src='../../webroot/media/images/hodor.png' alt='Hodor !'>
		</div>
	</div>
</div>
	";
}
 ?>
