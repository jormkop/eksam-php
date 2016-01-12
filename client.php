<?php require_once("functions.php");


	$keyword = "";

	if(isset($_GET["keyword"])){
		
		$keyword = $_GET["keyword"];
		$array_of_names = getTheData($keyword);
		
	}else{
		
		$array_of_names = getTheData();
	}
	
?>



<h2>Tabel</h2>

<form action="client.php" method="get" >
	<input type="search" name="keyword" value="<?=$keyword;?>" >
	<input type="submit">
</form>

<table border=1>
	<tr>
		<th>id</th>
		<th>Nimi</th>
		<th>Treitud</th>
		<th>Lakitud</th>
		<th>Pakitud</th>
		<th>Edit</th>
	</tr>
	
	<?php
	//var_dump($array_of_names);
	for($i = 0; $i < count($array_of_names); $i++){
		//echo $array_of_names[$i]->id;
		
		if(isset($_GET["edit"]) && $array_of_names[$i]->id == $_GET["edit"]){
		
		echo "<tr>";
		echo "<form action= 'client.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$array_of_names[$i]->id."'>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td><input name='carved' value='".$array_of_names[$i]->carved."'></td>";
		echo "<td><input name='painted' value='".$array_of_names[$i]->painted."'></td>";
		echo "<td><input name='packed' value='".$array_of_names[$i]->packed."'></td>";
		echo "<td><a href='client.php'>cancel<a></td>";
		echo "<td><input type='submit' name='save'></td>";
		echo "</form>";
		echo "</tr>";
			
		}else{			
		echo "<tr>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td>".$array_of_names[$i]->carved."</td>";
		echo "<td>".$array_of_names[$i]->painted."</td>";
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
