<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Booking Details - Ferry Ticket Online Booking</title>
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
				<strong>THIS IS ADMIN PAGE</strong> 
			</section>
			<section class="main-content">
			<?php # Script 7.6 - view_users.php (2nd version after Script 7.4)
			// This script retrieves all the records from the users table.

			require_once ('mysqli_connect.php'); // Connect to the db.

			// Make the query.
			$query = "SELECT ferrybooking.booking_id, ferrybooking.depart_date, ferrybooking.journey, ferrybooking.depart_route, ferrybooking.dest_route, customer.customer_id, customer.f_name, customer.l_name 
			FROM ferrybooking
			INNER JOIN customer ON ferrybooking.customer_id = customer.customer_id
			ORDER BY booking_id ASC";

			$result = mysqli_query ($dbc, $query); // Run the query.
			$num = mysqli_num_rows ($result);

			if ($num > 0) { // If it ran OK, display the records.
				
				echo "<center><p>There are currently $num booking details.</p>\n</center>";
				
				// Table header.
				echo '<table align="center" cellspacing="0" cellpadding="5" style="font: 12px \'Lucida Sans Unicode\', Verdana, sans-serif;">
				<tr>
				<td align ="left"><b>Delete</b></td>
				<td align ="left"><b>Booking ID</b></td>
				<td align ="left"><b>Departure Date</br></td>
				<td align ="left"><b>Journey</br></td>
				<td align ="left"><b>Departure Route</br></td>
				<td align ="left"><b>Destination Route</br></td>
				<td align ="left"><b>Customer ID</br></td>
				<td align ="left"><b>First Name</br></td>
				<td align ="left"><b>Last Name</br></td>
				</tr>
				';
				
				// Fetch and print all the records.
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>
					<td align ="left"><a href= "delete_booking.php?id=' . $row['booking_id'] . '">Delete</a></td>
					<td align ="left">' . $row['booking_id'] . '</td>
					<td align ="left">' . $row['depart_date'] . '</td>
					<td align ="left">' . $row['journey'] . '</td>
					<td align ="left">' . $row['depart_route'] . '</td>
					<td align ="left">' . $row['dest_route'] . '</td>
					<td align ="left">' . $row['customer_id'] . '</td>
					<td align ="left">' . $row['f_name'] . '</td>
					<td align ="left">' . $row['l_name'] . '</td>
					</tr>
					';
				}
					
				echo '</table>';
				
				mysqli_free_result ($result); // Free up the resources.
			}

				else { // If it did not run OK.
				echo '<p class="error">There are currently no booking details.</p>';
				}
				
				mysqli_close($dbc);  // Close the database connection.
				
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