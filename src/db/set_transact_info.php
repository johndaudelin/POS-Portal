<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

$invoice = $_GET['invoice'];
$error = false;
$trans = db_query("SELECT sales_tax FROM transactions WHERE invoiceId='$invoice'");
$trans1 = mysqli_fetch_assoc($trans);
$tax = $trans1['sales_tax'];
$items = db_query("SELECT * FROM transactionItems WHERE invoiceId='$invoice'");
$cash = db_query("SELECT * FROM cashPayments WHERE invoiceId='$invoice'");
$credit = db_query("SELECT * FROM creditPayments WHERE invoiceId='$invoice'");
$storeCredit = db_query("SELECT * FROM storeCreditPayments WHERE invoiceId='$invoice'");
$giftCard = db_query("SELECT * FROM giftCardPayments WHERE invoiceId='$invoice'");

if (mysqli_num_rows($trans) == 0){
	header("Location: page_500.html");
	exit;
}
?>