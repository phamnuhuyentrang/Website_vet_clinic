<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hello World</title>
</head>
<body>
	<?php  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "na17";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
   			die("Connection failed: " . $conn->connect_error);
		}

		// affection variable
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$dn = $_POST["dn"];
		$ad = $_POST["ad"];
		$phone = $_POST["phone"];

		//requete insert into table 
		$sql = "INSERT INTO client (Nom, Prenom, Date_de_naissance, Addresse, Numero_de_telephone)
		VALUES (?, ?, ?, ?, ?)";
		//statement 
		$stmt = $conn->prepare("$sql");
		$stmt->bind_param("ssdss", $name, $surname, $dn, $ad, $phone);
		$stmt->execute();
		//close connection
		$conn->close();
	?>
</body>
</html>
