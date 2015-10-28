<?php
	session_start();
	$titre='Résultats de la recherche';
	require_once('../../Layouts/menu.php');
	require_once('../../Lib/connectDB.php');
	$db=connectDB();
	$and="";
	$join="";
	$nom="";

	if(isset($_POST['Rechercher'])) {
		require_once('constructionRequeteRechercheCarte.php');
	}
	
	if(isset($_SESSION['rechCarte']) && $_SESSION['rechCarte'] != "" && isset($_POST['Rechercher'])) {
		// Construction de la pagination
		$sqlCountRecherche = "Select Count(`carte_carte`.`CarteID`) From carte_carte ".$join." WHERE `Nom` Like '%".$nom."%'$and";
		$reqCountCartes = $db->query($sqlCountRecherche); 
		$countRecherche = $reqCountCartes->fetchColumn();
		
		// Exécution de la requête avec la limite
		$sqlRechercheCarte = $_SESSION['rechCarte'].";";
		$reqRechercheCartes= $db->query($sqlRechercheCarte);	
		
		$_SESSION['data'] = $reqRechercheCartes->fetchAll();
		$_SESSION['limit'] = 24;
		$_SESSION['rechCarte'] = "";
	}
	
	echo "
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<h1 class='text-center'>Résultats de la recherche</h1>
				</div>
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<p><a href='/php/frontend/formRechercheCarte.php'>Retour à la page précédente</a></p>
				</div>
	";
	
	if(isset($_SESSION['data']) && !empty($_SESSION['data'])) {
		if (isset($_GET['p']) && $_GET['p'] != 1) {
			$deb = $_SESSION['limit'] * ($_GET['p'] - 1);
			$end = $deb + $_SESSION['limit'];
		} else {
			$deb = 0;
			$end = $_SESSION['limit'];
		}
		
		for($i=$deb ; $i<$end ; $i++) { 
			if($i < count($_SESSION['data'])) {
				$id = $_SESSION['data'][$i]['CarteID'];
				$nom = $_SESSION['data'][$i]['Nom'];
				$img = $_SESSION['data'][$i]['Image'];
				$txt = $_SESSION['data'][$i]['Texte'];
				echo "
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<div class='spoil_item'>
						<div>
							<img class='imgMoteur' src='http://www.agotcards.org/cards/eng/medium/$img' alt='$img'/>
						</div>
						<div>
							<span class='gras'>
								<a href='http://letronedeferjce.com/php/frontend/carte.php?id=$id'>$nom</a>
							</span>
							<p>$txt</p>
						</div>
					</div>
				</div>
				";
			}
		}
		
		//Pagination
		if(count($_SESSION['data']) > $_SESSION['limit']) {
			$nb_element = count($_SESSION['data']); //150
			$max_paginate = round($nb_element / $_SESSION['limit']);
			$max_paginate++;
			
			echo "
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<ul class='pagination'>
			";
			for($i=1 ; $i<$max_paginate ; $i++) {
				echo "	<li><a href='http://letronedeferjce.com/php/frontend/traitementRechercheCarte.php?p=$i'>$i</a></li>";
			}
			echo "	</ul>
				</div>
			";
		}
		
	} else {
		echo "	<div class='col-lg-12 col-md-12 col-sm-12'>
					<div class='alert alert-danger' role='alert'>
						La recherche n'a retourné aucun résultat.
					</div>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-3'></div>
				<div class='col-lg-4 col-md-5 col-sm-6 hodor'>
					<img src='../../webroot/media/images/hodor.png' alt='Hodor !'>
				</div>
		";
	}
	
	echo "	</div>
		</div>
	";
?>