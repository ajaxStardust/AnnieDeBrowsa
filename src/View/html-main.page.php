<?php

namespace Adb\View;

use Adb\Controller\Navcontroller as Navcontroller;
use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Backlinks as Backlinks;
use Adb\Model\Cwthumbs as Cwthumbs;
use Adb\Model\Dirhandler as Dirhandler;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Navfactor as Navfactor;
use Adb\Model\Urlprocessor as Urlprocessor;

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


/*
 * @filename // src/View/html-main.page.php
 * @abstract
 * creates html div id="maincol"
 */

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
echo '    </ul>
</nav>';
?>

<div id="maincol">
    <h2 id="doc_loc_href" class="green sans-serif" title="currentUrlPath.pathInfoBasename"><?= $currentUrlPath; ?></h2>

    <div class="hide-show-element">
  <input type="checkbox" id="toggle" />
  <label for="toggle"></label>
        <div id="pageControls" class="test1">
<ul id="controList">
        <li id="toTopJscon" class="material-symbols-outlined">
            <a class="intraNav" href="#header"><span id="headerJumper" class="mh1 ph1 f3">top</span> </a>
        </li>
        <li id="leftColtrigger" onclick="collapseNav('leftcol')" class="material-symbols-outlined">
            <span class="trigger">
                <a title="Toggle show / hide HTML id:leftcol (the navigation at left)" class="mh1 ph1 f3">
                    <span id="navTxt">toggle</span> Nav </a>
            </span>
        </li>
        <li class="material-symbols-outlined mh1 ph1 f3" id="pageCon_goBack">
            <span class="handler" id="goBackHandler"><a class="f3" title="JavaScript Function for history minus one" onclick="goBack()">back</a></span>
        </li>
        <li class="material-symbols-outlined mh1 ph1 f3" id="toBottom">
            <a class="f3" class="intraNav" href="#footer"> <span id="footJumper">bottom</span>
            </a>
        </li>
        <li id="frameControl" class="loader material-symbols-outlined mh1 ph1 f3"> <span id="lockFrameLoader" class="cssloader"><a id="lockFrameAnchor" title="Lock main iframe for easier viewing of large images or lengthy text" href="#mainFrameContainer">Lock frame</a> </span>
        </li>
            <li id="iframe2top"><span class="trigger" id="send2top" onclick="frame2top()"><a class="f3" title="send frame to top">iFrame</a></span></li>
        <li id="cssBoxFig" class="trigger material-symbols-outlined mh1 ph1 f3">
            <span id="cssBox_Trigger" class="trigger" onclick="showHide('cssBox_Target')"><a class="f3" title="Toggle show / hide CSS Box Model illustration"> Box </a></span>
        </li>
        <li id="fbloader" class="loader material-symbols-outlined mh1 ph1 f3">
            <span class="loader">
                <a class="f3" title="Click to activate the portable Firebug Lite script embedded in my javascript container">Inspect <img src="assets/images/firebug_icon_oldver.png" alt="launch firebug lite" width="16" height="16"></a>
            </span>
        </li>

        <li id="js2index" class="reloadIcon"><a class="f3" href="index.php" title="Reload top">Reload</a></li>
    </ul>
    <!-- temp note: moved css box model image to dochead for now -->

</div>
 </div>
<hr class="hidden" />

    <?php

    /*
    @param Backlinks - not really important enough to figure out where it is at the moment
        $Backlinks = json_decode(json_encode($Backlinks));
    */

    ?>
<section class="content">
                <details>
                    <summary class="text-smallcaps">
                        Off-site Links, see config.json
                    </summary>
                    <?= $build_local_urls ?>
        </details>
            </section>


    <div id="quickChange" class="info">Change quick links [ <a id="jsoneditor_open" class="json-edit-link" data-filepath="config_editor.html" href="file_loader.php?file=config_editor.html">EDIT</a> ] </div>

    <div id="mainFrameContainer">

        <!--    ^   id:mainFrameContainer   ^   -->
        <div id="frameTitler">iframe.src: <span id="frameName"><?php print $defaultIframe; ?></span>
        </div>
        <!--    $   id:frameTitler  $   -->
        <iframe title="frame content as selected in main navigation" src="default.php" id="mainFrame">
        </iframe>
    </div>

    <!--    $   id:mainFrameContainer   $   -->
</div>

<!--    $   id:maincol  $   -->
