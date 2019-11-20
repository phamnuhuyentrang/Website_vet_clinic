<?php 

	// $date = new DateTime($date_rdv);
	// $now = new DateTime();

	// if($date < $now) {
    	// echo 'Date is in the past';
    	// header("location:javascript://history.go(-1)");
	// }

	if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    	session_start();
	}

	if (isset($_SESSION['name'])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "na17";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
			die("ERROR: Connection failed " . $conn->connect_error);
		}
			

		$sql = "SELECT A.Espece AS Nom_Espece, COUNT(T.ID_Traitement) AS Nombre_traitement FROM Animal A, rendez_vous R, traitement T 
		WHERE A.ID_Animal = R.Pet AND T.Rdv = R.No_ref GROUP BY A.Espece;";

		$res = mysqli_query($conn, $sql);
	}
	else {
		echo "Session ends.";
		header('Location: home.html');
	}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>STATISTICS</title>
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
						<li><a href="statistics.html">Statistics</a></li>
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
					<div class="container">
						<header class="major">
							<h2>Our total treatments per species</h2>
						</header>
						<div class="row 150%">
							<?php while($row = mysqli_fetch_array($res)):;?>
								<div class="6u 12u$(xsmall)">								
  									<div class="form">						        
							        	<label> Species : <?PHP echo $row[0]; ?> </label> <br>						     				
							    	</div>
								</div>
								<div class="6u 12u$(xsmall)">
	  								<div class="form">
								        <label> Number of treatments : <?PHP echo $row[1]; ?> </label> <br>
								    </div>
								</div>
							<?php endwhile;?>
						</div>
					</div>
			</section>
	</body>
</html>
