<?php 		
			include("../confs/config.php");

			$id=$_GET['id'];
			mysqli_query($conn,"DELETE FROM items WHERE id=$id");

			header("location:item-list.php");
 ?>