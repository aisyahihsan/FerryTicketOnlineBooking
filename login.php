<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login - Ferry Ticket Online Booking</title>
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
					<a href="index.php" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
					
				</div>
			</section>			
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Login Your Account Here</span></h4>
			</section>			
			<section class="main-content">		
			<?php
			// This page processes the login form submission.
			// The script now uses sessions.

			// Check if the form has been submitted"
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				// Need two helper files:
				require ('includes/login_functions.inc.php');
				require ('mysqli_connect.php');
				
				// Check the login:
				list ($check, $data) = check_login($dbc, $_REQUEST['username'], $_REQUEST['pass']);
				
				if ($check) { // OK!
				
				 // Set the session data:
				 session_start();
				 $_SESSION['customer_id'] = $data['customer_id'];
				 $_SESSION['username'] = $data['username'];
				 $_SESSION['f_name'] = $data['f_name'];
				 
				 // Redirect:
				 redirect_user('loggedin.php');
				 
				} else{ // Unsuccessful!
					
					// Assign $data to $errors for login_page.inc.php:
					$errors = $data;
				}
				
				mysqli_close($dbc); // Close the database connection.
				
			} // End of the main submit conditional.

			// Create the page:
			include ('includes/login_page.inc.php');
			?>
			</section>			
			<?php 
			include ("includes/footer.php");
			?>
		</div>
			
    </body>
</html>