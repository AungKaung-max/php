<?php 
	include("../confs/config.php");
	 include("../confs/auth.php");
	$result=mysqli_query($conn,"SELECT * from categories");
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
				<div class="row side">
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
					 	<h3>Category</h3>
					 	<hr>
						
						<form action="cat-add.php" method="post">
  						<div class="form-group">
   						 <label for="catname">Category Name</label>
   						 <input type="text" class="form-control" id="catname" placeholder="Enter Category Name" name="catname" required>
 						 </div>
  						<button type="submit" class="btn btn-info">Add Category
  						</button>
						</form>
						
						<h3 class="catlist">Category List</h3>	
						<hr>

							<div class="row">
								<?php while($row=mysqli_fetch_assoc($result)): ?>
								<div class="col-3">
							<div class="catname">
							<?php echo $row['name']; ?>
							</div>
							<a href="cat-edit.php?id=<?php echo $row['id'] ?>">
							<i class="far fa-edit"></i>
							edit</a><br><br>
							<a href="cat-delete.php?id=<?php echo $row['id'] ?>">
							<i class="fas fa-times"></i>del</a>
								</div>
								<?php endwhile; ?>
							</div>
					 </main>

				</div>
		</div>

		
					
		<script src="../js/jquery.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../admin/js/main.js"></script>


</body>
</html>