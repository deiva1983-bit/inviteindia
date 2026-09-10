<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : serviceproc.php
// Description : file to handle index page informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: DotCom Infoway
// Created date : 02-03-2010
// ------------------------------------------------------------------------------------------------------------------
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' ); 
$userslog_obj = new userslog();
$common_obj = new common();
 /*----- Object creation Start-----*/


 
/*----- Object creation End -----*/


/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'main_page_web');
$home_page_title = "FAQ about the wedding website";
$home_page_meta_desc = "Questions about the wedding website creation and the pros and cons of wedding websites";
$home_page_meta_key = "Wedding website questions, tips for your wedding website.";
$smarty->assign('pagetitle', $home_page_title.$common_page_title_end);
$smarty->assign('metadesc', $home_page_meta_desc);
$smarty->assign('metakeywords', $home_page_meta_key);
/*----- Variables Declaration End-----*/
//echo $_SESSION['notvalid'];
$doit=$_REQUEST['do'];
//if($doit != "")
$canurl = $ssl_path.'www.inviteindia.com/faq.php';
$smarty->assign('can_url', $canurl);
$smarty->assign('topnav_select', 'faq');
$selectfaq = 'select faq_questions,faq_answer from faqs where faq_status = 1';
$selectfaq_lists = $userslog_obj->selectVal($selectfaq);
$msgdetails=""; $mainEntity = ""; $mainEnt = "";
	foreach($selectfaq_lists as $key=>$field){
		$faq_ques =stripslashes($field['faq_questions']);
		$faq_ans =stripslashes($field['faq_answer']);
		$msgdetails .= '<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading'.$key.'">
			<span class="panel-title write_paras">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$key.'" aria-expanded="true" aria-controls="collapse'.$key.'">'.$faq_ques.'</a>
			</span>
		  </div>
		  <div id="collapse'.$key.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$key.'">
			<div class="panel-body write_paras">
			  <p>'.$faq_ans.'</p>
			</div>
		  </div>
		</div>';
		if ($faq_ques != '') {
		$mainEnt .= '{
        "@type": "Question",
        "name": "'.$faq_ques.'",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "<p>'.$faq_ans.'</p>"
        }
      }, ';
		}
	}
	$mainEnt = substr($mainEnt, 0, -2);
	$mainEntity = '
	<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
		'.$mainEnt.'
	]
    }
    </script> ';
$smarty->assign('faq_det', $msgdetails);
$smarty->assign('glb_mainEntity', $mainEntity);

$content_template = 'default/faq.tpl';
$content_template = $common_obj->load_mobile_tpl_files($isMobile, $content_template);
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
