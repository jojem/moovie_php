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
				$get_film_name = $_POST['film_name'];
				$get_year = $_POST['year'];
				$get_country = $_POST['country'];
				$get_runtime = $_POST['runtime'];
				$get_rating = $_POST['rating'];
				$get_description = htmlspecialchars($_POST['description']);
				$get_storyline = htmlspecialchars($_POST['storyline']);
				$get_taglines = htmlspecialchars($_POST['taglines']);
				$get_poster = $_POST['poster'];

				// echo $get_film_name. "<hr>".
				// $get_year.	"<hr>".
				// $get_country."<hr>".
				// $get_runtime."<hr>".
				// $get_rating ."<hr>".
				// $get_description."<hr>".
				// $get_storyline ."<hr>".
				// $get_taglines."<hr>".
				// $get_poster ;

				
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