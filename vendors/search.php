<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mail_obj = new mails();
$vendor_obj = new vendor();
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_pdts');
$smarty->assign('pagetitle', 'wedding planners in india - InviteIndia.com');
$smarty->assign('metadesc', 'Find your wedding vendors with trusted reviews and organize your perfect wedding.');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Indian Wedding suppliers, Wedding products'); 
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);
if ($ven_login_panel == '0'){
//header('Location: login.php'); exit;
}


$base_rul = $_SERVER['REQUEST_URI'];
$search_pat = "/search.php/i";
preg_match($search_pat, $base_rul);
$path_dir = preg_match($search_pat, $base_rul) ? '' : '../vendors/';
//state_id=8&city_id=117

$err='';
$req_state_id=trim($_REQUEST['state_id']);
$req_city_id=trim($_REQUEST['city_id']);
$req_cat_id=trim($_REQUEST['cat_id']);
$req_area_id=trim($_REQUEST['area_id']);
if($req_state_id == '')
	$req_state_id = '0';
if($req_city_id == '')
	$req_city_id = '0';
if($req_area_id == '')
	$req_area_id = '0';
if($req_cat_id == '')
	$req_cat_id = '0';
$left_nav_title = '';
$global_state_name = $req_state_id ? $vendor_obj->selectStateNameById($req_state_id) : '';
$global_city_name = $req_city_id ? $vendor_obj->selectCityNameById($req_city_id) : '';
$global_area_name = $req_area_id ? $vendor_obj->selectAreaNameById($req_area_id) : '';
$global_pdt_name = $req_cat_id ? $vendor_obj->selectCatNameById($req_cat_id) : '';

$pageTitle = $vendor_obj->SeoPageTitle($global_pdt_name, $global_state_name, $global_city_name, $global_area_name);
$pageDesc = $vendor_obj->SeoPageMetaDesc($global_pdt_name, $global_state_name, $global_city_name, $global_area_name);
$pageKeywords = $vendor_obj->SeoPageKeyWords($global_pdt_name, $global_state_name, $global_city_name, $global_area_name);
$smarty->assign('pagetitle', $pageTitle);
$smarty->assign('metadesc', $pageDesc);
$smarty->assign('metakeywords', $pageKeywords);

$sqryval = "state_id=$req_state_id&city_id=$req_city_id";
$sqryval_en = base64_encode ( $sqryval."&area_id=$req_area_id&cat_id=$req_cat_id" );
//echo $sqryval_en;
//$sqryval_de = base64_decode ( $sqryval_en ); echo $sqryval_de;
$qrystringval = "search.php?$sqryval";
$smarty->assign('glb_qrystringval', $qrystringval);
$smarty->assign('glb_req_cat_id', $req_cat_id);
$selecity_left = '';
if($req_state_id != 0) {
	$left_nav_title = "Cities in $global_state_name";
	$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_state_id = $req_state_id and tbl_city_master_status = 1";
	$selecity_lefts= $userslog_obj->selectVal($chkqry);
	if (count($selecity_lefts)){
	foreach($selecity_lefts as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		$city_master_id= $field['tbl_city_master_id'];
		$area_name='';
		$surl = $vendor_obj->SeoURL($global_pdt_name, $global_state_name, $city_name, $area_name);
		/* if($req_city_id == $city_master_id)
		$selecity_left .= "<li><a href='search.php?state_id=$req_state_id&city_id=$city_master_id&cat_id=$req_cat_id'  class='selected'>$city_name</a></li>";
		else
		$selecity_left .= "<li><a href='search.php?state_id=$req_state_id&city_id=$city_master_id&cat_id=$req_cat_id'>$city_name</a></li>"; */

		//SEO_URL/28-469-170-6 => sub_str=$1&state_id=$2&city_id=$3&area_id=$4&cat_id=$5 
		$url_generate = "../$surl/$req_state_id-$city_master_id-0-$req_cat_id";
		if($req_city_id == $city_master_id)
		$selecity_left .= "<li><a href='$url_generate' class='selected'>$city_name</a></li>";
		else
		$selecity_left .= "<li><a href='$url_generate'>$city_name</a></li>";
	}
	}
}else{
	$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$left_nav_title = "States";
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];

		$area_name=''; $city_name=''; $surl=''; $url_generate='';
		$surl = $vendor_obj->SeoURL($global_pdt_name, $states_name, $city_name, $area_name);
		//SEO_URL/28-469-170-6 => sub_str=$1&state_id=$2&city_id=$3&area_id=$4&cat_id=$5 

		
		$prod_cnt = $vendor_obj->fetchProdCountByState($req_cat_id, $states_master_id);
		$url_generate = "../$surl/$states_master_id-0-0-$req_cat_id";
		$selecity_left .= "<li><a href='$url_generate'><span class='nav_txt'>$states_name</span><span class='sub_head up-margin badge badge-primary'>$prod_cnt</span></a></li>";


		//$selecity_left .= "<li><a href='search.php?state_id=$states_master_id&cat_id=$req_cat_id'>$states_name</a></li>";
	}
	}
}

	if($req_city_id != '' && $req_city_id != '0') {
	$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_city_area_cityid = $req_city_id";
//	echo $chkqry;
	$select_city= $userslog_obj->selectVal($chkqry);
	if (count($select_city)){
	$selecity_left = '';
	$left_nav_title = "Area's in $global_city_name";
	foreach($select_city as $key=>$field){
		$area_name= trim($field['tbl_city_area_name']);
		$area_id= $field['tbl_city_area_id'];
		$surl=''; $url_generate='';
		$surl = $vendor_obj->SeoURL($global_pdt_name, $global_state_name, $global_city_name, $area_name);
		$url_generate = "../$surl/$req_state_id-$req_city_id-$area_id-$req_cat_id";
		$selecity_left .= "<li><a href='$url_generate'>$area_name</a></li>";

		//$selecity_left .= "<li><a href='search.php?state_id=$req_state_id&city_id=$req_city_id&area_id=$area_id&cat_id=$req_cat_id'>$area_name</a></li>";
	}
	}
	}
	if($req_state_id == 8){
		$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_stage_area_stateid = $req_state_id";
		$select_city= $userslog_obj->selectVal($chkqry);
		if (count($select_city)){
		$selecity_left .= "<dt>Area</dt>";
		foreach($select_city as $key=>$field){
			$area_name= trim($field['tbl_city_area_name']);
			$area_id= $field['tbl_city_area_id'];
			$surl=''; $url_generate='';
			$surl = $vendor_obj->SeoURL($global_pdt_name, $global_state_name, $global_city_name, $area_name);
			$url_generate = "../$surl/$req_state_id-$req_city_id-$area_id-$req_cat_id";
			
			$selecity_left .= "<li><a href='$url_generate'>$area_name</a></li>";
			//$selecity_left .= "<li><a href='search.php?state_id=$req_state_id&city_id=$req_city_id&cat_id=$req_cat_id'>$area_name</a></li>";
		}
		}
	}
// Fetch Services from Database  - Start
$fetchpdts_qry='';
//echo '<br>---'.$req_area_id;
$cityenable =0 ;
if ($req_city_id != 0 && $req_city_id != ''){ 
$cityenable =1 ;
}
//echo '---'.$cityenable.'===';
$url_generate = "../Wedding-services-in-India/0-0-0-0";
$breadcramps = "<li class='first-crumb'><a href='$url_generate'>Home</a></li>";
$statename = '';
if ($req_state_id != 0 && $req_state_id != ''){
$fetchpdts_qry .= " a.ser_state = $req_state_id and ";
$sqry = "SELECT tbl_states_master_name FROM `tbl_states_master` where tbl_states_master_id = $req_state_id";
$sqry= $userslog_obj->selectVal($sqry);
$statename = trim($sqry[0]['tbl_states_master_name']);
if ($cityenable){
			$surl=''; $url_generate=''; $area_name = ''; $city_name = '';
			$surl = $vendor_obj->SeoURL($global_pdt_name, $global_state_name, $city_name, $area_name);
			$url_generate = "../$surl/$req_state_id-0-0-$req_cat_id";
			$breadcramps .= "<li><a href='$url_generate'>$statename</a></li>";
}else{
$breadcramps .= "<li class='last-crumb'>$statename</li>";
}
}
if ($cityenable){
$fetchpdts_qry .= " a.ser_city = $req_city_id and ";
$sqry = "SELECT tbl_city_master_name FROM `tbl_city_master` where tbl_city_master_id = $req_city_id";
$sqry= $userslog_obj->selectVal($sqry);
$cityname = trim($sqry[0]['tbl_city_master_name']);
$breadcramps .= "<li class='last-crumb'>$cityname</li>";
}


if ($req_area_id != 0 && $req_area_id != ''){
$fetchpdts_qry .= " a.ser_area = $req_area_id and ";
}
if ($req_cat_id != 0 && $req_cat_id != ''){
$fetchpdts_qry .= " a.ser_cat_id = $req_cat_id and ";
}

$rec_found=0;
//$select_services_qry = "SELECT * FROM `tbl_vendor_services` where $fetchpdts_qry ser_status = 1";
$select_services_qry = "SELECT a.ser_auto_id, a.ser_service_name, a.ser_desc, a.ser_address_1, a.ser_address_2, a.ser_user_name, a.ser_cat_id , a.ser_state, a.ser_city, a.ser_area, a.ser_landmark, a.ser_pincode, a.ser_phno, a.ser_mobno, a.ser_image, a.ser_short_desc, a.ser_user_id, b.tbl_states_master_name FROM `tbl_vendor_services` a, `tbl_states_master` b where $fetchpdts_qry a.ser_status = 1 and b.tbl_states_master_id = a.ser_state and b.`tbl_states_master_status` = 1";
//SELECT a.ser_service_name, a.ser_desc, a.ser_address_1, a.ser_address_2, a.ser_user_name, a.ser_cat_id , a.ser_state, a.ser_city, a.ser_area, a.ser_landmark, a.ser_pincode, a.ser_phno, a.ser_mobno, b.tbl_states_master_name FROM `tbl_vendor_services` a, `tbl_states_master` b where b.tbl_states_master_id = a.ser_state and ser_state = 28 and ser_city = 469 and ser_area = 253 and ser_cat_id = 5 and ser_status = 1 

//echo $select_services_qry;
$services_qry= $userslog_obj->selectVal($select_services_qry);
	$pdt_contents_tmpl='';
	$back_links='';
	$surl = $vendor_obj->SeoURL($global_pdt_name, $global_state_name, $global_city_name, $global_area_name);
	$back_links = "../../$surl/$req_state_id-$req_city_id-$req_area_id-$req_cat_id";
	$back_links = base64_encode($back_links);
	if (count($services_qry)){
	foreach($services_qry as $key=>$field){
		$ser_service_name= trim($field['ser_service_name']);
		$ser_user_id= $field['ser_user_id'];
		$ser_image= $field['ser_image'];
		$ser_short_desc= $field['ser_short_desc'];
		$ser_address_1= $field['ser_address_1'];

		$ser_phno= $field['ser_phno'];
		$ser_mobno= $field['ser_mobno'];
		$ser_address_1= $field['ser_address_1'];
		if($ser_mobno != '')
			$phno = 'Mobile - '.$ser_mobno;
		else if($ser_phno != '')
			$phno = 'Phone - '.$ser_phno;
		
		$ser_auto_id= $field['ser_auto_id'];
		$short_location = '';
		
		$ser_city= $field['ser_city'];		
		$sqry_city = "SELECT tbl_city_master_name FROM `tbl_city_master` where tbl_city_master_id = $ser_city";
		if($sqry_city) {
		$sqry_city= $userslog_obj->selectVal($sqry_city);
		$citynames = trim($sqry_city[0]['tbl_city_master_name']);
		$short_location = $citynames. "<br />";
		}
		$states_master_name= $field['tbl_states_master_name'];
		$short_location .= $states_master_name;
		$surl = $path_dir.$ser_service_name;
		if($citynames != '')
		$surl .= " in $citynames";

		if($states_master_name != '')
		$surl .= ", $states_master_name";
		$surl = trim($surl);
		$surl = str_replace(' ', '_', $surl);

		$sqryval_en= $field['sqryval_en'];

		$pdt_contents_tmpl .= "<div class='vendor_bg'>
							<div class='title'>$ser_service_name</div>
							<div class='vendor_bg_left'>
								 <img src='../templates/default/mrg_template/vendors/$ser_user_id/$ser_image' class='img-thumbnail' alt='sssss'>
							</div>
							<div class = 'vendor_bg_right agileits_services_grid'>
								<span class='sub_head_min'>$ser_short_desc</span>
								<p class='comment-metadata'>$short_location </br>$phno</p>
								<p class='text-right'><a href='$surl/$ser_auto_id-res-$back_links'>More..</a></p>
							</div>
							<h3>&nbsp;</h3>
						</div><div>&nbsp;</div>";
	}
	}

/*		
<div class='vendor_bg_left'>
								<img src='../templates/default/mrg_template/vendors/$ser_user_id/$ser_image' class='img-thumbnail' alt='sssss'>
							</div>
							
							<div class = 'vendor_bg_right agileits_services_grid'>
								<span class='sub_head_min'>$ser_short_desc</span>
								<p class='comment-metadata'>$short_location </br>$phno</p>
								<p class='text-right'><a href='view.php?pdtid=$ser_auto_id&from=res&ur=$sqryval_en'>More..</a></p>
							</div>
							
							{if $v.ser_address_2 neq ''}&nbsp;,{$v.ser_address_2|ucfirst}{/if}
								{if $v.ser_landmark neq ''}&nbsp;,{$v.ser_landmark|ucfirst}{/if}
								{if $v.ser_pincode neq ''}&nbsp;,Pin - {$v.ser_pincode}{/if}

								*/

if(count($services_qry)){
$smarty->assign('searchrecs', $services_qry );
$rec_found=1;
}else{
$rec_found=0;
}

	/******* To generate Stage, City, Area & Cat drop downs - Quick Search section --- Begin************/
	$chkqry= "SELECT tbl_states_master_id, tbl_states_master_name FROM `tbl_states_master` WHERE `tbl_states_master_status` = 1";
	$select_states= $userslog_obj->selectVal($chkqry);
	$sele_status = '<option value="0">Select State</option>';
	if (count($select_states)){
	foreach($select_states as $key=>$field){
		$states_name= trim($field['tbl_states_master_name']);
		$states_master_id= $field['tbl_states_master_id'];
		if ($req_state_id != 0 && $req_state_id != '' && $states_master_id == $req_state_id){
		$sele_status .= "<option value=$states_master_id selected='selected'>$states_name</option>";
		}else{
		$sele_status .= "<option value=$states_master_id>$states_name</option>";
		}
	}
	}


	if ($req_state_id != 0) {
		$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_status = 1 and tbl_city_master_state_id = $req_state_id";
	}else{
		$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_status = 1 and ";
	}
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_city = '<option value="0">Select City</option>';
	if (count($select_city)){
	foreach($select_city as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		$city_master_id= $field['tbl_city_master_id'];
		if ($req_city_id == $city_master_id){
		$sele_city .= "<option value=$city_master_id selected='selected'>$city_name</option>";
		} else {
		$sele_city .= "<option value=$city_master_id>$city_name</option>";
		}
	}
	}
	
	/******* To generate Stage, City, Area & Cat drop downs - Quick Search section --- End ************/



$chkqry= "SELECT * FROM `ven_products` WHERE `pdt_status` = 1";
	$select_pdts= $userslog_obj->selectVal($chkqry);
	$right_side_nav='';
	$sele_pdt = '<option value="0">Select Product Services</option>';
	$surl=''; $url_generate=''; $products_name='';
	$surl = $vendor_obj->SeoURL($products_name, $global_state_name, $global_city_name, $global_area_name);
	$url_generate = "../$surl/$req_state_id-$req_city_id-$req_area_id-$pdt_auto_id";
	$right_side_nav .= "<li><a href='$url_generate'>All</a></li>";

	if (count($select_pdts)){
	foreach($select_pdts as $key=>$field){
		$products_name= trim($field['pdt_products']);
		$pdt_auto_id= $field['pdt_auto_id'];
		$surl=''; $url_generate='';
		$surl = $vendor_obj->SeoURL($products_name, $global_state_name, $global_city_name, $global_area_name);
		$url_generate = "../$surl/$req_state_id-$req_city_id-$req_area_id-$pdt_auto_id";


		if($req_cat_id != $pdt_auto_id) {
		$right_side_nav .= "<li><a href='$url_generate'>$products_name</a></li>";
		$sele_pdt .= "<option value=$pdt_auto_id>$products_name</option>";
		} else {
		$right_side_nav .= "<li><a href='$url_generate' class='selected'>$products_name</a></li>";
		$sele_pdt .= "<option value=$pdt_auto_id selected='selected'>$products_name</option>";
		}
		

	}
	}
$smarty->assign('tpl_left_nav_title', $left_nav_title);
$smarty->assign('tpl_right_side_nav', $right_side_nav);

$smarty->assign('tpl_sele_city', $sele_city);
$smarty->assign('tpl_sele_pdt', $sele_pdt);
$smarty->assign('tpl_sele_status', $sele_status);

$smarty->assign('pdt_contents_tmpl', $pdt_contents_tmpl);

$smarty->assign('glb_tmp_vendors_path', $glb_vendors_path );
$smarty->assign('glb_path_dir', $path_dir );

$smarty->assign('sqryval_en', $sqryval_en );
$smarty->assign('tot_breadcramps', $breadcramps );
$smarty->assign('tot_rec_found', $rec_found );
// Fetch Services from Database  - End
$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );
$smarty->assign('glb_selecity_left', $selecity_left);
//$meta_search_hide = 1;
$smarty->assign('glb_meta_search_hide', $meta_search_hide);
$content_template = '../templates/default/vendors/search.tpl';
if($isMobile)
$content_template = '../templates/default/vendors/search_mobile.tpl';
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
