<?php
    session_start();
    $titre = "Articles";
    include("../../Lib/connectDB.php");
    include("../../Lib/list_article.php");
    include("../../Layouts/menu.php");
    $db = connectDB();   
 ?>
    <div class='row'>
    	<div class='col-lg-12 col-sm-12 col-md-12'>
    		<div class='col-lg-12 col-sm-12 col-md-12'>
    			<h1 class='text-center'>Les nouvelles de Westeros</h1>
    		</div>
    <?php
        foreach ($dataArticles as $k => $v){
            $idArticle = $v['ArticleID'];
            $titreArticle=$v['NomArticle'];
            $extraitArticle=$v['Extrait'];
            $dateArticle= date('d/m/Y',strtotime($v['Creation']));
            $heureArticle = date('H:m',strtotime($v['Creation']));
            $auteurArticle = $v['Pseudo'];
            $categorie = $v['CategorieArticle'];
            $imageArticle = $v['ImageArticle'];
            $imagesExplode = explode('.',$imageArticle);
            $images =$imagesExplode[0].'_100x100.'.$imagesExplode[1];
             
             echo"
             	<div class='col-lg-12 col-sm-12 col-md-12'>
	             	<article class='mb1'>                    
	                    <div class='resume'>
	                        <div class='head'><h3>$titreArticle</h3></div>
	                        <img class='thumbs' src='http://www.letronedeferjce.com/webroot/media/images/articles/$images' alt=''/>
	                        <p class='first'>$extraitArticle</p><br/> 
	                        <p class='second'> l'article a été écrit par <span class='gras'> $auteurArticle</span></p>
	                        <p class='second'>Le <span class='gras'>$dateArticle</span> à <span class='gras'>$heureArticle</span><br>
	                        <p class='second'><a class='blanc' href='http://".ROOT."/php/frontend/view_article.php?view=$idArticle'><button type='button' class='btn btn-info'>Lire la suite</button></a></p>
	                      <div class='clear'></div>
	                    </div>
	            	</article>
	            </div>                  
            ";
        }
    ?>
    	</div> 
    </div>  
  </body>
</html>
