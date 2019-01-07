<?php

	require_once 'db.php';
	 
	$db = mysqli_connect($host, $user, $password, $database) 
		or die("ERROR" . mysqli_error($db));
	
?>