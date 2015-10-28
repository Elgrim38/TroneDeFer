<?php
	function connectDB() {
		//Renvoie le nom du dossier parent ce qui me permet d'avoir le chemin réel
		require dirname(__FILE__).'/../bin/params.php';
		try {
			$db = new PDO('mysql:host='.$host.'; dbname='.$base,$user,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		} catch (PDOexception $e) {
			echo 'La base de données n&#39;est pas disponible, merci de réessayer plus tard.';	
		}
		error_reporting(-1);
		ini_set('display_errors',1); 
 		
		return $db;
	}
?>