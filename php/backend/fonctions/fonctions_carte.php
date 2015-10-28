<?php
	session_start();
	require_once '../../Lib/connectDB.php';	
	
	function listExtensions() {
		$db = connectDB();
		$queryExtensions = "SELECT ExtensionID, ExtensionNom 
							FROM carte_extension 
							ORDER BY 2;";
		$resultExtensions = $db->query($queryExtensions);
		$extensions = $resultExtensions->fetchAll();
		foreach($extensions as $cle=>$val) {
			$value = $val['ExtensionID'];
			$option = $val['ExtensionNom'];
			$queryCount = "SELECT COUNT(*) AS Nombre 
						   FROM carte_carte 
						   WHERE Extension = $value;";
			$resultCount = $db->query($queryCount);
			$count = $resultCount->fetchColumn();
			$carte = "carte";
			if($count > 1) {
				$carte .= "s";
			}
			$texte = "<option value='$value'";
			if(isset($_SESSION['ajoutCarte']['extension']) and $value==$_SESSION['ajoutCarte']['extension']) {
				$texte .= " selected";
			}
			$texte .= ">$option ($count $carte)</option>";
			echo $texte;
		}
		
		$db = null;
	}
	
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
			$option = $val['TypeNom'];
			$texte = "<option value='$value'";
			if(isset($_SESSION['ajoutCarte']['type']) and $value==$_SESSION['ajoutCarte']['type']) {
				$texte .= " selected";
			}
			$texte .= ">$option</option>";
			echo $texte;
		}
	}
	
	function listVertus() {
		$db = connectDB();
		$queryVertus = "SELECT VertuID, Titre, VertuNom
						FROM carte_vertu
						ORDER BY 3;";
		$resultVertus = $db->query($queryVertus);
		$vertus = $resultVertus->fetchAll();
		$db = null;
		
		foreach($vertus as $cle=>$val) {
			$value = $val['VertuID'];
			$libelle = $val['VertuNom'];
			$image = $val['Titre'];
			$texte = "	<label class='checkbox-inline'>
							<input id='vertu$value' type='checkbox' name='vertus[]' value='$value' class='check'";
			if(isset($_SESSION['ajoutCarte']['vertus']) and in_array($value, $_SESSION['ajoutCarte']['vertus'])) {
				$texte .= " checked";
			}
			$texte .= "		/>
							$image
							$libelle
						</label>";
			echo $texte;
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
			$image = "<img src='../../../webroot/media/images/icones/ico_".$libelle.".png'/>";
			$texte = "	<label class='checkbox-inline'>
							<input type='checkbox' name='maisons[]' value='$value' class='check' onclick='select_maison($(this));'";
			if(isset($_SESSION['ajoutCarte']['maisons']) and in_array($value, $_SESSION['ajoutCarte']['maisons'])) {
				$texte .= " checked";
			}
			$texte .= "		/>
							$image $libelle&nbsp;
						</label>";
			echo $texte;
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
			$image = "<img src='../../../webroot/media/images/icones/ico_".$libelle.".png'/>";
			$texte = "	<div class='col-lg-4 col-md-4 col-sm-4'>
							<label class='checkbox-inline'>
								<input type='checkbox' name='icones[]' value='$value' class='check'";
			if(isset($_SESSION['ajoutCarte']['icones']) and in_array($value, $_SESSION['ajoutCarte']['icones'])) {
				$texte .= " checked";
			}
			$texte .= "			/>
								$image
								$libelle &nbsp;
							</label>
						</div>";
			echo $texte;
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
			$texte = "<li><div class='checkbox'><label><input type='checkbox' name='traits[]' value='$value'";
			if(isset($_SESSION['ajoutCarte']['traits']) and in_array($value, $_SESSION['ajoutCarte']['traits'])) {
				$texte .= " checked";
			}
			$texte .= "/><span>$libelle</span></label></div></li>";
			echo $texte;
		}
	}
?>