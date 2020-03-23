<?php

include __DIR__ . '/admin_header.php';
require_once XOOPS_ROOT_PATH . '/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopscomments.php';

global $xoopsDB, $moduleid, $tcm;

include_once XOOPS_ROOT_PATH . '/kernel/object.php';

include_once __DIR__ . '/share.php';
loadTcmValue();
loadCompleteCss('themes/' . $tcm['cssxoopstheme']);
// Initializations
$myts = MyTextSanitizer::getInstance();

//
// Form Part
//
xoops_cp_header();
include __DIR__ . '/mymenu.php';

// check $xoopsModule
if (!is_object($xoopsModule)) {
    redirect_header("$mod_url/", 1, _NOPERM);
}

if (!empty($_GET['op'])) {
    $op = $_GET['op'];
}
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        $$k = $v;
    }
}

//Include CSS
/*
echo '
     <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
';
*/
echo '
<script type="text/javascript" src="js/jscolor.js"></script>
';

echo '
<script language="javascript" type="text/javascript">
   function changeBackgroundColor(objDivID, colorvalue)
   {
        document.getElementById(objDivID).style.backgroundColor = colorvalue;
    }
    function changeTextColor(objDivID, colorvalue)
   {
          document.getElementById(objDivID).style.color =  colorvalue;
    }
</script>
';

echo "<br><br><form action='index.php' method='post'>";
echo '<table><tr><td>';

echo '<table>';
echo "<tr><td id='back1' bgcolor='" . $tcm['abg'] . "'>";
echo "<font id='back2' face='" . $tcm['aff'] . "' size='" . $tcm['afs'] . "' color='" . $tcm['atc'] . "'>";
echo _AM_CSSATEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back3' bgcolor='" . $tcm['ahoverbg'] . "'>";
echo "<font id='back4' face='" . $tcm['ahoverff'] . "' size='" . $tcm['ahoverfs'] . "' color='" . $tcm['ahovertc'] . "'>";
echo _AM_CSSAHOVERTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back5' bgcolor='" . $tcm['ammbg'] . "'>";
echo "<font id='back6' face='" . $tcm['ammff'] . "' size='" . $tcm['ammfs'] . "' color='" . $tcm['ammtc'] . "'>";
echo _AM_CSSAMMTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back7' bgcolor='" . $tcm['ammhbg'] . "'>";
echo "<font id='back8' face='" . $tcm['ammhff'] . "' size='" . $tcm['ammhfs'] . "' color='" . $tcm['ammhtc'] . "'>";
echo _AM_CSSAMMHTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back9' bgcolor='" . $tcm['ammcurrentbg'] . "'>";
echo "<font id='back10' face='" . $tcm['ammcurrentff'] . "' size='" . $tcm['ammcurrentfs'] . "' color='" . $tcm['ammcurrenttc'] . "'>";
echo _AM_CSSAMMCURRENTTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back11' bgcolor='" . $tcm['aumbg'] . "'>";
echo "<font id='back12' face='" . $tcm['aumff'] . "' size='" . $tcm['aumfs'] . "' color='" . $tcm['aumtc'] . "'>";
echo _AM_CSSAUMTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back13' bgcolor='" . $tcm['aumhbg'] . "'>";
echo "<font id='back14' face='" . $tcm['aumhff'] . "' size='" . $tcm['aumhfs'] . "' color='" . $tcm['aumhtc'] . "'>";
echo _AM_CSSAUMHTEXT . '</font>';
echo '</td></tr>';
echo "<tr><td id='back15' bgcolor='" . $tcm['aumhlbg'] . "'>";
echo "<font id='back16' face='" . $tcm['aumhlff'] . "' size='" . $tcm['aumhlfs'] . "' color='" . $tcm['aumhltc'] . "'>";
echo _AM_CSSAUMHIGLIGHTTEXT . '</font>';

echo '</td></tr></table>';
echo '</td><td>';

echo '<b>' . _AM_CSSATEXT . '</b>';
echo '<br>';
echo _AM_CSSABG . ' &#60;abg&#62;';
echo checkused('<abg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back1', this.value)\" type='text' name='formabg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['abg'] . "' /></p>
";
echo _AM_CSSATC . ' &#60;atc&#62;';
echo checkused('<atc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back2', this.value)\" type='text' name='formatc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['atc'] . "' /></p>
";
echo _AM_CSSAFF . ' &#60;aff&#62;';
echo checkused('<aff>');
echo "
<p><input type='text' name='formaff' maxlength='50' size='30'  value='" . $tcm['aff'] . "' /></p>
";
echo _AM_CSSAFB . ' &#60;afb&#62;';
echo checkused('<afb>');
echo "
<p><input type='text' name='formafb' maxlength='50' size='30'  value='" . $tcm['afb'] . "' /></p>
";
echo _AM_CSSAFS . ' &#60;afs&#62;';
echo checkused('<afs>');
echo "
<p><input type='text' name='formafs' maxlength='50' size='30'  value='" . $tcm['afs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSAHOVERTEXT . '</b>';
echo '<br>';
echo _AM_CSSAHOVERBG . ' &#60;ahoverbg&#62;';
echo checkused('<ahoverbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back3', this.value)\" type='text' name='formahoverbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ahoverbg'] . "' /></p>
";
echo _AM_CSSAHOVERTC . ' &#60;ahovertc&#62;';
echo checkused('<ahovertc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back4', this.value)\" type='text' name='formahovertc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ahovertc'] . "' /></p>
";
echo _AM_CSSAHOVERFF . ' &#60;ahoverff&#62;';
echo checkused('<ahoverff>');
echo "
<p><input type='text' name='formahoverff' maxlength='50' size='30'  value='" . $tcm['ahoverff'] . "' /></p>
";
echo _AM_CSSAHOVERFB . ' &#60;ahoverfb&#62;';
echo checkused('<ahoverfb>');
echo "
<p><input type='text' name='formahoverfb' maxlength='50' size='30'  value='" . $tcm['ahoverfb'] . "' /></p>
";
echo _AM_CSSAHOVERFS . ' &#60;ahoverfs&#62;';
echo checkused('<ahoverfs>');
echo "
<p><input type='text' name='formahoverfs' maxlength='50' size='30'  value='" . $tcm['ahoverfs'] . "' /></p>
";

echo '</td><td>';

echo '<b>' . _AM_CSSAMMTEXT . '</b>';
echo '<br>';
echo _AM_CSSAMMBG . ' &#60;ammbg&#62;';
echo checkused('<ammbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back5', this.value)\" type='text' name='formammbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammbg'] . "' /></p>
";
echo _AM_CSSAMMTC . ' &#60;ammtc&#62;';
echo checkused('<ammtc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back6', this.value)\" type='text' name='formammtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammtc'] . "' /></p>
";
echo _AM_CSSAMMFF . ' &#60;ammff&#62;';
echo checkused('<ammff>');
echo "
<p><input type='text' name='formammff' maxlength='50' size='30'  value='" . $tcm['ammff'] . "' /></p>
";
echo _AM_CSSAMMFB . ' &#60;ammfb&#62;';
echo checkused('<ammfb>');
echo "
<p><input type='text' name='formammfb' maxlength='50' size='30'  value='" . $tcm['ammfb'] . "' /></p>
";
echo _AM_CSSAMMFS . ' &#60;ammfs&#62;';
echo checkused('<ammfs>');
echo "
<p><input type='text' name='formammfs' maxlength='50' size='30'  value='" . $tcm['ammfs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSAMMHTEXT . '</b>';
echo '<br>';
echo _AM_CSSAMMHBG . ' &#60;ammhbg&#62;';
echo checkused('<ammhbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back7', this.value)\" type='text' name='formammhbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammhbg'] . "' /></p>
";
echo _AM_CSSAMMHTC . ' &#60;ammhtc&#62;';
echo checkused('<ammhtc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back8', this.value)\" type='text' name='formammhtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammhtc'] . "' /></p>
";
echo _AM_CSSAMMHFF . ' &#60;ammhff&#62;';
echo checkused('<ammhff>');
echo "
<p><input type='text' name='formammhff' maxlength='50' size='30'  value='" . $tcm['ammhff'] . "' /></p>
";
echo _AM_CSSAMMHFB . ' &#60;ammhfb&#62;';
echo checkused('<ammhfb>');
echo "
<p><input type='text' name='formammhfb' maxlength='50' size='30'  value='" . $tcm['ammhfb'] . "' /></p>
";
echo _AM_CSSAMMHFS . ' &#60;ammhfs&#62;';
echo checkused('<ammhfs>');
echo "
<p><input type='text' name='formammhfs' maxlength='50' size='30'  value='" . $tcm['ammhfs'] . "' /></p>
";

echo '</td><td>';

echo '<b>' . _AM_CSSAMMCURRENTTEXT . '</b>';
echo '<br>';
echo _AM_CSSAMMCURRENTBG . ' &#60;ammcurrentbg&#62;';
echo checkused('<ammcurrentbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back9', this.value)\" type='text' name='formammcurrentbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammcurrentbg'] . "' /></p>
";
echo _AM_CSSAMMCURRENTTC . ' &#60;ammcurrenttc&#62;';
echo checkused('<ammcurrenttc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back10', this.value)\" type='text' name='formammcurrenttc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['ammcurrenttc'] . "' /></p>
";
echo _AM_CSSAMMCURRENTFF . ' &#60;ammcurrentff&#62;';
echo checkused('<ammcurrentff>');
echo "
<p><input type='text' name='formammcurrentff' maxlength='50' size='30'  value='" . $tcm['ammcurrentff'] . "' /></p>
";
echo _AM_CSSAMMCURRENTFB . ' &#60;ammcurrentfb&#62;';
echo checkused('<ammcurrentfb>');
echo "
<p><input type='text' name='formammcurrentfb' maxlength='50' size='30'  value='" . $tcm['ammcurrentfb'] . "' /></p>
";
echo _AM_CSSAMMCURRENTFS . ' &#60;ammcurrentfs&#62;';
echo checkused('<ammcurrentfs>');
echo "
<p><input type='text' name='formammcurrentfs' maxlength='50' size='30'  value='" . $tcm['ammcurrentfs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSAUMTEXT . '</b>';
echo '<br>';
echo _AM_CSSAUMBG . ' &#60;aumbg&#62;';
echo checkused('<aumbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back11', this.value)\" type='text' name='formaumbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumbg'] . "' /></p>
";
echo _AM_CSSAUMTC . ' &#60;aumtc&#62;';
echo checkused('<aumtc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back12', this.value)\" type='text' name='formaumtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumtc'] . "' /></p>
";
echo _AM_CSSAUMFF . ' &#60;aumff&#62;';
echo checkused('<aumff>');
echo "
<p><input type='text' name='formaumff' maxlength='50' size='30'  value='" . $tcm['aumff'] . "' /></p>
";
echo _AM_CSSAUMFB . ' &#60;aumfb&#62;';
echo checkused('<aumfb>');
echo "
<p><input type='text' name='formaumfb' maxlength='50' size='30'  value='" . $tcm['aumfb'] . "' /></p>
";
echo _AM_CSSAUMFS . ' &#60;aumfs&#62;';
echo checkused('<aumfs>');
echo "
<p><input type='text' name='formaumfs' maxlength='50' size='30'  value='" . $tcm['aumfs'] . "' /></p>
";

echo '</td><td>';

echo '<b>' . _AM_CSSAUMHTEXT . '</b>';
echo '<br>';
echo _AM_CSSAUMHBG . ' &#60;aumhbg&#62;';
echo checkused('<aumhbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back13', this.value)\" type='text' name='formaumhbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumhbg'] . "' /></p>
";
echo _AM_CSSAUMHTC . ' &#60;aumhtc&#62;';
echo checkused('<aumhtc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back14', this.value)\" type='text' name='formaumhtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumhtc'] . "' /></p>
";
echo _AM_CSSAUMHFF . ' &#60;aumhff&#62;';
echo checkused('<aumhff>');
echo "
<p><input type='text' name='formaumhff' maxlength='50' size='30'  value='" . $tcm['aumhff'] . "' /></p>
";
echo _AM_CSSAUMHFB . ' &#60;aumhfb&#62;';
echo checkused('<aumhfb>');
echo "
<p><input type='text' name='formaumhfb' maxlength='50' size='30'  value='" . $tcm['aumhfb'] . "' /></p>
";
echo _AM_CSSAUMHFS . ' &#60;aumhfs&#62;';
echo checkused('<aumhfs>');
echo "
<p><input type='text' name='formaumhfs' maxlength='50' size='30'  value='" . $tcm['aumhfs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSAUMHIGLIGHTTEXT . '</b>';
echo '<br>';
echo _AM_CSSAUMHIGLIGHTBG . ' &#60;aumhlbg&#62;';
echo checkused('<aumhlbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back15', this.value)\" type='text' name='formaumhlbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumhlbg'] . "' /></p>
";
echo _AM_CSSAUMHIGLIGHTTC . ' &#60;aumhltc&#62;';
echo checkused('<aumhltc>');

echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back16', this.value)\" type='text' name='formaumhltc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['aumhltc'] . "' /></p>
";
echo _AM_CSSAUMHIGLIGHTFF . ' &#60;aumhlff&#62;';
echo checkused('<aumhlff>');
echo "
<p><input type='text' name='formaumhlff' maxlength='50' size='30'  value='" . $tcm['aumhlff'] . "' /></p>
";
echo _AM_CSSAUMHIGLIGHTFB . ' &#60;aumhlfb&#62;';
echo checkused('<aumhlfb>');
echo "
<p><input type='text' name='formaumhlfb' maxlength='50' size='30'  value='" . $tcm['aumhlfb'] . "' /></p>
";
echo _AM_CSSAUMHIGLIGHTFS . ' &#60;aumhlf&#62;';
echo checkused('<aumhlfb>');
echo "
<p><input type='text' name='formaumhlfs' maxlength='50' size='30'  value='" . $tcm['aumhlfs'] . "' /></p>
";

echo '</td><td>';

echo '</td></tr></table>';

echo '<br><b>' . _AM_CSSMODULE_CHANGEHEADER . '</b><br>';
echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='savetags' />";
echo '</form>';
echo '</td></tr></table>';
xoops_cp_footer();
