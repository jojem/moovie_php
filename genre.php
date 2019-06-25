<?php
session_start();
include('includes/db_connect.php');
include('includes/head.php')
?>
<head>
	<link rel="stylesheet" href="css/item-page.css">
</head>
<body>
	<?php
		include('includes/navbar.php');
	?>
	<div class="main-div">
		<div class="left-content">
		</div>
		<div class="content">
			<?php
			$genres = mysqli_query($conn, "SELECT * FROM genres");

			if(mysqli_num_rows($genres) == 0){
				echo "Genres not found";
			} else
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
</body>
</html>