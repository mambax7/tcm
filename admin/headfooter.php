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
echo "<tr><td id='back1' bgcolor='" . $tcm['defaultbg'] . "'><br>";
echo "<font id='back2' face='" . $tcm['defaultff'] . "' size='" . $tcm['defaultfs'] . "' color='" . $tcm['defaulttc'] . "'>";
echo _AM_CSSDEFAULTTEXT . '</font><br>';
echo '</td></tr>';
echo "<tr><td id='back3' bgcolor='" . $tcm['headerbg'] . "'><br>";
echo "<font id='back4' face='" . $tcm['headerff'] . "' size='" . $tcm['headerfs'] . "' color='" . $tcm['headertc'] . "'>";
echo _AM_CSSHEADERTEXT . '</font><br>';

echo '</td></tr>';
echo "<tr><td id='back5' bgcolor='" . $tcm['headerbarbg'] . "'><br>";
echo "<font id='back6' face='" . $tcm['headerbarff'] . "' size='" . $tcm['headerbarfs'] . "' color='" . $tcm['headerbartc'] . "'>";
echo _AM_CSSHEADERBARTEXT . '</font><br>';

echo '</td></tr>';
echo "<tr><td id='back7' bgcolor='" . $tcm['footerbg'] . "'><br>";
echo "<font id='back8' face='" . $tcm['footerff'] . "' size='" . $tcm['footerfs'] . "' color='" . $tcm['footertc'] . "'>";
echo _AM_CSSFOOTERTEXT . '</font><br>';

echo '</td></tr>';
echo "<tr><td id='back9' bgcolor='" . $tcm['footerbarbg'] . "'><br>";
echo "<font id='back10' face='" . $tcm['footerbarff'] . "' size='" . $tcm['footerbarfs'] . "' color='" . $tcm['footerbartc'] . "'>";
echo _AM_CSSFOOTERBARTEXT . '</font><br>';

echo '</td></tr></table>';

echo '</td><td>';

echo '<b>' . _AM_CSSDEFAULTTEXT . '</b>';
echo '<br>';
echo _AM_CSSDEFAULTBG . ' &#60;defaultbg&#62;';
echo checkused('<defaultbg>');
echo "
<p><input onMouseOver=\"changeBackgroundColor('back1', this.value)\" class=\"color {hash:true,caps:false}\" name='formdefaultbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['defaultbg'] . "' /></p>
";
echo _AM_CSSDEFAULTTC . ' &#60;defaulttc&#62;';
echo checkused('<defaulttc>');
echo "
<p><input onMouseOver=\"changeTextColor('back2', this.value)\" class=\"color {hash:true,caps:false}\"  name='formdefaulttc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['defaulttc'] . "' /></p>
";
echo _AM_CSSDEFAULTFF . ' &#60;defaultff&#62;';
echo checkused('<defaultff>');
echo "
<p><input type='text' name='formdefaultff' maxlength='50' size='30'  value='" . $tcm['defaultff'] . "' /></p>
";
echo _AM_CSSDEFAULTFB . ' &#60;defaultfb&#62;';
echo checkused('<defaultfb>');
echo "
<p><input type='text' name='formdefaultfb' maxlength='50' size='30'  value='" . $tcm['defaultfb'] . "' /></p>
";
echo _AM_CSSDEFAULTFS . ' &#60;defaultfs&#62;';
echo checkused('<defaultfs>');
echo "
<p><input type='text' name='formdefaultfs' maxlength='50' size='30'  value='" . $tcm['defaultfs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSHEADERTEXT . '</b>';
echo '<br>';
echo _AM_CSSHEADERBG . ' &#60;headerbg&#62;';
echo checkused('<headerbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back3', this.value)\" type='text' name='formheaderbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['headerbg'] . "' /></p>
";
echo _AM_CSSHEADERTC . ' &#60;headertc&#62;';
echo checkused('<headertc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back4', this.value)\" type='text' name='formheadertc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['headertc'] . "' /></p>
";
echo _AM_CSSHEADERFF . ' &#60;headerff&#62;';
echo checkused('<headerff>');
echo "
<p><input type='text' name='formheaderff' maxlength='50' size='30'  value='" . $tcm['headerff'] . "' /></p>
";
echo _AM_CSSHEADERFB . ' &#60;headerfb&#62;';
echo checkused('<headerfb>');
echo "
<p><input type='text' name='formheaderfb' maxlength='50' size='30'  value='" . $tcm['headerfb'] . "' /></p>
";
echo _AM_CSSHEADERFS . ' &#60;headerfs&#62;';
echo checkused('<headerfs>');
echo "
<p><input type='text' name='formheaderfs' maxlength='50' size='30'  value='" . $tcm['headerfs'] . "' /></p>
";

echo '</td><td>';

echo '<b>' . _AM_CSSHEADERBARTEXT . '</b>';
echo '<br>';
echo _AM_CSSHEADERBARBG . ' &#60;headerbarbg&#62;';
echo checkused('<headerbarbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back5', this.value)\" type='text' name='formheaderbarbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['headerbarbg'] . "' /></p>
";
echo _AM_CSSHEADERBARTC . ' &#60;headerbartc&#62;';
echo checkused('<headerbartc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back6', this.value)\" type='text' name='formheaderbartc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['headerbartc'] . "' /></p>
";
echo _AM_CSSHEADERBARFF . ' &#60;headerbarff&#62;';
echo checkused('<headerbarff>');
echo "
<p><input type='text' name='formheaderbarff' maxlength='50' size='30'  value='" . $tcm['headerbarff'] . "' /></p>
";
echo _AM_CSSHEADERBARFB . ' &#60;headerbarfb&#62;';
echo checkused('<headerbarfb>');
echo "
<p><input type='text' name='formheaderbarfb' maxlength='50' size='30'  value='" . $tcm['headerbarfb'] . "' /></p>
";
echo _AM_CSSHEADERBARFS . ' &#60;headerbarfs&#62;';
echo checkused('<headerbarfs>');
echo "
<p><input type='text' name='formheaderbarfs' maxlength='50' size='30'  value='" . $tcm['headerbarfs'] . "' /></p>
";

echo '</td></tr><tr><td colspan=2><hr></td></tr><tr><td>';

echo '<b>' . _AM_CSSFOOTERTEXT . '</b>';
echo '<br>';
echo _AM_CSSFOOTERBG . ' &#60;footerbg&#62;';
echo checkused('<footerbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back7', this.value)\" type='text' name='formfooterbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['footerbg'] . "' /></p>
";
echo _AM_CSSFOOTERTC . ' &#60;footertc&#62;';
echo checkused('<footertc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back8', this.value)\" type='text' name='formfootertc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['footertc'] . "' /></p>
";
echo _AM_CSSFOOTERFF . ' &#60;footerff&#62;';
echo checkused('<footerff>');
echo "
<p><input type='text' name='formfooterff' maxlength='50' size='30'  value='" . $tcm['footerff'] . "' /></p>
";
echo _AM_CSSFOOTERFB . ' &#60;footerfb&#62;';
echo checkused('<footerfb>');
echo "
<p><input type='text' name='formfooterfb' maxlength='50' size='30'  value='" . $tcm['footerfb'] . "' /></p>
";
echo _AM_CSSFOOTERFS . ' &#60;footerfs&#62;';
echo checkused('<footerfs>');
echo "
<p><input type='text' name='formfooterfs' maxlength='50' size='30'  value='" . $tcm['footerfs'] . "' /></p>
";

echo '</td><td>';

echo '<b>' . _AM_CSSFOOTERBARTEXT . '</b>';
echo '<br>';
echo _AM_CSSFOOTERBARBG . ' &#60;footerbarbg&#62;';
echo checkused('<footerbarbg>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back9', this.value)\" type='text' name='formfooterbarbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['footerbarbg'] . "' /></p>
";
echo _AM_CSSFOOTERBARTC . ' &#60;footerbartc&#62;';
echo checkused('<footerbartc>');
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back10', this.value)\" type='text' name='formfooterbartc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['footerbartc'] . "' /></p>
";
echo _AM_CSSFOOTERBARFF . ' &#60;footerbarff&#62;';
echo checkused('<footerbarff>');
echo "
<p><input type='text' name='formfooterbarff' maxlength='50' size='30'  value='" . $tcm['footerbarff'] . "' /></p>
";
echo _AM_CSSFOOTERBARFB . ' &#60;footerbarfb&#62;';
echo checkused('<footerbarfb>');
echo "
<p><input type='text' name='formfooterbarfb' maxlength='50' size='30'  value='" . $tcm['footerbarfb'] . "' /></p>
";
echo _AM_CSSFOOTERBARFS . ' &#60;footerbarfs&#62;';
echo checkused('<footerbarfs>');
echo "
<p><input type='text' name='formfooterbarfs' maxlength='50' size='30'  value='" . $tcm['footerbarfs'] . "' /></p>
";

echo '</td></tr></table>';

echo '<br><b>' . _AM_CSSMODULE_CHANGEHEADER . '</b><br>';
echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='saveheader' />";
echo '</form>';
echo '</td></tr></table>';
xoops_cp_footer();
