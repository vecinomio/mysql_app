<?php
	if ($_POST["id"]) {
		if ($_POST["name"]) {
		mysql_query("update students set name='"
			.$_POST["name"]
			."' where id="
			.$_POST["id"], $con);
		} 			
		if ($_POST["age"]) {
		mysql_query("update students set age="
			.$_POST["age"]
			." where id=".
			$_POST["id"], $con);
		} 			
	}	
	else if ($_POST["name"] && $_POST["age"]) {
		mysql_query("insert into students (name, age) values ('"
			.$_POST["name"]."',"
			.$_POST["age"].")" , $con); 		
	}
	unset($_POST["name"]);
	unset($_POST["age"]);
	unset($_POST["id"]);
?>



<!DOCTYPE html>

<html>
<head><title>SiS: Welcome!</title></head>
<body>
<h1>Student info System</h1>


<form method='post' action='index.php'>
	<table>
	<tr>
	<td>Name:</td>
	<td colspan=2>
<input type='text' name='name' value='<?php echo $_GET["name"];?>'>
	</td>
	</tr>
	<tr>
	<td>Age:</td>
	<td>
<input type='text' name='age' size=12 value='<?php echo $_GET["age"];?>'>
	</td><td align='right'>
<input type='submit' value='Save'>
	</td>
	</tr>	
	</table>
<input type='hidden' name='id' value='<?php echo $_GET["id"];?>'>
</form>

<hr>

<h3>Current team:</h3>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Age</th><th colspan='2'>Manage</th></tr>

<?php	
	$res = mysql_query("select * from students order by id", $con);

	while( $row = mysql_fetch_array($res) ) {
		echo "<tr>";	
		echo "<td>".$row["id"]."</td>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["age"]."</td>";
		echo "<td><a href=index.php?name="
.$row["name"]."&age=".$row["age"]."&id=".$row["id"].">edit</a></td>";
		echo "<td><a href=delete.php?id=".$row["id"].">delete</a></td>";
		echo "</tr>";	
	}

	mysql_close($con);
?>

</table>

</body>
</html>
