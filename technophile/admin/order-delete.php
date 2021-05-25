<?php 
			include("../confs/config.php");
			$id=$_GET['id'];
			$sql1="DELETE FROM orders WHERE  id=$id";
			$sql2="DELETE FROM order_items WHERE  order_id=$id";
			mysqli_query($conn,$sql1);
			mysqli_query($conn,$sql2);
			header("location:order-list.php");
 ?>