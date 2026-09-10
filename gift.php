<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' );
include "clusterdev.flipkart-api.php";
$common_obj = new common();
$flipkart = new \clusterdev\Flipkart("deivainvi", "a670edcd481f40a2b521062bc61b3362", "json");

$dotd_url = 'https://affiliate-api.flipkart.net/affiliate/offers/v1/dotd/json';
$topoffers_url = 'https://affiliate-api.flipkart.net/affiliate/offers/v1/top/json';
//$wedoffers_url = 'https://affiliate-api.flipkart.net/affiliate/1.0/search.json?query=wedding+gifts+couples&resultCount=20';
$wedoffers_url = 'https://affiliate-api.flipkart.net/affiliate/search/json?query=wedding+gifts+couples&resultCount=20';
//To view category pages, API URL is passed as query string.
$url = isset($_GET['url'])?$_GET['url']:false;
$page_nav = ''; $page_con = ''; $sub_text = '';

$top_links = '<a href="wedding-gift-for-couples"><span class="button1">Wedding gift</span></a>&nbsp;<a href="gift-collections"><span class="button1_selected">Product collections</span></a>&nbsp;<a href="special-offers-for-your-wedding-gift"><span class="button1">Deal of the day</span></a>';
if($url){
	//URL is base64 encoded to prevent errors in some server setups.
	$url = base64_decode($url);

	//This parameter lets users allow out-of-stock items to be displayed.
	$hidden = isset($_GET['hidden'])?false:true;

	//Call the API using the URL.
	$details = $flipkart->call_url($url);

	if(!$details){
		echo 'Error: Could not retrieve products list.';
		exit();
	}

	//The response is expected to be JSON. Decode it into associative arrays.
	$details = json_decode($details, TRUE);

	//The response is expected to contain these values.
	$nextUrl = $details['nextUrl'];
	$validTill = $details['validTill'];
	$products = $details['productInfoList'];

	//The navigation buttons.
	$page_nav = '<h2><a href="?">HOME</a> | <a href="?url='.base64_encode($nextUrl).'">NEXT >></a></h2>';

	//Message to be displayed if out-of-stock items are hidden.
	if($hidden)
		$page_con .= 'Products that are out of stock are hidden by default. Please <a href="?hidden=1&url='.base64_encode($url).'">Click here</a> to display OUT-OF-STOCK item also.<br><br>';

	//Products table
	//Show table
	$page_con .= "<div class='container-fluid'>";
	$count = 0;
	$end = 1;

	//Make sure there are products in the list.
	if(count($products) > 0){
		foreach ($products as $product) {

			//Hide out-of-stock items unless requested.
			$inStock = $product['productBaseInfo']['productAttributes']['inStock'];
			if(!$inStock && $hidden)
				continue;
			
			//Keep count.
			$count++;

			//The API returns these values nested inside the array.
			//Only image, price, url and title are used in this demo
			$productId = $product['productBaseInfo']['productIdentifier']['productId'];
			$title = $product['productBaseInfo']['productAttributes']['title'];
			$productDescription = $product['productBaseInfo']['productAttributes']['productDescription'];

			//We take the 200x200 image, there are other sizes too.
			$ownstyle=0;
			$productImage = array_key_exists('200x200', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['200x200']:'';
			 if($productImage == '') {
			$ownstyle=1;
			$productImage = array_key_exists('unknown', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['unknown']:'';
			}
			/*
			if($productImage == '') {
			$productImage = array_key_exists('800x800', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['800x800']:'';
			} */
			$sellingPrice = $product['productBaseInfo']['productAttributes']['sellingPrice']['amount'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
			$productBrand = $product['productBaseInfo']['productAttributes']['productBrand'];
			$color = $product['productBaseInfo']['productAttributes']['color'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];

			//Setting up the table rows/columns for a 3x3 view.

			$end = 0;
			if($count%3==1)
				$page_con .= '<div class="row"><div class="col-md-4 text-center div_styling">';
			else if($count%3==2)
				$page_con .= '</div><div class="col-md-4 text-center">';
			else{
				$page_con .= '</div><div class="col-md-4 text-center">';
				$end =1;
			}
			if($ownstyle) {
			$page_con .= '<a target="_blank" href="'.$productUrl.'"><img src="'.$productImage.'" style="max-width: 200px;" /><br>'.$title."</a><br><b>Rs. ".$common_obj->IND_money_format($sellingPrice).'</b>';
			} else {
			$page_con .= '<a target="_blank" href="'.$productUrl.'"><img src="'.$productImage.'" /><br>'.$title."</a><br><b>Rs. ".$common_obj->IND_money_format($sellingPrice).'</b>';
			}
			

			if($end)
				$page_con .= '</div></div>';

		}
	}

	//A message if no products are printed.	
	if($count==0){
		$page_con .= '<div class="row"><div class="col-md-12 text-center">Sorry, The retrieved products are not in stock. Try the Next button or another category.</div></div>';
	}
	//Next URL link at the bottom.
	$page_con .= '<div class="row col-md-12"><div class="col-md-12 text-right"><h2><a href="?url='.base64_encode($nextUrl).'">NEXT >></a></h2></div></div>';

	$page_con .= '</div>';
	//That's all we need for the category view.

} else {




$sub_text = 'Click on a category link to show available products from that category.';

//If the control reaches here, the API directory view is shown.

//Query the API
$home = $flipkart->api_home();

//Make sure there is a response.
if($home==false){
	echo 'Error: Could not retrieve API homepage';
	exit();
}

//Convert into associative arrays.
$home = json_decode($home, TRUE);

$list = $home['apiGroups']['affiliate']['apiListings'];

$page_con='';
//Create the tabulated view for different categories.
$page_con .= "<div class='container-fluid'>";
$count = 0;
$end = 1;
foreach ($list as $key => $data) {
	$count++;
	$end = 0;
	//To build a 3x3 table.
	if($count%3==1)
		$page_con .= '<div class="row"><div class="col-md-4 div_styling">';
	else if($count%3==2)
		$page_con .= '</div><div class="col-md-4 div_styling">';
	else{
		$page_con .= '</div><div class="col-md-4 div_styling">';
		$end =1;
	}

	$page_con .= "<strong>".$key."</strong>";
	$page_con .= "<br>";
	//URL is base64 encoded when sent in query string.
	$page_con .= '<a href="?url='.base64_encode($data['availableVariants']['v0.1.0']['get']).'">View Products &raquo;</a>';
	if($end==1)
	$page_con .= '</div></div>';
}



}
$page_con .= '</div>';
$content_template = 'default/gift_account/theme_gift.tpl';
$smarty->assign('user_page_con', $page_con );
$smarty->assign('user_head_links', $top_links );
$smarty->assign('user_sub_text', $sub_text );



$smarty->assign('do_val', 'wedd_music');
$from_src= trim($_REQUEST['from']);
$smarty->assign('glb_site_url', $glb_site_url);
$smarty->assign('topnav_select', 'wgift');
$smarty->assign('pagetitle', $gift_coll_page_title.$common_page_title_end);
$smarty->assign('metadesc', $gift_coll_page_meta_desc);
$smarty->assign('metakeywords', $gift_coll_keywords); 
$smarty->assign('currentpage_js', 'flipkart');

$smarty->assign('user_log_id', $user_log_id );
//Content for left nav 
$smarty->assign('left_nav_for_wed', $smarty->fetch('default/gift_account/left_nav_for_gift.tpl') );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
