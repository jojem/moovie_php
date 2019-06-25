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
		include('includes/film_array.php');
		include('includes/navbar.php');
	?>
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
