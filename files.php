<?php

	session_start();
	
	if($_SESSION['user']) {
		
		echo "<link rel='stylesheet' href='style.css' type='text/css'/>";
		
		echo "
			
			<div class = 'menu'>
				<ul>
				<li><a href = 'index.php'> UPLOAD </a></li>
				<li><a href = 'auth.php?exit=yes'> LOGOUT </a></li>
				</ul>
			</div>
			
		";

		$dir = "./files/";
		
		if(is_dir($dir)) { 
			 
			 $files = scandir($dir);
			 
			 array_shift($files);
			 array_shift($files);
			 
			 echo "
			 
				<div class = 'files'>
				<table>
				<tr><th> NAME </th> <th> PREVIEW </th></tr>
				
			 ";
			 
			 for($i = 0; $i < count($files); $i++) {
				 
				 echo '<tr><td><a href="'.$dir.$files[$i]. '" >' . $files[$i].'</a></td><td>';
				 
				 $ended = explode(".", strtolower($files[$i]));
				 
				 if($ended[count($ended) - 1] == "jpg" or
					$ended[count($ended) - 1] == "png" or
					$ended[count($ended) - 1] == "jpeg" or
					$ended[count($ended) - 1] == "gif" or
					$ended[count($ended) - 1] == "bmp") {
				
						echo "<img width = '64px' height = '64px' src = '" . $dir.$files[$i] . "'/>";
				
					}
				 
				 echo "</td></tr>";
				 
			 }
			 
			 echo "</table></div>";
		} 
		else 
			echo "ОШИБКА";
	}
	else {
		
		header('Refresh: 0; index.php');
		
	}
?>