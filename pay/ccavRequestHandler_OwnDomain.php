<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php'); 
include_once('../includes/configs/init.php');
?>
<?php 

	error_reporting(0);
	$userslog_obj = new userslog();
	$common_obj = new common();
	$merchant_data='';
	$working_key='A49DF471EC07AB258E0595041DDCE072';//Shared by CCAVENUES
	//$workingKey=$CC_workingKey;//Working Key should be provided here.
	//$access_code=$CC_access_code;//Shared by CCAVENUES
	//$working_key='806103789F1FF0DA9741C4313F130F03';//Shared by CCAVENUES
	$access_code='AVHA85GE53BW26AHWB';//Shared by CCAVENUES
	//$workingKey= $CC_workingKey;
	//$access_code=$CC_access_code;
	$pay_plan = $_POST["merchant_param2"] ; // It should be 'own' becuase of own domain
	$wedid = $_POST["merchant_param4"] ; // It should be invitation url
	$wed_user_id = $_POST["merchant_param3"] ; // It should be user id
	$my_wed_url = $_POST["merchant_param5"] ; // It should be website name, ex: www.akash_weds_nisash.com
	$name_cc = $_POST["contact_name_cc"] ; // It should be website name, ex: www.akash_weds_nisash.com
	$no_cc = $_POST["contact_no_cc"] ; // It should be website name, ex: www.akash_weds_nisash.com
	$dom_plan = $_POST["dom_plan_cc"] ; // Find domain type here, Like .com or .in.
	// START - Update your own invitation url with in Database, It should be use once payment is done.
	$page_allowed=$common_obj->matchUID_WedID($wed_user_id, $wedid);
	if($page_allowed){
	if($my_wed_url != '' && $wed_user_id != '' && $wedid != '' && $wedid != 'select'){
		$chkqry= "SELECT * FROM `mrg_url_status` where mrg_url_sts_auto_id='".$wedid."' and mrg_main_user_id='".$wed_user_id."' ";
		$selectAffectedRows = $userslog_obj->selectAffectedRows($chkqry);
		if($selectAffectedRows){
			// Insert child table - Domain status
			$inqry= "INSERT INTO `tbl_own_domain` (`own_domain`, `master_id`, `own_domain_name`, `own_domain_pay_status`, `own_domain_contact_name`, `own_domain_contact_no`, `own_domain_date`) VALUES (NULL, '".$wedid."', '".$my_wed_url."', '2', '".$name_cc."', '".$no_cc."', now() )";
			$inid_childtable = $userslog_obj->insertVal($inqry);

			$upqry= "UPDATE `mrg_url_status` SET own_domain_child_id = '".$inid_childtable."' WHERE mrg_url_sts_auto_id='".$wedid."' and mrg_main_user_id='".$wed_user_id."' LIMIT 1 " ;
			$order_list_id = $userslog_obj->updateVal($upqry); 
			} else {
			echo 'Sorry, We are unable to update your transaction. Please call us our customer service.'; exit;
			}
	} else {
			echo 'Sorry, We are unable to update your transaction. Please call us our customer service.'; exit;
			}
	// END 
	//print_r ($_POST); exit;
	$item_amount = $own_domain_inr;
	// Calculate amount based on your domain plan
	if ($dom_plan == 1) {
	$item_amount = $own_domain_inr_in;
	}else if ($dom_plan == 2) {
	$item_amount = $own_domain_inr_com;
	}
	if($pay_plan ==''){
	echo 'Plesase select your plan.'; exit;
	}
	if($item_amount ==''){
	echo 'Plesase select your plan. Amount is missing.'; exit;
	}
	//echo $item_amount; exit;
   // $merchant_add_data = "&merchant_id=$mid&amount=$item_amount";
   $merchant_add_data = "&amount=$item_amount";
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	$merchant_data .= $merchant_add_data;
	//echo $merchant_data; exit;
//   merchant_id=52161&order_id=123654789&amount=1.00
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	} else {
	echo 'Sorry, We are unable to update your transaction. Please call us our customer service.'; exit;
	}
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

