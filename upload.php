<?php
	
	session_start();
	
	if($_SESSION['user']) {
		
		echo "<link rel='stylesheet' href='style.css' type='text/css'/>";
		
		echo "
			
			<div class = 'menu'>
				<ul>
				<li><a href = 'index.php'> UPLOAD </a></li>
				<li><a href = 'files.php'> FILES </a></li>
				<li><a href = 'auth.php?exit=yes'> LOGOUT </a></li>
				</ul>
			</div>
			
		";
		
		echo "<div class = 'upload'>";
		
		// MAKE NAME
		$ended = explode(".", strtolower($_FILES['file']['name']));
		$_FILES['file']['name'] = date("d.m.Y.H.i.s") . '.' . $ended[count($ended) - 1];
		
		$dir = './files/';
		$file = $dir.basename($_FILES['file']['name']);

		if (copy($_FILES['file']['tmp_name'], $file)) {
			
			echo "<h3>SUCCESS</h3>";
			
			if($ended[count($ended) - 1] == "jpg" or
				$ended[count($ended) - 1] == "png" or
				$ended[count($ended) - 1] == "jpeg" or
				$ended[count($ended) - 1] == "gif" or
				$ended[count($ended) - 1] == "bmp") {
				
				echo "<img width = '64px' height = '64px' src = '" . $dir . $_FILES['file']['name'] . "'/>";
				
			}
			
			echo "<p>URL: <a href = '". $dir . $_FILES['file']['name'] . "'>" . $dir . $_FILES['file']['name'] . "</a></p>";
			echo "<small>Type: ".$_FILES['file']['type']."</small><br>";
			echo "<small>Size: ".$_FILES['file']['size']."</small><br>";
		}
		
		else { 
			echo "<h3>ERROR</h3>";
		}

		echo "</div>";
		
	}
	else {
		
		header('Refresh: 0; index.php');
		
	}
	
?>