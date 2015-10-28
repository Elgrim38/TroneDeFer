<?php
	session_start();
	$_SESSION['cycle']['edit'] = true;
	
	$id = $_GET['id'];
	require_once '../../../Lib/connectDB.php';
	$db = connectDB();
	
	$queryCycle = "SELECT CycleNom FROM carte_cycle WHERE CycleID = :id;";
	$sqlCycle = $db->prepare($queryCycle);
	$sqlCycle->bindParam(':id', $id);
	$sqlCycle->execute();
	$cycle = $sqlCycle->fetchAll();
	
	$_SESSION['cycle']['id'] = $id;
	$_SESSION['cycle']['nom'] = $cycle[0]['CycleNom'];
	
	$db = null;
	header("Location: ../gestionCycles.php");
	exit;
?>