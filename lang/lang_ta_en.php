<?php
$signup_name = 'பெயர்   /  Name:'; 
$signup_email = 'மின் அஞ்சல் / Email :';
$signup_loc = 'இடம் / Location :';
$signup_wish = 'வாழ்த்துக்கள் / Wishes :';
$signup_gift = 'அன்பளிப்பு / Gift :';
$signup_giftitems ='பரிசுப்பொருள்கள் / Gift collections :';
$signup_samplewishes ='திருமண வாழ்த்துக்கள் / Wedding wishes :'
$bless_addmy ='எனது வாழ்த்துக்கள் / My blessing';    

$smarty->assign('tpl_signup_samplewishes', $signup_samplewishes); 
$smarty->assign('tpl_signup_giftitems', $signup_giftitems); 
$smarty->assign('tpl_signup_gift', $signup_gift); 
$smarty->assign('tpl_signup_wish', $signup_wish); 
$smarty->assign('tpl_signup_loc', $signup_loc); 
$smarty->assign('tpl_signup_email', $signup_email); 
$smarty->assign('tpl_signup_name', $signup_name); 
$smarty->assign('tpl_bless_addmy', $bless_addmy); 


?>
