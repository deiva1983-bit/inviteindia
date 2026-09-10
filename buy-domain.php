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
setcookie("last_req_url", "", time()-3600);
$last_url = base64_encode($_SERVER['REQUEST_URI']);
setcookie("last_req_url", $last_url, $expire);
/*----- Object creation start-----*/
$userslog_obj = new userslog();
/*----- Object creation end-----*/
$smarty->assign('topnav_select', 'owndomain');

/*----- Variables Declaration Start-----*/
$smarty->assign('currentpage_js', 'owndomain');
/*----- Variables Declaration End-----*/
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
$smarty->assign('glb_user_log_id', $user_log_id);
$smarty->assign('currentpage_js', 'interviewhome');
$content_template = 'default/owndomain.tpl';
//$smarty->assign('pagetitle', 'online wedding website - create custom domain: inviteindia.com');
//$home_page_meta_desc='inviteindia now offers a brand new feature to create an even more personal experience. you create your custom domain name - inviteindia';
//$home_page_meta_key='custom domain name, own wedding website, free wedding website, wedding websites, indian marriage websites, e-invitation, marriage invitation, Wedding Card, E-Wedding Card, Online Invitations, free wedding ecards';

//$smarty->assign('pagetitle', $own_domain_page_title.$common_page_title_end);
//$smarty->assign('metadesc', $own_domain_page_desc);
$own_domain_page_title = 'Choose your perfect wedding website domain name - inviteindia.com';

$own_domain_page_title = 'Buy domain for your wedding website';

$own_domain_page_title = 'Buy best cheap domain for your wedding';
$own_domain_page_title = 'Prep for the Big Day: buy a cheaper wedding domain';
$own_domain_page_title = 'Secure Your Wedding Domain Name Today | InviteIndia';
$own_domain_page_desc = 'Register a personal domain for your wedding website through Inviteindia.com. We offer these features at a low cost, and your domain is valid for one year.';

$own_domain_page_desc = 'Registering a custom domain for your wedding website is one of the best impressions of your wedding. Domain registration cost Rs. 650 only, which includes domain registration, hosting process, and 12 months of maintenance.';
$own_domain_page_desc = 'Registering a custom domain for your wedding website is one of the best impressions of your wedding. Domain registration cost Rs. 650 only No additional charges';
$own_domain_page_desc = 'Are you getting married? so why not buy a cheap wedding website domain name? it\'s an excellent way to start building your online presence before your big day.';
$own_domain_page_desc = 'Are you getting married? so why not create a cheap wedding domain? It is an excellent way to start building your online presence before your big day.';
$own_domain_page_desc = 'Find and purchase the perfect domain for your wedding website with InviteIndia. Easy, fast, and personalized just for you.';
$own_domain_page_keywords = "Domain registration, Custom domain selection, Domain at the lowest price";
//$smarty->assign('pagetitle', $own_domain_page_title);
$smarty->assign('pagetitle', $own_domain_page_title);
$smarty->assign('metadesc', $own_domain_page_desc);

$smarty->assign('metakeywords', $own_domain_page_keywords);
/*----- Include Files Details Start-----*/

$smarty->assign('glb_domain_inr_in', $own_domain_inr_in.'.00');
$smarty->assign('glb_domain_us_in', $own_domain_us_in);




$selectfaq = 'select faq_questions,faq_answer from faqs where faq_status = 2';
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




$smarty->assign('glb_domain_inr_com', $own_domain_inr_com);
$smarty->assign('glb_domain_us_com', $own_domain_us_com);
$canurl = $ssl_path.'www.inviteindia.com/buy-domain.php';
$smarty->assign('can_url', $canurl);
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
