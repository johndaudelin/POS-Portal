<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

if (isset($_GET['id'])) {
	// prevent sql injections/ clear user invalid inputs  
	$id = trim($_GET['id']);
	$id = strip_tags($id);
	$id = htmlspecialchars($id);
	
	// make db update here
	$res1 = db_query("SELECT * FROM inventory WHERE id='$id'");
	if ($res1 === FALSE){
		// handle unexpected error by redirecting to 500 error page
		header("Location: page_500.html");
	} else {
		$row = mysqli_fetch_assoc($res1);
		$upc = $row['upc'];
		$name = $row['name'];
		$console = $row['console'];
		$cost = $row['cost'];
		$price = $row['price'];
		$percentDiscount = $row['percent_discount'];
		$dollarDiscount = $row['dollar_discount'];
		$tax = $row['tax'];
		$count = $row['count'];
	}
}

$error = false;

if( $_POST) { 
	// prevent sql injections/ clear user invalid inputs  
	$upc = trim($_POST['upc']);
	$upc = strip_tags($upc);
	$upc = htmlspecialchars($upc);

	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$console = trim($_POST['console']);
	$console = strip_tags($console);
	$console = htmlspecialchars($console);

	$cost = trim($_POST['cost']);
	$cost = strip_tags($cost);
	$cost = htmlspecialchars($cost);
	
	$price = trim($_POST['price']);
	$price = strip_tags($price);
	$price = htmlspecialchars($price);
	
	$percentDiscount = trim($_POST['percentDiscount']);
	$percentDiscount = strip_tags($percentDiscount);
	$percentDiscount = htmlspecialchars($percentDiscount);
	
	$dollarDiscount = trim($_POST['dollarDiscount']);
	$dollarDiscount = strip_tags($dollarDiscount);
	$dollarDiscount = htmlspecialchars($dollarDiscount);
	
	$tax = trim($_POST['tax']);
	$tax = strip_tags($tax);
	$tax = htmlspecialchars($tax);
	
	$count = trim($_POST['count']);
	$count = strip_tags($count);
	$count = htmlspecialchars($count);
	
	// from HIDDEN input field
	$id = trim($_POST['id']);
	$id = strip_tags($id);
	$id = htmlspecialchars($id);

	if (floatval($price) < 0 || floatval($cost) < 0 || floatval($percentDiscount) < 0 || floatval($dollarDiscount) < 0 || floatval($tax) < 0 || floatval($count) < 0){
		$error = true;
		$errMSG = "Negative values not allowed.";
	}
	  
	if (!$error){
		//Make DB update here
		$res2 = db_query("UPDATE inventory SET upc='$upc', name='$name', console='$console', cost='$cost', price='$price', percent_discount='$percentDiscount', dollar_discount='$dollarDiscount', tax='$tax', count='$count' WHERE id='$id'");
		
		if ($res2 === FALSE){
			// handle unexpected error by redirecting to 500 error page
			header("Location: page_500.html");
		} else {
			// return to inventory page
			header("Location: inventory.php");
		}
	}
}
?>