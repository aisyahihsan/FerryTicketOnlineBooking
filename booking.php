<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Book Here - Ferry Ticket Online Booking</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
			<?php 
			include ("includes/header.php");
			?>
		
	</head>
    <body>		
			<?php 
			require_once('mysqli_connect.php'); //Connect to db
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
						// Check if the form has been submitted.
			if (isset($_POST['submit'])) {
			
			//print_r($_POST);
				
				$errors = array(); // Initialize error array.
				
					
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
					
					$cust_id= $_POST['customer_id'];
					if (empty($errors)) { // if everything's okay.

						// Make the query.
						// save to booking database first
						$query = "INSERT INTO ferrybooking (depart_date, journey, depart_route, dest_route, customer_id) VALUES ('$date', '$journey', '$depart', '$destination', '$cust_id')";
						$result = mysqli_query ($dbc, $query); // Run the query.
						if ($result) { // If it ran OK.
						
						echo '<h1> Your booking has been successful! </h1>';
						}
									
					
					}else { // Report the errors.
					
					echo '<h1 id="mainhead">Error!</h1>
					<p class="error">The following error(s) occured:<br />';
					foreach ($errors as $msg) { // Print each error.
						echo " - $msg<br />\n";
					}
					echo '</p><p>Please try again.</p><p><br /></p>';
						}
					
				}
				
				include ("/getcustomer_data.php");
				?>
				<form action = "booking.php" method="post">
				<fieldset><legend><b>Fill the form</b></legend>
				
				<input name="customer_id" value="<?php echo $customer_id;?>" hidden>
				<tr>
				<td><b>Name: </b></td>
				<td><input disabled type="text" name="f_name" size="20" maxlength="40" value="<?php echo $first_name;?>"></td>
				<td><input disabled type="text" name="l_name" size="20" maxlength="40" value="<?php echo $last_name;?>"></td></tr>
				<br>First Name and Last Name
				</td></tr><br></br>
				
				<tr>
				<td><b>Mobile Phone: </b></td>
				<td><input disabled type="text" name="mobilehp" size="20" maxlength="40" value="<?php echo $mobilehp;?>">
				</td></tr><br></br>
				
				<tr>
				<td><b>Date: </b></td>
				<td><input type="date" name="date">
				</td></tr><br></br>
			
				<tr><td><b>Departure: </b>
				<?php
				$select_name="depart";
				include ('./route.php');
				?></td></tr><br></br>
				
				<tr><td><b>Destination: </b>
				<?php
				$select_name="destination";
				include ('./route.php');
				?></td></tr><br></br>
				
				<tr>
				<td><b>Journey: </b>
				<p><input type="radio" name="journey" value="OneWay"> One Way</p>
				<p><input type="radio" name="journey" value="Return"> Return</p>
				</td>
				</tr>
						
				<tr><td>
				<br><input type="submit" name="submit" value="Submit">
				<br>
				</td></tr>
			
				</table>
			</fieldset>	
			</form>
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

