<?php # Script 7 - branch.php
// This script retrieves all the records from the users table.

require_once ('mysqli_connect.php'); // Connect to the db.

// Make the query.
$query = "SELECT * FROM route";
$result = mysqli_query ($dbc, $query); // Run the query.
$num = mysqli_num_rows ($result);

// print_r($result);

if ($num > 0) { // If it ran OK, display the records.
	
	echo '<select name="'.$select_name.'"> ';
	echo '<option value=""> Select route </option>';
	
	// Fetch and print all the records.
	while ($row = mysqli_fetch_assoc($result)) {
		if($routeval == $row['name'])
		{
			echo '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';
		}
		
		else{
			echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
		}
	}
		
	echo '</select>';
	
	mysqli_free_result ($result); // Free up the resources.
}

	else { // If it did not run OK.
	// echo '<p class="error">There are currently no registered users.</p>';
	}
	
	//mysqli_close($dbc);  // Close the database connection.