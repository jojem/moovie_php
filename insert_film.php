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
				$get_genre = array();
				$get_country = array();

				$get_film_name = $_POST['film_name'];
				$get_year = $_POST['year'];
				foreach($_POST['country'] as $selected_country){
					$get_country[] = (int)$selected_country;
				}
				foreach($_POST['genre'] as $selected_genre){
					$get_genre[] = (int)$selected_genre;
				}
				$get_runtime = $_POST['runtime'];
				$get_rating = $_POST['rating'];
				$get_description = htmlspecialchars($_POST['description']);
				$get_storyline = htmlspecialchars($_POST['storyline']);
				$get_taglines = htmlspecialchars($_POST['taglines']);
				$get_poster = $_POST['poster'];

				echo "<h1>film</h1>".
				"<span>Film name:</span>   ".$get_film_name. "<hr>".
				"<span>Year:</span>  ".$get_year."<hr>".
				"<span>Runtime:</span>   ".$get_runtime."<hr>".
				"<span>Genre's id:</span>  ".implode(", ", $get_genre)."<hr>".
				"<span>Country's id:</span>  ".implode(", ", $get_country)."<hr>".
				"<span>Rating:</span>  ".$get_rating ."<hr>".
				"<span>Description:</span>  ".$get_description."<hr>".
				"<span>Storyline:</span>  ".$get_storyline ."<hr>".
				"<span>Taglines:</span>  ".$get_taglines."<hr>".
				"<span>Poster:</span>  ".$get_poster."<hr>" ;

				$insert_film_query = "INSERT INTO films (film_name, year, rating, runtime, description, storyline, taglines, poster)
				VALUES ('$get_film_name', $get_year, $get_rating, $get_runtime, '$get_description', '$get_storyline', '$get_taglines', '$get_poster')";

				if ($conn->query($insert_film_query) === TRUE) {
				    echo "<h2>New record created successfully</h2>";
				} else {
				    echo "<h2>Error: " . $insert_film_query . "</h2><br>" . $conn->error;
				}

				$last_id = $conn->insert_id;

				foreach($get_genre as $genre){
					$insert_genre_query = "INSERT INTO film_genre (id_f, id_g)
					VALUES ($last_id, $genre)";
					$conn->query($insert_genre_query);
				}

				foreach($get_country as $country){
					$insert_country_query = "INSERT INTO film_country (id_f, id_c)
					VALUES ($last_id, $country)";
					$conn->query($insert_country_query);
				}
			?>
			<?php
				
			$conn->close();
			?>
		</div>
		<footer>
			<p>&copy By Jo, 2019</p>
		</footer>
	</div>
</body>
</html>