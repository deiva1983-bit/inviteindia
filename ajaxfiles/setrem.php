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
ini_set('max_execution_time', 1800); //1800 seconds = 30 Mins
include_once('../includes/configs/init.php');
session_start();
$user_log_id= trim($_SESSION['sess_user_id']);
/*----- Object creation start-----*/
$sms_obj = new sms();
$cronsms_obj = new cronsms();
$common_obj = new common();

/*----- Object creation end-----*/

$action_val= $_REQUEST['chk_action'];
 
 if($action_val=="setrem")
 {
 	$mobemail= trim($_REQUEST['remail']);
	$rmobno= trim($_REQUEST['rmobno']);
	$rdate= trim($_REQUEST['rdate']);
	$wau_id= trim($_REQUEST['wed_au_id']);	
	$rem_nam= trim($_REQUEST['rem_nam']);	
	
	$sendpin = $common_obj->rand_str(4);
	$act_email=1;	
	if ($rmobno != "")
	{		
	$chkqry= "SELECT * FROM `wed_remainder_mob` where mobile_num ='".$rmobno."' and  activate_status = 1";
	$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows) {
		$rdate =date('Y-m-d', strtotime("$rdate"));
		$selectalbum_access1= $sms_obj->selectVal($chkqry);
		$curr_a_id = $selectalbum_access1[0]['mobile_autoid'];
			$qrymob_exists= "SELECT * FROM `wed_remainder_crons_mob` where `wed_cron_mob_autoid` = '".$curr_a_id."' and  `wed_cron_wed_id` ='".$wau_id."' ";
			$selectAffectedMob = $sms_obj->selectAffectedRows($qrymob_exists);
			if($selectAffectedMob) {
				$upqry= "UPDATE `wed_remainder_crons_mob` SET wed_cron_date = '".$rdate."', `wed_cron_end_username` =  '".$rem_nam."' WHERE `wed_cron_mob_autoid` = '".$curr_a_id."' and  `wed_cron_wed_id` ='".$wau_id."' Limit 1 " ;
				$order_list_id = $sms_obj->updateVal($upqry);
			} else {
			$inqry= "INSERT INTO `wed_remainder_crons_mob` (`wed_cron_autoid`, `wed_cron_end_username`, `wed_cron_mob_autoid`, `wed_cron_wed_id`, `wed_cron_date`, `wed_cron_status`) VALUES (NULL, '".$rem_nam."', '".$curr_a_id."', '".$wau_id."', '".$rdate."', 2 )";		
			$order_list_id = $sms_obj->insertVal($inqry);
			}
		if($mobemail == "")
			echo "success";
		}
	else
		{
			$chkqry= "SELECT * FROM `wed_remainder_mob` where mobile_num ='".$rmobno."' and  activate_status = 2";
			$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);
			$sendpin = $common_obj->rand_str(4);
			$act_sts=1;
			if($selectAffectedRows)
			{
				$act_sts=0;
				$upqry= "UPDATE wed_remainder_mob SET activate_pin = '".$sendpin."' WHERE mobile_num ='".$rmobno."' and activate_status = 2 LIMIT 1 " ;
				$order_list_id = $sms_obj->updateVal($upqry);
			}
		$smsactivate_text= str_replace("%sec_code%", "$sendpin", $smstext_reactivate);
		$cron_act = $cronsms_obj->sendsms($smsactivate_text, $rmobno);

		if($act_sts)
		{
			$inqry= "INSERT INTO `wed_remainder_mob` (`mobile_autoid`, `mobile_num`, `activate_pin`, `activate_status`, `added_date`) VALUES (NULL, '".$rmobno."', '".$sendpin."', 2, Now() )";
			$order_list_id = $sms_obj->insertVal($inqry);
		}
		$act_email=0;
		echo 'sendpin';
		}
	}
	if($mobemail != "" && $act_email==1)
	{
		$rdate =date('Y-m-d', strtotime("$rdate"));
		$inqry= "INSERT INTO `wed_remainder_crons_email` (`wed_cron_email_autoid`, `wed_cron_end_username`, `wed_cron_email`, `wed_cron_wed_id`, `wed_cron_date`, `wed_cron_status`) VALUES (NULL, '".$rem_nam."', '".$mobemail."', '".$wau_id."', '".$rdate."', 2 )";
		$order_list_id = $sms_obj->insertVal($inqry);
		echo "success";
	} 
 } 
 else if($action_val == 'doActivate')
 {
	$mact_code= trim($_REQUEST['act_code']);
	$rmobno= trim($_REQUEST['rmobno']);
	$chkqry= "SELECT * FROM `wed_remainder_mob` where mobile_num ='".$rmobno."' and  activate_pin ='".$mact_code."' and activate_status = 2";
			$selectAffectedRows = $sms_obj->selectAffectedRows($chkqry);			
			$act_sts=0;
			if($selectAffectedRows)
			{
				$act_sts=1;
				$upqry= "UPDATE wed_remainder_mob SET activate_status = '1' WHERE mobile_num ='".$rmobno."' and  activate_pin ='".$mact_code."' and activate_status = 2 LIMIT 1 " ;
				$order_list_id = $sms_obj->updateVal($upqry);
			}	
	if($act_sts)
		echo "succ";
	else
		echo "wrong";
			
 }
  else if($action_val == 'nexthead')
 {	
	$userslog_obj = new userslog();
	$cur_head_id= trim($_REQUEST['cheadid']);
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id='$own_themeid' )and kural_auto_id > $cur_head_id ORDER BY kural_auto_id 	limit 1";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$kural_brieff = $selectcomm[0]['kural_brieff'];	
	echo "<p>$kural_brieff</p>";
 }
   else if($action_val == 'updatenav')
 {	
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$userslog_obj = new userslog();
	$cur_head_id= trim($_REQUEST['cheadid']);
	$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and (kural_user_id = '0' or kural_user_id = '$own_themeid' ) and kural_auto_id > $cur_head_id ORDER BY kural_auto_id 	limit 2";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$nextlink_style="";
	if (count($selectcomm) == 2)
	{
	foreach($selectcomm as $key=>$field)
                    {					 
					$kural_autoid =	$field['kural_auto_id'];
					break;
					}
		$nextlink_style="inline";
	}
	else
	{
		$kural_autoid =	$selectcomm[0]['kural_auto_id'];
		$nextlink_style="none";
	}
	
	$nxtgnav= '<span id="head_prev" style="display:inline; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp;<span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span>&nbsp;<span id="head_next" style="display:'.$nextlink_style.'; cursor: pointer;"><img src="images/next_button.gif" /></span><input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="'.$kural_autoid.'" />';
	
	echo $nxtgnav;
	
 }
 
 else if($action_val == 'prevhead')
 {	
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$userslog_obj = new userslog();
	$cur_head_id= trim($_REQUEST['cheadid']);
	$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id = '$own_themeid' ) and kural_auto_id < $cur_head_id ORDER BY kural_auto_id 	DESC limit 1";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$kural_brieff = $selectcomm[0]['kural_brieff'];	
	echo "<p>$kural_brieff</p>";
 }
   else if($action_val == 'updatenav_prev')
 {	
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$userslog_obj = new userslog();
	$cur_head_id= trim($_REQUEST['cheadid']);
	$chkqry= "SELECT * FROM mrg_mas_thirukural WHERE kural_status ='1' and ( kural_user_id = '0' or kural_user_id = '$own_themeid' ) and kural_auto_id < $cur_head_id ORDER BY kural_auto_id DESC	limit 2";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$nextlink_style="";
	if (count($selectcomm) == 2)
	{
	foreach($selectcomm as $key=>$field)
                    {					 
					$kural_autoid =	$field['kural_auto_id'];
					break;					
					}
		$prevlink_style="inline";
	}
	else
	{
		$kural_autoid =	$selectcomm[0]['kural_auto_id'];
		$prevlink_style="none";
	}
	
	$nxtgnav= '<span id="head_prev" style="display:'.$prevlink_style.'; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp;<span id="head_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span>&nbsp;<span id="head_next" style="display:inline; cursor: pointer;"><img src="images/next_button.gif" /></span><input type="hidden" name="tmpl_kural_auto_id" id="tmpl_kural_auto_id" value="'.$kural_autoid.'" />';
	
	echo $nxtgnav;
	
 }
 else if($action_val == 'headsave')
 {	
	$userslog_obj = new userslog();
	$cur_head_id= trim($_REQUEST['chead']);
	$cur_themeid= trim($_REQUEST['themeid']);
	if($cur_head_id != '' and $cur_head_id != 0 and $cur_themeid != '' and $cur_themeid != 0)
	{
	$upqry= "UPDATE mrg_all_info SET thirukkural = '".$cur_head_id."' WHERE mrg_url_status_auto_id ='".$cur_themeid."' LIMIT 1 " ;
	$order_list_id =  $userslog_obj->updateVal($upqry);
	}
 }
  else if($action_val == 'descsave')
 {	
	$userslog_obj = new userslog();
	$cur_desc_id= trim($_REQUEST['cdesc']);
	$cur_themeid= trim($_REQUEST['themeid']);
	if($cur_desc_id != '' and $cur_desc_id != 0 and $cur_themeid != '' and $cur_themeid != 0)
	{
	$upqry= "UPDATE mrg_all_info SET description = '".$cur_desc_id."' WHERE mrg_url_status_auto_id ='".$cur_themeid."' LIMIT 1 " ;
	$order_list_id =  $userslog_obj->updateVal($upqry);
	}
 } 
  
  
   else if($action_val == 'nextdesc')
 {	
	$userslog_obj = new userslog();
	$cur_descid = trim($_REQUEST['cdescid']);
	$cur_themeid= trim($_REQUEST['themeid']);
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	
	$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and ( desc_user_id = '0' or desc_user_id = '$own_themeid') and des_auto_id > $cur_descid ORDER BY des_auto_id 	limit 1";
	
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$kural_brieff = $selectcomm[0]['des_brieff'];

	$chkqry_pers= "SELECT male_name, female_name FROM `mrg_all_info` where mrg_url_status_auto_id='$cur_themeid' ";
	$selectcomm_pers= $userslog_obj->selectVal($chkqry_pers);	
	$male_name = $selectcomm_pers[0]['male_name'];
	$female_name = $selectcomm_pers[0]['female_name'];
	$wedding_name="<div class='wedding-names'>$male_name</div><div class='wedding-btn'>and</div><div class='wedding-names'>$female_name</div>";
    $kural_brieff =str_replace("%replace_names%", "$wedding_name", $kural_brieff);
	$weddingname="<div class='wedding-names'>$male_name</div><div class='wedding-names'>$female_name</div>";
	$kural_brieff =str_replace("%replacenames%", "$weddingname", $kural_brieff);
	echo $kural_brieff;
 }
 else if($action_val == 'prevdesc')
 {	
	$cur_themeid= trim($_REQUEST['themeid']);
	$userslog_obj = new userslog();
	$cur_descid= trim($_REQUEST['cdescid']);
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and ( desc_user_id = '0' or desc_user_id = '$own_themeid') and des_auto_id < $cur_descid ORDER BY des_auto_id 	DESC limit 1";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$kural_brieff = $selectcomm[0]['des_brieff'];	
	
	$chkqry_pers= "SELECT male_name, female_name FROM `mrg_all_info` where mrg_url_status_auto_id='$cur_themeid' ";
	$selectcomm_pers= $userslog_obj->selectVal($chkqry_pers);	
	$male_name = $selectcomm_pers[0]['male_name'];
	$female_name = $selectcomm_pers[0]['female_name'];
	$wedding_name="<div class='wedding-names'>$male_name</div><div class='wedding-btn'>and</div><div class='wedding-names'>$female_name</div>";
    $kural_brieff =str_replace("%replace_names%", "$wedding_name", $kural_brieff);
	$weddingname="<div class='wedding-names'>$male_name</div><div class='wedding-names'>$female_name</div>";
	$kural_brieff =str_replace("%replacenames%", "$weddingname", $kural_brieff);
	
	echo $kural_brieff;
 }else if($action_val == 'updatedesc')
 {	
	$userslog_obj = new userslog();
	$cur_descid= trim($_REQUEST['cdescid']);
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and ( desc_user_id = '0' or desc_user_id = '$own_themeid') and des_auto_id > $cur_descid ORDER BY des_auto_id 	limit 2";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$nextlink_style="";
	if (count($selectcomm) == 2)
	{
	foreach($selectcomm as $key=>$field)
                    {					 
					$kural_autoid =	$field['des_auto_id'];
					break;
					}
		$nextlink_style="inline";
	}
	else
	{
		$kural_autoid =	$selectcomm[0]['des_auto_id'];
		$nextlink_style="none";
	} 	 
			 
	$nxtgnav= '<span id="desc_prev" style="display:inline; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp;<span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span>&nbsp;<span id="desc_next" style="display:'.$nextlink_style.'; cursor: pointer;"><img src="images/next_button.gif" /></span><input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="'.$kural_autoid.'" />';
	
	echo $nxtgnav;
	
 }
else if($action_val == 'updatedesc_prev')
 {	
	$userslog_obj = new userslog();
	$cur_descid= trim($_REQUEST['cdescid']);
	$own_themeid= trim($_REQUEST['theme_ownerid']);
	$chkqry= "SELECT * FROM mrg_mas_des WHERE des_status ='1' and ( desc_user_id = '0' or desc_user_id = '$own_themeid' ) and des_auto_id < $cur_descid ORDER BY des_auto_id DESC	limit 2";
	$selectcomm= $userslog_obj->selectVal($chkqry);	
	$nextlink_style="";
	if (count($selectcomm) == 2)
	{
	foreach($selectcomm as $key=>$field)
                    {					 
					$kural_autoid =	$field['des_auto_id'];
					break;					
					}
		$prevlink_style="inline";
	}
	else
	{
		$kural_autoid =	$selectcomm[0]['des_auto_id'];
		$prevlink_style="none";
	}
	
	$nxtgnav= '<span id="desc_prev" style="display:'.$prevlink_style.'; cursor: pointer;"><img src="images/prev_button.gif" /></span>&nbsp;<span id="desc_save" style="display:inline; cursor: pointer;"><img src="images/mywork_save.jpg" /></span>&nbsp;<span id="desc_next" style="display:inline; cursor: pointer;"><img src="images/next_button.gif" /></span><input type="hidden" name="tmpl_desc_auto_id" id="tmpl_desc_auto_id" value="'.$kural_autoid.'" />';
	
	echo $nxtgnav;
	
 } 
?>