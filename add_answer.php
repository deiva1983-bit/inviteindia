<?php
 
include_once( 'includes/configs/init.php' ); 
include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$ip_addr="192.568.2";
$userslog_obj = new userslog();
$common_obj = new common();
$usrname= trim($_SESSION['sess_user_id']);
$date=  date("Y-m-d H:i:s");

$smarty->assign('glb_site_url', $glb_site_url);
										 
$smarty->assign('user_log_id', $usrname );
$my_ans = $_REQUEST['txt_my_ans'];
$qid = $_REQUEST['hdn_ques_id'];

 $chkqry= "SELECT ques_name FROM `questions` where ques_id='".$qid."' ";
	$Rows= $userslog_obj->selectVal($chkqry);	
	 
	 
	 $q_url =str_replace(" ", "-", $Rows['0']['ques_name']);	
	 
	 $qurl=$glb_site_url."view-answers/".$qid."/".$q_url;  
	 
	 
if(trim($my_ans) != "")
{
$inqry = "INSERT INTO `answers` (`ans_id` ,`ans_quesid` ,`ans_userid` ,`ans_answer` ,`ans_tags` ,`ans_rating_count` ,`ans_rating_value` ,
`ans_datecreated` ,`ans_datemodified` ,`ans_status`, `ans_ip_addr`)
VALUES (NULL , '".$qid."', '".$usrname."', '".$my_ans."', '', '', '', '".$date."', '".$date."', '0', '".$ip_addr."')";
$order_list_id = $userslog_obj->insertVal($inqry);	

// mail features
	
	
if($order_list_id)
{
 $_SESSION['sess_ans_add_status']='1';
header("Location: ".$qurl);
}
}
else
{
 $_SESSION['sess_ans_add_status']='2';
header("Location: ".$qurl);
}

   
?>
