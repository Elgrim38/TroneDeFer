<?php 
	require_once('../../Lib/connectDB.php');
	$db = connectDB();
	$q=$_GET['q'];
//
	if(!empty($q)){
		$sql ="SELECT `Nom`,`Texte`FROM `carte_carte` WHERE `Nom` LIKE'$q%'";
		$req= $db->query($sql);
		$count = $req->rowCount();
		if ($count>0) {
			$data = $req->fetchAll();
			for ($i=0; $i < $count ; $i++) { 
				echo '<div class="panel panel-warning">
						<div class="panel-heading">
							<h3>'.$data[$i]['Nom'].'</h3>
						</div>
						<div class="panel-footer">
						<p>'.$data[$i]['Texte'].'</p>
						</div>'
						;
			}
		}
		else{
			echo'aucune recherche pour '.$q;
		}
		echo'test';
	}
	else{
		$q="vide";
	}
?>