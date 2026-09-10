<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>{$pagetitle}</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
 <meta name="description" content="{$metadesc}">
 <meta name="keywords" content="{$metakeywords}">
<meta name="robots" content="index, follow" />

{include file="default/scriptsrcs.tpl"}
<!--[if lt IE 7]>
	<link href="/includes/css/ie6_style.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if lt IE 7]>
	<link href="/includes/css/ie7_style.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if lt IE 9]>
	<link href="/includes/css/ie8_style.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if lt IE 10]>
	<link href="/includes/css/ie9_style.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>

<body id="page6" {if $currentpage_js eq 'searchloc_gmap'}  onload="xz()" onunload="GUnload()" {else} onload="new ElementMaxHeight();" {/if} style="max-height:1000px;">
   <!-- header -->
   {if $smarty.session.sess_user_id neq '' }
 	<div align="right">
      	  <font color="#FFFFFF">Logged in as : {$smarty.session.sess_user_name}
		  </font>		
		   <font color="#FFFFFF"><strong>   /   </strong>
		  <a href="#" style="color:#FFFFFF; ">Seetings</a>
		   </font>
		   <font color="#FFFFFF"><strong>   /   </strong>
		  <a href="{$glb_site_url}logout.php" style="color:#FFFFFF; ">Signout..</a>
		   </font>
	 </div>
	 {/if}
        
           
      
     
    
	  
   <div id="header" style="display:none;"> 
     <ul id="menu" style="font-size: 1em;">
	 
			{if $smarty.session.sess_user_id neq '' }
                   
                     	<li><a href="{$glb_site_url}index.php" class="current">Home1</a></li>
                        <li><a href="{$glb_site_url}myprofile.php">Themes</a></li>
                        <li><a href="{$glb_site_url}smscorner.php">Free SMS</a></li>
                        <li><a href="{$glb_site_url}interview-questions/">Interview Questions</a></li>
                        <li><a href="{$glb_site_url}e-wedding.php">Wedding Card</a></li>
                        <li><a href="{$glb_site_url}online-wedding-website-contactus">Contact Us</a></li>
                     
				{else}
				 
                     	<li><a href="{$glb_site_url}index.php" class="current">Home2</a></li>
                        <li><a href="{$glb_site_url}smscorner.php">Free SMS</a></li>
                        <li><a href="{$glb_site_url}interview-questions/">Interview Questions</a></li>
                        <li><a href="{$glb_site_url}e-wedding.php">Wedding Card</a></li>
                        <li><a href="{$glb_site_url}online-wedding-website-contactus">Contact Us</a></li>
                    
				{/if}
 
	</ul>
   </div>
   <div style=" background: url('images/spacer.gif') repeat-x scroll left top #FFFFFF;
    height: 5px;"></div>
    <div id="header">
      <div class="container">
   <div class="row-2">
         	<!-- nav box begin -->
            <div class="nav-box">
            	<div class="left">
               	<div class="right">
                  	<ul>
                     	<li><a href="{$glb_site_url}index.php" {if $topnav_select eq 'main'} class="first-act" {else} class="first" {/if}><em><b>Home</b></em></a></li>                        
                        <li><a href="{$glb_site_url}smscorner.php" {if $topnav_select eq 'sms'} class="act" {/if}><em><b>Free SMS</b></em></a></li>
						<li><a href="{$glb_site_url}select_theme.php?do=demOkavi" {if $topnav_select eq 'themes'} class="act" {/if}><em><b>Themes</b></em></a></li>
                        <li><a href="{$glb_site_url}e-wedding.php" {if $topnav_select eq 'wedd'} class="act" {/if}><em><b>Invitations</b></em></a></li>
                        <li><a href="{$glb_site_url}interview-questions/" {if $topnav_select eq 'inter'} class="act" {/if}><em><b>Interview Questions</b></em></a></li>
                        <li><a href="{$glb_site_url}online-wedding-website-contactus" {if $topnav_select eq 'contact'} class="last-act" {else} class="last" {/if} ><em><b>Contact Us</b></em></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- nav box end -->
         </div>
		  </div>
   </div>
   
   <div id="status-alert" style="display:none; ">
            <span id="alert-text">Message</span>
     </div> 