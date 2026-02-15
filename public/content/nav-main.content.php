<?php

namespace Adb\Public\Content;

/*
* @filename // src/View/html-main.page.php
* @abstract
* creates html div id="maincol"
*/

use Adb\Controller\Navcontroller as Navcontroller;
use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Backlinks as Backlinks;
use Adb\Model\Cwthumbs as Cwthumbs;
use Adb\Model\Dirhandler as Dirhandler;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Urlprocessor as Urlprocessor;
use Adb\View\Navview as Navview;
if (!isset($pathOps)) {
    $pathOps = dirname(dirname(__DIR__));
}

$display_dynamichost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';

$Navfactor = new Navfactor(TEST_DIRECTORY);
$Navcontroller = new Navcontroller(TEST_DIRECTORY);
$buildNavController = $Navcontroller->displayNavigation();
$Dirhandler = new Dirhandler(TEST_DIRECTORY);
$Dir_Contents = $Dirhandler->readDirectory(TEST_DIRECTORY);
$Backlinks = new Backlinks();
$Adbsoc = new Adbsoc($pathOps);
$Htmldochead = new Htmldochead($pathOps);
$Iframe = new Iframe;
$thumbs = new Cwthumbs;
$getImaegs = $thumbs->getImages();
$defaultIframe = $Iframe->defaultIframe;
$Urlprocessor = new Urlprocessor($pathOps);
$currentUrlPath = $Urlprocessor->chopUrl();
$pathInfoBasename = $Htmldochead->pathInfoBasename;
$buildNavigation = $Navfactor->getHtmlPrint();
$processDirectoryStructure = $Navfactor->makeTogglesReturn;



$Navview = new Navview(TEST_DIRECTORY);
$htmlCharacterArray = $Navfactor->htmlCharacterArray;
$getHtmlPrint = $Navfactor->getHtmlPrint();
$anchors = $Auxx->arrayObjectAnchors;
// $htmlNavElement = $Navview->renderOne($Dirhandler->readDirectory(TEST_DIRECTORY));
$htmlNavElement = $Navfactor->getHtmlPrint();

$initNav = $Navfactor->initNav();
echo $initNav[0];
$Navfactor->groupTogglerReturn;

foreach ($htmlCharacterArray as $key => $value) {
if(is_array($value)) {

$many = count($value);
echo '
<li onclick="showHide(\'ul_' . $key . '\')" id="li_' . $key . '_control" class="toggler"><span style="font-weight:bold;">' . $key . '</span> [ view ' . $many . ' ]
<ul id="ul_'.$key.'" class="inner-list">';
foreach($value as $target_html){
// echo '<br>TEMP<br>'. $target_html;
echo  $target_html;
}
echo '</ul>';
}

}
echo '</ul>
</nav>';