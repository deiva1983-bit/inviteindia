<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' );
include "clusterdev.flipkart-api.php";
$common_obj = new common();
$flipkart = new \clusterdev\Flipkart("deivainvi", "23609d95124a42cb97db96e18c90c682", "json");

$wedoffers_url = 'https://affiliate-api.flipkart.net/affiliate/1.0/search.json?query=wedding+gifts+for+couple&resultCount=20';
//$wedoffers_url = 'https://affiliate-api.flipkart.net/affiliate/search/json?query=wedding+gifts+couples&resultCount=20';
//To view category pages, API URL is passed as query string.
$url = isset($_GET['url'])?$_GET['url']:false;
$page_con = ''; $sub_text = '';

if($isMobile)
$top_links = '<p class="write_para"><a href="wedding-gift-for-couples"><span class="button">Wedding gift</span></a></p><p class="write_para"><a href="special-offers-for-your-wedding-gift"><span class="button-selected">Deal of the day</span></a></p>';
else
$top_links = '<a href="wedding-gift-for-couples"><span class="button">Wedding gift</span></a><span class="manage-space"></span><a href="special-offers-for-your-wedding-gift"><span class="button-selected">Deal of the day</span></a>';

$sub_text = '<h3 class="sub_head">Wedding gift: </h3>Wedding gifts are given to the couple to help them start married life out on the right foot.

<h3 class="sub_head">Are gifts required? </h3>When you receive a wedding invitation, it is customary to send a gift, whether or not you are able to attend. A gift is a great way to express best wishes to the couple for a long and happy life together.

Depending on your relationship with the couple, the gift can be small or something more substantial. A gift should be a token of affection, and is not intended to pay for the wedding. Contrary to popular belief, the value of the gift is not determined by calculating the amount of money spent on the reception divided by the number of guests.';


//Call the API using the URL.
$details = $flipkart->call_url($wedoffers_url);

if(!$details){
	echo 'Error: Could not retrieve Top Offers.';
	exit();
}

//The response is expected to be JSON. Decode it into associative arrays.
$details = json_decode($details, TRUE);
//print_r($details);
$list = $details['topOffersList'];
$products = $details['products'];
//The navigation buttons.

//Show table
$page_con .= "<div class='container-fluid'>";

$count = 0;
$end = 1;

//Make sure there are products in the list.
if(count($products) > 0){
	foreach ($products as $product) {
		//Hide out-of-stock items unless requested.
		$inStock = $product['productBaseInfoV1']['inStock'];
		if(!$inStock && $hidden)
			continue;

		//Keep count.
		$count++;

		//The API returns these values nested inside the array.
		//Only image, price, url and title are used in this demo
		$productId = $product['productBaseInfoV1']['productId'];
		$title = $product['productBaseInfoV1']['title'];
		$productDescription = $product['productBaseInfo']['productAttributes']['productDescription'];

		//We take the 200x200 image, there are other sizes too.
		$ownstyle=0;
		$productImage = array_key_exists('200x200', $product['productBaseInfoV1']['imageUrls'])?$product['productBaseInfoV1']['imageUrls']['200x200']:'';
		if($productImage == '') {
			$ownstyle=1;
			$productImage = array_key_exists('unknown', $product['productBaseInfoV1']['imageUrls'])?$product['productBaseInfoV1']['imageUrls']['unknown']:'';
			}
		/*
		if($productImage == '') {
		$productImage = array_key_exists('800x800', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['800x800']:'';
		} */
		$sellingPrice = $product['productBaseInfoV1']['flipkartSpecialPrice']['amount'];
		$productUrl = $product['productBaseInfoV1']['productUrl'];
		$productBrand = $product['productBaseInfoV1']['productBrand'];
		$color = $product['productBaseInfoV1']['attributes']['color'];

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
		
		$productDescription = '';
		if($ownstyle) {
		$page_con .= '<div><a target="_blank" href="'.$productUrl.'"><img src="'.$productImage.'" style="max-width: 200px;" /></a></div><div><p class="write_para">'.$title."</p></div><div class='sub_head'><b>Rs. ".$common_obj->IND_money_format($sellingPrice).'</b></div>';
		} else {
		$page_con .= '<div><a target="_blank" href="'.$productUrl.'"><img src="'.$productImage.'" /></a></div><div><p class="write_para">'.$title."</p></div><div class='sub_head'><b>Rs. ".$common_obj->IND_money_format($sellingPrice).'</b></div>';
		}

		
		if($end)
			$page_con .= '</div></div></div>';
		}
	}

		//A message if no products are printed.
		if($count==0){
		$page_con .= '<div class="row"><div class="col-md-4 text-center">Sorry, We dont have any wedding gift. Please check "Product Collection page" to find Collection of products.</div>';
		}

$page_con .= '</div>';
$content_template = 'default/gift_account/theme_gift.tpl';
$smarty->assign('user_page_con', $page_con );
$smarty->assign('user_head_links', $top_links );
$smarty->assign('user_sub_text', $sub_text );
$smarty->assign('topnav_select', 'wgift');
$smarty->assign('glb_site_url', $glb_site_url);

$smarty->assign('pagetitle', $wedding_gift_page_title.$common_page_title_end);
$smarty->assign('metadesc', $wedding_gift_page_meta_desc);
$smarty->assign('metakeywords', $sample_page_keywords); 
$smarty->assign('currentpage_js', 'flipkart');
$smarty->assign('user_log_id', $user_log_id );
$canurl = $ssl_path.'www.inviteindia.com/wedding-gift-for-couples';
$smarty->assign('can_url', $canurl);
//Content for left nav 
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
