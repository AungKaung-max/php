<?php 
		session_start();
		include("../confs/config.php");

		$name = $_POST['name'];
 $password = $_POST['password'];
   if($name == "technophile" and $password == "123")
    { 
       $_SESSION['auth'] = true; 
       header("location: item-list.php");
      } else
       {   
        header("location: index.php"); 
        } 
 ?>