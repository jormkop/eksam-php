<?php require_once("functions.php");

	$name = "";
	$name_error = "";

	if(isset($_POST["register"])){

		if ( empty($_POST["name"]) ) {
			$name_error = "See väli on kohustuslik";
		}else{
			$name = cleanInput($_POST["name"]);
		}
		
		
		if($name_error == ""){
			$msg = addName($name);
			
			if($msg != ""){
				$name = "";
				
				echo $msg;
				
			}
			
		}
	}
	
	$array_of_names = getData();
	
	if(isset($_POST["save"])){
	updateData($_POST["id"], $_POST["treitud"], $_POST["lakitud"], $_POST["pakitud"]);
	}
?>

<h2>Lisa nikerdus</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<label for="name" >Nikerduse nimi</label><br>
	<input id="name" name="name" type="text" value="<?php echo $name; ?>"> <?php echo $name_error; ?><br><br>
	<input type="submit" name="register" value="Lisa tellimus">
</form>

<h2>Tabel</h2>
<table border=1>
	<tr>
		<th>id</th>
		<th>Nimi</th>
		<th>Treitud</th>
		<th>Lakitud</th>
		<th>pakitud</th>
		<th>Edit</th>
		<th>Edit</th>
	</tr>
	
	<?php
	//var_dump($array_of_names);
	for($i = 0; $i < count($array_of_names); $i++){
		//echo $array_of_names[$i]->id;
		
		if(isset($_GET["edit"]) && $array_of_names[$i]->id == $_GET["edit"]){
		
		echo "<tr>";
		echo "<form action= 'nikerdused.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$array_of_names[$i]->id."'>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td><input name='treitud' value='".$array_of_names[$i]->treitud."'></td>";
		echo "<td><input name='lakitud' value='".$array_of_names[$i]->lakitud."'></td>";
		echo "<td><input name='pakitud' value='".$array_of_names[$i]->pakitud."'></td>";
		echo "<td><a href='nikerdused.php'>cancel<a></td>";
		echo "<td><input type='submit' name='save'></td>";
		echo "</form>";
		echo "</tr>";
			
		}else{			
		echo "<tr>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td>".$array_of_names[$i]->treitud."</td>";
		echo "<td>".$array_of_names[$i]->lakitud."</td>";
		echo "<td>".$array_of_names[$i]->pakitud."</td>";
		echo "<td><a href='?delete=".$array_of_names[$i]->id."'>X</a></td>";
		echo "<td><a href='?edit=".$array_of_names[$i]->id."'>edit</a></td>";
		echo "</tr>";
		}
	}

	?>
</table>