<?php
/*----- Include Files -----*/
include_once( 'includes/configs/init.php' );
//include_once( 'includes/configs/sessioninc.php' );
/*----- Object creation start-----*/
$userslog_obj = new userslog();
$common_obj = new common();
$current_action= trim($_REQUEST['do']);
$invite_type = trim($_REQUEST['type']);
if($invite_type == '')
$invite_type = 1;
$smarty->assign('glb_invite_type', $invite_type);
// Request comes for change the theme
$bind_url="&do=$current_action";
$smarty->assign('topnav_select', 'wedd');
// http://localhost/social/select_theme.php?wed_id=44&do=sel0myli For Edit
// http://localhost/social/select_theme.php?do=cre0myli For Create
$home_page_title = "Wedding website | Birthday website - inviteindia";
$home_page_meta_desc = "Create your website for your wedding, birthday celebrations - inviteindia";
$home_page_meta_key = "Wedding website themes, Birthday website themes, Wedding invitation templates, Birthday invitation templates, Online wedding invitation";
$user_log_id= trim($_SESSION['sess_user_id']);
$wed_count = $common_obj->checkWedCount($user_log_id);
	$show_select_link = 0;
if($user_log_id != '' && $wed_count < 3 )
$show_select_link = 1;
$blocktheme = 0;
if($current_action=="select") {
    if($invite_type == 2) {
        $b_id= trim($_REQUEST['b_id']);
        $bind_url=$bind_url."&b_id=$b_id";
        $edit_theme_link='<a href=birth-secure.php?b_id='.$b_id.'&do=b12d id='.$b_id.' class="edit_wed_frm_change_theme button1">Edit Birthday Card</a>';
    } else {
        $wed_id= trim($_REQUEST['wed_id']);
        $bind_url=$bind_url."&wed_id=$wed_id";
        $edit_theme_link='<a href=wedding-secure.php?wed_id='.$wed_id.'&do=b12d id='.$wed_id.' class="edit_wed_frm_change_theme button">Go to settings</a>';
    }
    $submit_page="dboper.php?req=thmedt-$invite_type$bind_url";
    $chkqry1= "SELECT mrg_theme_id FROM mrg_url_status where mrg_url_sts_auto_id =". $wed_id;
    $selectalbum_access1= $userslog_obj->selectVal($chkqry1);
    $old_theme_id = $selectalbum_access1[0]['mrg_theme_id'];
    $smarty->assign('old_theme_id', $old_theme_id);
    $user_allowed=$common_obj->checkWedFree($user_log_id, $wed_id);
    if($user_allowed){
        $blocktheme = 1;
        $smarty->assign('blockpage', 1 );
        $smarty->assign('errors', $free_blocktheme );
    }
} elseif ($current_action=="create"){
    $bind_url=$bind_url;
    $submit_page="dboper.php?req=thmcrt-$invite_type$bind_url";
    $edit_theme_link='';
} elseif($current_action=="demo"){
$smarty->assign('topnav_select', 'themes');
$submit_page="dboper.php?req=thmcrt-$invite_type$bind_url";
$bind_url=$bind_url;
$edit_theme_link='';
} else {
$bind_url="&do=demo";
$smarty->assign('topnav_select', 'themes');
$submit_page="dboper.php?req=thmcrt-$invite_type$bind_url";
$bind_url=$bind_url;
$edit_theme_link='';
}
$tips_count = $wed_tips_count - 1;
$smarty->assign('glb_site_url', $glb_site_url);
$user_log_id= trim($_SESSION['sess_user_id']);
//$chkqry= "SELECT mrg_theme_name theme_name, mrg_theme_url theme_url FROM mrg_mas_theme where mrg_theme_status ='1' order by mrg_theme_show_status desc";
$chkqry= "SELECT mrg_theme_demo_img demo_img, mrg_theme_name theme_name, mrg_theme_url theme_url, mrg_theme_auto_id theme_id, theme_demo_url demo_url  FROM mrg_mas_theme where mrg_theme_status ='1' and mrg_theme_catid = '0' and theme_type = '$invite_type' and mrg_theme_name != 'test' order by mrg_theme_show_status asc";
$selectalbum_access= $userslog_obj->selectVal($chkqry);
$total_records = count($selectalbum_access);
if($total_records) {
    $content_template = 'default/mrg_account/select_theme.tpl';
    $commdetails="";
    $intv=0; $close1=0;
    foreach($selectalbum_access as $key=>$field) {
        $themename="";
        $themename =trim($field['theme_name']);
        $modval = $intv%3;
        $demoimg =trim($field['demo_img']);
        $themeurl =trim($field['theme_url']);
        $themeid =trim($field['theme_id']);
        $demourl =trim($field['demo_url']);
        $srcid = 'theme_'.$themeid;
		$submit_urls = "$submit_page&theme_id=$themeid&might=net";
        //<a href='templates/default/mrg_template/$themeurl/$demoimg' rel='$titletag' class='b-link-stripe b-animate-go  thickbox vlightbox1' title='$titletag'> $submit_page&theme_id=$themeid&might=net


		//<a class='vlightbox1' href='$static_domain_path_img/site/demo/$demoimg' title='$titletag'>
									//		<img src='$static_domain_path_img/site/demo/$demoimg' id='$srcid' class='img-thumbnail image-size-cont' />
									//	</a>
		//<li><a href='#' data-toggle='modal' data-target='#myModa$themeid'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a></li>

        if($modval == 0)    $commdetails.="<div class='w3ls_mobiles_grid_right_grid3'>";
        $dbtitle=$themename;
            $commdetails .= "<div class='col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles border_bott'>
                                <div class='agile_ecommerce_tab_left mobiles_grid'>
                                    <div class='hs-wrapper hs-wrapper2'>
                                        <img src='$static_domain_path_img/site/demo/$demoimg' alt='' class='img-responsive img-thumbnail image-size-cont' id='$srcid' />
                                        <div class='w3_hs_bottom w3_hs_bottom_sub1'>
                                        <ul>
                                            <li>
                                                <a href='$static_domain_path_img/site/demo/$demoimg' title='$titletag' class='vlightbox1'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                    <h5>$dbtitle</h5>";
									if($show_select_link){
                                    $commdetails .= "<div class='simpleCart_shelfItem'>
                                        <p class='flexisel_ecommerce_cart'><a href=$submit_urls class='w3ls-cart'>Select</a></p>
                                    </div>";
									}
                                    $commdetails .= "<div class='mobiles_grid_pos'>
                                        <h6>Free</h6>
                                    </div>
                                </div>
                            </div>";
            $intv++; $modval = $intv%3;
            if($modval == 0) { $commdetails.="<div class=clearfix></div></div>"; $close1=1; }
        }
		if (!$close1) {
			if($isMobile) {
			$commdetails.="</div>";
			} else {
			$commdetails.="<div class=clearfix></div></div>";
			}
		}
    }
    else
    {   // Dont have any themes.
    }

// Classic Themes - But we dont have Own BG image options
    $chkqry= "SELECT mrg_theme_demo_img demo_img, mrg_theme_name theme_name, mrg_theme_url theme_url, mrg_theme_auto_id theme_id, theme_demo_url demo_url  FROM mrg_mas_theme where mrg_theme_status ='1' and mrg_theme_catid = '1' and theme_type = '$invite_type' and mrg_theme_bg_image = '1' order by mrg_theme_show_status asc";
    $selectalbum_access = $userslog_obj->selectVal($chkqry);
    $total_records = count($selectalbum_access);
    if($total_records){
        $classic_commdetails="";
        $intv=0; $close2=0;
        foreach($selectalbum_access as $key=>$field) {
            $themename="";
            $themename =trim($field['theme_name']);
            $modval = $intv%3;
            $demoimg =trim($field['demo_img']);
            $themeurl =trim($field['theme_url']);
            $themeid =trim($field['theme_id']);
            $demourl =trim($field['demo_url']);
			$submit_urls = "$submit_page&theme_id=$themeid&might=net";
            $srcid = 'theme_'.$themeid;
            if($modval == 0)   $classic_commdetails.="<div class='w3ls_mobiles_grid_right_grid3'>";
            $titletag = $dbtitle;
            $classic_commdetails .= "<div class='col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles border_bott'>
                                        <div class='agile_ecommerce_tab_left mobiles_grid'>
                                            <div class='hs-wrapper hs-wrapper2'>
                                                <img src='$static_domain_path_img/site/demo/$demoimg' alt='' class='img-responsive img-thumbnail image-size-cont' id='$srcid' />
                                                <div class='w3_hs_bottom w3_hs_bottom_sub1'>
                                                    <ul>
                                                        <li>
                                                            <a href='$static_domain_path_img/site/demo/$demoimg' title='$titletag' class='vlightbox1'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h5>$dbtitle</h5>";
											if($show_select_link){
                                            $classic_commdetails .= "<div class='simpleCart_shelfItem'>
                                                <p class='flexisel_ecommerce_cart'>
												<a href=$submit_urls class='w3ls-cart'>Select</a>
												</p>
                                            </div>";
											}
                                            $classic_commdetails .= "<div class='mobiles_grid_pos'>
                                                <h6>Paid</h6>
                                            </div>
                                        </div>
                                    </div>";
                     $intv++; $modval = $intv%3;
                     if($modval == 0) { $classic_commdetails .= "<div class=clearfix></div></div>"; $close2=1; }
                     }
	if (!$close2) {$classic_commdetails .= "<div class=clearfix></div></div>";}
    }
    else
    {
    // Dont have any themes.
    }
    // Static contents only. - End

// Classic Themes - But we have Own BG image options
    $chkqry= "SELECT mrg_theme_demo_img demo_img, mrg_theme_name theme_name, mrg_theme_url theme_url, mrg_theme_auto_id theme_id, theme_demo_url demo_url  FROM mrg_mas_theme where mrg_theme_status ='1' and mrg_theme_catid = '1' and theme_type = '$invite_type' and mrg_theme_bg_image = '2' order by mrg_theme_show_status asc";
    $selectalbum_access= $userslog_obj->selectVal($chkqry);
    $total_records      = count($selectalbum_access);
    if($total_records) {
        $classic_commdetails_bg="";
        $intv=0; $close3=0;
        foreach($selectalbum_access as $key=>$field) {
                     $themename="";
                     $themename =trim($field['theme_name']);
                     $modval = $intv%3;
					 $row_col = $intv%2;
					 $row_color = ($row_col == 0 ) ? 'odd' : 'even';
                     $demoimg =trim($field['demo_img']);
                     $themeurl =trim($field['theme_url']);
                     $themeid =trim($field['theme_id']);
                     $demourl =trim($field['demo_url']);
                     $srcid = 'theme_'.$themeid;
					 $submit_urls = "$submit_page&theme_id=$themeid&might=net";
                    if($modval == 0)    $classic_commdetails_bg.="<div class='w3ls_mobiles_grid_right_grid3'>";
                    $dbtitle=$themename;
                    $classic_commdetails_bg .= "<div class='classic_thm_bg col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles border_bott row_$row_color'>
                                <div class='agile_ecommerce_tab_left mobiles_grid'>
                                    <div class='hs-wrapper hs-wrapper2'>
                                        <img src='$static_domain_path_img/site/demo/$demoimg' alt='' class='img-responsive img-thumbnail image-size-cont' id='$srcid' />
                                        <div class='w3_hs_bottom w3_hs_bottom_sub1'>
                                        <ul>
											<li>
												<a href='$static_domain_path_img/site/demo/$demoimg' title='$titletag' class='vlightbox1'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>
											</li>
                                        </ul>
                                        </div>
                                    </div>
									<div class='special_notes'>Support your own background images.</div>	
                                    <h5>$dbtitle</h5>";
									if($show_select_link){
                                    $classic_commdetails_bg .= "<div class='simpleCart_shelfItem'>
                                        <p class='flexisel_ecommerce_cart'><a href=$submit_urls class='w3ls-cart'>Select</a></p>
                                    </div>";
									}
                                    $classic_commdetails_bg .= "<div class='mobiles_grid_pos'>
										<h6>Paid</h6>
                                    </div>
                                </div>
                            </div>";
                     //$classic_commdetails_bg.="<div class='demo-links'><div class='view view-seventh'></div></div>";
                     $intv++; $modval = $intv%3;
                        if($modval == 0) {$classic_commdetails_bg.="<div class=clearfix></div></div>"; $close3=1; }
                     }
	if (!$close3) {$classic_commdetails_bg.="<div class=clearfix></div></div>";}
    }
    else
    {
    // Dont have any themes.
    }
$canurl = $ssl_path.'www.inviteindia.com/wedding-website-themes.php';
$smarty->assign('can_url', $canurl);
$smarty->assign('commdetails', $commdetails);
$smarty->assign('classic_commdetails', $classic_commdetails);
$smarty->assign('classic_commdetails_bg', $classic_commdetails_bg);
$smarty->assign('edit_theme_link', $edit_theme_link);
$smarty->assign('glb_submit_page', $submit_page);
$smarty->assign('glb_albumstatus', $albumstatus);
$smarty->assign('currentpage_js', 'theme_select');

//$smarty->assign('pagetitle', $home_page_title);
//$smarty->assign('metadesc', $home_page_meta_desc);
//$smarty->assign('metakeywords', $home_page_meta_key);

$smarty->assign('pagetitle', $theme_page_title.$common_page_title_end);
$smarty->assign('metadesc', $theme_page_desc);
$smarty->assign('metakeywords', $theme_page_keywords);
$smarty->assign('user_log_id', $user_log_id );
/*----- Include Files Details Start-----*/
$smarty->assign('header', $smarty->fetch('default/header.tpl') );
$smarty->assign('content', $smarty->fetch($content_template) );
$smarty->assign('footer', $smarty->fetch('default/footer.tpl') );
/*----- Include Files Details End-----*/
$smarty->display('default/index.tpl');
?>
