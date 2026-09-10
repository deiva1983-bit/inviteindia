<?php
/* Smarty version 3.1.32, created on 2018-07-08 17:34:38
  from '/home/mrr88m9rhudj/public_html/inviteindia.com/templates/default/mailh.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b424b2e357985_02503831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '274cf701fee8fc490b5d814eac3f8d715abd18f2' => 
    array (
      0 => '/home/mrr88m9rhudj/public_html/inviteindia.com/templates/default/mailh.tpl',
      1 => 1531050222,
      2 => 'file',
    ),
    'e35399ac02b144a672195fff45c5aaf77ba0dcfa' => 
    array (
      0 => '/home/mrr88m9rhudj/public_html/inviteindia.com/templates/default/footersrcs.tpl',
      1 => 1515894708,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5b424b2e357985_02503831 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- footer -->
	<div class="footer">
		<div class="container">
			<h2><a href="index.php">A wedding website company</a></h2>
			<h3>(+91) 95 66 77 59 77</h3>
			<form action="#" method="post">
				<input type="email" name="email" placeholder="Your email..." required="">
				<input type="submit" value=" ">
			</form>
			<div class="agileits_w3three_nav">
				<div class="agileits_w3three_nav_left">
					<ul>
						<li ><a href="http://www.inviteindia.com/terms.php">Terms of Service</a></li>
						<li ><a href="http://www.inviteindia.com/privacy.php">Privacy & Policy</a></li>
						<li ><a href="http://www.inviteindia.com/online-wedding-website-contactus">Contact Us</a></li>
					</ul>
				</div>
				<div class="agileits_w3three_nav_right">
					<ul class="agileits_social_list">
						<li><a href="https://www.facebook.com/invitindia" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<p>© 2018 Wedding website. All rights reserved @ InviteIndia.com</p>
		</div>
	</div>
<!-- //footer -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="http://static.inviteindia.com/js/base/move-top.js"></script>
<script type="text/javascript" src="http://static.inviteindia.com/js/base/easing.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!-- start-smoth-scrolling -->
<!-- menu -->
	<script type="text/javascript" src="http://static.inviteindia.com/js/base/main.js"></script>
<!-- //menu -->
<!-- for bootstrap working -->
	<script src="http://static.inviteindia.com/js/base/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
 
	<script type="text/javascript"> 
		  blink($("#alert-text-err"));
		  blink($("#alert-text-succ"));
		  var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-37274029-1']);
			_gaq.push(['_trackPageview']);
 			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
	</script>

<!-- //here ends scrolling icon -->
</body>
</html><?php }
}
