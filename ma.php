<?php

include_once( 'includes/configs/init.php' );
$userslog_obj = new userslog();
$in_requrl = trim($_REQUEST['requrl']);
//$in_requrl = 'aasdsadsads';
$qry = "SELECT a.`usrlog_username`, a.`usrlog_password`, b.mrg_url_sts_auto_id, b.mrg_main_user_id FROM `tbl_user_login` a, mrg_url_status b WHERE  a.usrlog_id = b.mrg_main_user_id and b.mrg_page_url='".$in_requrl."'" ;
$chk_page_access= $userslog_obj->selectVal($qry);
if(count($chk_page_access) ){
$username = $chk_page_access[0]['usrlog_username'];
$password = $chk_page_access[0]['usrlog_password'];
$sts_auto_id = $chk_page_access[0]['mrg_url_sts_auto_id'];
$user_id = $chk_page_access[0]['mrg_main_user_id'];
echo $username.'&nbsp;&nbsp;&nbsp;'.base64_decode($password);
echo "<br />";
echo "User ID-".$user_id;
echo "<br />";
echo "Invite ID-".$sts_auto_id;

}
?> 