		<?php 
		session_start();
		?>
		<div id="top-bar" class="container">
			<div class="row">
				
				<div class="span12">
					<div class="account pull-right">
						<ul class="user-menu">
						<?php
						 // Create a login/logout link:
						if (isset($_SESSION['customer_id'])) {
							echo '
							<li><a href="index.php">Homepage</a></li>							
							<li><a href="booking.php">Book Here</a></li>					
							<li><a href="view_book.php">View Booking</a></li>
							<li><a href="logout.php">Logout</a></li>';
						} else if (isset($_SESSION['admin_id'])){
							echo '
							<li><a href="index.php">Homepage</a></li>							
							<li><a href="booking_details.php">Booking Details</a></li>					
							<li><a href="logout_admin.php">Logout</a></li>';
							
						}
						else {
							echo '
							<li><a href="index.php">Homepage</a></li>							
							<li><a href="register.php">Register</a></li>					
							<li><a href="login.php">Login</a></li>';
						}
						?>
									
						</ul>
					</div>
				</div>
			</div>
		</div>