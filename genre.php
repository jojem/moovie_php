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
	$genres = mysqli_query($conn, "SELECT * FROM genres");
	
	if(mysqli_num_rows($genres) == 0){
		echo "Genres not found";
	}else
	{?>

			<?php
			echo "<h1>Genres</h1>";
			//return genres and count of films 
			// example: DRAMA (3)
				while(($genre = mysqli_fetch_assoc($genres)) ){
					$genre_films_count = mysqli_query($conn, "SELECT COUNT('id_f') AS 'total_count' FROM film_genre WHERE id_g = ". $genre["id_g"]);
					$genre_films_count_current = mysqli_fetch_assoc($genre_films_count);
					echo "<p><a href = 'film_list.php?genre=".$genre['id_g']."'>".$genre['genre'].' ('.$genre_films_count_current['total_count'].')</a></p>';
				}
			?>

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