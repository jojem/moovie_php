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
		include('includes/db_connect.php');
		include('includes/film_array.php');

		include('navbar.php');

		$films = mysqli_query($conn, "SELECT * FROM films WHERE id_f = " . $_GET['id']);
		$film = mysqli_fetch_assoc($films);
	?>
	<div class="main-div">
		<div class="left-content">
			<div class="circle-cont sticky-poster">
				<img src="img/<?php echo $film['poster'];?>.jpg"
							 alt="<?php echo $film['poster'];?>">
			</div>
			<div class="film-stock">
				<div class="slide-buttons">
					<button id="previous_slide_btn" onClick="plusSlides(-1)">&#10094;</button>
					<button id="next_slide_btn" onClick="plusSlides(1)">&#10095;</button>
				</div>
				<div class="film-stock__elements">
					<button id="show_film_stock_btn"
					 type= "button" onClick="showImageSection()">
					 </button>
					<div id="film_stock_triangle"></div>
				</div>
			</div>
		</div>
		<div class="content">
			<div id="info-cont" class="info-cont">
				<div class="info-cont">
					<div>
						<h1>
							<?php
								echo $film['film_name'];
							?>
						</h1>
					</div>
						<?php
								//year output
								echo "<div class = 'info__item'>
								<span>year:</span> " .$film['year']."</div>";

								//rating output
								echo "<div class = 'info__item'>
								<span>rating:</span> " .$film['rating']."</div>";

								//genre output
								echo "<div class = 'info__item'><span>genre:</span> ";
								$i = 0;
								while($genre = mysqli_fetch_assoc($genres)){
									$i++;
									echo $genre['genre'];
									if ( mysqli_num_rows($genres) != $i){
										echo " | ";
									}
								}
								echo "</div>";

								//country output
								echo "<div class = 'info__item'><span>country:</span> ";
								$i = 0;
								while($country = mysqli_fetch_assoc($countries)){
									$i++;
									echo $country['country'];
									if ( mysqli_num_rows($countries) != $i){
										echo " | ";
									}
								}
								echo "</div>";

								//tagline output
								echo "<div class = 'info__item'>
								<span>tagline:</span> " .$film['taglines']."</div>";

								//runtime output
								echo "<div class = 'info__item'>
								<span>runtime:</span> " .$film['runtime']." min</div>";
						?>
				</div>
				<!-- here will generate content -->
				<?php
					
				?>
			</div>
			<div id="images-section">
				<div class="image-container fade">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/GmqdPdCC5CQ" ></iframe>
				</div>
				<div class="image-container fade">
					<img class="image-item" src="img/nature9.jpg" alt="nature">					
				</div>
				<div class="image-container fade">
					<img class="image-item" src="img/nature6.jpg" alt="nature">
				</div>
				<div class="image-container fade">
					<img class="image-item" src="img/nature7.jpg" alt="nature">				
				</div>
				<div class="image-container fade">
					<img class="image-item" src="img/nature8.jpg" alt="nature">
				</div>
			</div>
			<div class="text-section">
				<?php
					echo "<h2>Description</h2><p>" .$film['description']."</p>";
					echo "<h2>Storyline</h2><p>" .$film['storyline']."</p>";
				?>

			
			</div>
		</div>
		<footer>
			<p>&copy By Jo, 2019</p>
		</footer>
	</div>

	<script src="js/index.js"></script>
	<script src="js/elements.js"></script>
</body>
</html>
