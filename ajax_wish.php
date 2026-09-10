<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : service_ajax.php
// Description : file to handle add service ajax information
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 23-02-2010
// Modified date: 23-02-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once('includes/configs/init.php');
session_start();
$userslog_obj = new userslog();
$common_obj = new common();
$action_val= $_REQUEST['chk_action'];
$ip_addr=$common_obj->getRealIpAddr();
if($action_val=="wedmsgadd")
{
$uname= trim($_REQUEST['uname']);  	$msgmsg= trim($_REQUEST['wmsg']);  	$id= trim($_REQUEST['uid']); $owner_id = trim($_REQUEST['owner_id']);
$guestemail= trim($_REQUEST['guestemail']);  	$giftid= trim($_REQUEST['giftid']);  	$guestloc= trim($_REQUEST['guestloc']);
//$date=  now();
$uname=addslashes($uname);
$msgmsg=addslashes($msgmsg);
$inqry= "INSERT INTO `wedding_msg` (`auto_id`, `wedding_id`, `wed_owner_id`, `name`,  `messages`, `ip_addr`, `msg_status`, `date`, `guestemail`, `giftid`, `guestloc`) VALUES (NULL, '".$id."', '".$owner_id."', '".$uname."', '".$msgmsg."', '".$ip_addr."', '1',  now(), '".$guestemail."', '".$giftid."', '".$guestloc."')";
$order_list_id = $userslog_obj->insertVal($inqry);
/*
$chkqry= "SELECT messages,name,date FROM `wedding_msg` WHERE wedding_id ='".$id."' ORDER BY date DESC";
$selectsms_access= $userslog_obj->selectVal($chkqry);
                $msgdetails="";
		foreach($selectsms_access as $key=>$field)
                     {
                     $subjectname="";
                     $cdate= $field['date'];
                     $date =date('jS F, Y', strtotime("$cdate"));
                     $msginfo =wordwrap($field['messages'], 80, '<br />', true);
                     $name =wordwrap($field['name'], 23, "<br />", true);
					 
                     $msgdetails.="<div id='wishtabs'><div class='wisher-name'>".$name.":</div><div class='wisher-comments'><p>".$msginfo."</p></div><div class='descr'>".$date."</div></div><div id='border_line'></div>";

                     } */
echo 1;
} else if($action_val=="wedmsgadd_classic") {
$uname= trim($_REQUEST['uname']);  	$msgmsg= trim($_REQUEST['wmsg']);  	$id= trim($_REQUEST['uid']); $owner_id = trim($_REQUEST['owner_id']);
$guestemail= trim($_REQUEST['guestemail']);  	$giftid= trim($_REQUEST['giftid']);  	$guestloc= trim($_REQUEST['guestloc']);
//$date=  now();
$uname=addslashes($uname);
$msgmsg=addslashes($msgmsg);
$inqry= "INSERT INTO `wedding_msg` (`auto_id`, `wedding_id`, `wed_owner_id`, `name`,  `messages`, `ip_addr`, `msg_status`, `date`, `guestemail`, `giftid`, `guestloc`) VALUES (NULL, '".$id."', '".$owner_id."', '".$uname."', N'".$msgmsg."', '".$ip_addr."', '1',  now(), '".$guestemail."', '".$giftid."', '".$guestloc."')";
$order_list_id = $userslog_obj->insertVal($inqry);
$img_urls= $glb_site_url.'/templates/default/mrg_template/theme_11/';

    $chkqry= "SELECT messages,name,date,giftid,guestloc FROM `wedding_msg` WHERE `wedding_id` =$id and msg_status=1 ORDER BY date DESC";
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
			$gloc='<tr valign="top"><td>&nbsp;</td><td><b>'.$guestloc.'</b></td></tr>';
		$gifimg_urls=$glb_site_url.'templates/default/mrg_template/wedgifts/'.$wedgift_items;
		$slideclass = ($key) ? 'no' : 'active';
		$msg_carousel .= '<li data-target="#carousel-example-generic" data-slide-to="'.$key.'" class='.$slideclass.'>
						<a href="#"></a>
					    </li>';

		$msgtmp_newformat .= '<div class="item '.$slideclass.'"><span class="quote"><img src="'.$img_urls.'img/quote.png" alt=""></span>
						<h3>'.$name.'</h3>
						<span>'.$date.'</span>
						<p><i>'.$msginfo.'</i></p>
					    </div>';


				}
		$msgdetails = '<ol class="carousel-indicators">'.$msg_carousel.'</ol><div class="carousel-inner">'.$msgtmp_newformat.'</div>';
		}
echo $msgdetails;
} else if ($action_val=="wedcommadd") {
$uname= trim($_REQUEST['uname']);  	$msgmsg= trim($_REQUEST['wmsg']);  	$id= trim($_REQUEST['uid']);
$uname=addslashes($uname);
$msgmsg=addslashes($msgmsg);
$imgids= addslashes($_REQUEST['imgid']);
$date=  date("Y-m-d H:i:s");
$inqry= "INSERT INTO mrg_comments (comm_auto_id, comm_comments, comm_name, comm_owner_id, comm_date, comm_status,comm_img_id ) VALUES (NULL, '".addslashes($msgmsg)."', '".addslashes($uname)."', '".$id."', '".$date."', 1, ".$imgids.")";
$order_list_id = $userslog_obj->insertVal($inqry);
$chkqry= "SELECT comm_comments,comm_name, comm_date FROM `mrg_comments` WHERE comm_owner_id ='".$id."' and comm_img_id='".$imgids."' ORDER BY comm_date DESC";
$selectsms_access= $userslog_obj->selectVal($chkqry);
                $msgdetails="";
		foreach($selectsms_access as $key=>$field)
                     {
                     $subjectname="";
                     $msginfo =wordwrap($field['comm_comments'], 23, "\n", true);
                     $name =wordwrap($field['comm_name']);
                     $date =$field['comm_date'];
                     $msgdetails.="<div id=wishtabs_comm><div id=mrgwish>".$name.":</div><div id=mrginfo>".$msginfo."</div></div><div id=border_line></div>";
                     }
echo $msgdetails;

}
 
		 

?>