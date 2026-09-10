<nav class="menu menu--sebastian">
	<ul id="m_nav_list" class="m_nav menu__list">
		<li class="m_nav_item" id="m_nav_item_1"> <a href="https://www.inviteindia.com" class="link link--kumya"><i class="fa fa-home" aria-hidden="true"></i><span data-letters="Home">Home</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'main_sub'}active{/if}" id="m_nav_item_2"> <a href="wedding-website.php" class="link link--kumya"><i class="fa fa-wpforms" aria-hidden="true"></i><span data-letters="Wedding website">Wedding website</span></a></li>
		<li class="m_nav_item {if $topnav_select eq 'themes'}active{/if}" id="m_nav_item_3"> <a href="wedding-themes.php" class="link link--kumya"><i class="fa fa-braille" aria-hidden="true"></i><span data-letters="Themes">Themes</span></a></li>
		{if $smarty.session.sess_user_id neq '' }
			<li class="m_nav_item {if $topnav_select eq 'wedd'}active{/if}" id="moble_nav_item_4"> <a href="wedding-website-settings" class="link link--kumya"><i class="fa fa-cog" aria-hidden="true"></i><span data-letters="Invitations">Invitations</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_5"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_6"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'wgift'}active{/if}" id="moble_nav_item_7"> <a href="wedding-gift-for-couples" class="link link--kumya"><i class="fa fa-gift" aria-hidden="true"></i><span data-letters="Gift">Gift</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_8"> <a href="vendors/index.php" class="link link--kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="Vendors">Vendors</span></a></li>

			<li class="dropdown m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_9">
			<a href="#" class="dropdown-toggle link link--kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a>

			<ul class="dropdown-menu agile_short_dropdown">
			<li class="m_nav_item" id="moble_nav_item_10"> <a href="wedding-tips-for-brides" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Wedding tips for brides">Wedding tips for brides</span></a></li>

			<li class="m_nav_item" id="moble_nav_item_11"> <a href="wedding-tips-for-grooms" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Wedding tips for grooms">Wedding tips for grooms</span></a></li>

			<li class="m_nav_item" id="moble_nav_item_12"> <a href="preparing-guest-list-for-wedding" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Tips for guest list preparation">Tips for guest list preparation</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_13"> <a href="panda-kaal-muhurtham-procedure-in-tamil-wedding" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Pandakaal Muhurtham">Pandakaal Muhurtham</span></a></li>

			</ul>


		{else}
			<li class="m_nav_item {if $topnav_select eq 'owndomain'}active{/if}" id="moble_nav_item_4"> <a href="custom-domain.php" class="link link--kumya"><i class="fa fa-id-badge" aria-hidden="true"></i><span data-letters="My domain">My domain</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'pack'}active{/if}" id="moble_nav_item_5"> <a href="packages.php" class="link link--kumya"><i class="fa fa-check" aria-hidden="true"></i><span data-letters="Package">Package</span></a></li>
			<li class="m_nav_item {if $topnav_select eq 'vendors'}active{/if}" id="moble_nav_item_6"> <a href="vendors/index.php" class="link link--kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="Vendors">Vendors</span></a></li>
			<li class="dropdown m_nav_item {if $topnav_select eq 'wtips'}active{/if}" id="moble_nav_item_7">
			<a href="#" class="dropdown-toggle link link--kumya" data-toggle="dropdown"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i><span data-letters="Wedding tips">Wedding tips</span></a>

			<ul class="dropdown-menu agile_short_dropdown">
			<li class="m_nav_item" id="moble_nav_item_8"> <a href="wedding-tips-for-brides" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Wedding tips for brides">Wedding tips for brides</span></a></li>

			<li class="m_nav_item" id="moble_nav_item_9"> <a href="wedding-tips-for-grooms" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Wedding tips for grooms">Wedding tips for grooms</span></a></li>

			<li class="m_nav_item" id="moble_nav_item_10"> <a href="preparing-guest-list-for-wedding" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Tips for guest list preparation">Tips for guest list preparation</span></a></li>
			<li class="m_nav_item" id="moble_nav_item_11"> <a href="panda-kaal-muhurtham-procedure-in-tamil-wedding" class="link link--kumya"><i class="fa fa-pencil" aria-hidden="true"></i><span data-letters="Pandakaal Muhurtham">Pandakaal Muhurtham</span></a></li>
			</ul>
		</li>





								{/if}
							</ul>
						</nav>