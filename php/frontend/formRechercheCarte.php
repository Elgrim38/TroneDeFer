<?php
session_start();
$titre = "Moteur de recherche";
require_once('../../Layouts/menu.php');
require_once('../../Lib/fonction.php');
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div id="formAjoutCarte">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h1 class="text-center">Rechercher une carte</h1><br/>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<form name="recherche"id="form_carte" class="form-horizontal" action="php/frontend/traitementRechercheCarte.php" method="post">
					<!-- NOM -->
					<div class="form-group">
						<label for="txtNom" class="col-lg-2 col-md-2 col-sm-2 control-label">Nom :</label>
						<div class="col-lg-10 col-md-10 col-sm-10">
							<input id="txtNom" class="form-control" type="text" name="nom"/>
						</div>
					</div>

					<!-- FORCE ET COUT -->
					<div class="form-group">
						<label for="spnCout" class="col-lg-2 col-md-2 col-sm-2 control-label">Co&ucirc;t :</label>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<select class="form-control" name="operateurCout" >
								<option value="-" selected>-</option>
								<option value=">">superieur à</option>
								<option value="<">inferieur à</option>
								<option value="=">égal à</option>
							</select>
						</div>		
						<div class="col-lg-1 col-md-1 col-sm-1">
							<input id="spnCout" type="number" name="cout" class="form-control" value="0" min="0" max="15"/>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2"></div>

						<label for="spnCout" class="col-lg-2 col-md-2 col-sm-2 control-label">Force :</label>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<select class="form-control" name="operateurForce" >
								<option value="-" selected>-</option>
								<option value=">">supérieure à</option>
								<option value="<">inférieure à</option>
								<option value="=">égale à</option>
							</select>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1">
							<input id="spnCout" type="number" name="force" class="form-control" value="0" min="0" max="15"/>
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

					<!-- MOTS CLEFS -->
					<div class="form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<label >Mot Clés :</label>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="deadly"><span class="pl1 box">Deadly</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="deathbound"><span class="pl1 box">Deathbound</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="immune"><span class="pl1 box">Immune</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="limited"><span class="pl1 box">Limited</span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="noAttachements"><span class="pl1 box">No attachements</span>	
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">			
							<input type="checkbox" name="motClefs[]" value="renown"><span class="pl1 box">Renown</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="stealth"><span class="pl1 box">Stealth</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="setup"><span class="pl1 box">Setup</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="ambush"><span class="pl1 box">Ambush</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="infamy"><span class="pl1 box">Infamy</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="intimidate"><span class="pl1 box">Intimidate</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="stalwart"><span class="pl1 box">Stalwart</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="vigilant"><span class="pl1 box">Vigilant</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="vengeful"><span class="pl1 box">Vengeful</span>
						</div>		
						<div class="col-lg-2 col-md-2 col-sm-2">
							<input type="checkbox" name="motClefs[]" value="prized"><span class="pl1 box">Prized</label></span>	
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
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<input id="filtreTraits" type="text" class="form-control" placeholder="Rechercher un trait existant"/>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div id="liste" class="form-group">
									<ul id="listeTraits" class="list-unstyled">
										<?php listTraits();?>

									</ul>
								</div>
							</div>
						</div>
						<input type="submit" value="Rechercher !" name="Rechercher" class="btn btn-success btn-lg"/>
					</div>					
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../webroot/js/formAjoutCarte.js"></script>

</body>
</html>

