<?php
/*----- Include Files -----*/
// This file is used to find the mars IP address 4478
$notifyrequest=$_REQUEST ;
$notify_url='Here... ';
foreach ($notifyrequest as $key => $value){
	 $notify_url.=$key.'='.urlencode($value).'&';
}
$File = "mobileapiresponse.txt";
$Handle = fopen($File, 'a');
fwrite($Handle, $notify_url);
fclose($Handle);
exit;
/*

include_once( '../includes/configs/init.php' );
$userslog_obj = new userslog();
$mars_id=trim($_REQUEST['ip']);
if($mars_id != "")
{
$upqry_ip= "UPDATE tbl_mob_mars_ipinfo SET mars_ip  = '".$mars_id."' WHERE ip_info_autoid  ='1' LIMIT 1 " ;
$order_list_id = $userslog_obj->updateVal($upqry_ip);
if($order_list_id)
{
echo  "<h2> Hi, Your IP has been updated. :)</h2> <br />";
echo  "<h4>This is only for testing.</h4> <br />";
}
} */

?>