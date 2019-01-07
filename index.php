<?php

	session_start();
	
	echo "<link rel='stylesheet' href='style.css' type='text/css'/>";

	if($_SESSION["user"]) {
		echo "			
			<div class = 'menu'>
				<ul>
				<li><a href = 'index.php'> UPLOAD </a></li>
				<li><a href = 'files.php'> FILES </a></li>
				<li><a href = 'auth.php?exit=yes'> LOGOUT </a></li>
				</ul>
			</div>
			
			<div class = 'upload'>
			
				<form action = 'upload.php' method = 'post' enctype = 'multipart/form-data'>
					<input type = 'file' name = 'file'>
					<input type = 'submit' value = 'UPLOAD'>
				</form>
				
			</div>
			
		";
	}
	else {
		
		echo "
			<div class = 'login'>
				<form action='auth.php' method = 'post'>
					LOGIN: <input type = 'text' required name = 'login'> <br>
					PASSW: <input type = 'password' required name = 'password'> <br>
					<input type = 'submit' value = 'LOGIN'>
				</form>
			</div>
		";
		
	}
?>

