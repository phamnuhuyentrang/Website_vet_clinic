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
								<?php 
									if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    									session_start();
									}
									// Import session file
									// require_once("login.php");
									// include "login.php";
								?>
								<?php
									if (isset($_SESSION['name'])) {
										echo "<strong>ID: </strong>" . $_SESSION['id'] . '<br>';
										echo "<strong>Name: </strong>" . $_SESSION['name'] . '<br>';
										echo "<strong>First Name: </strong>" . $_SESSION['surname'] . '<br>';
										echo "<strong>Birthday: </strong>" . $_SESSION['dn'] . '<br>';
										echo "<strong>Address: </strong>" . $_SESSION['ad'] . '<br>';
										echo "<strong>Tel: </strong>" . $_SESSION['tel'] . '<br>';
									}
									else {
										echo "<script>alert('Session Ends.'); window.location.href='home.html';</script>";
									}
								?>
							</div>
						</div>
					</div>
			</section>
	</body>
</html>
