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
echo "<table><tr><td colspan=2>";



echo "<table>";
echo "<tr><td id='back1' bgcolor='" . $tcm['h1bg']  . "'>";
echo "<font id='back2' face='" . $tcm['h1ff']  . "' size='" . $tcm['h1fs'] . "' color='" . $tcm['h1tc'] . "'>";
echo _AM_CSSH1TEXT . "</font>";
echo "</td></tr>";
echo "<tr><td id='back3' bgcolor='" . $tcm['h2bg']  . "'>";
echo "<font id='back4' face='" . $tcm['h2ff']  . "' size='" . $tcm['h2fs'] . "' color='" . $tcm['h2tc'] . "'>";
echo _AM_CSSH2TEXT . "</font>";

echo "</td></tr>";
echo "<tr><td id='back5' bgcolor='" . $tcm['h3bg']  . "'>";
echo "<font id='back6' face='" . $tcm['h3ff']  . "' size='" . $tcm['h3fs'] . "' color='" . $tcm['h3tc'] . "'>";
echo _AM_CSSH3TEXT . "</font>";

echo "</td></tr>";
echo "<tr><td id='back7' bgcolor='" . $tcm['h4bg']  . "'>";
echo "<font id='back8' face='" . $tcm['h4ff']  . "' size='" . $tcm['h4fs'] . "' color='" . $tcm['h4tc'] . "'>";
echo _AM_CSSH4TEXT . "</font>";

echo "</td></tr>";
echo "<tr><td id='back9' bgcolor='" . $tcm['h5bg']  . "'>";
echo "<font id='back10' face='" . $tcm['h5ff']  . "' size='" . $tcm['h5fs'] . "' color='" . $tcm['h5tc'] . "'>";
echo _AM_CSSH5TEXT . "</font>";

echo "</td></tr>";
echo "<tr><td id='back11' bgcolor='" . $tcm['h6bg']  . "'>";
echo "<font id='back12' face='" . $tcm['h6ff']  . "' size='" . $tcm['h6fs'] . "' color='" . $tcm['h6tc'] . "'>";
echo _AM_CSSH6TEXT . "</font>";


echo "</td></tr></table>";

echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";


echo "<b>" ._AM_CSSH1TEXT . "</b>";
echo "<br>";
echo _AM_CSSH1BG . " &#60;h1bg&#62;";
echo checkused("<h1bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back1', this.value)\" type='text' name='formh1bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h1bg'] ."' /></p>
";
echo _AM_CSSH1TC . " &#60;h1tc&#62;";
echo checkused("<h1tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back2', this.value)\" type='text' name='formh1tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h1tc'] ."' /></p>
";
echo _AM_CSSH1FF . " &#60;h1ff&#62;";
echo checkused("<h1ff>");
echo "
<p><input type='text' name='formh1ff' maxlength='50' size='30'  value='" . $tcm['h1ff'] ."' /></p>
";
echo _AM_CSSH1FB . " &#60;h1fb&#62;";
echo checkused("<h1fb>");
echo "
<p><input type='text' name='formh1fb' maxlength='50' size='30'  value='" . $tcm['h1fb'] ."' /></p>
";
echo _AM_CSSH1FS . " &#60;h1fs&#62;";
echo checkused("<h1fs>");
echo "
<p><input type='text' name='formh1fs' maxlength='50' size='30'  value='" . $tcm['h1fs'] ."' /></p>
";



echo "</td><td>";



echo "<b>" ._AM_CSSH2TEXT . "</b>";
echo "<br>";
echo _AM_CSSH2BG . " &#60;h2bg&#62;";
echo checkused("<h2bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back3', this.value)\" type='text' name='formh2bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h2bg'] ."' /></p>
";
echo _AM_CSSH2TC . " &#60;h2tc&#62;";
echo checkused("<h2tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back4', this.value)\" type='text' name='formh2tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h2tc'] ."' /></p>
";
echo _AM_CSSH2FF . " &#60;h2ff&#62;";
echo checkused("<h2ff>");
echo "
<p><input type='text' name='formh2ff' maxlength='50' size='30'  value='" . $tcm['h2ff'] ."' /></p>
";
echo _AM_CSSH2FB . " &#60;h2fb&#62;";
echo checkused("<h2fb>");
echo "
<p><input type='text' name='formh2fb' maxlength='50' size='30'  value='" . $tcm['h2fb'] ."' /></p>
";
echo _AM_CSSH2FS . " &#60;h2fs&#62;";
echo checkused("<h2fs>");
echo "
<p><input type='text' name='formh2fs' maxlength='50' size='30'  value='" . $tcm['h2fs'] ."' /></p>
";

echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";





echo "<b>" ._AM_CSSH3TEXT . "</b>";
echo "<br>";
echo _AM_CSSH3BG . " &#60;h3bg&#62;";
echo checkused("<h3bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back5', this.value)\" type='text' name='formh3bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h3bg'] ."' /></p>
";
echo _AM_CSSH3TC . " &#60;h3tc&#62;";
echo checkused("<h3tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back6', this.value)\" type='text' name='formh3tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h3tc'] ."' /></p>
";
echo _AM_CSSH3FF . " &#60;h3ff&#62;";
echo checkused("<h3ff>");
echo "
<p><input type='text' name='formh3ff' maxlength='50' size='30'  value='" . $tcm['h3ff'] ."' /></p>
";
echo _AM_CSSH3FB . " &#60;h3fb&#62;";
echo checkused("<h3fb>");
echo "
<p><input type='text' name='formh3fb' maxlength='50' size='30'  value='" . $tcm['h3fb'] ."' /></p>
";
echo _AM_CSSH3FS . " &#60;h3fs&#62;";
echo checkused("<h3fs>");
echo "
<p><input type='text' name='formh3fs' maxlength='50' size='30'  value='" . $tcm['h3fs'] ."' /></p>
";

echo "</td><td>";


echo "<b>" ._AM_CSSH4TEXT . "</b>";
echo "<br>";
echo _AM_CSSH4BG . " &#60;h4bg&#62;";
echo checkused("<h4bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back7', this.value)\" type='text' name='formh4bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h4bg'] ."' /></p>
";
echo _AM_CSSH4TC . " &#60;h4tc&#62;";
echo checkused("<h4tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back8', this.value)\" type='text' name='formh4tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h4tc'] ."' /></p>
";
echo _AM_CSSH4FF . " &#60;h4ff&#62;";
echo checkused("<h4ff>");
echo "
<p><input type='text' name='formh4ff' maxlength='50' size='30'  value='" . $tcm['h4ff'] ."' /></p>
";
echo _AM_CSSH4FB . " &#60;h4fb&#62;";
echo checkused("<h4fb>");
echo "
<p><input type='text' name='formh4fb' maxlength='50' size='30'  value='" . $tcm['h4fb'] ."' /></p>
";
echo _AM_CSSH4FS . " &#60;h4fs&#62;";
echo checkused("<h4fs>");
echo "
<p><input type='text' name='formh4fs' maxlength='50' size='30'  value='" . $tcm['h4fs'] ."' /></p>
";

echo "</td></tr><tr><td colspan=2><hr></td></tr><tr><td>";


echo "<b>" ._AM_CSSH5TEXT . "</b>";
echo "<br>";
echo _AM_CSSH5BG . " &#60;h5bg&#62;";
echo checkused("<h5bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back9', this.value)\" type='text' name='formh5bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h5bg'] ."' /></p>
";
echo _AM_CSSH5TC . " &#60;h5tc&#62;";
echo checkused("<h5tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back10', this.value)\" type='text' name='formh5tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h5tc'] ."' /></p>
";
echo _AM_CSSH5FF . " &#60;h5ff&#62;";
echo checkused("<h5ff>");
echo "
<p><input type='text' name='formh5ff' maxlength='50' size='30'  value='" . $tcm['h5ff'] ."' /></p>
";
echo _AM_CSSH5FB . " &#60;h5fb&#62;";
echo checkused("<h5fb>");
echo "
<p><input type='text' name='formh5fb' maxlength='50' size='30'  value='" . $tcm['h5fb'] ."' /></p>
";
echo _AM_CSSH5FS . " &#60;h5fs&#62;";
echo checkused("<h5fs>");
echo "
<p><input type='text' name='formh5fs' maxlength='50' size='30'  value='" . $tcm['h5fs'] ."' /></p>
";

echo "</td><td>";


echo "<b>" ._AM_CSSH6TEXT . "</b>";
echo "<br>";
echo _AM_CSSH6BG . " &#60;h6bg&#62;";
echo checkused("<h6bg>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeBackgroundColor('back11', this.value)\" type='text' name='formh6bg' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h6bg'] ."' /></p>
";
echo _AM_CSSH6TC . " &#60;h6tc&#62;";
echo checkused("<h6tc>");
echo "
<p><input class=\"color {hash:true,caps:false}\" onMouseOver=\"changeTextColor('back12', this.value)\" type='text' name='formh6tc' maxlength='7' size='7' id='colorpickerField1' value='" . $tcm['h6tc'] ."' /></p>
";
echo _AM_CSSH6FF . " &#60;h6ff&#62;";
echo checkused("<h6ff>");
echo "
<p><input type='text' name='formh6ff' maxlength='50' size='30'  value='" . $tcm['h6ff'] ."' /></p>
";
echo _AM_CSSH6FB . " &#60;h6fb&#62;";
echo checkused("<h6fb>");
echo "
<p><input type='text' name='formh6fb' maxlength='50' size='30'  value='" . $tcm['h6fb'] ."' /></p>
";
echo _AM_CSSH6FS . " &#60;h6fs&#62;";
echo checkused("<h6fs>");
echo "
<p><input type='text' name='formh6fs' maxlength='50' size='30'  value='" . $tcm['h6fs'] ."' /></p>
";

echo "</td></tr></table>";

echo "<br><b>" . _AM_CSSMODULE_CHANGEH . "</b><br>";
echo "<input type='submit' value='"._YES."' /><input type='hidden' name='op' value='savehtag' />";
echo "</form>";
echo "</td></tr></table>";
xoops_cp_footer();
?>
