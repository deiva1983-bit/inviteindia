<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' );
include "clusterdev.flipkart-api.php";
$common_obj = new common();
$flipkart = new \clusterdev\Flipkart("deivainvi", "a670edcd481f40a2b521062bc61b3362", "json");

$dotd_url = 'https://affiliate-api.flipkart.net/affiliate/offers/v1/dotd/json';

//To view category pages, API URL is passed as query string.
$page_nav = ''; $page_con = ''; $sub_text = '';
if($isMobile)
$top_links = '<p class="write_para"><a href="wedding-gift-for-couples"><span class="button">Wedding gift</span></a></p><p class="write_para"><a href="special-offers-for-your-wedding-gift"><span class="button-selected">Deal of the day</span></a></p>';
else
$top_links = '<a href="wedding-gift-for-couples"><span class="button">Wedding gift</span></a><span class="manage-space"></span><a href="special-offers-for-your-wedding-gift"><span class="button-selected">Deal of the day</span></a>';

$offer = isset($_GET['offer'])?$_GET['offer']:false;
if($offer){

	if($offer == 'dotd'){
		//Call the API using the URL.
		$details = $flipkart->call_url($dotd_url);

		if(!$details){
			echo 'Error: Could not retrieve DOTD.';
			exit();
		}

		//The response is expected to be JSON. Decode it into associative arrays.
		$details = json_decode($details, TRUE);

		$list = $details['dotdList'];



		//Show table
		$page_con .= "<div class='container-fluid'>";
		$count = 0;
		$end = 1;

		//Make sure there are products in the list.
		if(count($list) > 0){
			foreach ($list as $item) {
				//Keep count.
				$count++;

				//The API returns these values
				$title = $item['title'];
				$description = $item['description'];
				$url = $item['url'];
				$imageUrl = $item['imageUrls'][0]['url'];
				$availability = $item['availability'];

				//Setting up the table rows/columns for a 3x3 view.
				$end = 0;
				if($count%3==1)
					$page_con .= '<div class="row"><div class="col-md-4 text-center">';
				else if($count%3==2)
					$page_con .= '</div><div class="col-md-4 text-center">';
				else{
					$page_con .= '</div><div class="col-md-4 text-center">';
					$end =1;
				}

				$page_con .= '<a target="_blank" href="'.$url.'"><img src="'.$imageUrl.'" style="max-width:200px; max-height:200px;"/><br>'.$title."</a><br>".$description;

				if($end)
					$page_con .= '</div></div>';

			}
		}
		//A message if no products are printed.	
		if($count==0){
			$page_con .= '<div class="row"><div class="col-md-4 text-center">Sorry, We dont have any products for this offer code.</div>';
		}

		//A hack to make sure the tags are closed.	
		$page_con .= '</div>';


	}else{
		echo 'Error: Invalid offer type.';
		exit();
	}

}


$content_template = 'default/gift_account/theme_gift.tpl';
$smarty->assign('user_page_con', $page_con );
$smarty->assign('user_head_links', $top_links );
$smarty->assign('user_sub_text', $sub_text );



$smarty->assign('do_val', 'wedd_music');
$from_src= trim($_REQUEST['from']);
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('topnav_select', 'wgift');
$smarty->assign('pagetitle', $dotd_page_title.$common_page_title_end);
$smarty->assign('metadesc', $dotd_page_meta_desc);
$smarty->assign('metakeywords', $dotd_keywords); 
$smarty->assign('currentpage_js', 'flipkart');
$smarty->assign('user_log_id', $user_log_id );
$canurl = $ssl_path.'www.inviteindia.com/special-offers-for-your-wedding-gift';
$smarty->assign('can_url', $canurl);
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/gift_account/left_nav_for_gift.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
