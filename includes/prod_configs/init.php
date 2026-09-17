<?php
//-------------------------------------------------------------------------------------------------------------------
// File name   : init.php
// Description : file to handle initialize informations
//
// copyright(c), Inside Right, 2010-2011, all rights reserved.
//
// Author: Deiva
// Created date : 16-02-2010
// Modified date: 17-02-2010
// ------------------------------------------------------------------------------------------------------------------
// load Smarty library

//header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-Type: text/html; charset=utf-8');
ob_start();
session_start();
// Strat
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL ^ E_DEPRECATED);
// End
ini_set("register_globals","on");
define ('BASE_PATH', "/");
define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
//define("DOMAIN_NAME","http://localhost/projects/my/social/");
//define ('FULL_PATH', '/var/www/html/projects/my/social/');
define("DOMAIN_NAME","https://www.inviteindia.com");
define('FULL_PATH', rtrim(str_replace('\\', '/', realpath(dirname(__FILE__) . '/../..')), '/') . '/');
//Include Files Start
require FULL_PATH."libs/Smarty.class.php";
include(FULL_PATH."includes/classes/general.class.php");
include(FULL_PATH."includes/classes/database.class.php");
include_once(FULL_PATH."includes/configs/db.php");
include_once(FULL_PATH."includes/configs/globalconfigs.php");
include_once(FULL_PATH."includes/configs/pagetitle.php");
include_once(FULL_PATH."includes/functions/pager.php");
//Include Files End

$smarty = new \Smarty\Smarty();

//$smarty->force_compile = true;
//smarty->debugging = true;
$smarty->caching = false;
$smarty->setTemplateDir(FULL_PATH . 'templates/');
$smarty->setCompileDir(FULL_PATH . 'templates_c/');
$smarty->setCacheDir(FULL_PATH . 'cache/');
$smarty->setConfigDir(FULL_PATH . 'includes/configs/');
//$smarty->cache_lifetime = 120;


//$smarty->compile_check=true;

extract( $_SERVER );
$phpself = explode("/", $PHP_SELF);
$phpself = array_reverse($phpself);
//print_r($phpself);
global $base_path;
$base_path = FULL_PATH;
$template_path = $base_path.'templates/';
/*
if($phpself[1] == "admin")
    {
    $base_path = FULL_PATH;
    $template_path = $base_path.'templates/default/admin/';
    $smarty->compile_dir = $base_path.'admin/templates_c/';
    $smarty->template_dir = FULL_PATH;
    }
else{
        $base_path = FULL_PATH;
        $template_path = $base_path.'templates/';
        $smarty->compile_dir = $base_path.'templates_c/';
        $smarty->template_dir = $template_path;
       }
$smarty->compile_dir = $base_path.'templates_c/';
$smarty->config_dir = $base_path.'configs/';
$smarty->cache_dir = $base_path.'cache/';
$smarty->caching = false;


spl_autoload_register(function ($class_name){
� $class_name = strtolower($class_name);
� $file = FULL_PATH.'includes/classes/'.$class_name . '.class.php';
� if (file_exists($file)) {
� � require $file;
� � return true;
� }
� return false;
});
*/
spl_autoload_register(function ($class_name){
  $class_name = strtolower($class_name);
  require FULL_PATH.'includes/classes/'.$class_name . '.class.php';
});
$glb_obj_genral = new ClassGeneral; //create object for general class
$glb_obj_genral->InitDb( $glb_dbusername, $glb_dbpassword, $glb_dbname, $glb_dbhostname );
$smarty->assign('local_add', $local_add);
$smarty->assign('isMobile', $isMobile);
//Check the admin cookie end
$minify_css = ($minify_css == 1 ? '.min' : '');
$minify_js = ($minify_js == 1 ? '.min' : '');
$smarty->assign('glb_minify_css', $minify_css);
$smarty->assign('glb_minify_js', $minify_js);
$smarty->assign('static_domain_path', $static_domain_path);
$smarty->assign('static_domain_path_css', $static_domain_path_css);
$smarty->assign('static_domain_path_js', $static_domain_path_js);
$smarty->assign('static_domain_path_img', $static_domain_path_img);
$smarty->assign('glb_ssl_path', $ssl_path);
$noneed_index = 0;
$smarty->assign('tpl_noneed_index', $noneed_index);
$vendors_lib_path='../vendor_mgt/';
$smarty->assign('glb_vendors_lib_path', $vendors_lib_path);
?>
