<?php 
/*----- Include Files -----*/

include_once( '../includes/configs/init.php' ); 
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$surl= trim($_REQUEST['surl']);
$chkqry= "select surltab.wed_short_original as  short_original from wed_shorturl surltab where surltab.wed_short_urlid  = $surl ";
 
$chk_pass_access= $userslog_obj->selectVal($chkqry);
		$surl = base64_decode(stripslashes($chk_pass_access[0]['short_original'])) ;
		//echo $surl; exit;
if ($surl != "")
header("Location: $surl");
else
echo "Sorry, Your Frienly URL May expired or Wrong URL. Please try again";
exit;
?>
