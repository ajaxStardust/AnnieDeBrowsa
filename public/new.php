<?php

namespace Adb\Public;

use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Auxx as Auxx;
use Adb\View\Navview as Navview;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Dirhandler as Dirhandler;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Localsites as Localsites;

/* --------------------------------------------------------- */





if (!isset($pathOps)) {
    $pathOps = dirname(dirname(__DIR__));
}

$Adbsoc = new Adbsoc($pathOps);
$Iframe = new Iframe();

$Htmldochead = new Htmldochead($pathOps);

$Localsites = new Localsites();

$bodyid = $Adbsoc->bodyid;
$favtype = $Htmldochead->favtype;
$favicon = $Htmldochead->favicon;
$defaultIframe = $Iframe->mainFrame();
$css = "assets/css/style.css";
// Example usage:
$config = $Adbsoc->getConfig();
$json_urls = $config["home_urls"]; // Assuming $config contains the parsed JSON data
$build_local_urls = $Localsites->getSites($json_urls); // Call the function and output the result



/* --------------------------------------------------------- */


$Auxx = new Auxx(ADBLOCTN);
$Navview = new Navview(HTMLCHARARRAY);
$Navfactor = new Navfactor(HTMLCHARARRAY);
$htmlCharacterArray = $Navfactor->htmlCharacterArray;

$Dirhandler = new Dirhandler(TEST_DIRECTORY);
$page_heading = 'Annie De Browsa - Transformative.Click';
$title = $page_heading . 'HTML DOCTYPE BASE';
// $title = str_ireplace("/home/admin/web", "", $pathOps);

/*
* doctype-base
*/
require NS_ROOT . '/public/doctype/base.doctype.php';
/*
* content HEADER Main
*/

require NS_ROOT . '/public/content/header-main.content.php';
/*
* src/view MAIN
*/

require NS_ROOT . '/src/View/html-main.page.php';

/*
* footer with vue script
*/
require NS2_ROOT . '/public/footer/vue-app.footer.php';



    