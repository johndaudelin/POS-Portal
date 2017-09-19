<?php
require_once 'db/dbconnect.php';

function randomPassword() {
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$pass = array();
	$alphaLength = strlen($alphabet) - 1;
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}
 
$error = false;

if( isset($_SESSION['name']) ){
	header("Location: index.php");
	exit;
}

if( isset($_POST['btn-reset']) ) { 
  
	// prevent sql injections/ clear user invalid inputs  
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	
	if(empty($email)){
		$error = true;
	}
  
	// if there's no error, continue to login
	if (!$error) {
	  
		$res=db_query("SELECT * FROM admins WHERE userEmail='$email'");
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
		
		if($count == 1) {
			$pass = randomPassword();
			$password = hash('sha256', $pass);
			mail($email, "Password Reset", "The password for your Game Store Administrator account has been reset.\n\nYour new password is: " . $pass . "\n\nAfter logging in with this password, you can change your password through the administrator profile page.\n\nThank you.");
			$res2 = db_query("UPDATE admins SET userPass='$password' WHERE userEmail='$email'");
			if ($res2 === FALSE){
				// handle unexpected error by redirecting to 500 error page
				header("Location: page_500.html");
			} else {
				// return to profile page
				header("Location: page_confirmation.html");
			}
		} else {
			$emailError = "No account is registered for this email address.";
		}
	}
}
?>