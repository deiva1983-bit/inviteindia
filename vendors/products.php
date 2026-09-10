<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_pdts');
$smarty->assign('pagetitle', 'Indian Wedding Vendors, Indian Wedding suppliers - inviteindia.com');
$smarty->assign('metadesc', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products'); 
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);

if ($ven_login_panel == '0'){
header('Location: login.php'); exit;
}
$err='';
$doit=trim($_REQUEST['do']);


if($doit == "man") {
	
	$prod_hidd=trim($_REQUEST['sub_prod_hidd']);
	if($prod_hidd == 'addp'){
		$cont_name=addslashes(trim($_REQUEST['ven_cont_name']));
		$serv_name=addslashes(trim($_REQUEST['ven_serv_name']));
		$services_drop=trim($_REQUEST['pdt_services_drop']);
		$serv_desc=addslashes(trim($_REQUEST['ven_serv_desc']));
		$service_logo = addslashes(trim($_FILES['uploaded_service_logo']['name']));
		$states_drop=trim($_REQUEST['states_drop']);
		$city_drop=trim($_REQUEST['city_id']);
		$area_drop=trim($_REQUEST['area_id']);
		$addr_1=addslashes(trim($_REQUEST['ven_addr_1']));
		$addr_2=addslashes(trim($_REQUEST['ven_addr_2']));
		$landmark=addslashes(trim($_REQUEST['ven_landmark']));
		$pincode=trim($_REQUEST['ven_pincode']);
		$fax=trim($_REQUEST['ven_fax']);
		$website=trim($_REQUEST['ven_website']);
		$pno=trim($_REQUEST['ven_pno']);
		$mno=trim($_REQUEST['ven_mno']);
		$email=trim($_REQUEST['ven_email']);
		//echo 'dssd'.$cont_name.'--'.$serv_name.'--'.$services_drop.'--'.$serv_desc.'--'.$states_drop.'<br>';
		//echo 'dssd'.$city_drop.'--'.$addr_1.'--'.$pincode.'--'.$pno.'<br>';
	 //echo 'www'.$city_drop;
		if($cont_name != '' and $serv_name != '' and $services_drop != 0 and $serv_desc != '' and $states_drop != 0 and $city_drop != 0 and $addr_1 != '' and $pincode != '') {
		$prod_image = '';
		if($service_logo != ''){
					$dirName = "../templates/default/mrg_template/vendors/$user_log_id_home";
					if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
					$dirName = $dirName.'/';
					$service_logo_ext = strtolower(strrchr($service_logo,'.'));
						if($service_logo_ext == '.jpg' or $service_logo_ext == '.jpeg' or $service_logo_ext == '.gif' or $service_logo_ext == '.png'){
						$prod_image=$user_log_id_home.time().'.jpg';
						$target_path=$dirName. $prod_image;
						move_uploaded_file($_FILES['uploaded_service_logo']['tmp_name'], $target_path); 
						//$image = new SimpleImage();
						//$image->load($target_path);
						//if ($image->getWidth() > 250)
						//$image->resizeToWidth(250);
						//$image->save($dirName.$mimage_name); 
						}
					}
		// insert pdts
		$inqry= "INSERT INTO `tbl_vendor_services` (`ser_auto_id`, `ser_user_id`, `ser_user_name`,`ser_service_name`, `ser_cat_id`, `ser_desc`, `ser_image`, `ser_state`, `ser_city`,`ser_area`, `ser_address_1`, `ser_address_2`, `ser_landmark`, `ser_pincode`, `ser_fax`, `ser_website`, `ser_phno`, `ser_mobno`, `ser_email`, `ser_status`) VALUES (NULL, '".$user_log_id_home."', '".$cont_name."', '".$serv_name."', '".$services_drop."' , '".$serv_desc."', '".$prod_image."', '".$states_drop."', '".$city_drop."', '".$area_drop."', '".$addr_1."', '".$addr_2."' , '".$landmark."', '".$pincode."', '".$fax."', '".$website."', '".$pno."', '".$mno."', '".$email."', '1')";
		$lastinsert_id = $userslog_obj->insertVal($inqry);
		}
		
	}
}


$chkqry_sts= "SELECT * FROM tbl_vendor_services where ser_user_id  = '".$user_log_id_home."' and ser_status = '1' ";
		$selectpdt_access= $userslog_obj->selectVal($chkqry_sts);
		$show_reg_form=1;
		if(count($selectpdt_access))
		{
		$show_reg_form=0;
		$smarty->assign('selectwed_count', $selectpdt_access );
		}
if($doit == 'add')
$show_reg_form = 1;
if ($show_reg_form) {
$content_template = '../templates/default/vendors/prod.tpl';
} else {
	$content_template = '../templates/default/vendors/pdt_home.tpl';
}

$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$sele_status = '<option value="0">Select State</option>';
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];
		$sele_status .= "<option value=$states_master_id>$states_name</option>";
	}
	}
$smarty->assign('tpl_sele_status', $sele_status);

$chkqry= "SELECT * FROM `ven_products` WHERE `pdt_status` = 1";
	$select_pdts= $userslog_obj->selectVal($chkqry);
	$sele_pdt = '<option value="0">Select Product Services</option>';
	if (count($select_pdts)){
	foreach($select_pdts as $key=>$field){
		$products_name= trim($field['pdt_products']);
		$pdt_auto_id= $field['pdt_auto_id'];
		$sele_pdt .= "<option value=$pdt_auto_id>$products_name</option>";
	}
	}
	$smarty->assign('tpl_sele_pdt', $sele_pdt);

$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );

/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do']; 

 


/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
