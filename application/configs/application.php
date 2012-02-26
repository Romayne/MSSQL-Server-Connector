<?php
	if (!isset($path))
		$path = "";
	
	include($path ."application/models/Default/Connection.class.php");
	include($path ."application/models/Default/Data.class.php");
	
	$databaseName = (isset($_GET['database'])) ? $_GET['database'] : "master";
	
	$conn = new Connection();
	$data = new Data($conn->getDatabaseConnection("localhost\SQLEXPRESS", "", "", $databaseName), "development");
	
	//$conn = new Connection("SQL Server Authentication");
	//$data = new Data($conn->getDatabaseConnection("SERVER", "USER", "PASSWORD", "DATABASENAME"), "development");