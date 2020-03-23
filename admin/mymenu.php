<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;
global $xoopsDB, $moduleid, $tcm;

echo "<div align=left><table><tr><td>";
echo "<a href='index.php'>" . _AM_CSSMODULE_INDEX . "</a>";
echo "<br>";
echo "<a href='ftp.php'>" . _AM_CSSMODULE_FTP . "</a>";
echo "<br>";
echo "<a href='basic.php'>" . _AM_CSSMODULE_BASIC . "</a>";
echo "<br>";
echo "<a href='headfooter.php'>" . _AM_CSSMODULE_HEADFOOTER . "</a>";
echo "<br>";
echo "<a href='tags.php'>" . _AM_CSSMODULE_TAGS . "</a>";
echo "<br>";
echo "<a href='h.php'>" . _AM_CSSMODULE_H . "</a>";
echo "<br>";
echo "<a href='block.php'>" . _AM_CSSMODULE_COLOURSELECTOR . "</a>";
echo "<br>";
echo "<a href='colorhelp.php'>" . _AM_CSSMODULE_COLOURHELP . "</a>";
echo "<br>";
echo "<a href='table.php'>" . _AM_CSSMODULE_TABLECOLOURSELECTOR . "</a>";
echo "<br>";
echo "<a href='" .XOOPS_URL . "/modules/system/admin.php?fct=preferences&op=showmod&mod=" . $moduleid. "'>" . _AM_CSSMODULE_EDITPREFERENCES ."</a>";
echo "<br>";
echo "<a href='index.php?op=generatefile'>" .  _AM_CSSMODULEFILE_GENERATE  . "</a>";
echo "<br>";
echo "<a href='index.php?op=generate'>" . _AM_CSSMODULE_GENERATE . "</a>";
echo "<br>";
echo "</td><td>";

?>