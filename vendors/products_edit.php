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
$smarty->assign('user_log_id_vend', $user_log_id_home);
if ($ven_login_panel == '0'){
header('Location: login.php'); exit;
}
//echo $user_log_id_home;
$err='';
$doit=trim($_REQUEST['do']);
$editid=trim($_REQUEST['id']);
$prod_sts =trim($_REQUEST['sub_prod_sts']);
$prod_id =trim($_REQUEST['sub_prod_id']);
if($prod_sts == 'editp' and $prod_id != ''){
	$chkqry_sts= "SELECT * FROM tbl_vendor_services where ser_user_id  = '".$user_log_id_home."' and ser_status = '1' ";
		$selectpdt_access= $userslog_obj->selectVal($chkqry_sts);
		$show_reg_form=1;
		$cont_name=addslashes(trim($_REQUEST['ven_cont_name']));
		$serv_name=addslashes(trim($_REQUEST['ven_serv_name']));
		$services_drop=addslashes(trim($_REQUEST['pdt_services_drop']));
		$serv_desc=addslashes(trim($_REQUEST['ven_serv_desc']));
		$service_logo = trim($_FILES['uploaded_service_logo']['name']) ;
		$states_drop=trim($_REQUEST['states_drop']);
		$city_drop=trim($_REQUEST['city_drop']);
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
//echo $serv_name.'--'.$services_drop.'--'.$serv_desc.'--'.$services_drop.'--'.$city_drop.'--'.$addr_1.'--'.$pincode;
		if($cont_name != '' and $serv_name != '' and $services_drop != 0 and $serv_desc != '' and $states_drop != 0 and $city_drop != 0 and $addr_1 != '' and $pincode != '') { //echo '1111';
		$prod_image = ''; $pdtin = '';
		if($service_logo != ''){
					$dirName = "../templates/default/mrg_template/vendors/$user_log_id_home";
					if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
					$dirName = $dirName.'/';
					echo $service_logo;
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
					$pdtin = " `ser_image` = '".$prod_image."' ,";
					} else {
					$pdtin = '';
					}
					
		// insert pdts
		$upqry= "UPDATE `tbl_vendor_services` SET `ser_user_name` = '".$cont_name."',`ser_service_name` = '".$serv_name."',`ser_cat_id` = '".$services_drop."', ser_desc = '".$serv_desc."', $pdtin `ser_state` = '".$states_drop."',`ser_city` = '".$city_drop."', `ser_area` = '".$area_drop."', `ser_address_1` = '".$addr_1."',`ser_address_2` = '".$addr_2."',`ser_landmark` = '".$landmark."', `ser_pincode` = '".$pincode."', `ser_fax` = '".$fax."', `ser_website` = '".$website."',`ser_phno` = '".$pno."', `ser_mobno` = '".$mno."', `ser_email` = '".$email."' WHERE `ser_user_id` ='".$user_log_id_home."' and `ser_auto_id` = '".$prod_id."' LIMIT 1 " ;
		//echo $upqry;
		$order_list_id = $userslog_obj->updateVal($upqry);
		}

		if(count($selectpdt_access)){
		$show_reg_form=0;
		$smarty->assign('selectwed_count', $selectpdt_access );
		}
}

$ser_id = 0; $state_id =0;  $city_id=0; $area_id_t=0;
if($doit == 'edit') {
$chkqry_sts= "SELECT * FROM tbl_vendor_services where ser_user_id  = '".$user_log_id_home."' and ser_auto_id  = '".$editid."' and ser_status = '1' ";
		$selectpdt_access= $userslog_obj->selectVal($chkqry_sts);
		//echo $chkqry_sts;
		$show_reg_form=1;
		if(count($selectpdt_access)){
		$show_reg_form=0;
		$ser_id = $selectpdt_access[0]['ser_cat_id'];
		$state_id = $selectpdt_access[0]['ser_state'];
		$city_id = $selectpdt_access[0]['ser_city'];
		$area_id_t = $selectpdt_access[0]['ser_area'];
		$smarty->assign('selectwed_count', $selectpdt_access );
		$content_template = '../templates/default/vendors/pdt_home_edit.tpl';
		}
}

$chkqry= "SELECT * FROM `ven_products` WHERE `pdt_status` = 1";
	$select_pdts= $userslog_obj->selectVal($chkqry);
	$sele_pdt = '<option value="0">Select Product Services</option>';
	if (count($select_pdts)){
	foreach($select_pdts as $key=>$field){
		$products_name= trim($field['pdt_products']);
		$pdt_auto_id= $field['pdt_auto_id'];
		if($ser_id == $pdt_auto_id)
			$sele_pdt .= "<option value=$pdt_auto_id selected='selected'>$products_name</option>";
		else
			$sele_pdt .= "<option value=$pdt_auto_id>$products_name</option>";
	}
	}
	$smarty->assign('tpl_sele_pdt', $sele_pdt);
$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$sele_status = '<option value="0">Select State</option>';
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];
		if($states_master_id == $state_id)
		$sele_status .= "<option value=$states_master_id selected='selected'>$states_name</option>";
			else
		$sele_status .= "<option value=$states_master_id>$states_name</option>";
	}
	}

if($city_id != 0) {
	$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_state_id = $state_id and tbl_city_master_status = 1";
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_city = '<select id="city_drop" name ="city_drop" class="inputval"><option value="0">Select City</option>';
	if (count($select_city)){
	foreach($select_city as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		//echo $city_name;
		$city_master_id= $field['tbl_city_master_id'];
		if($city_master_id == $city_id)
		$sele_city .= "<option value=$city_master_id selected='selected'>$city_name</option>";
			else
		$sele_city .= "<option value=$city_master_id>$city_name</option>";
		
	}
	$sele_city .= "</select>";
	}
}else{
$sele_city = "<select id='city_drop' name='city_drop' class='inputval' ><option value='0'>Select City</option></select>";
}

$smarty->assign('tpl_sele_city', $sele_city);
$smarty->assign('tpl_city_id_hidd', $city_id);
$smarty->assign('tpl_area_id_hidd', $area_id);
$smarty->assign('tpl_sele_status', $sele_status);
$smarty->assign('tpl_sele_areas', $sele_area);
$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );

/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do']; 

 

echo $content_template;
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
