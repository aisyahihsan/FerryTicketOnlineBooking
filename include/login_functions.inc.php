<?php # Script 12.2 - login_functions.inc.php
// This page defines two functions used by the login/logout process.

/* This function determines an absolute URL and redirects the user there.
 * The function takes one argument: the page to be redirected to.
 * The argument defaults to index.php.
 */
function redirect_user ($page = 'index.php') {

	// Start defining the URL...
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// Remove any trailing slashes:
	$url = rtrim($url, '/\\');
	
	// Add the page:
	$url .= '/' . $page;
	
	// Redirect the user:
	header("Location: $url");
	exit(); // Quit the script.

} // End of redirect_user() function.


/* This function validates the form data (the email address and password).
 * If both are present, the database is queried.
 * The function requires a database connection.
 * The function returns an array of information, including:
 * - a TRUE/FALSE variable indicating success
 * - an array of either errors or the database result
 */
function check_login($dbc, $username = '', $pass = '') {

	$errors = array(); // Initialize error array.

	// Validate the username:
	if (empty($username)) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$u = mysqli_real_escape_string($dbc, trim($username));
	}

	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}

	if (empty($errors)) { // If everything's OK.
		//echo "$u";
		//echo "$p";
		// Retrieve the user_id and first_name for that username/password combination:
		$q = "SELECT admin_id, username FROM admin WHERE username='$u' AND password=SHA1('$p')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'The username and password entered do not match those on file.';
		}
		
	} // End of empty($errors) IF.
	
	// print_r($r);
	// Return false and the errors:
	return array(false, $errors);

} // End of check_login() function.