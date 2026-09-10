<?php
ob_start();
//-------------------------------------------------------------------------------------------------------------------
// File name   : merchants.class.php
// Description : Handles merchants related tasks
// Class Name  : Merchants
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 19-02-2010
// Modified date: 19-02-2010
// ------------------------------------------------------------------------------------------------------------------
ini_set('max_execution_time', 1800); //1800 seconds = 30 Mins
class cronsms extends ClassGeneral {
	function sendsms($smstext="", $mobno=""){
	
	$link = "http://api.nettyfish.com/SMSAPI/TR/sendmsg.aspx";
	$username="deivainviteindia";
	$password="inviteindia123";
	$sendername='NOTIFY';

	$param[username] = $username;

	$param[password] = $password;

	$param[sendername] = $sendername;

	$param[mobile] = $mobno;

	$param[message] = $smstext;



	foreach($param as $key=>$val)

		{

			$request.= $key."=".urlencode($val);

			$request.= "&";

		}

	$request = substr($request, 0, strlen($request)-1);

	$handle = fopen("$link?$request", "r");

/*

		$ch = curl_init();
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_TIMEOUT,60);
        curl_setopt($ch,CURLOPT_USERAGENT,'Generic Client');
        curl_setopt($ch,CURLOPT_POSTFIELDS,$qrystr);
        curl_setopt($ch,CURLOPT_URL,$curlurl);
		$response = curl_exec($ch);
        curl_close($ch);
        if ($optional_headers !== null) {
            curl_setopt($ch,CURLOPT_HTTPHEADER,$optional_headers);
        }


	// Initialize cURL
	$curl = curl_init();

	// Set the options
	curl_setopt($curl,CURLOPT_URL, $curlurl);

	// This sets the number of fields to post
	curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));

	// This is the fields to post in the form of an array.
	curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);

	//execute the post
	$result = curl_exec($curl);

	//close the connection
	curl_close($curl);


	$ch = curl_init();


		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$curlurl);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $qrystr);
        $html=curl_exec($ch);

        /*
		
		// Define URL where the form resides
$form_url = "http://www.mogosselin.dev/example/simple-post.php";

// This is the data to POST to the form. The KEY of the array is the name of the field. The value is the value posted.
$data_to_post = array();
$data_to_post['username'] = 'Mickey';
$data_to_post['password'] = 'Minnie';

// Initialize cURL
$curl = curl_init();

// Set the options
curl_setopt($curl,CURLOPT_URL, $form_url);

// This sets the number of fields to post
curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));

// This is the fields to post in the form of an array.
curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);

//execute the post
$result = curl_exec($curl);

//close the connection
curl_close($curl);


$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://sms.fullonsms.com/login.php");    
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_fie_path);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "MobileNoLogin=$username&LoginPassword=$password&x=16&y=14");
        $html=curl_exec($ch);
        curl_setopt($ch, CURLOPT_URL,"http://sms.fullonsms.com/home.php");    
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_fie_path);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "ActionScript=%2Fhome.php&CancelScript=%2Fhome.php&HtmlTemplate=%2Fvar%2Fwww%2Fhtml%2Ffullonsms%2FStaticSpamWarning.html&MessageLength=140&MobileNos=$tomobno&Message=$message&Gender=0&FriendName=Your+Friend+Name&ETemplatesId=&TabValue=contacts");        
        $html = curl_exec($ch); */
	}  
}
?>
