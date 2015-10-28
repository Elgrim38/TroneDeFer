			<?php
				$titrePage = "Gestion des cycles";
				include_once '../../Layouts/admin/menuAdmin.php';
			?>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.js"></script>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.pager.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#listeCycles")
						.tablesorter( {
							widthFixed: true,
							headers: {
								2: { sorter: false }
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
						<h1 class="text-center">Liste des cycles</h1>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 boutonNew">
						<button onclick="cacherAfficherForm();" class="btn btn-success pull-right">
							<span class="fa fa-plus-square"></span>
							&nbsp;&nbsp;Nouveau cycle
						</button>
					</div>
					
					<!-- FORMULAIRE AJOUT -->
					<div id="formAjoutCarte"
						<?php
							if(!(isset($_SESSION['cycle']) and (isset($_SESSION['cycle']['erreurs']) or isset($_SESSION['cycle']['success']) or isset($_SESSION['cycle']['edit'])))) {
								echo " hidden";
							}
						?>
					>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<fieldset class="fieldsetNewTraits">
								<?php
									//Affichage des éventuels messages
									if(isset($_SESSION['cycle']) and isset($_SESSION['cycle']['erreurs']) and ""!=$_SESSION['cycle']['erreurs']) {
										echo '	<div class="alert alert-danger alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
													$_SESSION['cycle']['erreurs'].
												'</div>';
										unset($_SESSION['cycle']['erreurs']);
									}
									if(isset($_SESSION['cycle']) and isset($_SESSION['cycle']['success']) and ""!=$_SESSION['cycle']['success']) {
										echo '	<div class="alert alert-success alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
													$_SESSION['cycle']['success'].
												'</div>';
										unset($_SESSION['cycle']['success']);
									}
								?>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<form id="form_cycle" class="form-horizontal" method="post"
										<?php
											if(isset($_SESSION['cycle']['edit'])) {
												echo 'action="gestionCycles/edit_cycle.php"';
											} else {
												echo 'action="gestionCycles/add_cycle.php"';
											}
										?>
									>
										<div class="form-group">
											<!-- ID -->
											<input name="id" type="hidden"
												<?php if(isset($_SESSION['cycle']['id'])) echo ' value="'.$_SESSION['cycle']['id'].'"'; ?>
											/>
											
											<!-- NOM -->
											<label for="txtNom" class="col-lg-1 col-md-1 col-sm-1 control-label">Nom :</label>
											<div class="col-lg-8 col-md-8 col-sm-8">
												<input id="txtNom" class="form-control" type="text" name="nom"
													<?php if(isset($_SESSION['cycle']['nom'])) echo ' value="'.$_SESSION['cycle']['nom'].'"'; ?>
												/>
											</div>
										
											<!-- BOUTON -->
											<input type="submit" class="btn btn-success col-lg-3 col-md-3 col-sm-3"
												<?php
													if(isset($_SESSION['cycle']['edit'])) {
														echo "value='Sauvegarder'";
													} else {
														echo 'value="Créer"';
													}
													unset($_SESSION['cycle']);
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
							<table id="listeCycles" class="table table-condensed table-hover tablesorter">
								<thead>
									<tr>
										<th class='text-center header'>Id</th>
										<th>Nom</th>
										<th class='text-center'>Editer</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require_once '../../Lib/connectDB.php';
										$db = connectDB();
										$queryCycles = "	SELECT CycleID, CycleNom
															FROM carte_cycle
															ORDER BY CycleID desc;";
										$resultCycles = $db->query($queryCycles);
										$cycles = $resultCycles->fetchAll();
										foreach($cycles as $cle => $cycle) {
											$id = $cycle['CycleID'];
											$nom = $cycle['CycleNom'];
											echo "
												<tr>
													<td class='text-center'>$id</td>
													<td>$nom</td>
													<td class='text-center'><a href='gestionCycles/init_cycle.php?id=$id'><i class='fa fa-edit'></i></a></td>
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