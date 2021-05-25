<?php 
		include("../confs/config.php");
		$id = $_POST['id'];  
		$name=$_POST['name'];
		$price=$_POST['price'];
		$category_id=$_POST['category_id'];
		$photo=$_FILES['photo']['name'];
		$tmp=$_FILES['photo']['tmp_name'];


		if($photo){
				move_uploaded_file($tmp, "photo/$photo");
				$sql="UPDATE items SET itemname='$name',price='$price',category_id='$category_id',photo='$photo',modified_date=now() WHERE id=$id";
				
			}
			else
			{
				$sql="UPDATE items SET itemname='$name',price='$price',category_id='$category_id',modified_date=now() WHERE id=$id";
			}


			mysqli_query($conn,$sql);
			header("location:item-list.php");
 ?>