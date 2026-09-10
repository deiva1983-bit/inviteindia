<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
include('../includes/functions/simpleimage.php');
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
header('Location: index-business.php'); exit;
}
$err='';
$doit=trim($_REQUEST['do']);
$page_acc = '';


$chkqry_mas= "SELECT * FROM `tbl_vendor_service` WHERE `tbl_vendor_id` = '".$user_log_id_home."'";
$select_cat_mas= $userslog_obj->selectVal($chkqry_mas);
$smarty->assign('page_access', 'add' );
if (count($select_cat_mas)){
	$smarty->assign('select_general_services', $select_cat_mas );
	$smarty->assign('page_access', 'edit' );
}

$chk_pre_rec= "SELECT * FROM `tbl_vendor_service` WHERE `tbl_vendor_id` = '".$user_log_id_home."'";
$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);

$action = count($select_pre_rec) ? "E" : "A";
$action_base_id = $select_pre_rec[0]['tbl_vendor_service_id'];
$tbl_cat_select = $select_pre_rec[0]['business_category'];
$states_drop = $select_pre_rec[0]['business_state_id'];
$city_drop = $select_pre_rec[0]['business_city_id'];

$service_logo = trim($_FILES['uploaded_service_logo']['name']) ;


if($doit == "man") {
	
	$prod_hidd=trim($_REQUEST['sub_prod_hidd']);
	if($prod_hidd == 'addp'){
		$txt_business_name=addslashes(trim($_REQUEST['txt_business_name']));
		$tbl_cat_select=addslashes(trim($_REQUEST['tbl_cat_select']));
		$txt_website=trim($_REQUEST['txt_website']);
		$txt_email_addr=addslashes(trim($_REQUEST['txt_email_addr']));
		//$service_logo = addslashes(trim($_FILES['uploaded_service_logo']['name']));
		$txt_ph_no=trim($_REQUEST['txt_ph_no']);
		$txt_alt_ph_no=trim($_REQUEST['txt_alt_ph_no']);
		$txt_addr_1=addslashes(trim($_REQUEST['txt_addr_1']));
		$txt_addr_2=addslashes(trim($_REQUEST['txt_addr_2']));
		$states_drop=trim($_REQUEST['states_drop']);
		$city_drop=trim($_REQUEST['city_drop']);
		$area_drop=trim($_REQUEST['area_drop']);
		$txt_postal_code=trim($_REQUEST['txt_postal_code']);
		$date = date('Y-d-m');
		$uploaded_image= trim($_REQUEST['uploaded_image']);

		$pro_img = trim($_FILES['upload_image']['name']) ;
		$dirName = "assets/$user_log_id_home";
			if (is_dir($dirName)){}else{
				try {
					mkdir($dirName, 0755, TRUE);
					} catch(ErrorException $ex) {
					echo "Error: " . $ex->getMessage();
					}
				}
			$dirName .= '/';
			$uploaded_image = '';
		if($pro_img != ''){
		$pro_img_txt = strtolower(strrchr($pro_img,'.'));
		if($pro_img_txt == '.jpg' or $pro_img_txt == '.jpeg' or $pro_img_txt == '.gif' or $pro_img_txt == '.png'){
			$pro_img_name=$user_log_id_home.'_cover_photo.jpg';
			$target_path=$dirName. $pro_img_name;
			move_uploaded_file($_FILES['upload_image']['tmp_name'], $target_path);
			$image = new SimpleImage();
			$image->load($target_path);
			//echo $image->getHeight(); echo '...';
			//echo $image->getWidth(); 
			if ($image->getWidth() > 700) {
			//$image->resizeToWidth(700);
			} else if ($image->getHeight() > 530) {
			//$image->resizeToHeight(530);
			}
			//$image->resizeToWidth(700);
			$image->resize(700,530);
			//echo $image->getHeight(); echo '...';
			//echo $image->getWidth(); 
			//$image->resizeToWidth(700);
			$image->save("assets/$user_log_id_home/".$pro_img_name);
			}
			$uploaded_image =", `business_profile_pic` = '".$target_path."'";
		}
		$prod_image = '';
		// insert pdts
		if($action == 'A') {
		$inqry= "INSERT INTO `tbl_vendor_service` (`tbl_vendor_service_id`,`tbl_vendor_id`,`business_date`,`business_name`,`business_category`, `business_website_url`,`business_email_address`,`business_phone_number`,`business_phone_alternate_number`,`business_address1`,`business_address2`, `business_state_id`,`business_city_id`,`business_area_id`,`business_postal`,`business_status`, `business_profile_pic`) VALUES (NULL, '".$user_log_id_home."', '".$date."', '".$txt_business_name."', '".$tbl_cat_select."', '".$txt_website."' , '".$txt_email_addr."', '".$txt_ph_no."', '".$txt_alt_ph_no."', '".$txt_addr_1."', '".$txt_addr_2."', '".$states_drop."', '".$city_drop."', '".$area_drop."' , '".$txt_postal_code."', '1', '".$target_path."')";
		$lastinsert_id = $userslog_obj->insertVal($inqry);
		} else if ($action == 'E') {
		$upqry= "UPDATE `tbl_vendor_service` SET `business_name` = '".$txt_business_name."',`business_category` = '".$tbl_cat_select."',`business_website_url` = '".$txt_website."', `business_email_address` = '".$txt_email_addr."', `business_phone_number` = '".$txt_ph_no."',`business_phone_alternate_number` = '".$txt_alt_ph_no."', `business_address1` = '".$txt_addr_1."', `business_address2` = '".$txt_addr_2."',`business_state_id` = '".$states_drop."',`business_city_id` = '".$city_drop."', `business_area_id` = '".$area_drop."', `business_postal` = '".$txt_postal_code."' $uploaded_image WHERE `tbl_vendor_service_id` ='".$action_base_id."' and `tbl_vendor_id` = '".$user_log_id_home."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		}
		//}
		
	}
}


$chkqry= "SELECT * FROM `service_cat` WHERE `service_cat_status` = 1";
	$select_cat= $userslog_obj->selectVal($chkqry);
	$sele_cat = '<option value="0">Select a category</option>';
	if (count($select_cat)){
	foreach($select_cat as $key=>$field){
		$service_cat_id= trim($field['service_cat_id']);
		$service_cat_name= trim($field['service_cat_name']);
		if($service_cat_id == $tbl_cat_select)
			$sele_cat .= "<option value=$service_cat_id selected>$service_cat_name</option>";
		else
			$sele_cat .= "<option value=$service_cat_id>$service_cat_name</option>";
	}
	}
$smarty->assign('tpl_sele_cat', $sele_cat);

$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$sele_status = '<option value="0">Select State</option>';
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];
		if($states_drop == $states_master_id)
			$sele_status .= "<option value=$states_master_id selected>$states_name</option>";
		else
			$sele_status .= "<option value=$states_master_id>$states_name</option>";
	}
	}
$smarty->assign('tpl_sele_status', $sele_status);

if($city_drop != 0) {
	$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_state_id = $states_drop and tbl_city_master_status = 1";
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_city = '<select id="city_drop" name ="city_drop" class="inputval"><option value="0">Select City</option>';
	if (count($select_city)){
	foreach($select_city as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		//echo $city_name;
		$city_master_id= $field['tbl_city_master_id'];
		if($city_master_id == $city_drop)
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

$smarty->assign('tpl_sele_pdt', $sele_pdt);

$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );

$chk_pre_rec= "SELECT * FROM `tbl_vendor_service` WHERE `tbl_vendor_id` = '".$user_log_id_home."' ";
$select_pre_rec= $userslog_obj->selectVal($chk_pre_rec);
$business_name = stripslashes(trim($select_pre_rec[0]['business_name']));
$business_category = stripslashes(trim($select_pre_rec[0]['business_category']));
$business_website_url = stripslashes(trim($select_pre_rec[0]['business_website_url']));
$business_email_address = stripslashes(trim($select_pre_rec[0]['business_email_address']));
$business_phone_number = stripslashes(trim($select_pre_rec[0]['business_phone_number']));
$business_phone_alternate_number = stripslashes(trim($select_pre_rec[0]['business_phone_alternate_number']));
$business_address1 = stripslashes(trim($select_pre_rec[0]['business_address1']));
$business_address2 = stripslashes(trim($select_pre_rec[0]['business_address2']));
$business_postal = stripslashes(trim($select_pre_rec[0]['business_postal']));
$business_profile_pic = stripslashes(trim($select_pre_rec[0]['business_profile_pic']));
$smarty->assign('tpl_business_name', $business_name );
$smarty->assign('tpl_business_category', $business_category );
$smarty->assign('tpl_business_website_url', $business_website_url );
$smarty->assign('tpl_business_email_address', $business_email_address );
$smarty->assign('tpl_business_phone_number', $business_phone_number );
$smarty->assign('tpl_business_phone_alternate_number', $business_phone_alternate_number );
$smarty->assign('tpl_business_address1', $business_address1 );
$smarty->assign('tpl_business_address2', $business_address2 );
$smarty->assign('tpl_business_postal', $business_postal );
$smarty->assign('tpl_business_profile_pic', $business_profile_pic );

$smarty->assign('select_general_services', $select_pre_rec );

$smarty->assign('top_nav', $smarty->fetch("$vendors_tpl_path/topnav.tpl") );


/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do']; 

$content_template = "$vendors_tpl_path/business-supplier.tpl"; 
 


/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch("$vendors_tpl_path/header.tpl") );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch("$vendors_tpl_path/../footer.tpl") );
/*----- Include Files Details End-----*/
$smarty->display("../../templates/default/index.tpl");
?>
