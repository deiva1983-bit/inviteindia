<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
$validator_obj = new Validator();

$error_status = $_REQUEST['page_error_status'];
if($error_status == "1"){
$content_template = "default/mrg_account/pers_info.tpl";
} else {
$button_request = addslashes(trim($_REQUEST['frm_req']));
if($button_request == 'p') {
	$req_grooms_name = addslashes(trim($_REQUEST['txt_grooms_name']));
	$req_grooms_dob = addslashes(trim($_REQUEST['grooms_dob']));
	$req_brides_name = addslashes(trim($_REQUEST['txt_brides_name']));
	$req_bride_dob = addslashes(trim($_REQUEST['bride_dob']));
	$_SESSION['grooms_name'] = $req_grooms_name;
	$_SESSION['grooms_dob'] = $req_grooms_dob;
	$_SESSION['brides_name'] = $req_brides_name;
	$_SESSION['brides_dob'] = $req_bride_dob;
	$content_template = "default/mrg_account/general_info.tpl";
	}
	$gnav_personal_class='';$gnav_general_class='';$gnav_ceremony_class='';$gnav_reception_class='';
	if($_SESSION['gnav_personal_info']== '1')
		$gnav_personal_class = 'active';
	if($_SESSION['gnav_general_info']== '1')
		$gnav_general_class = 'active';
	if($_SESSION['gnav_ceremony_info']== '1')
		$gnav_ceremony_class = 'active';
	if($_SESSION['gnav_reception_info']== '1')
		$gnav_reception_class = 'active';
	$smarty->assign('gnav_personal_class', $gnav_personal_class);
	$smarty->assign('gnav_general_class', $gnav_general_class);
	$smarty->assign('gnav_ceremony_class', $gnav_ceremony_class);
	$smarty->assign('gnav_reception_class', $gnav_reception_class);
	$example_url = 'rakesh_weds_nisha';
	if ($_SESSION['grooms_name'] != '' and $_SESSION['brides_name'] != "") {
		$example_url = strtolower($_SESSION['grooms_name']).'_weds_'.strtolower($_SESSION['brides_name']);
	}
	$smarty->assign('example_url', $example_url);
	$content_template = "default/mrg_account/general_info.tpl";
}
$smarty->assign('currentpage_js', 'web_create_latest');
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
