<?php	
	//gestion du nom		
	if($_POST['nom']!="") {
		$nom=$_POST['nom'];
	}

	//Gestion des types		
	$listType="";	
	if(isset($_POST['type']) AND $_POST['type'] !="") {				
		$types = $_POST['type'];				
		foreach($types as $type) { 			   	
			$listType.=$type.',';
		}
	}
	if($listType!="") {
		$listType = substr($listType,0,strlen($listType)-1);
		$listTypes = 'Type IN ('.$listType.')';
		$join.="RIGHT OUTER JOIN `carte_type` ON `carte_carte`.`Type` = `carte_type`.`TypeID` ";
		$and.=' AND '.$listTypes;
	}

	//Gestion des Icones			
	$listIcone= "";
	if(isset($_POST['icone']) AND $_POST['icone'] !="") {
		$icones= $_POST['icone'];
		foreach($icones as $icone) {
			$listIcone.=$icone.',';
		}
	}
	if($listIcone!="") {
		$listIcone = substr($listIcone,0,strlen($listIcone)-1);
		$listIcones = 'IconeID IN ('.$listIcone.')';
		$join.="RIGHT OUTER JOIN `carte_defier` ON `carte_carte`.`CarteID` = `carte_defier`.`CarteID` ";    
		$and.=' AND '.$listIcones;
	}

	//Gestion des Maisons			
	$listMaison= "";
	if(isset($_POST['maison']) AND $_POST['maison'] !="") {
		$maisons = $_POST['maison'];
		foreach($maisons as $maison) {	
			$listMaison.=$maison.',';
		}
	}			    
	if($listMaison!="") {
		$listMaison = substr($listMaison,0,strlen($listMaison)-1);
		$listMaisons = 'AffiliationID IN ('.$listMaison.')';
		$join.="RIGHT OUTER JOIN `carte_appartenir` ON `carte_carte`.`CarteID` = `carte_appartenir`.`CarteID` ";			    
		$and.=' AND '.$listMaisons;
	}

	//Gestion des Vertu
	$listVertu= "";
	if(isset($_POST['vertu']) AND $_POST['vertu']!="") {
		$vertus =$_POST['vertu'];				
		foreach($vertus as $vertu) {
			$listVertu.=$vertu.',';
		}
	}
	if($listVertu!="") {
		$listVertu = substr($listVertu,0,strlen($listVertu)-1);
		$listVertus = 'VertuID IN ('.$listVertu.')';
		$join.="RIGHT OUTER JOIN `carte_qualifier` ON `carte_carte`.`CarteID` = `carte_qualifier`.`CarteID` ";			    
		$and.=' AND '.$listVertus;
	}

	//Gestion des Traits
	$listTrait= "";
	if(isset($_POST['trait']) AND $_POST['trait']!="") {
		$traits = $_POST['trait'];				
		foreach($traits as $trait) {
			$listTrait.=$trait.',';
		}
	}
	if($listTrait!="") {
		$listTrait = substr($listTrait,0,strlen($listTrait)-1);
		$listTraits = 'TraitID IN ('.$listTrait.')';
		$join.="RIGHT OUTER JOIN `carte_adouber` ON `carte_carte`.`CarteID` = `carte_adouber`.`CarteID` ";			    
		$and.=' AND '.$listTraits;
	}

	//Gestion des Mot clés
	$listmotClefs= "";
	if(isset($_POST['motClefs']) AND $_POST['motClefs']!="") {
		$motClefs =$_POST['motClefs'];				
		foreach($motClefs as $motClef) {
			$listmotClefs.="Texte Like '%".$motClef."%' AND ";
		}
	}
	if($listmotClefs!="") {
		$listmotClefs = substr($listmotClefs,0,strlen($listmotClefs)-5);
		$and.=' AND '.$listmotClefs;
	}

	//Gestion des Couts
	$operateurCout=$_POST['operateurCout'];
	$cout= $_POST['cout'];
	if($operateurCout!="-") {
		$and .= " AND Cout ".$operateurCout." ".$cout;
	}

	//Gestion de la force
	$operateurForce=$_POST['operateurForce'];

	$force= $_POST['force'];
	if($operateurForce!="-") {
		echo $operateurForce.$force;
		$and .= " AND `Force` ".$operateurForce." ".$force;
		echo $and;
	}

	$_SESSION['rechCarte'] = "SELECT DISTINCT `carte_carte`.`CarteID`,`Nom`,`Image`,`Texte`	FROM `carte_carte` ".$join."WHERE `Nom` Like '%".$nom."%'".$and." ORDER BY Nom ASC , Type ASC,Extension DESC";
?>