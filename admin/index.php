<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license      GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package
 * @since
 * @author       XOOPS Development Team
 * @version      $Id $
 */
require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
include_once __DIR__ . '/admin_header.php';

xoops_cp_header();

$indexAdmin = new ModuleAdmin();

echo $indexAdmin->addNavigation('index.php');

$indexAdmin->addItemButton(_AM_TCM_SAVE_CONFIGURATION, 'main.php?op=generatefile', 'add');
$indexAdmin->addItemButton(_AM_TCM_GENERATE_THEME, 'main.php?op=generate', 'add');
$indexAdmin->addItemButton(_AM_TCM_LOAD_OPTIONS, 'main.php?op=loadfile&filetoload=default2.php', 'add');
echo $indexAdmin->renderButton('left', '');

echo $indexAdmin->renderIndex();

include __DIR__ . '/admin_footer.php';
