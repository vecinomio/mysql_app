<?php
	include 'set_con.php';

	$id = $_GET["id"];
	if ($id) {

		mysql_query("delete from students where id=".$id);
		unset($id);
		unset($_GET["id"]); 
	}

	include 'main.php';
?>
