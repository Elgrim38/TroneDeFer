<?php
	session_start();
	
	//INITIALISATION DES VARIABLES
	$nom = '';
	$titre = '';
	$img = '';
	$carteType='';
	$type = "";
	$texte = '';
	$gold = '';
	$init = '';
	$influ= '';
	$prise = '';
	$force= '';
	$traits = "";
	// on récupère l'ID de la carte depuis l'URL
	$carteId = $_GET["id"];
	
	//REQUETES SQL
	include_once("../../Lib/connectDB.php");
	$db = connectDB();
	
	$sqlCarte = "SELECT * FROM carte_carte WHERE CarteID = $carteId;";	
	$reqCarte = $db->query($sqlCarte);
	$countCarte = $reqCarte->rowCount();
	
	if($countCarte < 1) {
		$titre = "Carte inexistante";
		include_once("../../Layouts/menu.php");
		echo "
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<div class='col-lg-12 col-md-12 col-sm-12'>
					<div class='alert alert-danger' role='alert'>
						Cette carte n'existe pas !
					</div>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-3'></div>
				<div class='col-lg-4 col-md-5 col-sm-6 hodor'>
					<img src='../../webroot/media/images/hodor.png' alt='Hodor !'>
				</div>
			</div>
		</div>
		";
		
	} else {
		$carte = $reqCarte->fetch();
		
		$sqlTypes="SELECT TypeNom FROM carte_type
				   WHERE TypeId='".$carte['Type']."'";
		$reqType = $db->query($sqlTypes);
		$types = $reqType->fetchColumn();	

		$sqlMaisons = "SELECT AffiliationAdresse FROM carte_affiliation af 	   
					   RIGHT OUTER JOIN carte_appartenir ap ON af.AffiliationID = ap.AffiliationID
					   WHERE CarteID = $carteId;";
		$reqMaisons = $db->query($sqlMaisons);	
		$countMaison = $reqMaisons->rowCount();

		$sqlTraits = "SELECT TraitAdresse 
					  FROM carte_trait t 
					  RIGHT OUTER JOIN carte_adouber a ON t.TraitID = a.TraitID
					  WHERE CarteID = $carteId;";
		$reqTraits = $db->query($sqlTraits);
		$countTraits = $reqTraits->rowCount();
		
		$sqlIcones = "SELECT IconeAdresse 
					  FROM carte_icone i 
					  RIGHT OUTER JOIN carte_defier d ON i.IconeID = d.IconeID 
					  WHERE CarteID = $carteId;";
		$reqIcones = $db->query($sqlIcones);
		$countIcones = $reqIcones->rowCount();
		
		$sqlVertus = "SELECT `Titre` FROM `carte_vertu` v 
					  RIGHT OUTER JOIN `carte_qualifier` q ON v.`VertuID` = q.`VertuID` 
					  WHERE `CarteID` ='$carteId';";
		$reqVertus = $db->query($sqlVertus);
		$countVertus = $reqVertus->rowCount();

		//ATTRIBUTION DES VALEURS
		$db = null;
		$nom = $carte["Nom"];
		$titre = $nom;
		$img = $carte["Image"];
		$carteType=$carte['Type'];
		$texte = $carte["Texte"];
		$gold = $carte["Gold"];
		$init = $carte["Initiative"];
		$influ= $carte["Influence"];
		$prise = $carte["Prise"];
		$force= $carte["Force"];
		$cout= $carte["Cout"];
		$type = $types;
		$traits = "";

		//AFFICHAGE
		include_once("../../Layouts/menu.php");
?>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="col-lg-12 col-md-12 col-sm-12">
				
					<h3 class="text-center"><?php echo $nom; ?></h3>
					
					<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
						<img class="img-responsive mb1" <?php echo "src='http://www.agotcards.org/cards/eng/medium/$img' alt='$nom'"; ?> />
					</div>
					<div class='col-md-5 col-lg-6 col-sm-6'>
						<p><span class='gras'>Nom : </span><?php echo $nom; ?></p>
						<p><span class='gras'>Type : </span><?php echo $type; ?></p>
						<p><span class='gras'>Texte : </span><?php echo $texte; ?></p>
					
<?php	
		if("" != $cout) {
			echo "		<p><span class='gras'>Coût :</span> $cout</p>			";
		}
		if("" != $force) {
			echo " 		<p><span class='gras'>Force :</span> $force</p>			";
		}
		if("" != $prise) {
			echo "		<p><span class='gras'>Prise :</span> $prise</p>			";
		}	
		if("" != $gold) {
			echo "		<p><span class='gras'>Revenus :</span> $gold</p>		";
		}
		if("" != $influ) {
			echo "		<p><span class='gras'>Influence :</span> $influ</p>		";
		}
		if("" != $init) {
			echo "		<p><span class='gras'>Initiative :</span> $init</p>		";
		}
		if($countIcones > 0) {
			echo $countIcones;
			echo "	<p>
						<span class='gras'>Icône(s) : </span>
						<ul class='list-inline'>
			";
			while($icone = $reqIcones->fetch(PDO::FETCH_BOTH)) {
				$ico = $icone['IconeAdresse'];
				echo "		<li>$ico</li>										";	
			}
			echo "		</ul>
					</p>
			";
		}
		if($countMaison > 0) {
			echo "		<p>
							<span class='gras'>Maison(s) : </span>
							<ul class='list-inline'>
			";
			while($maison = $reqMaisons->fetch()) {
				$nomMaison = $maison['AffiliationAdresse'];
				echo "			<li>$nomMaison</li>								";
			}
			echo "			</ul>
						</p>
			";
		}
		if($countVertus > 0) {
			echo "		<p>
							<span class='gras'>Vertu(s) : </span>
							<ul class='list-inline'>
			";
			while($vertus = $reqVertus->fetch(PDO::FETCH_BOTH)){
				$vertu = $vertus['Titre'];
				echo "			<li>$vertu</li>									";
			}
			echo "			</ul>
						</p>
			";
		}
		if($countTraits > 0) {
			echo "		<p>
							<span class='gras'>Trait(s) : </span>
							<ul class='list-inline'>
			";
			while($trait = $reqTraits->fetch(PDO::FETCH_ASSOC)) {
				$nomTrait = $trait['TraitAdresse'];
				echo "			<li>$nomTrait</li>								";					
			}
			echo "			</ul>
						</p>
			";
		}
?>	
	
					</div>
					<div class="clear">&nbsp;</div>
				</div>
		
				<!-- Commentaires (DISQUS) -->
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="disqus_thread" class="hidden-xs"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			// required : replace example with your forum shortname
			var disqus_shortname = 'letronedeferjce';
			
			// don't edit below
			(function() {
				var dsq = document.createElement('script');
				dsq.type = 'text/javascript';
				dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			} )();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>	
		<script src="../..js/recherche.js"></script>
<?php
	}
?>