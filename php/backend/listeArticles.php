<?php
	$titrePage = "Liste des articles";
	include_once '../../Layouts/admin/menuAdmin.php';	
	include_once 'gestionArticles/list_article.php';
	include_once 'gestionArticles/delete_article.php';



?>
<div id="page-wrapper">
	<div>
		<h1 class="text-center">Liste des articles</h1>
	</div>
	<?php  
		if(isset($_SESSION['articleDelete']) and isset($_SESSION['articleDelete']['success']) and $_SESSION['articleDelete']['success']!="") {
			echo '	<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
						$_SESSION['articleDelete']['success'].
					'</div>';
			unset($_SESSION['articleDelete']['success']);
		}
		if(isset($_SESSION['articleEdit']) and isset($_SESSION['articleEdit']['success']) and $_SESSION['articleEdit']['success']!="") {
			echo '	<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
						$_SESSION['articleEdit']['success'].
					'</div>';
			unset($_SESSION['articleEdit']['success']);
		}
		if(isset($_SESSION['articleAjout']) and isset($_SESSION['articleEdit']['success']) and $_SESSION['articleEdit']['success']!="") {
			echo '	<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
						$_SESSION['articleAjout']['success'].
					'</div>';
			unset($_SESSION['articleAjout']['success']);
		}
	?>
	<button onclick="document.location.href='formAjoutArticle.php'" class="btn btn-success pull-right">
		<span class="fa fa-plus-square"></span>
			&nbsp;&nbsp;Nouveau Article
	</button>
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
					<th  class='text-center'>Date de création</th>
					<th  class='text-center'>Date de motification</th>
					<th  class='text-center'>Catégorie</th>
					<th  class='text-center'>Auteur</th>
					<th  class='text-center'>Voir</th>
					<th  class='text-center'>Editer</th>
					<th  class='text-center'>Supprimer</th>
				</thead>
				<tbody>					
					<?php  
						foreach ($dataArticles as $k => $v) {
							echo'<tr>
							<td class="text-center">'.$v["ArticleID"].'</td>
							<td class="text-center">'.$v["NomArticle"].'</td>
							<td class="text-center">'.$v["Creation"].'</td>
							<td class="text-center">'.$v["Modification"].'</td>
							<td class="text-center">'.$v["CategorieArticle"].'</td>
							<td class="text-center">'.$v["Pseudo"].'</td>
							<td class="text-center"><a href="../frontend/articles.php?id='.$v["ArticleID"].'"><span class="fa fa-eye"></a></span></td>
							<td class="text-center"><a href="formAjoutArticle.php?edit='.$v["ArticleID"].'"><span class="fa fa-edit"></a></span></td>
							<td class="text-center"><a href="?delete='.$v["ArticleID"].'" onclick="return confirm("Sur de sur ?");"><span class="fa fa-trash-o"></a></span></td>
							</tr>
							';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../webroot/js/bootstrap.min.js"></script>
<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>