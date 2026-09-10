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
include_once('../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_user_id'];
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
/*----- Object creation end-----*/

$action_val= $_REQUEST['chk_action'];
 if($action_val=="con_amt")
 {
	$camt= trim($_REQUEST['amt']);
	$fromc= trim($_REQUEST['fc']);
	$toc= trim($_REQUEST['tc']);
	if(($camt == '') or ($fromc == "") or ($toc == "") )
	{
	echo "Sorry. Please enter your convert amount" . $toc;
	}
	else
	{
	$fromCou = $common_obj->getConverterAmt($fromc, $toc, $camt);
	echo $fromCou;
	}
	
 }
else if($action_val=="send_mail")
{
	$cusemail= trim($_REQUEST['cusemail']);
	$yourmsg= trim($_REQUEST['yourmsg']);
	$cusname= trim($_REQUEST['cusname']);
	$totmsg = 'name: '. $cusname."<br>".'Email: '. $cusemail."<br>".'Text: '.$yourmsg;
	$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
	$to = "deivainviteindia@gmail.com";
	$sub= 'God - Enquiry from donation page';
	$common_obj->simplemail($to, $sub, $totmsg, $headers);
} 
?>