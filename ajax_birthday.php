<?php
/*----- Include Files -----*/
include_once('includes/configs/init.php');
session_start();
$userslog_obj = new userslog();
$common_obj= new common();
$action_val= $_REQUEST['chk_action'];
$ip_addr= $common_obj->getRealIpAddr();
if($action_val=="birthmsgadd"){
$uname= trim($_REQUEST['uname']);  	$msgmsg= trim($_REQUEST['wmsg']);  	$id= trim($_REQUEST['uid']); $owner_id = trim($_REQUEST['owner_id']);
$guestemail= trim($_REQUEST['guestemail']);  	$giftid= trim($_REQUEST['giftid']);  	$guestloc= trim($_REQUEST['guestloc']);
//$date=  now();
$uname=addslashes($uname);
$msgmsg=addslashes($msgmsg);
$inqry= "INSERT INTO `wedding_msg` (`auto_id`, `wedding_id`, `wed_owner_id`, `name`,  `messages`, `ip_addr`, `msg_status`, `date`, `guestemail`, `giftid`, `guestloc`, `msg_type`) VALUES (NULL, '".$id."', '".$owner_id."', '".$uname."', '".$msgmsg."', '".$ip_addr."', '1',  now(), '".$guestemail."', '".$giftid."', '".$guestloc."', '2')";
$order_list_id = $userslog_obj->insertVal($inqry);

// Fetch data's
	$chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$id and msg_status=1 and msg_type = 2 ORDER BY date DESC";
	$selectsms_access= $userslog_obj->selectVal($chkqry);
	if (count($selectsms_access)){
	$msgdetails="";
	foreach($selectsms_access as $key=>$field){
		$subjectname="";
		$cdate= $field['date'];
		$date =date('jS F, Y', strtotime("$cdate"));
		//$msginfo =wordwrap($field['messages'], 80, '<br />', true);
		$msginfo =$field['messages'];
		$name =wordwrap($field['name'], 23, "<br />", true);
		$wedgift_items= "gift".$field['giftid'].".gif";
		$guestloc= $field['guestloc'];
		$gloc='';
		if($guestloc != "")
			$gloc='<tr valign="top"><td>&nbsp;</td><td style="font-size:12px;">'.$guestloc.'</td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
		$msgdetails.='<div class=blessing_div>
				<div style="float:left; height:100px;">
				<img width="100" height="100" border="0" style="margin:20px;" src='.$gifimg_urls.'></div>
				<div style="float:left; width:25%; margin-top:20px;">
				<table width="100%">
				<tbody><tr valign="top">
				<td width="4%">&nbsp;</td>
				<td width="96%" style="font-weight:bold;">'.$name.'</td>
				</tr>'.$gloc.'
				<tr valign="top">
				<td>&nbsp;</td><td style="font-size:12px;">'.$date.'</td></tr>
				</tbody></table>
				</div>
				
				<div style="width:300px; float:left; font-size:12px; margin-top:20px; overflow:hidden; padding-left:20px;">
				'.$msginfo.'</div>
				</div>';
				}
		}
echo $msgdetails;
}
?>