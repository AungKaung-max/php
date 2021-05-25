<?php 		
			session_start(); 
			include("confs/config.php");
			$cats=mysqli_query($conn,"SELECT * FROM categories");

			$cart=0;
			if(isset($_SESSION['cart']))
			{   
				foreach ($_SESSION['cart'] as $qty) {
					$cart=$cart+$qty;
				}
  			  } 

			if(isset($_GET['cat']))
			{
					$cat_id=$_GET['cat'];
				$items=mysqli_query($conn,"SELECT * FROM items WHERE category_id=$cat_id");	
			}
			else
			{
				$items=mysqli_query($conn,"SELECT * FROM items");
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
	<link rel="stylesheet" type="text/css" href="library/themify-icon/themify-icons.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gallery
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#gallery">Single Mask</a>
          <a class="dropdown-item" href="#gallery">Dual Mask</a>
          <a class="dropdown-item" href="#gallery">Omni Mask</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#shop">Shop</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="#service">Service</a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="#about">About Us</a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="#contact">Contact</a>
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
			<div class="col-6" data-aos="fade-right" data-aos-duration="2000">
				<div class="banner-caption">
				<div class="line-one">3D Printing Services
				</div>
				<div class="line-two">
				Welcome to Techonophile!
				</div>
				<a href="#shop">Shop Now</a>
		</div>
			</div>
			<div class="col-6" data-aos="fade-left" data-aos-duration="2000">
		<div class="banner">
			<img src="img/service.png" alt="image">
		</div>
			</div>
		</div>
		</div>
		<!-- end banner -->



		<section  id="gallery" class="std-section">
				<div class="container">
					<h2 class="std-title">Gallery</h2>
					<div class="blog">
							Our Gallery!
					</div>

					
							
					<div class="row">
							<div class="col-md-4" data-aos="fade-up-right" data-aos-duration="2000">
								<div class="img-holder">
									<img src="img/photo.jpg" alt="image">
									<div class="overlay">
										<h4>Single Mask</h4>
									</div>
								</div>
							</div>

							<div class="col-md-8" data-aos="fade-up-left" data-aos-duration="2000">
								<div class="img-holder">
							<img src="img/dual.jpg" alt="image" class="img-2">
									<div class="overlay">
									</div>
								</div>
							</div>	
					</div>
						
						<div class="row">
								<div class="col-md-4" data-aos="fade-up-right" data-aos-duration="2000">
										<div class="img-holder">
								<img src="img/oni.jpg" alt="image" class="img-2">
									<div class="overlay">
										<h4>Omni Mask</h4>
									</div>
								</div>
								</div>

								<div class="col-md-4" data-aos="fade-up-left" data-aos-duration="2000">
										<div class="img-holder">
								<img src="img/car2.jpg" alt="image" class="img-2">
									<div class="overlay">
										
									</div>
								</div>
								</div>

								<div class="col-md-4" data-aos="fade-down-left" data-aos-duration="2000">
										<div class="img-holder">
								<img src="img/car1.jpg" alt="image" class="img-2">
									<div class="overlay">
										<h4>BNN66D</h4>
									</div>
								</div>
								</div>
						</div>


				</div>
		</section>


		<section id="shop" class="std-section">
				<div class="container">
					<h2 class="std-title">Shop</h2>
					<div class="blog">
						Let's go shopping!
					</div>
					
					<div class="item-menu">
						<ul class="nav justify-content-center"  id="nav">
							<li class="nav-item">
								<a href="index.php" class="nav-link">All</a>
							</li>
								<?php while ($row=mysqli_fetch_assoc($cats)):?>
  							<li class="nav-item">
    						<a class="nav-link" href="index.php?cat=<?php echo $row['id'] ?>"
    						>
    						<?php echo $row['name'] ?></a>
  							</li>
  							<?php endwhile; ?>
						</ul>	
					</div>

					<div class="row">
						<?php while ($row=mysqli_fetch_assoc($items)) :?>
						<div class="col-sm-6 col-md-6 col-lg-4 col-xl-3" style="margin-top: 20px" data-aos="flip-up" data-aos-duration="2000">
							<div class="items">
								<div class="item-image">
								<img src="admin/photo/<?php echo $row['photo'] ?>">	
								</div>
								<div class="item-content">
									<sapn class="item-title">
										<?php echo $row['itemname'] ?>
									</span>
									<span class="item-price">
										<?php echo $row['price'] ?>Kyats
									</span>

									<div class="add">
										<div class="label">
										<span>Technophile</span>
										</div>
										<div class="add-to-card">
										<i class="fas fa-shopping-bag"></i>
										<a href="add-to-card.php?id=<?php echo $row['id'] ?>">
										Add to cart
									</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
		</section>

		<!-- end shop ---------------------------------------------->

		<section id="service" class="std-section">
				<div class="container">
					<h2 class="std-title">Service</h2>
					<div class="blog">
						Check Our Service!
					</div>

						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-3" data-aos="zoom-in-left"
							data-aos-duration="2000">
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

							<div class="col-sm-12 col-md-6 col-lg-3" data-aos="zoom-in-right"
							data-aos-duration="2000">
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

							<div class="col-sm-12 col-md-6 col-lg-3" data-aos="zoom-in-left"
							data-aos-duration="2000">
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

							<div class="col-sm-12 col-md-6 col-lg-3" data-aos="zoom-in-right"
							data-aos-duration="2000">
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

		<section id="about" class="std-section">
				<div class="container">
						<h2 class="std-title">About Us</h2>
						<div class="blog">
							Quality is our priority!
						</div>
						<div class="row" style="margin-top: 70px;">
							
							<div class="col-sm-12 col-md-12 col-lg-4" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
								<img src="img/twr.jpg" alt="human">	
							</div>
							<div class="col-sm-12 col-md-12 col-lg-8" data-aos="flip-right"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
									<h3>Welcome to <span>Technophile</span> Store</h3>
									<p>
										This is our Technophile Page.
										In this page,we sell chains,masks,
										robotic arms,legs,heads,etc.
										Moreover,we can make products as the customers'
										wishes.In conclusion,
										our products are reliable,good quality and
										we make products as possible as we can
										before customer's deadline.
									</p>
									<a href="#shop">Shop Now!</a>
							</div>
						
						</div>
				</div>
		</section>

		<section class="std-section" id="team">
					<div class="container">
						<h2>Team</h3>
					<div class="row">
						<div class="col-sm-12 col-md-4 col-md-4" data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
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

						<div class="col-sm-12 col-md-4 col-md-4" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1800">
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

						
						<div class="col-sm-12 col-md-4 col-md-4" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
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

		<section id="contact" class="std-section">
					<div class="container">
					<h2 class="std-title">Contact</h2>
					<div class="blog">
						Here is our contact and address!
					</div>
					
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-3 con">
						 <div class="contact-text">
						 	<i class="fas fa-map-marked-alt"></i>
						 	<h4>Address</h4>
						 	<p>11/A South Horse Race Roard,Tarmwe.</p>
						 </div>
						</div>

						<div class="col-sm-12 col-md-6 col-lg-3 con">
						 <div class="contact-text">
						 	<i class="fas fa-mobile-alt"></i>
						 	<h4>Phone</h4>
						 	<p>+959 265542754.<br>
						 		+959 890060030.
						 	</p>

						 </div>
						</div>

						<div class="col-sm-12 col-md-6 col-lg-3 con">
						 <div class="contact-text">
						 	<i class="far fa-clock"></i>
						 	<h4>Opening Hour</h4>
						 	<p>
						 		24 hours<br>
						 		Available.
						 	</p>
						 </div>
						</div>

						<div class="col-sm-12 col-md-6 col-lg-3 con">
						 <div class="contact-text">
						 	<i class="far fa-envelope"></i>
						 	<h4>Email</h4>
						 	<p>
						 		Technophile<br>@gmail.com
						 	</p>
						 </div>
						</div>
					</div>

						<h4>
							Get In Touch
						</h4>
						<div class="contact-form">
							<form>
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6">
										<input type="text" name="name" placeholder="Name">
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<input type="email" name="email" placeholder="Email">
									</div>

									<div class="col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="subject" placeholder="Subject">
									</div>


									<div class="col-sm-12 col-md-12 col-lg-12">
										<textarea placeholder="Your Message"></textarea>
									</div>

									<div class="col-sm-12 col-md-12 col-lg-12">
										<input type="submit" name="submit" value="Send Message">
									</div>
								</div>
							</form>
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

		<button type="button" onclick="topFunction()" id="mybtn">
					<i class="ti-angle-up"></i>
		</button>



		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script type="text/javascript">
			AOS.init();
		</script>
</body>
</html>