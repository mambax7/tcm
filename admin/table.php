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

echo "<table>";
echo "<tr><td id='back1' bgcolor='" . $tcm['tablehbg'] . "'>";
echo "<font id='back2' face='" . $tcm['tablehff'] . "' size='" . $tcm['tablehfs'] . "' color='" . $tcm['tablehtc'] . "'>";
echo _AM_CSSTABLEHEADER . "</font>";
echo "</td></tr>";
echo "<tr><td id='back3' bgcolor='" . $tcm['tableebg'] . "'>";
echo "<font id='back4' face='" . $tcm['tableeff'] . "' size='" . $tcm['tableefs'] . "' color='" . $tcm['tableetc'] . "'>";
echo _AM_CSSTABLEHEADEREVEN . "</font>";
echo "</td></tr>";
echo "<tr><td id='back5' bgcolor='" . $tcm['tableobg'] . "'>";
echo "<font id='back6' face='" . $tcm['tableoff'] . "' size='" . $tcm['tableofs'] . "' color='" . $tcm['tableotc'] . "'>";
echo _AM_CSSTABLEHEADERODD . "</font>";
echo "</td></tr>";
echo "<tr><td id='back7' bgcolor='" . $tcm['tablefbg'] . "'>";
echo "<font id='back8' face='" . $tcm['tablefff'] . "' size='" . $tcm['tableffs'] . "' color='" . $tcm['tableftc'] . "'>";
echo _AM_CSSTABLEHEADERFOOTER . "</font>";
echo "</td></tr>";
echo "<tr><td id='back9' bgcolor='" . $tcm['tablerebg'] . "'>";
echo "<font id='back10' face='" . $tcm['tablereff'] . "' size='" . $tcm['tablerefs'] . "' color='" . $tcm['tableretc'] . "'>";
echo _AM_CSSTABLEROWEVEN . "</font>";
echo "</td></tr>";
echo "<tr><td id='back11' bgcolor='" . $tcm['tablerobg'] . "'>";
echo "<font id='back12' face='" . $tcm['tableroff'] . "' size='" . $tcm['tablerofs'] . "' color='" . $tcm['tablerotc'] . "'>";
echo _AM_CSSTABLEROWODD . "</font>";
echo "</td></tr>";
echo "<tr><td id='back13' bgcolor='" . $tcm['tablerfbg'] . "'>";
echo "<font id='back14' face='" . $tcm['tablerfff'] . "' size='" . $tcm['tablerffs'] . "' color='" . $tcm['tablerftc'] . "'>";
echo _AM_CSSTABLEROWFOOTER . "</font>";
echo "</td></tr></table>";
echo "</td><td>";

echo "<b>" . _AM_CSSTABLEHEADER . "</b>";
echo "<br>";
echo _AM_CSSTABLEHBG  .  " &#60;tablehbg&#62;";
echo checkused("<tablehbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back1', this.value)\" type='text' name='formtablehbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablehbg'] . "' /></p>
";
echo _AM_CSSTABLEHTC  .  " &#60;tablehtc&#62;";
echo checkused("<tablehtc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back2', this.value)\" type='text' name='formtablehtc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablehtc'] . "' /></p>
";
echo _AM_CSSTABLEHFF  .  " &#60;tablehff&#62;";
echo checkused("<tablehff>");
echo "
<p><input type='text' name='formtablehff' maxlength='50' size='30'  value='" . $tcm['tablehff'] . "' /></p>
";
echo _AM_CSSTABLEHFB  .  " &#60;tablehfb&#62;";
echo checkused("<tablehfb>");
echo "
<p><input type='text' name='formtablehfb' maxlength='50' size='30'  value='" . $tcm['tablehfb'] . "' /></p>
";
echo _AM_CSSTABLEHFS  .  " &#60;tablehfs&#62;";
echo checkused("<tablehfs>");
echo "
<p><input type='text' name='formtablehfs' maxlength='50' size='30'  value='" . $tcm['tablehfs'] . "' /></p>
";

echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";

echo "<b>" ._AM_CSSTABLEHEADEREVEN . "</b>";
echo "<br>";
echo _AM_CSSTABLEHEBG  .  " &#60;tableebg&#62;";
echo checkused("<tableebg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back3', this.value)\" type='text' name='formtableebg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableebg'] . "' /></p>
";
echo _AM_CSSTABLEHETC .  " &#60;tableetc&#62;";
echo checkused("<tableetc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back4', this.value)\" type='text' name='formtableetc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableetc'] . "' /></p>
";
echo _AM_CSSTABLEHEFF .  " &#60;tableeff&#62;";
echo checkused("<tableeff>");
echo "
<p><input type='text' name='formtableeff' maxlength='50' size='30'  value='" . $tcm['tableeff'] . "' /></p>
";
echo _AM_CSSTABLEHEFB .  " &#60;tableefb&#62;";
echo checkused("<tableefb>");
echo "
<p><input type='text' name='formtableefb' maxlength='50' size='30'  value='" . $tcm['tableefb'] . "' /></p>
";
echo _AM_CSSTABLEHEFS .  " &#60;tableefs&#62;";
echo checkused("<tableefs>");
echo "
<p><input type='text' name='formtableefs' maxlength='50' size='30'  value='" . $tcm['tableefs'] . "' /></p>
";

echo "</td><td>";

echo "<b>" ._AM_CSSTABLEHEADERODD . "</b>";
echo "<br>";
echo _AM_CSSTABLEHOBG  .  " &#60;tableobg&#62;";
echo checkused("<tableobg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back5', this.value)\" type='text' name='formtableobg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableobg'] . "' /></p>
";
echo _AM_CSSTABLEHOTC .  " &#60;tableotc&#62;";
echo checkused("<tableotc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back6', this.value)\"  type='text' name='formtableotc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableotc'] . "' /></p>
";
echo _AM_CSSTABLEHOFF .  " &#60;tableoff&#62;";
echo checkused("<tableoff>");
echo "
<p><input type='text' name='formtableoff' maxlength='50' size='30'  value='" . $tcm['tableoff'] . "' /></p>
";
echo _AM_CSSTABLEHOFB .  " &#60;tableofb&#62;";
echo checkused("<tableofb>");
echo "
<p><input type='text' name='formtableofb' maxlength='50' size='30'  value='" . $tcm['tableofb'] . "' /></p>
";
echo _AM_CSSTABLEHOFS .  " &#60;tableofs&#62;";
echo checkused("<tableofs>");
echo "
<p><input type='text' name='formtableofs' maxlength='50' size='30'  value='" . $tcm['tableofs'] . "' /></p>
";

echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";

echo "<b>" ._AM_CSSTABLEHEADERFOOTER . "</b>";
echo "<br>";
echo _AM_CSSTABLEHFBG .  " &#60;tablefbg&#62;";
echo checkused("<tablefbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back7', this.value)\"  type='text' name='formtablefbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablefbg'] . "' /></p>
";
echo _AM_CSSTABLEHFTC .  " &#60;tableftc&#62;";
echo checkused("<tableftc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back8', this.value)\" type='text' name='formtableftc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableftc'] . "' /></p>
";
echo _AM_CSSTABLEHFFF .  " &#60;tablefff&#62;";
echo checkused("<tablefff>");
echo "
<p><input type='text' name='formtablefff' maxlength='50' size='30'  value='" . $tcm['tablefff'] . "' /></p>
";
echo _AM_CSSTABLEHFFB  .  " &#60;tableffb&#62;";
echo checkused("<tableffb>");
echo "
<p><input type='text' name='formtableffb' maxlength='50' size='30'  value='" . $tcm['tableffb'] . "' /></p>
";
echo _AM_CSSTABLEHFFS  .  " &#60;tableffs&#62;";
echo checkused("<tableffs>");
echo "
<p><input type='text' name='formtableffs' maxlength='50' size='30'  value='" . $tcm['tableffs'] . "' /></p>
";

echo "</td><td>";

echo "<b>" ._AM_CSSTABLEROWEVEN . "</b>";
echo "<br>";
echo _AM_CSSTABLEREBG  .  " &#60;tablerebg&#62;";
echo checkused("<tablerebg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back9', this.value)\" type='text' name='formtablerebg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablerebg'] . "' /></p>
";
echo _AM_CSSTABLERETC .  " &#60;tableretc&#62;";
echo checkused("<tableretc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back10', this.value)\" type='text' name='formtableretc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tableretc'] . "' /></p>
";
echo _AM_CSSTABLEREFF .  " &#60;tablereff&#62;";
echo checkused("<tablereff>");
echo "
<p><input type='text' name='formtablereff' maxlength='50' size='30'  value='" . $tcm['tablereff'] . "' /></p>
";
echo _AM_CSSTABLEREFB  .  " &#60;tablerefb&#62;";
echo checkused("<tablerefb>");
echo "
<p><input type='text' name='formtablerefb' maxlength='50' size='30'  value='" . $tcm['tablerefb'] . "' /></p>
";
echo _AM_CSSTABLEREFS .  " &#60;tablerefs&#62;";
echo checkused("<tablerefs>");
echo "
<p><input type='text' name='formtablerefs' maxlength='50' size='30'  value='" . $tcm['tablerefs'] . "' /></p>
";
echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";

echo "<b>" ._AM_CSSTABLEROWODD . "</b>";
echo "<br>";
echo _AM_CSSTABLEROBG  .  " &#60;tablerobg&#62;";
echo checkused("<tablerobg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back11', this.value)\" type='text' name='formtablerobg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablerobg'] . "' /></p>
";
echo _AM_CSSTABLEROTC  .  " &#60;tablerotc&#62;";
echo checkused("<tablerotc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back12', this.value)\"  type='text' name='formtablerotc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablerotc'] . "' /></p>
";
echo _AM_CSSTABLEROFF .  " &#60;tableroff&#62;";
echo checkused("<tableroff>");
echo "
<p><input type='text' name='formtableroff' maxlength='50' size='30'  value='" . $tcm['tableroff'] . "' /></p>
";
echo _AM_CSSTABLEROFB .  " &#60;tablerofb&#62;";
echo checkused("<tablerofb>");
echo "
<p><input type='text' name='formtablerofb' maxlength='50' size='30'  value='" . $tcm['tablerofb'] . "' /></p>
";
echo _AM_CSSTABLEROFS .  " &#60;tablerofs&#62;";
echo checkused("<tablerofs>");
echo "
<p><input type='text' name='formtablerofs' maxlength='50' size='30'  value='" . $tcm['tablerofs'] . "' /></p>
";

echo "</td><td>";
echo "<b>" ._AM_CSSTABLEROWFOOTER . "</b>";
echo "<br>";
echo _AM_CSSTABLERFBG  .  " &#60;tablerfbg&#62;";
echo checkused("<tablerfbg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back13', this.value)\"  type='text' name='formtablerfbg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablerfbg'] . "' /></p>
";
echo _AM_CSSTABLERFTC .  " &#60;tablerftc&#62;";
echo checkused("<tablerftc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back14', this.value)\"  type='text' name='formtablerftc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['tablerftc'] . "' /></p>
";
echo _AM_CSSTABLERFFF .  " &#60;tablerfff&#62;";
echo checkused("<tablerfff>");
echo "
<p><input type='text' name='formtablerfff' maxlength='50' size='30'  value='" . $tcm['tablerfff'] . "' /></p>
";
echo _AM_CSSTABLERFFB .  " &#60;tablerffb&#62;";
echo checkused("<tablerffb>");
echo "
<p><input type='text' name='formtablerffb' maxlength='50' size='30'  value='" . $tcm['tablerffb'] . "' /></p>
";
echo _AM_CSSTABLERFFS .  " &#60;tablerffs&#62;";
echo checkused("<tablerffs>");
echo "
<p><input type='text' name='formtablerffs' maxlength='50' size='30'  value='" . $tcm['tablerffs'] .  "' /></p>
";

echo "</td></tr></table>";

echo "<br><b>" . _AM_CSSMODULE_CHANGECOLOURS . "</b><br>";
echo "<input type='submit' value='"._YES."' /><input type='hidden' name='op' value='savetable' />";
echo "</form>";
echo "</td></tr></table>";
xoops_cp_footer();
?>
