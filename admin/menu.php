<?php

$i=1;
$adminmenu[$i] = array (
	'icon' => 'icons/home.gif',
	'image' => 'icons/home.gif',
    'title' => _CSS_MODULE_HOME,
    'link'  => 'admin/index.php');
$i++;
$adminmenu[$i] = array (
	'icon' => 'icons/basic.gif',
	'image' => 'icons/basic.gif',
    'title' => _CSS_MODULE_BASIC,
    'link'  => 'admin/basic.php');
$i++;
$adminmenu[$i] = array (
 	'icon' =>  'icons/head.gif',
	'image' => 'icons/head.gif',
	'title' => _CSS_MODULE_HEADERFOOTER,
    'link'  => 'admin/headfooter.php');
$i++;
$adminmenu[$i] = array (
 	'icon' =>  'icons/colors.gif',
	'image' => 'icons/colors.gif',
	'title' => _CSS_MODULE_COLORS,
    'link'  => 'admin/colorhelp.php');
$i++;
$adminmenu[$i] = array (
 	'icon' =>  'icons/tags.gif',
	'image' => 'icons/tags.gif',
	'title' => _CSS_MODULE_TAGS,
    'link'  => 'admin/tags.php');
$i++;
$adminmenu[$i] = array (
	'icon' =>  'icons/block.gif',
	'image' => 'icons/block.gif',
    'title' => _CSS_MODULE_BLOCKCOLOR,
    'link'  => 'admin/block.php');
$i++;
$adminmenu[$i] = array (
	'icon' =>  'icons/table.gif',
	'image' => 'icons/table.gif',
    'title' => _CSS_MODULE_TABLECOLOR,
    'link'  => 'admin/table.php');
$i++;
$adminmenu[$i] = array (
 	'icon' =>  'icons/ftp.gif',
	'image' => 'icons/ftp.gif',
	'title' => _CSS_MODULE_FTP,
    'link'  => 'admin/ftp.php');
$i++;

$adminmenu[$i] = array (
    'title' => _CSS_MODULE_HELP,
    'link'  => 'admin/help.php');
    
?>