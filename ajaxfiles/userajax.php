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
include_once('../includes/configs/init.php');
session_start();
$sess_userlog_id= $_SESSION['sess_user_id'];
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
/*----- Object creation end-----*/

$action_val= $_REQUEST['chk_action'];
$type=$_REQUEST['types'];
 if($action_val=="create_user")
 {
 	$uname= trim($_REQUEST['uname']);  	$pword= base64_encode(trim($_REQUEST['pword']));  	$uemail= trim($_REQUEST['uemail']);	
	$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$uname."' and usrlog_status ='1'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	$chkqry= "SELECT * FROM `tbl_user_profile` where usrpro_email='".$uemail."' ";
	$selectAffectedRows_email = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows)
		echo 'exist-un';
	else if ($selectAffectedRows_email)
		echo 'exist-email';
	else
		{	
		$inqry= "INSERT INTO `tbl_user_login` (`usrlog_id`, `usrlog_username`, `usrlog_password`, `usrlog_status`) VALUES (NULL, '".$uname."', '".$pword."', '1')";
		$order_list_id = $userslog_obj->insertVal($inqry);		 
		$inqry= "INSERT INTO `tbl_user_profile` (`usrpro_id`, `usrlog_id`, `usrpro_email`) VALUES (NULL, '".$order_list_id."', '".$uemail."')";
		$order_list_id = $userslog_obj->insertVal($inqry);	
		$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$uname."' and usrlog_password='".$pword."' and usrlog_status ='1'";
		$selectProfile= $userslog_obj->selectVal($chkqry); 
		if(count($selectProfile)){
			$_SESSION['sess_user_id']= $selectProfile[0]['usrlog_id'];
			$_SESSION['sess_user_name']= $selectProfile[0]['usrlog_username'];
		}
				$pass_val = base64_decode($pword);
				$username_val = $uname;	
				// Will trigger mail functions					
				$reg_email_tmpl=$mails_obj->getReg_tmpl();
				$reg_email_tmpl =str_replace("%usernm%", "$username_val", $reg_email_tmpl);
				$reg_email_tmpl =str_replace("%userpwd%", "$pass_val", $reg_email_tmpl);
				$sub=$reg_pass_email_subject;				
				$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
				$common_obj->simplemail($uemail, $sub, $reg_email_tmpl, $headers);

		echo $order_list_id; 
		}
 }
 
  if(($action_val=="forget_p") and ($type=='1')) {
	$uemail= trim($_REQUEST['uemail']);
	$chkqry= "select ulog.usrlog_id, ulog.usrlog_password, ulog.usrlog_username from tbl_user_login ulog,tbl_user_profile up where  up.usrpro_email = '".$uemail."' and up.usrlog_id = ulog.usrlog_id ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows) {
		$chk_pass_access= $userslog_obj->selectVal($chkqry);
		$usrlog_id = trim($chk_pass_access[0]['usrlog_id']);
		$rand_code = $common_obj->rand_str(5);
		$rand_code = $usrlog_id.'S'.$rand_code;
		$upqry= "UPDATE `tbl_user_login` SET `usrlog_password_code` = '".$rand_code."' WHERE `usrlog_id` ='".$usrlog_id."' LIMIT 1 ";
		$order_list_id = $userslog_obj->updateVal($upqry);
		$rand_code = base64_encode($rand_code);
		$reseturl = "https://www.inviteindia.com/resetpw.php?secode=$rand_code";
		$pass_val = base64_decode($chk_pass_access[0]['usrlog_password']);
		$username_val = $chk_pass_access[0]['usrlog_username'];
				// Will trigger mail functions
				$fp_email_tmpl=$mails_obj->forgetpwd_tmpl();
				$fp_email_tmpl =str_replace("%usernm%", "$username_val", $fp_email_tmpl);
				$fp_email_tmpl =str_replace("%userpwd%", "$rand_code", $fp_email_tmpl); 
				$fp_email_tmpl =str_replace("%resetlink%", "$reseturl", $fp_email_tmpl);
				$sub="Reset your password";
				$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
				echo $common_obj->simplemail($uemail, $sub, $fp_email_tmpl, $headers);			
		} else {
		echo 'invalid'; 
		exit;
		}
 }
 elseif($action_val=="update_accounts")
 {
   	$cpass= base64_encode(trim($_REQUEST['cpass']));  
	$pword= base64_encode(trim($_REQUEST['pword']));  	 
	$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_id='".$sess_userlog_id."' and usrlog_password='".$cpass."' and usrlog_status ='1'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	
	if($selectAffectedRows)
			{			
			$upqry= "UPDATE `tbl_user_login` SET `usrlog_password` = '".$pword."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;			 
			$order_list_id = $userslog_obj->updateVal($upqry);		 	
			echo $order_list_id;
			}
	else
		{	
		echo "not"; 
		}   
 }
  elseif($action_val=="update_personal")
 {
   	$fname= trim($_REQUEST['txt_fname']);  	$lname= trim($_REQUEST['lname']);  	$dob= trim($_REQUEST['dob']);		$mobilenos= trim($_REQUEST['mobilenos']);	 
	 
			$upqry= "UPDATE `tbl_user_profile` SET `usrpro_fname` = '".$fname."',`usrpro_lname` = '".$lname."',`usrpro_dob` = '".$dob."',`usrpro_mobile_no` = '".$mobilenos."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);		 	
			echo $order_list_id;
			  
 }
   elseif($action_val=="update_profile_img")
 {
   	$img= trim($_SESSION['image_nameTMP']); 
			$upqry= "UPDATE `tbl_user_profile` SET `usrpro_profile_img` = '".$img."' WHERE `usrlog_id` ='".$sess_userlog_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry);		
			$_SESSION['image_nameTMP']=""; 	
			echo $order_list_id;
			  
 }
    elseif($action_val=="selectfriends_emails")
 {
	$chkqry= "SELECT friends_email FROM user_friends_email_lists where user_log_id  = '".$sess_userlog_id."' ";
	$selectemail_lists= $userslog_obj->selectVal($chkqry);
	$emaildetails="";
	if(count($selectemail_lists))
		{
		foreach($selectemail_lists as $key=>$field)
                     {
                     $email_frd = $field['friends_email'];
					 $emaildetails.=$email_frd.",";
                     }
		}
		else
	 {
		$emaildetails='0';
		}
    
	

	echo $emaildetails;
 }
      elseif($action_val=="shorturl_add")
 {
	$sshorturl= base64_encode(addslashes(trim($_REQUEST['shorturl'])));
	$inqry= "INSERT INTO `wed_shorturl` (`wed_short_urlid`, `wed_short_original`, `wed_short_friendlyurl`, `wed_short_createddate`, `wed_short_status`) VALUES (NULL, '".$sshorturl."', '', now(), 1)";
	$order_list_id = $userslog_obj->insertVal($inqry);
	
	$seleqry= "select surltab.wed_short_urlid 	as  short_urlid, surltab.wed_short_friendlyurl as friendlyurl from wed_shorturl surltab where surltab.wed_short_urlid  = '".$order_list_id."' ";
 
	$chk_pass_access= $userslog_obj->selectVal($seleqry);
	
	
	$surl = $chk_pass_access[0]['short_urlid'] ;
	echo "<div style='padding-top: 10px;'><span id='links_green'><b>Your friendly URL:</span><span id='links_red'> http://www.inviteindia.com/surl/$surl</span></b></div>" ;

 }
  elseif($action_val=="contactus")
 {
	$uemail= trim($_REQUEST['uemail']);
	$uname= trim($_REQUEST['uname']);		
	$contactmsgs= trim($_REQUEST['contactmsgs']);		
	$msgs = "Name: $uname <br />";
	$msgs .= "Email: $uemail <br />";
	$msgs .= "Messages: $contactmsgs <br />";
	$sub="Customer - Eng";				
	$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
	$toem = "inviteindia.feedback@gmail.com";
	$common_obj->simplemail($toem, $sub, $msgs, $headers);
	echo 1;
	}
elseif($action_val=="dropstates")
 {
	$val= trim($_REQUEST['val']);
	$chkqry= "SELECT tbl_city_master_id, tbl_city_master_name FROM tbl_city_master WHERE tbl_city_master_state_id = $val and tbl_city_master_status = 1";
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_city = '<select id="city_drop" name ="city_drop"><option value="0">Select City</option>';
	if (count($select_city)){
	foreach($select_city as $key=>$field){
		$city_name= trim($field['tbl_city_master_name']);
		$city_master_id= $field['tbl_city_master_id'];
		$sele_city .= "<option value=$city_master_id>$city_name</option>";
	}
	$sele_city .= "</select>";
	}
	echo $sele_city;
 }
elseif($action_val=="dropcity")
 {
	$cityval= trim($_REQUEST['cityv']);
	$stateval= trim($_REQUEST['statev']);
	$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_city_area_cityid = $cityval";
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_area = 'no';
	if (count($select_city)){
		$sele_area = 'Area : <br />';
		$sele_area = '';
	$sele_area .= '<select id="area_drop" name="area_id" class="inputval"><option value="0">Select Area</option>';
	foreach($select_city as $key=>$field){
		$area_name= trim($field['tbl_city_area_name']);
		$area_id= $field['tbl_city_area_id'];
		$sele_area .= "<option value=$area_id>$area_name</option>";
	}
	$sele_area .= "</select>";
	}else{
		$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_stage_area_stateid = $stateval";
		$select_city= $userslog_obj->selectVal($chkqry);
			if (count($select_city)){
					$sele_area = 'Area : <br />';
					$sele_area = '';
					$sele_area .= '<select id="area_drop" name="area_id" class="inputval"><option value="0">Select Area</option>';
					foreach($select_city as $key=>$field){
						$area_name= trim($field['tbl_city_area_name']);
						$area_id= $field['tbl_city_area_id'];
						$sele_area .= "<option value=$area_id>$area_name</option>";
					}
					$sele_area .= "</select>";
			}
	}

	echo $sele_area;
 }elseif($action_val=="dropcity_pdts")
 {
	$cityval= trim($_REQUEST['cityv']);
	$stateval= trim($_REQUEST['statev']);
	$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_city_area_cityid = $cityval";
	$select_city= $userslog_obj->selectVal($chkqry);
	$sele_area = 'no';
	if (count($select_city)){
		$sele_area = '<label style="width:120px;">Area:</label>';
		$sele_area = '';

	$sele_area .= '<select id="area_drop" name="area_id" class="inputval"><option value="0">Select Area</option>';
	foreach($select_city as $key=>$field){
		$area_name= trim($field['tbl_city_area_name']);
		$area_id= $field['tbl_city_area_id'];
		$sele_area .= "<option value=$area_id>$area_name</option>";
	}
	$sele_area .= "</select>";
	}else{
		$chkqry= "SELECT tbl_city_area_name, tbl_city_area_id FROM `tbl_city_area` WHERE tbl_stage_area_stateid = $stateval";
		$select_city= $userslog_obj->selectVal($chkqry);
			if (count($select_city)){
					$sele_area = '<label style="width:120px;">Area:</label>';
					$sele_area = '';
					$sele_area .= '<select id="area_drop" name="area_id" class="inputval"><option value="0">Select Area</option>';
					foreach($select_city as $key=>$field){
						$area_name= trim($field['tbl_city_area_name']);
						$area_id= $field['tbl_city_area_id'];
						$sele_area .= "<option value=$area_id>$area_name</option>";
					}
					$sele_area .= "</select>";
			}
	}

	echo $sele_area;
 } elseif($action_val=="passchange") {
	$uname= trim($_REQUEST['uname']);
	$cpword= base64_encode(trim($_REQUEST['cpword']));
	$npword= base64_encode(trim($_REQUEST['npword']));
	$uemail= trim($_REQUEST['uemail']);
	$uid= trim($_REQUEST['uid']); 	 
	$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_id='".$uid."' and usrlog_password='".$cpword."' and usrlog_status ='1'";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($sess_userlog_id == $uid) {
	if($selectAffectedRows){
			$upqry= "UPDATE `tbl_user_login` SET `usrlog_password` = '".$npword."' WHERE `usrlog_id` ='".$uid."' LIMIT 1 " ;			 
			$order_list_id = $userslog_obj->updateVal($upqry);
			echo 'ok';
			
	} else {
		echo "not"; 
	}
	}
 } elseif($action_val=="allowed") {
	$pc= trim($_REQUEST['passcode']);
	$gid= trim($_REQUEST['gid']);
	$chkqry= "SELECT * FROM mrg_url_status where mrg_url_sts_auto_id='".$gid."' and  pwd = '".$pc."' ";
	$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
	if($selectAffectedRows){
			$value=1;
			 //setcookie("secured", '1', "/");
			// cookie will expire in 1 hour
			$_SESSION['secured'] = 1;
			setcookie("secured", $value, time() + 1800, "/");
			echo $_COOKIE['secured'];

	} else {
		echo "not"; 
	}
 } elseif($action_val=="ven_login") {

	 	$uname= trim($_REQUEST['uname']);
		$pword= base64_encode(trim($_REQUEST['pwd']));
		$login_hidd= trim($_REQUEST['log_a']);
		if($login_hidd == 'logind'){
			$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_password='".$pword."' and ven_status ='2' ";
			$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
			if($selectAffectedRows) {
			echo 2;
			} else  {
					$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_password='".$pword."' and ven_status ='1' ";
					$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
						if($selectAffectedRows) {
							$select_access = $userslog_obj->selectVal($chkqry);
							$_SESSION['sess_ven_user_id'] = $select_access[0]['ven_auto_id'];
							echo 1;
						}else{
							echo 3;
						}
					}
		}else{
		echo 'some thing issue';
		}
 } elseif($action_val=="ven_reg") {
	 	$uname= trim($_REQUEST['uname']);
		$pword= base64_encode(trim($_REQUEST['pwd']));
		$login_hidd= trim($_REQUEST['log_a']);
		$uemail= trim($_REQUEST['mail']);
		$res_cat= trim($_REQUEST['res_cat']);
		if($login_hidd == 'add'){
		$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_username='".$uname."' and ven_status ='1' ";
		$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
		$chkqry= "SELECT * FROM `tbl_mas_vendors` where ven_email= '".$uemail."' ";
		$selectAffectedRows_email = $userslog_obj->selectAffectedRows($chkqry);
		if($selectAffectedRows){
			//$err = 'Username already exists, Please choose different username.';
			echo 2;
			} else if ($selectAffectedRows_email) {
			//$err = 'Email already exists, Please choose different email.';
			echo 3;
			} else {
			$show_reg_form = 0;
			$date = date('Y-d-m');
			$reg_email_tmpl = $mails_obj->actVendors();
			$rand_activate_cod = $common_obj->rand_str(15);
			$inqry= "INSERT INTO `tbl_mas_vendors` (`ven_auto_id`, `ven_username`, `ven_password`, `ven_email`, `ven_activate_code`, `ven_status`) VALUES (NULL, '".$uname."', '".$pword."', '".$uemail."', '".$rand_activate_cod."', '0')";
			$lastinsert_id = $userslog_obj->insertVal($inqry); 
			$inqry= "INSERT INTO `tbl_vendor_service` (`tbl_vendor_service_id`, `tbl_vendor_id`, `business_date`, `business_category`) VALUES (NULL, '".$lastinsert_id."', '".$$date."', '".$res_cat."')";
			$lastinsert_id = $userslog_obj->insertVal($inqry); 
			//echo $lastinsert_id;
			$venacturl='http://www.inviteindia.com/vendors/act.php?do=act&tocken=';
			$actcode = $venacturl.$lastinsert_id.'inc'.$rand_activate_cod;
			$reg_email_tmpl =str_replace("%usernm%", "$uname", $reg_email_tmpl);
			$reg_email_tmpl =str_replace("%actwedurl%", "$actcode", $reg_email_tmpl);
			//echo $reg_email_tmpl;
			$sub = 'InviteIndia.com - Vendors activation';
			$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
			$common_obj->simplemail($uemail, $sub, $reg_email_tmpl, $headers);
			echo 1;
			}
		}else{
		echo 'some thing issue';
		}
 } elseif($action_val=="loginchk") {
		$ctxt_uname= trim($_REQUEST['uname']);
		$ctxt_pword = base64_encode(trim($_REQUEST['pword']));
		$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_username='".$ctxt_uname."' and usrlog_password='".$ctxt_pword."' and usrlog_status ='1'";
		$selectProfile= $userslog_obj->selectVal($chkqry);
		if(count($selectProfile)){
			$_SESSION['sess_user_id']= $selectProfile[0]['usrlog_id'];
			$_SESSION['sess_user_name']= $selectProfile[0]['usrlog_username'];
			if (isset($_COOKIE["last_req_url"])) {
					$forwardnow_url = base64_decode($_COOKIE["last_req_url"]);
					setcookie("last_req_url", "", time()-3600);
					//header("Location: $forwardnow_url");
					//exit;
					echo $forwardnow_url;
				} else {
					echo 1;
					//header("Location: e-wedding.php");
					//exit;
				}
			} else {
			$chkqry_by_mail= "SELECT * FROM `tbl_user_profile` where usrpro_email = '".$ctxt_uname."' ";
			$selectProfile_by_mail= $userslog_obj->selectVal($chkqry_by_mail);
			if(count($selectProfile_by_mail)){
				$urlog_id = $selectProfile_by_mail[0]['usrlog_id'];
				$chkqry= "SELECT * FROM `tbl_user_login` where usrlog_id='".$urlog_id."' and usrlog_password='".$ctxt_pword."' and usrlog_status ='1'";
				$selectProfile= $userslog_obj->selectVal($chkqry);
				if(count($selectProfile)){
					$_SESSION['sess_user_id']= $selectProfile[0]['usrlog_id'];
					$_SESSION['sess_user_name']= $selectProfile[0]['usrlog_username'];
						if (isset($_COOKIE["last_req_url"])){
							$forwardnow_url = base64_decode($_COOKIE["last_req_url"]);
							setcookie("last_req_url", "", time()-3600);
							//header("Location: $forwardnow_url");
							//exit;
							echo $forwardnow_url;
						}else{
							echo 1;
							//header("Location: e-wedding.php");
							//exit;
						}
					} else {
						$_SESSION['notvalid']='notvalid';
						echo 2;
					}
				} else {
					$_SESSION['notvalid']='notvalid';
					echo 2;
				}
			}
		exit;
		} elseif($action_val=="resetpwd") {
		$uid = trim($_REQUEST['uid']);
		$curr_pword = trim($_REQUEST['cpword']);
		$curr_rep_pword = trim($_REQUEST['npword']);
		if ($curr_pword == $curr_rep_pword) {
			$curr_pword = base64_encode($curr_pword);
			$upqry= "UPDATE `tbl_user_login` SET `usrlog_password` = '".$curr_pword."' WHERE usrlog_id = '".$uid."' ";
			$order_list_id = $userslog_obj->updateVal($upqry);
			echo 1;
		} else {
		echo 0;
		}
	}
?>