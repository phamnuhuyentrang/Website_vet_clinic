<!DOCTYPE HTML>
<html>
	<head>
		<title>PAS VET - LOGIN</title>
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

			<!-- Form Login -->
				<section id="user_login" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Your Pet</h2>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<form action='pet_profile.php' method='post'>
  									<div class="form">
    									<label for="name">Name: </label>
    									<input type="text" name="name" id="name" required>
  									</div>
  									<div class="form">
    									<label for="poids">Weight: </label>
   				 						<input type="number" name="poids" id="poids" min="0.1" required>
  									</div>
  									<div class="form">
    									<label for="taille">Height: </label>
   				 						<input type="number" name="taille" id="taille" min="0.1" required>
  									</div>
  									<div class="form">
    									<label for="dn">Birthday: </label>
   				 						<input type="date" name="dn" id="dn" required>
  									</div>
  									<div class="form">
  											<label for="pet-select">Species:</label>
    										<select name = "le_nom" id="le_nom" onchange="if(this.options[this.selectedIndex].value=='Other'){
              									toggleField(this,this.nextSibling);
              									this.selectedIndex='0';
          									}"> 
          										<option></option>
    											<option value = ''> Choose species of your pet </option>
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
														$sql = "SELECT Nom FROM Espece";
														$res = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_array($res)) {
   															echo "<option value =".$row[0]."> ".$row[0]."</option>";
														}															
													?>												
											</select>
  									</div>
  									<br>
  									<div class="form">
    									<input type="submit" value="Add my pet">
  									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
	</body>
</html>
