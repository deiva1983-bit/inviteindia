<?php
ob_start();
//-------------------------------------------------------------------------------------------------------------------
// File name   : Validator.class.php
// Description : Handles the validation information
// Class Name  : Validator
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 23-02-2010
// Modified date: 08-03-2010
// ------------------------------------------------------------------------------------------------------------------

class Validator 
{

	function ValidEmail($email){
	//echo $email;
		 list($username,$domain) = split('@',$email);
		if($email=="")
		{
		$errmsg="Enter the e-mail address.";
		}
		else if(strlen($email) >200)
		{
			$errmsg="Enter Maximum 200 Characters.";
				
		}
		else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
		{
			$errmsg = "Enter the valid e-mail address.";
		}
		else if(!checkdnsrr($domain,'MX')) 
		{
      			$errmsg = "Enter the valid e-mail address.";
    		}
		else
		{
			$errmsg = "";
		}
		return $errmsg;
		
	}
	 
function ChkInput($name,$fld)
	{
		
		if($name==""){
			
			$errmsg="Enter the $fld.";
		}
		else if($fld=="city name")
		{
			if(strlen($name)>60)
			{
			$errmsg = ucfirst($fld)." limit is maximum 60 characters.";
			}
		}
		else if($fld=="service name")
		{
			if(strlen($name)>60)
			{
			$errmsg = ucfirst($fld)." limit is maximum 60 characters.";
			}
		}

		else{	
			$errmsg ="";
		}
		
		return $errmsg;
	}




	function ValidPwd($pwd,$frm)
	{
		if($pwd=="")
		{
			if($frm!="profile")
			{
			$errmsg="Enter the password.";
			}
			else
			{
			$errmsg="Enter the new password.";
			}
		}
		else if(stristr($pwd,' ') ==TRUE)
		{
			$errmsg = "Spaces are not accepted in between the password.";
		}
		else if($frm=='regn' || $frm=='profile')
		{
		 	if(strlen($pwd)>8 || strlen($pwd)<6)
			{
			$errmsg="Enter 6 to 8 characters for password.";
			}
			else
			{
			$errmsg="";		
			}
		
		}
		
		else
		{
			$errmsg = "";
		}
		return $errmsg;
	}
	function CheckPassword($pwd, $cpwd,$frm)
	{
		if($cpwd=="")
		{
			if($frm=="profile")
			{
			$errmsg = "Enter the verify new password.";
			}
			else
			{
			$errmsg = "Enter the confirm password.";
			}	
		
		}
		else if($pwd!=$cpwd)
		{
			if($frm=="profile")
			{
			$errmsg = "Your new password and verify new password should be same.";
			}
			else
			{
			$errmsg = "Your password and confirm password should be same.";
			}	
		}
		else
		{
		$errmsg="";
		}
		
		return $errmsg;
	
	}
	function ValidAlpha($name,$fldname)
	{
		if($name=="")
		{
		 $errmsg = "Enter the $fldname.";	
		}
		else if(!preg_match("#^[-A-Za-z' ]*$#",$name))
		{
		$errmsg = "Numbers and special characters are not accepted in $fldname.";	
		}
		else if(strlen($name)>60)
		{
		$errmsg = "".ucfirst($fldname)." limit is maximum 60 characters.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;
	
	}

    	function IsValidChars($name,$fieldname)
	{
		if($name=="")
		{
		 $errmsg = "Enter the $fieldname.";	
		}
		elseif(!ereg("^([a-zA-Z\ -_]+[0-9]*)*$",$name)){
			$errmsg = "Enter the valid $fieldname.";	
		}
		else if(strlen($name)>60)
		{
		$errmsg = "".ucfirst($fieldname)." limit is maximum 60 characters.";
		}
		else{
			return "";
		}
	return $errmsg;

	}

	
	
	function ValidMobile($number)
	{
		if($number=="")
		{
		$errmsg = "Enter the mobile tel number.";
		}
		else if(!is_numeric($number))
		{
		$errmsg = "Mobile tel number should contain numbers only.";
		}
		else if(strlen($number)!=10 )
		{
		$errmsg = "Mobile number should be 10 numbers only.";
		}
		else
		{
		$errmsg = "";
		}
		return $errmsg;
	}
	function ValidPosition($position)
	{	
		if(!preg_match("#^[-A-Za-z0-9'. ]*$#",$position))
		{
		 $errmsg = "Job title should contain characters or numbers.";
		}
		else if(strlen($position)>60)
		{
		$errmsg = "Maximum Job title limit is 60 characters.";
		}
		else
		{
		$errmsg = "";
		}
		return $errmsg;
	}
	function ValidWebsite($website)
	{	
		if($website!="")
		{
			if(ereg("^http://[a-zA-Z0-9\.]+([a-zA-Z0-9\.\-_]+\.)+[a-zA-Z0-9]{2,4}$",$website))
			{
				$errmsg="";
			}
			else if(!ereg("^[a-zA-Z0-9\.]+([a-zA-Z0-9\.\-_]+\.)+[a-zA-Z0-9]{2,4}$",$website))
			{
				$errmsg="Enter a valid website URL.";
			}
			else
			{
				$errmsg = "";
			}
		}
		return $errmsg;
	}
	function ValidAddress($address, $fldname, $flag)
	{
		if($address=="" && $flag ==1)
		{
		$errmsg ="Enter the $fldname.";
		}
		else if($fldname!="company name")
		{
			if(strlen($address)>100)
			{
				$errmsg ="Maximum ".$fldname." length is 100 characters.";
			}
		}
		else if($fldname=="company name")
		{
			if(strlen($address)>200)
			{
				$errmsg ="Maximum ".$fldname." length is 200 characters.";
			}
			
		}
		else
		{
		$errmsg = "";
		}
		return $errmsg;
		
	
	}
	function ValidCity($city)
	{

		if($city=="")
		{
		 $errmsg = "Enter the city name.";	
		}
		else if(!preg_match("#^[-A-Za-z' ]*$#",$city))
		{
		$errmsg = "Enter the valid city.";	
		}
		else if(strlen($name)>100)
		{
		$errmsg = "Maximum city name limit is maximum 100 characters.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;

	}
	
	function ValidState($state)
	{

		if($state=="")
		{
		 $errmsg = "Enter the State/Province.";	
		}
		else if(!preg_match("#^[-A-Za-z' ]*$#",$state))
		{
		$errmsg = "Enter the valid State/Province.";	
		}
		else if(strlen($name)>100)
		{
		$errmsg = "Maximum limit is maximum 100 characters.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;

	}
	
	function ValidSelectState($state)
	{

		if($state=="0")
		{
		 $errmsg = "Select the State/Province.";	
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;

	}
	function ValidZipcode($zipcode)
	{	

		if($zipcode=="")
		{
		$errmsg ="Enter the zip code.";
		}
		else if(strlen($zipcode)>10)
		{
		$errmsg = "Maximum Zip code limit is 10 characters.";		
		}
		else if(!preg_match("#^[-A-Za-z0-9' ]*$#",$zipcode))
		{
		$errmsg = "Zip code should contain characters, numbers.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;			
	}

	function ValidTrnos($number, $fldname)
	{
		 $reg = "#[^a-z0-9-]#i";
      		 $count = preg_match($reg, $number, $matches);
		 if($number=="")
		 {
			 $errmsg="Enter the $fldname.";
		 }
		 else if ($count > 0)
		 {
			  $errmsg="".ucfirst($fldname)." should contain characters, numbers, hypens.";
		 }
		 else if(strlen($number)>50)
		 {
			$errmsg ="Maximum ".$fldname." length is 60.";
		 }
		 else
		 {
		  $errmsg="";
		 } 
		return $errmsg;
	
	}
	function ValidAlphaNumeric($number, $fldname)
	{
		 $reg = "#[^a-z0-9\s]#i";
      		 $count = preg_match($reg, $number, $matches);
		 if($number=="")
		 {
			 $errmsg="Enter the $fldname.";
		 }
		 else if ($count > 0)
		 {
			  $errmsg="".ucfirst($fldname)." should contain characters,numbers.";
		 }
		 else
		 {
		  $errmsg="";
		 } 
		return $errmsg;
	
	}
	
	function ValidTrms($value)
	{
		if($value !="1")
		{	
		  $errmsg="Accept the terms and conditions.";
		}
		else
		{
		 $errmsg="";
		}
		return $errmsg;

	}

	function ValidAlpha_with100($name,$fldname)
	{
		if($name=="")
		{
		 $errmsg = "Enter the $fldname";	
		}
		else if(!preg_match("#^[-A-Za-z' ]*$#",$name))
		{
		$errmsg = "Enter the valid $fldname.";	
		}
		else if(strlen($name)>100)
		{
		$errmsg = "".ucfirst($fldname)." limit is maximum 100 characters.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;
	
	}

 

	function ValidWebsiteSer($website,$webname)
	{	

		if($website!="")
		{
	

//if(!preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",$website)) 
/*if(!preg_match("/^[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",$website))
	{
	Echo"You must supply a valid URL.";
	Exit();
	}
	}
*/



		$regex = "((https?|ftp)\:\/\/)?"; // SCHEME
		$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
		$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
		$regex .= "(\:[0-9]{2,5})?"; // Port
		$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
		$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
		$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor
		
		if(preg_match("/^$regex$/", $website))
		{
			$errmsg="";
		}
			else
			{
			$errmsg = "Enter the valid ".ucfirst($webname).".";
			}


		/*
		if(preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",$website))
			{
				$errmsg="";
			}
			else if(!preg_match("/^[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",$website))
			{
				$errmsg = "Enter the valid ".ucfirst($webname).".";
			}
			else
			{
				$errmsg = "";
			} */

		}
		else		
		$errmsg = "Enter ".ucfirst($webname).".";
		return $errmsg; 
	}

	/*function validWebsiteSer($website,$webname)
	{	
		if($website!="")
		{
	
		if(ereg("^http://[a-zA-Z0-9\.]+([a-zA-Z0-9\.\-_]+\.)+[a-zA-Z0-9]{2,4}$",$website))
			{
				$errmsg="";
			}
			else if(!ereg("^[a-zA-Z0-9\.]+([a-zA-Z0-9\.\-_]+\.)+[a-zA-Z0-9]{2,4}$",$website))
			{
				$errmsg = "Enter the valid ".ucfirst($webname)."";
			}
			else
			{
				$errmsg = "";
			}

		}
		else		
		$errmsg = "Enter ".ucfirst($webname)."";
		return $errmsg;
	}*/
	
	function ValidTollNo($number)
	{
		if($number=="")
		{
		$errmsg = "Enter the toll free number";
		}
		else if(!is_numeric($number))
		{
		$errmsg = "Toll free number should contain numbers only";
		}
		else if(strlen($number)>10)
		{
		$errmsg = "Toll free number maximum limit is 10";
		}
		else
		{
		$errmsg = "";
		}
		return $errmsg;
	}

	function ValidAlpha_with60($name,$fldname)
	{
		if($name=="")
		{
		 $errmsg = "Enter the $fldname";	
		}
		else if(!preg_match("#^[-A-Za-z' ]*$#",$name))
		{
		$errmsg = "Enter the valid $fldname";	
		}
		else if(strlen($name)>60)
		{
		$errmsg = "".ucfirst($fldname)." limit is maximum 60 characters";
		
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;
	
	}
	
	function ValidAlpha_with50($name,$fldname)
	{
 
		/*if(!preg_match("#^[-A-Za-z' ]*$#",$name))
		{
		$errmsg = "Enter the valid $fldname";	
		}
		else */ 
		if(strlen($name)>50)
		{
		$errmsg = "".ucfirst($fldname)." limit is maximum 50 characters.";
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;
	
	}

	function ValidText_field($name,$fldname)
	{
		if(trim($name)=="")
		{
		 $errmsg = "Enter the $fldname";	
		}
		else
		{
		$errmsg="";
		}
		return $errmsg;
	
	}
	function chkWedUrlSts($number, $fldname)
	{	
		 $reg = "#[^a-z0-9-_]#i";
      		 $count = preg_match($reg, $number, $matches);
		 if($number=="")
		 {
			 $errmsg="Enter the $fldname.";
		 }
		 else if ($count > 0)
		 {
			  $errmsg="".ucfirst($fldname)." should contain characters,numbers.";
		 }
		 else
		 {
		  $errmsg="";
		 } 
		return $errmsg;
	
	}

	function chkUrlsts($number, $fldname)
	{	
		 $reg = "#[^a-z0-9- _]#i";
      		 $count = preg_match($reg, $number, $matches);
		 if($number=="")
		 {
			 $errmsg="Enter the $fldname.";
		 }
		 else if ($count > 0)
		 {
			  $errmsg="".ucfirst($fldname)." should contain characters,numbers.";
		 }
		 else
		 {
		  $errmsg="";
		 } 
		return $errmsg;
	
	}

	

}
?>
