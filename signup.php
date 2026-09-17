<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
 /*----- Object creation Start-----*/

 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'signup');
$signup_page_title = 'Create Your InviteIndia Account | Wedding Website Builder';
$signup_page_desc = 'Create an InviteIndia account to build a custom Indian wedding website, design digital invitations, and manage guest RSVPs with ease.';
$signup_page_keywords = 'create inviteindia account, wedding website builder, digital invitation account, wedding invitation signup, wedding website signup';
$smarty->assign('pagetitle', $signup_page_title);
$smarty->assign('metadesc', $signup_page_desc);
$smarty->assign('metakeywords', $signup_page_keywords);
$smarty->assign('can_url', 'https://www.inviteindia.com/signup.php');
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
