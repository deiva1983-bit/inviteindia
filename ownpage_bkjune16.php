<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$validator_obj = new Validator();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Free wedding website | Create Online wedding invitation";
$home_page_meta_desc = "online wedding invitation website. Create your wedding invitation with colourful themes with more features and share with your friends";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";
$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$smarty->assign('currentpage_js', 'own_page');
$wedid= trim($_REQUEST['wed_id']);
$listid= trim($_REQUEST['list_id']);
$parahid= trim($_REQUEST['parah_id']);

$smarty->assign('local_add', $local_add);
$create_ownpage= trim($_REQUEST['butt_create_ownpage']);
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid); 
$show_err=0; $show_sts=0; $succ_msg='';
if($page_allowed && $listid != ''){
	//***********************DELETE PARAH****************************//
	$dele_p1 = trim($_REQUEST['p1']);
	$del = 0;
	//echo $dele_p1;
	if($dele_p1 == 'd'){
		$dele_parah = perform_delete($wedid, $listid, $parahid);
		$del = 1;
	}
	if($del){
		header("Location: ownpage.php?wed_id=$wedid&list_id=$listid&do=kavied&del=1");
		exit;
	}
	//***************************************************//
	$selectqry = "SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' order by wed_parah_count_id ";
	$selectqry_rows = $userslog_obj->selectAffectedRows($selectqry);
	$p1 = 0; $rowcount = 0;
	if($selectqry_rows){
	$p1 = 1;
	$rowcount = $selectqry_rows;
	$selectqry_values= $userslog_obj->selectVal($selectqry);
	$smarty->assign('glb_pgeinfos', $selectqry_values);
	}
	++$rowcount;
	//***************************************************//
	// Parah 1 Operations
	// Image Upload
		$add_image_p1 = trim($_REQUEST['save_p1']);
		$add_image_p2 = trim($_REQUEST['save_right']);
		$add_image_p3 = trim($_REQUEST['save_no_img']);
		
		
		if($add_image_p1 == 'Save') {
			//print ($_FILES['uploaded_image_1']['name']); print 'eee';
			$errors = '<ul>'; $msg_sts = 0;
			if(trim($_FILES['uploaded_image_'.$rowcount]['name']) == '' ){
			$errors .= '<li> Please upload your image.</li>';
			$msg_sts = 1;
			}
		$add_title_p1 = trim($_REQUEST['title_p'.$rowcount]);
		$infos_val_1 = addslashes(trim($_REQUEST['txt_area_left_infos_'.$rowcount]));
		$infos_1 = (strlen ($infos_val_1) < 5 ) ? '' : $infos_val_1 ;
		$validateevents = ( $infos_1 != '') ? 1 : 0 ;
		if (!$validateevents){
			$errors .= '<li> Please your text.</li>';
			$msg_sts = 1;
		}
		$errors .= '</ul>';
		$smarty->assign('errors', $errors);
		//$sett_val = perform_imgupload($wedid, $listid, $_FILES['uploaded_image_6853305'], $user_log_id, 1);
			if(!$msg_sts){
			$image_sett = up_setting($wedid, $rowcount, $infos_val_1, $_FILES['uploaded_image_'.$rowcount], $add_title_p1, 1, $listid);
			$show_sts=1;
			$succ_msg = 'Your parah settings successfully updated.';
			}
		}


	if($add_image_p2 == 'Save') {
			//print ($_FILES['uploaded_image_1']['name']); print 'eee';
			$errors = '<ul>'; $msg_sts = 0;
			if(trim($_FILES['uploaded_rightimage_'.$rowcount]['name']) == '' ){
			$errors .= '<li> Please upload your image.</li>';
			$msg_sts = 1;
			}
		$add_title_p1 = trim($_REQUEST['title_right_p'.$rowcount]);
		$infos_val_1 = addslashes(trim($_REQUEST['txt_area_right_infos_'.$rowcount]));
		$infos_1 = (strlen ($infos_val_1) < 5 ) ? '' : $infos_val_1 ;
		$validateevents = ( $infos_1 != '') ? 1 : 0 ;
		if (!$validateevents){
			$errors .= '<li> Please your text.</li>';
			$msg_sts = 1;
		}
		$errors .= '</ul>';
		$smarty->assign('errors', $errors);
		//function up_setting($wedid, $parahid, $parah_texts, $files, $title_val, $parah_align, $listid) {
			if(!$msg_sts){
			$image_sett = up_setting($wedid, $rowcount, $infos_val_1, $_FILES['uploaded_rightimage_'.$rowcount], $add_title_p1, 2, $listid);
			$show_sts=1;
			$succ_msg = 'Your parah settings successfully updated.';
			}
		}

	if($add_image_p3 == 'Save') {
			//print ($_FILES['uploaded_image_1']['name']); print 'eee';
			$errors = '<ul>'; $msg_sts = 0;
		$add_title_p1 = trim($_REQUEST['title_no_img_p'.$rowcount]);
		$infos_val_1 = addslashes(trim($_REQUEST['txt_area_noimg_infos_'.$rowcount]));
		$infos_1 = (strlen ($infos_val_1) < 5 ) ? '' : $infos_val_1 ;
		$validateevents = ( $infos_1 != '') ? 1 : 0 ;
		if (!$validateevents){
			$errors .= '<li> Please your text.</li>';
			$msg_sts = 1;
		}
		$errors .= '</ul>';
		$smarty->assign('errors', $errors);
		//function up_setting($wedid, $parahid, $parah_texts, $files, $title_val, $parah_align, $listid) {
			if(!$msg_sts){
			$image_sett = up_setting_without_img($wedid, $rowcount, $infos_val_1, $add_title_p1, 3, $listid);
			$show_sts=1;
			$succ_msg = 'Your parah settings successfully updated.';
			}
		}

	//***************************************************//
	$selectqry = "SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' order by wed_parah_count_id ";
	$selectqry_rows = $userslog_obj->selectAffectedRows($selectqry);
	$p1 = 0;
	if($selectqry_rows){
	$p1 = 1;
	$selectqry_values= $userslog_obj->selectVal($selectqry);
	$smarty->assign('glb_pgeinfos', $selectqry_values);
	}
	
	$smarty->assign('glb_rowcount', $rowcount);
	//***************************************************//
	$gen_url = generate_url($wedid, $listid);
	//***************************************************//

	
	$pcnt =0;
	$parahCnt="SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' ";
	$QryparahCnt= $userslog_obj->selectVal($parahCnt);
		if(count($QryparahCnt)){
			$pcnt = count($QryparahCnt);
		}
	
	//***************************************************//
	// Parah 1 status
	$p1 = 0;
	$chkqryval_p1 = "SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' and wed_parah_count_id = '1'";
	$selectAffectedRows_p1 = $userslog_obj->selectAffectedRows($chkqryval_p1);
	if($selectAffectedRows_p1){
	$p1 = 1;
	$select_p1= $userslog_obj->selectVal($chkqryval_p1);
	$parahtitle_status_p1 = $select_p1[0]['parah_title_status'];
	$parahtitle_p1 = $select_p1[0]['parah_title'];
	$image_align_p1 = $select_p1[0]['parah_image_align'];
	$image_status_p1 = $select_p1[0]['parah_image_status'];
	$parah_content = $select_p1[0]['parah_content'];
	$imgsrc=$select_p1[0]['parah_image_src'];
	$image_src_p1 = "templates/default/mrg_template/ownpage_images/$wedid/$listid/".$imgsrc;
	//$parah_content = (count($parah_content) > 2 ? $parah_content : '');
	if(strlen ($parah_content) < 5)
			$parah_content = '';
	$smarty->assign('tpl_parah_content', trim($parah_content));
	$smarty->assign('tpl_parahtitle_status_p1', $parahtitle_status_p1);
	$smarty->assign('tpl_parahtitle_p1', $parahtitle_p1);
	$smarty->assign('tpl_image_align_p1', $image_align_p1);
	$smarty->assign('tpl_image_status_p1', $image_status_p1);
	$smarty->assign('tpl_image_src_p1', $image_src_p1);
	$smarty->assign('tpl_image_src_p1_absolute', $imgsrc);
	}
	
	//***************************************************//
	// Parah 2 status
	$p2 = 0;
	$chkqryval_p2 = "SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' and wed_parah_count_id = '2'";
	$selectAffectedRows_p2 = $userslog_obj->selectAffectedRows($chkqryval_p2);
	if($selectAffectedRows_p2){
	$p2 = 1;
	$select_p2 = $userslog_obj->selectVal($chkqryval_p2);
	$parahtitle_status_p2 = $select_p2[0]['parah_title_status'];
	$parahtitle_p2 = $select_p2[0]['parah_title'];
	$image_align_p2 = $select_p2[0]['parah_image_align'];
	$image_status_p2 = $select_p2[0]['parah_image_status'];
	$parah_content2 = $select_p2[0]['parah_content'];
	$imgsrc2=$select_p2[0]['parah_image_src'];
	$image_src_p2 = "templates/default/mrg_template/ownpage_images/$wedid/$listid/".$imgsrc2;
	//$parah_content = (count($parah_content) > 2 ? $parah_content : '');
	$parah_content2= trim($parah_content2);
	
	if(strlen ($parah_content2) < 5)
			$parah_content2 = '';
	//print trim($parah_content2);
	$smarty->assign('tpl_parah_content_p2', trim($parah_content2));
	$smarty->assign('tpl_parahtitle_status_p2', $parahtitle_status_p2);
	$smarty->assign('tpl_parahtitle_p2', $parahtitle_p2);
	$smarty->assign('tpl_image_align_p2', $image_align_p2);
	$smarty->assign('tpl_image_status_p2', $image_status_p2);
	$smarty->assign('tpl_image_src_p2', $image_src_p2);
	$smarty->assign('tpl_image_src_p2_absolute', $imgsrc2);
	
	}
	
	//***************************************************//
	// Parah 3 status
	$p3 = 0;
	$chkqryval_p3 = "SELECT * FROM wed_ownpage_parah where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' and wed_parah_count_id = '3'";
	$selectAffectedRows_p3 = $userslog_obj->selectAffectedRows($chkqryval_p3);
	if($selectAffectedRows_p3){
	$p3 = 1;
	$select_p3 = $userslog_obj->selectVal($chkqryval_p3);
	$parahtitle_status_p3 = $select_p3[0]['parah_title_status'];
	$parahtitle_p3 = $select_p3[0]['parah_title'];
	$image_align_p3 = $select_p3[0]['parah_image_align'];
	$image_status_p3 = $select_p3[0]['parah_image_status'];
	$parah_content3 = $select_p3[0]['parah_content'];
	$imgsrc3=$select_p3[0]['parah_image_src'];
	$image_src_p3 = "templates/default/mrg_template/ownpage_images/$wedid/$listid/".$imgsrc3;
	//$parah_content = (count($parah_content) > 2 ? $parah_content : '');
	$parah_content3= trim($parah_content3);
	
	if(strlen ($parah_content3) < 5)
			$parah_content3 = '';
	//print trim($parah_content2);
	$smarty->assign('tpl_parah_content_p3', trim($parah_content3));
	$smarty->assign('tpl_parahtitle_status_p3', $parahtitle_status_p3);
	$smarty->assign('tpl_parahtitle_p3', $parahtitle_p3);
	$smarty->assign('tpl_image_align_p3', $image_align_p3);
	$smarty->assign('tpl_image_status_p3', $image_status_p3);
	$smarty->assign('tpl_image_src_p3', $image_src_p3);
	$smarty->assign('tpl_image_src_p3_absolute', $imgsrc3);
	}
	//***************************************************//

}else{
echo "Sorry, You cant access this page.";
exit;
}
// PARAH STATUS
$smarty->assign('parah_3', $p3);
$smarty->assign('parah_2', $p2);
$smarty->assign('parah_1', $p1);
$smarty->assign('tpl_succ_msg', $succ_msg);
$smarty->assign('tpl_show_sts', $show_sts);
$smarty->assign('listid_tpl', $listid);
$smarty->assign('tmplwedid', $wedid);
$pcnt = $pcnt+1;
$smarty->assign('tpl_parahcnt', $pcnt);
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
$content_template = 'default/mrg_account/create_own_page.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');

function perform_delete($wedid, $listid, $pid) {
	$userslog_obj = new userslog();
	$sele_del_qry= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '".$pid."' and parah_status = '1' ";
	$DelpageCnt= $userslog_obj->selectVal($sele_del_qry); 
			if(count($DelpageCnt)){
			$deleteqry = "DELETE FROM `wed_ownpage_parah` WHERE master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '".$pid."' " ;
			$order_del_id = $userslog_obj->DeleteRec($deleteqry);
			//$order_del_id = 1;
			//echo '--'.$pid.'--'.$order_del_id;
			if($order_del_id){ // Delete ID
				if($pid == 2){ // Update 3rd parah to 2nd parah
						$sele_p3= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '3' and parah_status = '1' ";
						$sele_p3Cnt= $userslog_obj->selectVal($sele_p3);
							if(count($sele_p3Cnt)){
								$up_p1 = "UPDATE `wed_ownpage_parah` SET `wed_parah_count_id` = '2' WHERE master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '3' and parah_status = '1' ";
								$order_up3 = $userslog_obj->updateVal($up_p1);
							}
				} else if($pid == 1) {
						$sele_p2= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '2' and parah_status = '1' ";
						$sele_p2Cnt= $userslog_obj->selectVal($sele_p2);
							if(count($sele_p2Cnt)){
								$up_p2 = "UPDATE `wed_ownpage_parah` SET `wed_parah_count_id` = '1' WHERE master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '2' and parah_status = '1' ";
								$order_up3 = $userslog_obj->updateVal($up_p2);
							}

						$sele_p3= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '3' and parah_status = '1' ";
						$sele_p3Cnt= $userslog_obj->selectVal($sele_p3);
							if(count($sele_p3Cnt)){
								$up_p2 = "UPDATE `wed_ownpage_parah` SET `wed_parah_count_id` = '2' WHERE master_wed_id = '".$wedid."' and wed_ownpage_id = '".$listid."' and wed_parah_count_id = '3' and parah_status = '1' ";
								$order_up3 = $userslog_obj->updateVal($up_p2);
							}
				}
				}
			}
}


function generate_url($wedid, $inviteid) {
	$userslog_obj = new userslog();
	//$sele_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
	//$sele_qry= "SELECT a.pagelink, a.wedown_autoid FROM `wed_ownpage` a, `wed_ownpage_parah` b where a.wedid = '".$wedid."' and a.wedown_autoid=b.wed_ownpage_id and a.`wedid` = b.master_wed_id and b.`parah_status` = 1";
	$sele_mas_qry= "SELECT * FROM `wed_ownpage` where wedid = '".$wedid."' and status = 1";
	//echo $sele_mas_qry;
	$seleqry= $userslog_obj->selectVal($sele_mas_qry);
	if (count($seleqry)){
		$managelinks= '';
		foreach($seleqry as $key=>$field){
		$wedown_autoid= $field['wedown_autoid'];
		$pagelink= trim($field['pagelink']);
		$wid= trim($field['wedid']);
			$sele_sub_qry= "SELECT * FROM `wed_ownpage_parah` where master_wed_id = '".$wid."' and wed_ownpage_id = '".$wedown_autoid."' and `parah_status` = 1";
			//echo $sele_sub_qry;
			$sub_qry= $userslog_obj->selectVal($sele_sub_qry);
				if (count($sub_qry)){
					$managelinks .= "<li>&nbsp;|&nbsp;<a href='%domainname%?page=$wedown_autoid'><b>$pagelink</b></a></li>";
				}
		}
				$managelinks = addslashes ($managelinks);
				$linkupqry = "UPDATE `mrg_url_status` SET `ownpage_links` = '$managelinks' WHERE `mrg_url_sts_auto_id` ='".$wedid."'  LIMIT 1 ";
				$userslog_obj->updateVal($linkupqry);
	}
}
function perform_setting($wedid, $inviteid, $parahval, $title_status, $imgallign, $titlevalue) {
	//echo $parahval.'--'.$title_status.'--'.$imgallign.'--'.$titlevalue; exit;
	$userslog_obj = new userslog();
	$img_status = 1;
	if($imgallign == 3) {
	$img_status = 0;
	}
	$titlevalue = addslashes($titlevalue);
	$chkqryval = "SELECT * FROM `wed_ownpage_parah` where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqryval);
	if($selectAffectedRows){
		$upqry= "UPDATE `wed_ownpage_parah` SET `parah_title_status` = '".$title_status."', `parah_title` = '".$titlevalue."', `parah_image_status` = '".$img_status."', `parah_image_align` = '".$imgallign."' where master_wed_id ='".$wedid."' and wed_ownpage_id='".$inviteid."' and wed_parah_count_id = '".$parahval."' LIMIT 1 " ;
		$order_list_id = $userslog_obj->updateVal($upqry);
		} else {
		$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_title_status`, `parah_title`, `parah_image_status`, `parah_image_align`, `parah_image_src`, `parah_content`, `parah_status`) VALUES (NULL, '".$wedid."', '".$inviteid."', '".$parahval."', '".$title_status."', '".$titlevalue."', '".$img_status."', '".$imgallign."', '', '', '1')";
		$order_list_id = $userslog_obj->insertVal($inqry);
		}
	return $order_list_id;
}

// up_setting($wedid, 1, $infos_val_1, $_FILES['uploaded_image_1'], $add_title_p1, 1);
function up_setting($wedid, $parahid, $parah_texts, $files, $title_val, $parah_align, $listid) {
	$title_sts = 0;
	if($title_val != '') $title_sts = 1;
	$title_val = addslashes($title_val);
	$userslog_obj = new userslog();
	$dirName = "templates/default/mrg_template/ownpage_images/$wedid";
	if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
	$dirName = "templates/default/mrg_template/ownpage_images/$wedid/$listid";
	if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
		$dirName=$dirName.'/';
		$order_list_id = 0;
		$p1_img = trim($files['name']) ;
			if($p1_img != ''){
				$p1_imgext = strtolower(strrchr($p1_img,'.'));
					if($p1_imgext == '.jpg' or $p1_imgext == '.jpeg' or $p1_imgext == '.gif' or $p1_imgext == '.png'){
						$p1_name=$user_log_id.time().'p1.jpg';
						$target_path=$dirName. $p1_name;
						move_uploaded_file($files['tmp_name'], $target_path); 
						$image = new SimpleImage();
						$image->load($target_path);
						$image->resizeToWidth(150);
						$image->save("templates/default/mrg_template/ownpage_images/$wedid/$listid/".$p1_name);
						
						$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_title_status`, `parah_title`, `parah_image_status`, `parah_image_align`, `parah_image_src`, `parah_content`, `parah_status`) VALUES (NULL, '".$wedid."', '".$listid."', '".$parahid."', '".$title_sts."', '".$title_val."', '1', '".$parah_align."', '".$p1_name."', '".$parah_texts."', '1')";
						//echo $inqry;
						$order_list_id = $userslog_obj->insertVal($inqry);
					}
			}
}

// up_setting($wedid, 1, $infos_val_1, $_FILES['uploaded_image_1'], $add_title_p1, 1);
function up_setting_without_img($wedid, $parahid, $parah_texts, $title_val, $parah_align, $listid) {
	$title_sts = 0;
	if($title_val != '') $title_sts = 1;
	$title_val = addslashes($title_val);
	$userslog_obj = new userslog();
	$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_title_status`, `parah_title`, `parah_image_status`, `parah_image_align`, `parah_image_src`, `parah_content`, `parah_status`) VALUES (NULL, '".$wedid."', '".$listid."', '".$parahid."', '".$title_sts."', '".$title_val."', '1', '".$parah_align."', '', '".$parah_texts."', '1')";
	$order_list_id = $userslog_obj->insertVal($inqry);
}

function perform_imgupload($wedid, $listid, $files, $user_log_id, $parahid){
	$userslog_obj = new userslog();
	$dirName = "templates/default/mrg_template/ownpage_images/$wedid";
	if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
	$dirName = "templates/default/mrg_template/ownpage_images/$wedid/$listid";
	if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
		$dirName=$dirName.'/';
		$order_list_id = 0;
		$p1_img = trim($files['name']) ;
			if($p1_img != ''){
				$p1_imgext = strtolower(strrchr($p1_img,'.'));
					if($p1_imgext == '.jpg' or $p1_imgext == '.jpeg' or $p1_imgext == '.gif' or $p1_imgext == '.png'){
						$p1_name=$user_log_id.time().'p1.jpg';
						$target_path=$dirName. $p1_name;
						move_uploaded_file($files['tmp_name'], $target_path); 
						$image = new SimpleImage();
						$image->load($target_path);
						$image->resizeToWidth(150);
						$image->save("templates/default/mrg_template/ownpage_images/$wedid/$listid/".$p1_name);

						 $chkqryval = "SELECT * FROM `wed_ownpage_parah` where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' and wed_parah_count_id = '".$parahid."' ";
						$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqryval);
						if($selectAffectedRows){
							$upqry= "UPDATE `wed_ownpage_parah` SET `parah_image_status` = '1', `parah_image_src` = '".$p1_name."' where master_wed_id ='".$wedid."' and wed_ownpage_id='".$listid."' and wed_parah_count_id = '".$parahid."' LIMIT 1 " ;
							$order_list_id = $userslog_obj->updateVal($upqry);
							} else {
							$inqry= "INSERT INTO `wed_ownpage_parah` (`wed_parah_id`, `master_wed_id`, `wed_ownpage_id`, `wed_parah_count_id`, `parah_image_status`, `parah_image_align`, `parah_image_src`, `parah_status`) VALUES (NULL, '".$wedid."', '".$listid."', '".$parahid."', '1', '1', '".$p1_name."', '1')";
							$order_list_id = $userslog_obj->insertVal($inqry);
							}
					}
			}
		return $order_list_id;
}
?>
