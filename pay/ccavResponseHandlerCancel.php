<?php include('Crypto.php');
include_once('../includes/configs/init.php');
?>
<?php

	error_reporting(0);
	$smarty->assign('glb_site_url', $glb_site_url);
	$smarty->assign('topnav_select', 'aboutus');
	//$workingKey=$CC_workingKey;		//Working Key should be provided here.
	$workingKey='A49DF471EC07AB258E0595041DDCE072';	
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
 
	$trans_msg='';
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		$trans_msg = "<br>Thank you for shopping with us. Your payment is successfully completed. You can share your wedding invitations.";
		
	}
	else if($order_status==="Aborted")
	{
		$trans_msg = "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		$trans_msg = "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		$trans_msg = "<br>Security Error. Illegal access detected";
	
	}

	$trans_msg .= "<br><br>";

	    $smarty->assign('trans_msgs', $trans_msg);
	//$smarty->assign('header', $smarty->fetch('default/header.tpl') );
	/*----- Include Files Details Start-----*/
	$content_template = '../templates/default/about_trans.tpl';
	$smarty->assign('header', $smarty->fetch('../templates/default/header_pay.tpl') );
	$smarty->assign('content', $smarty->fetch($content_template) );
	$smarty->assign('footer', $smarty->fetch('../templates/default/footer.tpl') );
	/*----- Include Files Details End-----*/
	$smarty->display('../templates/default/index.tpl');
?>
