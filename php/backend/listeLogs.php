			<?php 
				session_start();			
				$titrePage = "Activités du site";
				include_once '../../Layouts/admin/menuAdmin.php';
			?>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.js"></script>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.pager.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#histoActivites")
						.tablesorter( {
							widthFixed: true
						} )
						.tablesorterPager( {
							container: $("#pager")
							size: 30
						} );
				});
			</script>
			<div id="page-wrapper">
				<div id="formGestion">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center">Historique des activités du site</h1>
					</div>
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
							<table id="histoActivites" class="table table-condensed table-hover tablesorter">
								<thead>
									<tr>
										<th class='text-center'>ID</th>
										<th class='text-center'>Membre</th>
										<th class='text-center'>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require_once '../../Lib/connectDB.php';
										$classe = $_GET["classe"];
										if("1" == $classe) {
											$in = "1, 2, 3";
										} elseif("2" == $classe) {
											$in = "4, 5, 6";
										} elseif("3" == $classe) {
											$in = "7, 8";
										}
										$db = connectDB();
										$sqlLog = "SELECT LogID, Pseudo, Creation, Action 
												   FROM log_log RIGHT OUTER JOIN membre_membre 
												   ON log_log.Membre = membre_membre.MembreID 
												   WHERE log_log.Membre != 0 
												   AND Rubrique IN ($in)
												   ORDER BY LogID desc;";
										$reqLog = $db->query($sqlLog);
										$arrayLog = $reqLog->fetchAll();
										foreach($arrayLog as $cle => $log) { 
											$id = $log['LogID'];
											$pseudo = $log['Pseudo'];
											$date = date('d/m/Y', strtotime($log['Creation']));
											$action = $log['Action'];
											echo "
												<tr>
													<td class='text-center'>$id</td>
													<td class='text-center'>$pseudo</td>
													<td class='text-center'>$date</td>
													<td>$action</td>								
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
										<option value="30">30 par page</option>
										<option value="50">50 par page</option>
										<option value="70">70 par page</option>
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