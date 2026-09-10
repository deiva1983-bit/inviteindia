<?php
 include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/
$usrname= trim($_SESSION['sess_user_id']);

  $smarty->assign('glb_site_url', $glb_site_url);
										 
 $smarty->assign('user_log_id', $usrname );
    //interview-questions.html
    $smarty->assign('currentpage_js', 'viewanswer');
	
	$chkqry= "SELECT sub_subid,sub_subname,sub_subdes,sub_suburl FROM `subject` where sub_substatus ='1' ";
	$selectsms_access= $userslog_obj->selectVal($chkqry);	
 
 
	  $url="";
	    
		foreach($selectsms_access as $key=>$field)
			 							 {
										 
										 $subjectname="";
										 $subjectname =str_replace(" ", "-", $field['sub_suburl']);
										 $url.="<dd><a href='".$glb_site_url.'interview-questions/'.$subjectname."' title='".$field['sub_subdes']."'>".$field['sub_subdes']."</a></dd>";										 
										   
										 }
										 
									  
								$smarty->assign('left_nav', $url);	
				$smarty->assign('pagetitle', 'inviteindia: Interview questions and answers, Interview Tips, Technical Tips,How to face Interview');
				$smarty->assign('metadesc', 'Free SMS- Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
				$smarty->assign('metakeywords', 'Free SMS, Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
		
		
									 
	 
	    
	 
		 
		  
		  if ($_REQUEST['quesname'] != "" && $_REQUEST['quesid'] != "")
			{
			
			 $quesid = $_REQUEST['quesid'];
			 
			$ques_name =  str_replace("-", " ", $_REQUEST['quesname']); 
			
		 
				$smarty->assign('pagetitle', 'inviteindia: '.$ques_name.' - Interview questions and answers, Interview Tips, Technical Tips,How to face Interview');
				$smarty->assign('metadesc',  $ques_name.' - Free SMS- Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
				$smarty->assign('metakeywords', $ques_name.' - Free SMS, Send Free SMS, Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
		
				$sql="SELECT `ques_subid` as ques_subid,ques_topicid as topid FROM `questions` WHERE `ques_id` =  '".$quesid."' " ;

				$topics_ans= $userslog_obj->selectVal($sql);	
								
				$subid= $topics_ans[0]['ques_subid'] ; 
				$questopid= $topics_ans[0]['topid'] ;
				
				$related_topic_list= "SELECT top_topicid,top_topicname,top_url FROM `topic` where top_subid = '".$subid."' and top_status = 1 limit 0,5 ";
		 
			$related_topic_list= $userslog_obj->selectVal($related_topic_list);	
			$related_topic="";		 
			 foreach($related_topic_list as $key=>$field) 
								 {							
								 $topicnameold = $field['top_url'];
								 $fid = $field['top_topicid'];
								 $top_topicname = $field['top_topicname'];
								 $top_url =str_replace(" ", "-", $topicnameold);	
														 
								
								$top_topicname= $userslog_obj->myTruncate($top_topicname,15, " ");					
								 $related_topic.="<dd><a href=".$glb_site_url."interview-questions/".$top_url."/".$questopid." 
													title=".$top_topicname.">".$top_topicname."</a></dd>";		
								    
								 }
				$related_topic.="<div align='right'><dd>
							 <a href='".$glb_site_url."interview-questions/".$top_url_more_link."'>more...</a></dd></div>";					 
					
										 
	 
			
				$smarty->assign('sess_ans_add_status', $_SESSION['sess_ans_add_status']);
				 $_SESSION['sess_ans_add_status']='';
				$smarty->assign('related_topic', $related_topic);
				
				
			 
			 
			 
								 
									 
									 
									 
				  $sql="SELECT `ans_id` AS ansid, `ans_answer` AS answer, usrpro_fname AS uname, usrpro_lname AS uid, usrpro_profile_img AS pimg, ans_datecreated AS datecreated, ans_rating_count AS rate_counter, ans_rating_value AS rate_value
FROM `answers` , tbl_user_profile WHERE `ans_quesid` = '".$quesid."' AND usrlog_id = `ans_userid` and ans_status='1' ORDER BY `ans_id` ";


								$topics_ans= $userslog_obj->selectVal($sql);	

	   
										 $smarty->assign('qrycount', count($topics_ans));	
										 $smarty->assign('quesid', $quesid);
										 $smarty->assign('topics_ans', $topics_ans);	
										  $smarty->assign('ques_name', $ques_name);	
										 
										// $topics_ans
			} 
			 			 
 
			 
			
			
			
			
			
$content_template = 'default/viewanswer.tpl';
 

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>

