<?php
	$first_name="";
	$last_name="";
	$mobilehp="";

	if (isset($_SESSION['customer_id'])) {
		$customer_id= $_SESSION['customer_id'];
		
		// Make the query.
		$query = "SELECT * FROM customer WHERE customer_id=$customer_id  LIMIT 1";
		$result = mysqli_query ($dbc, $query); // Run the query.
		$num = mysqli_num_rows ($result);
		
		if($num==1)
		{
			$row = mysqli_fetch_assoc($result);
			$first_name= $row['f_name'];
			$last_name= $row['l_name'];
			$mobilehp= $row['mobilehp'];
		}
	}

?>