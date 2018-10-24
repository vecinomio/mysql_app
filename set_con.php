<?php	
	$h = "localhost";
	$u = "sisuser";
	$p = "sispass";
	$b = "sisdb";
	
	$con = mysql_connect($h, $u, $p);
	
	mysql_select_db($b, $con);
?>
