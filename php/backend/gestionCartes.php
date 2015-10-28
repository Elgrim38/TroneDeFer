			<?php
				$titrePage = "Gestion des cartes";
				include_once '../../Layouts/admin/menuAdmin.php';
			?>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.js"></script>
			<script type="text/javascript" src="../../webroot/js/tablesorter/jquery.tablesorter.pager.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#listeCartes")
						.tablesorter( {
							widthFixed: true,
							headers: {
								0: { sorter: false },
								6: { sorter: false },
								7: { sorter: false },
								8: { sorter: false }
							}
						} )
						.tablesorterPager( {
							container: $("#pager")
						} );
				});
			</script>
			<div id="page-wrapper">
				<div id="formGestion">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center">Liste des cartes</h1>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<button onclick="document.location.href='gestionCartes/init_carte.php?id=0'" class="btn btn-success pull-right">
							<span class="fa fa-plus-square"></span>
							&nbsp;&nbsp;Nouvelle carte
						</button>
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
							<table id="listeCartes" class="table table-condensed table-hover tablesorter">
								<thead>
									<tr>
										<th class='text-center'>Image</th>
										<th class='text-center header'>Id</th>
										<th class='text-center'>Nom</th>
										<th class='text-center'>Extension</th>
										<th class='text-center'>Type</th>
										<th class='text-justify'>Texte</th>
										<th class='text-center'>Consulter</th>
										<th class='text-center'>Editer</th>
									</tr>
								</thead>
								<tbody>
									<?php
										require_once '../../Lib/connectDB.php';
										$db = connectDB();
										$queryCartes = "	SELECT CarteID, Nom, ExtensionNom, TypeNom, Cout, Texte, Gold, Influence, Initiative, `Force`, Prise, Image
															FROM carte_type t
															INNER JOIN carte_carte c ON t.TypeID = c.Type
															INNER JOIN carte_extension e ON c.Extension = e.ExtensionID
															ORDER BY CarteID desc;";
										$resultCartes = $db->query($queryCartes);
										$cartes = $resultCartes->fetchAll();
										foreach($cartes as $cle => $carte) {
											$image = 'http://www.agotcards.org/cards/eng/medium/'.$carte['Image'];
											$id = $carte['CarteID'];
											$nom = $carte['Nom'];
											$extension = $carte['ExtensionNom'];
											$type = $carte['TypeNom'];
											$texte = $carte['Texte'];
											$cout = $carte['Cout'];
											$force = $carte['Force'];
											$prise = $carte['Prise'];
											$or = $carte['Gold'];
											$influence = $carte['Influence'];
											$initiative = $carte['Initiative'];
											echo "
												<tr>
													<td class='text-center'><img class='imgCarte' src='$image' alt='$nom'/></td>
													<td class='text-center'>$id</td>
													<td class='text-center'>$nom</td>
													<td class='text-center'>$extension</td>
													<td class='text-center'>$type</td>
													<td class='text-justify'>$texte</td>
													<td class='text-center'><a href='../frontend/carte.php?id=$id'><span class='fa fa-eye'></a></span></td>
													<td class='text-center'><a href='gestionCartes/init_carte.php?id=$id'><span class='fa fa-edit'></a></span></td>
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
									<select class="form-control text-center pagesize">
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