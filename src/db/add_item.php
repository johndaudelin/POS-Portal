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
			// prevent sql injections / clear user invalid inputs  
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
			
			$count = trim($_POST['count']);
			$count = strip_tags($count);
			$count = htmlspecialchars($count);
			
			$res = db_query("INSERT INTO inventory(id, upc, name, console, cost, price, count) VALUES(NULL, '$upc', '$name', '$console', '$cost', '$price', '$count')");
			if ($res === FALSE){
				// handle unexpected error by redirecting to 500 error page
				header("Location: page_500.html");
			} else {
				header("Location: inventory.php");
			}
	}
}
?>