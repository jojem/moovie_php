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
			<div class="circle-cont ">
				<img src="img/wiplash.jpg" alt="wiplash">
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
			<div class="info-cont">
				<div><h1>Whiplash</h1></div>
				<div class = "info__item"><span>year</span></div>
				<div class = "info__item"><span>genre</span></div>
				<div class = "info__item"><span>country</span></div>
			</div>
			<div id="images-section">
				<div class="image-container fade">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/zIP_gtjDtfE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
					$sql = "SELECT id_c, country FROM countries";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "id: " . $row["id_c"]. " - Country: " . $row["country"]. "<br>";
					    }
					} else {
					    echo "0 results";
					}
					$conn->close();
					?>


			</div>
		</div>
		<footer>
			<p>&copy By Jo, 2019</p>
		</footer>
	</div>

	<script src="js/index.js"></script>
</body>
</html>
