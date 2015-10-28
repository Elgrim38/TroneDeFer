	<?php 
  //var_dump($_SESSION);
	define('ROOT', $_SERVER["HTTP_HOST"]);
	if((!isset($_SESSION['Auth']['MembreID'])) OR $_SESSION['Auth']['MembreID']=="" OR $_SESSION['Auth']['Actif']!="1") {
		header("Location: http://www.letronedeferjce.com");
	}

	?>
	<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<base href="http://letronedeferjce.com"> 
		<title><?php echo "Le Tr&ocirc;ne de Fer JCE - ".$titre; ?> </title>
		<link rel="stylesheet" href="../../webroot/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../webroot/css/bootstrap-theme.css">
		<link rel="stylesheet" href="../../webroot/css/style.css">
		<link rel="stylesheet" type="text/css" href="../../webroot/css/formAjoutCarte.css"/>
		<link rel="shortcut icon" href="../../webroot/media/images/icone.ico" type="image/x-icon"/>
		<link rel="icon" href="../../webroot/media/images/icone.ico" type="image/x-icon"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type= "text/javascript" src="../../webroot/js/bootstrap.min.js"></script>
		<script type= "text/javascript" src="../../webroot/js/rechercheAjax.js" ></script>
	</head>
	<body>      
		<div class="container hauteurContainer">
			<div class="row">
				<div class="center">
					<img src="../webroot/media/images/logo.png" alt="logo">
				</div>
				<div class="fdblanc">
					<header style="text-transform:uppercase">
						<div style="text-"></div>
						<nav class="navbar navbar-default" role="navigation">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="blanc navbar-brand" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php">Accueil</a>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li><a class="blanc" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/articles.php">Articles</a></li>
									<li><a class="blanc" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/edition.php">Cycles</a></li>
									<li><a class="blanc" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/formRechercheCarte.php">Cartes</a></li>
									<li class="dropdown">
										<a href="#" class="blanc dropdown-toggle" data-toggle="dropdown">Decks <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/$content">Les derniers decks</a></li>
											<li class="divider"></li>
											<li><a  href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/$content">Rechercher un deck</a></li>
											<li class="divider"></li>
											<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/$content">Soumettre un deck</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="blanc dropdown-toggle" data-toggle="dropdown">Communauté <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="http://letronedeferjce.forumactif.com">Forums</a></li>
											<li class="divider"></li>
											<li><a href="php/frontend/chat.php">Chat</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="blanc dropdown-toggle" data-toggle="dropdown">Art <span class="caret"></span></a>
										<ul class=" dropdown-menu">
											<li><a  href="php/frontend/$content">Wallpapers</a></li>
											<li class="divider"></li>
											<li><a href="php/frontend/$content">Fan Art</a></li>
											<li class="divider"></li>
											<li><a href="php/frontend/$content">Vidéos</a></li>
										</ul>
									</li>
									<li><a class="blanc" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/regles.php">Règles</a></li>
								</ul>
								<!--form class="navbar-form navbar-left" role="search" method="get" action="result.php">
									<div class="form-group">
										<input type="text" name="rechercher" id='recherche' class="form-control">
										<div class="resultat col-lg-4" id="resultat">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, assumenda, harum aperiam quam quisquam id quidem repudiandae perspiciatis error tempora. Fugit, ex sit nesciunt amet voluptatibus illum sunt ratione commodi.</div>   
										<a href="../../webroot/ajax/result.php">trololololololol</a>
									</div>
								</form-->
								<ul class="nav navbar-nav navbar-right">
									<li><a class="blanc" href="http://<?= $_SERVER['HTTP_HOST'] ?>/php/frontend/formModifProfil.php">Profil</a></li>
									<?php
										if ($_SESSION['Auth']['Rang'] == 1) {
											echo'<li><a style="btn btn-primary" href="http://'.$_SERVER['HTTP_HOST'].'/php/backend">Backend</a></li>';
										}
									?>
									<li class="dropdown"><a href="../Lib/logOut.php">Déconnexion </a></li>             
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</header>