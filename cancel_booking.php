<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cancel Booking - Ferry Ticket Online Booking</title>
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
				
			echo '<h2>Cancel a Booking</h2>';

			// Check for a valid user ID, through GET or POST:
			if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From booking_details.php
				$id = $_GET['id'];
			} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
				$id = $_POST['id'];
			} else { // No valid ID, kill the script.
				echo '<p class="error">This page has been accessed in error.</p>';
				include ('includes/footer.html'); 
				exit();
			}

			require ('mysqli_connect.php');

			// Check if the form has been submitted:
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if ($_POST['sure'] == 'Yes') { // Delete the record.

					// Make the query:
					$q = "DELETE FROM ferrybooking WHERE booking_id=$id LIMIT 1";		
					$r = @mysqli_query ($dbc, $q);
					if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

						// Print a message:
						echo '<h4>The booking details has been CANCELLED.</h4>';	

					} else { // If the query did not run OK.
						echo '<p class="error">The booking details could not be cancelled due to a system error.</p>'; // Public message.
						echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
					}
				
				} else { // No confirmation of deletion.
					echo '<h4>The booking details is NOT cancelled.</h4>';	
				}

			} else { // Show the form.

				// Retrieve the user's information:
				$q = "SELECT ferrybooking.booking_id, ferrybooking.depart_date, ferrybooking.journey, ferrybooking.depart_route, ferrybooking.dest_route, 
				customer.customer_id
				FROM ferrybooking
				INNER JOIN customer ON ferrybooking.customer_id = customer.customer_id
				WHERE booking_id=$id";
				$r = @mysqli_query ($dbc, $q);

				if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

					// Get the user's information:
					$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
					
					$booking_id = $row['booking_id'];
					$depart_date = $row['depart_date'];
					$journey = $row['journey'];
					$depart_route = $row['depart_route'];
					$dest_route = $row['dest_route'];

					// Display the record being deleted:
					echo "<br>
					<h5>Booking ID: $booking_id</h5>
					<h5>Departure Date: $depart_date</h5>
					<h5>Journey: $journey</h5>
					<h5>Departure Route: $depart_route</h5>
					<h5>Destination Route: $dest_route</h5>
					<br>
					<h4>Are you sure you want to delete this booking details?</h4>";
					
					// Create the form:
					echo '<form action="cancel_booking.php" method="post">
				<input type="radio" name="sure" value="Yes" /> Yes 
				<input type="radio" name="sure" value="No" checked="checked" /> No
				<input type="submit" name="submit" value="Submit" />
				<input type="hidden" name="id" value="' . $id . '" />
				</form>';
				
				} else { // Not a valid booking ID.
					echo '<p class="error">This page has been accessed in error.</p>';
				}

			} // End of the main submission conditional.

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

