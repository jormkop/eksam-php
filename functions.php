<?php

	require_once("../config_global.php");
	
	$database = "if15_Jork";
	
	session_start();
	
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	

	
	function cleanInput($data) {
  	  $data = trim($data);
  	  $data = stripslashes($data);
  	  $data = htmlspecialchars($data);
  	  return $data;
    }
	
	$message= "";

	function addName($name){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO nikerdused (id, nimi) VALUES (?, ?)");
		echo $mysqli->error;
		$stmt->bind_param("is", $id, $name);
		
		$message= "";
	
		if($stmt->execute()){
			$message = "Sai edukalt lisatud nikerdused. ";
		}else{
			echo $stmt->error;
		}
		return $message;
		$stmt->close();
		$mysqli->close();
		
		
	}
	
		function getData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, nimi, treitud, lakitud, pakitud from nikerdused where pakitud=0");
		$stmt->bind_result($id, $name, $treitud, $lakitud, $pakitud);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){

		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->treitud = $treitud;
		$wood->lakitud = $lakitud;
		$wood->pakitud = $pakitud;

		array_push($wood_array, $wood);

		}

		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	function updateData($id, $treitud, $lakitud, $pakitud){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE nikerdused SET treitud=?, lakitud=?, pakitud=? WHERE id=?");
		$stmt->bind_param("sssi", $treitud, $lakitud, $pakitud, $id);
		if($stmt->execute()){
			header("location:nikerdused.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
?>