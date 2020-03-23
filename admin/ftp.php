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

echo "<br><br><form action='index.php' method='post'>";
echo '<table><tr><td colspan=2>';

echo '<b>' . _AM_CSSFTPTEXT . '</b>';
echo '<br>';

echo _AM_FTPSERVER . '';
echo "
<p><input type='text' name='formftpserver' maxlength='50' size='30'  value='" . $tcm['ftpserver'] . "' /></p>
";
echo _AM_FTPUSERNAME . '';
echo "
<p><input type='text' name='formftpusername' maxlength='50' size='30'  value='" . $tcm['ftpusername'] . "' /></p>
";
echo _AM_FTPPASSWORD . '';
echo "
<p><input type='password' name='formftppassword' maxlength='50' size='30'  value='" . $tcm['ftppassword'] . "' /></p>
";
echo _AM_FTPDEBUG . '';
echo "
<p><input type='text' name='formftpdebug' maxlength='50' size='30'  value='" . $tcm['ftpdebug'] . "' /></p>
";
echo _AM_FTPUSE . '';
echo "
<p><input type='text' name='formftpuse' maxlength='50' size='30'  value='" . $tcm['ftpuse'] . "' /></p>
";

echo '</td></tr></table>';

echo '<br><b>' . _AM_CSSMODULE_CHANGEFTP . '</b><br>';
echo "<input type='submit' value='" . _YES . "' /><input type='hidden' name='op' value='saveftp' />";
echo '</form>';
echo '</td></tr></table>';
xoops_cp_footer();
