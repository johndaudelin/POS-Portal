<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}
 
$error = false;
 
if( $_POST) {
	// prevent sql injections/ clear user invalid inputs  
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);
	
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	$curr = trim($_POST['oldPass']);
	$curr = strip_tags($curr);
	$curr = htmlspecialchars($curr);
	
	$pass = trim($_POST['password']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	
	$pass2 = trim($_POST['password2']);
	$pass2 = strip_tags($pass2);
	$pass2 = htmlspecialchars($pass2);
	 
	if ($pass !== $pass2){
		$error = true;
		$errMSG = "Passwords do not match.";
	}
	if(hash('sha256', $curr) != $_SESSION['password']){
		$error = true;
		$errMSG = "The password you entered is incorrect.";
	}
	if ($pass == ""){
		$pass = $curr;
	}
	 
	if (!$error){
		if ($email != $_SESSION['email']){
			$res1 = db_query("SELECT * FROM admins WHERE userEmail='$email'");
			$count = mysqli_num_rows($res1);
			if ($count === 1){
				$error = true;
				$errMSG = "Email address already taken.";
			}
		}
		
		if (!$error) {
			$password = hash('sha256', $pass); // password hashing using SHA256
	   
			// make db update here
			$res2 = db_query("UPDATE admins SET userName='$name', userEmail='$email', userPass='$password' WHERE userEmail='" . $_SESSION['email'] . "'");
			if ($res2 === FALSE){
				// handle unexpected error by redirecting to 500 error page
				header("Location: page_500.html");
			} else {
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['pass_num_digits'] = strlen($pass);
			
				// return to profile page
				header("Location: profile.php");
			}
		}
	}
}
?>