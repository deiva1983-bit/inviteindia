<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 /*----- Object creation Start-----*/

 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'signup');
$smarty->assign('pagetitle', 'inviteindia: Register your account, Interview question, Interview tips, Free SMS- Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metadesc', 'Register your account, Interview question, Interview tips, Send Free SMS, Send free SMS to Group - Add your friends and send free SMS to your friends');
$smarty->assign('metakeywords', 'Register your account, Interview question, Interview tips,  Free SMS, Send Free SMS, Send free SMS to Group, Add friends,Send free SMS to your friends,Send free SMS to your friends Group'); 
 $smarty->assign('glb_site_url', $glb_site_url); 			

/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
if($doit != "")
	$smarty->assign('error_msg', "Please, login here..." );	
 if($_SESSION['notvalid'] != "")
	{
	$smarty->assign('error_msg', "Your authentication fail, Please give correct information..." );
	unset($_SESSION['notvalid']);
	}	
$content_template = 'default/register.tpl';	
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
