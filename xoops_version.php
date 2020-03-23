<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$mydirname = basename( dirname( __FILE__ ) ) ;
if( ! preg_match( '/^(\D+)(\d*)$/' , $mydirname , $regs ) ) echo ( "invalid dirname: " . htmlspecialchars( $mydirname ) ) ;
$mydirnumber = $regs[2] === '' ? '' : intval( $regs[2] ) ;

$modversion['name'] = _CSS_MODULE_NAME ;
$modversion['version'] = 0.2 ; 
$modversion['description'] = _CSS_MODULE_DESC;
$modversion['author'] = "Aitor Uskola";
$modversion['credits'] = "Aitor Uskola.";
$modversion['help'] = "" ;
$modversion['license'] = "GPL see LICENSE" ;
$modversion['official'] = 0;
$modversion['image'] = "images/tcm.png" ;
$modversion['dirname'] = $mydirname ;


// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']  = 'admin/menu.php';

// Menu
global $xoopsDB , $xoopsUser ; 
$modversion['hasMain'] = 0 ;

// Config
$modversion['config'][] = array(
	'name'			=> 'css_xoopstheme' ,
	'title'			=> '_CSS_CFG_XOOPSTHEME' ,
	'description'	=> '_CSS_DESC_XOOPSTHEME' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "default-css" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_xoopsthemesave' ,
	'title'			=> '_CSS_CFG_MODULETHEMESAVE' ,
	'description'	=> '_CSS_DESC_MODULETHEMESAVE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "default.php" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_defaultbg' ,
	'title'			=> '_CSS_CFG_DEFAULTBACKGROUND' ,
	'description'	=> '_CSS_DESC_DEFAULTBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_defaulttc' ,
	'title'			=> '_CSS_CFG_DEFAULTTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_DEFAULTTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#000000" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_defaultff' ,
	'title'			=> '_CSS_CFG_DEFAULTFONTFAMILY' ,
	'description'	=> '_CSS_DESC_DEFAULTFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_defaultfb' ,
	'title'			=> '_CSS_CFG_DEFAULTFONTBOLD' ,
	'description'	=> '_CSS_DESC_DEFAULTFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'normal' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_defaultfs' ,
	'title'			=> '_CSS_CFG_DEFAULTFONTSIZE' ,
	'description'	=> '_CSS_DESC_DEFAULTFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



$modversion['config'][] = array(
	'name'			=> 'css_headerbg' ,
	'title'			=> '_CSS_CFG_HEADERBG' ,
	'description'	=> '_CSS_DESC_HEADERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_headertc' ,
	'title'			=> '_CSS_CFG_HEADERTC' ,
	'description'	=> '_CSS_DESC_HEADERTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_headerff' ,
	'title'			=> '_CSS_CFG_HEADERFF' ,
	'description'	=> '_CSS_DESC_HEADERFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_headerfb' ,
	'title'			=> '_CSS_CFG_HEADERFB' ,
	'description'	=> '_CSS_DESC_HEADERFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_headerfs' ,
	'title'			=> '_CSS_CFG_HEADERFS' ,
	'description'	=> '_CSS_DESC_HEADERFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

// Config
$modversion['config'][] = array(
	'name'			=> 'css_leftblockwidth' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKWIDTH' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKWIDTH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "170" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_rightblockwidth' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKWIDTH' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKWIDTH' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "170" ,
	'options'		=> array()
) ;

// Config
$modversion['config'][] = array(
	'name'			=> 'css_leftblocksitebg' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKSITEBG' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKSITEBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblocksitebg' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKSITEBG' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKSITEBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_rightblocksitebg' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKSITEBG' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKSITEBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_headerbarbg' ,
	'title'			=> '_CSS_CFG_HEADERBARBG' ,
	'description'	=> '_CSS_DESC_HEADERBARBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_headerbartc' ,
	'title'			=> '_CSS_CFG_HEADERBARTC' ,
	'description'	=> '_CSS_DESC_HEADERBARTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_headerbarff' ,
	'title'			=> '_CSS_CFG_HEADERBARFF' ,
	'description'	=> '_CSS_DESC_HEADERBARFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_headerbarfb' ,
	'title'			=> '_CSS_CFG_HEADERBARFB' ,
	'description'	=> '_CSS_DESC_HEADERBARFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_headerbarfs' ,
	'title'			=> '_CSS_CFG_HEADERBARFS' ,
	'description'	=> '_CSS_DESC_HEADERBARFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_footerbg' ,
	'title'			=> '_CSS_CFG_FOOTERBG' ,
	'description'	=> '_CSS_DESC_FOOTERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footertc' ,
	'title'			=> '_CSS_CFG_FOOTERTC' ,
	'description'	=> '_CSS_DESC_FOOTERTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footerff' ,
	'title'			=> '_CSS_CFG_FOOTERFF' ,
	'description'	=> '_CSS_DESC_FOOTERFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_footerfb' ,
	'title'			=> '_CSS_CFG_FOOTERFB' ,
	'description'	=> '_CSS_DESC_FOOTERFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footerfs' ,
	'title'			=> '_CSS_CFG_FOOTERFS' ,
	'description'	=> '_CSS_DESC_FOOTERFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footerbarbg' ,
	'title'			=> '_CSS_CFG_FOOTERBARBG' ,
	'description'	=> '_CSS_DESC_FOOTERBARBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footerbartc' ,
	'title'			=> '_CSS_CFG_FOOTERBARTC' ,
	'description'	=> '_CSS_DESC_FOOTERBARTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_footerbarff' ,
	'title'			=> '_CSS_CFG_FOOTERBARFF' ,
	'description'	=> '_CSS_DESC_FOOTERBARFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_footerbarfb' ,
	'title'			=> '_CSS_CFG_FOOTERBARFB' ,
	'description'	=> '_CSS_DESC_FOOTERBARFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_footerbarfs' ,
	'title'			=> '_CSS_CFG_FOOTERBARFS' ,
	'description'	=> '_CSS_DESC_FOOTERBARFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;






$modversion['config'][] = array(
	'name'			=> 'css_leftblockhbg' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKHEADERBG' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKHEADERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ddd" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblockhtc' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKHEADERTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKHEADERTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_leftblockhff' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKHEADERFONTFAMILY' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKHEADERFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblockhfb' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKHEADERFONTBOLD' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKHEADERFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblockhfs' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKHEADERFONTSIZE' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKHEADERFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "11" ,
	'options'		=> array()
) ;




$modversion['config'][] = array(
	'name'			=> 'css_leftblockbg' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKBG' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblocktc' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#000000" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_leftblockff' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKFONTFAMILY' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblockfb' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKFONTBOLD' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'normal' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_leftblockfs' ,
	'title'			=> '_CSS_CFG_LEFTBLOCKFONTSIZE' ,
	'description'	=> '_CSS_DESC_LEFTBLOCKFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;




$modversion['config'][] = array(
	'name'			=> 'css_centerblockhbg' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKHEADERBG' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKHEADERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ddd" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_centerblockhtc' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKHEADERTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKHEADERTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_centerblockhff' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKHEADERFONTFAMILY' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKHEADERFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockhfb' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKHEADERFONTBOLD' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKHEADERFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockhfs' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKHEADERFONTSIZE' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKHEADERFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "11" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockbg' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKBG' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblocktc' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#000000" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockff' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKFONTFAMILY' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockfb' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKFONTBOLD' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'normal' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_centerblockfs' ,
	'title'			=> '_CSS_CFG_CENTERBLOCKFONTSIZE' ,
	'description'	=> '_CSS_DESC_CENTERBLOCKFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockhbg' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKHEADERBG' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKHEADERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ddd" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockhtc' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKHEADERTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKHEADERTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockhff' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKHEADERFONTFAMILY' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKHEADERFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockhfb' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKHEADERFONTBOLD' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKHEADERFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockhfs' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKHEADERFONTSIZE' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKHEADERFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "11" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockbg' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKBG' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblocktc' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#000000" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockff' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKFONTFAMILY' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockfb' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKFONTBOLD' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'normal' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_rightblockfs' ,
	'title'			=> '_CSS_CFG_RIGHTBLOCKFONTSIZE' ,
	'description'	=> '_CSS_DESC_RIGHTBLOCKFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



//working with tables

$modversion['config'][] = array(
	'name'			=> 'css_tablehbg' ,
	'title'			=> '_CSS_CFG_TABLEHEADERBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEHEADERBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#c2cdd6" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablehtc' ,
	'title'			=> '_CSS_CFG_TABLEHEADERTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEHEADERTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablehff' ,
	'title'			=> '_CSS_CFG_TABLEHEADERFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEHEADERFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablehfb' ,
	'title'			=> '_CSS_CFG_TABLEHEADERFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEHEADERFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'normal' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablehfs' ,
	'title'			=> '_CSS_CFG_TABLEHEADERFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEHEADERFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tableebg' ,
	'title'			=> '_CSS_CFG_TABLEEVENBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEEVENBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#dee3e7" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableetc' ,
	'title'			=> '_CSS_CFG_TABLEEVENTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEEVENTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tableeff' ,
	'title'			=> '_CSS_CFG_TABLEEVENFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEEVENFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableefb' ,
	'title'			=> '_CSS_CFG_TABLEEVENFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEEVENFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableefs' ,
	'title'			=> '_CSS_CFG_TABLEEVENFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEEVENFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tableobg' ,
	'title'			=> '_CSS_CFG_TABLEODDBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEODDBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#E9E9E9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableotc' ,
	'title'			=> '_CSS_CFG_TABLEODDTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEODDTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tableoff' ,
	'title'			=> '_CSS_CFG_TABLEODDFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEODDFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableofb' ,
	'title'			=> '_CSS_CFG_TABLEODDFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEODDFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableofs' ,
	'title'			=> '_CSS_CFG_TABLEODDFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEODDFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



$modversion['config'][] = array(
	'name'			=> 'css_tablefbg' ,
	'title'			=> '_CSS_CFG_TABLEFOOTBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEFOOTBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#c2cdd6" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableftc' ,
	'title'			=> '_CSS_CFG_TABLEFOOTTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEFOOTTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablefff' ,
	'title'			=> '_CSS_CFG_TABLEFOOTFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEFOOTFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableffb' ,
	'title'			=> '_CSS_CFG_TABLEFOOTFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEFOOTFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableffs' ,
	'title'			=> '_CSS_CFG_TABLEFOOTFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEFOOTFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablerebg' ,
	'title'			=> '_CSS_CFG_TABLEROWEVENBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEROWEVENBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#dee3e7" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tableretc' ,
	'title'			=> '_CSS_CFG_TABLEROWEVENTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEROWEVENTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablereff' ,
	'title'			=> '_CSS_CFG_TABLEROWEVENFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEROWEVENFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerefb' ,
	'title'			=> '_CSS_CFG_TABLEROWEVENFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEROWEVENFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerefs' ,
	'title'			=> '_CSS_CFG_TABLEROWEVENFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEROWEVENFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



$modversion['config'][] = array(
	'name'			=> 'css_tablerobg' ,
	'title'			=> '_CSS_CFG_TABLEROWODDBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEROWODDBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#E9E9E9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerotc' ,
	'title'			=> '_CSS_CFG_TABLEROWODDTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEROWODDTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tableroff' ,
	'title'			=> '_CSS_CFG_TABLEROWODDFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEROWODDFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerofb' ,
	'title'			=> '_CSS_CFG_TABLEROWODDFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEROWODDFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerofs' ,
	'title'			=> '_CSS_CFG_TABLEROWODDFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEROWODDFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablerfbg' ,
	'title'			=> '_CSS_CFG_TABLEROWFOOTBACKGROUND' ,
	'description'	=> '_CSS_DESC_TABLEROWFOOTBACKGROUND' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#c2cdd6" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerftc' ,
	'title'			=> '_CSS_CFG_TABLEROWFOOTTEXTCOLOR' ,
	'description'	=> '_CSS_DESC_TABLEROWFOOTTEXTCOLOR' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ffffff" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_tablerfff' ,
	'title'			=> '_CSS_CFG_TABLEROWFOOTFONTFAMILY' ,
	'description'	=> '_CSS_DESC_TABLEROWFOOTFONTFAMILY' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerffb' ,
	'title'			=> '_CSS_CFG_TABLEROWFOOTFONTBOLD' ,
	'description'	=> '_CSS_DESC_TABLEROWFOOTFONTBOLD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> 'bold' ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_tablerffs' ,
	'title'			=> '_CSS_CFG_TABLEROWFOOTFONTSIZE' ,
	'description'	=> '_CSS_DESC_TABLEROWFOOTFONTSIZE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_abg' ,
	'title'			=> '_CSS_CFG_ABG' ,
	'description'	=> '_CSS_DESC_ABG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_atc' ,
	'title'			=> '_CSS_CFG_ATC' ,
	'description'	=> '_CSS_DESC_ATC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#666" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_aff' ,
	'title'			=> '_CSS_CFG_AFF' ,
	'description'	=> '_CSS_DESC_AFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_afb' ,
	'title'			=> '_CSS_CFG_AFB' ,
	'description'	=> '_CSS_DESC_AFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_afs' ,
	'title'			=> '_CSS_CFG_AFS' ,
	'description'	=> '_CSS_DESC_AFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ahoverbg' ,
	'title'			=> '_CSS_CFG_AHOVERBG' ,
	'description'	=> '_CSS_DESC_AHOVERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ahovertc' ,
	'title'			=> '_CSS_CFG_AHOVERTC' ,
	'description'	=> '_CSS_DESC_AHOVERTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#ff6600" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_ahoverff' ,
	'title'			=> '_CSS_CFG_AHOVERFF' ,
	'description'	=> '_CSS_DESC_AHOVERFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_ahoverfb' ,
	'title'			=> '_CSS_CFG_AHOVERFB' ,
	'description'	=> '_CSS_DESC_AHOVERFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ahoverfs' ,
	'title'			=> '_CSS_CFG_AHOVERFS' ,
	'description'	=> '_CSS_DESC_AHOVERFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_ammbg' ,
	'title'			=> '_CSS_CFG_AMMBG' ,
	'description'	=> '_CSS_DESC_AMMBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#e6e6e6" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammtc' ,
	'title'			=> '_CSS_CFG_AMMTC' ,
	'description'	=> '_CSS_DESC_AMMTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_ammff' ,
	'title'			=> '_CSS_CFG_AMMFF' ,
	'description'	=> '_CSS_DESC_AMMFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_ammfb' ,
	'title'			=> '_CSS_CFG_AMMFB' ,
	'description'	=> '_CSS_DESC_AMMFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammfs' ,
	'title'			=> '_CSS_CFG_AMMFS' ,
	'description'	=> '_CSS_DESC_AMMFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammhbg' ,
	'title'			=> '_CSS_CFG_AMMHOVERBG' ,
	'description'	=> '_CSS_DESC_AMMHOVERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammhtc' ,
	'title'			=> '_CSS_CFG_AMMHOVERTC' ,
	'description'	=> '_CSS_DESC_AMMHOVERTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammhff' ,
	'title'			=> '_CSS_CFG_AMMHOVERFF' ,
	'description'	=> '_CSS_DESC_AMMHOVERFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_ammhfb' ,
	'title'			=> '_CSS_CFG_AMMHOVERFB' ,
	'description'	=> '_CSS_DESC_AMMHOVERFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammhfs' ,
	'title'			=> '_CSS_CFG_AMMHOVERFS' ,
	'description'	=> '_CSS_DESC_AMMHOVERFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammcurrentbg' ,
	'title'			=> '_CSS_CFG_AMMCURRENTBG' ,
	'description'	=> '_CSS_DESC_AMMCURRENTBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammcurrenttc' ,
	'title'			=> '_CSS_CFG_AMMCURRENTTC' ,
	'description'	=> '_CSS_DESC_AMMCURRENTTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammcurrentff' ,
	'title'			=> '_CSS_CFG_AMMCURRENTFF' ,
	'description'	=> '_CSS_DESC_AMMCURRENTFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_ammcurrentfb' ,
	'title'			=> '_CSS_CFG_AMMCURRENTFB' ,
	'description'	=> '_CSS_DESC_AMMCURRENTFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ammcurrentfs' ,
	'title'			=> '_CSS_CFG_AMMCURRENTFS' ,
	'description'	=> '_CSS_DESC_AMMCURRENTFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumbg' ,
	'title'			=> '_CSS_CFG_AUMBG' ,
	'description'	=> '_CSS_DESC_AUMBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#e6e6e6" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumtc' ,
	'title'			=> '_CSS_CFG_AUMTC' ,
	'description'	=> '_CSS_DESC_AUMTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_aumff' ,
	'title'			=> '_CSS_CFG_AUMFF' ,
	'description'	=> '_CSS_DESC_AUMFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_aumfb' ,
	'title'			=> '_CSS_CFG_AUMFB' ,
	'description'	=> '_CSS_DESC_AUMFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumfs' ,
	'title'			=> '_CSS_CFG_AUMFS' ,
	'description'	=> '_CSS_DESC_AUMFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_aumhbg' ,
	'title'			=> '_CSS_CFG_AUMHOVERBG' ,
	'description'	=> '_CSS_DESC_AUMHOVERBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhtc' ,
	'title'			=> '_CSS_CFG_AUMHOVERTC' ,
	'description'	=> '_CSS_DESC_AUMHOVERTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_aumhff' ,
	'title'			=> '_CSS_CFG_AUMHOVERFF' ,
	'description'	=> '_CSS_DESC_AUMHOVERFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_aumhfb' ,
	'title'			=> '_CSS_CFG_AUMHOVERFB' ,
	'description'	=> '_CSS_DESC_AUMHOVERFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhfs' ,
	'title'			=> '_CSS_CFG_AUMHOVERFS' ,
	'description'	=> '_CSS_DESC_AUMHOVERFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhlbg' ,
	'title'			=> '_CSS_CFG_AUMHIGHLIGHTBG' ,
	'description'	=> '_CSS_DESC_AUMHIGHLIGHTBG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhltc' ,
	'title'			=> '_CSS_CFG_AUMHIGHLIGHTTC' ,
	'description'	=> '_CSS_DESC_AUMHIGHLIGHTTC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhlff' ,
	'title'			=> '_CSS_CFG_AUMHIGHLIGHTFF' ,
	'description'	=> '_CSS_DESC_AUMHIGHLIGHTFF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_aumhlfb' ,
	'title'			=> '_CSS_CFG_AUMHIGHLIGHTFB' ,
	'description'	=> '_CSS_DESC_AUMHIGHLIGHTFB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_aumhlfs' ,
	'title'			=> '_CSS_CFG_AUMHIGHLIGHTFS' ,
	'description'	=> '_CSS_DESC_AUMHIGHLIGHTFS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;













$modversion['config'][] = array(
	'name'			=> 'css_h1bg' ,
	'title'			=> '_CSS_CFG_H1BG' ,
	'description'	=> '_CSS_DESC_H1BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h1tc' ,
	'title'			=> '_CSS_CFG_H1TC' ,
	'description'	=> '_CSS_DESC_H1TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h1ff' ,
	'title'			=> '_CSS_CFG_H1FF' ,
	'description'	=> '_CSS_DESC_H1FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h1fb' ,
	'title'			=> '_CSS_CFG_H1FB' ,
	'description'	=> '_CSS_DESC_H1FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h1fs' ,
	'title'			=> '_CSS_CFG_H1FS' ,
	'description'	=> '_CSS_DESC_H1FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;






$modversion['config'][] = array(
	'name'			=> 'css_h2bg' ,
	'title'			=> '_CSS_CFG_H2BG' ,
	'description'	=> '_CSS_DESC_H2BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h2tc' ,
	'title'			=> '_CSS_CFG_H2TC' ,
	'description'	=> '_CSS_DESC_H2TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h2ff' ,
	'title'			=> '_CSS_CFG_H2FF' ,
	'description'	=> '_CSS_DESC_H2FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h2fb' ,
	'title'			=> '_CSS_CFG_H2FB' ,
	'description'	=> '_CSS_DESC_H2FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h2fs' ,
	'title'			=> '_CSS_CFG_H2FS' ,
	'description'	=> '_CSS_DESC_H2FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;




$modversion['config'][] = array(
	'name'			=> 'css_h3bg' ,
	'title'			=> '_CSS_CFG_H3BG' ,
	'description'	=> '_CSS_DESC_H3BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h3tc' ,
	'title'			=> '_CSS_CFG_H3TC' ,
	'description'	=> '_CSS_DESC_H3TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h3ff' ,
	'title'			=> '_CSS_CFG_H3FF' ,
	'description'	=> '_CSS_DESC_H3FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h3fb' ,
	'title'			=> '_CSS_CFG_H3FB' ,
	'description'	=> '_CSS_DESC_H3FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h3fs' ,
	'title'			=> '_CSS_CFG_H3FS' ,
	'description'	=> '_CSS_DESC_H3FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;




$modversion['config'][] = array(
	'name'			=> 'css_h4bg' ,
	'title'			=> '_CSS_CFG_H4BG' ,
	'description'	=> '_CSS_DESC_H4BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h4tc' ,
	'title'			=> '_CSS_CFG_H4TC' ,
	'description'	=> '_CSS_DESC_H4TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h4ff' ,
	'title'			=> '_CSS_CFG_H4FF' ,
	'description'	=> '_CSS_DESC_H4FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h4fb' ,
	'title'			=> '_CSS_CFG_H4FB' ,
	'description'	=> '_CSS_DESC_H4FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h4fs' ,
	'title'			=> '_CSS_CFG_H4FS' ,
	'description'	=> '_CSS_DESC_H4FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;


$modversion['config'][] = array(
	'name'			=> 'css_h5bg' ,
	'title'			=> '_CSS_CFG_H5BG' ,
	'description'	=> '_CSS_DESC_H5BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h5tc' ,
	'title'			=> '_CSS_CFG_H5TC' ,
	'description'	=> '_CSS_DESC_H5TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h5ff' ,
	'title'			=> '_CSS_CFG_H5FF' ,
	'description'	=> '_CSS_DESC_H5FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h5fb' ,
	'title'			=> '_CSS_CFG_H5FB' ,
	'description'	=> '_CSS_DESC_H5FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h5fs' ,
	'title'			=> '_CSS_CFG_H5FS' ,
	'description'	=> '_CSS_DESC_H5FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



$modversion['config'][] = array(
	'name'			=> 'css_h6bg' ,
	'title'			=> '_CSS_CFG_H6BG' ,
	'description'	=> '_CSS_DESC_H6BG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#fff" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h6tc' ,
	'title'			=> '_CSS_CFG_H6TC' ,
	'description'	=> '_CSS_DESC_H6TC' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "#2A75C5" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h6ff' ,
	'title'			=> '_CSS_CFG_H6FF' ,
	'description'	=> '_CSS_DESC_H6FF' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "Verdana, Arial, Helvetica, sans-serif" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_h6fb' ,
	'title'			=> '_CSS_CFG_H6FB' ,
	'description'	=> '_CSS_DESC_H6FB' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "bold" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_h6fs' ,
	'title'			=> '_CSS_CFG_H6FS' ,
	'description'	=> '_CSS_DESC_H6FS' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "9" ,
	'options'		=> array()
) ;



$modversion['config'][] = array(
	'name'			=> 'css_ftpserver' ,
	'title'			=> '_CSS_CFG_FTPSERVER' ,
	'description'	=> '_CSS_DESC_FTPSERVER' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "localhost" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ftpusername' ,
	'title'			=> '_CSS_CFG_FTPUSERNAME' ,
	'description'	=> '_CSS_DESC_FTPUSERNAME' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "username" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ftppassword' ,
	'title'			=> '_CSS_CFG_FTPPASSWORD' ,
	'description'	=> '_CSS_DESC_FTPPASSWORD' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'password' ,
	'default'		=> "password" ,
	'options'		=> array()
) ;
$modversion['config'][] = array(
	'name'			=> 'css_ftpdebug' ,
	'title'			=> '_CSS_CFG_FTPDEBUG' ,
	'description'	=> '_CSS_DESC_FTPDEBUG' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "0" ,
	'options'		=> array()
) ;

$modversion['config'][] = array(
	'name'			=> 'css_ftpuse' ,
	'title'			=> '_CSS_CFG_FTPUSE' ,
	'description'	=> '_CSS_DESC_FTPUSE' ,
	'formtype'		=> 'textbox' ,
	'valuetype'		=> 'text' ,
	'default'		=> "0" ,
	'options'		=> array()
) ;




// Search
$modversion['hasSearch'] = 0;

// Comments
$modversion['hasComments'] = 0;

?>