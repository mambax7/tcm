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

echo '<br><hr><br>';
echo "<table><tr><td id='back1' bgcolor='" . $tcm['leftblocksitebg'] . "'>";
echo _AM_CSSMODULE_LEFTBLOCKSITE;
echo "</td></tr><tr><td id='back2' bgcolor='" . $tcm['centerblocksitebg'] . "'>";
echo _AM_CSSMODULE_CENTERBLOCKSITE;
echo "</td></tr><tr><td id='back3' bgcolor='" . $tcm['rightblocksitebg'] . "'>";
echo _AM_CSSMODULE_RIGHTBLOCKSITE;
echo '</td></tr></table>';

echo '</td></tr><tr><td>';

echo '<b>' . _AM_CSSMODULE_BASICOPTIONS . '</b><br><br>';

echo "
<p><input onMouseOver=\"changeBackgroundColor('back1', this.value)\" class=\"color {hash:true,caps:false}\" name='formleftblocksitebg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['leftblocksitebg'] . "' />
";
echo _AM_CSSMODULE_LEFTBLOCKSITE . ' &#60;leftblocksitebg&#62;';
echo checkused('<leftblocksitebg>');

echo '</p><br>';
echo "
<p><input onMouseOver=\"changeBackgroundColor('back2', this.value)\" class=\"color {hash:true,caps:false}\" name='formcenterblocksitebg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['centerblocksitebg'] . "' />
";
echo _AM_CSSMODULE_CENTERBLOCKSITE . ' &#60;centerblocksitebg&#62;';
echo checkused('<centerblocksitebg>');
echo '</p><br>';

echo "
<p><input onMouseOver=\"changeBackgroundColor('back3', this.value)\" class=\"color {hash:true,caps:false}\" name='formrightblocksitebg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['rightblocksitebg'] . "' />
";
echo _AM_CSSMODULE_RIGHTBLOCKSITE . ' &#60;rightblocksitebg&#62;';
echo checkused('<rightblocksitebg>');

echo '<br><br><hr><br>' . _AM_CSSMODULE_XOOPSTHEME;
echo "
<p><input type='text' name='formxoopstheme' maxlength='50' size='30'  value='" . $tcm['cssxoopstheme'] . "' /></p>
";
echo _AM_CSSMODULE_XOOPSTHEMESAVE;
echo "
<p><input type='text' name='formxoopsthemesave' maxlength='50' size='30'  value='" . $tcm['cssxoopsthemesave'] . "' /></p>
";

echo _AM_CSSMODULE_LEFTBLOCKWIDTH . ' &#60;leftblockwidth&#62;';
echo checkused('<leftblockwidth>');
echo "
<p><input type='text' name='formleftblockwidth' maxlength='50' size='30'  value='" . $tcm['leftblockwidth'] . "' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKWIDTH . ' &#60;rightblockwidth&#62;';
echo checkused('<rightblockwidth>');
echo "
<p><input type='text' name='formrightblockwidth' maxlength='50' size='30'  value='" . $tcm['rightblockwidth'] . "' /></p>
";

echo '</td></tr></table>';
echo '<br><br><hr><br>';
echo '<br><b>' . _AM_CSSMODULE_CHANGEBASIC . '</b><br>';
echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='savebasic' />";
echo '</form>';
echo '</td></tr></table>';
xoops_cp_footer();
