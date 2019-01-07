<?php

	require_once 'connect.php';

	session_start();
	
	$query = "SELECT * FROM users WHERE login = '" 
		. $_POST['login'] 
		. "' AND password = '" 
		. $_POST['password']
		. "';";
			
	$result = mysqli_query($db, $query) or die("ERROR" . mysqli_error($db)); 
		
	if($result) {
			
		$_SESSION['user'] = $_POST['login'];

	}
	
	if($_GET['exit'] == 'yes'){
		unset($_SESSION['user']);
		session_destroy();
	}
	
	header('Refresh: 0; index.php');

?>