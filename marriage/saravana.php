<?php 
include_once( '../includes/configs/init.php' );
 //include_once( '../includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/	 
		  
    //header.html 
	 
	 $usrname= trim($_SESSION['sess_user_id']);
	  
	 $smarty->assign('user_log_id', $usrname );
	 
	 $smarty->assign('glb_site_url', $glb_site_url);
 					
	

    //interview-questions.html
	$smarty->assign('currentpage_js', 'wedhome');
	
	$chkqry= "SELECT messages,name FROM `wedding_msg` WHERE user_id =2 ORDER BY date DESC";
$selectsms_access= $userslog_obj->selectVal($chkqry);
                $msgdetails="";
		foreach($selectsms_access as $key=>$field)
                     {
                     $subjectname="";
                     $msginfo =wordwrap($field['messages'], 30, '<br />', true);
                     $name =wordwrap($field['name'], 23, "<br />", true);
                     $msgdetails.="<div id=mrgwish>".$name.":</div><div>".$msginfo."</div><div id=border_line></div>";
                     }

 $smarty->assign('msgdetails_tpl', $msgdetails);
  


	$smarty->assign('pagetitle', 'Wedding Invitation: Sundara moorthy weds Saranya on March 10, 2012 at Kailas mahal, Thirunageswaram.');
	$smarty->assign('metadesc', 'Wedding Invitation: Sundara moorthy weds Saranya on March 10, 2012 at Kailas mahal, Thirunageswaram.');
	$smarty->assign('metakeywords', 'Wedding Invitation: Sundara moorthy weds Saranya on March 10, 2012 at Kailas mahal, Thirunageswaram.');
        $smarty->assign('heading', 'You are invited...');
 
			
$content_template = 'default/marraige/saravana.tpl';
 

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/mheader.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl'); 

?>

