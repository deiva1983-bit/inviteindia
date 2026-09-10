<?php
//upload.php
include_once('../../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_ven_user_id'];
$action = $_REQUEST["req"];
	if(isset($_POST["image"])) {
	 $data = $_POST["image"];

	$dirName = "../assets/$sess_userlog_id";
	if (is_dir($dirName)){}else{
		
		//mkdir($dirName, 0755);
		try {
		   mkdir($dirName, 0755, TRUE);
		} catch(ErrorException $ex) {
		   echo "Error: " . $ex->getMessage();
		}
		
		}
	
	$dirName = $dirName.'/';

	 $image_array_1 = explode(";", $data);
	 $image_array_2 = explode(",", $image_array_1[1]);
	 $data = base64_decode($image_array_2[1]);
	 $timestamp = 'cover_photo.jpg';
	 $imageName = $dirName.$timestamp;
	 file_put_contents($imageName, $data);
		echo "assets/$sess_userlog_id/$timestamp";
		
	}
?>