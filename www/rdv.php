<?php 
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

		// Check connection
		if (!$conn) {
			die("ERROR: Connection failed " . $conn->connect_error);
		}

		$id = $_SESSION['id'];
		$sql = "SELECT ID_Animal, Nom FROM Animal WHERE ID_Client = '$id' ";
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
						<li><a href="pet.html">Your Pet</a></li>
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
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Your Appointment</h2>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<form action="rdv_res.php" method="POST">
  									<div class="form">
    									<label for="pet">Choose your "patient" pet: </label>
    									<select name="pet">
								            <?php while($row = mysqli_fetch_array($res)):;?>
								            	<option value="<?php echo $row[0];?>" required><?php echo $row[1];?></option>
								            <?php endwhile;?>
								        </select>
  									</div>
  									<div class="form">
    									<label for="rdv_date">Appointment Date: </label>
   				 						<input type="date" name="rdv_date" id="rdv_date" min="<?php echo date("Y-m-d")?>"required>
  									</div>
  									<div class="form">
    									<label for="rdv_time">Appointment Time: </label>
   				 						<input type="time" name="rdv_time" id="rdv_time" min="09:00:00" max="20:00:00" required>
  									</div>
  									<br>
  									<div class="form">
    									<input type="submit" name = "go" value="Go !">
  									</div>
								</form>
							</div>
						</div>
					</div>
			</section>
	</body>
</html>
