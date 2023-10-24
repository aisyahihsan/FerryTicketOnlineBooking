<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Logged in - Ferry Ticket Online Booking</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
			<?php 
			include ("includes/header.php");
			?>
		
	</head>
    <body>		
			<?php 
			include ("includes/navigation.php");
			?>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
						</li>
						
					</ul>
				</div>			
			</section>
			<section class="header_text">
				<strong>Welcome to Ferry Ticket Online Booking by Ferry Langkawi</strong> 
			</section>
			<section class="main-content">
				<?php # Script 12.9 - loggedin.php #2
				// The user is redirected here from login.php.

				//session_start(); // Start the session.

				// If no session value is present, redirect the user:
				if (!isset($_SESSION['username'])) {
					
					// Need the functions:
					require ('includes/login_functions.inc.php');
					redirect_user();
				}

				// Set the page title:
				$page_title = 'Logged In!';

				// Print a customized message:
				echo "<h1>Logged In!</h1>
				<h2>You are now logged in, {$_SESSION['f_name']}!</h2>";
				//<p><a href=\"logout.php\">Logout</a></p>";

				?>
			</section>
			
			<?php 
			include ("includes/footer.php");
			?>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>

