<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Ferry Ticket Online Booking</title>
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
				<strong>Ferry Ticket Online Booking by Ferry Langkawi</strong> offers selection of ferry tickets online booking at the best prices in Langkawi. 
				<br/>We are proud to offer a vast selection of ferry tickets taking you to your favourite island nearby for business and for leisure.
				<br/> Welcome! You are required to register an account in order to buy ticket, kindly click at the register link at the top right corner. 
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
													
						</div>
						<br/>
						
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="themes/images/feature_img_2.jpg" alt="" />
										<h4><strong>Make your way to the wonderful island</strong></h4>
										<p>You’re spoilt of choices here! We have an increasing number of ferry operators in Malaysia, including Blue Water Express, De Penarik Beach Ferry, Sejahtera Ferry and many more. 
										The respective ferry route takes just a few hours from one place to the other. Time flies when you enjoy the beautiful sea view on the safe journey.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.jpg" alt="" />
										<h4><strong>Get your ferry ticket in 5 minutes!</strong></h4>
										<p>Search and book ferry tickets to wherever you want in just 5 minutes. Yes, indeed it’s as easy as pie. All you need to do is pick your departing and arrival destination, date and journey. 
										Select your preferred ferry trip and timing according to your desired location and hit on the next button.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.jpg" alt="" />
										<h4><strong>Embark on your ship today!</strong></h4>
										<p>Ferry Langkawi implements crystal clear and secure methods of ferry online booking in the travel industry. 
										We are there to serve you as our perfect travel companion, hurry up and browse through our selection of ferry routes in Malaysia, via your smart-phone or laptop and embark on your ship today.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section>
			
			<?php 
			include ("includes/footer.php");
			?>
		</div>
		
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