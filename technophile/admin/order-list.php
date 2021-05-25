<?php 
	include("../confs/config.php");
   include("../confs/auth.php");
		$orders=mysqli_query($conn,"SELECT * FROM orders");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin DashBoard</title>
	<link rel="icon" type="image/jpg" href="../img/tech.jpg"/>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../library/fontawesome/css/all.css"/>
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>	
</head>
<body>

		<nav class="navbar navbar-dark bg-info fixed-top flex-md-nowrap">
				<a class="navbar-brand" href="#">DashBoard</a>
				
		<ul class="nav">
  		<li class="nav-item">
      <a class="nav-link" href="cat-list.php">Category</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="item-list.php">Items</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="order-list.php">Orders</a>
      </li>
  		<li class="nav-item">
   		 <a class="nav-link" href="logout.php">Logout</a>
 		 </li>
		</ul>
		</nav>

		<!-- topbar -->

		<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-2 bg-light sidebar">
						<div class="left-sidebar">
								<ul class="nav flex-column">
  								<li class="nav-item">
    							<a class="nav-link" href="cat-list.php">
    					<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"/></svg>
    							Category
    							</a>
  								</li>
  								<li class="nav-item">
    							<a class="nav-link" href="item-list.php">
    					<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"/></svg>
    							Items</a>
  								</li>
  								<li class="nav-item">
   								 <a class="nav-link" href="order-list.php">
   						<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z"/></svg>
   								 Orders
   							</a>
						</ul>
						</div>
				</div>	
					 <main class="col-sm-9 col-md-9 col-lg-10 ml-sm-auto px-4">
					 	<h3>Order</h3>
					 	<hr>
				<div class="row">
							  <?php  $total=0;
							   while($order=mysqli_fetch_assoc($orders)): ?>
					<div class="col-md-4 col-lg-3">
				<ul class="list-group">
						<li class="list-group-item list-group-item-info">
							<?php echo $order['name'] ?>
              <a href="order-delete.php?id=<?php echo $order['id'] ?>" class="order">&times;</a>
						 </li>
  						<li class="list-group-item d-flex justify-content-between align-items-center">
    						<?php echo $order['email'] ?>
   						 
  						</li>
  						<li class="list-group-item d-flex justify-content-between align-items-center">
  							 <?php echo $order['phone'] ?>
  						</li>
  						<li class="list-group-item d-flex justify-content-between align-items-center">
    							<?php echo $order['address'] ?>
    					
  						</li>
  							 <?php 
                		$order_id=$order['id'];
                		$items=mysqli_query($conn,"SELECT order_items.*,items.itemname,items.price FROM order_items LEFT JOIN items ON order_items.item_id=items.id WHERE order_items.order_id=$order_id");
                			
                		   while($item = mysqli_fetch_assoc($items)):  

               				  ?>
  						<li class="list-group-item d-flex justify-content-between align-items-center">
  								<div class="dropdown">
  				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  									<?php echo $item['itemname'] ;
  									
  										
  									?>
  				</button>
    				 <div class="dropdown-menu" >
    <button class="dropdown-item" type="button"><?php echo $item['price']; ?>Kyats</button>
    
  </div>
				</div>		

    							
    					<span class="badge badge-primary badge-pill"><?php echo $item['qty'] 
    					?>	
    					</span>
  						</li>
  						<?php 	$total+=$item['price']*$item['qty']; ?>

  						<li class="list-group-item d-flex justify-content-between align-items-center">
    					 Price
   	 <span class="badge badge-primary badge-pill"><?php echo $item['price']*$item['qty'];  ?>Kyats</span>
  					</li>

  					<?php endwhile; ?>

  					<li class="list-group-item d-flex justify-content-between align-items-center">
    					Total Price
    <span class="badge badge-primary badge-pill"><?php echo $total; ?>Kyats</span>
  					</li>
				</ul>
					</div>
						<?php $total=0; ?>
						<?php endwhile; ?>

				</div>
   						
    
						
					 </main>

				</div>
		</div>

		
					
		<script src="../js/jquery.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../admin/js/jquery.dataTables.min.js"></script>
		<script src="../admin/js/main.js"></script>

</body>
</html>