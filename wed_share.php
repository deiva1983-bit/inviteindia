<?php 
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$mails_obj = new mails();
$smarty->assign('topnav_select', 'wedd');
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$current_page= trim($_REQUEST['page']);
$smarty->assign('currentpage_js', 'wed_share');
$wedid= trim($_REQUEST['wed_id']);
if($current_action == 'sharem'){
	if($wedid != "")
	{
		 
		$chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
	 
		$selectwed_access= $userslog_obj->selectVal($chkqry);
		if(count($selectwed_access))
		{
			
			$chkqryres= "SELECT url_sts.mrg_url_sts_auto_id, url_sts.mrg_page_url, info.male_name, info.female_name, info.marriage_date, info.marriage_location, info.reception_date, info.reception_location, info.home_img, info.marriage_status, info.reception_status, info.mrg_res_address_same_status, info.address_details_landmark FROM mrg_url_status url_sts, mrg_all_info info WHERE url_sts.mrg_url_sts_auto_id = '".$wedid."' AND url_sts.mrg_url_sts_auto_id = info.mrg_url_status_auto_id ";
			$selectwedres_access= $userslog_obj->selectVal($chkqryres);
			
			$_SESSION['lastupdate_id'] = $selectwedres_access[0]['mrg_url_sts_auto_id'];
			$wedname = $selectwedres_access[0]['male_name']." & ".$selectwedres_access[0]['female_name'];
			$marriage_location = $selectwedres_access[0]['marriage_location'];
			$marriage_date = $selectwedres_access[0]['marriage_date'];
			//$marriage_date =date('jS F, Y - h:i a', strtotime("$marriage_date"));
			$wedurl = $selectwedres_access[0]['mrg_page_url'];
			$marriage_status = $selectwedres_access[0]['marriage_status'];
			if($marriage_status != 1) {
			$marriage_date = $selectwedres_access[0]['reception_date'];
			$marriage_location = $selectwedres_access[0]['reception_location'];
			}
			$wedurl='http://www.inviteindia.com/'.$wedurl;
			
			// List avilable wed URLs.
			$smarty->assign('wed_acc_id', $wedid );
			$smarty->assign('do_val', $current_action);			
			$smarty->assign('selectwedres_access', $selectwedres_access );
			
			//$emailshare_tmpl= $userslog_obj->getShareEmailTemplate();
			$emailshare_tmpl=$mails_obj->getShareEmailTemplate();
			$emailshare_tmpl = str_replace("%uname%", $_SESSION['sess_user_name'], $emailshare_tmpl);
			$emailshare_tmpl = str_replace("%wednames%", $wedname, $emailshare_tmpl);
			$emailshare_tmpl = str_replace("%eventaddress%", $marriage_location, $emailshare_tmpl);
			$emailshare_tmpl = str_replace("%datetime%", $marriage_date, $emailshare_tmpl);
			$emailshare_tmpl = str_replace("%wedsurl%", $wedurl, $emailshare_tmpl);
			$emailsub=$share_wed_email_subject;
			$emailsub = str_replace("%uname%", $_SESSION['sess_user_name'], $emailsub);
			if(trim($_REQUEST['share_by_mail']) == 'Submit')
			{
			$fremail=trim($_REQUEST['friends_emails']);
			$emailtmpl=trim($_REQUEST['txt_area_share_by_mail']);
			$emailsub=trim($_REQUEST['email_sub']);
			$err_sts=0;
			$err_msg='<ul>';
			if($fremail == '')
				{
				$err_sts=1;
				$err_msg.='<li>Please enter your friends emails.</li>';
				}			
			if ($emailsub == '')
				{
				$err_sts=1;
				$err_msg.='<li>Please enter email subject.</li>';
				}
			if($emailtmpl == '')
				{
				$err_sts=1;
				$err_msg.='<li>Please enter email text.</li>';
				}
			$err_msg.='</ul>';
			$fromemail='';
			if($err_sts==0)
			{
			$email_pieces = explode(",", $fremail);
			$arrayobject = new ArrayObject($email_pieces);
			
				for($iterator = $arrayobject->getIterator();
			    $iterator->valid();
			    $iterator->next()) {
					$curr_val=trim($iterator->current());
					if($curr_val != '')
					{
							if(preg_match('/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/',$curr_val)){
							$chkqry= "SELECT friends_email FROM user_friends_email_lists where user_log_id  = '".$user_log_id."' and friends_email='".$curr_val."' ";	 
							$selectwed_access= $userslog_obj->selectVal($chkqry);
							if(count($selectwed_access))
							{
							
							}
							else
							{
							$fr_name=explode("@", $curr_val);
							// New friends, so need to insert in DB
							$inqry= "INSERT INTO user_friends_email_lists (auto_id, user_log_id, friends_email,friends_name, current_status) VALUES (NULL, '".$user_log_id."', '".$curr_val."', '".$fr_name[0]."', '1' )";		 
							$emails_friends = $userslog_obj->insertVal($inqry);
							}
							$fromemail .=  $curr_val."," ;
							}
							else
							{
							$err_sts=1;
							$err_msg.='<li>Please enter valid email. <i>'.$curr_val.'</i> its not an email.</li>';
							}
					}
				}
			}
			$emailshare_tmpl=$emailtmpl;
			
			if($err_sts != '1' and $fromemail != '')
			{
			// sent mail	
			// Remove last char from emaillists
			
			$headers = 'Content-type: text/html;&nbsp;charset=iso-8859-1' . "\r\n";
			$common_obj->simplemail($fromemail, $emailsub, $emailshare_tmpl, $headers);
			$fremail='';
			$smarty->assign('err_class', 'succ');
			$err_sts=1;
			$err_msg.='<li>Your invitations successfully sent.</li>';
			}
			}
			$smarty->assign('err_sts', $err_sts);
			$smarty->assign('err_msg', $err_msg);
			$smarty->assign('friendslist', $fremail);
			$smarty->assign('emailsub', $emailsub);
			$smarty->assign('emailshare', $emailshare_tmpl);
			$content_template = 'default/mrg_account/wedshare_by_email.tpl';
		}
		else
		{ 
			echo "Sorry something Wrong, Please try again.";
		}
	}
	else
	{ 
		echo "Sorry something Wrong, Please try again.";
	}

} 
$home_page_title = "Free wedding website | Invite your friends | Share wedding invitations";
$home_page_meta_desc = "Create your wedding invitation with colourful themes with more features and share with your friends, Invite your friends from Inviiteindia.com";
$home_page_meta_key = "wedding ecards, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates, Invite your friends, Share wedding card";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('glb_albumstatus', $albumstatus); 
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
