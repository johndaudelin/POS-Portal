<?php
require_once 'db/dbconnect.php';

// it will never let you open this page if session is not set
if ( !isset($_SESSION['name']) ) {
	header("Location: login.php");
	exit;
}

$error = false;

$target_dir = "images/";
$uploadOk = 1;
$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
$target_file = $target_dir . $_SESSION['id'] . ".png";

// Check if image file is a actual image or fake image
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
		$error = true;
        $uploadOk = 0;
    }

	 // Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$error = true;
		$errMSG = "Sorry, file is too large. Maximum size of 5KB allowed.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "gif" ) {
		$error = true;
		$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	
	if ($uploadOk != 0) {
		$image = imagepng($image, $_FILES['Filedata']['name'] . 'png');
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			header("Location: profile.php");
		} else {
			header("Location: page_500.html");
		}
	}
}
?>