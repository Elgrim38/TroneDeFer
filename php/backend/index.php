<?php 
	$titrePage = "Accueil du backend";
	require_once('../../Layouts/admin/menuAdmin.php'); 
	require_once'../../Lib/connectDB.php';
	$db = connectDB();
	if(empty($_SESSION['Auth']['MembreID'])) {
		header("Location: http://www.letronedeferjce.com/");
	}
?>
<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>Tableau de bord <small>Aper&ccedil;u des statistiques</small></h1>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-file-text fa-5x"></i>
						</div>
						<div class="col-xs-6 text-right">
							<?php 
							$sqlArticle = "SELECT ArticleID from article_article";
							$reqArticle = $db->query($sqlArticle);
							$countArticle = $reqArticle->rowCount();
							?>
							<p class="announcement-heading">     
								<? echo $countArticle;?>           
							</p>
							<p class="announcement-text">articles</p>
						</div>
					</div>
				</div>
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<a href="http://letronedeferjce.com/php/frontend/articles.php">
							<div class="col-xs-9">Voir la liste des articles</div>
							<div class="col-xs-3 text-right">
								<i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-5">
							<i class="fa fa-picture-o fa-5x"></i>
						</div>
						<div class="col-xs-7 text-right">
							<?php 
							$sqlCarte = "SELECT CarteID from carte_carte";
							$reqCarte = $db->query($sqlCarte);
							$countCarte = $reqCarte->rowCount();
							?>
							<p class="announcement-heading"><? echo $countCarte?></p>
							<p class="announcement-text">cartes</p>
						</div>
					</div>
				</div>
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<a href="./gestionCartes.php">
							<div class="col-xs-9">Voir la liste des cartes</div>
							<div class="col-xs-3 text-right">
								<i class="fa fa-arrow-circle-right"></i>
							</div>
						</a> 
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-inbox fa-5x"></i>
						</div>
						<div class="col-xs-6 text-right">
							<p class="announcement-heading">0</p>
							<p class="announcement-text">decks</p>
						</div>
					</div>
				</div>
				<div class="panel-footer announcement-bottom">
					<div class="row">
						<a href="#">
							<div class="col-xs-9">Voir la liste des decks</div>
							<div class="col-xs-3 text-right">
								<i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-6 text-right">
							<?php 
							$sqlMembre = "SELECT MembreID from membre_membre";
							$reqMembre = $db->query($sqlMembre);
							$countMembre = $reqMembre->rowCount();
							?>
							<p class="announcement-heading"><?php echo $countMembre ?></p>
							<p class="announcement-text">membres</p>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer announcement-bottom">
						<div class="row">
							<a href="#">
								<div class="col-xs-9">Voir la liste des membres</div>
								<div class="col-xs-3 text-right">
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</a>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div><!-- /.row -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-clock-o"></i> Activité récente</h3>
		</div>
		<div class="panel-body">
			<div class="list-group">
				<?php 
				$sqlLog = "SELECT log_log.LogID, Membre, Pseudo, Creation, Action 
				FROM log_log RIGHT OUTER JOIN membre_membre ON log_log.Membre = membre_membre.MembreID
				WHERE Membre != 0
				ORDER BY LogID desc
				LIMIT 5";
				$reqLog = $db->query($sqlLog);
				$arrayLog = $reqLog->fetchAll();
				foreach($arrayLog as $cle => $log) { 
					$date = date('d/m/Y', strtotime($log['Creation']));       
					echo "
					<div class='list-group-item'>
					<span class='badge'>$date</span>".$log['Action']."
					</div>
					";                    
				}
				?>
			</div>
		</div>
	</div>
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../../webroot/js/bootstrap.min.js"></script>
<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

</body>
</html>
