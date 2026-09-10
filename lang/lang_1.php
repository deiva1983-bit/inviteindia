<?php
$signup_name = 'Name:'; 
$signup_email = 'Email :';
$signup_loc = 'Location :';
$signup_wish = 'Wishes :';
$signup_gift = 'Gift :';
$signup_giftitems ='Gift collections :';
$signup_samplewishes ='Wedding wishes :';
$bless_addmy ='Add my blessing';
$home_heading = "Thank you for visiting our wedding website!  We hope you find it helpful, and we're excited to share this journey with you.";
$event_title ='Wedding Celebration';
$guestbook_title ='My Blessings';
$location_title ='Find location';
$album_title ='Wedding albums';
$bless_title ='Blessing';
$album_names = 'Name:';
$album_comm = 'Wishes:';

$smarty->assign('tpl_signup_samplewishes', $signup_samplewishes); 
$smarty->assign('tpl_signup_giftitems', $signup_giftitems); 
$smarty->assign('tpl_signup_gift', $signup_gift); 
$smarty->assign('tpl_signup_wish', $signup_wish); 
$smarty->assign('tpl_signup_loc', $signup_loc); 
$smarty->assign('tpl_signup_email', $signup_email); 
$smarty->assign('tpl_signup_name', $signup_name); 
$smarty->assign('tpl_bless_addmy', $bless_addmy); 
$smarty->assign('tpl_home_heading', $home_heading); 
$smarty->assign('tpl_event_title', $event_title);
$smarty->assign('tpl_guestbook_title', $guestbook_title); 
$smarty->assign('tpl_location_title', $location_title); 
$smarty->assign('tpl_album_title', $album_title);
$smarty->assign('tpl_bless_title', $bless_title);
$smarty->assign('tpl_album_names', $album_names); 
$smarty->assign('tpl_album_comm', $album_comm); 

?>
