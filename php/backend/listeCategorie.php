<?php 
	include_once '../../Layouts/admin/menuAdmin.php';
	require_once"../../Lib/connectDB.php";
	$titre = "liste des catégories";
	include_once"gestionCategories/add_categorie.php";
	include_once"gestionCategories/list_categorie.php";
	include_once"gestionCategories/delete_categorie.php";
 ?>
<div id="page-wrapper">
	<div>
		<h1 class="text-center">Liste des catégories</h1>
	</div>
	<?php 									
		if(isset($_SESSION['categorie']) and isset($_SESSION['categorie']['success']) and ""!=$_SESSION['categorie']['success']) {
			echo '	<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
				$_SESSION['categorie']['success'].
			'</div>';
			unset($_SESSION['categorie']['success']);
		} 
	?>
	<form id="form_categorie" class="form-horizontal" action="" method="post">
		<fieldset class="fieldsetNewTraits">
			<div class="form-group">
				<label for="txtNom" class="col-lg-1 col-md-1 col-sm-1 control-label">Nom :</label>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<input  class="form-control" id="txtNom" value ="<?php echo $nomCategorie;?>"name="nomCategorie" type="text">
				</div>
				<input class="btn btn-success"type="submit" name='Validation'value="<?php echo $valider; ?>">
			</div>
		</fieldset>
	</form>
	<div class="">
		<div class="label label-default">
			Vous pouvez trier la liste en cliquant sur le nom d'une colonne.
		</div>
	</div>
	<div class="">
		<div class="label label-default">
			Vous pouvez trier sur plusieurs colonnes simultanément en appuyant la touche <kbd>Maj</kbd> et en cliquant sur le nom d'une autre colonne.
		</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="table-responsive">
			<table class="table table-condensed table-hover tablesorter">
				<thead>
					<th  class='text-center'>Id</th>
					<th  class='text-center'>Titre</th>
					<th  class='text-center'>Editer</th>
					<th  class='text-center'>Supprimer</th>

				</thead>
				<tbody>					
					<?php  
						foreach ($dataArticles as $k => $v) {
							echo'<tr>
							<td class="text-center">'.$v ["CategorieID"].'</td>
							<td class="text-center">'.$v ["Nom"].'</td>
							<td class="text-center"><a href="?edit='.$v["CategorieID"].'"><span class="fa fa-edit"></a></span></td>
							<td class="text-center"><a href="?delete='.$v["CategorieID"].'" onclick="return confirm("Sur de sur ?");"><span class="fa fa-trash-o"></a></span></td>
							</tr>
							';
						}
					?>					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="../../webroot/js/bootstrap.min.js"></script>
<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
</table>