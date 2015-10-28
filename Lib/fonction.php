<?php
	require('../../Lib/connectDB.php');
	function listTypes() {
		$db = connectDB();
		$queryTypes = "SELECT TypeID, TypeNom 
					   FROM carte_type 
					   ORDER BY 1;";
		$resultTypes = $db->query($queryTypes);
		$types = $resultTypes->fetchAll();
		$db = null;
		
		foreach($types as $cle=>$val) {
			$value = $val['TypeID'];
			$libelle = $val['TypeNom'];
			echo "<input type='checkbox' name='type[]' value='$value' class='check'/><span class=' pl1 box'>$libelle &nbsp;</span>";
		}
	}
	
	function listMaisons() {
		$db = connectDB();
		$queryMaisons = "SELECT AffiliationID, AffiliationAdresse 
						 FROM carte_affiliation 
						 ORDER BY 1;";
		$resultMaisons = $db->query($queryMaisons);
		$maisons = $resultMaisons->fetchAll();
		$db = null;
		
		foreach($maisons as $cle=>$val) {
			$value = $val['AffiliationID'];
			$libelle = $val['AffiliationAdresse'];
			$image = "<img src='../../webroot/media/images/icones/ico_".$libelle.".png'/>";
			echo "<label class='checkbox-inline'><input type='checkbox' name='maison[]' value='$value' class='check'/><span class='box'>$image $libelle &nbsp;</span></label>";
		}
	}
	
	function listTraits() {
		$db = connectDB();
		$queryTraits = "SELECT TraitID, TraitAdresse 
						FROM carte_trait 
						ORDER BY 2;";
		$resultTraits = $db->query($queryTraits);
		$traits = $resultTraits->fetchAll();
		$db = null;
		
		foreach($traits as $cle=>$val) {
			$value = $val['TraitID'];
			$libelle = $val['TraitAdresse'];
			echo "	<li>
						<div class='checkbox'>
							<label>
								<input type='checkbox' name='traits' value='$value'/>
								<span>$libelle</span>
							</label>
						</div>
					</li>";
		}
	}

	function listVertu() {
		$db = connectDB();
		$queryVertus = "SELECT VertuID, Titre,VertuNom
						FROM carte_vertu 
						ORDER BY 3;";
		$resultVertus = $db->query($queryVertus);
		$vertus = $resultVertus->fetchAll();
		$db = null;
		
		foreach($vertus as $cle=>$val) {
			$value = $val['VertuID'];
			$libelle = $val['VertuNom'];
			$image = $val['Titre'];
			echo "	<label class='checkbox-inline'>
						<input type='checkbox' name='vertu[]' value='$value' class='check'/>
						$image
						<span class='box'>$libelle</span>
					</label>";
		}
	}
	
	function listIcones() {
		$db = connectDB();
		$queryIcones = "SELECT IconeID, IconeNom 
					   FROM carte_icone
					   ORDER BY 1;";
		$resultIcones = $db->query($queryIcones);
		$icones = $resultIcones->fetchAll();
		$db = null;
		
		foreach($icones as $cle=>$val) {
			$value = $val['IconeID'];
			$libelle = $val['IconeNom'];
			$image = "<img src='../../webroot/media/images/icones/ico_".$libelle.".png'/>";
			echo "	<div class='col-lg-3 col-md-3 col-sm-3'>
						<input type='checkbox' name='icone[]' value='$value' class='check'/>
						$image
						<span class='box'>$libelle &nbsp;</span>
					</div>";
		}
	}

	function flash(){
	    if(isset($_SESSION['Flash'])){
	        extract($_SESSION['Flash']);
	        unset($_SESSION['Flash']);
	        return "<div class='alert alert-$type'>$message</div>";
	    }
	}

	function setFlash($message, $type = 'success'){
	    $_SESSION['Flash']['message'] = $message;
	    $_SESSION['Flash']['type'] = $type;
	}
