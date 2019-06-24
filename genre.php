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
	$genres = mysqli_query($conn, "SELECT * FROM genres");
	
	if(mysqli_num_rows($genres) == 0){
		echo "Genres not found";
	}else
	{?>

		<ul>
			<?php
			//return genres and count of films 
			// example: DRAMA (3)
				while(($genre = mysqli_fetch_assoc($genres)) ){
					$genre_films_count = mysqli_query($conn, "SELECT COUNT('id_f') AS 'total_count' FROM film_genre WHERE id_g = ". $genre["id_g"]);
					$genre_films_count_current = mysqli_fetch_assoc($genre_films_count);
					echo "<li>".$genre['genre'].' ('.$genre_films_count_current['total_count'].')</li>';
				}
			?>
		</ul>

	<?php
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