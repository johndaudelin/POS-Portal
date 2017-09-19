<?php

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

$error = false;
 
if( $_POST ) { 
	
	// prevent sql injections/ clear user invalid inputs  
	$price = trim($_POST['price']);
	$price = strip_tags($price);
	$price = htmlspecialchars($price);
	 
	$upc = trim($_POST['upc']);
	$upc = strip_tags($upc);
	$upc = htmlspecialchars($upc);
	
	$console = trim($_POST['console']);
	$console = strip_tags($console);
	$console = htmlspecialchars($console);
	 
	if (empty($price)){
		$error = true;
	}

	if (!is_numeric($price)){
		$error = true;
	}
	
	if (floatval($price) < 0){
		$error = true;
	}
	
	if (!$error){
		
		// make db update here
		$res = db_query("UPDATE inventory SET price='$price' WHERE upc='$upc'");
		
		if ($res === FALSE){
			// handle unexpected error by redirecting to 500 error page
			header("Location: page_500.html");
		} else {
			// return to profile page
			header("Location: console_prices.php?console=" . $console);
		}
	}
	else {
		header("Location: console_prices.php?console=" . $console);
	}
}
?>