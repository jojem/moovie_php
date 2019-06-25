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
		include('includes/film_array.php');
		include('navbar.php');
	?>
	</div>
	<div class="main-div">
		<div class="left-content">
				<?php
				if ($films->num_rows > 0) {
			    // output data of each row
			   foreach($film_array as $film) {
			    	?>
							<div class="circle-cont poster">
								<a href="generate-page.php?id=<?php echo $film['id_f'];?>">

									<img src="img/<?php echo $film['poster'];?>.jpg"
									 alt="<?php echo $film['poster'];?>">
								</a>
							</div> 
						<?php
					} 
				}
				?>
		</div>
		<div class="content">
			<?php
				echo "<h1>Film List</h1>";

				if ($films->num_rows > 0) {
				    // output data of each row
				    foreach($film_array as $film) {
				        echo "<br><div class = 'block'><h2>" . $film["id_f"]. ". ". $film["film_name"]."</h2><p>Year: " . $film["year"]."</p>"
				        ."<p>Rating: " . $film["rating"]."</p>"."<p>Runtime: " . $film["runtime"]." min</p>"
				        ."<p>Genre: " ;
				        echo implode(" | ", $film['genre']);
				        echo "</p><p>Country: " ;
				        echo implode(" | ", $film['country']);
				        echo "</p></div>" ;
				    }
				} else {
				    echo "0 films";
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
