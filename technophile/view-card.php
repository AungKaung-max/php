<?php session_start();
			include("confs/config.php");

		$cart=0;
			if(isset($_SESSION['cart']))
			{   
				foreach ($_SESSION['cart'] as $qty) {
					$cart=$cart+$qty;
				}
  			  } 

		if (!isset($_SESSION['cart'])) {
				header("location:index.php");
				exit();
		}

		if(isset($_GET['remove']))
			{
					$remove_id=$_GET['remove'];
					unset($_SESSION['cart'][$remove_id]);
					header("location:view-card.php");
			}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Technophile</title>
	<link rel="icon" type="image/jpg" href="img/tech.jpg"/>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="library/fontawesome/css/all.css"/>	
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#">

  Technophile
	</a>
  	
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-lg-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
       <li class="nav-item active">
        <a class="nav-link" href="#service">Service</a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="#team">About Us</a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="#footer">Contact</a>
      </li>
    
    </ul>
    	

    	<div class="card">
    		<a href="view-card.php">
    		<i class="fas fa-cart-plus">
    		<sup>
    			<?php if ($cart!=0) {echo $cart; }?>	
    		</sup>
    		</i>
    		</a>
    		</div>
  </div>
</nav>
<!-- end navbar -->
		
		<div class="container">
		<div class="row">
			<div class="col-6 ">
				<div class="banner-caption">
				<div class="line-one">3D Printing Services
				</div>
				<div class="line-two">
				Welcome to Techonophile!
				</div>
				<a href="index.php">Shop Now</a>
		</div>
			</div>
			<div class="col-6">
		<div class="banner">
			<img src="img/service.png" alt="image">
		</div>
			</div>
		</div>
		</div>
		<!-- end banner -->

<section class="std-section" id="cart">
					<div class="container">
						<h1>Shopping Cart</h1>
							<table class="table">
  	<thead class="header">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  				$total=0;
  				$num=1;
  				foreach ($_SESSION['cart'] as $id=> $value) :
  					$result=mysqli_query($conn,"SELECT id,itemname,price,photo FROM items WHERE id=$id");
  					$row=mysqli_fetch_assoc($result);
  					$total+=$row['price']*$value;
  				
  	 ?>
    <tr>
    <th scope="row"><?php echo $num ?></th>
      <td>
      			<img src="admin/photo/<?php echo $row['photo'] ?>">
      			<span><a href="view-card.php?remove=<?php echo $row['id']?>">&times;remove</a>
      			</span>

      </td>
      <td class="name"><?php echo $row['itemname'] ?>
      		<div><?php echo $row['price'] ?>Kyats</div>
      </td>
      	<td class="name">
      			<?php echo $value ?><br>
      	</td>
    	<td class="total">
    		<?php echo $row['price']*$value ?>Kyats
    	</td>
    </tr>
    	<?php
    	$num++;
    	 endforeach; ?>
    	

    	<tr>
    		<td colspan="2" class="clear"><a href="clear-cart.php">&times;Clear Cart</a>
    			<a href="index.php">Continue Shopping <i class="fas fa-long-arrow-alt-right"></i></a>
    		</td>
    		<td colspan="2" class="subtotal" align="right">SubTotal</td>
    		<td class="subtotal"><?php echo $total ?>Kyats<br>

							
				<button type="button" class="btn btn-info" data-toggle="modal"
				 data-target="#exampleModal" style="margin-top: 30px;" 
				>Order Now</button>
							


    			
    		</td>
    	</tr>
  </tbody>
							</table>

					</div>
</section>
		
		<div class="modal" tabindex="-1" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        		<form action="order.php" method="post">
  <div class="form-group">
    <label for="ordername">Name</label>
    <input type="text" class="form-control" id="ordername" name="ordername" required>
  </div>

  <div class="form-group">
    <label for="orderemail">Email</label>
    <input type="email" class="form-control" id="orderemail" name="orderemail" required>
  </div>
  
  <div class="form-group">
    <label for="orderphone">Phone</label>
    <input type="text" class="form-control" id="orderphone" name="orderphone"  required>
     <small class="form-text text-muted">We'll contact your number soon.</small>
  </div>
 	
 	<div class="form-group">
    <label for="textarea">Address</label>
    <textarea class="form-control" id="textarea" rows="3" name="address"  required></textarea>
  </div>

  <button type="submit" class="btn btn-info">Order Now</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		

		<section id="service" class="std-section">
				<div class="container">
					<h2 class="std-title">Service</h2>
					<div class="blog">
						Check Our Service!
					</div>

						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-3">
								<div class="box">
									<div class="icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h5>Shipping</h5>
										<p>
											We have delivery service
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-3">
								<div class="box">
									<div class="icon">
										<i class="fas fa-gift"></i>
									</div>
									<div class="content">
										<h5>Valuable Gifts</h5>
										<p>
											Free gift for customer
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-3">
								<div class="box">
									<div class="icon">
										<i class="fas fa-tags"></i>
									</div>
									<div class="content">
										<h5>All Day Support</h5>
										<p>
											Call Us +959 265542754
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-3">
								<div class="box">
									<div class="icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h5>Seasonal Sale</h5>
										<p>
											Discounts up to 10% all
										</p>
									</div>
								</div>
							</div>
						</div>
				</div>
		</section>


		<section class="std-section" id="team">
					<div class="container">
						<h2>Team</h3>
					<div class="row">
						<div class="col-sm-12 col-md-4 col-md-4">
							<div class="team-box">
								<div class="team-img">
									<img src="img/boy1.png" alt="img">
								</div>
								<div class="team-body">
									<h4 class="team-name">Si Thu Ye Htun</h4>
									<p class="team-text">
										Founder at Technophile
									</p>
								</div>
								<div class="team-social">
									<li class="item">
									<a href="#">
										<i class="fab fa-facebook-f"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-twitter"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-skype"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fas fa-phone"></i>
									</a>
									</li>
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-md-4 col-md-4">
							<div class="team-box">
								<div class="team-img">
									<img src="img/boy2.png" alt="img">
								</div>
								<div class="team-body">
									<h4 class="team-name">Thu Ta Aung</h4>
									<p class="team-text">
										Co-Founder at Technophile
									</p>
								</div>
								<div class="team-social">
									<li class="item">
									<a href="#">
										<i class="fab fa-facebook-f"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-twitter"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-skype"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fas fa-phone"></i>
									</a>
									</li>
								</div>
							</div>
						</div>

						
						<div class="col-sm-12 col-md-4 col-md-4">
							<div class="team-box">
								<div class="team-img">
									<img src="img/boy3.png" alt="img">
								</div>
								<div class="team-body">
									<h4 class="team-name">Aung Kaung Myat Htun</h4>
									<p class="team-text">
										Web Developer
									</p>
								</div>
								<div class="team-social">
									<li class="item">
									<a href="#">
										<i class="fab fa-facebook-f"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-twitter"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fab fa-skype"></i>
									</a>
									</li>
									<li class="item">
									<a href="#">
										<i class="fas fa-phone"></i>
									</a>
									</li>
								</div>
							</div>
						</div>

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