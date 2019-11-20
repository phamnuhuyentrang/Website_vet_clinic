

<!DOCTYPE HTML>
<html>
	<head>
		<title>PAS VET - YOUR APPOINTMENT</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css" />
	</head>
	<body class="landing">
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

				$sql2 = "SELECT R.No_ref, A.Nom, V.Nom, V.prenom, R.Date_rdv, R.Time_rdv FROM Rendez_vous R LEFT JOIN Animal A ON R.Pet = A.ID_Animal LEFT JOIN Veterinaire V ON R.Vet = V.ID_personnel WHERE A.ID_Client='$id' ORDER BY R.Date_rdv AND R.Time_rdv";
				$res2 = mysqli_query($conn, $sql2);
			}
			else {
				echo "<script>alert('Session Ends.'); window.location.href='home.html';</script>";
			}
		?>
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
				<ul class="actions">
					<li><a href="#rdv" class="button special big">New Appointment</a></li>
					<li><a href="#rdv_view" class="button special big">Your Appointments</a></li>
				</ul>
			</section>

		<!-- Add new appointment -->
			<section id="rdv" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>New Appointment</h2>
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
   				 						<input type="time" name="rdv_time" id="rdv_time" min="09:00:00" max="19:00:00" required>
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

		<!--See all appointments-->
			<section id="rdv_view" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Your Appointments</h2>
						</header>
						<div class="row 150%">
							<?php while($row1 = mysqli_fetch_array($res2)):;?>
							<div class="6u 12u$(xsmall)">					
								<div class="form">
									<br>
									<label for="ref">No: <?php echo $row1[0];?></label>
								</div>
								<div class="form">
									<label for="pet">Pet: <?php echo $row1[1];?></label>
								</div>
								<div class="form">
									<label for="vet">Vet: <?php echo $row1[2]. " ". $row1[3];?></label>
								</div>
								<div class="form">
									<label for="date_rdv">Date: <?php echo $row1[4];?></label>
								</div>
								<div class="form">
									<label for="time_rdv">Time: <?php echo $row1[5];?></label>
								</div>
							</div>
							<?php endwhile;?>
						</div>
					</div>
				</section>
	</body>
</html>