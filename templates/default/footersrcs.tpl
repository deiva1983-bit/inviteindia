{if $currentpage_js eq 'mobileactivate_page'}
        <script src="includes/scripts/external/jquery.bgiframe-2.1.1.js"></script>
        <script src="includes/scripts/ui/jquery.ui.position.js"></script>
        <script src="includes/scripts/ui/jquery.ui.dialog.js"></script>
{elseif $currentpage_js eq 'my_sms'}
        <script src="includes/scripts/external/jquery.bgiframe-2.1.1.js"></script>
        <script src="includes/scripts/ui/jquery.ui.dialog.js"></script>
        <script type='text/javascript' src='includes/scripts/userdefind/friendsup.js'></script>
        <script src="{$glb_site_url}includes/scripts/userdefind/login.js"></script>
{elseif $currentpage_js eq 'home_page_1'}
        <script src="includes/scripts/external/jquery.bgiframe-2.1.1.js"></script>
        <script src="includes/scripts/ui/jquery.ui.position.js"></script>
        <script src="includes/scripts/ui/jquery.ui.dialog.js"></script>
        <script src="includes/scripts/ui/jquery.ui.datepicker.js"></script>
{/if}