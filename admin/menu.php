<?php

include dirname(__DIR__) . '/preloads/autoloader.php';

$moduleDirName = basename(dirname(__DIR__));
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$helper = \XoopsModules\Tcm\Helper::getInstance();
$helper->loadLanguage('common');
//$helper->loadLanguage('feedback');

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
if (is_object($helper->getModule())) {
    //    $pathModIcon32 = $helper->getModule()->getInfo('modicons32');
    $pathModIcon32 = $helper->url($helper->getModule()->getInfo('modicons32'));
}

$adminmenu[] = [
    'icon'  => 'icons/home.gif',
    'image' => 'icons/home.gif',
    'title' => _CSS_MODULE_HOME,
    'link'  => 'admin/index.php',
];

$adminmenu[] = [
    'icon'  => $pathIcon32 . '/category.png',
    'image' => $pathIcon32 . '/category.png',
    'title' => _CSS_MODULE_HOME,
    'link'  => 'admin/main.php',
];

$adminmenu[] = [
    'icon'  => 'icons/basic.gif',
    'image' => 'icons/basic.gif',
    'title' => _CSS_MODULE_BASIC,
    'link'  => 'admin/basic.php',
];

$adminmenu[] = [
    'icon'  => 'icons/head.gif',
    'image' => 'icons/head.gif',
    'title' => _CSS_MODULE_HEADERFOOTER,
    'link'  => 'admin/headfooter.php',
];

$adminmenu[] = [
    'icon'  => 'icons/colors.gif',
    'image' => 'icons/colors.gif',
    'title' => _CSS_MODULE_COLORS,
    'link'  => 'admin/colorhelp.php',
];

$adminmenu[] = [
    'icon'  => 'icons/tags.gif',
    'image' => 'icons/tags.gif',
    'title' => _CSS_MODULE_TAGS,
    'link'  => 'admin/tags.php',
];

$adminmenu[] = [
    'icon'  => 'icons/tags.gif',
    'image' => 'icons/tags.gif',
    'title' => _CSS_MODULE_H1_H2,
    'link'  => 'admin/h.php',
];

$adminmenu[] = [
    'icon'  => 'icons/block.gif',
    'image' => 'icons/block.gif',
    'title' => _CSS_MODULE_BLOCKCOLOR,
    'link'  => 'admin/block.php',
];

$adminmenu[] = [
    'icon'  => 'icons/table.gif',
    'image' => 'icons/table.gif',
    'title' => _CSS_MODULE_TABLECOLOR,
    'link'  => 'admin/table.php',
];

$adminmenu[] = [
    'icon'  => 'icons/ftp.gif',
    'image' => 'icons/ftp.gif',
    'title' => _CSS_MODULE_FTP,
    'link'  => 'admin/ftp.php',
];

$adminmenu[] = [
    'title' => _MI_TCM_MENU_ABOUT,
    'link' => 'admin/about.php',
    'icon' => $pathIcon32 . '/about.png',
];
