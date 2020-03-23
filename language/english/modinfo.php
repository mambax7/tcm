<?php
// Module Info

// The name of this module
define('_CSS_MODULE_NAME', 'Theme Configuration Module');
define('_CSS_MODULE_DESC', 'Adjust theme easily.');

//menu
define('_CSS_MODULE_HOME', 'Home');
define('_CSS_MODULE_BLOCKCOLOR', 'Block Color Selector');
define('_CSS_MODULE_TABLECOLOR', 'Table Color Selector');
define('_CSS_MODULE_HELP', 'TCM Help');

// Config Items
define('_CSS_CFG_LEFTBLOCKWIDTH', 'Size of Left Column in pixels');
define('_CSS_CFG_RIGHTBLOCKWIDTH', 'Size of Right Column in pixels');
define('_CSS_CFG_LEFTBLOCKSHOW', 'Show left column?');
define('_CSS_CFG_RIGHTBLOCKSHOW', 'Show right column?');

define('_CSS_CFG_LEFTBLOCKBG', 'Background of Left Column in hex');
define('_CSS_CFG_CENTERBLOCKBG', 'Background of Center Column in hex');
define('_CSS_CFG_RIGHTBLOCKBG', 'Background of Right Column in hex');

define('_CSS_CFG_LEFTBLOCKHEADERBG', 'Background of Left Column header in hex');
define('_CSS_CFG_CENTERBLOCKHEADERBG', 'Background of Center Column header in hex');
define('_CSS_CFG_RIGHTBLOCKHEADERBG', 'Background of Right Column header in hex');

define('_CSS_CFG_LEFTBLOCKTEXTCOLOR', 'Text Color of Left Column in hex');
define('_CSS_CFG_CENTERBLOCKTEXTCOLOR', 'Text Color of Center Column in hex');
define('_CSS_CFG_RIGHTBLOCKTEXTCOLOR', 'Text Color of Right Column in hex');

define('_CSS_CFG_LEFTBLOCKHEADERTEXTCOLOR', 'Text Color of Left Column header in hex');
define('_CSS_CFG_CENTERBLOCKHEADERTEXTCOLOR', 'Text Color of Center Column header in hex');
define('_CSS_CFG_RIGHTBLOCKHEADERTEXTCOLOR', 'Text Color of Right Column header in hex');

define('_CSS_DESC_LEFTBLOCKWIDTH', 'by default 170 px');
define('_CSS_DESC_RIGHTBLOCKWIDTH', 'by default 170 px');
define('_CSS_DESC_LEFTBLOCKSHOW', 'Default visible=yes');
define('_CSS_DESC_RIGHTBLOCKSHOW', 'Default visible=yes');

define('_CSS_DESC_LEFTBLOCKBG', 'by default is ffffff');
define('_CSS_DESC_CENTERBLOCKBG', 'by default is ffffff');
define('_CSS_DESC_RIGHTBLOCKBG', 'by default is ffffff');

define('_CSS_DESC_LEFTBLOCKHEADERBG', 'by default is ddd');
define('_CSS_DESC_CENTERBLOCKHEADERBG', 'by default is ddd');
define('_CSS_DESC_RIGHTBLOCKHEADERBG', 'by default is ddd');

define('_CSS_DESC_LEFTBLOCKTEXTCOLOR', 'by default is 000000');
define('_CSS_DESC_CENTERBLOCKTEXTCOLOR', 'by default is 000000');
define('_CSS_DESC_RIGHTBLOCKTEXTCOLOR', 'by default is 000000');

define('_CSS_DESC_LEFTBLOCKHEADERTEXTCOLOR', 'by default is 2A75C5');
define('_CSS_DESC_CENTERBLOCKHEADERTEXTCOLOR', 'by default is 2A75C5');
define('_CSS_DESC_RIGHTBLOCKHEADERTEXTCOLOR', 'by default is 2A75C5');

define('_CSS_CFG_XOOPSTHEME', 'XOOPS Theme  to configure ');
define('_CSS_DESC_XOOPSTHEME', 'Foldername of the xoops theme you want to modify, please be sure it is compatible with module theme you select. Default: default-css');
define('_CSS_CFG_MODULETHEME', 'Module Theme to use');
define('_CSS_DESC_MODULETHEME', 'Filename of the xoops module theme you want to use, please be sure it is compatible with the theme you have selected. Default: default-css.php');

define('_CSS_CFG_MODULETHEMESAVE', 'Name of file to save this config options');
define('_CSS_DESC_MODULETHEMESAVE', 'Filename of the options file to save, red.php, blue.php, sample1.php, etc.');

define('_CSS_CFG_DEFAULTBACKGROUND', 'Default Text Background');
define('_CSS_DESC_DEFAULTBACKGROUND', 'by default is ffffff');
define('_CSS_CFG_DEFAULTTEXTCOLOR', 'Default Text Color in hex');
define('_CSS_DESC_DEFAULTTEXTCOLOR', 'by default is 2A75C5');
define('_CSS_CFG_DEFAULTFONTFAMILY', 'Default Font Family ');
define('_CSS_DESC_DEFAULTFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_DEFAULTFONTBOLD', 'Default Font Bold ');
define('_CSS_DESC_DEFAULTFONTBOLD', 'by default normal');
define('_CSS_CFG_DEFAULTFONTSIZE', 'Default Font Size ');
define('_CSS_DESC_DEFAULTFONTSIZE', 'by default 9');

define('_CSS_CFG_LEFTBLOCKHEADERFONTFAMILY', 'Left Column Header Font Family ');
define('_CSS_DESC_LEFTBLOCKHEADERFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_LEFTBLOCKFONTFAMILY', 'Left Column Content Font Family ');
define('_CSS_DESC_LEFTBLOCKFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_LEFTBLOCKHEADERFONTBOLD', 'Left Column Header Font Bold ');
define('_CSS_DESC_LEFTBLOCKHEADERFONTBOLD', 'by default bold');
define('_CSS_CFG_LEFTBLOCKFONTBOLD', 'Left Column Content Font Bold ');
define('_CSS_DESC_LEFTBLOCKFONTBOLD', 'by default normal');
define('_CSS_CFG_LEFTBLOCKHEADERFONTSIZE', 'Left Column Header Font Size ');
define('_CSS_DESC_LEFTBLOCKHEADERFONTSIZE', 'by default 11');
define('_CSS_CFG_LEFTBLOCKFONTSIZE', 'Left Column Content Font Size ');
define('_CSS_DESC_LEFTBLOCKFONTSIZE', 'by default 9');

define('_CSS_CFG_CENTERBLOCKHEADERFONTFAMILY', 'Center Column Header Font Family ');
define('_CSS_DESC_CENTERBLOCKHEADERFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_CENTERBLOCKFONTFAMILY', 'Center Column Content Font Family ');
define('_CSS_DESC_CENTERBLOCKFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_CENTERBLOCKHEADERFONTBOLD', 'Center Column Header Font Bold ');
define('_CSS_DESC_CENTERBLOCKHEADERFONTBOLD', 'by default bold');
define('_CSS_CFG_CENTERBLOCKFONTBOLD', 'Center Column Content Font Bold ');
define('_CSS_DESC_CENTERBLOCKFONTBOLD', 'by default normal');
define('_CSS_CFG_CENTERBLOCKHEADERFONTSIZE', 'Center Column Header Font Size ');
define('_CSS_DESC_CENTERBLOCKHEADERFONTSIZE', 'by default 11');
define('_CSS_CFG_CENTERBLOCKFONTSIZE', 'Center Column Content Font Size ');
define('_CSS_DESC_CENTERBLOCKFONTSIZE', 'by default 9');

define('_CSS_CFG_RIGHTBLOCKHEADERFONTFAMILY', 'Right Column Header Font Family ');
define('_CSS_DESC_RIGHTBLOCKHEADERFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_RIGHTBLOCKFONTFAMILY', 'Right Column Content Font Family ');
define('_CSS_DESC_RIGHTBLOCKFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_RIGHTBLOCKHEADERFONTBOLD', 'Right Column Header Font Bold ');
define('_CSS_DESC_RIGHTBLOCKHEADERFONTBOLD', 'by default bold');
define('_CSS_CFG_RIGHTBLOCKFONTBOLD', 'Right Column Content Font Bold ');
define('_CSS_DESC_RIGHTBLOCKFONTBOLD', 'by default normal');
define('_CSS_CFG_RIGHTBLOCKHEADERFONTSIZE', 'Right Column Header Font Size ');
define('_CSS_DESC_RIGHTBLOCKHEADERFONTSIZE', 'by default 11');
define('_CSS_CFG_RIGHTBLOCKFONTSIZE', 'Right Column Content Font Size ');
define('_CSS_DESC_RIGHTBLOCKFONTSIZE', 'by default 9');

define('_CSS_CFG_TABLEHEADERBACKGROUND', 'Background of Table header in hex ');
define('_CSS_DESC_TABLEHEADERBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEHEADERTEXTCOLOR', 'Text Color of Table header in hex');
define('_CSS_DESC_TABLEHEADERTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEHEADERFONTFAMILY', 'Table Header Font Family ');
define('_CSS_DESC_TABLEHEADERFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEHEADERFONTBOLD', 'Table Header Font Bold ');
define('_CSS_DESC_TABLEHEADERFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEHEADERFONTSIZE', 'Table Header Font Size ');
define('_CSS_DESC_TABLEHEADERFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEEVENBACKGROUND', 'Background of Table even in hex ');
define('_CSS_DESC_TABLEEVENBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEEVENTEXTCOLOR', 'Text Color of Table even in hex');
define('_CSS_DESC_TABLEEVENTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEEVENFONTFAMILY', 'Table even Font Family ');
define('_CSS_DESC_TABLEEVENFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEEVENFONTBOLD', 'Table even Font Bold ');
define('_CSS_DESC_TABLEEVENFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEEVENFONTSIZE', 'Table even Font Size ');
define('_CSS_DESC_TABLEEVENFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEODDBACKGROUND', 'Background of Table odd in hex ');
define('_CSS_DESC_TABLEODDBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEODDTEXTCOLOR', 'Text Color of Table odd in hex');
define('_CSS_DESC_TABLEODDTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEODDFONTFAMILY', 'Table odd Font Family ');
define('_CSS_DESC_TABLEODDFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEODDFONTBOLD', 'Table odd Font Bold ');
define('_CSS_DESC_TABLEODDFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEODDFONTSIZE', 'Table odd Font Size ');
define('_CSS_DESC_TABLEODDFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEFOOTBACKGROUND', 'Background of Table foot in hex ');
define('_CSS_DESC_TABLEFOOTBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEFOOTTEXTCOLOR', 'Text Color of Table foot in hex');
define('_CSS_DESC_TABLEFOOTTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEFOOTFONTFAMILY', 'Table foot Font Family ');
define('_CSS_DESC_TABLEFOOTFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEFOOTFONTBOLD', 'Table foot Font Bold ');
define('_CSS_DESC_TABLEFOOTFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEFOOTFONTSIZE', 'Table foot Font Size ');
define('_CSS_DESC_TABLEFOOTFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEROWEVENBACKGROUND', 'Background of Table row even in hex ');
define('_CSS_DESC_TABLEROWEVENBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEROWEVENTEXTCOLOR', 'Text Color of Table row even in hex');
define('_CSS_DESC_TABLEROWEVENTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEROWEVENFONTFAMILY', 'Table row even Font Family ');
define('_CSS_DESC_TABLEROWEVENFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEROWEVENFONTBOLD', 'Table row even Font Bold ');
define('_CSS_DESC_TABLEROWEVENFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEROWEVENFONTSIZE', 'Table row even Font Size ');
define('_CSS_DESC_TABLEROWEVENFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEROWODDBACKGROUND', 'Background of Table row odd in hex ');
define('_CSS_DESC_TABLEROWODDBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEROWODDTEXTCOLOR', 'Text Color of Table row odd in hex');
define('_CSS_DESC_TABLEROWODDTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEROWODDFONTFAMILY', 'Table row odd Font Family ');
define('_CSS_DESC_TABLEROWODDFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEROWODDFONTBOLD', 'Table row odd Font Bold ');
define('_CSS_DESC_TABLEROWODDFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEROWODDFONTSIZE', 'Table row odd Font Size ');
define('_CSS_DESC_TABLEROWODDFONTSIZE', 'by default 11');

define('_CSS_CFG_TABLEROWFOOTBACKGROUND', 'Background of Table row foot in hex ');
define('_CSS_DESC_TABLEROWFOOTBACKGROUND', 'by default is c2cdd6');
define('_CSS_CFG_TABLEROWFOOTTEXTCOLOR', 'Text Color of Table row foot in hex');
define('_CSS_DESC_TABLEROWFOOTTEXTCOLOR', 'by default is ffffff');
define('_CSS_CFG_TABLEROWFOOTFONTFAMILY', 'Table row foot Font Family ');
define('_CSS_DESC_TABLEROWFOOTFONTFAMILY', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_TABLEROWFOOTFONTBOLD', 'Table row foot Font Bold ');
define('_CSS_DESC_TABLEROWFOOTFONTBOLD', 'by default bold');
define('_CSS_CFG_TABLEROWFOOTFONTSIZE', 'Table row foot Font Size ');
define('_CSS_DESC_TABLEROWFOOTFONTSIZE', 'by default 11');

define('_CSS_CFG_HEADERTC', 'Background of Header in hex ');
define('_CSS_DESC_HEADERTC', 'by default is c2cdd6');
define('_CSS_CFG_HEADERBG', 'Text Color of Header in hex');
define('_CSS_DESC_HEADERBG', 'by default is ffffff');
define('_CSS_CFG_HEADERFF', 'Header Font Family ');
define('_CSS_DESC_HEADERFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_HEADERFB', 'Header Font Bold ');
define('_CSS_DESC_HEADERFB', 'by default bold');
define('_CSS_CFG_HEADERFS', 'Header Font Size ');
define('_CSS_DESC_HEADERFS', 'by default 11');

define('_CSS_CFG_HEADERBARTC', 'Background of Header Bar in hex ');
define('_CSS_DESC_HEADERBARTC', 'by default is c2cdd6');
define('_CSS_CFG_HEADERBARBG', 'Text Color of Header Bar in hex');
define('_CSS_DESC_HEADERBARBG', 'by default is ffffff');
define('_CSS_CFG_HEADERBARFF', 'Header Bar Font Family ');
define('_CSS_DESC_HEADERBARFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_HEADERBARFB', 'Header Bar Font Bold ');
define('_CSS_DESC_HEADERBARFB', 'by default bold');
define('_CSS_CFG_HEADERBARFS', 'Header Bar Font Size ');
define('_CSS_DESC_HEADERBARFS', 'by default 11');

define('_CSS_CFG_FOOTERTC', 'Background of Footer in hex ');
define('_CSS_DESC_FOOTERTC', 'by default is c2cdd6');
define('_CSS_CFG_FOOTERBG', 'Text Color of Footer in hex');
define('_CSS_DESC_FOOTERBG', 'by default is ffffff');
define('_CSS_CFG_FOOTERFF', 'Footer Font Family ');
define('_CSS_DESC_FOOTERFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_FOOTERFB', 'Footer Font Bold ');
define('_CSS_DESC_FOOTERFB', 'by default bold');
define('_CSS_CFG_FOOTERFS', 'Footer Font Size ');
define('_CSS_DESC_FOOTERFS', 'by default 11');

define('_CSS_CFG_FOOTERBARTC', 'Background of Footer Bar in hex ');
define('_CSS_DESC_FOOTERBARTC', 'by default is c2cdd6');
define('_CSS_CFG_FOOTERBARBG', 'Text Color of Footer Bar in hex');
define('_CSS_DESC_FOOTERBARBG', 'by default is ffffff');
define('_CSS_CFG_FOOTERBARFF', 'Footer Bar Font Family ');
define('_CSS_DESC_FOOTERBARFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_FOOTERBARFB', 'Footer Bar Font Bold ');
define('_CSS_DESC_FOOTERBARFB', 'by default bold');
define('_CSS_CFG_FOOTERBARFS', 'Footer Bar Font Size ');
define('_CSS_DESC_FOOTERBARFS', 'by default 11');

define('_CSS_CFG_ATC', 'Background of A tag in hex ');
define('_CSS_DESC_ATC', 'by default is c2cdd6');
define('_CSS_CFG_ABG', 'Text Color of A tag in hex');
define('_CSS_DESC_ABG', 'by default is ffffff');
define('_CSS_CFG_AFF', 'A tag Font Family ');
define('_CSS_DESC_AFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AFB', 'A tag Font Bold ');
define('_CSS_DESC_AFB', 'by default bold');
define('_CSS_CFG_AFS', 'A tag Font Size ');
define('_CSS_DESC_AFS', 'by default 11');

define('_CSS_CFG_AHOVERTC', 'Background of A hover tag in hex ');
define('_CSS_DESC_AHOVERTC', 'by default is c2cdd6');
define('_CSS_CFG_AHOVERBG', 'Text Color of A hover tag in hex');
define('_CSS_DESC_AHOVERBG', 'by default is ffffff');
define('_CSS_CFG_AHOVERFF', 'A hover tag Font Family ');
define('_CSS_DESC_AHOVERFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AHOVERFB', 'A hover tag Font Bold ');
define('_CSS_DESC_AHOVERFB', 'by default bold');
define('_CSS_CFG_AHOVERFS', 'A hover tag Font Size ');
define('_CSS_DESC_AHOVERFS', 'by default 11');

define('_CSS_CFG_AMMTC', 'Background of A Main Menu tag in hex ');
define('_CSS_DESC_AMMTC', 'by default is c2cdd6');
define('_CSS_CFG_AMMBG', 'Text Color of A Main Menu tag in hex');
define('_CSS_DESC_AMMBG', 'by default is ffffff');
define('_CSS_CFG_AMMFF', 'A Main Menu tag Font Family ');
define('_CSS_DESC_AMMFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AMMFB', 'A Main Menu tag Font Bold ');
define('_CSS_DESC_AMMFB', 'by default bold');
define('_CSS_CFG_AMMFS', 'A Main Menu tag Font Size ');
define('_CSS_DESC_AMMFS', 'by default 11');

define('_CSS_CFG_AMMHOVERTC', 'Background of A Hover Main Menu tag in hex ');
define('_CSS_DESC_AMMHOVERTC', 'by default is c2cdd6');
define('_CSS_CFG_AMMHOVERBG', 'Text Color of A Hover Main Menu tag in hex');
define('_CSS_DESC_AMMHOVERBG', 'by default is ffffff');
define('_CSS_CFG_AMMHOVERFF', 'A Hover Main Menu tag Font Family ');
define('_CSS_DESC_AMMHOVERFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AMMHOVERFB', 'A Hover Main Menu tag Font Bold ');
define('_CSS_DESC_AMMHOVERFB', 'by default bold');
define('_CSS_CFG_AMMHOVERFS', 'A Hover Main Menu tag Font Size ');
define('_CSS_DESC_AMMHOVERFS', 'by default 11');

define('_CSS_CFG_AMMCURRENTTC', 'Background of A Current Main Menu tag in hex ');
define('_CSS_DESC_AMMCURRENTTC', 'by default is c2cdd6');
define('_CSS_CFG_AMMCURRENTBG', 'Text Color of A Current Main Menu tag in hex');
define('_CSS_DESC_AMMCURRENTBG', 'by default is ffffff');
define('_CSS_CFG_AMMCURRENTFF', 'A Current Main Menu tag Font Family ');
define('_CSS_DESC_AMMCURRENTFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AMMCURRENTFB', 'A Current Main Menu tag Font Bold ');
define('_CSS_DESC_AMMCURRENTFB', 'by default bold');
define('_CSS_CFG_AMMCURRENTFS', 'A Current Main Menu tag Font Size ');
define('_CSS_DESC_AMMCURRENTFS', 'by default 11');

define('_CSS_CFG_AUMTC', 'Background of A User Menu tag in hex ');
define('_CSS_DESC_AUMTC', 'by default is c2cdd6');
define('_CSS_CFG_AUMBG', 'Text Color of A User Menu tag in hex');
define('_CSS_DESC_AUMBG', 'by default is ffffff');
define('_CSS_CFG_AUMFF', 'A User Menu tag Font Family ');
define('_CSS_DESC_AUMFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AUMFB', 'A User Menu tag Font Bold ');
define('_CSS_DESC_AUMFB', 'by default bold');
define('_CSS_CFG_AUMFS', 'A User Menu tag Font Size ');
define('_CSS_DESC_AUMFS', 'by default 11');

define('_CSS_CFG_AUMHOVERTC', 'Background of A Hover User Menu tag in hex ');
define('_CSS_DESC_AUMHOVERTC', 'by default is c2cdd6');
define('_CSS_CFG_AUMHOVERBG', 'Text Color of A Hover User Menu tag in hex');
define('_CSS_DESC_AUMHOVERBG', 'by default is ffffff');
define('_CSS_CFG_AUMHOVERFF', 'A Hover User Menu tag Font Family ');
define('_CSS_DESC_AUMHOVERFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AUMHOVERFB', 'A Hover User Menu tag Font Bold ');
define('_CSS_DESC_AUMHOVERFB', 'by default bold');
define('_CSS_CFG_AUMHOVERFS', 'A Hover User Menu tag Font Size ');
define('_CSS_DESC_AUMHOVERFS', 'by default 11');

define('_CSS_CFG_AUMHIGHLIGHTTC', 'Background of A Highlight User Menu tag in hex ');
define('_CSS_DESC_AUMHIGHLIGHTTC', 'by default is c2cdd6');
define('_CSS_CFG_AUMHIGHLIGHTBG', 'Text Color of A Highlight User Menu tag in hex');
define('_CSS_DESC_AUMHIGHLIGHTBG', 'by default is ffffff');
define('_CSS_CFG_AUMHIGHLIGHTFF', 'A Highlight User Menu tag Font Family ');
define('_CSS_DESC_AUMHIGHLIGHTFF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_AUMHIGHLIGHTFB', 'A Highlight User Menu tag Font Bold ');
define('_CSS_DESC_AUMHIGHLIGHTFB', 'by default bold');
define('_CSS_CFG_AUMHIGHLIGHTFS', 'A Highlight User Menu tag Font Size ');
define('_CSS_DESC_AUMHIGHLIGHTFS', 'by default 11');

define('_CSS_CFG_LEFTBLOCKSITEBG', 'Left Side Site background ');
define('_CSS_DESC_LEFTBLOCKSITEBG', 'by default is ffffff');
define('_CSS_CFG_CENTERBLOCKSITEBG', 'Center Side Site background ');
define('_CSS_DESC_CENTERBLOCKSITEBG', 'by default is ffffff');
define('_CSS_CFG_RIGHTBLOCKSITEBG', 'Right Side Site background ');
define('_CSS_DESC_RIGHTBLOCKSITEBG', 'by default is ffffff');

define('_CSS_MODULE_HEADERFOOTER', 'Header and Footer');
define('_CSS_MODULE_TAGS', 'Tags');
define('_CSS_MODULE_BASIC', 'Basic Options');

define('_CSS_CFG_H1TC', 'Background of H1 tag in hex ');
define('_CSS_DESC_H1TC', 'by default is c2cdd6');
define('_CSS_CFG_H1BG', 'Text Color of H1 in hex');
define('_CSS_DESC_H1BG', 'by default is ffffff');
define('_CSS_CFG_H1FF', 'H1 Font Family ');
define('_CSS_DESC_H1FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H1FB', 'H1 Font Bold ');
define('_CSS_DESC_H1FB', 'by default bold');
define('_CSS_CFG_H1FS', 'H1 Font Size ');
define('_CSS_DESC_H1FS', 'by default 11');

define('_CSS_CFG_H2TC', 'Background of H2 tag in hex ');
define('_CSS_DESC_H2TC', 'by default is c2cdd6');
define('_CSS_CFG_H2BG', 'Text Color of H2 in hex');
define('_CSS_DESC_H2BG', 'by default is ffffff');
define('_CSS_CFG_H2FF', 'H2 Font Family ');
define('_CSS_DESC_H2FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H2FB', 'H2 Font Bold ');
define('_CSS_DESC_H2FB', 'by default bold');
define('_CSS_CFG_H2FS', 'H2 Font Size ');
define('_CSS_DESC_H2FS', 'by default 11');

define('_CSS_CFG_H3TC', 'Background of H3 tag in hex ');
define('_CSS_DESC_H3TC', 'by default is c2cdd6');
define('_CSS_CFG_H3BG', 'Text Color of H3 in hex');
define('_CSS_DESC_H3BG', 'by default is ffffff');
define('_CSS_CFG_H3FF', 'H3 Font Family ');
define('_CSS_DESC_H3FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H3FB', 'H3 Font Bold ');
define('_CSS_DESC_H3FB', 'by default bold');
define('_CSS_CFG_H3FS', 'H3 Font Size ');
define('_CSS_DESC_H3FS', 'by default 11');

define('_CSS_CFG_H4TC', 'Background of H4 tag in hex ');
define('_CSS_DESC_H4TC', 'by default is c2cdd6');
define('_CSS_CFG_H4BG', 'Text Color of H4 in hex');
define('_CSS_DESC_H4BG', 'by default is ffffff');
define('_CSS_CFG_H4FF', 'H4 Font Family ');
define('_CSS_DESC_H4FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H4FB', 'H4 Font Bold ');
define('_CSS_DESC_H4FB', 'by default bold');
define('_CSS_CFG_H4FS', 'H4 Font Size ');
define('_CSS_DESC_H4FS', 'by default 11');

define('_CSS_CFG_H5TC', 'Background of H5 tag in hex ');
define('_CSS_DESC_H5TC', 'by default is c2cdd6');
define('_CSS_CFG_H5BG', 'Text Color of H5 in hex');
define('_CSS_DESC_H5BG', 'by default is ffffff');
define('_CSS_CFG_H5FF', 'H5 Font Family ');
define('_CSS_DESC_H5FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H5FB', 'H5 Font Bold ');
define('_CSS_DESC_H5FB', 'by default bold');
define('_CSS_CFG_H5FS', 'H5 Font Size ');
define('_CSS_DESC_H5FS', 'by default 11');

define('_CSS_CFG_H6TC', 'Background of H6 tag in hex ');
define('_CSS_DESC_H6TC', 'by default is c2cdd6');
define('_CSS_CFG_H6BG', 'Text Color of H6 in hex');
define('_CSS_DESC_H6BG', 'by default is ffffff');
define('_CSS_CFG_H6FF', 'H6 Font Family ');
define('_CSS_DESC_H6FF', 'by default is Verdana, Arial, Helvetica, sans-serif');
define('_CSS_CFG_H6FB', 'H6 Font Bold ');
define('_CSS_DESC_H6FB', 'by default bold');
define('_CSS_CFG_H6FS', 'H6 Font Size ');
define('_CSS_DESC_H6FS', 'by default 11');

define('_CSS_MODULE_FTP', 'FTP');
define('_CSS_CFG_FTPUSE', 'Use FTP for file modification.');
define('_CSS_DESC_FTPUSE', 'with it is not required to set permision to file to be writable.');
define('_CSS_CFG_FTPSERVER', 'FTP SERVER URL ');
define('_CSS_DESC_FTPSERVER', 'default localhost or 127.0.0.1');
define('_CSS_CFG_FTPUSERNAME', 'FTP Username ');
define('_CSS_DESC_FTPUSERNAME', 'It is provided by server');
define('_CSS_CFG_FTPPASSWORD', 'FTP Password ');
//define( "_CSS_DESC_FTPUSERNAME" , "It is provided by server") ;
define('_CSS_CFG_FTPDEBUG', 'FTP Debug ');
define('_CSS_DESC_FTPDEBUG', '0 or 1 to show debug');

define('_CSS_MODULE_COLORS', 'Show color samples');

//0.2
define('_CSS_MODULE_H1_H2', 'H1 - H2');

//0.3

//Menu
define('_MI_TCM_MENU_HOME', 'Home');
define('_MI_TCM_MENU_01', 'Admin');
define('_MI_TCM_MENU_ABOUT', 'About');


//Config
define('MI_TCM_EDITOR_ADMIN', 'Editor: Admin');
define('MI_TCM_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_TCM_EDITOR_USER', 'Editor: User');
define('MI_TCM_EDITOR_USER_DESC', 'Select the Editor to use by the User');

//Help
define('_MI_TCM_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_TCM_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('_MI_TCM_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_TCM_OVERVIEW', 'Overview');

//define('_MI_TCM_HELP_DIR', __DIR__);

//help multi-page
define('_MI_TCM_DISCLAIMER', 'Disclaimer');
define('_MI_TCM_LICENSE', 'License');
define('_MI_TCM_SUPPORT', 'Support');
