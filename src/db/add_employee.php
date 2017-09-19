<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

if ($_POST){
	switch ($_POST['submit']){
		case 'add':
			// prevent sql injections/ clear user invalid inputs  
			$fname = trim($_POST['first_name']);
			$fname = strip_tags($fname);
			$fname = htmlspecialchars($fname);
			
			$lname = trim($_POST['last_name']);
			$lname = strip_tags($lname);
			$lname = htmlspecialchars($lname);
			
			$email = trim($_POST['email']);
			$email = strip_tags($email);
			$email = htmlspecialchars($email);
			
			$phone = trim($_POST['phone']);
			$phone = strip_tags($phone);
			$phone = htmlspecialchars($phone);
			
			$res = db_query("INSERT INTO employees(id, first_name, last_name, email, phone) VALUES(NULL, '$fname', '$lname', '$email', '$phone')");
			if ($res === FALSE){
				// handle unexpected error by redirecting to 500 error page
				header("Location: page_500.html");
			} else {
				header("Location: employees.php");
			}
	}
}
?>