<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Register - Ferry Ticket Online Booking</title>
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
				<h4><span>Register Your Account Here</span></h4>
			</section>			
			<section class="main-content">		
			<?php			
			// Check if the form has been submitted.
			if (isset($_POST['submitted'])) {
				
			require_once('mysqli_connect.php'); //Connect to db

				$errors = array(); // Initialize error array.
				
				// Check for a first name.
				if (empty ($_POST['f_name'])) {
					$errors[] = 'You forgot to enter your first name.' ;
				} else {
					$fn = $_POST['f_name'];
				}
				
				// Check for a last name.
				if (empty ($_POST['l_name'])) {
					$errors[] = 'You forgot to enter your last name.' ;
				} else {
					$ln = $_POST['l_name'];
				}
				
				// Check for a phone number.
				if (empty ($_POST['mobilehp'])) {
					$errors[] = 'You forgot to enter your phone number.' ;
				} else {
					$mh = $_POST['mobilehp'];
				}
				
				// Check for a username
				if (empty ($_POST['username'])) {
					$errors[] = 'You forgot to enter your username.';
				} else {
					$u = $_POST['username'];
				}
				
				// Check for a password and match against the confirmed password.
				if (!empty ($_POST['password1'])) {
					if ($_POST['password1'] != $_POST['password2']) {
						$errors[] = 'Your password did not match the confirmed password.';
					} else {
						$p = $_POST['password1'];
					}
				} else {
					$errors[] = 'You forgot to enter your password.';
				}
				
				if (empty($errors)) { // if everything's okay.
				
				// Register the user in the database.
				
				// Check for the previous registration.
				$query = "SELECT customer_id FROM customer WHERE username='$u'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows ($result) == 0) {
					
					// Make the query.
					$query = "INSERT INTO customer (f_name, l_name, mobilehp, username, password) VALUES ('$fn', '$ln', '$mh','$u', SHA1('$p'))";
					$result = mysqli_query ($dbc, $query); // Run the query.
					if ($result) { // If it ran OK.
						
						// Send an email, if desired.
						
						// Print a message.
						echo '<h1 id="mainhead">Thank you!</h1>
						<p>You are now registered. Please click Login to login!</p><p><br /></p>';
						
						// Include the footer and quit the script (to not show the form).
						include ('./includes/footer.php');
						exit();
						
								}
								
						} else { // Already registered.
						echo '<h1 id="mainhead">Error!</h1>
						<p class="error">The username has already been registered.</p>';
								}
				
				}else { // Report the errors.
				
				echo '<h1 id="mainhead">Error!</h1>
				<p class="error">The following error(s) occured:<br />';
				foreach ($errors as $msg) { // Print each error.
					echo " - $msg<br />\n";
				}
				echo '</p><p>Please try again.</p><p><br /></p>';
				} // End of if (empty($errors)) IF.
				
				mysqli_close($dbc); // Close the database connection.
				
			} // End of the main Submit conditional.
			?>

			<form action="register.php" method="post">
				<p>First Name: <input type="text" name="f_name" size="20" maxlength="15" value="<?php if (isset($_POST['f_name'])) echo $_POST['f_name']; ?>" /></p>
				<p>Last Name: <input type="text" name="l_name" size="20" maxlength="30" value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>" /></p>
				<p>Phone Number: <input type="text" name="mobilehp" size="20" maxlength="30" value="<?php if (isset($_POST['mobilehp'])) echo $_POST['mobilehp']; ?>" /></p>
				<p>Username: <input type="text" name="username" size="20" maxlength="40" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" /></p>
				<p>Password: <input type="password" name="password1" size="20" maxlength="20"  /></p>
				<p>Confirm Password: <input type="password" name="password2" size="20" maxlength="20"  /></p>
				<p><input type="submit" name="submit" value="Register"  /></p>	
				<input type="hidden" name="submitted" value="TRUE" />
			</form>
			</section>			
			<?php 
			include ("includes/footer.php");
			?>
		</div>
			
    </body>
</html>