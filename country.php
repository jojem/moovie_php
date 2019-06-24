<?php
session_start();
include('includes/db_connect.php');
?>

<html>
<head>
	<title>Moovie</title>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="Refresh" content="5" /> -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/colors.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/items.css">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Lato|Montserrat:200|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/item-page.css">
</head>
<body>
	<div class="topnav">
		<div id="home-page" class="nav_item ">
			<a class="active" href="index.html">Home</a>
		</div>
		<div id="films-page" class="nav_item">
			<a href="film_list.php">Film List</a>
		</div>
		<div id="genre-page" class="nav_item">
			<a href="genre.php">Genres</a>
		</div>
		<div id="country-page" class="nav_item">
			<a href="country.php">Countries</a>
		</div>
	</div>
	<div class="main-div">
		<div class="left-content">
			

		</div>
		<div class="content">
			<?php

				$sql = "SELECT id_c, country FROM countries";
				$result = $conn->query($sql);
				echo "<h1>Countries</h1>";

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<p>"."id: " . $row["id_c"]. " - Country: " . $row["country"]."</p>" ;
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();
			?>
		</div>
		<footer>
			<p>&copy By Jo, 2019</p>
		</footer>
	</div>
<!-- 	<script src="js/index.js"></script>
	<script src="js/elements.js"></script> -->
</body>
</html>