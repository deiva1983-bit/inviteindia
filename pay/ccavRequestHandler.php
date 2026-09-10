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
	
	$merchant_data='';
	//$working_key='806103789F1FF0DA9741C4313F130F03';//Shared by CCAVENUES
	$workingKey=$CC_workingKey;		//Working Key should be provided here.
	$access_code=$CC_access_code;//Shared by CCAVENUES
	$working_key='A49DF471EC07AB258E0595041DDCE072';//Shared by CCAVENUES
	$access_code='AVHA85GE53BW26AHWB';//Shared by CCAVENUES
	//$workingKey= $CC_workingKey;
	//$access_code=$CC_access_code;
	$pay_plan = $_POST["merchant_param1"] ;
	$packval = 'price_'."$pay_plan";
	$item_amount = $$packval;
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

