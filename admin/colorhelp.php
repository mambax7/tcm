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
echo '
     <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
';

echo '
<script language="javascript" type="text/javascript">
   function changeBackgroundColor(objDivID, colorvalue)
   {
        document.getElementById(objDivID).style.backgroundColor = "#"  + colorvalue;
    }
    function changeTextColor(objDivID, colorvalue)
   {
      document.getElementById(objDivID).style.color = "#" + colorvalue;
    }
</script>
';

echo '<br>';
echo '<table><tr><td colspan=2>';

echo '

<style>
.box {border:1px solid #000;width:140px;height:50px;font-family:arial;font-size:8pt;padding:5px;}
.home{font-family:tahoma;font-size:10pt;color:blue;font-weight:bold;}
h1 {font-size:14pt;font-family:tahoma;display:inline;}
h2 {font-size:10pt;font-family:tahoma;display:inline;}
</style>

<table width=800><tr><td align=left><b>' . _AM_CSSCOLORHELP . '</B><br><br></td></tr><tr><td>

<table><tr><td style="background-color:#F0F8FF;" class=box><b>AliceBlue<br>#F0F8FF</b></td><td style="background-color:#FAEBD7;" class=box><b>AntiqueWhite<br>#FAEBD7</b></td><td style="background-color:#00FFFF;" class=box><b>Aqua<br>#00FFFF</b></td><td style="background-color:#7FFFD4;" class=box><b>Aquamarine<br>#7FFFD4</b></td><td style="background-color:#F0FFFF;" class=box><b>Azure<br>#F0FFFF</b></td></tr></table>

<table><tr><td style="background-color:#F5F5DC;" class=box><b>Beige<br>#F5F5DC</b></td><td style="background-color:#FFE4C4;" class=box><b>Bisque<br>#FFE4C4</b></td><td style="background-color:#000000;" class=box><b><font color=#ffffff>Black</font><br><font color=#ffffff>#000000</font></b></td><td style="background-color:#FFEBCD;" class=box><b>BlanchedAlmond<br>#FFEBCD</b></td><td style="background-color:#0000FF;" class=box><b>Blue<br>#0000FF</b></td></tr></table>

<table><tr><td style="background-color:#8A2BE2;" class=box><b>BlueViolet<br>#8A2BE2</b></td><td style="background-color:#A52A2A;" class=box><b>Brown<br>#A52A2A</b></td><td style="background-color:#DEB887;" class=box><b>BurlyWood<br>#DEB887</b></td><td style="background-color:#5F9EA0;" class=box><b>CadetBlue<br>#5F9EA0</b></td><td style="background-color:#7FFF00;" class=box><b>Chartreuse<br>#7FFF00</b></td></tr></table>

<table><tr><td style="background-color:#D2691E;" class=box><b>Chocolate<br>#D2691E</b></td><td style="background-color:#FF7F50;" class=box><b>Coral<br>#FF7F50</b></td><td style="background-color:#6495ED;" class=box><b>CornflowerBlue<br>#6495ED</b></td><td style="background-color:#FFF8DC;" class=box><b>Cornsilk<br>#FFF8DC</b></td><td style="background-color:#DC143C;" class=box><b>Crimson<br>#DC143C</b></td></tr></table>

<table><tr><td style="background-color:#00FFFF;" class=box><b>Cyan<br>#00FFFF</b></td><td style="background-color:#00008B;" class=box><b>DarkBlue<br>#00008B</b></td><td style="background-color:#008B8B;" class=box><b>DarkCyan<br>#008B8B</b></td><td style="background-color:#B8860B;" class=box><b>DarkGoldenRod<br>#B8860B</b></td><td style="background-color:#A9A9A9;" class=box><b>DarkGray<br>#A9A9A9</b></td></tr></table>

<table><tr><td style="background-color:#006400;" class=box><b>DarkGreen<br>#006400</b></td><td style="background-color:#BDB76B;" class=box><b>DarkKhaki<br>#BDB76B</b></td><td style="background-color:#8B008B;" class=box><b>DarkMagenta<br>#8B008B</b></td><td style="background-color:#556B2F;" class=box><b>DarkOliveGreen<br>#556B2F</b></td><td style="background-color:#FF8C00;" class=box><b>Darkorange<br>#FF8C00</b></td></tr></table>

<table><tr><td style="background-color:#9932CC;" class=box><b>DarkOrchid<br>#9932CC</b></td><td style="background-color:#8B0000;" class=box><b>DarkRed<br>#8B0000</b></td><td style="background-color:#E9967A;" class=box><b>DarkSalmon<br>#E9967A</b></td><td style="background-color:#8FBC8F;" class=box><b>DarkSeaGreen<br>#8FBC8F</b></td><td style="background-color:#483D8B;" class=box><b>DarkSlateBlue<br>#483D8B</b></td></tr></table>

<table><tr><td style="background-color:#2F4F4F;" class=box><b>DarkSlateGray<br>#2F4F4F</b></td><td style="background-color:#00CED1;" class=box><b>DarkTurquoise<br>#00CED1</b></td><td style="background-color:#9400D3;" class=box><b>DarkViolet<br>#9400D3</b></td><td style="background-color:#FF1493;" class=box><b>DeepPink<br>#FF1493</b></td><td style="background-color:#00BFFF;" class=box><b>DeepSkyBlue<br>#00BFFF</b></td></tr></table>

<table><tr><td style="background-color:#696969;" class=box><b>DimGray<br>#696969</b></td><td style="background-color:#1E90FF;" class=box><b>DodgerBlue<br>#1E90FF</b></td><td style="background-color:#B22222;" class=box><b>FireBrick<br>#B22222</b></td><td style="background-color:#FFFAF0;" class=box><b>FloralWhite<br>#FFFAF0</b></td><td style="background-color:#228B22;" class=box><b>ForestGreen<br>#228B22</b></td></tr></table>

<table><tr><td style="background-color:#FF00FF;" class=box><b>Fuchsia<br>#FF00FF</b></td><td style="background-color:#DCDCDC;" class=box><b>Gainsboro<br>#DCDCDC</b></td><td style="background-color:#F8F8FF;" class=box><b>GhostWhite<br>#F8F8FF</b></td><td style="background-color:#FFD700;" class=box><b>Gold<br>#FFD700</b></td><td style="background-color:#DAA520;" class=box><b>GoldenRod<br>#DAA520</b></td></tr></table>

<table><tr><td style="background-color:#808080;" class=box><b>Gray<br>#808080</b></td><td style="background-color:#008000;" class=box><b>Green<br>#008000</b></td><td style="background-color:#ADFF2F;" class=box><b>GreenYellow<br>#ADFF2F</b></td><td style="background-color:#F0FFF0;" class=box><b>HoneyDew<br>#F0FFF0</b></td><td style="background-color:#FF69B4;" class=box><b>HotPink<br>#FF69B4</b></td></tr></table>

<table><tr><td style="background-color:#CD5C5C;" class=box><b>IndianRed<br>#CD5C5C</b></td><td style="background-color:#4B0082;" class=box><b>Indigo<br>#4B0082</b></td><td style="background-color:#FFFFF0;" class=box><b>Ivory<br>#FFFFF0</b></td><td style="background-color:#F0E68C;" class=box><b>Khaki<br>#F0E68C</b></td><td style="background-color:#E6E6FA;" class=box><b>Lavender<br>#E6E6FA</b></td></tr></table>

<table><tr><td style="background-color:#FFF0F5;" class=box><b>LavenderBlush<br>#FFF0F5</b></td><td style="background-color:#7CFC00;" class=box><b>LawnGreen<br>#7CFC00</b></td><td style="background-color:#FFFACD;" class=box><b>LemonChiffon<br>#FFFACD</b></td><td style="background-color:#ADD8E6;" class=box><b>LightBlue<br>#ADD8E6</b></td><td style="background-color:#F08080;" class=box><b>LightCoral<br>#F08080</b></td></tr></table>

<table><tr><td style="background-color:#E0FFFF;" class=box><b>LightCyan<br>#E0FFFF</b></td><td style="background-color:#FAFAD2;" class=box><b>LightGoldenRodYellow<br>#FAFAD2</b></td><td style="background-color:#D3D3D3;" class=box><b>LightGrey<br>#D3D3D3</b></td><td style="background-color:#90EE90;" class=box><b>LightGreen<br>#90EE90</b></td><td style="background-color:#FFB6C1;" class=box><b>LightPink<br>#FFB6C1</b></td></tr></table>

<table><tr><td style="background-color:#FFA07A;" class=box><b>LightSalmon<br>#FFA07A</b></td><td style="background-color:#20B2AA;" class=box><b>LightSeaGreen<br>#20B2AA</b></td><td style="background-color:#87CEFA;" class=box><b>LightSkyBlue<br>#87CEFA</b></td><td style="background-color:#778899;" class=box><b>LightSlateGray<br>#778899</b></td><td style="background-color:#B0C4DE;" class=box><b>LightSteelBlue<br>#B0C4DE</b></td></tr></table>

<table><tr><td style="background-color:#FFFFE0;" class=box><b>LightYellow<br>#FFFFE0</b></td><td style="background-color:#00FF00;" class=box><b>Lime<br>#00FF00</b></td><td style="background-color:#32CD32;" class=box><b>LimeGreen<br>#32CD32</b></td><td style="background-color:#FAF0E6;" class=box><b>Linen<br>#FAF0E6</b></td><td style="background-color:#FF00FF;" class=box><b>Magenta<br>#FF00FF</b></td></tr></table>

<table><tr><td style="background-color:#800000;" class=box><b>Maroon<br>#800000</b></td><td style="background-color:#66CDAA;" class=box><b>MediumAquaMarine<br>#66CDAA</b></td><td style="background-color:#0000CD;" class=box><b>MediumBlue<br>#0000CD</b></td><td style="background-color:#BA55D3;" class=box><b>MediumOrchid<br>#BA55D3</b></td><td style="background-color:#9370D8;" class=box><b>MediumPurple<br>#9370D8</b></td></tr></table>

<table><tr><td style="background-color:#3CB371;" class=box><b>MediumSeaGreen<br>#3CB371</b></td><td style="background-color:#7B68EE;" class=box><b>MediumSlateBlue<br>#7B68EE</b></td><td style="background-color:#00FA9A;" class=box><b>MediumSpringGreen<br>#00FA9A</b></td><td style="background-color:#48D1CC;" class=box><b>MediumTurquoise<br>#48D1CC</b></td><td style="background-color:#C71585;" class=box><b>MediumVioletRed<br>#C71585</b></td></tr></table>

<table><tr><td style="background-color:#191970;" class=box><b>MidnightBlue<br>#191970</b></td><td style="background-color:#F5FFFA;" class=box><b>MintCream<br>#F5FFFA</b></td><td style="background-color:#FFE4E1;" class=box><b>MistyRose<br>#FFE4E1</b></td><td style="background-color:#FFE4B5;" class=box><b>Moccasin<br>#FFE4B5</b></td><td style="background-color:#FFDEAD;" class=box><b>NavajoWhite<br>#FFDEAD</b></td></tr></table>

<table><tr><td style="background-color:#000080;" class=box><b>Navy<br>#000080</b></td><td style="background-color:#FDF5E6;" class=box><b>OldLace<br>#FDF5E6</b></td><td style="background-color:#808000;" class=box><b>Olive<br>#808000</b></td><td style="background-color:#6B8E23;" class=box><b>OliveDrab<br>#6B8E23</b></td><td style="background-color:#FFA500;" class=box><b>Orange<br>#FFA500</b></td></tr></table>

<table><tr><td style="background-color:#FF4500;" class=box><b>OrangeRed<br>#FF4500</b></td><td style="background-color:#DA70D6;" class=box><b>Orchid<br>#DA70D6</b></td><td style="background-color:#EEE8AA;" class=box><b>PaleGoldenRod<br>#EEE8AA</b></td><td style="background-color:#98FB98;" class=box><b>PaleGreen<br>#98FB98</b></td><td style="background-color:#AFEEEE;" class=box><b>PaleTurquoise<br>#AFEEEE</b></td></tr></table>

<table><tr><td style="background-color:#D87093;" class=box><b>PaleVioletRed<br>#D87093</b></td><td style="background-color:#FFEFD5;" class=box><b>PapayaWhip<br>#FFEFD5</b></td><td style="background-color:#FFDAB9;" class=box><b>PeachPuff<br>#FFDAB9</b></td><td style="background-color:#CD853F;" class=box><b>Peru<br>#CD853F</b></td><td style="background-color:#FFC0CB;" class=box><b>Pink<br>#FFC0CB</b></td></tr></table>

<table><tr><td style="background-color:#DDA0DD;" class=box><b>Plum<br>#DDA0DD</b></td><td style="background-color:#B0E0E6;" class=box><b>PowderBlue<br>#B0E0E6</b></td><td style="background-color:#800080;" class=box><b>Purple<br>#800080</b></td><td style="background-color:#FF0000;" class=box><b>Red<br>#FF0000</b></td><td style="background-color:#BC8F8F;" class=box><b>RosyBrown<br>#BC8F8F</b></td></tr></table>

<table><tr><td style="background-color:#4169E1;" class=box><b>RoyalBlue<br>#4169E1</b></td><td style="background-color:#8B4513;" class=box><b>SaddleBrown<br>#8B4513</b></td><td style="background-color:#FA8072;" class=box><b>Salmon<br>#FA8072</b></td><td style="background-color:#F4A460;" class=box><b>SandyBrown<br>#F4A460</b></td><td style="background-color:#2E8B57;" class=box><b>SeaGreen<br>#2E8B57</b></td></tr></table>

<table><tr><td style="background-color:#FFF5EE;" class=box><b>SeaShell<br>#FFF5EE</b></td><td style="background-color:#A0522D;" class=box><b>Sienna<br>#A0522D</b></td><td style="background-color:#C0C0C0;" class=box><b>Silver<br>#C0C0C0</b></td><td style="background-color:#87CEEB;" class=box><b>SkyBlue<br>#87CEEB</b></td><td style="background-color:#6A5ACD;" class=box><b>SlateBlue<br>#6A5ACD</b></td></tr></table>

<table><tr><td style="background-color:#708090;" class=box><b>SlateGray<br>#708090</b></td><td style="background-color:#FFFAFA;" class=box><b>Snow<br>#FFFAFA</b></td><td style="background-color:#00FF7F;" class=box><b>SpringGreen<br>#00FF7F</b></td><td style="background-color:#4682B4;" class=box><b>SteelBlue<br>#4682B4</b></td><td style="background-color:#D2B48C;" class=box><b>Tan<br>#D2B48C</b></td></tr></table>

<table><tr><td style="background-color:#008080;" class=box><b>Teal<br>#008080</b></td><td style="background-color:#D8BFD8;" class=box><b>Thistle<br>#D8BFD8</b></td><td style="background-color:#FF6347;" class=box><b>Tomato<br>#FF6347</b></td><td style="background-color:#40E0D0;" class=box><b>Turquoise<br>#40E0D0</b></td><td style="background-color:#EE82EE;" class=box><b>Violet<br>#EE82EE</b></td></tr></table>

<table><tr><td style="background-color:#F5DEB3;" class=box><b>Wheat<br>#F5DEB3</b></td><td style="background-color:#FFFFFF;" class=box><b>White<br>#FFFFFF</b></td><td style="background-color:#F5F5F5;" class=box><b>WhiteSmoke<br>#F5F5F5</b></td><td style="background-color:#FFFF00;" class=box><b>Yellow<br>#FFFF00</b></td><td style="background-color:#9ACD32;" class=box><b>YellowGreen<br>#9ACD32</b></td></tr></table>

</td></tr><tr><td><br></td></tr></table> ';

//THIS TABLE OF COLORS WAS GET FROM http://www.colorpicker.com/color-chart/

echo '</td></tr></table>';

echo '</td></tr></table>';
xoops_cp_footer();
