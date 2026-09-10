<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
//include_once( '../includes/configs/vsessioninc.php' );
$user_log_id= trim($_SESSION['sess_ven_user_id']);
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/  
session_destroy();
 
header("Location: index-business.php");
exit;
?>
