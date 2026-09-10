<?php
error_reporting(1);
@session_start();
 
$dirName="data/images/profile/original/";
 include('includes/functions/simpleimage.php');
	
if($_REQUEST['logoid'] != "")
{
	$imgpath="data/images/profile/thumb/".$_REQUEST['logoid'];
		echo "<img src='$imgpath'>";
}
	
if (isset($_POST['id'])) 
	{
		$uploadFile="$dirName/".md5($_FILES[$_POST['id']]['name'].".demo");	
		/*if(!is_dir($_GET['dirname'])) 
		{
		echo '<script> alert("Failed to find the final upload directory: $dirName);</script>';
		}*/

		$ext = strtolower(strrchr($_FILES[$_POST['id']]['name'],'.'));
		if($ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif' or $ext == '.png')
		{	
		$image_name=time().'.jpg';
		$_SESSION['image_nameTMP']=$image_name;
		$target_path=$dirName. $image_name;
        	$result = 0;
		if(move_uploaded_file($_FILES[$_POST['id']]['tmp_name'], $target_path)) 
			{
      			$result = 1;
   			}
        	$image = new SimpleImage();
   		$image->load($target_path);
   		$image->resizeToHeight(80);
   		$image->save("data/images/profile/thumb/".$image_name);
		$imgpath="data/images/profile/thumb/".$image_name;
		echo "<img src='$imgpath'>";
		} 
	else 
	{
	echo '<div style="background:#FBE3E4 none repeat scroll 0 0;width:322px;height:54px;border-color:#FBC2C4;color:#8A1F11;padding:.0em;margin-bottom:1em;border:2px solid #ddd;">          
          <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;">
           Select valid file format (JPG, PNG, GIF).
	  </p>
          
 	</div>';
	}	

}
/*else {
	
	$uploadFile=$target_path;
	echo $uploadFile; exit;
	if (file_exists($uploadFile)) 
		{
		echo "File uploaded. <a href='$uploadFile'>Open File2</a> &nbsp;&nbsp;&nbsp; <a href='deletefile.php?filename=".$uploadFile."'>Delete File</a>";	
		}
	else 
		{
		echo "<img src='loading.gif' alt='loading...' />";
		}
	}*/
?>