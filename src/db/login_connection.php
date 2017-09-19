<?php
require_once 'db/dbconnect.php';

// redirect to dashboard if session is set
if ( isset($_SESSION['name']) ) {
    header("Location: index.php");
    exit;
}
 
// redirect to registration page if an admin is not already registered
$logged = db_query("SELECT * FROM admins");
$row = mysqli_fetch_assoc($logged);
if ( $row == NULL ) {
    header("Location: register.php");
    exit;
}
 
$error = false;

if( isset($_POST['btn-login']) ) { 
  
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
  
    if(empty($email)){
        $error = true;
        $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }
  
    if(empty($pass)){
        $error = true;
        $passError = "Please enter your password.";
    } else {
        $passError = "";
    }
  
    // if there's no error, continue to login
    if (!$error) {
        $password = hash('sha256', $pass); // password hashing using SHA256
        
        $res=db_query("SELECT * FROM admins WHERE userEmail='$email'");
        $row=mysqli_fetch_array($res);
        $count = mysqli_num_rows($res);
        
        if($count == 1 && $row['userPass']==$password ) {
            $_SESSION['name'] = $row['userName'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['pass_num_digits'] = strlen($pass);
            $_SESSION['id'] = $row['id'];
            
            header("Location: index.php");
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}
?>