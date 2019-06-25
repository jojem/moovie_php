<?php
	session_start();
	include('includes/db_connect.php');
?>

<?php
	$films = mysqli_query($conn, "SELECT * FROM films ORDER BY id_f DESC");
?>

<html lang="en">
<head>
	<title>Moovie</title>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="Refresh" content="5" /> -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/colors.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/items.css">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Lato|Montserrat|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
</head>

<body>
	<?php
		include('navbar.php');
	?>

		<div class="owl-carousel owl-theme top-films baseline-items">
			<div class="item card">
				<div  class=" rectangle-cont top-item-1 front"><span>front 1</span></div>
				<div class=" rectangle-cont item-0 back"><a href="item-page.html">back 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quos, quibusdam expedita, reiciendis tempora, sapiente est, repellat aut reprehenderit aperiam molestias quaerat distinctio? Dolor, alias. Unde in nulla ut nemo?</a></div>
			</div>
			<div class="item card">
				<div class=" rectangle-cont top-item-2 front"><span>front 2</span></div>
				<div class=" rectangle-cont item-0 back"><a href="item-page.html">back 2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ipsa non quo delectus est, numquam voluptatum perspiciatis ullam voluptate esse repellendus nobis tempora soluta cum iusto sed minus rem quibusdam.</a></div>
			</div>
			<div class="item card">
				<div class=" rectangle-cont top-item-3 front"><span>front 3</span></div>
				<div class=" rectangle-cont item-0 back"><a href="item-page.html">back 3 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe enim sapiente quos numquam. Laudantium, tempore optio reprehenderit cumque magni blanditiis beatae. Aliquam, saepe quisquam sunt delectus quaerat similique ducimus provident.</a></div>
			</div>
			<div class="item card">
				<div class=" rectangle-cont top-item-4 front"><span>front 4</span></div>
				<div class=" rectangle-cont item-0 back"><a href="item-page.html">back 4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium adipisci reiciendis accusantium architecto temporibus, non beatae nihil, libero error. Distinctio quisquam magni et tenetur repellat, dolores deleniti reprehenderit saepe, numquam.</a></div>
			</div>
			<div class="item card">
				<div class=" rectangle-cont top-item-5 front"><span>front 5</span></div>
				<div class=" rectangle-cont item-0 back"><a href="item-page.html">back 5 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem consectetur asperiores sit temporibus odio dolorem cum in, fugit dolor repellat, nemo nihil beatae quam. Sint molestiae dolor voluptas ex, ipsam.</a></div>
			</div>
		</div>

		<div class="main-container">
			<?php
			//output circle images of films
				while($film = mysqli_fetch_assoc($films)){
					?>
					<div class="circle-cont ">
						<a href="generate-page.php?id=<?php echo $film['id_f'];?>">

							<img src="img/<?php echo $film['poster'];?>.jpg"
							 alt="<?php echo $film['poster'];?>">
						</a>
					</div>
					<?php
				}
			?>
		</div>
		<footer>
			<p>&copy By Jo, 2019</p>
		</footer>
	</div>

	<!-- <script src="js/index.js"></script> -->
	<script src="OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
	<script src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
	<script>
		$(document).ready(function(){
		var owl = $('.owl-carousel');
		owl.owlCarousel({
		items:4,
		loop:true,
		margin:10,
		nav:true,
		autoWidth:true,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:true
		});
		$('.play').on('click',function(){
			owl.trigger('play.owl.autoplay',[1000])
		});
			$('.stop').on('click',function(){
			owl.trigger('stop.owl.autoplay')
		});
	owl.on('mousewheel', '.owl-stage', function (e) {
		if (e.deltaY>0) {
				owl.trigger('next.owl');
		} else {
				owl.trigger('prev.owl');
		}
		e.preventDefault();
	});
})
</script>


</body>
</html>
