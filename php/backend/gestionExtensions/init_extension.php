<?php
	session_start();
	$_SESSION['extension']['edit'] = true;
	
	$id = $_GET['id'];
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	$queryExtension = "SELECT ExtensionNom, Cycle FROM carte_extension WHERE ExtensionID = :id;";
	$sqlExtension = $db->prepare($queryExtension);
	$sqlExtension->bindParam(':id', $id);
	$sqlExtension->execute();
	$extension = $sqlExtension->fetchAll();
	
	$_SESSION['extension']['id'] = $id;
	$_SESSION['extension']['nom'] = $extension[0]['ExtensionNom'];
	$_SESSION['extension']['cycle'] = $extension[0]['Cycle'];
	
	$db = null;
	header("Location: ../gestionExtensions.php");
	exit;
?>