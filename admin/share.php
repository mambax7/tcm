<?php
/*
bg=background
tc=textcolor
ff=fontfamily
fb=font bold normal etc.
fs=font size
h=header
tcm=theme configuration module
*/

/**
 * @param $dir
 * @return bool
 */
function ftp_is_dir($dir)
{
    global $ftp_connect;
    if (ftp_chdir($ftp_connect, $dir)) {
        ftp_chdir($ftp_connect, '..');

        return true;
    }

    return false;
}

/**
 * @param $path
 * @param $filename
 * @param $localfile
 * @param $ftp_server
 * @param $ftp_user_name
 * @param $ftp_user_pass
 * @param $ftpdebug
 * @return bool
 */
function uploadbyftp($path, $filename, $localfile, $ftp_server, $ftp_user_name, $ftp_user_pass, $ftpdebug)
{
    // open some file for reading

    $file = $localfile;
    $fp   = fopen($file, 'rb');

    // set up basic connection
    $conn_id = ftp_connect($ftp_server);

    if (!$conn_id) {
        die("Couldn't connect to $ftp_server !");
    }

    // login with username and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    if ((!$conn_id) || (!$login_result)) {
        die('FTP connection has failed !');
    }

    // try to change the directory to somedir
    if (ftp_chdir($conn_id, $path)) {
        // try to delete $file
        if (ftp_delete($conn_id, $path . $file)) {
            if ($ftpdebug) {
                echo "$file deleted successful \n<br>";
            }
        } else {
            if ($ftpdebug) {
                echo "$file deleted error \n<br>";
            }
        }
        // try to upload $file
        if (ftp_fput($conn_id, $path . $filename, $fp, FTP_ASCII)) {
            unlink($localfile);

            return true;
        }
        unlink($localfile);

        return false;
    }
    if ($ftpdebug) {
        echo 'Could not set directory by ftp. ' . $path . "\n<br>";
    }
    //check automatically where is the start to correct path (cpanel ...)
    if ($ftpdebug) {
        echo 'CPANEL PATCH' . '<br>';
    }
    //patch cpanel
    $pos  = mb_strpos($path, '/public_html', 1);
    $rest = mb_substr($path, $pos);
    echo $rest . '<br>';
    $path = $rest;
    if (ftp_chdir($conn_id, $path)) {
        // try to delete $file
        if (ftp_delete($conn_id, $path . $file)) {
            if ($ftpdebug) {
                echo "$file deleted successful \n<br>";
            }
        } else {
            if ($ftpdebug) {
                echo "$file deleted error \n<br>";
            }
        }
        // try to upload $file
        if (ftp_fput($conn_id, $path . $filename, $fp, FTP_ASCII)) {
            unlink($localfile);

            return true;
        }
        unlink($localfile);

        return false;
    }

    // close the connection and the file handler
    ftp_close($conn_id);
    fclose($fp);
}

/**
 * @param $cssoption
 * @param $cssvalue
 */
function updateCssValue($cssoption, $cssvalue)
{
    global $xoopsDB;
    $myts = MyTextSanitizer::getInstance();
    $sql  = 'UPDATE ' . $xoopsDB->prefix('config') . " SET conf_value = '" . $cssvalue . "' WHERE conf_name = '" . $cssoption . "'";
    if (!$result = $xoopsDB->query($sql)) {
        echo '<br>Error Updating ' . $cssption;
    }
}

/**
 * @param $profilesdir
 */
function listprofiles($profilesdir)
{
    if ($handle = opendir($profilesdir)) {
        /* This is the correct way to loop over the directory. */
        while (false !== ($file = readdir($handle))) {
            if ('.' !== $file && '..' !== $file) {
                echo "<a href='index.php?op=loadfile&filetoload=" . $file . "'>" . $file . "</a><br>\n";
            }
        }
        closedir($handle);
    }
}

function loadTcmValue()
{
    global $xoopsDB, $moduleid, $tcm;
    include_once XOOPS_ROOT_PATH . '/kernel/object.php';
    $myts = MyTextSanitizer::getInstance();

    $moduleHandler            = xoops_getHandler('module');
    $module                   = $moduleHandler->getByDirname('tcm');
    $configHandler            = xoops_getHandler('config');
    $moduleConfig             = &$configHandler->getConfigsByCat(0, $module->getVar('mid'));
    $tcm['cssxoopstheme']     = $moduleConfig['css_xoopstheme'];
    $tcm['cssxoopsthemesave'] = $moduleConfig['css_xoopsthemesave'];
    $tcm['defaultbg']         = $moduleConfig['css_defaultbg'];
    $tcm['defaulttc']         = $moduleConfig['css_defaulttc'];
    $tcm['defaultff']         = $moduleConfig['css_defaultff'];
    $tcm['defaultfb']         = $moduleConfig['css_defaultfb'];
    $tcm['defaultfs']         = $moduleConfig['css_defaultfs'];
    $tcm['leftblockwidth']    = $moduleConfig['css_leftblockwidth'];
    $tcm['rightblockwidth']   = $moduleConfig['css_rightblockwidth'];
    $tcm['leftblocksitebg']   = $moduleConfig['css_leftblocksitebg'];
    $tcm['centerblocksitebg'] = $moduleConfig['css_centerblocksitebg'];
    $tcm['rightblocksitebg']  = $moduleConfig['css_rightblocksitebg'];
    $tcm['headerbg']          = $moduleConfig['css_headerbg'];
    $tcm['headertc']          = $moduleConfig['css_headertc'];
    $tcm['headerff']          = $moduleConfig['css_headerff'];
    $tcm['headerfb']          = $moduleConfig['css_headerfb'];
    $tcm['headerfs']          = $moduleConfig['css_headerfs'];
    $tcm['headerbarbg']       = $moduleConfig['css_headerbarbg'];
    $tcm['headerbartc']       = $moduleConfig['css_headerbartc'];
    $tcm['headerbarff']       = $moduleConfig['css_headerbarff'];
    $tcm['headerbarfb']       = $moduleConfig['css_headerbarfb'];
    $tcm['headerbarfs']       = $moduleConfig['css_headerbarfs'];
    $tcm['footerbg']          = $moduleConfig['css_footerbg'];
    $tcm['footertc']          = $moduleConfig['css_footertc'];
    $tcm['footerff']          = $moduleConfig['css_footerff'];
    $tcm['footerfb']          = $moduleConfig['css_footerfb'];
    $tcm['footerfs']          = $moduleConfig['css_footerfs'];
    $tcm['footerbarbg']       = $moduleConfig['css_footerbarbg'];
    $tcm['footerbartc']       = $moduleConfig['css_footerbartc'];
    $tcm['footerbarff']       = $moduleConfig['css_footerbarff'];
    $tcm['footerbarfb']       = $moduleConfig['css_footerbarfb'];
    $tcm['footerbarfs']       = $moduleConfig['css_footerbarfs'];
    $tcm['leftblockhbg']      = $moduleConfig['css_leftblockhbg'];
    $tcm['leftblockhtc']      = $moduleConfig['css_leftblockhtc'];
    $tcm['leftblockhff']      = $moduleConfig['css_leftblockhff'];
    $tcm['leftblockhfb']      = $moduleConfig['css_leftblockhfb'];
    $tcm['leftblockhfs']      = $moduleConfig['css_leftblockhfs'];
    $tcm['centerblockhbg']    = $moduleConfig['css_centerblockhbg'];
    $tcm['centerblockhtc']    = $moduleConfig['css_centerblockhtc'];
    $tcm['centerblockhff']    = $moduleConfig['css_centerblockhff'];
    $tcm['centerblockhfb']    = $moduleConfig['css_centerblockhfb'];
    $tcm['centerblockhfs']    = $moduleConfig['css_centerblockhfs'];
    $tcm['rightblockhbg']     = $moduleConfig['css_rightblockhbg'];
    $tcm['rightblockhtc']     = $moduleConfig['css_rightblockhtc'];
    $tcm['rightblockhff']     = $moduleConfig['css_rightblockhff'];
    $tcm['rightblockhfb']     = $moduleConfig['css_rightblockhfb'];
    $tcm['rightblockhfs']     = $moduleConfig['css_rightblockhfs'];
    $tcm['leftblockbg']       = $moduleConfig['css_leftblockbg'];
    $tcm['leftblocktc']       = $moduleConfig['css_leftblocktc'];
    $tcm['leftblockff']       = $moduleConfig['css_leftblockff'];
    $tcm['leftblockfb']       = $moduleConfig['css_leftblockfb'];
    $tcm['leftblockfs']       = $moduleConfig['css_leftblockfs'];
    $tcm['centerblockbg']     = $moduleConfig['css_centerblockbg'];
    $tcm['centerblocktc']     = $moduleConfig['css_centerblocktc'];
    $tcm['centerblockff']     = $moduleConfig['css_centerblockff'];
    $tcm['centerblockfb']     = $moduleConfig['css_centerblockfb'];
    $tcm['centerblockfs']     = $moduleConfig['css_centerblockfs'];
    $tcm['rightblockbg']      = $moduleConfig['css_rightblockbg'];
    $tcm['rightblocktc']      = $moduleConfig['css_rightblocktc'];
    $tcm['rightblockff']      = $moduleConfig['css_rightblockff'];
    $tcm['rightblockfb']      = $moduleConfig['css_rightblockfb'];
    $tcm['rightblockfs']      = $moduleConfig['css_rightblockfs'];
    $tcm['tablehbg']          = $moduleConfig['css_tablehbg'];
    $tcm['tablehtc']          = $moduleConfig['css_tablehtc'];
    $tcm['tablehff']          = $moduleConfig['css_tablehff'];
    $tcm['tablehfb']          = $moduleConfig['css_tablehfb'];
    $tcm['tablehfs']          = $moduleConfig['css_tablehfs'];
    $tcm['tableebg']          = $moduleConfig['css_tableebg'];
    $tcm['tableetc']          = $moduleConfig['css_tableetc'];
    $tcm['tableeff']          = $moduleConfig['css_tableeff'];
    $tcm['tableefb']          = $moduleConfig['css_tableefb'];
    $tcm['tableefs']          = $moduleConfig['css_tableefs'];
    $tcm['tableobg']          = $moduleConfig['css_tableobg'];
    $tcm['tableotc']          = $moduleConfig['css_tableotc'];
    $tcm['tableoff']          = $moduleConfig['css_tableoff'];
    $tcm['tableofb']          = $moduleConfig['css_tableofb'];
    $tcm['tableofs']          = $moduleConfig['css_tableofs'];
    $tcm['tablefbg']          = $moduleConfig['css_tablefbg'];
    $tcm['tableftc']          = $moduleConfig['css_tableftc'];
    $tcm['tablefff']          = $moduleConfig['css_tablefff'];
    $tcm['tableffb']          = $moduleConfig['css_tableffb'];
    $tcm['tableffs']          = $moduleConfig['css_tableffs'];
    $tcm['tablerebg']         = $moduleConfig['css_tablerebg'];
    $tcm['tableretc']         = $moduleConfig['css_tableretc'];
    $tcm['tablereff']         = $moduleConfig['css_tablereff'];
    $tcm['tablerefb']         = $moduleConfig['css_tablerefb'];
    $tcm['tablerefs']         = $moduleConfig['css_tablerefs'];
    $tcm['tablerobg']         = $moduleConfig['css_tablerobg'];
    $tcm['tablerotc']         = $moduleConfig['css_tablerotc'];
    $tcm['tableroff']         = $moduleConfig['css_tableroff'];
    $tcm['tablerofb']         = $moduleConfig['css_tablerofb'];
    $tcm['tablerofs']         = $moduleConfig['css_tablerofs'];
    $tcm['tablerfbg']         = $moduleConfig['css_tablerfbg'];
    $tcm['tablerftc']         = $moduleConfig['css_tablerftc'];
    $tcm['tablerfff']         = $moduleConfig['css_tablerfff'];
    $tcm['tablerffb']         = $moduleConfig['css_tablerffb'];
    $tcm['tablerffs']         = $moduleConfig['css_tablerffs'];
    $tcm['abg']               = $moduleConfig['css_abg'];
    $tcm['atc']               = $moduleConfig['css_atc'];
    $tcm['aff']               = $moduleConfig['css_aff'];
    $tcm['afb']               = $moduleConfig['css_afb'];
    $tcm['afs']               = $moduleConfig['css_afs'];
    $tcm['ahoverbg']          = $moduleConfig['css_ahoverbg'];
    $tcm['ahovertc']          = $moduleConfig['css_ahovertc'];
    $tcm['ahoverff']          = $moduleConfig['css_ahoverff'];
    $tcm['ahoverfb']          = $moduleConfig['css_ahoverfb'];
    $tcm['ahoverfs']          = $moduleConfig['css_ahoverfs'];
    $tcm['ammbg']             = $moduleConfig['css_ammbg'];
    $tcm['ammtc']             = $moduleConfig['css_ammtc'];
    $tcm['ammff']             = $moduleConfig['css_ammff'];
    $tcm['ammfb']             = $moduleConfig['css_ammfb'];
    $tcm['ammfs']             = $moduleConfig['css_ammfs'];
    $tcm['ammhbg']            = $moduleConfig['css_ammhbg'];
    $tcm['ammhtc']            = $moduleConfig['css_ammhtc'];
    $tcm['ammhff']            = $moduleConfig['css_ammhff'];
    $tcm['ammhfb']            = $moduleConfig['css_ammhfb'];
    $tcm['ammhfs']            = $moduleConfig['css_ammhfs'];
    $tcm['ammcurrentbg']      = $moduleConfig['css_ammcurrentbg'];
    $tcm['ammcurrenttc']      = $moduleConfig['css_ammcurrenttc'];
    $tcm['ammcurrentff']      = $moduleConfig['css_ammcurrentff'];
    $tcm['ammcurrentfb']      = $moduleConfig['css_ammcurrentfb'];
    $tcm['ammcurrentfs']      = $moduleConfig['css_ammcurrentfs'];
    $tcm['aumbg']             = $moduleConfig['css_aumbg'];
    $tcm['aumtc']             = $moduleConfig['css_aumtc'];
    $tcm['aumff']             = $moduleConfig['css_aumff'];
    $tcm['aumfb']             = $moduleConfig['css_aumfb'];
    $tcm['aumfs']             = $moduleConfig['css_aumfs'];
    $tcm['aumhbg']            = $moduleConfig['css_aumhbg'];
    $tcm['aumhtc']            = $moduleConfig['css_aumhtc'];
    $tcm['aumhff']            = $moduleConfig['css_aumhff'];
    $tcm['aumhfb']            = $moduleConfig['css_aumhfb'];
    $tcm['aumhfs']            = $moduleConfig['css_aumhfs'];
    $tcm['aumhlbg']           = $moduleConfig['css_aumhlbg'];
    $tcm['aumhltc']           = $moduleConfig['css_aumhltc'];
    $tcm['aumhlff']           = $moduleConfig['css_aumhlff'];
    $tcm['aumhlfb']           = $moduleConfig['css_aumhlfb'];
    $tcm['aumhlfs']           = $moduleConfig['css_aumhlfs'];
    $tcm['h1bg']              = $moduleConfig['css_h1bg'];
    $tcm['h1tc']              = $moduleConfig['css_h1tc'];
    $tcm['h1ff']              = $moduleConfig['css_h1ff'];
    $tcm['h1fb']              = $moduleConfig['css_h1fb'];
    $tcm['h1fs']              = $moduleConfig['css_h1fs'];
    $tcm['h2bg']              = $moduleConfig['css_h2bg'];
    $tcm['h2tc']              = $moduleConfig['css_h2tc'];
    $tcm['h2ff']              = $moduleConfig['css_h2ff'];
    $tcm['h2fb']              = $moduleConfig['css_h2fb'];
    $tcm['h2fs']              = $moduleConfig['css_h2fs'];
    $tcm['h3bg']              = $moduleConfig['css_h3bg'];
    $tcm['h3tc']              = $moduleConfig['css_h3tc'];
    $tcm['h3ff']              = $moduleConfig['css_h3ff'];
    $tcm['h3fb']              = $moduleConfig['css_h3fb'];
    $tcm['h3fs']              = $moduleConfig['css_h3fs'];
    $tcm['h4bg']              = $moduleConfig['css_h4bg'];
    $tcm['h4tc']              = $moduleConfig['css_h4tc'];
    $tcm['h4ff']              = $moduleConfig['css_h4ff'];
    $tcm['h4fb']              = $moduleConfig['css_h4fb'];
    $tcm['h4fs']              = $moduleConfig['css_h4fs'];
    $tcm['h5bg']              = $moduleConfig['css_h5bg'];
    $tcm['h5tc']              = $moduleConfig['css_h5tc'];
    $tcm['h5ff']              = $moduleConfig['css_h5ff'];
    $tcm['h5fb']              = $moduleConfig['css_h5fb'];
    $tcm['h5fs']              = $moduleConfig['css_h5fs'];
    $tcm['h6bg']              = $moduleConfig['css_h6bg'];
    $tcm['h6tc']              = $moduleConfig['css_h6tc'];
    $tcm['h6ff']              = $moduleConfig['css_h6ff'];
    $tcm['h6fb']              = $moduleConfig['css_h6fb'];
    $tcm['h6fs']              = $moduleConfig['css_h6fs'];
    $tcm['ftpserver']         = $moduleConfig['css_ftpserver'];
    $tcm['ftpusername']       = $moduleConfig['css_ftpusername'];
    $tcm['ftppassword']       = $moduleConfig['css_ftppassword'];
    $tcm['ftpdebug']          = $moduleConfig['css_ftpdebug'];
    $tcm['ftpuse']            = $moduleConfig['css_ftpuse'];
    $moduleid                 = $module->getVar('mid');
}

/**
 * @param $defaultcssthemecontent
 * @return string|string[]
 */
function replacevalue($defaultcssthemecontent)
{
    global $xoopsDB, $moduleid, $tcm;
    include_once XOOPS_ROOT_PATH . '/kernel/object.php';
    $myts                   = MyTextSanitizer::getInstance();
    $defaultcssthemecontent = str_replace('<leftblockwidth>', $tcm['leftblockwidth'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockwidth>', $tcm['rightblockwidth'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblocksitebg>', $tcm['leftblocksitebg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblocksitebg>', $tcm['centerblocksitebg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblocksitebg>', $tcm['rightblocksitebg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftrightblockwidth>', $tcm['leftblockwidth'] + $tcm['rightblockwidth'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftrightblockwidthplus>', $tcm['leftblockwidth'] + $tcm['rightblockwidth'] + 10, $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockwidthminus>', $tcm['rightblockwidth'] - 2, $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultbg>', $tcm['defaultbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaulttc>', $tcm['defaulttc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultff>', $tcm['defaultff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultfb>', $tcm['defaultfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultfs>', $tcm['defaultfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbg>', $tcm['headerbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headertc>', $tcm['headertc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerff>', $tcm['headerff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerfb>', $tcm['headerfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerfs>', $tcm['headerfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarbg>', $tcm['headerbarbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbartc>', $tcm['headerbartc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarff>', $tcm['headerbarff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarfb>', $tcm['headerbarfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarfs>', $tcm['headerbarfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbg>', $tcm['footerbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footertc>', $tcm['footertc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerff>', $tcm['footerff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerfb>', $tcm['footerfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerfs>', $tcm['footerfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarbg>', $tcm['footerbarbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbartc>', $tcm['footerbartc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarff>', $tcm['footerbarff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarfb>', $tcm['footerbarfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarfs>', $tcm['footerbarfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockhbg>', $tcm['leftblockhbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockhtc>', $tcm['leftblockhtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockhff>', $tcm['leftblockhff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockhfb>', $tcm['leftblockhfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockhfs>', $tcm['leftblockhfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockbg>', $tcm['leftblockbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblocktc>', $tcm['leftblocktc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockff>', $tcm['leftblockff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockfb>', $tcm['leftblockfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<leftblockfs>', $tcm['leftblockfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockhbg>', $tcm['centerblockhbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockhtc>', $tcm['centerblockhtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockhff>', $tcm['centerblockhff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockhfb>', $tcm['centerblockhfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockhfs>', $tcm['centerblockhfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockbg>', $tcm['centerblockbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblocktc>', $tcm['centerblocktc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockff>', $tcm['centerblockff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockfb>', $tcm['centerblockfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<centerblockfs>', $tcm['centerblockfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockhbg>', $tcm['rightblockhbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockhtc>', $tcm['rightblockhtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockhff>', $tcm['rightblockhff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockhfb>', $tcm['rightblockhfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockhfs>', $tcm['rightblockhfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockbg>', $tcm['rightblockbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblocktc>', $tcm['rightblocktc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockff>', $tcm['rightblockff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockfb>', $tcm['rightblockfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<rightblockfs>', $tcm['rightblockfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablehbg>', $tcm['tablehbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablehtc>', $tcm['tablehtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablehff>', $tcm['tablehff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablehfb>', $tcm['tablehfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablehfs>', $tcm['tablehfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableebg>', $tcm['tableebg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableetc>', $tcm['tableetc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableeff>', $tcm['tableeff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableefb>', $tcm['tableefb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableefs>', $tcm['tableefs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableobg>', $tcm['tableobg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableotc>', $tcm['tableotc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableoff>', $tcm['tableoff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableofb>', $tcm['tableofb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableofs>', $tcm['tableofs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablefbg>', $tcm['tablefbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableftc>', $tcm['tableftc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablefff>', $tcm['tablefff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableffb>', $tcm['tableffb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableffs>', $tcm['tableffs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerebg>', $tcm['tablerebg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableretc>', $tcm['tableretc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablereff>', $tcm['tablereff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerefb>', $tcm['tablerefb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerefs>', $tcm['tablerefs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerobg>', $tcm['tablerobg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerotc>', $tcm['tablerotc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tableroff>', $tcm['tableroff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerofb>', $tcm['tablerofb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerofs>', $tcm['tablerofs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerfbg>', $tcm['tablerfbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerftc>', $tcm['tablerftc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerfff>', $tcm['tablerfff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerffb>', $tcm['tablerffb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<tablerffs>', $tcm['tablerffs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultbg>', $tcm['defaultbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaulttc>', $tcm['defaulttc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultff>', $tcm['defaultff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultfb>', $tcm['defaultfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<defaultfs>', $tcm['defaultfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbg>', $tcm['headerbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headertc>', $tcm['headertc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerff>', $tcm['headerff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerfb>', $tcm['headerfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerfs>', $tcm['headerfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarbg>', $tcm['headerbarbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbartc>', $tcm['headerbartc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarff>', $tcm['headerbarff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarfb>', $tcm['headerbarfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<headerbarfs>', $tcm['headerbarfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbg>', $tcm['footerbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footertc>', $tcm['footertc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerff>', $tcm['footerff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerfb>', $tcm['footerfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerfs>', $tcm['footerfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarbg>', $tcm['footerbarbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbartc>', $tcm['footerbartc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarff>', $tcm['footerbarff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarfb>', $tcm['footerbarfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<footerbarfs>', $tcm['footerbarfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<abg>', $tcm['abg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<atc>', $tcm['atc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aff>', $tcm['aff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<afb>', $tcm['afb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<afs>', $tcm['afs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ahoverbg>', $tcm['ahoverbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ahovertc>', $tcm['ahovertc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ahoverff>', $tcm['ahoverff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ahoverfb>', $tcm['ahoverfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ahoverfs>', $tcm['ahoverfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammbg>', $tcm['ammbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammtc>', $tcm['ammtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammff>', $tcm['ammff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammfb>', $tcm['ammfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammfs>', $tcm['ammfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammhbg>', $tcm['ammhbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammhtc>', $tcm['ammhtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammhff>', $tcm['ammhff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammhfb>', $tcm['ammhfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammhfs>', $tcm['ammhfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammcurrentbg>', $tcm['ammcurrentbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammcurrenttc>', $tcm['ammcurrenttc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammcurrentff>', $tcm['ammcurrentff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammcurrentfb>', $tcm['ammcurrentfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<ammcurrentfs>', $tcm['ammcurrentfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumbg>', $tcm['aumbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumtc>', $tcm['aumtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumff>', $tcm['aumff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumfb>', $tcm['aumfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumfs>', $tcm['aumfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhbg>', $tcm['aumhbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhtc>', $tcm['aumhtc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhff>', $tcm['aumhff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhfb>', $tcm['aumhfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhfs>', $tcm['aumhfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhlbg>', $tcm['aumhlbg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhltc>', $tcm['aumhltc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhlff>', $tcm['aumhlff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhlfb>', $tcm['aumhlfb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<aumhlfs>', $tcm['aumhlfs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h1bg>', $tcm['h1bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h1tc>', $tcm['h1tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h1ff>', $tcm['h1ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h1fb>', $tcm['h1fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h1fs>', $tcm['h1fs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h2bg>', $tcm['h2bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h2tc>', $tcm['h2tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h2ff>', $tcm['h2ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h2fb>', $tcm['h2fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h2fs>', $tcm['h2fs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h3bg>', $tcm['h3bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h3tc>', $tcm['h3tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h3ff>', $tcm['h3ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h3fb>', $tcm['h3fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h3fs>', $tcm['h3fs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h4bg>', $tcm['h4bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h4tc>', $tcm['h4tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h4ff>', $tcm['h4ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h4fb>', $tcm['h4fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h4fs>', $tcm['h4fs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h5bg>', $tcm['h5bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h5tc>', $tcm['h5tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h5ff>', $tcm['h5ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h5fb>', $tcm['h5fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h5fs>', $tcm['h5fs'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h6bg>', $tcm['h6bg'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h6tc>', $tcm['h6tc'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h6ff>', $tcm['h6ff'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h6fb>', $tcm['h6fb'], $defaultcssthemecontent);
    $defaultcssthemecontent = str_replace('<h6fs>', $tcm['h6fs'], $defaultcssthemecontent);

    return $defaultcssthemecontent;
}

/**
 * @param $cssdir
 */
function loadCompleteCss($cssdir)
{
    global $cssthemecontent;
    if ($handle = opendir($cssdir)) {
        $cssthemecontent = '';
        while (false !== ($file = readdir($handle))) {
            if ('.' !== $file && '..' !== $file) {
                $defaultcssthemecontent = '';
                $filename               = $cssdir . '/' . $file;
                $fh                     = fopen($filename, 'rb');
                $cssthemecontent        = $cssthemecontent . ' ' . fread($fh, filesize($filename));
                fclose($fh);
            }
        }
    }
    closedir($handle);
}

/**
 * @param $htmltag
 * @return string
 */
function checkused($htmltag)
{
    global $cssthemecontent;
    $pos = mb_strpos($cssthemecontent, $htmltag);
    if (false === $pos) {
        return "<img src='images/notused.png' alt='" . _AM_CSSNOTUSED . "' title='" . _AM_CSSNOTUSED . "'>";
    }

    return "<img src='images/used.png' alt='" . _AM_CSSUSED . "' title='" . _AM_CSSUSED . "'>";
}
