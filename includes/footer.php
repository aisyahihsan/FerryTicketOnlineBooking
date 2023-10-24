			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
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
					
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<h4><a href="./admin_login.php"><strong>ADMIN ONLY</strong></a></h4>
						<p>Ferry Ticket Online Booking by Ferry Langkawi offers selection of ferry tickets online booking at the best prices in Langkawi. We are proud to offer a vast selection of ferry tickets taking you to your favourite island
						nearby for business and for leisure.</p>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2021 Nur Aisyah Binti Mohamad Ihsan - All right reserved.</span>
			</section>
			<script src="themes/js/common.js"></script>
			<script src="themes/js/jquery.flexslider-min.js"></script>