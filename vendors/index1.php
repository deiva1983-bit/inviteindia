<?php 
/*----- Include Files -----*/
include_once( '../includes/configs/init.php' ); 
 /*----- Object creation Start-----*/
$userslog_obj = new userslog();
 
/*----- Object creation End -----*/
/*----- Variables Declaration Start-----*/
$smarty->assign('topnav_select', 'vendors');
$smarty->assign('currentpage_js', 'vendors_home');
$smarty->assign('pagetitle', 'The Complete Wedding Vendor Directory - InviteIndia.com');
$smarty->assign('metadesc', 'We have compiled an extensive list of wedding vendors from around the world. Find the best wedding vendors near you! Compare reviews, prices, and other vendors.');
$smarty->assign('metakeywords', 'Indian Wedding Vendors, Wedding suppliers, Wedding planners, Wedding services');
 $smarty->assign('glb_site_url', $glb_site_url);
$user_log_id_home= trim($_SESSION['sess_ven_user_id']);
$ven_login_panel= trim($user_log_id_home) != "" ? 1 : 0; 
$smarty->assign('user_log_id_vend', $ven_login_panel);
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

	$indextmpl="
			<div class='w3ls_banner_bottom_grids'>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>A</div>
					<div>
						<p><a href='Astrology-Services-2'>Astrology Services</a></p>
						<p><a href='Audio-Rentals-3'>Audio Rentals</a></p>
						<p><a href='Auditorium-4'>Auditorium</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>B</div>
					<div>
						<p><a href='Balloons-5'>Balloons</a></p>
						<p><a href='Bands-6'>Bands</a></p>
						<p><a href='Beauty-Parlours-7'>Beauty Parlours</a></p>
						<p><a href='Bridal-Products-1'>Bridal Products</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>C</div>
					<div>
						<p><a href='Cake-Shops-8'>Cake Shops</a></p>
						<p><a href='Car-rental-9'>Car rental</a></p>
						<p><a href='Caterers-10'>Caterers</a></p>
						<p><a href='Cosmetic-Surgeons-12'>Cosmetic Surgeons</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>F</div>
					<div>
						<p><a href='Farm-House-14'>Farm House</a></p>
						<p><a href='Floral-decors-15'>Floral decors</a></p>
						<p><a href='Footwear-16'>Footwear</a></p>
					</div>
			</div>
			<div class='clearfix'> </div>
			</div>

			<div class='w3ls_banner_bottom_grids'>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>G</div>
					<div>
						<p><a href='Gifts-17'>Gifts</a></p>
						<p><a href='Greeting-Card-18'>Greeting Card</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>H</div>
					<div>
					<p><a href='Hotel-Halls-19'>Hotel Halls</a></p>
					<p><a href='Hotels-20'>Hotels</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>I</div>
					<div>
						<p><a href='Invitation-shops-21'>Invitation shops</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>J</div>
					<div>
					<p><a href='Jewellers-22'>Jewellers</a></p>
					</div>
			</div>
			<div class='clearfix'> </div>
			</div>

			<div class='w3ls_banner_bottom_grids'>

			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>L</div>
					<div>
						<p><a href='{$tpl_qry_search_file}24'>Lighting services</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>M</div>
					<div>
						<p><a href='Magic-shows-25'>Magic shows</a></p>
						<p><a href='Mandaps-26'>Mandaps</a></p>
						<p><a href='Mehendi-27'>Mehendi</a></p>
						<p><a href='Musicians-28'>Musicians</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>O</div>
					<div>
					<p><a href='Open-Space-30'>Open Space</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>P</div>
					<div>
						<p><a href='Photography-32'>Photography</a></p>
					</div>
			</div>
			<div class='clearfix'> </div>
			</div>

			<div class='w3ls_banner_bottom_grids'>

			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>R</div>
					<div>
						<p><a href='Reception-Music-34'>Reception Music</a></p>
						<p><a href='Resorts-36'>Resorts</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>S</div>
					<div>
						<p><a href='Saloons-37'>Saloons</a></p>
						<p><a href='Sarees-38'>Sarees</a></p>
						<p><a href='Suits-39'>Suits</a></p>
						<p><a href='Sweet-shops-41'>Sweet shops</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>T</div>
					<div>
					<p><a href='Transportation-42'>Transportation</a></p>
					<p><a href='Travel-Agencies-43'>Travel Agencies</a></p>
					</div>
			</div>
			<div class='col-md-3 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>V</div>
					<div>
					<p><a href='Videography-44'>Videography</a></p>
					</div>
			</div>
			<div class='clearfix'> </div>
			</div>

		<div class='w3ls_banner_bottom_grids'>

			<div class='col-md-6 agileits_services_grid'>
					<div class='sub_head up-margin badge badge-primary'>W</div>
					<div>
					<p><a href='Wedding_hall-decorators-45'>Wedding hall decorators</a></p>
					</div>
			</div>
			<div class='clearfix'> </div>
		</div>";
	

$smarty->assign('tpl_indextmpl', $indextmpl);
$smarty->assign('tpl_sele_pdt', $sele_pdt);
$qry_search='&do=get';
$qry_search_file='search.php?cat_id=';
$smarty->assign('tpl_qry_search_file', $qry_search_file);
$smarty->assign('tpl_qry_search', $qry_search);
$smarty->assign('tpl_sele_status', $sele_status);
$smarty->assign('top_nav', $smarty->fetch('../templates/default/vendors/topnav.tpl') );
$content_template = '../templates/default/vendors/home.tpl';
if($isMobile)
$content_template = '../templates/default/vendors/home_mobile.tpl';
$canurl = $ssl_path.'www.inviteindia.com/vendors/index.php';
$smarty->assign('can_url', $canurl);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('../templates/default/vendors/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('../../templates/default/index.tpl');
?>
