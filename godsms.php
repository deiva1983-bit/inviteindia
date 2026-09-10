<?php
//======== Simple PHP code sample ==========//
	
/*
* This example requires allow_url_fopen to be enabled in php.ini. 
* If it is not enabled, file_get_contents()
* will return an empty result. 
* 
* We recommend that you use port 5567 instead of port 80, but your
* firewall will probably block access to this port (see FAQ for more
* details):
* $url = http://nettyhost.com/smsapi/TR/sendmsg.aspx?;
* 
* Please note that this is only for illustrative purposes, 
* we strongly recommend that you use our comprehensive example
*/
//$url = http://nettyhost.com/smsapi/TR/sendmsg.aspx?';
$url = 'http://api.nettyfish.com/smsapi/TR/sendmsg.aspx?';
//$url = 'http://nettyhost.com/smsapi/TR/sendmsg.aspx?';

$url = 'http://api.nettyfish.com/SMSAPI/TR/sendmsg.aspx?';
//username=demo&password=demo123&message=test&sendername=NETFSH&mobile=8681043002

$username="deivainviteindia";
$password="inviteindia123";
$message='Sample code';
$sendername='INVITE'; 
$message='test'; 
$tomobno='8681043002';


//$data = "username=$username&password=$password&message=".urlencode('Testing SMS')."&mobile=".urlencode($tomobno)."&sendername=INVITE";

$data = "username=demo&password=demo123&message=test1&sendername=NETFSH&mobile=8681043002";
$response = do_post_request($url, $data);

print $response;

function do_post_request($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
	$params = array('http'      => array(
		'method'       => 'POST',
		'content'      => $data,
		));
	if ($optional_headers !== null) {
		$params['http']['header'] = $optional_headers;
	}
	
	$ctx = stream_context_create($params);


	$response = @file_get_contents($url, false, $ctx);
	if ($response === false) {
		print "Problem reading data from $url, No status returned\n";
	}
	
	return $response;
}

?>