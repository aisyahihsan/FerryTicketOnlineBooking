<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit Booking - Ferry Ticket Online Booking</title>
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
				<?php 
			echo '<h1>Edit Booking Details</h1>';

			// Check for a valid user ID, through GET or POST:
			if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
				$id = $_GET['id'];
			} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
				$id = $_POST['id'];
			} else { // No valid ID, kill the script.
				echo '<p class="error">This page has been accessed in error.</p>';
				include ('includes/footer.php'); 
				exit();
			}

			require ('mysqli_connect.php'); 

			// Check if the form has been submitted:
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$errors = array(); // Initialize an error array.
				
					
					// Check for depart date
					if (empty ($_POST['date'])) {
						$errors[] = 'You forgot to choose date.' ;
					} else {
						$date = $_POST['date'];
					}
					
					
					// Check for departure
					if (empty ($_POST['depart'])) {
						$errors[] = 'You forgot to choose your departure.' ;
					} else {
						$depart = $_POST['depart'];
					}	
					
					// Check for destination
					if (empty ($_POST['destination'])) {
						$errors[] = 'You forgot to choose your destination.' ;
					} else {
						$destination = $_POST['destination'];
					}	
					
					if (!empty ($_POST['depart']) && !empty ($_POST['destination']))
					{
						if ($_POST['depart'] == $_POST['destination'])
						{
							$errors[] = 'You cannot select the same place for departure and destination.' ;
						}
					}
					
						// Check for journey
						if (empty ($_POST['journey'])) {
							$errors[] = 'You forgot to choose your journey.' ;
						} else {
							$journey = $_POST['journey'];
						}
						
						$booking_id= $_POST['id'];
						if (empty($errors)) { // if everything's okay.
						
						//Test for unique id username:
						
						//Make the query 
						$q = "UPDATE ferrybooking SET depart_date='$date', journey='$journey', depart_route='$depart', dest_route='$destination' WHERE booking_id= $id LIMIT 1";
						$r = @mysqli_query($dbc,$q);
						if(mysqli_affected_rows($dbc) == 1) { //If it ran OK
						
						
						//Print a message :
						echo '<p>The booking has been edited.</p>';
						}
						else{
							echo '<p class="error">There are no any changes.</p>'; //Public message 
						}
						
						
						}else{ //Report the error
							echo'<p class="error">The following error(s) occured:<br />';
							foreach($errors as $msg) { //Print each error 
								echo" - $msg<br />\n";
							} 
							echo '</P><p>Please try again.</p>';
						}//End of if empty
						}//End of submit condition

			// Always show the form...

			// Retrieve the user's information:
			$q = "SELECT * FROM ferrybooking WHERE booking_id=$id";		
			$r = mysqli_query ($dbc, $q);

			if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

				// Get the user's information:
				$row2 = mysqli_fetch_array ($r, MYSQLI_ASSOC);
				
				// Create the form:
				// print_r ($row2);
				
			?>
				<form action="edit_booking.php" method="post">

					<input type="hidden" name="id" value="<?php echo $row2['booking_id']; ?>" />
					
					<p>Date: <input type="date" name="date" size="15" maxlength="40" value="<?php echo $row2['depart_date']; ?>" />
					
					<p>Departure: <?php
					$select_name="depart";
					$routeval = $row2['depart_route'];
					include ('./get_route.php');
					?></p>
					
					<p>Destination: <?php
					$select_name="destination";
					$routeval = $row2['dest_route'];
					include ('./get_route.php');
					?></p>
					
					 
					<p>Journey: </p>
					<p><input type="radio" name="journey" <?php if ($row2['journey']=="OneWay") {echo "checked";}?> value="OneWay"> One Way</p>
					<p><input type="radio" name="journey" <?php if ($row2['journey']=="Return") {echo "checked";}?> value="Return"> Return</p>
					

					<p><input type="submit" name="submit" value="Update Booking" /></p>
				</form>


			<?php

			} else { // Not a valid booking ID.
				echo '<p class="error">This page has been accessed in error.</p>';
			}

			mysqli_close($dbc);
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

