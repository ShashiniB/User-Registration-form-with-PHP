<?php 
session_start(); 
include "../db_config.php";

if (isset($_POST['name']) && isset($_POST['uname'])
    && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['contact'])
    && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
    $name = validate($_POST['name']);

    $dob = validate($_POST['dob']);
    $email = validate($_POST['email']);
    $gender = validate($_POST['gender']);
    $contact = validate($_POST['contact']);

	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}else if(empty($name)){
        header("Location: signup.php?error=First name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($uname)){
        header("Location: signup.php?error=Last name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		//hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(email, password, name, uname, dob, contact, gender) VALUES('$email', '$pass', '$name', '$uname', '$dob', '$contact', '$gender')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: index.php");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}