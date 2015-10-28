<?php
	session_start();
	include("../../Layouts/menu.php");
	
	// On récupère l'ID de l'extension depuis l'URL
	$extensionId = $_GET["id"];
	
	// On récupère le nom de l'extension depuis la base de données
	include("../../Lib/connectDB.php");
	$db = connectDB();
	
	$sqlExtension = "SELECT ExtensionNom
					 FROM carte_extension
					 WHERE ExtensionID = $extensionId;";
	$reqExtension = $db->query($sqlExtension);
	$extension = $reqExtension->fetchColumn();

	echo "
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<h1>$extension</h1>
				</div>
	";
	
	// On boucle sur les maisons
	$sqlMaisons = "SELECT AffiliationAdresse
				   FROM carte_affiliation;";
	$repMaisons = $db->query($sqlMaisons);
	
	while($maison = $repMaisons->fetch()) {
		$nomMaison=$maison['AffiliationAdresse'];
		// On boucle sur les cartes qui appartiennent à cette extension et cette maison
		$sqlCartes = "SELECT * 
					  FROM carte_carte c
					  RIGHT OUTER JOIN carte_appartenir ap ON c.CarteID = ap.CarteID
					  RIGHT OUTER JOIN carte_affiliation af ON ap.AffiliationID = af.AffiliationID
					  WHERE Extension = '$extensionId'
					  AND AffiliationAdresse = '$nomMaison'
					  ORDER BY AffiliationAdresse, Type;";
		$reqCartes = $db->query($sqlCartes);
		$count = $reqCartes->rowCount();
		
		if($count > 0) {
			echo "
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<h3>$nomMaison</h3>
				</div>
			";
			
			while($carte = $reqCartes->fetch(PDO::FETCH_ASSOC)) {
				$carteType = $carte['Type'];
				$sqlTypes = "SELECT TypeNom
							 FROM carte_type
							 WHERE TypeId='$carteType';";
				$reqType = $db->query($sqlTypes);
				while($type = $reqType->fetch(PDO::FETCH_ASSOC)) {
					$id = $carte['CarteID'];
					$nom = $carte["Nom"];
					$typeNom = $type['TypeNom'];
					echo "
					<div class='col-lg-4 col-md-4 col-sm-4'>
						<a href='http://".ROOT."/php/frontend/carte.php?id=$id'>$nom</a>
					</div>
					<div class='col-lg-8 col-md-8 col-sm-8'>
						$typeNom
					</div>
					";
				}
			}
			
		} else {
			echo "
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<h3>$nomMaison</h3>
				</div>
				<div class='col-lg-12 col-md-12 col-sm-12'>
					Les cartes ".mb_strtolower($nomMaison)." de cette extension n’ont pas encore été répertoriées.
				</div>
			";
		}
	}
	echo "
			</div>
		</div>
	";
?>