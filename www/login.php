<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="main.css" />
	<title>Login</title>
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
   			die("ERROR: Connection failed " . $conn->connect_error);
		}

		// Get variables
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$dn = $_POST["dn"];

		// Requête insert into table 
		$sql = "SELECT * FROM Client WHERE Nom='".$name."' AND Prenom='".$surname."' AND Date_de_naissance='".$dn."' ";

		$res = mysqli_query($conn, $sql);

		// Check login info
		if(mysqli_num_rows($res) > 0) {
    		//echo "Login sucessfully !";
    		header('Location: home_user.html');
		} 
		else{
    		echo "ERROR: Your account is not found ! ";
		}

		// Statement 
		// $stmt = $conn->prepare("$sql");
		// $stmt->bind_param("ssd", $name, $surname, $dn);
		// $stmt->execute();

		//close connection
		$conn->close();
	?>
</body>
</html>