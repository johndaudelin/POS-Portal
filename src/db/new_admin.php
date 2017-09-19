<?php
require_once 'db/dbconnect.php';
 
// redirect to login screen if session is not set
if ( !isset($_SESSION['name']) ) {
    header("Location: login.php");
    exit;
}
 
$error = false;

if( isset($_POST['btn-register']) ) { 
    // prevent sql injections/ clear user invalid inputs  
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    $pass2 = trim($_POST['pass2']);
    $pass2 = strip_tags($pass2);
    $pass2 = htmlspecialchars($pass2);
  
    if(empty($email)){
        $error = true;
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }
  
    if(empty($pass) || empty($pass2)){
        $error = true;
    } else if ($pass != $pass2){
        $error = true;
        $passError = "Please enter the identical password twice.";
    } else {
        $passError = "";
    }
  
    // if there's no error, continue to login
    if (!$error) {
        $password = hash('sha256', $pass); // password hashing using SHA256
        
        $res=db_query("SELECT * FROM admins WHERE userEmail='$email'");
        $count = mysqli_num_rows($res); // if uname/pass correct its return must be 1 row
   
        if($count == 1) {
            $errMSG = "An account with this email address already exists.";
        } else {
            // make db entry here
            $res = db_query("INSERT INTO admins(userId, userName, userEmail, userPass) VALUES(NULL, '$name', '$email', '$password')");
            
            if ($res){
                // send a confirmation email
                mail($email, "Registration Confirmation", "This is an automated message to confirm that you recently registered, or had an account registered, as an administrator at Game Zone.");
	
                // log out
                header("Location: db/logout.php");
            } else {
                // handle unexpected error by redirecting to 500 error page
                header("Location: page_500.html");
            }
        }
    }
}
?>