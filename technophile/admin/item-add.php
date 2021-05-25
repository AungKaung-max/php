<?php 	
		include("../confs/config.php");
		$name=$_POST['name'];
		$price=$_POST['price'];
		$category_id=$_POST['category_id'];
		$photo=$_FILES['photo']['name'];
		$tmp=$_FILES['photo']['tmp_name'];

		if($photo)
		{
			move_uploaded_file($tmp, "photo/$photo");
		}

		$sql="INSERT INTO items(itemname,price,category_id,photo,created_date,modified_date)
			VALUES ('$name','$price','$category_id','$photo',now(),now())";

		mysqli_query($conn,$sql);
		header("location:item-list.php");	
 ?>