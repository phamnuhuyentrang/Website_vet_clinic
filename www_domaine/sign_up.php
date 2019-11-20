
	<?php  
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

		// affection variable
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$dn = $_POST["dn"];
		$ad = $_POST["ad"];
		$phone = $_POST["phone"];

		//requete insert into table 
		$sql = "INSERT INTO Client (Nom, Prenom, Date_de_naissance, Addresse, Numero_de_telephone)
		VALUES ('$name','$surname','$dn','$ad','$phone') ";

		if(mysqli_query($conn, $sql)){
			echo "<script>alert('Your informations are registered successfully. Thank you!'); window.location.href='index.html';</script>";
		} 
		else{
    		echo "ERROR: Registration error. " . mysqli_error($conn);
		}

		//statement 
		//$stmt = $conn->prepare("$sql");
		//$stmt->bind_param("ssdss", $name, $surname, $dn, $ad, $phone);
		//$stmt->execute();

		//close connection
		
		$conn->close();
	?>