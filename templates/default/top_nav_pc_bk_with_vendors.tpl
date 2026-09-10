<nav class="menu menu--sebastian">
	<ul id="m_nav_list" class="m_nav menu__list">
		{if $smarty.session.sess_user_id neq '' }
		<li class="m_nav_item {if $topnav_select eq 'wedd'}active{/if}" id="moble_nav_item_2"><a href="wedding-website-settings" class="link link-kumya"><span data-letters="Invitations">Invitations</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'themes'}active{/if}" id="m_nav_item_3"><a href="invitation-templates.php" class="link link-kumya"><span data-letters="Themes">Themes</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_4"><a href="buy-domain.php" class="link link-kumya"><span data-letters="Buy domain">Buy domain</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_5"><a href="packages.php" class="link link-kumya"><span data-letters="Packages">Packages</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_6"> <a href="vendors/vendors-search.php" class="link link-kumya"><span data-letters="Vendors">Vendors</span></a></li>
		<!-- <li class="dropdown m_nav_item" id="moble_nav_item_7">
			<a href="#" class="dropdown-toggle link link-kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="More">More</span></a>
			<ul class="dropdown-menu agile_short_dropdown">
			<li class="m_nav_item {if $topnav_select eq 'wgift'}active{/if}" id="moble_nav_item_8"> <a href="wedding-gift-for-couples" class="link link-kumya"><i class="fa fa-gift" aria-hidden="true"></i><span data-letters="Wedding Gift">Wedding </span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_9"> <a href="vendors/vendors-search.php" class="link link-kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="Vendors">Vendors</span></a></li>
			</ul>
		</li> -->
		<li class="dropdown m_nav_item" id="moble_nav_item_7">
		<a href="#" class="dropdown-toggle link link-kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="Features">Features</span></a>
			<ul class="dropdown-menu agile_short_dropdown">
			<li class="m_nav_item" id="moble_nav_item_8"><a href="blog/diy-wedding-invitation-covers/" class="link link-kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="DIY wedding invitation covers">DIY wedding invitation covers</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_9"><a href="blog/animated-wedding-invitation-free/" class="link link-kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Animated wedding invitation">Animated wedding invitation</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_9"><a href="blog/wedding-website-security-protecting-your-big-day/" class="link link-kumya"><i class="fa fa-lock" aria-hidden="true"></i><span data-letters="Wedding website security">Wedding website security</span></a></li>
			</ul>
		</li>
		<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_15"><a href="blogs.php" class="link link-kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Blog">Blog</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'wgift'}active{/if}" id="moble_nav_item_16"> <a href="wedding-gift-for-couples" class="link link-kumya"><span data-letters="Gift">Gift</span></a></li>
		{else}
		<li class="m_nav_item" id="m_nav_item_1"><a href="https://www.inviteindia.com" class="link link-kumya"><i class="fa fa-home hide-home" aria-hidden="true"></i></a></li>
		<li class="m_nav_item {if $topnav_select eq 'wedd'}active{/if}" id="moble_nav_item_2"><a href="#" class="link link-kumya" data-toggle="modal" data-target="#loginWindow"><span data-letters="Invitations">Invitations</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'themes'}active{/if}" id="m_nav_item_3"><a href="invitation-templates.php" class="link link-kumya"><span data-letters="Themes">Themes</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_4"><a href="buy-domain.php" class="link link-kumya"></i><span data-letters="Buy domain">Buy domain</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_5"><a href="packages.php" class="link link-kumya"><span data-letters="Packages">Packages</span></a></li>
		<li class="dropdown m_nav_item" id="moble_nav_item_6">
		<a href="#" class="dropdown-toggle link link-kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="Features">Features</span></a>
			<ul class="dropdown-menu agile_short_dropdown">
			<li class="m_nav_item" id="moble_nav_item_15"><a href="blog/diy-wedding-invitation-covers/" class="link link-kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="DIY wedding invitation covers">DIY wedding invitation covers</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_16"><a href="blog/animated-wedding-invitation-free/" class="link link-kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Animated wedding invitation">Animated wedding invitation</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_17"><a href="blog/wedding-website-security-protecting-your-big-day/" class="link link-kumya"><i class="fa fa-lock" aria-hidden="true"></i><span data-letters="Wedding website security">Wedding website security</span></a></li>
			</ul>
		</li>
		<li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_7"><a href="vendors/vendors-search.php" class="link link-kumya"><span data-letters="Vendors">Vendors</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_8"><a href="blogs.php" class="link link-kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Blogs">Blogs</span></a></li>
		{/if}
	</ul>
</nav>