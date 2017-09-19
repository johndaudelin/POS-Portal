<?php
session_start();
require_once 'dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: ../login.php");
	exit;
}

if(isset($_GET['id'])){
	// prevent sql injections/ clear user invalid inputs  
	$id = trim($_GET['id']);
	$id = strip_tags($id);
	$id = htmlspecialchars($id);
	
	$res = db_query("DELETE FROM inventory WHERE id='$id'");
	if ($res === FALSE){
		// handle unexpected error by redirecting to 500 error page
		header("Location: ../page_500.html");
	} else {
		header("Location: ../inventory.php");
	}
}
?>