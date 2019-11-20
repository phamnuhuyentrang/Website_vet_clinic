<?php  
		session_start();

		if (isset($_POST['ok'])) {
			$servername = "localhost";
			$username = "id11663796_root";
			$password = "BiPham0208*";
			$dbname = "id11663796_na17";

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
	    		
	    		while($row = mysqli_fetch_assoc($res)) {
	    			$_SESSION['name'] = $row["Nom"];
	    			$_SESSION['surname'] = $row["Prenom"];
	    			$_SESSION['dn'] = $row["Date_de_naissance"];
	        		$_SESSION['id'] = $row["ID_Client"];
	        		$_SESSION['ad'] = $row["Addresse"];
	        		$_SESSION['tel'] = $row["Numero_de_telephone"];
	    		}

	    		echo "<script>window.location.href='home_user.html';</script>";
			} 
			else{
	    		echo "<script>alert('ERROR: Your account is not found !'); window.location.href='index.html';</script>";
	    		if (empty(session_id())){
					session_start();
				}	
			}




			// Statement 
			// $stmt = $conn->prepare("$sql");
			// $stmt->bind_param("ssd", $name, $surname, $dn);
			// $stmt->execute();

			//close connection
			$conn->close();
		}				
	?>
</body>
</html>