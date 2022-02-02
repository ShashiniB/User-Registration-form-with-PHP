<?php
session_start();
include "../db_config.php";

if(isset($_POST['submit'])){
	$admin = $_POST['admin'];
	$password = $_POST['password'];

	$sql = " select * from  admin where admin='$admin' and password='$password' ";
	$query = mysqli_query($conn,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['admin'] = $admin;
			header('location:home.php');
		}else{
			echo "login failed";
			header('location:index.php');
		}

}


?>