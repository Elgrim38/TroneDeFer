<?php
	session_start();
	$titre="Modification du profil";
    include("../../Layouts/menu.php");    
    $valider=$_POST['validation'];
    include("../../Lib/modifProfil.php");
?>
	<div class="container">
		<form method="post" action="">
			<div class="col-lg-6">
					<legend>Infos Perso</legend>
					<label class="control-label col-sm-4" for="nom" >Pseudo :</label>
					<div class="col-sm-8 mb1">
						<input id="nom" type="text" name="pseudo" class="form-control" value="<? echo $pseudo; ?>">
					</div>
					<label class="control-label col-sm-4" for="mail" >Mail : </label>
					<div class="col-sm-8 mb1">
						<input type="email" name="email" id="mail" class="form-control" value="<? echo $mail; ?>">
					</div>
					<label class="control-label col-sm-4" for="date">Date de naissance : </label>
					<div class="col-sm-8 mb1">
						<input id="date" type="text" name="naissance" class="form-control" value="<? echo $birthday;?>">
					</div>

					<label class="control-label col-sm-4" for="pays">Pays :</label>
					<div class="col-sm-8 mb1">
						<input id="pays" type="text" name="pays"class="form-control" value="<? echo $pays ;?>">
					</div>

					<label class="control-label col-sm-4" for="ville">Ville</label>
					<div class="col-sm-8 mb1">
						<input id="ville" type="text" name="ville" class="form-control" value="<? echo $ville;?>">
					</div>

					<label class="control-label col-sm-4" for="meta">Meta</label>
					<div class="col-sm-8 mb1">
						<input id="meta" type="text" name="meta" class="form-control" value="<? echo $meta;?>">
					</div>

					<label class="control-label col-sm-4" for="maisonFavorite">Maison favorite</label>
					<div class="col-sm-8 mb1">
						<input id="maisonFavorite" name="house" type="text" class="form-control" value="<? echo $favoriteHouse;?>">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb1">
						<legend>Réseaux sociaux</legend>
						<label class="control-label col-sm-4" for="facebook">Facebook</label>
						<div class="col-sm-8 mb1">
							<input id="facebook" name="facebook"type="text" class="form-control" value="<? echo $facebook;?>">
						</div>
						<label class="control-label col-sm-4" for="twitter">Twitter</label>
						<div class="col-sm-8 mb1">
							<input id="twitter" name="twitter" type="text" class="form-control" value="<? echo $twitter;?>">
						</div>
						<label class="control-label col-sm-4" for="skype">Skype</label>
						<div class="col-sm-8 mb1">
							<input id="skype" name="skype" type="text" class="form-control" value="<? echo $skype;?>">
						</div>
						<label class="control-label col-sm-4" for="octgn">Octgn</label>
						<div class="col-sm-8 mb1">
							<input id="octgn" name="octgn" type="text" class="form-control" value="<? echo $octgn;?>">
						</div>	
					</div>
					<div>
						<legend>Mot de passe</legend>
						<label class="control-label col-sm-4" for="mdp">Mot de passe: </label>
						<div class="col-sm-8 mb1">
							<input type="password" name="password" class="form-control"  id="mdp">
						</div>
						<label class="control-label col-sm-4" for="confirmMdp"> Confirmer votre mot de passe : </label>
						<div class="col-sm-8 mb1">
							<input type="password" class="form-control" name="passwordConfirm" id="confirmMdp">
						</div>
					</div>
					<input type="submit" name="validation" class="mt2 btn-block btn btn-info" value="Valider">	
				</div>			
		</form>
	</div>
</body>
</html>