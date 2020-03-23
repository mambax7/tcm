<?php


include "admin_header.php" ;
require_once XOOPS_ROOT_PATH . "/include/xoopscodes.php" ;
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/class/xoopstree.php" ;
include_once XOOPS_ROOT_PATH."/class/xoopscomments.php" ;

global $xoopsDB, $moduleid, $tcm;

include_once XOOPS_ROOT_PATH."/class/xoopsobject.php";


include_once "share.php" ;
loadtcmvalue();
loadcompletecss("themes/" .$tcm['cssxoopstheme']);

// Initializations
$myts =& MyTextSanitizer::getInstance();


//
// Form Part
//
xoops_cp_header() ;
include( './mymenu.php' ) ;

// check $xoopsModule
if( ! is_object( $xoopsModule ) ) redirect_header( "$mod_url/" , 1 , _NOPERM ) ;

if (!empty($_GET['op'])) {
	$op = $_GET['op'];
}
if ( isset($_POST) ) {
	foreach ( $_POST as $k => $v ) {
		$$k = $v;
	}
}

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
		document.getElementById(objDivID).style.backgroundColor =   colorvalue;
	}       
	function changeTextColor(objDivID, colorvalue)
   {
      document.getElementById(objDivID).style.color =   colorvalue;
	} 
</script>
';

echo "<br><br><form action='index.php' method='post'>";
echo "<table><tr><td>";



echo "<table><tr><td id='back1' bgcolor='" . $tcm['leftblockhbg'] . "'>";
echo "<font id='back2' face='" . $tcm['leftblockhff'] . "' size='" . $tcm['leftblockhfs'] . "' color='" . $tcm['leftblockhtc'] . "'>";
echo _AM_CSSMODULE_LEFTBLOCK . "</font>";
echo "</td></tr><tr><td id='back3' bgcolor='" . $tcm['leftblockbg'] . "'>";
echo "<font id='back4' face='" . $tcm['leftblockff'] . "' size='" . $tcm['leftblockfs'] . "' color='" . $tcm['leftblocktc'] . "'>";
echo _AM_CSSMODULE_LEFTBLOCK . "</font>";
echo "</td></tr></table>";
echo "<br><hr><br>";

echo "<b>" ._AM_CSSMODULE_LEFTBLOCK . "</b>";
echo "<br>";
echo _AM_CSSMODULE_LEFTBLOCKHBG  . " &#60;leftblockhbg&#62;";
echo checkused("<leftblockhbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back1', this.value)\" type='text' name='formleftblockhbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['leftblockhbg'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKHTC  . " &#60;leftblockhtc&#62;";
echo checkused("<leftblockhtc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back2', this.value)\" type='text' name='formleftblockhtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['leftblockhtc'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKHFF   . " &#60;leftblockhff&#62;";
echo checkused("<leftblockhff>");
echo "
<p><input type='text' name='formleftblockhff' maxlength='50' size='30'  value='" . $tcm['leftblockhff'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKHFB   . " &#60;leftblockhfb&#62;";
echo checkused("<leftblockhfb>");
echo "
<p><input type='text' name='formleftblockhfb' maxlength='50' size='30'  value='" . $tcm['leftblockhfb'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKHFS   . " &#60;leftblockhfs&#62;";
echo checkused("<leftblockhfs>");
echo "
<p><input type='text' name='formleftblockhfs' maxlength='50' size='30'  value='" . $tcm['leftblockhfs'] ."' /></p>
";
echo "<br><hr><br>";

echo _AM_CSSMODULE_LEFTBLOCKBG   . " &#60;leftblockbg&#62;";
echo checkused("<leftblockbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back3', this.value)\" type='text' name='formleftblockbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['leftblockbg'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKTC . " &#60;leftblocktc&#62;";
echo checkused("<leftblocktc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back4', this.value)\" type='text' name='formleftblocktc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['leftblocktc'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKFF . " &#60;leftblockff&#62;";
echo checkused("<leftblockff>");
echo "
<p><input type='text' name='formleftblockff' maxlength='50' size='30'  value='" . $tcm['leftblockff'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKFB . " &#60;leftblockfb&#62;";
echo checkused("<leftblockfb>");
echo "
<p><input type='text' name='formleftblockfb' maxlength='50' size='30'  value='" . $tcm['leftblockfb'] ."' /></p>
";
echo _AM_CSSMODULE_LEFTBLOCKFS  . " &#60;leftblockfs&#62;";
echo checkused("<leftblockfs>");
echo "
<p><input type='text' name='formleftblockfs' maxlength='50' size='30'  value='" . $tcm['leftblockfs'] ."' /></p>
";


echo "</td><td>";


echo "<table><tr><td id='back5' bgcolor='" . $tcm['centerblockhbg'] . "'>";
echo "<font id='back6' face='" . $tcm['centerblockheaderff'] . "' size='" . $tcm['centerblockhfs'] . "' color='" . $tcm['centerblockhtc'] . "'>";
echo _AM_CSSMODULE_CENTERBLOCK . "</font>";
echo "</td></tr><tr><td id='back7' bgcolor='" . $tcm['centerblockbg'] . "'>";
echo "<font id='back8' face='" . $tcm['centerblockff'] . "' size='" . $tcm['centerblockfs'] . "' color='" . $tcm['centerblocktc'] . "'>";
echo _AM_CSSMODULE_CENTERBLOCK . "</font>";
echo "</td></tr></table>";
echo "<br><hr><br>";


echo "<b>" . _AM_CSSMODULE_CENTERBLOCK  . "</b>";
echo "<br>";
echo _AM_CSSMODULE_CENTERBLOCKHBG  . " &#60;centerblockhbg&#62;";
echo checkused("<centerblockhbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back5', this.value)\" type='text' name='formcenterblockhbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['centerblockhbg'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKHTC   . " &#60;centerblockhtc&#62;";
echo checkused("<centerblockhtc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back6', this.value)\" type='text' name='formcenterblockhtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['centerblockhtc'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKHFF   . " &#60;centerblockhff&#62;";
echo checkused("<centerblockhff>");
echo "
<p><input type='text' name='formcenterblockhff' maxlength='50' size='30'  value='" . $tcm['centerblockhff'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKHFB   . " &#60;centerblockhfb&#62;";
echo checkused("<centerblockhfb>");
echo "
<p><input type='text' name='formcenterblockhfb' maxlength='50' size='30'  value='" . $tcm['centerblockhfb'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKHFS   . " &#60;centerblockhfs&#62;";
echo checkused("<centerblockhfs>");
echo "
<p><input type='text' name='formcenterblockhfs' maxlength='50' size='30'  value='" . $tcm['centerblockhfs'] ."' /></p>
";
echo "<br><hr><br>";

echo _AM_CSSMODULE_CENTERBLOCKBG   . " &#60;centerblockbg&#62;";
echo checkused("<centerblockbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back7', this.value)\" type='text' name='formcenterblockbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['centerblockbg'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKTC  . " &#60;centerblocktc&#62;";
echo checkused("<centerblocktc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back8', this.value)\" type='text' name='formcenterblocktc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['centerblocktc'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKFF  . " &#60;centerblockff&#62;";
echo checkused("<centerblockff>");
echo "
<p><input type='text' name='formcenterblockff' maxlength='50' size='30'  value='" . $tcm['centerblockff'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKFB  . " &#60;centerblockfb&#62;";
echo checkused("<centerblockfb>");
echo "
<p><input type='text' name='formcenterblockfb' maxlength='50' size='30'  value='" . $tcm['centerblockfb'] ."' /></p>
";
echo _AM_CSSMODULE_CENTERBLOCKFS  . " &#60;centerblockfs&#62;";
echo checkused("<centerblockfs>");
echo "
<p><input type='text' name='formcenterblockfs' maxlength='50' size='30'  value='" . $tcm['centerblockfs'] ."' /></p>
";
echo "</td><td>";


echo "<table><tr><td id='back9' bgcolor='" . $tcm['rightblockhbg'] . "'>";
echo "<font id='back10' face='" . $tcm['rightblockhff'] . "' size='" . $tcm['rightblockhfs'] . "' color='" . $tcm['rightblockhtc'] . "'>";
echo _AM_CSSMODULE_RIGHTBLOCK . "</font>";
echo "</td></tr><tr><td id='back11' bgcolor='" . $tcm['rightblockbg'] . "'>";
echo "<font id='back12' face='" . $tcm['rightblockff'] . "' size='" . $tcm['rightblockfs'] . "' color='" . $tcm['rightblocktc'] . "'>";
echo _AM_CSSMODULE_RIGHTBLOCK . "</font>";
echo "</td></tr></table>";
echo "<br><hr><br>";



echo "<b>" . _AM_CSSMODULE_RIGHTBLOCK . "</b>";
echo "<br>";
echo _AM_CSSMODULE_RIGHTBLOCKHBG  . " &#60;rightblockhbg&#62;";
echo checkused("<rightblockhbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back9', this.value)\" type='text' name='formrightblockhbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['rightblockhbg'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKHTC  . " &#60;rightblockhtc&#62;";
echo checkused("<rightblockhtc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back10', this.value)\" type='text' name='formrightblockhtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['rightblockhtc'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKHFF  . " &#60;rightblockhff&#62;";
echo checkused("<rightblockhff>");
echo "
<p><input type='text' name='formrightblockhff' maxlength='50' size='30'  value='" . $tcm['rightblockhrff'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKHFB  . " &#60;rightblockhfb&#62;";
echo checkused("<rightblockhfb>");
echo "
<p><input type='text' name='formrightblockhfb' maxlength='50' size='30'  value='" . $tcm['rightblockhfb'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKHFS  . " &#60;rightblockhfs&#62;";
echo checkused("<rightblockhfs>");
echo "
<p><input type='text' name='formrightblockhfs' maxlength='50' size='30'  value='" . $tcm['rightblockhfs'] ."' /></p>
";
echo "<br><hr><br>";

echo _AM_CSSMODULE_RIGHTBLOCKBG   . " &#60;rightblockbg&#62;";
echo checkused("<rightblockbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back11', this.value)\" type='text' name='formrightblockbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['rightblockbg'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKTC . " &#60;rightblocktc&#62;";
echo checkused("<rightblocktc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back12', this.value)\" type='text' name='formrightblocktc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['rightblocktc'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKFF . " &#60;rightblockff&#62;";
echo checkused("<rightblockff>");
echo "
<p><input type='text' name='formrightblockff' maxlength='50' size='30'  value='" . $tcm['rightblockff'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKFB  . " &#60;rightblockfb&#62;";
echo checkused("<rightblockfb>");
echo "
<p><input type='text' name='formrightblockfb' maxlength='50' size='30'  value='" . $tcm['rightblockfb'] ."' /></p>
";
echo _AM_CSSMODULE_RIGHTBLOCKFS  . " &#60;rightblockfs&#62;";
echo checkused("<rightblockfs>");
echo "
<p><input type='text' name='formrightblockfs' maxlength='50' size='30'  value='" . $tcm['rightblockfs'] ."' /></p>
";

echo "</td></tr></table>";

echo "<br><b>" . _AM_CSSMODULE_CHANGECOLOURS . "</b><br>";
echo "<input type='submit' value='"._YES."' /><input type='hidden' name='op' value='savecolour' />";
echo "</form>";
echo "</td></tr></table>";
xoops_cp_footer();
?>
