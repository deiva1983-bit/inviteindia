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
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
/*----- Object creation end-----*/
$footer_template='default/mrg_template/footer_links_up.tpl';
$smarty->assign('footer', $smarty->fetch($footer_template) );
$content_template=''; $headthemurl='';
$smarty->assign('header', $smarty->fetch($headthemurl) );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch($footer_template) );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl'); 
?>