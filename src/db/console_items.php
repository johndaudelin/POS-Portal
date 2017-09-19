<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

// prevent sql injections/ clear user invalid inputs  
$console = trim($_GET['console']);
$console = strip_tags($console);
$console = htmlspecialchars($console);

$inv = db_query("SELECT upc, price, name FROM inventory WHERE console='$console'");
$upc = array();
$prices = array();
$names = array();

while ($item = mysqli_fetch_assoc($inv)){
	array_push($upc, $item['upc']);
	array_push($prices, $item['price']);
	array_push($names, $item['name']);
}

$jsUpc = json_encode($upc);
$jsPrices = json_encode($prices);
$jsNames = json_encode($names);

?>

