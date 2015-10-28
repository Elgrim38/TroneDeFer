			<?php
				$titrePage = "Gestion des extensions";
				include_once '../../Layouts/admin/menuAdmin.php';
			?>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.js"></script>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.pager.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#listeExtensions")
						.tablesorter( {
							widthFixed: true,
							headers: {
								3: { sorter: false },
								4: { sorter: false }
							}
						} )
						.tablesorterPager( {
							container: $("#pager")
						} );
				});
				
				function cacherAfficherForm() {
					var form = $("#formAjoutCarte");
					if(form.is(':visible')) {
						form.hide();
					} else {
						form.show();
					}
				}
			</script>
			<div id="page-wrapper">
				<div id="formGestion">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center">Liste des extensions</h1>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 boutonNew">
						<button onclick="cacherAfficherForm();" class="btn btn-success pull-right">
							<span class="fa fa-plus-square"></span>
							&nbsp;&nbsp;Nouvelle extension
						</button>
					</div>
					
					<!-- FORMULAIRE AJOUT -->
					<div id="formAjoutCarte"
						<?php
							if(!(isset($_SESSION['extension']) and (isset($_SESSION['extension']['erreurs']) or isset($_SESSION['extension']['success']) or isset($_SESSION['extension']['edit'])))) {
								echo " hidden";
							}
						?>
					>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<fieldset class="fieldsetNewTraits">
								<?php
									//Affichage des éventuels messages
									if(isset($_SESSION['extension']) and isset($_SESSION['extension']['erreurs']) and ""!=$_SESSION['extension']['erreurs']) {
										echo '	<div class="alert alert-danger alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
													$_SESSION['extension']['erreurs'].
												'</div>';
										unset($_SESSION['extension']['erreurs']);
									}
									if(isset($_SESSION['extension']) and isset($_SESSION['extension']['success']) and ""!=$_SESSION['extension']['success']) {
										echo '	<div class="alert alert-success alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
													$_SESSION['extension']['success'].
												'</div>';
										unset($_SESSION['extension']['success']);
									}
								?>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<form id="form_extension" class="form-horizontal" method="post"
										<?php
											if(isset($_SESSION['extension']['edit'])) {
												echo 'action="gestionExtensions/edit_extension.php"';
											} else {
												echo 'action="gestionExtensions/add_extension.php"';
											}
										?>
									>
										<div class="form-group">
											<!-- ID -->
											<input name="id" type="hidden"
												<?php if(isset($_SESSION['extension']['id'])) echo ' value="'.$_SESSION['extension']['id'].'"'; ?>
											/>
											
											<!-- NOM -->
											<label for="txtNom" class="col-lg-1 col-md-1 col-sm-1 control-label">Nom :</label>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<input id="txtNom" class="form-control" type="text" name="nom"
													<?php if(isset($_SESSION['extension']['nom'])) echo ' value="'.$_SESSION['extension']['nom'].'"'; ?>
												/>
											</div>
											
											<!-- CYCLE -->
											<label for="lstCycles" class="col-lg-1 col-md-1 col-sm-1 control-label">Cycle:</label>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<div class="input-group">
													<select id="lstCycles" class="form-control" name="cycle" required>
														<?php
															require_once '../../Lib/connectDB.php';	
															$db = connectDB();
															$queryCycles = "SELECT CycleID, CycleNom 
																			FROM carte_cycle 
																			ORDER BY 2;";
															$resultCycles = $db->query($queryCycles);
															$cycles = $resultCycles->fetchAll();
															foreach($cycles as $cle=>$val) {
																$value = $val['CycleID'];
																$option = $val['CycleNom'];
																$texte = "<option value='$value'";
																if(isset($_SESSION['extension']['cycle']) and $value==$_SESSION['extension']['cycle']) {
																	$texte .= " selected";
																}
																$texte .= ">$option</option>";
																echo $texte;
															}
															$db = null;
														?>
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-info" onclick="document.location.href='gestionCycles.php';">+</button>
													</span>
												</div>
											</div>
										
											<!-- BOUTON -->
											<input type="submit" class="btn btn-success col-lg-2 col-md-2 col-sm-2"
												<?php
													if(isset($_SESSION['extension']['edit'])) {
														echo "value='Sauvegarder'";
													} else {
														echo 'value="Créer"';
													}
													unset($_SESSION['extension']);
												?>
											/>
										</div>
									</form>
								</div>
							</fieldset>
						</div>
					</div>
					
					<!-- TABLEAU LISTE -->
					<div class="col-lg-12 col-md-12 col-sm-12">
						<label class="label label-default">
							Vous pouvez trier la liste en cliquant sur le nom d'une colonne.
						</label>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<label class="label label-default">
							Vous pouvez trier sur plusieurs colonnes simultanément en appuyant la touche <kbd>Maj</kbd> et en cliquant sur le nom d'une autre colonne.
						</label>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="table-responsive">
							<table id="listeExtensions" class="table table-condensed table-hover tablesorter">
								<thead>
									<tr>
										<th class='text-center header'>Id</th>
										<th>Nom</th>
										<th>Cycle</th>
										<th class='text-center'>Consulter</th>
										<th class='text-center'>Editer</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require_once '../../Lib/connectDB.php';
										$db = connectDB();
										$queryExtensions = "	SELECT ExtensionID, ExtensionNom, CycleNom 
																FROM carte_extension ca
																INNER JOIN carte_cycle cy ON ca.Cycle = cy.CycleID
																ORDER BY ExtensionID desc;";
										$resultExtensions = $db->query($queryExtensions);
										$extensions = $resultExtensions->fetchAll();
										foreach($extensions as $cle => $extension) {
											$id = $extension['ExtensionID'];
											$nom = $extension['ExtensionNom'];
											$cycle = $extension['CycleNom'];
											echo "
												<tr>
													<td class='text-center'>$id</td>
													<td>$nom</td>
													<td>$cycle</td>
													<td class='text-center'><a href='../frontend/extension.php?id=$id'><span class='fa fa-eye'></a></span></td>
													<td class='text-center'><a href='gestionExtensions/init_extension.php?id=$id'><span class='fa fa-edit'></a></span></td>
												</tr>
											";
										}
									?>
								</tbody>
							</table>
							<div id="pager" class="pager">
								<div class="col-lg-3 col-md-3 col-sm-2"></div>
								<div class="col-lg-3 col-md-4 col-sm-5">
									<div class="input-group">
										<span class="input-group-addon first"><span class="fa fa-step-backward"></span></span>
										<span class="input-group-addon prev"><span class="fa fa-backward"></span></span>
										<input type="text" class="form-control text-center pagedisplay" disabled/>
										<span class="input-group-addon next"><span class="fa fa-forward"></span></span>
										<span class="input-group-addon last"><span class="fa fa-step-forward"></span></span>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2">
									<select class="form-control pagesize">
										<option value="10">10 par page</option>
										<option value="20">20 par page</option>
										<option value="30">30 par page</option>
										<option value="40">40 par page</option>
										<option value="50">50 par page</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- JavaScript -->
		<script src="../../webroot/js/bootstrap.min.js"></script>
		<!-- Page Specific Plugins -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	</body>
</html>