<?php
include('auth_session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		.display {
			margin-top: -35px;
			margin-left: 95%;
			color: white;
			font-style: bold;
		}
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Super Market</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet">


</head>

<body class="tm-gray-bg">
	<!-- Header -->
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
					<a href="#" class="tm-site-name">MAX-BAZZAR</a>
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="tm-nav">
						<ul>
							<li><a href="index.html" class="active">Home</a></li>
							<li><a href="contact.html">About</a></li>

							<li><a href="shop.php">Our products</a></li>


							<li><a href="logout.php">logout</a></li>
						</ul>
					</nav>
					<?php
					//session_start();
					if ($_SESSION['username']) {
						echo "<p class=display>" . $_SESSION['username'] . "</p>";
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
			<ul class="slides">
				<li>
					<div class="tm-banner-inner">
						<h1 class="tm-banner-title">Healthy<span class="tm-yellow-text">Food</span>Makes</h1>
						<p class="tm-banner-subtitle">healthy Life</p>

					</div>
					<img src="img/banner-3.jpg" alt="Image" />
				</li>
				<li>
					<div class="tm-banner-inner">
						<h1 class="tm-banner-title">Find <span class="tm-yellow-text">The Best</span> Place</h1>
						<p class="tm-banner-subtitle">Fresh Items</p>

					</div>
					<img src="img/ban1.jpg" height="665" width="1920">
				</li>
				<li>
					<div class="tm-banner-inner">
						<h1 class="tm-banner-title">We<span class="tm-yellow-text">Sell</span></h1>
						<p class="tm-banner-subtitle">Best Items Ever</p>

					</div>
					<img src="img/ban3.jpg" alt="Image" />
				</li>

			</ul>
		</div>
	</section>

	<!-- gray bg -->
	<section class="container tm-home-section-1" id="more">
		<div class="row">


			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
					<img src="img/veg1.jpg" alt="image" class="img-responsive">
					<a href="#">
						<div class="tm-green-gradient-bg tm-city-price-container">
							<span>Vegitables</span>
							<span>20% Off</span>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
					<img src="img/frt.jpg" alt="image" class="img-responsive">
					<a href="#">
						<div class="tm-red-gradient-bg tm-city-price-container">
							<span>Fruits</span>
							<span>2% Off</span>
						</div>
					</a>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
					<img src="img/dairy.jpeg" alt="image" class="img-responsive">
					<a href="#">
						<div class="tm-yellow-gradient-bg tm-city-price-container">
							<span>Dairy Products</span>
							<span>10% Off</span>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="section-margin-top">
			<div class="row">
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2 class="tm-section-title">Meat & Dairy products</h2>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/pou.jpg" alt="image" class="img-responsive">
						<h3><b>Poultry & beef</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/milk.jpg" alt="image" class="img-responsive">
						<h3><b>Dairy products</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/seafood.jpg" alt="image" class="img-responsive">
						<h3><b>sea Foods</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2 tm-home-box-2-right">
						<img src="img/pork.jpg" alt="image" class="img-responsive">
						<h3>Pork & Lamp</h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section-margin-top">
			<div class="row">
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2 class="tm-section-title">Vegitables & Fruites</h2>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/fruits.jpg" alt="image" class="img-responsive">
						<h3><b>Fruits</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/veg.jpg" alt="image" class="img-responsive">
						<h3><b>Vegitables</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2">
						<img src="img/leaves.jpg" alt="image" class="img-responsive">
						<h3><b>Leaves</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
					<div class="tm-home-box-2 tm-home-box-2-right">
						<img src="img/roots.jpg" alt="image" class="img-responsive">
						<h3><b>Roots</b></h3>
						<div class="tm-home-box-2-container">

						</div>
					</div>
				</div>
			</div>
		</div>




		<div class="section-margin-top">
			<div class="row">
				<div class="tm-section-header">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<hr>
					</div>




				</div>
			</div>
	</section>




	<!-- white bg -->

	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; teena </p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<!--
	<script src="js/froogaloop.js"></script>
	<script src="js/jquery.fitvid.js"></script>
-->
	<script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function(e) {
				e.preventDefault()
				$(this).tab('show')
			})

			$('.date').datetimepicker({
				format: 'MM/DD/YYYY'
			});
			$('.date-time').datetimepicker();

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
			$('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			});
		});

		// Load Flexslider when everything is loaded.
		$(window).load(function() {
			// Vimeo API nonsense





			//	For images only
			$('.flexslider').flexslider({
				controlNav: false
			});


		});
	</script>
</body>

</html>