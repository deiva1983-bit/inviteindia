<?php 
include_once( 'includes/configs/init.php' ); 
 //include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/	 
		  
    //header.html 
	 $smarty->assign('topnav_select', 'inter');
	 $usrname= trim($_SESSION['sess_user_id']);
	  
	 $smarty->assign('user_log_id', $usrname );
	 
	 $smarty->assign('glb_site_url', $glb_site_url);
 					
										 

    //interview-questions.html
	$smarty->assign('currentpage_js', 'interviewhome');
	
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


if($_REQUEST['subname'] != "" && $_REQUEST['topicid'] == "")
		{		 
		$subject_name =  str_replace("-", " ", $_REQUEST['subname']); 
 		$smarty->assign('pagetitle', 'inviteindia: '.$subject_name.' - Interview questions and answers, Interview Tips, Technical Tips,How to face Interview');
		$smarty->assign('metadesc', $subject_name.': - Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
		$smarty->assign('metakeywords', $subject_name.': -  Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
		$sub_name = str_replace("-", " ", $_REQUEST['subname']); 
		$subject_name =  str_replace("-", " ", $_REQUEST['subname']);  
				 
		$chkqry= "SELECT sub_subid FROM `subject` where sub_suburl = '".$subject_name."' and sub_substatus = 1 ";
		$top= $userslog_obj->selectVal($chkqry);			
		 
         	$topicid = $top[0]['sub_subid']; 	 
		
		$chkqry= "SELECT top_topicid,top_topicname,top_url FROM `topic` where top_subid = '".$topicid."' and top_status = 1 ";
		 
		$topicurlval= $userslog_obj->selectVal($chkqry);	
		$topicurl="";
		foreach($topicurlval as $key=>$field)
						{	
						$subjectname="";
						$top_urls =str_replace(" ", "-", $field['top_url']);										 	
						// $topicurl.="<dd><a href=".$glb_site_url."interview-questions/".$top_urls."/".$topicid." title=".$field['top_topicname'].">".$field['top_topicname']."</a></dd>"; 
						$topicurl.="<ul><li><p><b><a href=".$glb_site_url."interview-questions/".$top_urls."/".$topicid." title=".$field['top_topicname'].">".$field['top_topicname']."</a></b></p></li>	</ul>";
						}

		$smarty->assign('topicurl', $topicurl);
		}
		
		else if ($_REQUEST['subname'] != "" && $_REQUEST['topicid'] != "")
			{

			
			$subject_name =  str_replace("-", " ", $_REQUEST['subname']); 
 			$smarty->assign('pagetitle', 'inviteindia: '.$subject_name.' - Interview questions and answers, Interview Tips, Technical Tips,How to face Interview');
			$smarty->assign('metadesc', $subject_name.': - Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
			$smarty->assign('metakeywords', $subject_name.': -  Interview questions and answers, Interview Tips, Technical Tips,How to face Interview,freasher interview');
		
			$top= "SELECT top_topicid,top_subid FROM `topic` where (top_url = '".$subject_name."' and top_status = 1 and 
						top_subid='".$_REQUEST['topicid']."') ";
		  
			$top= $userslog_obj->selectVal($top);				 
			 	 
       			$topicid = $top[0]['top_topicid']; 
			$topicid = $topicid;
			$subject_id = $top[0]['top_subid'];  
		 
			
			$related_topic_more_link= "SELECT sub_suburl FROM `subject` where sub_subid = '".$subject_id."' and sub_substatus = 1 ";
		 
			$related_topic_more_link= $userslog_obj->selectVal($related_topic_more_link);	
			
			$top_url_more_link =str_replace(" ", "-", $related_topic_more_link[0]['sub_suburl']);		
			
			
			
			
			$related_topic_list= "SELECT top_topicid,top_topicname,top_url FROM `topic` where top_subid = '".$_REQUEST['topicid']."' and top_status = 1 limit 0,5 ";
		 
			$related_topic_list= $userslog_obj->selectVal($related_topic_list);	
			$related_topic="";		 
			 foreach($related_topic_list as $key=>$field) 
								 {							
								 $topicnameold = $field['top_url'];
								 $fid = $field['top_topicid'];
								 $top_topicname = $field['top_topicname'];
								 $top_url =str_replace(" ", "-", $topicnameold);							 
								$top_topicname= $userslog_obj->myTruncate($top_topicname,15, " ");						
								 $related_topic.="<dd><a href=".$glb_site_url."interview-questions/".$top_url."/".$_REQUEST['topicid']." 
													title=".$top_topicname.">".$top_topicname."</a></dd>";		
								    
								 }
				$related_topic.="<div align='right'><dd>
							 <a href='".$glb_site_url."interview-questions/".$top_url_more_link."'>more...</a></dd></div>";					 
					
										 
	 

				 
				$smarty->assign('related_topic', $related_topic);
			 /* $sql="SELECT q.ques_id as qid,q.ques_name as qname FROM `questions` as q WHERE q.`ques_subid` = '".$subjectid."' and q.`ques_topicid`
				 = '".$topicid."'"; 
				 
				 
			 $topics_questions =$obj_interview->selectquestionsonly($topicid,$_REQUEST['topicid']);  */
			 
			 $topics_questions="SELECT q.ques_id as qid,q.ques_name as qname FROM `questions` as q WHERE q.`ques_subid` = '".$_REQUEST['topicid']."' and q.`ques_topicid` = '".$topicid."'";  
			$topics_questions= $userslog_obj->selectVal($topics_questions);	
			
			
			  $quesurl="";$i=0;$str='';
			 foreach($topics_questions as $key=>$field) 
								 {							 
 									
							 						
									$qname = $field['qname'];
									 $top_urls= str_replace(" ","-",$qname);
									$qid = $field['qid'];
									$quesurl.=" 
                             
                                  <ul><li>
								  		<p><b><a href='".$glb_site_url."view-answers/".$qid."/".$top_urls."'>".$qname."</a></b></p>
                                      </li>
								   </ul>
                          
                     ";			
									 
								 }    
			 
		 	 			 
$smarty->assign('quesurl', $quesurl);
			}
			
			
$content_template = 'default/interviewhome.tpl';
 

/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');


?>

