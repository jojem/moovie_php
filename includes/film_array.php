	<?php
		$get_country =  $_GET['country'];
		$get_genre = $_GET['genre'];

		if ($_GET['country'] != NULL){
			$sql = "SELECT * FROM films WHERE id_f IN (SELECT id_f FROM film_country WHERE id_c = $get_country)" ;
		}
		elseif($_GET['genre'] != NULL){
			$sql = "SELECT * FROM films WHERE id_f IN (SELECT id_f FROM film_genre WHERE id_g = $get_genre)" ;
		}
		elseif(($_GET['genre'] != NULL) && ($_GET['country'] != NULL)){
			$sql = "SELECT * FROM films
							WHERE id_f IN 
							(SELECT id_f FROM film_country
							WHERE id_c = $get_country AND id_f IN
							(SELECT id_f FROM film_genre
							WHERE id_g = $get_genre))" ;
		}
		else{
			$sql = "SELECT * FROM films " ;
		}

		$films = $conn->query($sql);
		$film_array = array();
		while($film = $films->fetch_assoc()){
			$genre_array = array();
			$country_array = array();
			$genres = mysqli_query($conn, "SELECT genre FROM genres WHERE id_g IN
								 									(SELECT id_g FROM film_genre WHERE id_f = ".$film['id_f'].")");
			$countries = mysqli_query($conn, "SELECT country FROM countries WHERE id_c IN
		 															(SELECT id_c FROM film_country WHERE id_f = ".$film['id_f'].")");
			while($genre = mysqli_fetch_assoc($genres)){
				$genre_array[] = $genre['genre'];
			}
			while($country = mysqli_fetch_assoc($countries)){
				$country_array[] = $country['country'];
			}
			$film['genre']= $genre_array;
			$film['country']= $country_array;
			$film_array[]=$film;
			// echo var_dump($film_array);
			// echo "<hr>";
		}
	?>