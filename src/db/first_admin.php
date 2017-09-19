<?php
require_once 'db/dbconnect.php';
 
// redirect to login screen if an admin is already registered
$logged = db_query("SELECT * FROM admins");
$row = mysqli_fetch_assoc($logged);
if ( $row != NULL ) {
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
  
    // if there's no error, continue to register
    if (!$error) {
        $password = hash('sha256', $pass); // password hashing using SHA256
   
        // make db entry here
        $res = db_query("INSERT INTO admins(id, userName, userEmail, userPass) VALUES(NULL, '$name', '$email', '$password')");
        if ($res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
	
            // send a confirmation email
            mail($email, "Registration Confirmation", "This is an automated message to confirm that you recently registered, or had an account registered, as an administrator at Game Zone.");
	
            // redirect to dashboard
            header("Location: index.php");
        } else {
            // handle unexpected error by redirecting to 500 error page
            header("Location: page_500.html");
        }
    }
}
?>