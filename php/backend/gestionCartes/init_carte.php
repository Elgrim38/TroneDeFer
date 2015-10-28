<?php
	session_start();
	
	$id = $_GET["id"];	
	unset($_SESSION['ajoutCarte']);	
	if($id != 0) {
		require_once '../../../Lib/connectDB.php';
		$db = connectDB();
		
		$queryCarte = "SELECT * FROM carte_carte WHERE CarteID = $id;";
		$resultCarte = $db->query($queryCarte);
		$carte = $resultCarte->fetch(PDO::FETCH_ASSOC);
		
		$queryVertus = "SELECT VertuID FROM carte_qualifier WHERE CarteID = $id;";
		$resultVertus = $db->query($queryVertus);
		$rVertus = $resultVertus->fetchAll();
		$vertus = array();
		foreach($rVertus as $rVertu) {
			array_push($vertus, $rVertu['VertuID']);
		}
		
		$queryMaisons = "SELECT AffiliationID FROM carte_appartenir WHERE CarteID = $id;";
		$resultMaisons = $db->query($queryMaisons);
		$rMaisons = $resultMaisons->fetchAll();
		$maisons = array();
		foreach($rMaisons as $rMaison) {
			array_push($maisons, $rMaison['AffiliationID']);
		}
		
		$queryIcones = "SELECT IconeID FROM carte_defier WHERE CarteID = $id;";
		$resultIcones = $db->query($queryIcones);
		$rIcones = $resultIcones->fetchAll();
		$icones = array();
		foreach($rIcones as $rIcone) {
			array_push($icones, $rIcone['IconeID']);
		}
		
		$queryTraits = "SELECT TraitID FROM carte_adouber WHERE CarteID = $id;";
		$resultTraits = $db->query($queryTraits);
		$rTraits = $resultTraits->fetchAll(PDO::FETCH_ASSOC);
		$traits = array();
		foreach($rTraits as $rTrait) {
			array_push($traits, $rTrait['TraitID']);
		}
		
		$image = explode(".", $carte['Image']);
		
		$_SESSION['ajoutCarte']['edit'] = $id;
		
		$_SESSION['ajoutCarte']['nom'] = $carte['Nom'];
		$_SESSION['ajoutCarte']['extension'] = $carte['Extension'];
		$_SESSION['ajoutCarte']['type'] = $carte['Type'];
		$_SESSION['ajoutCarte']['texte'] = $carte['Texte'];
		$_SESSION['ajoutCarte']['vertus'] = $vertus;
		$_SESSION['ajoutCarte']['cout'] = $carte['Cout'];
		$_SESSION['ajoutCarte']['force'] = $carte['Force'];
		$_SESSION['ajoutCarte']['prise'] = $carte['Prise'];
		$_SESSION['ajoutCarte']['or'] = $carte['Gold'];
		$_SESSION['ajoutCarte']['influence'] = $carte['Influence'];
		$_SESSION['ajoutCarte']['initiative'] = $carte['Initiative'];
		$_SESSION['ajoutCarte']['image'] = $image[0];
		$_SESSION['ajoutCarte']['maisons'] = $maisons;
		$_SESSION['ajoutCarte']['icones'] = $icones;
		$_SESSION['ajoutCarte']['traits'] = $traits;
	}
	
	header("Location: ../formAjoutCarte.php");
?>