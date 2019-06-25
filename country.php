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
	<?php
		include('navbar.php');
	?>
	<div class="main-div">
		<div class="left-content">
			

		</div>
		<div class="content">
			<?php

				$sql = "SELECT id_c, country FROM countries";
				$countries = $conn->query($sql);
				echo "<h1>Countries</h1>";

				if ($countries->num_rows > 0) {
				    // output data of each row
				    while($country= $countries->fetch_assoc()) {
				    	$country_films_count = mysqli_query($conn, "SELECT COUNT('id_f') AS 'total_count' FROM film_country WHERE id_c = ". $country["id_c"]);
							$country_films_count_current = mysqli_fetch_assoc($country_films_count);
				      echo "<p><a href='generate-page.php?country=".$country["id_c"]."'>id: " . $country["id_c"]. ".  " 
				      . $country["country"].' ('.$country_films_count_current['total_count'].')</a></p>';
				    }
				} else {
				    echo "0 countries";
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