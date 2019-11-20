<?php
	if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    	session_start();
	}
	if (isset($_SESSION['name'])) {
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$surname = $_SESSION['surname'];
		$dn = $_SESSION['dn'];
		$ad = $_SESSION['ad'];
		$tel = $_SESSION['tel'];
	}
	else {
		echo "<script>alert('Session Ends.'); window.location.href='index.html';</script>";
	}	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>PAS VET - YOUR PROFILE</title>
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
			<section id="user_profile" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Your Profile</h2>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<div class="form">
									<br>
									<label for="ref">ID: <?php echo $id;?></label>
								</div>
								<div class="form">
									<label for="pet">Name: <?php echo $name;?></label>
								</div>
								<div class="form">
									<label for="vet">Surname: <?php echo $surname;?></label>
								</div>
								<div class="form">
									<label for="date_rdv">Birthday: <?php echo $dn;?></label>
								</div>
								<div class="form">
									<label for="time_rdv">Address: <?php echo $ad;?></label>
								</div>
								<div class="form">
									<label for="time_rdv">Tel: <?php echo $tel;?></label>
								</div>
							</div>
						</div>
					</div>
			</section>
	</body>
</html>
