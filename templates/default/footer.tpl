<!-- footer -->
	<div class="footer">
		<div class="container">
			<h2><a href="/">A wedding website company</a></h2>
			<h3>(+91) 95 66 77 59 77</h3>
			<form action="#" method="post">
				<input type="email" name="email" placeholder="Your email..." required="">
				<input type="submit" value=" ">
			</form>
			<div class="agileits_w3three_nav">
				<div class="agileits_w3three_nav_left">
					<ul>
						<li {if $topnav_select eq 'termsofser'}class="active" {/if}><a href="{$glb_site_url}terms.php">Terms of Service</a></li>
						<li {if $topnav_select eq 'privacy_policy'}class="active" {/if}><a href="{$glb_site_url}privacy.php">Privacy & Policy</a></li>
						<li {if $topnav_select eq 'contact'}class="active" {/if}><a href="{$glb_site_url}contact-us.php">Contact Us</a></li>
						<li {if $topnav_select eq 'faq'}class="active" {/if}><a href="{$glb_site_url}faq.php">FAQ</a></li>
					</ul>
				</div>
				<div class="agileits_w3three_nav_right">
					<ul class="agileits_social_list">
						<li><a href="https://www.facebook.com/invitindia" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://in.pinterest.com/inviteindia" class="w3_agile_youtube"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/inviteindia" class="w3_agile_facebook"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCrUg35VVworDgOQyFDl0JeA" class="w3_agile_youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<p>© 2018 Wedding website. All rights reserved @ InviteIndia.com</p>
		</div>
	</div>
<!-- //footer -->

<!-- start-smoth-scrolling -->
<script src="{$static_domain_path_js}/base/move-top.js"></script>
<script src="{$static_domain_path_js}/base/easing.js"></script>
{literal}
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
{/literal}
<!-- start-smoth-scrolling -->
<!-- menu -->
	<script src="{$static_domain_path_js}/base/main.js"></script>
<!-- //menu -->
<!-- for bootstrap working -->
	<script src="{$static_domain_path_js}/base/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
{include file="../default/footersrcs.tpl"}
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="loginWindow" tabindex="-1" role="dialog" aria-labelledby="loginWindow">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Login
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">{include file="../default/gnav_login.tpl"}
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->

{literal}
	<script> 
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
{/literal}
<!-- //here ends scrolling icon -->
</body>
</html>