<?php require_once("functions.php");


	$array_of_names = getData();
	
	if(isset($_POST["save"])){
	updateSecondData($_POST["id"], 1, 1, $_POST["packed"]);
	}
?>


<h2>Tabel</h2>
<table border=1>
	<tr>
		<th>id</th>
		<th>Nimi</th>
		<th>Pakitud</th>
		<th>Edit</th>
	</tr>
	
	<?php
	//var_dump($array_of_names);
	for($i = 0; $i < count($array_of_names); $i++){
		//echo $array_of_names[$i]->id;
		
		if(isset($_GET["edit"]) && $array_of_names[$i]->id == $_GET["edit"]){
		
		echo "<tr>";
		echo "<form action= 'tabel3.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$array_of_names[$i]->id."'>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td><input name='packed' value='".$array_of_names[$i]->packed."'></td>";
		echo "<td><a href='tabel3.php'>cancel<a></td>";
		echo "<td><input type='submit' name='save'></td>";
		echo "</form>";
		echo "</tr>";
			
		}else{			
		echo "<tr>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td>".$array_of_names[$i]->packed."</td>";
		echo "<td><a href='?edit=".$array_of_names[$i]->id."'>edit</a></td>";
		echo "</tr>";
		}
	}

	?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="tabel1.php" method="post" >
	<input type="submit" name="tabel1" value="Mine treimise tabeli juurde">
</form>

<form action="tabel2.php" method="post" >
	<input type="submit" name="tabel2" value="Mine lakkimise tabeli juurde">
</form>