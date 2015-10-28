			<?php		
				$titrePage = "Créer une carte";	
				$valider=$_POST['validation'];
				require_once"../../Lib/connectDB.php";
				$db= connectDB();		
				include_once '../../Layouts/admin/menuAdmin.php';
				include_once 'gestionArticles/add_article.php';
				include_once 'gestionArticles/edit_article.php';
				include_once 'gestionCategories/list_categorie.php';
			?>
			<div id="page-wrapper">
				<div class="col-lg-12">
					<form action="#" method="post" enctype="multipart/form-data">
						<div class="col-lg-8">
							<label class="control-label"for="nom">Titre de l'article</label><br>
							<input name="titre" class="form-control" id="nom" type="text"><br>
							<label class="control-label"for="extrait">Extrait de l'article</label><br>
							<textarea name="extrait"class="form-control"  id="extrait" cols="30" rows="10"></textarea><br>
							<label class="control-label"for="article">Article</label><br>
							<textarea name="article" class="form-control" id="article" cols="30" rows="10"></textarea><br>
							
							
							<input type="submit" class="btn btn-success btn-lg" name="validation" value="<?php echo $valider; ?>">
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label"for="nom">Catégorie</label><br>
								<select name="categorie" class="form-control" id="categorie">
								<?php 
								foreach ($dataArticles as $key => $value) {
								 	echo'<option value="'.$value['CategorieID'].'">'.$value['Nom'].'</option>';
								 } ?>

								</select><br>
								<label class="control-label"for="images">Images</label><br>
					            <input type="file" class="form-control" name="images">
					        </div>
					    </div>
					
						
					</form>				
				</div>
			</div>
			
	</body>
	<script src="../../webroot/js/bootstrap.min.js"></script>
	<!-- Page Specific Plugins -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	<script src="../../webroot/plugin/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: "#article",
			menubar : false,
			plugins: [
				" autolink link image searchreplace wordcount media table code media textcolor",
			],
			toolbar: "undo redo | alignleft aligncenter alignright alignjustify outdent indent blockquote | formatselect fontsizeselect bold italic underline code | forecolor backcolor | link image media table"
		});
	</script>
</html>