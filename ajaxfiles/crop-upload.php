<?php
//upload.php
include_once('../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_user_id'];
$action = $_REQUEST["req"];
	if(isset($_POST["image"])) {
	 $data = $_POST["image"];
	 $image_array_1 = explode(";", $data);
	 $image_array_2 = explode(",", $image_array_1[1]);
	 $data = base64_decode($image_array_2[1]);
	 $timestamp = time() . '.png';
	 $imageName = '../assets/cus-review/'.$timestamp;
	 file_put_contents($imageName, $data);
		echo $timestamp;
	}
?>