<?php

function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array.
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config.ini'); // Ideally should change this for security...
        $connection = mysqli_connect('mysqlcluster18',$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error by redirecting to error screen
        header('Location: '.$_SERVER['DCOUMENT_ROOT'].'/POS/src/page_500.html');
        exit;
    }
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_array($result)) {
	    $rows[] = $row;
    }

    return $rows;
}
?>