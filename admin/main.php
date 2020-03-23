<?php
/*
bg=background
tc=textcolor
ff=fontfamily
fb=font bold normal etc.
fs=font size
h=header
tcm=theme configuration module
*/

include __DIR__ . '/admin_header.php';
require_once XOOPS_ROOT_PATH . '/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopscomments.php';

global $xoopsDB, $moduleid, $tcm;

include_once XOOPS_ROOT_PATH . '/kernel/object.php';
$myts = MyTextSanitizer::getInstance();

$moduleHandler = xoops_getHandler('module');
$module        = $moduleHandler->getByDirname('tcm');
$configHandler = xoops_getHandler('config');
$moduleConfig  = &$configHandler->getConfigsByCat(0, $module->getVar('mid'));

include_once __DIR__ . '/share.php';
loadTcmValue();

$moduleid = $module->getVar('mid');

xoops_cp_header();

echo '<table><tr><td width=50%>';
include __DIR__ . '/mymenu.php';
echo '</td></tr></table>';
echo '<br><b>' . _AM_CSSMODULEFILE_LOAD . '</b><br>';
listprofiles('profiles');
echo '<br><br>';

// check $xoopsModule
if (!is_object($xoopsModule)) {
    redirect_header("$mod_url/", 1, _NOPERM);
}

//if (!empty($_GET['op'])) {
//    $op = $_GET['op'];
//}

$op = \Xmf\Request::getString('op', '', 'GET');

if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        $$k = $v;
    }
}
if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
        $$k = $v;
    }
}

if ('generate' === $op) {
    echo "<form action='main.php' method='post'>";
    echo '<br><b>' . _AM_CSSMODULE_SURE . '</b><br>';
    echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='finish' />";
    echo '</form>';
}

if ('generatefile' === $op) {
    echo "<form action='main.php' method='post'>";
    echo '<br><b>' . _AM_CSSMODULEFILE_SURE . ' ' . $xoopsthemesave . '</b><br>';
    echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='savefile' />";
    echo '</form>';
}

if ('loadfile' === $op) {
    echo "<form action='main.php' method='post'>";
    echo '<br><b>' . _AM_CSSMODULEFILE_LOADSURE . ' ' . $filetoload . '</b><br>';
    echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='loaddata' /><input type='hidden' name='filetoload' value='" . $filetoload . "' />";
    echo '</form>';
}

if ('loaddata' === $op) {
    include __DIR__ . '/profiles/' . $filetoload;
    updateCssValue('css_xoopstheme', $tcm['cssxoopstheme']);
    updateCssValue('css_xoopsthemesave', $tcm['cssxoopsthemesave']);
    updateCssValue('css_leftblockwidth', $tcm['leftblockwidth']);
    updateCssValue('css_rightblockwidth', $tcm['rightblockwidth']);
    updateCssValue('css_leftblocksitebg', $tcm['leftblocksitebg']);
    updateCssValue('css_centerblocksitebg', $tcm['centerblocksitebg']);
    updateCssValue('css_rightblocksitebg', $tcm['rightblocksitebg']);
    updateCssValue('css_defaultbg', $tcm['defaultbg']);
    updateCssValue('css_defaulttc', $tcm['defaulttc']);
    updateCssValue('css_defaultff', $tcm['defaultff']);
    updateCssValue('css_defaultfb', $tcm['defaultfb']);
    updateCssValue('css_defaultfs', $tcm['defaultfs']);
    updateCssValue('css_headerbg', $tcm['headerbg']);
    updateCssValue('css_headertc', $tcm['headertc']);
    updateCssValue('css_headerff', $tcm['headerff']);
    updateCssValue('css_headerfb', $tcm['headerfb']);
    updateCssValue('css_headerfs', $tcm['headerfs']);
    updateCssValue('css_headerbarbg', $tcm['headerbarbg']);
    updateCssValue('css_headerbartc', $tcm['headerbartc']);
    updateCssValue('css_headerbarff', $tcm['headerbarff']);
    updateCssValue('css_headerbarfb', $tcm['headerbarfb']);
    updateCssValue('css_headerbarfs', $tcm['headerbarfs']);
    updateCssValue('css_footerbg', $tcm['footerbg']);
    updateCssValue('css_footertc', $tcm['footertc']);
    updateCssValue('css_footerff', $tcm['footerff']);
    updateCssValue('css_footerfb', $tcm['footerfb']);
    updateCssValue('css_footerfs', $tcm['footerfs']);
    updateCssValue('css_footerbarbg', $tcm['footerbarbg']);
    updateCssValue('css_footerbartc', $tcm['footerbartc']);
    updateCssValue('css_footerbarff', $tcm['footerbarff']);
    updateCssValue('css_footerbarfb', $tcm['footerbarfb']);
    updateCssValue('css_footerbarfs', $tcm['footerbarfs']);
    updateCssValue('css_leftblockhbg', $tcm['leftblockhbg']);
    updateCssValue('css_leftblockhtc', $tcm['leftblockhtc']);
    updateCssValue('css_leftblockhff', $tcm['leftblockhff']);
    updateCssValue('css_leftblockhfb', $tcm['leftblockhfb']);
    updateCssValue('css_leftblockhfs', $tcm['leftblockhfs']);
    updateCssValue('css_leftblockbg', $tcm['leftblockbg']);
    updateCssValue('css_leftblocktc', $tcm['leftblocktc']);
    updateCssValue('css_leftblockff', $tcm['leftblockff']);
    updateCssValue('css_leftblockfb', $tcm['leftblockfb']);
    updateCssValue('css_leftblockfs', $tcm['leftblockfs']);
    updateCssValue('css_centerblockhbg', $tcm['centerblockhbg']);
    updateCssValue('css_centerblockhtc', $tcm['centerblockhtc']);
    updateCssValue('css_centerblockhff', $tcm['centerblockhff']);
    updateCssValue('css_centerblockhfb', $tcm['centerblockhfb']);
    updateCssValue('css_centerblockhfs', $tcm['centerblockhfs']);
    updateCssValue('css_centerblockbg', $tcm['centerblockbg']);
    updateCssValue('css_centerblocktc', $tcm['centerblocktc']);
    updateCssValue('css_centerblockff', $tcm['centerblockff']);
    updateCssValue('css_centerblockfb', $tcm['centerblockfb']);
    updateCssValue('css_centerblockfs', $tcm['centerblockfs']);
    updateCssValue('css_rightblockhbg', $tcm['rightblockhbg']);
    updateCssValue('css_rightblockhtc', $tcm['rightblockhtc']);
    updateCssValue('css_rightblockhff', $tcm['rightblockhff']);
    updateCssValue('css_rightblockhfb', $tcm['rightblockhfb']);
    updateCssValue('css_rightblockhfs', $tcm['rightblockhfs']);
    updateCssValue('css_rightblockbg', $tcm['rightblockbg']);
    updateCssValue('css_rightblocktc', $tcm['rightblocktc']);
    updateCssValue('css_rightblockff', $tcm['rightblockff']);
    updateCssValue('css_rightblockfb', $tcm['rightblockfb']);
    updateCssValue('css_rightblockfs', $tcm['rightblockfs']);
    updateCssValue('css_tablehbg', $tcm['tablehbg']);
    updateCssValue('css_tablehtc', $tcm['tablehtc']);
    updateCssValue('css_tablehff', $tcm['tablehff']);
    updateCssValue('css_tablehfb', $tcm['tablehfb']);
    updateCssValue('css_tablehfs', $tcm['tablehfs']);
    updateCssValue('css_tableebg', $tcm['tableebg']);
    updateCssValue('css_tableetc', $tcm['tableetc']);
    updateCssValue('css_tableeff', $tcm['tableeff']);
    updateCssValue('css_tableefb', $tcm['tableefb']);
    updateCssValue('css_tableefs', $tcm['tableefs']);
    updateCssValue('css_tableobg', $tcm['tableobg']);
    updateCssValue('css_tableotc', $tcm['tableotc']);
    updateCssValue('css_tableoff', $tcm['tableoff']);
    updateCssValue('css_tableofb', $tcm['tableofb']);
    updateCssValue('css_tableofs', $tcm['tableofs']);
    updateCssValue('css_tablefbg', $tcm['tablefbg']);
    updateCssValue('css_tableftc', $tcm['tableftc']);
    updateCssValue('css_tablefff', $tcm['tablefff']);
    updateCssValue('css_tableffb', $tcm['tableffb']);
    updateCssValue('css_tableffs', $tcm['tableffs']);
    updateCssValue('css_tablerebg', $tcm['tablerebg']);
    updateCssValue('css_tableretc', $tcm['tableretc']);
    updateCssValue('css_tablereff', $tcm['tablereff']);
    updateCssValue('css_tablerefb', $tcm['tablerefb']);
    updateCssValue('css_tablerefs', $tcm['tablerefs']);
    updateCssValue('css_tablerobg', $tcm['tablerobg']);
    updateCssValue('css_tablerotc', $tcm['tablerotc']);
    updateCssValue('css_tableroff', $tcm['tableroff']);
    updateCssValue('css_tablerofb', $tcm['tablerofb']);
    updateCssValue('css_tablerofs', $tcm['tablerofs']);
    updateCssValue('css_tablerfbg', $tcm['tablerfbg']);
    updateCssValue('css_tablerftc', $tcm['tablerftc']);
    updateCssValue('css_tablerfff', $tcm['tablerfff']);
    updateCssValue('css_tablerffb', $tcm['tablerffb']);
    updateCssValue('css_tablerffs', $tcm['tablerffs']);
    updateCssValue('css_abg', $tcm['abg']);
    updateCssValue('css_atc', $tcm['atc']);
    updateCssValue('css_aff', $tcm['aff']);
    updateCssValue('css_afb', $tcm['afb']);
    updateCssValue('css_afs', $tcm['afs']);
    updateCssValue('css_ahoverbg', $tcm['ahoverbg']);
    updateCssValue('css_ahovertc', $tcm['ahovertc']);
    updateCssValue('css_ahoverff', $tcm['ahoverff']);
    updateCssValue('css_ahoverfb', $tcm['ahoverfb']);
    updateCssValue('css_ahoverfs', $tcm['ahoverfs']);
    updateCssValue('css_ammbg', $tcm['ammbg']);
    updateCssValue('css_ammtc', $tcm['ammtc']);
    updateCssValue('css_ammff', $tcm['ammff']);
    updateCssValue('css_ammfb', $tcm['ammfb']);
    updateCssValue('css_ammfs', $tcm['ammfs']);
    updateCssValue('css_ammhbg', $tcm['ammhbg']);
    updateCssValue('css_ammhtc', $tcm['ammhtc']);
    updateCssValue('css_ammhff', $tcm['ammhff']);
    updateCssValue('css_ammhfb', $tcm['ammhfb']);
    updateCssValue('css_ammhfs', $tcm['ammhfs']);
    updateCssValue('css_ammcurrentbg', $tcm['ammcurrentbg']);
    updateCssValue('css_ammcurrenttc', $tcm['ammcurrenttc']);
    updateCssValue('css_ammcurrentff', $tcm['ammcurrentff']);
    updateCssValue('css_ammcurrentfb', $tcm['ammcurrentfb']);
    updateCssValue('css_ammcurrentfs', $tcm['ammcurrentfs']);
    updateCssValue('css_aumbg', $tcm['aumbg']);
    updateCssValue('css_aumtc', $tcm['aumtc']);
    updateCssValue('css_aumff', $tcm['aumff']);
    updateCssValue('css_aumfb', $tcm['aumfb']);
    updateCssValue('css_aumfs', $tcm['aumfs']);
    updateCssValue('css_aumhbg', $tcm['aumhbg']);
    updateCssValue('css_aumhtc', $tcm['aumhtc']);
    updateCssValue('css_aumhff', $tcm['aumhff']);
    updateCssValue('css_aumhfb', $tcm['aumhfb']);
    updateCssValue('css_aumhfs', $tcm['aumhfs']);
    updateCssValue('css_aumhlbg', $tcm['aumhlbg']);
    updateCssValue('css_aumhltc', $tcm['aumhltc']);
    updateCssValue('css_aumhlff', $tcm['aumhlff']);
    updateCssValue('css_aumhlfb', $tcm['aumhlfb']);
    updateCssValue('css_aumhlfs', $tcm['aumhlfs']);
}

if ('savefile' === $op) {
    $cssprofilecontent = '';
    $cssprofilecontent .= '<' . '?' . "php\n";
    $cssprofilecontent .= 'global $' . "tcm;\n";
    $cssprofilecontent .= '$' . "tcm['cssxoopstheme'] = '" . $tcm['cssxoopstheme'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['xoopsthemesave'] = '" . $tcm['xoopsthemesave'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockwidth'] = '" . $tcm['leftblockwidth'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockwidth'] = '" . $tcm['rightblockwidth'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblocksitebg'] = '" . $tcm['leftblocksitebg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblocksitebg'] = '" . $tcm['centerblocksitebg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblocksitebg'] = '" . $tcm['rightblocksitebg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['defaultbg'] = '" . $tcm['defaultbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['defaulttc'] = '" . $tcm['defaulttc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['defaultff'] = '" . $tcm['defaultff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['defaultfb'] = '" . $tcm['defaultfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['defaultfs'] = '" . $tcm['defaultfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbg'] = '" . $tcm['headerbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headertc'] = '" . $tcm['headertc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerff'] = '" . $tcm['headerff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerfb'] = '" . $tcm['headerfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerfs'] = '" . $tcm['headerfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarbg'] = '" . $tcm['headerbarbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbartc'] = '" . $tcm['headerbartc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarff'] = '" . $tcm['headerbarff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarfb'] = '" . $tcm['headerbarfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarfs'] = '" . $tcm['headerbarfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbg'] = '" . $tcm['footerbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footertc'] = '" . $tcm['footertc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerff'] = '" . $tcm['footerff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerfb'] = '" . $tcm['footerfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerfs'] = '" . $tcm['footerfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarbg'] = '" . $tcm['footerbarbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbartc'] = '" . $tcm['footerbartc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarff'] = '" . $tcm['footerbarff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarfb'] = '" . $tcm['footerbarfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarfs'] = '" . $tcm['footerbarfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockhbg'] = '" . $tcm['leftblockhbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockhtc'] = '" . $tcm['leftblockhtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockhff'] = '" . $tcm['leftblockhff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockhfb'] = '" . $tcm['leftblockhfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockhfs'] = '" . $tcm['leftblockhfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockbg'] = '" . $tcm['leftblockbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblocktc'] = '" . $tcm['leftblocktc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockff'] = '" . $tcm['leftblockff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockfb'] = '" . $tcm['leftblockfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['leftblockfs'] = '" . $tcm['leftblockfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockhbg'] = '" . $tcm['centerblockhbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockhtc'] = '" . $tcm['centerblockhtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockhff'] = '" . $tcm['centerblockhff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockhfb'] = '" . $tcm['centerblockhfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockhfs'] = '" . $tcm['centerblockhfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockbg'] = '" . $tcm['centerblockbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblocktc'] = '" . $tcm['centerblocktc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockff'] = '" . $tcm['centerblockff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockfb'] = '" . $tcm['centerblockfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['centerblockfs'] = '" . $tcm['centerblockfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockhbg'] = '" . $tcm['rightblockhbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockhtc'] = '" . $tcm['rightblockhtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockhff'] = '" . $tcm['rightblockhff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockhfb'] = '" . $tcm['rightblockhfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockhfs'] = '" . $tcm['rightblockhfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockbg'] = '" . $tcm['rightblockbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblocktc'] = '" . $tcm['rightblocktc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockff'] = '" . $tcm['rightblockff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockfb'] = '" . $tcm['rightblockfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['rightblockfs'] = '" . $tcm['rightblockfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablehbg'] = '" . $tcm['tablehbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablehtc'] = '" . $tcm['tablehtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablehff'] = '" . $tcm['tablehff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablehfb'] = '" . $tcm['tablehfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablehfs'] = '" . $tcm['tablehfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableebg'] = '" . $tcm['tableebg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableetc'] = '" . $tcm['tableetc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableeff'] = '" . $tcm['tableeff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableefb'] = '" . $tcm['tableefb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableefs'] = '" . $tcm['tableefs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableobg'] = '" . $tcm['tableobg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableotc'] = '" . $tcm['tableotc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableoff'] = '" . $tcm['tableoff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableofb'] = '" . $tcm['tableofb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableofs'] = '" . $tcm['tableofs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablefbg'] = '" . $tcm['tablefbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableftc'] = '" . $tcm['tableftc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablefff'] = '" . $tcm['tablefff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableffb'] = '" . $tcm['tableffb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableffs'] = '" . $tcm['tableffs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerebg'] = '" . $tcm['tablerebg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableretc'] = '" . $tcm['tableretc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablereff'] = '" . $tcm['tablereff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerefb'] = '" . $tcm['tablerefb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerefs'] = '" . $tcm['tablerefs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerobg'] = '" . $tcm['tablerobg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerotc'] = '" . $tcm['tablerotc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tableroff'] = '" . $tcm['tableroff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerofb'] = '" . $tcm['tablerofb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerofs'] = '" . $tcm['tablerofs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerfbg'] = '" . $tcm['tablerfbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerftc'] = '" . $tcm['tablerftc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerfff'] = '" . $tcm['tablerfff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerffb'] = '" . $tcm['tablerffb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['tablerffs'] = '" . $tcm['tablerffs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['abg'] = '" . $tcm['abg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['atc'] = '" . $tcm['atc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aff'] = '" . $tcm['aff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['afb'] = '" . $tcm['afb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['afs'] = '" . $tcm['afs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ahoverbg'] = '" . $tcm['ahoverbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ahovertc'] = '" . $tcm['ahovertc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ahoverff'] = '" . $tcm['ahoverff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ahoverfb'] = '" . $tcm['ahoverfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ahoverfs'] = '" . $tcm['ahoverfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammbg'] = '" . $tcm['ammbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammtc'] = '" . $tcm['ammtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammff'] = '" . $tcm['ammff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammfb'] = '" . $tcm['ammfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammfs'] = '" . $tcm['ammfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammhbg'] = '" . $tcm['ammhbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammhtc'] = '" . $tcm['ammhtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammhff'] = '" . $tcm['ammhff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammhfb'] = '" . $tcm['ammhfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammhfs'] = '" . $tcm['ammhfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammcurrentbg'] = '" . $tcm['ammcurrentbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammcurrenttc'] = '" . $tcm['ammcurrenttc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammcurrentff'] = '" . $tcm['ammcurrentff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammcurrentfb'] = '" . $tcm['ammcurrentfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['ammcurrentfs'] = '" . $tcm['ammcurrentfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumbg'] = '" . $tcm['aumbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumtc'] = '" . $tcm['aumtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumff'] = '" . $tcm['aumff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumfb'] = '" . $tcm['aumfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumfs'] = '" . $tcm['aumfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhbg'] = '" . $tcm['aumhbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhtc'] = '" . $tcm['aumhtc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhff'] = '" . $tcm['aumhff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhfb'] = '" . $tcm['aumhfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhfs'] = '" . $tcm['aumhfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhlbg'] = '" . $tcm['aumhlbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhltc'] = '" . $tcm['aumhltc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhlff'] = '" . $tcm['aumhlff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhlfb'] = '" . $tcm['aumhlfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['aumhlfs'] = '" . $tcm['aumhlfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbg'] = '" . $tcm['headerbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headertc'] = '" . $tcm['headertc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerff'] = '" . $tcm['headerff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerfb'] = '" . $tcm['headerfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerfs'] = '" . $tcm['headerfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarbg'] = '" . $tcm['headerbarbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbartc'] = '" . $tcm['headerbartc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarff'] = '" . $tcm['headerbarff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarfb'] = '" . $tcm['headerbarfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['headerbarfs'] = '" . $htcm['eaderbarfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbg'] = '" . $tcm['footerbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footertc'] = '" . $tcm['footertc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerff'] = '" . $tcm['footerff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerfb'] = '" . $tcm['footerfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerfs'] = '" . $tcm['footerfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarbg'] = '" . $tcm['footerbarbg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbartc'] = '" . $tcm['footerbartc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarff'] = '" . $tcm['footerbarff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarfb'] = '" . $tcm['footerbarfb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['footerbarfs'] = '" . $tcm['footerbarfs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h1bg'] = '" . $tcm['h1bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h1tc'] = '" . $tcm['h1tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h1ff'] = '" . $tcm['h1ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h1fb'] = '" . $tcm['h1fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h1fs'] = '" . $tcm['h1fs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h2bg'] = '" . $tcm['h2bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h2tc'] = '" . $tcm['h2tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h2ff'] = '" . $tcm['h2ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h2fb'] = '" . $tcm['h2fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h2fs'] = '" . $tcm['h2fs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h3bg'] = '" . $tcm['h3bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h3tc'] = '" . $tcm['h3tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h3ff'] = '" . $tcm['h3ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h3fb'] = '" . $tcm['h3fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h3fs'] = '" . $tcm['h3fs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h4bg'] = '" . $tcm['h4bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h4tc'] = '" . $tcm['h4tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h4ff'] = '" . $tcm['h4ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h4fb'] = '" . $tcm['h4fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h4fs'] = '" . $tcm['h4fs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h5bg'] = '" . $tcm['h5bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h5tc'] = '" . $tcm['h5tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h5ff'] = '" . $tcm['h5ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h5fb'] = '" . $tcm['h5fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h5fs'] = '" . $tcm['h5fs'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h6bg'] = '" . $tcm['h6bg'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h6tc'] = '" . $tcm['h6tc'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h6ff'] = '" . $tcm['h6ff'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h6fb'] = '" . $tcm['h6fb'] . "';\n";
    $cssprofilecontent .= '$' . "tcm['h6fs'] = '" . $tcm['h6fs'] . "';\n";
    $cssprofilecontent .= '?' . '>' . "\n";

    $profilehandle = fopen('profiles/' . $tcm['cssxoopsthemesave'], 'w+b');
    fwrite($profilehandle, $cssprofilecontent, mb_strlen($cssprofilecontent));
    fclose($profilehandle);
}

if ('savecolour' === $op) {
    updateCssValue('css_leftblockbg', $formleftblockbg);
    updateCssValue('css_leftblocktc', $formleftblocktc);
    updateCssValue('css_leftblockff', $formleftblockff);
    updateCssValue('css_leftblockfb', $formleftblockfb);
    updateCssValue('css_leftblockfs', $formleftblockfs);
    updateCssValue('css_leftblockhbg', $formleftblockhbg);
    updateCssValue('css_leftblockhtc', $formleftblockhtc);
    updateCssValue('css_leftblockhff', $formleftblockhff);
    updateCssValue('css_leftblockhfb', $formleftblockhfb);
    updateCssValue('css_leftblockhfs', $formleftblockhfs);
    updateCssValue('css_centerblockbg', $formcenterblockbg);
    updateCssValue('css_centerblocktc', $formcenterblocktc);
    updateCssValue('css_centerblockff', $formcenterblockff);
    updateCssValue('css_centerblockfb', $formcenterblockfb);
    updateCssValue('css_centerblockfs', $formcenterblockfs);
    updateCssValue('css_centerblockhbg', $formcenterblockhbg);
    updateCssValue('css_centerblockhtc', $formcenterblockhtc);
    updateCssValue('css_centerblockhff', $formcenterblockhff);
    updateCssValue('css_centerblockhfb', $formcenterblockhfb);
    updateCssValue('css_centerblockhfs', $formcenterblockhfs);
    updateCssValue('css_rightblockbg', $formrightblockbg);
    updateCssValue('css_rightblocktc', $formrightblocktc);
    updateCssValue('css_rightblockff', $formrightblockff);
    updateCssValue('css_rightblockfb', $formrightblockfb);
    updateCssValue('css_rightblockfs', $formrightblockfs);
    updateCssValue('css_rightblockhbg', $formrightblockhbg);
    updateCssValue('css_rightblockhtc', $formrightblockhtc);
    updateCssValue('css_rightblockhff', $formrightblockhff);
    updateCssValue('css_rightblockhfb', $formrightblockhfb);
    updateCssValue('css_rightblockhfs', $formrightblockhfs);
}

if ('savebasic' === $op) {
    updateCssValue('css_leftblocksitebg', $formleftblocksitebg);
    updateCssValue('css_centerblocksitebg', $formcenterblocksitebg);
    updateCssValue('css_rightblocksitebg', $formrightblocksitebg);
    updateCssValue('css_xoopstheme', $formxoopstheme);
    updateCssValue('css_xoopsthemesave', $formxoopsthemesave);
    updateCssValue('css_leftblockwidth', $formleftblockwidth);
    updateCssValue('css_rightblockwidth', $formrightblockwidth);
}

if ('savetable' === $op) {
    updateCssValue('css_tablehbg', $formtablehbg);
    updateCssValue('css_tablehtc', $formtablehtc);
    updateCssValue('css_tablehff', $formtablehff);
    updateCssValue('css_tablehfb', $formtablehfb);
    updateCssValue('css_tablehfs', $formtablehfs);
    updateCssValue('css_tableebg', $formtableebg);
    updateCssValue('css_tableetc', $formtableetc);
    updateCssValue('css_tableeff', $formtableeff);
    updateCssValue('css_tableefb', $formtableefb);
    updateCssValue('css_tableefs', $formtableefs);
    updateCssValue('css_tableobg', $formtableobg);
    updateCssValue('css_tableotc', $formtableotc);
    updateCssValue('css_tableoff', $formtableoff);
    updateCssValue('css_tableofb', $formtableofb);
    updateCssValue('css_tableofs', $formtableofs);
    updateCssValue('css_tablefbg', $formtablefbg);
    updateCssValue('css_tableftc', $formtableftc);
    updateCssValue('css_tablefff', $formtablefff);
    updateCssValue('css_tableffb', $formtableffb);
    updateCssValue('css_tableffs', $formtableffs);
    updateCssValue('css_tablerebg', $formtablerebg);
    updateCssValue('css_tableretc', $formtableretc);
    updateCssValue('css_tablereff', $formtablereff);
    updateCssValue('css_tablerefb', $formtablerefb);
    updateCssValue('css_tablerefs', $formtablerefs);
    updateCssValue('css_tablerobg', $formtablerobg);
    updateCssValue('css_tablerotc', $formtablerotc);
    updateCssValue('css_tableroff', $formtableroff);
    updateCssValue('css_tablerofb', $formtablerofb);
    updateCssValue('css_tablerofs', $formtablerofs);
    updateCssValue('css_tablerfbg', $formtablerfbg);
    updateCssValue('css_tablerftc', $formtablerftc);
    updateCssValue('css_tablerfff', $formtablerfff);
    updateCssValue('css_tablerffb', $formtablerffb);
    updateCssValue('css_tablerffs', $formtablerffs);
}

if ('saveheader' === $op) {
    updateCssValue('css_defaultbg', $formdefaultbg);
    updateCssValue('css_defaulttc', $formdefaulttc);
    updateCssValue('css_defaultff', $formdefaultff);
    updateCssValue('css_defaultfb', $formdefaultfb);
    updateCssValue('css_defaultfs', $formdefaultfs);
    updateCssValue('css_headerbg', $formheaderbg);
    updateCssValue('css_headertc', $formheadertc);
    updateCssValue('css_headerff', $formheaderff);
    updateCssValue('css_headerfb', $formheaderfb);
    updateCssValue('css_headerfs', $formheaderfs);
    updateCssValue('css_headerbarbg', $formheaderbarbg);
    updateCssValue('css_headerbartc', $formheaderbartc);
    updateCssValue('css_headerbarff', $formheaderbarff);
    updateCssValue('css_headerbarfb', $formheaderbarfb);
    updateCssValue('css_headerbarfs', $formheaderbarfs);
    updateCssValue('css_footerbg', $formfooterbg);
    updateCssValue('css_footertc', $formfootertc);
    updateCssValue('css_footerff', $formfooterff);
    updateCssValue('css_footerfb', $formfooterfb);
    updateCssValue('css_footerfs', $formfooterfs);
    updateCssValue('css_footerbarbg', $formfooterbarbg);
    updateCssValue('css_footerbartc', $formfooterbartc);
    updateCssValue('css_footerbarff', $formfooterbarff);
    updateCssValue('css_footerbarfb', $formfooterbarfb);
    updateCssValue('css_footerbarfs', $formfooterbarfs);
}

if ('savetags' === $op) {
    updateCssValue('css_abg', $formabg);
    updateCssValue('css_atc', $formatc);
    updateCssValue('css_aff', $formaff);
    updateCssValue('css_afb', $formafb);
    updateCssValue('css_afs', $formafs);
    updateCssValue('css_ahoverbg', $formahoverbg);
    updateCssValue('css_ahovertc', $formahovertc);
    updateCssValue('css_ahoverff', $formahoverff);
    updateCssValue('css_ahoverfb', $formahoverfb);
    updateCssValue('css_ahoverfs', $formahoverfs);
    updateCssValue('css_ammbg', $formammbg);
    updateCssValue('css_ammtc', $formammtc);
    updateCssValue('css_ammff', $formammff);
    updateCssValue('css_ammfb', $formammfb);
    updateCssValue('css_ammfs', $formammfs);
    updateCssValue('css_ammhbg', $formammhbg);
    updateCssValue('css_ammhtc', $formammhtc);
    updateCssValue('css_ammhff', $formammhff);
    updateCssValue('css_ammhfb', $formammhfb);
    updateCssValue('css_ammhfs', $formammhfs);
    updateCssValue('css_ammcurrentbg', $formammcurrentbg);
    updateCssValue('css_ammcurrenttc', $formammcurrenttc);
    updateCssValue('css_ammcurrentff', $formammcurrentff);
    updateCssValue('css_ammcurrentfb', $formammcurrentfb);
    updateCssValue('css_ammcurrentfs', $formammcurrentfs);
    updateCssValue('css_aumbg', $formaumbg);
    updateCssValue('css_aumtc', $formaumtc);
    updateCssValue('css_aumff', $formaumff);
    updateCssValue('css_aumfb', $formaumfb);
    updateCssValue('css_aumfs', $formaumfs);
    updateCssValue('css_aumhbg', $formaumhbg);
    updateCssValue('css_aumhtc', $formaumhtc);
    updateCssValue('css_aumhff', $formaumhff);
    updateCssValue('css_aumhfb', $formaumhfb);
    updateCssValue('css_aumhfs', $formaumhfs);
    updateCssValue('css_aumhlbg', $formaumhlbg);
    updateCssValue('css_aumhltc', $formaumhltc);
    updateCssValue('css_aumhlff', $formaumhlff);
    updateCssValue('css_aumhlfb', $formaumhlfb);
    updateCssValue('css_aumhlfs', $formaumhlfs);
}

if ('savehtag' === $op) {
    updateCssValue('css_h1bg', $formh1bg);
    updateCssValue('css_h1tc', $formh1tc);
    updateCssValue('css_h1ff', $formh1ff);
    updateCssValue('css_h1fb', $formh1fb);
    updateCssValue('css_h1fs', $formh1fs);
    updateCssValue('css_h2bg', $formh2bg);
    updateCssValue('css_h2tc', $formh2tc);
    updateCssValue('css_h2ff', $formh2ff);
    updateCssValue('css_h2fb', $formh2fb);
    updateCssValue('css_h2fs', $formh2fs);
    updateCssValue('css_h3bg', $formh3bg);
    updateCssValue('css_h3tc', $formh3tc);
    updateCssValue('css_h3ff', $formh3ff);
    updateCssValue('css_h3fb', $formh3fb);
    updateCssValue('css_h3fs', $formh3fs);
    updateCssValue('css_h4bg', $formh4bg);
    updateCssValue('css_h4tc', $formh4tc);
    updateCssValue('css_h4ff', $formh4ff);
    updateCssValue('css_h4fb', $formh4fb);
    updateCssValue('css_h4fs', $formh4fs);
    updateCssValue('css_h5bg', $formh5bg);
    updateCssValue('css_h5tc', $formh5tc);
    updateCssValue('css_h5ff', $formh5ff);
    updateCssValue('css_h5fb', $formh5fb);
    updateCssValue('css_h5fs', $formh5fs);
    updateCssValue('css_h6bg', $formh6bg);
    updateCssValue('css_h6tc', $formh6tc);
    updateCssValue('css_h6ff', $formh6ff);
    updateCssValue('css_h6fb', $formh6fb);
    updateCssValue('css_h6fs', $formh6fs);
}

if ('saveftp' === $op) {
    updateCssValue('css_ftpserver', $formftpserver);
    updateCssValue('css_ftpusername', $formftpusername);
    updateCssValue('css_ftppassword', $formftppassword);
    updateCssValue('css_ftpdebug', $formftpdebug);
    updateCssValue('css_ftpuse', $formftpuse);
}

if ('finish' === $op) {
    if ($handle = opendir('themes/' . $tcm['cssxoopstheme'])) {
        while (false !== ($file = readdir($handle))) {
            if ('.' !== $file && '..' !== $file) {
                $defaultcssthemecontent = '';
                $filename               = 'themes/' . $tcm['cssxoopstheme'] . '/' . $file;
                $fh                     = fopen($filename, 'rb');
                $defaultcssthemecontent = fread($fh, filesize($filename));
                fclose($fh);
                $defaultcssthemecontent = replacevalue($defaultcssthemecontent);

                if (!$tcm['ftpuse']) {
                    $themehandle = fopen(XOOPS_ROOT_PATH . '/themes/' . $tcm['cssxoopstheme'] . '/' . $file, 'w+b');
                    fwrite($themehandle, $defaultcssthemecontent, mb_strlen($defaultcssthemecontent));
                    fclose($themehandle);
                } else {
                    $themehandle = fopen(XOOPS_VAR_PATH . '/data/css-' . $file, 'w+b');
                    fwrite($themehandle, $defaultcssthemecontent, mb_strlen($defaultcssthemecontent));
                    fclose($themehandle);
                    $ftpresult = uploadbyftp(XOOPS_ROOT_PATH . '/themes/' . $tcm['cssxoopstheme'] . '/', $file, XOOPS_VAR_PATH . '/data/css-' . $file, $tcm['ftpserver'], $tcm['ftpusername'], $tcm['ftppassword'], $tcm['ftpdebug']);
                    if ($ftpresult) {
                        echo 'Ftp File Modification ok. ' . $file . '<br>';
                    } else {
                        echo 'Ftp File Modification error. ' . $file . '<br>';
                    }
                }
            }
        }
        closedir($handle);
    }
}
echo '</td></tr></table>';
xoops_cp_footer();
