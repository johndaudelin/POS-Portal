<?php
session_start();
require_once 'dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: ../login.php");
	exit;
}

$res = db_query("SELECT invoiceId, date_time, total_amount FROM transactions ORDER BY date_time DESC LIMIT 1000"); // CHANGE THIS IF OLDER CASH REPORTS NEEDED

$data = mysqli_fetch_all($res, MYSQLI_ASSOC);

echo json_encode( $data );
?>