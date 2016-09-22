<?php

	// This file is intented to acquire some information from an assistant of the CIMPS

	// So the first thing is to get the user id (which is previously scanned by the Android application via QR Code) and then create a SQL query and retrieve the information

	$id = $_GET['id'];

	// Get the database connection token
	require_once('dbConnect.php');

	$sql = "SELECT * FROM users WHERE id=$id";

	$r = mysqli_query($con,$sql);

	$result = array();
	$row = mysqli_fetch_array($r);

	// Convert accents into plain text
	setlocale(LC_ALL, 'es_MX');
	$clear_name = iconv('UTF-8','ASCII//TRANSLIT//IGNORE',utf8_encode($row['name']));
	$clear_afiliation_name = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',utf8_encode($row['afiliation_name']));

	array_push($result,array(
			"name"=>$clear_name,
			"afiliation"=>$clear_afiliation_name,
			"gaffete"=>$row['gaffete'],
			"accept"=>$row['accept']
		));

	echo json_encode(array('result'=>$result));

	mysqli_close($con);
