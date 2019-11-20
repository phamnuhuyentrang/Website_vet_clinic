<?php 

	// $date = new DateTime($date_rdv);
	// $now = new DateTime();

	// if($date < $now) {
    	// echo 'Date is in the past';
    	// header("location:javascript://history.go(-1)");
	// }
	// include "login.php";

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

		if (!$conn) {
			die("ERROR: Connection failed " . $conn->connect_error);
		}

		if (isset($_POST["go"])) {
			$pet = $_POST["pet"];
			$date_rdv = $_POST["rdv_date"];
			$time_rdv = $_POST["rdv_time"];

			// Check connection
			

			$sql = "SELECT R.Vet, V.Nom, V.Prenom FROM Rendez_vous R LEFT JOIN Veterinaire V ON R.Vet = V.ID_personnel WHERE R.Date_rdv <> '$date_rdv' OR R.Time_rdv <> '$time_rdv' ORDER BY V.Nom, V.Prenom";
			$res = mysqli_query($conn, $sql);
		}

		if (isset($_POST["finish"])) {
			$petrdv = $_POST["petrdv"];
			$drdv = $_POST["drdv"];
			$trdv = $_POST["trdv"];
			$vet = $_POST["dr"];
			$sql = "INSERT INTO Rendez_vous (Pet, Vet, Date_rdv, Time_rdv) VALUES ('$petrdv','$vet','$drdv','$trdv') ";

			if(mysqli_query($conn, $sql)){
				echo "<script>alert('Your appointment are registered successfully. Thank you !'); window.location.href='home_user.html';</script>";
			} 
			else{
	    		echo "ERROR: Registration error. " . mysqli_error($conn);
			}
		}		
	}

	else {
		echo "<script>alert('Session Ends.'); window.location.href='index.html';</script>";
	}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>PAS VET HOMEPAGE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css" />
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<nav id="nav">
					<ul>
						<li><a href="home_user.html">Home</a></li>
						<li><a href="profile.php">Your Profile</a></li>
						<li><a href="pet.php">Your Pet</a></li>
						<li><a href="rdv.php">Your appointment</a></li>
						<li><a href="statistics.php">Statistics</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</nav>
			</header>


		<!-- Banner -->
			<section id="banner">
				<h2>President And Secretary Vet Clinic</h2>
				<p>Your pet's health, we care</p>
			</section>

		<!-- Profile -->
			<section id="rdv" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Your Appointment</h2>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<form action="#" method="POST">
  									<div class="form">
    									<label for="pet">Choose your favorite vet: </label>
    									<select name = "dr">
								            <?php while($row = mysqli_fetch_array($res)):;?>
								            	<option value="<?php echo $row[0];?>" required><?php echo "Dr. ".$row[1]." ".$row[2];?></option>
								            <?php endwhile;?>
								        </select>								   						        
  									</div>
  									<div class = "form">
  										<input type="hidden" name="petrdv" value="<?php echo  $_POST["pet"]; ?>">
  									</div>
  									<div class="form">
  										<input type="hidden" name="drdv" value="<?php echo  $_POST["rdv_date"]; ?>">
  									</div>
  									<div class="form">
  										<input type="hidden" name="trdv" value="<?php echo  $_POST["rdv_time"]; ?>">
  									</div>
  									<br>
  									<div class="form">
    									<input type="submit" name="finish" value="Finish !">
  									</div>
								</form>

							</div>
						</div>
					</div>
			</section>
	</body>
</html>
