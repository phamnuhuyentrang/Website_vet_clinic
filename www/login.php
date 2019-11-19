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

		// Requête select from table 
		// $sql = "SELECT * FROM Client WHERE Nom='".$name."' AND Prenom='".$surname."' AND Date_de_naissance='".$dn."' ";
		$sql = "SELECT * FROM Client WHERE Nom='$name' AND Prenom='$surname' AND Date_de_naissance='$dn' ";

		$res = mysqli_query($conn, $sql);

		// Check login info
		if(mysqli_num_rows($res) > 0) {
    		//echo "Login sucessfully !";
    		session_start();

    		while($row = mysqli_fetch_assoc($res)) {
    			$_SESSION['name'] = $row["Nom"];
    			$_SESSION['surname'] = $row["Prenom"];
    			$_SESSION['dn'] = $row["Date_de_naissance"];
        		$_SESSION['id'] = $row["ID_Client"];
        		$_SESSION['ad'] = $row["Addresse"];
        		$_SESSION['tel'] = $row["Numero_de_telephone"];
    		}

    		header('Location: home_user.html');
		} 
		else{
    		echo "ERROR: Your account is not found ! "."<br>";
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