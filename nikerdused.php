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

?>

<h2>Lisa nikerdus</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<label for="name" >Nikerduse nimi</label><br>
	<input id="name" name="name" type="text" value="<?php echo $name; ?>"> <?php echo $name_error; ?><br><br>
	<input type="submit" name="register" value="Lisa tellimus">
</form>
<br>
<br>
<br>
<form action="client.php" method="post" >
	<input type="submit" name="tabel1" value="Mine klienditabelisse">
</form>
<br>
<br>
<br>
<form action="tabel1.php" method="post" >
	<input type="submit" name="tabel1" value="Mine treimise tabeli juurde">
</form>

<form action="tabel2.php" method="post" >
	<input type="submit" name="tabel2" value="Mine lakkimise tabeli juurde">
</form>

<form action="tabel3.php" method="post" >
	<input type="submit" name="tabel3" value="Mine pakkimise tabeli juurde">
</form>