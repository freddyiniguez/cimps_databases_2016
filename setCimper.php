<?php
	
	// This file is intented to update the field 'gaffete' of an assistant, which indicates that the CIMPS kit has been given to the assistant at the moment of the registration.

	// First, the data is retrieved, a SQL query is created and performed

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$gaffete = $_POST['gaffete'];

		// Use the database connection
		require_once('dbConnect.php');

		$sql = "UPDATE users SET gaffete = '$gaffete' WHERE id = $id;";

		if(mysqli_query($con,$sql)){
			echo 'Asistente actualizado correctamente.';
		}else{
			echo 'No pudimos actualizar al asistente. Intente de nuevo.';
		}

		mysqli_close($con);
	}
