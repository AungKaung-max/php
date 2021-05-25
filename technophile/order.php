<?php 
		session_start();
		if (!isset($_SESSION['cart'])) {
				header("location:index.php");
				exit();
		}
		include ("confs/config.php");

		$name=$_POST['ordername'];
		$email=$_POST['orderemail'];
		$phone=$_POST['orderphone'];
		$address=$_POST['address'];

		 mysqli_query($conn, "INSERT INTO orders (name, email, phone, address,created_date, modified_date)  
          VALUES ('$name','$email','$phone','$address',now(), now()) ");
           $order_id = mysqli_insert_id($conn);  

           foreach ($_SESSION['cart'] as $key => $value) {
           		mysqli_query($conn,"INSERT INTO order_items(item_id,order_id,qty)
           	VALUES($key,$order_id,$value)");
           }
            unset($_SESSION['cart']);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Order</title>
 		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="library/fontawesome/css/all.css"/>	
	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>			


 			<section class="std-section">

 					<div class="container">
 					<div class="alert alert-info" role="alert">
  					<h4 class="alert-heading">Order Submitted!</h4>
  					<p>Aww yeah, you successfully order.
  						We'll deliver the items soon.
  					</p>
  					<hr>
 				 <p class="mb-0">Thank You for purchasing from us.
 				 		Pls Support Us,
 				 		<a href="index.php">Technophile</a> 
 				 </p>
					</div>
					</div>
			</section>

					<section id="footer" class="std-section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-6">
						<h3>
							Technophile
						</h3>

						<div class="social">
							<h5>Follow Us On Social:</h1>
								<a href="#">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="#">
									<i class="fab fa-twitter"></i>
								</a>
								<a href="#">
									<i class="fab fa-instagram"></i>
								</a>
								<a href="#">
									<i class="fab fa-youtube"></i>
								</a>
								<a href="#">
									<i class="fab fa-pinterest-p"></i>
								</a>
						</div>
						</div>

						<div class="col-sm-12 col-md-2 col-lg-2">
							<div class="open">
								<h5>Opening Time</h5>
								<p>Mon-Fri:8AM-12PM</p>
								<p>Sat:9AM-8Pm</p>
								<p>Sun:Closed</p>
							</div>
						</div>

						<div class="col-sm-12 col-md-2 col-lg-2">
							<div class="open">
								<h5>My Account</h5>
								<p>My Account</p>
								<p>Wishlist</p>
								<p>OrderTracking</p>
							</div>
						</div>

						<div class="col-sm-12 col-md-2 col-lg-2">
							<div class="open">
								<h5>About Us</h5>
								<p>Shopping Guide</p>
								<p>Delivery Information</p>
								<p>Our Store</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-lg-6">
							<p class="copy">
								Copyright ©2020 <a href="#">Technophile..</a> All rights reserved.
							</p>
						</div>

						<div class="col-md-6 col-lg-6">
							<p class="policy">
								<span>Policy</span>
								<span>Questions</span>
								<span>Affiliate</span>
								<span>Help</span>
							</p>
						</div>
					</div>
				</div>
		</section>

						<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
 </body>
 </html>