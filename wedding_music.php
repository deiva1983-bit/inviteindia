<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
include('includes/functions/simpleimage.php');
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$smarty->assign('do_val', 'wedd_music');
$from_src= trim($_REQUEST['from']);
$smarty->assign('glb_site_url', $glb_site_url);
$home_page_title = "Wedding invitations - Wedding background music - inviteindia";
$home_page_meta_desc = "online wedding invitation website. Add background music for your wedding invitation and share with your friends - inviteindia";
$home_page_meta_key = "wedding animations, wedding ecards, wedding animations, online marriage invitation, create wedding ecards, online marriage invitation template, free wedding ecards, Wedding templates";

$smarty->assign('pagetitle', $home_page_title);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key); 
$user_log_id= trim($_SESSION['sess_user_id']);
$current_action= trim($_REQUEST['do']);
$wedid= trim($_REQUEST['wed_id']);
$smarty->assign('currentpage_js', 'theme_select_music');
$page_allowed=$common_obj->matchUID_WedID($user_log_id, $wedid);
if($page_allowed)
{
$user_allowed=$common_obj->checkWedFree($user_log_id, $wedid);
if($user_allowed){
$smarty->assign('blockpage', 1 ); 
$smarty->assign('errors', $free_errmsgs ); 
}

    $wedid= trim($_REQUEST['wed_id']);
        $chkqry= "SELECT mrg_page_url FROM mrg_url_status where mrg_url_sts_auto_id  = '".$wedid."' and mrg_main_user_id = '".$user_log_id."' ";
        $selectwed_acces= $userslog_obj->selectVal($chkqry);
        if(count($selectwed_acces))
        {
        $smarty->assign('page_url_status6', trim($selectwed_acces[0]['mrg_page_url'])."?status=6");
        }

		// Add your own wedding music - start
		$create_own_music= trim($_REQUEST['butt_create_own_music']);
		//echo $current_action.'---';
		//$_FILES["fileToUpload"]["size"]
		$show_err = 0; $alert_status = 0;
		if ($current_action == 'addmusic') {
		$bg_music = trim($_FILES['uploaded_music']['name']) ;
					if($bg_music != '')
						{
						#echo $_FILES['uploaded_music']['size'];
						if ($_FILES['uploaded_music']['size'] <= '1211664' && $_FILES['uploaded_music']['size'] != 0){
							$bg_musicext = strtolower(strrchr($bg_music,'.'));
							if($bg_musicext == '.mp3')
							{
									//$dirName = "audios/$wedid";
									$dirName = "audios/";
									//if (is_dir($dirName)){}else{mkdir($dirName, 0755);}
									//$dirName = $dirName.'/';
									$bg_music_name=$wedid.'.mp3';
									//$inpath = "$wedid/$wedid.mp3";
									$inpath = "$wedid.mp3";
									$target_path=$dirName. $bg_music_name; //echo $target_path;
									$upload_status = move_uploaded_file($_FILES['uploaded_music']['tmp_name'], $target_path);
									$chkqry_avi= "SELECT * FROM `wed_music` where wed_music_inviteid='".$wedid."' ";
									$selectAffectedRows_avi = $userslog_obj->selectAffectedRows($chkqry_avi);
									if(!$selectAffectedRows_avi){
										$inqry= "INSERT INTO `wed_music` (wed_music_id, wed_music_path, wed_music_active, wed_music_inviteid) VALUES (NULL, '".$inpath."', 1, '".$wedid."')";
										$order_list_id = $userslog_obj->insertVal($inqry);
									}
							}
						$alert_status = 1;
						} 
						else { $err_msg = 'Sorry, Please upload small audio file. It should be lessthen 1.10 MP.'; }
						$show_err = 1;
						} else {
						$show_err = 1;
						$err_msg = 'Please select your own music.';
						}
		}
		// Add your own wedding music - end

        //Display Avilable animations.
        $chkqry1= "SELECT wed_music_active, wed_music_id FROM mrg_all_info_add WHERE mrg_url_status_auto_id = '$wedid' ";
        $selectsms_wed= $userslog_obj->selectVal($chkqry1); $c_music_id = 0;
        if (count($selectsms_wed))
            {
            foreach($selectsms_wed as $key=>$field)
                {
                $music_act= $field['wed_music_active'];
                $c_music_id= $field['wed_music_id'];
                }
            }
    if($music_act == "")
    {
    $music_act =0 ;
    }
    $chkqry= "SELECT wed_music_name, wed_music_path, wed_music_id FROM wed_music WHERE wed_music_active = 1 and wed_music_inviteid = 1";
            $selectmusic_access= $userslog_obj->selectVal($chkqry);
            if (count($selectmusic_access)){
                    $msgdetails="";
                    $wed_music='<ul>';
                        foreach($selectmusic_access as $key=>$field){
                                $music_id= $field['wed_music_id'];
                                $music_path= $field['wed_music_path'];
                                $music_name= $field['wed_music_name'];
                                  /*  if($reff_id == $animate_id){
                                        $wed_music.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_id' class='music_lists' checked=checked><label for='$music_id' style='width: 234px;'>$music_name</label></li>";
                                        }else{
                                        $wed_music.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_id' class='music_lists'> <label for='$music_id' style='width: 234px;'>$music_name</label></li>";
                                        } */
                                        if($music_id == $c_music_id) {
                                        $wed_music.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_id' class='music_lists' checked=checked><label for='$music_id' style='width: 234px;'>$music_name</label></li>";
                                        } else {
                                       $wed_music.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_id' class='music_lists'> <label for='$music_id' style='width: 234px;'>$music_name</label></li>";
                                        }
                          }
                    $wed_music.='</ul>';
            }
            $smarty->assign('glb_wed_musics', $wed_music);
	$add_own_music = 'display: none;';
	// Fetch user related music
	 $chkqry1= "SELECT * FROM wed_music WHERE wed_music_inviteid = $wedid";
        $selectmusic_wed= $userslog_obj->selectVal($chkqry1);
		$wed_music_own='';
        if (count($selectmusic_wed))
            {
                $wed_music_own='<ul>';
                        foreach($selectmusic_wed as $key=>$field){
                                $music_id= $field['wed_music_id'];
								$music_inviteid= $field['wed_music_inviteid'];
                                $music_path= $field['wed_music_path'];
                                $music_name= $field['wed_music_name'];
                                    if($music_inviteid == $c_music_id){
                                        $wed_music_own.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_inviteid' class='music_lists' checked=checked><label for='$music_id' style='width: 234px;'>My favourite music</label></li>";
                                        }else{
                                        $wed_music_own.="<li><input type='radio' name='music_lists' value='$music_id' id='$music_inviteid' class='music_lists'> <label for='$music_id' style='width: 234px;'>My favourite music</label></li>";
                                        }
                          }
                    $wed_music_own.='</ul>';
				$add_own_music = 'display: inline;';
			}
	$smarty->assign('glb_add_music_sts', $add_own_music);
    $content_template = 'default/mrg_account/theme_music.tpl';
	$smarty->assign('glb_wed_music_own', $wed_music_own);
}
else
{
echo "Sorry, You cant access this page.";
}
$smarty->assign('alert_status', $alert_status);
$smarty->assign('glb_err_msg', $show_err);
$smarty->assign('glb_txt_msg', $err_msg);
$smarty->assign('do_val', $current_action);
$smarty->assign('glb_from_src', $from_src); 
$smarty->assign('user_wedid', $wedid );
$smarty->assign('wed_acc_id', $wedid );
//$content_template = 'default/mrg_account/theme_created_success.tpl';
$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/mrg_account/left_nav_for_wedding.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
