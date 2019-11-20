<?php
		// include "login.php";

		// Keep session
		if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    		session_start();
		}

		if (isset($_SESSION['name'])) {

			$servername = "localhost";
			$username = "id11663796_root";
			$password = "BiPham0208*";
			$dbname = "id11663796_na17";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
		   		die("ERROR: Connection failed. " . $conn->connect_error);
			}

			$name = $_POST["name"];
			$poids = $_POST["poids"];
			$taille = $_POST["taille"];
			$dn = $_POST["dn"];
			$espece = $_POST["le_nom"];
			$id = $_SESSION['id'];

			//requete insert into table 
			$sql = "INSERT INTO Animal (Nom, Poids, Taille, Date_de_naissance, Espece, ID_Client)
			VALUES ('$name','$poids','$taille','$dn','$espece','$id') ";

			if(mysqli_query($conn, $sql)){
				echo "<script>alert('Your pet are registered successfully. Thank you!'); window.location.href='home_user.html';</script>";
			} 
			else{
	    		echo "ERROR: Registration error. " . mysqli_error($conn);
			}

			$conn->close();

		}

		else {
			echo "<script>alert('Session Ends.'); window.location.href='index.html';</script>";
		} 

		//statement 
		//$stmt = $conn->prepare("$sql");
		//$stmt->bind_param("ssdss", $name, $surname, $dn, $ad, $phone);
		//$stmt->execute();

		//close connection
		
	?>