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
		$stmt = $mysqli->prepare("INSERT INTO woodwork (id, name) VALUES (?, ?)");
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
	
	function getFirstData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, carved, painted, packed from woodwork where carved=0");
		$stmt->bind_result($id, $name, $carved, $painted, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){

		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->carved = $carved;
		$wood->painted = $painted;
		$wood->packed = $packed;

		array_push($wood_array, $wood);

		}

		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	function getSecondData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, carved, painted, packed from woodwork where painted=0 and carved=1");
		$stmt->bind_result($id, $name, $carved, $painted, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){

		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->carved = $carved;
		$wood->painted = $painted;
		$wood->packed = $packed;

		array_push($wood_array, $wood);

		}

		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	function getData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, carved, painted, packed from woodwork where packed=0 and carved=1 and painted=1");
		$stmt->bind_result($id, $name, $carved, $painted, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){

		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->carved = $carved;
		$wood->painted = $painted;
		$wood->packed = $packed;

		array_push($wood_array, $wood);

		}

		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	function getTheData($keyword=""){
		
		$search = "%%";
		if($keyword == ""){
			echo "Ei otsi";
			
		}else{
			echo "Otsin ".$keyword;
			$search = "%".$keyword."%";
		
		}
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			$stmt = $mysqli->prepare("SELECT id, name, carved, painted, packed FROM woodwork WHERE packed !=2 AND (id LIKE ?)");
			$stmt->bind_param("s", $search);
			$stmt->bind_result($id, $name, $carved, $painted, $packed);
			$stmt->execute();
			$wood_array = array();
			
			while($stmt->fetch()){

				$wood = new StdClass();
				$wood->id = $id;
				$wood->name = $name;
				$wood->carved = $carved;
				$wood->painted = $painted;
				$wood->packed = $packed;

				array_push($wood_array, $wood);

			}

			return $wood_array;
			
			
			
			$stmt->close();
			$mysqli->close();
		
	}
	
	function updateData($id, $carved, $painted, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE woodwork SET carved=?, painted=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $carved, $painted, $packed, $id);
		if($stmt->execute()){
			header("location:tabel1.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	function updateFirstData($id, $carved, $painted, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE woodwork SET carved=?, painted=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $carved, $painted, $packed, $id);
		if($stmt->execute()){
			header("location:tabel2.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	function updateSecondData($id, $carved, $painted, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE woodwork SET carved=?, painted=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $carved, $painted, $packed, $id);
		if($stmt->execute()){
			header("location:tabel3.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
?>