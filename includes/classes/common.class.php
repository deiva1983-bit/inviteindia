<?php
ob_start();
//-------------------------------------------------------------------------------------------------------------------
// File name   : common.class.php
// Description : Handles servcies related tasks
// Class Name  : Common
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 16-02-2010
// Modified date: 16-02-2010
// ------------------------------------------------------------------------------------------------------------------


class common extends ClassGeneral {

		var $db_connect;
		var $tbl_name;
		
	function __construct(){
		global $glb_obj_genral;
		$this->db_connect = $glb_obj_genral->db_connect;
	}

	function IND_money_format($money){
    $len = strlen($money);
    $m = '';
    $money = strrev($money);
    for($i=0;$i<$len;$i++){
        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
            $m .=',';
        }
        $m .=$money[$i];
    }
    return strrev($m);
	}
	
		function check_file_exist($filepath=""){
		$avilable=0;
		if($filepath != "" ) {
		$fp = FULL_PATH.$filepath; 
		if (file_exists($fp)) { 
		    $avilable=1;
		} else {
		    $avilable=0;
		}
		}
	return $avilable;
	}

	function load_mobile_files($isMob, $filepath=""){
		$fp='';
		if($filepath != "" ) {
			if($isMob) { // Mobile
			$pieces = explode(".", $filepath);
			$mob_url = $pieces[0].'_mobile.'.$pieces[1];
			if(self::check_file_exist($mob_url)) {
				$fp = $mob_url;
				} else {
				$fp = $filepath;
				}
			} else { // PC
			$fp = $filepath;
			}
		}
		return $fp;
	}

	function load_mobile_tpl_files($isMob, $filepath=""){
		$fp='';
		if($filepath != "" ) {
			if($isMob) { // Mobile
			$pieces = explode(".", $filepath);
			$mob_url = $pieces[0].'_mobile.'.$pieces[1];
			if(self::check_file_exist('templates/'.$mob_url)) {
				$fp = $mob_url;
				} else {
				$fp = $filepath;
				}
			} else { // PC
			$fp = $filepath;
			}
		}
		return $fp;
	}

	function simplemail($to, $sub, $cont, $headers="")
	{
	$headers .= 'From: Wedding website <customerservice@inviteindia.com>' . "\r\n";
	if ($sub == '')
		$sub = 'inviteindia.com - wedding website.';
	//echo $to.'--'.$sub;
	if (mail($to, $sub, $cont, $headers)) 
		return 1;
	  else 
	  return 0; 
	  
	}

	function getImageSize($imgpath="")
	{
	$imgsize =filesize($_FILES['uploaded_albumimage']['tmp_name']);
	if($imgsize) {
		$imgsize_kb = round($imgsize/1024);
		if($imgsize_kb) {
		return $imgsize_kb;
		} else {
		return 0;
		}
	} else {
	return 0;
	}
	}

	function getOrdinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
	}

	function checkWedFree($uid, $wid) {
		// $qry_operation = "SELECT mrg_url_sts_auto_id FROM mrg_url_status WHERE mrg_main_user_id = '".$uid."' and mrg_url_sts_auto_id='".$wid."'";
		 $qry_operation = "select a.mrg_url_sts_auto_id from `mrg_url_status` a, `tbl_user_login` b where a.`mrg_url_sts_auto_id` = '".$wid."' and a.`mrg_site_revert_status` = '1' and a.`mrg_main_user_id` = '".$uid."' and a.`mrg_main_user_id` = b.`usrlog_id` and b.`usrlog_plan` = '0' ";
		$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		$this->db_connect->closedb();
		return count ($get_merchant_select);
	}
	function checkWedCount($uid) {
		// $qry_operation = "SELECT mrg_url_sts_auto_id FROM mrg_url_status WHERE mrg_main_user_id = '".$uid."' and mrg_url_sts_auto_id='".$wid."'";
		$qry_operation = "SELECT COUNT(*) as total_wed FROM `mrg_url_status`where `mrg_main_user_id` = '".$uid."' ";
		$get_wed_select = $this->db_connect->querySelect($qry_operation);
		foreach($get_wed_select as $key=>$field)
		{
		 $total_wed =$field['total_wed'];
		}
		$this->db_connect->closedb();
		return $total_wed;
	}
	function deleteDir($dirPath) {
    /*if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }*/
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function deleteWed($wedid){
	// delete home page - images
	$hmpage ='../templates/default/mrg_template/home_images/'.$wedid.'/';
	self::deleteDir($hmpage);
	// delete home page - images
	$coverimg ='../templates/covers/'.$wedid.'/';
	self::deleteDir($coverimg);
	// delete album - images
	$coverimg ='../templates/albums/'.$wedid.'/';
	self::deleteDir($coverimg);
	// delete own page - images
	$ownpageimg ='../templates/default/mrg_template/ownpage_images/'.$wedid.'/';
	self::deleteDir($ownpageimg);
	$dele_qry = "DELETE FROM  `mrg_all_info` WHERE `mrg_url_status_auto_id` = '".$wedid."' LIMIT 1";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `mrg_comments` WHERE comm_owner_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `wedding_msg` WHERE wedding_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);
	
	$dele_qry = "DELETE FROM `wed_ownpage_parah` WHERE master_wed_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `wed_ownpage` WHERE wedid = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `mrg_photos` WHERE photo_owner_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `mrg_all_info_add` WHERE mrg_url_status_auto_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	$dele_qry = "DELETE FROM `mrg_all_info_tmp` WHERE tmp_mrg_url_status_auto_id = '".$wedid."' ";
	$dele_mas = $this->db_connect->queryExecuteUpdate($dele_qry);

	}
function updatePayment_owndomain($data){
	$in_qry = "INSERT INTO `tbl_payments` (pay_autoid, pay_userid, pay_txnid, pay_amount, pay_status, pay_planid, pay_createdtime, 	pay_type) VALUES ( null,
                '".$data['user_id']."' ,
                '".$data['txn_id']."' ,
                '".$data['payment_amount']."' ,
                '".$data['payment_status']."' ,
                '".$data['plan_id']."' ,
                '".date("Y-m-d H:i:s")."' , '".$data['pay_type']."' )" ; 
     $in_mas = $this->db_connect->queryExecute($in_qry);
    if($in_mas){
	$sele_qry= "SELECT own_domain_child_id from mrg_url_status where mrg_main_user_id ='".$data['user_id']."' and mrg_url_sts_auto_id ='".$data['pay_wedid']."' ";
	$domain_ref_id=''; 
		$pass_access= $this->db_connect->querySelect($sele_qry);
		foreach($pass_access as $key=>$field)
		{
		 $domain_ref_id =$field['own_domain_child_id'];
		}
		$upqry= "UPDATE `tbl_own_domain` SET `own_domain_pay_status` = '1' WHERE own_domain ='".$domain_ref_id."' LIMIT 1 " ;
		$order_list_id = $this->db_connect->queryExecuteUpdate($upqry);
		return $order_list_id;
	}
}
function updatePayment($data){
	$in_qry = "INSERT INTO `tbl_payments` (pay_autoid, pay_userid, pay_txnid, pay_amount, pay_status, pay_planid, pay_createdtime, 	pay_type) VALUES ( null,
                '".$data['user_id']."' ,
                '".$data['txn_id']."' ,
                '".$data['payment_amount']."' ,
                '".$data['payment_status']."' ,
                '".$data['plan_id']."' ,
                '".date("Y-m-d H:i:s")."' , '".$data['pay_type']."' )" ; 
     $in_mas = $this->db_connect->queryExecute($in_qry);
    if($in_mas){
    $upqry= "UPDATE `tbl_user_login` SET `usrlog_plan` = '".$data['plan_id']."', usrlog_activests = '1', 	tbl_payments_ref = '".$in_mas."' WHERE `usrlog_id` ='".$data['user_id']."' LIMIT 1 " ;
    $order_list_id = $this->db_connect->queryExecuteUpdate($upqry);
    return $order_list_id;
	}

}


function getConverterAmt($from_Currency, $to_Currency, $amount)
	{
	$from_Currency = urlencode($from_Currency);
  $to_Currency = urlencode($to_Currency);
  $get = file_get_contents("http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);  
  $converted_amount = round(floatval(preg_replace("/[^0-9\.]/", null, $get[0])), 2);
  return $converted_amount;
  
  }

 function getPackInfo($uid)
	{
     $payment_planid = '';
	 if($uid != '')
		{
	$fetchimages= "SELECT usrlog_plan FROM tbl_user_login WHERE usrlog_id ='$uid' and usrlog_activests = 1";
	$fetchimages = $this->db_connect->querySelect($fetchimages);
	$giftdetails="";
	foreach($fetchimages as $key=>$field)
		{
		 $payment_planid =	$field['usrlog_plan'];
		} 
		}
		else
		{
		$payment_planid = '';
		}
  return $payment_planid;
  }

  function getCountryList($type)
  {
  return '<select id="'.$type.'"><option value="AED">United Arab Emirates Dirham (AED)</option>
<option value="AFN">Afghan Afghani (AFN)</option>
<option value="ALL">Albanian Lek (ALL)</option>
<option value="AMD">Armenian Dram (AMD)</option>
<option value="ANG">Netherlands Antillean Guilder (ANG)</option>
<option value="AOA">Angolan Kwanza (AOA)</option>
<option value="ARS">Argentine Peso (ARS)</option>
<option value="AUD">Australian Dollar (A$)</option>
<option value="AWG">Aruban Florin (AWG)</option>
<option value="AZN">Azerbaijani Manat (AZN)</option>
<option value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
<option value="BBD">Barbadian Dollar (BBD)</option>
<option value="BDT">Bangladeshi Taka (BDT)</option>
<option value="BGN">Bulgarian Lev (BGN)</option>
<option value="BHD">Bahraini Dinar (BHD)</option>
<option value="BIF">Burundian Franc (BIF)</option>
<option value="BMD">Bermudan Dollar (BMD)</option>
<option value="BND">Brunei Dollar (BND)</option>
<option value="BOB">Bolivian Boliviano (BOB)</option>
<option value="BRL">Brazilian Real (R$)</option>
<option value="BSD">Bahamian Dollar (BSD)</option>
<option value="BTN">Bhutanese Ngultrum (BTN)</option>
<option value="BWP">Botswanan Pula (BWP)</option>
<option value="BYR">Belarusian Ruble (BYR)</option>
<option value="BZD">Belize Dollar (BZD)</option>
<option value="CAD">Canadian Dollar (CA$)</option>
<option value="CDF">Congolese Franc (CDF)</option>
<option value="CHF">Swiss Franc (CHF)</option>
<option value="CLF">Chilean Unit of Account (UF) (CLF)</option>
<option value="CLP">Chilean Peso (CLP)</option>
<option value="CNH">CNH (CNH)</option>
<option value="CNY">Chinese Yuan (CN¥)</option>
<option value="COP">Colombian Peso (COP)</option>
<option value="CRC">Costa Rican Colón (CRC)</option>
<option value="CUP">Cuban Peso (CUP)</option>
<option value="CVE">Cape Verdean Escudo (CVE)</option>
<option value="CZK">Czech Republic Koruna (CZK)</option>
<option value="DEM">German Mark (DEM)</option>
<option value="DJF">Djiboutian Franc (DJF)</option>
<option value="DKK">Danish Krone (DKK)</option>
<option value="DOP">Dominican Peso (DOP)</option>
<option value="DZD">Algerian Dinar (DZD)</option>
<option value="EGP">Egyptian Pound (EGP)</option>
<option value="ERN">Eritrean Nakfa (ERN)</option>
<option value="ETB">Ethiopian Birr (ETB)</option>
<option value="EUR">Euro (€)</option>
<option value="FIM">Finnish Markka (FIM)</option>
<option value="FJD">Fijian Dollar (FJD)</option>
<option value="FKP">Falkland Islands Pound (FKP)</option>
<option value="FRF">French Franc (FRF)</option>
<option value="GBP">British Pound Sterling (£)</option>
<option value="GEL">Georgian Lari (GEL)</option>
<option value="GHS">Ghanaian Cedi (GHS)</option>
<option value="GIP">Gibraltar Pound (GIP)</option>
<option value="GMD">Gambian Dalasi (GMD)</option>
<option value="GNF">Guinean Franc (GNF)</option>
<option value="GTQ">Guatemalan Quetzal (GTQ)</option>
<option value="GYD">Guyanaese Dollar (GYD)</option>
<option value="HKD">Hong Kong Dollar (HK$)</option>
<option value="HNL">Honduran Lempira (HNL)</option>
<option value="HRK">Croatian Kuna (HRK)</option>
<option value="HTG">Haitian Gourde (HTG)</option>
<option value="HUF">Hungarian Forint (HUF)</option>
<option value="IDR">Indonesian Rupiah (IDR)</option>
<option value="IEP">Irish Pound (IEP)</option>
<option value="ILS">Israeli New Sheqel (₪)</option>
<option value="INR">Indian Rupee (Rs.)</option>
<option value="IQD">Iraqi Dinar (IQD)</option>
<option value="IRR">Iranian Rial (IRR)</option>
<option value="ISK">Icelandic Króna (ISK)</option>
<option value="ITL">Italian Lira (ITL)</option>
<option value="JMD">Jamaican Dollar (JMD)</option>
<option value="JOD">Jordanian Dinar (JOD)</option>
<option value="JPY">Japanese Yen (¥)</option>
<option value="KES">Kenyan Shilling (KES)</option>
<option value="KGS">Kyrgystani Som (KGS)</option>
<option value="KHR">Cambodian Riel (KHR)</option>
<option value="KMF">Comorian Franc (KMF)</option>
<option value="KPW">North Korean Won (KPW)</option>
<option value="KRW">South Korean Won (₩)</option>
<option value="KWD">Kuwaiti Dinar (KWD)</option>
<option value="KYD">Cayman Islands Dollar (KYD)</option>
<option value="KZT">Kazakhstani Tenge (KZT)</option>
<option value="LAK">Laotian Kip (LAK)</option>
<option value="LBP">Lebanese Pound (LBP)</option>
<option value="LKR">Sri Lankan Rupee (LKR)</option>
<option value="LRD">Liberian Dollar (LRD)</option>
<option value="LSL">Lesotho Loti (LSL)</option>
<option value="LTL">Lithuanian Litas (LTL)</option>
<option value="LVL">Latvian Lats (LVL)</option>
<option value="LYD">Libyan Dinar (LYD)</option>
<option value="MAD">Moroccan Dirham (MAD)</option>
<option value="MDL">Moldovan Leu (MDL)</option>
<option value="MGA">Malagasy Ariary (MGA)</option>
<option value="MKD">Macedonian Denar (MKD)</option>
<option value="MMK">Myanmar Kyat (MMK)</option>
<option value="MNT">Mongolian Tugrik (MNT)</option>
<option value="MOP">Macanese Pataca (MOP)</option>
<option value="MRO">Mauritanian Ouguiya (MRO)</option>
<option value="MUR">Mauritian Rupee (MUR)</option>
<option value="MVR">Maldivian Rufiyaa (MVR)</option>
<option value="MWK">Malawian Kwacha (MWK)</option>
<option value="MXN">Mexican Peso (MX$)</option>
<option value="MYR">Malaysian Ringgit (MYR)</option>
<option value="MZN">Mozambican Metical (MZN)</option>
<option value="NAD">Namibian Dollar (NAD)</option>
<option value="NGN">Nigerian Naira (NGN)</option>
<option value="NIO">Nicaraguan Córdoba (NIO)</option>
<option value="NOK">Norwegian Krone (NOK)</option>
<option value="NPR">Nepalese Rupee (NPR)</option>
<option value="NZD">New Zealand Dollar (NZ$)</option>
<option value="OMR">Omani Rial (OMR)</option>
<option value="PAB">Panamanian Balboa (PAB)</option>
<option value="PEN">Peruvian Nuevo Sol (PEN)</option>
<option value="PGK">Papua New Guinean Kina (PGK)</option>
<option value="PHP">Philippine Peso (Php)</option>
<option value="PKG">PKG (PKG)</option>
<option value="PKR">Pakistani Rupee (PKR)</option>
<option value="PLN">Polish Zloty (PLN)</option>
<option value="PYG">Paraguayan Guarani (PYG)</option>
<option value="QAR">Qatari Rial (QAR)</option>
<option value="RON">Romanian Leu (RON)</option>
<option value="RSD">Serbian Dinar (RSD)</option>
<option value="RUB">Russian Ruble (RUB)</option>
<option value="RWF">Rwandan Franc (RWF)</option>
<option value="SAR">Saudi Riyal (SAR)</option>
<option value="SBD">Solomon Islands Dollar (SBD)</option>
<option value="SCR">Seychellois Rupee (SCR)</option>
<option value="SDG">Sudanese Pound (SDG)</option>
<option value="SEK">Swedish Krona (SEK)</option>
<option value="SGD">Singapore Dollar (SGD)</option>
<option value="SHP">Saint Helena Pound (SHP)</option>
<option value="SLL">Sierra Leonean Leone (SLL)</option>
<option value="SOS">Somali Shilling (SOS)</option>
<option value="SRD">Surinamese Dollar (SRD)</option>
<option value="STD">São Tomé and Príncipe Dobra (STD)</option>
<option value="SVC">Salvadoran Colón (SVC)</option>
<option value="SYP">Syrian Pound (SYP)</option>
<option value="SZL">Swazi Lilangeni (SZL)</option>
<option value="THB">Thai Baht (฿)</option>
<option value="TJS">Tajikistani Somoni (TJS)</option>
<option value="TMT">Turkmenistani Manat (TMT)</option>
<option value="TND">Tunisian Dinar (TND)</option>
<option value="TOP">Tongan Paʻanga (TOP)</option>
<option value="TRY">Turkish Lira (TRY)</option>
<option value="TTD">Trinidad and Tobago Dollar (TTD)</option>
<option value="TWD">New Taiwan Dollar (NT$)</option>
<option value="TZS">Tanzanian Shilling (TZS)</option>
<option value="UAH">Ukrainian Hryvnia (UAH)</option>
<option value="UGX">Ugandan Shilling (UGX)</option>
<option value="USD">US Dollar ($)</option>
<option value="UYU">Uruguayan Peso (UYU)</option>
<option value="UZS">Uzbekistan Som (UZS)</option>
<option value="VEF">Venezuelan Bolívar (VEF)</option>
<option value="VND">Vietnamese Dong (₫)</option>
<option value="VUV">Vanuatu Vatu (VUV)</option>
<option value="WST">Samoan Tala (WST)</option>
<option value="XAF">CFA Franc BEAC (FCFA)</option>
<option value="XCD">East Caribbean Dollar (EC$)</option>
<option value="XDR">Special Drawing Rights (XDR)</option>
<option value="XOF">CFA Franc BCEAO (CFA)</option>
<option value="XPF">CFP Franc (CFPF)</option>
<option value="YER">Yemeni Rial (YER)</option>
<option value="ZAR">South African Rand (ZAR)</option>
<option value="ZMK">Zambian Kwacha (1968&ndash;2012) (ZMK)</option>
<option value="ZMW">Zambian Kwacha (ZMW)</option>
<option value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option></select>';
  }
 
  
function getrandomdata($tablename, $fieldname='', $cond='1')
	{
		$qry_operation = "SELECT $fieldname FROM $tablename WHERE $cond";
		$get_qry_select = $this->db_connect->querySelect($qry_operation);
		$selectcnt= count ($get_qry_select);
		if($selectcnt)
		{
		$selectcnt--;
		$randv = ($selectcnt) ? rand(0, $selectcnt) : '0';
		return $get_qry_select[$randv];
		}
		else
		{
		return 'no';
		}
		
	}
	
 function getRealIpAddr()
        {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    } 
    return $ip;
    }
	
	function matchUID_WedID($uid, $wid) {
		 $qry_operation = "SELECT mrg_url_sts_auto_id FROM mrg_url_status WHERE mrg_main_user_id = '".$uid."' and mrg_url_sts_auto_id='".$wid."'";
		$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		$this->db_connect->closedb();		
		return count ($get_merchant_select);;	
	}
	function matchUID_BirthID($uid, $wid) {
		 $qry_operation = "SELECT birth_url_sts_auto_id FROM birth_url_status WHERE birth_main_user_id = '".$uid."' and birth_url_sts_auto_id='".$wid."'";
		$get_merchant_select = $this->db_connect->querySelect($qry_operation);
		$this->db_connect->closedb();		
		return count ($get_merchant_select);;	
	}
	 function rand_str($val="")
        {
                $length = $val;
                $chars = '123456789';
                // Length of character list
                $chars_length = strlen($chars) - 1;
                // Start our string
                $string = $chars[rand(0, $chars_length)];
		   // Generate random string
                for ($i = 1; $i < $length; $i = strlen($string))
                {
                        // Grab a random character from our list
                        $r = $chars[rand(0, $chars_length)];
                
                        // Make sure the same two characters don't appear next to each other
                        if ($r != substr($string, -1)) $string .=  $r;
                }
                // Return the string
		return $string;
	}


	function Pagination($total_pages,$limit,$target_page,$page,$start,$page_name)
   	 {
        $adjacents = 1;
        $total_pages = (int) $total_pages;
        $limit = (int) $limit;
        $page = (int) $page;
        $start = (int) $start;

        if ($page == 0) $page = 1;
            $prev = $page - 1;
            $next = $page + 1;
            $last_page = ceil($total_pages/$limit);
            $lpm1 = $last_page - 1;
            $pagination = "";
            $start1=($start+1);
            //$remaining=$total_pages-$start1;
            $remaining=$start1+$limit-1;

            if($total_pages < $remaining)
            {
                $remaining=$total_pages;
            }
            if($last_page >= 1)
            {
                // first
              //$pagination1=$start1."&nbsp;-&nbsp;".$remaining."&nbsp;of&nbsp;".$total_pages."&nbsp;&nbsp;";
              $pagination1="<div class='pagination'>";
                if ($page==1)
                    $pagination.="
                    ".$pagination1.
                    "<span class='disabled'> &laquo; </span>";

                else
                    $pagination.="".$pagination1."<a href='$target_page&$page_name=1'>&laquo;</a>";


                // previous
                 if ($page > 1)
                    $pagination.="<a href='$target_page&$page_name=$prev'> &#8249; </a>";
                 else
                    $pagination.= "<span class='disabled'>&#8249;</span>";

                if ($last_page < 7 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter <= $last_page; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class='current'>$counter</span>";
                        else
                            $pagination.= "<a href='$target_page&$page_name=$counter'>$counter</a>";
                    }
                }
                elseif($last_page > 5 + ($adjacents * 2))
                {

                    if($page < 1 + ($adjacents * 2))
                    {
                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$target_page&$page_name=$counter'>$counter</a>";
                        }
                        $pagination.= "...";
                        $pagination.= "<a href='$target_page&$page_name=$lpm1'>$lpm1</a>";
                        $pagination.= "<a href='$target_page&$page_name=$last_page'>$last_page</a>";
                    }

                    elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                        $pagination.= "<a href='$target_page&$page_name=1'>1</a>";
                        $pagination.= "<a href='$target_page&$page_name=2'>2</a>";
                        $pagination.= "...";
                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$target_page&$page_name=$counter'>$counter</a>";
                        }
                        $pagination.= "...";
                        $pagination.= "<a href='$target_page&$page_name=$lpm1'>$lpm1</a>";
                        $pagination.= "<a href='$target_page&$page_name=$last_page'>$last_page</a>";
                    }
                    //close to end; only hide early pages
                    else
                    {
                        $pagination.= "<a href='$target_page&$page_name=1'>1</a>";
                        $pagination.= "<a href='$target_page&$page_name=2'>2</a>";
                        $pagination.= "...";
                        for ($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class='current'>$counter</span>";
                            else
                                $pagination.= "<a href='$target_page&$page_name=$counter'>$counter</a>";
                        }
                    }
                }

                //next button
                if ($page < $counter - 1)
                    $pagination.= "<a href='$target_page&$page_name=$next'>&#8250;</a>";
                else
                    $pagination.= "<span class='disabled'>&#8250;</span>";

                if ($page==$last_page)
                    $pagination.= "<span class='disabled'>&raquo;</span>";
                else
                    $pagination.= "<a href=$target_page&$page_name=$last_page>&raquo;</a>";


            $pagination=$pagination."</div>";
            }

       return $pagination;
     }


}
?>
