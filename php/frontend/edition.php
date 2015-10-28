<?php
	session_start();
	include("../../Layouts/menu.php");

	// On récupère l'ensemble des cycles depuis la base de données
	include("../../Lib/connectDB.php");
	$db = connectDB();
	$sqlCycle = 'SELECT *
				 FROM carte_cycle;';
	$reqCycle = $db->query($sqlCycle);

	echo "
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
	";
	
	while($cycle = $reqCycle->fetch()) {
		$cycleNom = $cycle['CycleNom'];
		$cycleID = $cycle['CycleID'];
		$sqlExtension = "SELECT * 
						 FROM carte_extension 
						 WHERE cycle = $cycleID;";
		$reqExtension = $db->query($sqlExtension);
		$count = $reqExtension->rowCount();
		if($count > 0) {
			echo " 
				<div class='col-xs-6 col-sm-4'>
					<div class='borderEdition hauteurEditionBloc pl1 mb1 mb1'> 
						<h3>$cycleNom</h3>
			";
			while($extension= $reqExtension->fetch()) {
				$ext = $extension['ExtensionID'];
				$nom = $extension['ExtensionNom'];
				echo "
						<a href='http://".ROOT."/php/frontend/extension.php?id=$ext'>$nom</a>
						<br/>
				";
			}
			echo "
					</div>
				</div>
			";  
		}
	}
	
	echo "
			</div>
		</div>
	";
?>