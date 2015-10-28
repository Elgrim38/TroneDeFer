<?php 
	include('../../Layouts/menu.php');
	include ('../../Lib/fonction.php');	
	require_once('../../Lib/connectDB.php');
	$db=connectDB();
	
	if (isset($_POST['envoyer'])) {
		//Gestion des types
			$sqlTypes="SELECT * FROM `carte_type`";
			$reqTypes= $db->query($sqlTypes);
			$types = $reqTypes->fetchAll();
			$tableauType= "";
			
			foreach ($types as $k => $v) {
			    if (isset($_POST['type'.$v['TypeID']])) {
			        $tableauType.=$v['TypeID'].' OR ';
			    }
			}
			if($tableauType!=""){
			    //echo strlen($tableauType);
			    $tableauType = substr($tableauType,0,strlen($tableauType)-4);
			    $tableauTypes = 'Type = ('.$tableauType.')';
			    echo $tableauTypes;
			}
		//Gestion des Icones
			$sqlIcones="SELECT * FROM `carte_icone`";
			$reqIcones= $db->query($sqlIcones);
			$icones = $reqIcones->fetchAll();
			$tableauIcone= "";
			
			foreach ($icones as $k => $val) {
			    if (isset($_POST['icone'.$val['IconeID']])) {
			        $tableauIcone.=$val['IconeID'].' OR ';
			    }
			}
			if($tableauIcone!=""){
			    //echo strlen($tableauType);
			    $tableauIcone = substr($tableauIcone,0,strlen($tableauIcone)-4);
			    $tableauIcones = 'Icone = ('.$tableauIcone.')';
			    echo $tableauIcones;
			}
	}
?>
	<body>
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h1 class="text-center">Rechercher une carte</h1><br/>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<form id="form_carte" class="form-horizontal" action="php/frontend/moteur_carte.php" method="post">
					<!-- NOM -->
					<div class="form-group">
						<label for="txtNom" class="col-lg-2 col-md-2 col-sm-2 control-label">Nom :</label>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input id="txtNom" class="form-control" type="text" name="nom"/>
						</div>
					</div>
					
					<!-- EXTENSION -->
					<div class="form-group">
						<label for="lstExt" class="col-lg-2 col-md-2 col-sm-2 control-label">Extension :</label>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<select id="lstExt" class="form-control" name="extension" >
								<?php listExtensions(); ?>
							</select>
						</div>
						<label for="spnCout" class="col-lg-1 col-md-1 col-sm-1 control-label">Co&ucirc;t :</label>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input id="spnCout" type="number" name="cout" class="form-control" value="0" min="0" max="15"/>
						</div>
					</div>
				
					<!-- TYPE & COUT -->
					<div class="form-group">
						<label for="lstType" class="col-lg-2 col-md-2 col-sm-2 control-label">Type :</label>
						<?php listTypes(); ?>
					</div>
				
					<!-- VERTU -->
					<div class="form-group">
						<label class="col-lg-2 col-md-2 col-sm-2 control-label">Vertu :</label>
						<?php listVertu(); ?>
					</div>
				
					<!-- TEXTE -->
					<div class="form-group">
						<!--div class="col-lg-12 col-md-12 col-sm-12"-->
							<label for="txtTexte" class="col-lg-2 col-md-2 col-sm-2 control-label">Texte :</label>
							<div class="col-lg-10 col-md-10 col-sm-10">
								<textarea id="txtTexte" class="form-control" name="texte" rows="5" cols="100" ></textarea>
							</div>
					</div>				
					<!-- MAISONS -->
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<label>Maison(s) :</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<?php listMaisons(); ?>
						</div>
					</div>
				
					<!-- ICONES -->
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<label>Ic&ocirc;ne(s) :</label>
						</div>
						<?php listIcones(); ?>						
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
					</div>
				
					<!-- TRAITS -->
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<label for="filtreTraits">Trait(s) :</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-5 col-md-5 col-sm-5">
							<input id="filtreTraits" type="text" placeholder="Rechercher un trait existant"/>
							<fieldset id="liste">
								<ul id="listeTraits" class="no-bullet">
									<?php listTraits(); ?>
								</ul>
							</fieldset>
							<input type="submit" value="Rechercher" name="envoyer" class="large success radius button expand"/>
						</div>
					</div>
					
				</form>
			</div>
		</div>
		<script type="text/javascript" src="../../webroot/js/formAjoutCarte.js"></script>
	</body>
</html>