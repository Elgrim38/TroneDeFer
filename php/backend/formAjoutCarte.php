			<?php
				session_start();
				if(isset($_SESSION['ajoutCarte']['edit'])) {
					$titrePage = "Modifier la carte n&deg;".$_SESSION['ajoutCarte']['edit'];
				} else {
					$titrePage = "Créer une carte";
				}
				include_once '../../Layouts/admin/menuAdmin.php';
				include_once 'fonctions/fonctions_carte.php';
			?>
			
			<div id="page-wrapper">
				<div id="formAjoutCarte">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center"><?php echo $titrePage ?></h1><br/>
						<?php
							//Affichage des éventuels messages
							if(isset($_SESSION['ajoutCarte']) and isset($_SESSION['ajoutCarte']['erreurs']) and ""!=$_SESSION['ajoutCarte']['erreurs']) {
								echo '	<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
											$_SESSION['ajoutCarte']['erreurs'].
										'</div>';
								unset($_SESSION['ajoutCarte']['erreurs']);
							}
							if(isset($_SESSION['ajoutCarte']) and isset($_SESSION['ajoutCarte']['success']) and ""!=$_SESSION['ajoutCarte']['success']) {
								echo '	<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
											$_SESSION['ajoutCarte']['success'].
										'</div>';
								unset($_SESSION['ajoutCarte']['success']);
							}
						?>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form id="form_carte" class="form-horizontal" method="post"
							<?php
								if(isset($_SESSION['ajoutCarte']['edit'])) {
									echo ' action="gestionCartes/edit_carte.php"';
								} else {
									echo ' action="gestionCartes/add_carte.php"';
								}
							?>
						>
							<!-- NOM -->
							<div class="form-group">
								<label for="txtNom" class="col-lg-2 col-md-2 col-sm-2 control-label">Nom :</label>
								<div class="col-lg-10 col-md-10 col-sm-10">
									<input id="txtNom" class="form-control" type="text" name="nom"
										<?php if(isset($_SESSION['ajoutCarte']['nom'])) echo ' value="'.$_SESSION['ajoutCarte']['nom'].'"'; ?>
									/>
								</div>
							</div>
							
							<!-- EXTENSION & TYPE -->
							<div class="form-group">
								<label for="lstExt" class="col-lg-2 col-md-2 col-sm-2 control-label">Extension :</label>
								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="input-group">
										<select id="lstExt" class="form-control" name="extension" required>
											<?php listExtensions(); ?>
										</select>
										<span class="input-group-btn">
											<button type="button" class="btn btn-info" onclick="document.location.href='gestionExtensions.php';">+</button>
										</span>
									</div>
								</div>
								<label for="lstType" class="col-lg-1 col-md-1 col-sm-1 control-label">Type :</label>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<select id="lstType" name="type" class="form-control" onchange="change_type();" required>
										<?php listTypes(); ?>
									</select>
								</div>
							</div>
						
							<!-- TEXTE -->
							<div class="form-group">
								<!--div class="col-lg-12 col-md-12 col-sm-12"-->
									<label for="txtTexte" class="col-lg-2 col-md-2 col-sm-2 control-label">Texte :</label>
									<div class="col-lg-10 col-md-10 col-sm-10">
										<textarea id="txtTexte" class="form-control" name="texte" rows="5" cols="100"><?php if(isset($_SESSION['ajoutCarte']['texte'])) echo $_SESSION['ajoutCarte']['texte']; ?></textarea>
									</div>
							</div>
						
							<!-- VERTU -->
							<div class="form-group">
								<label class="col-lg-2 col-md-2 col-sm-2 control-label">Vertu :</label>
								<div class="col-lg-10 col-md-12 col-sm-12">
									<?php listVertus(); ?>
								</div>
							</div>
							
							<!-- COUT, FORCE & PRISE -->
							<div class="form-group">
								<label for="spnCout" class="col-lg-2 col-md-2 col-sm-2 control-label">Co&ucirc;t :</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnCout" type="number" name="cout" class="form-control" min="0" max="15"
										<?php
											if(isset($_SESSION['ajoutCarte']['cout']) and $_SESSION['ajoutCarte']['cout']!="")
												echo ' value="'.$_SESSION['ajoutCarte']['cout'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/cout.png"/>
								</div>
								<label for="spnForce" class="col-lg-2 col-md-2 col-sm-2 control-label">Force:</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnForce" type="number" name="force" class="form-control" min="0" max="15"
										<?php
											if(isset($_SESSION['ajoutCarte']['force']) and $_SESSION['ajoutCarte']['force']!="")
												echo ' value="'.$_SESSION['ajoutCarte']['force'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/force.png"/>
								</div>
								<label for="spnPrise" class="col-lg-2 col-md-2 col-sm-2 control-label">Prise :</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnPrise" type="number" name="prise" class="form-control" min="0" max="15"
										<?php
											if(isset($_SESSION['ajoutCarte']['prise']) and $_SESSION['ajoutCarte']['prise']!="")
												echo ' value="'.$_SESSION['ajoutCarte']['prise'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/prise.png"/>
								</div>
							</div>
						
							<!-- OR, INFLUENCE & INITIATIVE -->
							<div class="form-group">
								<label for="spinOr" class="col-lg-2 col-md-2 col-sm-2 control-label">Or :</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnOr" type="number" class="form-control" name="or" min="-5" max="5"
										<?php
											if(isset($_SESSION['ajoutCarte']['or']))
												echo ' value="'.$_SESSION['ajoutCarte']['or'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/or.png"/>
								</div>
								<label for="spinInfl" class="col-lg-2 col-md-2 col-sm-2 control-label">Influence :</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnInfluence" type="number" class="form-control" name="influence" min="0" max="5"
										<?php
											if(isset($_SESSION['ajoutCarte']['influence']))
												echo ' value="'.$_SESSION['ajoutCarte']['influence'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/influence.png"/>
								</div>
								<label for="spinInit" class="col-lg-2 col-md-2 col-sm-2 control-label">Initiative :</label>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<input id="spnInitiative" type="number" class="form-control" name="initiative" min="-5" max="15"
										<?php
											if(isset($_SESSION['ajoutCarte']['initiative']))
												echo ' value="'.$_SESSION['ajoutCarte']['initiative'].'"';
										?>
									/>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1">
									<img class="propertyImage" src="../../webroot/media/images/icones/initiative.png"/>
								</div>
							</div>
						
							<!-- IMAGE -->
							<div class="form-group">
								<label for="txtImg" class="col-lg-2 col-md-2 col-sm-2 control-label">URL de l'image :</label>
								<div class="col-lg-10 col-md-10 col-sm-10">
									<div class="input-group">
										<div id="debut" class="input-group-addon form-control-static bg-info">http://www.agotcards.org/cards/eng/medium/</div>
										<div id="milieu">
											<input id="txtImg" class="form-control" type="text" name="image" placeholder="ex : raven43"
												<?php if(isset($_SESSION['ajoutCarte']['image'])) echo ' value="'.$_SESSION['ajoutCarte']['image'].'" '; ?>
											required/>
										</div>
										<div id="fin" class="input-group-addon form-control-static bg-info">.jpg</div>
									</div>
								</div>
							</div>
						
							<!-- MAISONS -->
							<div class="form-group">
								<label class="col-lg-12 col-md-12 col-sm-12 control-label">Maison(s) :</label>
								<div id="listeMaisons" class="col-lg-12 col-md-12 col-sm-12">
									<?php listMaisons(); ?>
								</div>
							</div>
						
							<!-- ICONES -->
							<div class="form-group">
								<fieldset id="listeIcones">
									<label class="col-lg-12 col-md-12 col-sm-12 control-label">Ic&ocirc;ne(s) :</label>
									<?php listIcones(); ?>
								</fieldset>
							</div>
						
							<!-- TRAITS -->
							<div class="form-group">
								<label for="filtreTraits" class="col-lg-12 col-md-12 col-sm-12 control-label">Trait(s) :</label>
							</div>
							<div class="form-group">
								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<input id="filtreTraits" type="text" class="form-control" placeholder="Rechercher un trait existant"/>
										</div>
										<div id="liste" class="form-group">
											<ul id="listeTraits" class="list-unstyled">
												<?php listTraits(); ?>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<div class="input-group">
												<input id="txtTrait" type="text" class="form-control" placeholder="Créer un nouveau trait">
												<span class="input-group-btn">
													<button onclick="add_trait();" class="btn btn-primary" type="button">Ajouter</button>
												</span>
											</div>
											<span class="label label-warning">Merci de bien vérifier au préalable que le trait n'existe pas déjà !</span>
										</div>
										<div class="form-group">
											<fieldset class="fieldsetNewTraits">
												<legend class="fieldsetNewTraits">Traits qui seront créés et associés à la carte</legend>
												<div id="toAdd"></div>
												<em id="note">Cliquez sur un élément pour le supprimer.</em>
											</fieldset>
										</div>
										<input id="lstToAdd" type="hidden" name="lstToAdd" value=""/>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-lg col-lg-12 col-md-12 col-sm-12"
												<?php
													if(isset($_SESSION['ajoutCarte']['edit'])) {
														echo "value='Sauvegarder la carte'";
													} else {
														echo "value='Créer la carte !'";
													}
												?>
											/>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<script type="text/javascript" src="../../webroot/js/formAjoutCarte.js"></script>
			</div>
		</div>
		<!-- JavaScript -->
		<script src="../../webroot/js/bootstrap.min.js"></script>
		<!-- Page Specific Plugins -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	</body>
</html>