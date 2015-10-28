<!DOCTYPE html>
<?php 
	session_start();
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title><?php echo "Le Tr&ocirc;ne de Fer JCE - ".$titrePage; ?></title>
		
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="../../webroot/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../webroot/css/sb-admin.css" >
		<link rel="stylesheet" href="../../webroot/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../webroot/css/formAjoutCarte.css"/>
		<!-- Page Specific CSS -->
		<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
		<!-- Scripts JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>
	
	<body>
		<div id="wrapper">
	
			<!-- Sidebar -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Accueil</a>
					<a class="navbar-brand" href="../">Retour au site</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock"></i> Sécurité <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Gestion des accès</a></li>
								<li><a href="#">Gestion des groupes</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-history"></i> Journaux d'activité <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/listeLogs.php?classe=1">Catégories / articles / images</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/listeLogs.php?classe=2">Cartes / extensions / cycles</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/listeLogs.php?classe=3">Inscriptions / connexions</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Gestion des articles <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/formAjoutArticle.php">Ecrire un article</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/listeArticles.php">Liste des articles</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/listeCategorie.php">Liste des catégories</a></li>
							</ul>
						</li>						
						<li><a href="bootstrap-elements.html"><i class="fa fa-users"></i> Gestion des membres</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-picture-o"></i> Gestion des cartes <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/gestionCartes.php">Gestion des cartes</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/gestionExtensions.php">Gestion des extensions</a></li>
								<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/backend/gestionCycles.php">Gestion des cycles</a></li>
							</ul>
						</li>
					</ul>          
				</div><!-- /.navbar-collapse -->
			</nav>