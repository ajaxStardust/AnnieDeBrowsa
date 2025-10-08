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
            <li onclick="showHide(\'ul_' . $key . '\')" id="li_' . $key . '_control" class="mb2"><span class="fw7">' . $key . '</span> [ view ' . $many . ' ] 
            <ul id="ul_'.$key.'" class="list pl3 dn">';
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

            <main id="maincol" class="mb5">
                <h2 id="doc_loc_href" class="f3 mb3"><?php print $display_dynamichost.'/'.$currentUrlPath; ?>
    </h2>

                <div class="hide-show-element w-third mb3">
  <input type="checkbox" id="controlsToggle" />
  <label for="controlsToggle"></label>
        <div id="pageControls" class="test1">
<<<<<<< HEAD
<ul id="controList">
        <li id="toTopJscon" class="material-symbols-outlined">
            <a class="intraNav" href="#header"><span id="headerJumper" class="mh1 ph1 f3">top</span> </a>
<<<<<<< HEAD
=======
=======
<ul id="controList" class="list pl0>
        <li id="toTopJscon" class="material-symbols-outlined mb2">
            <a class="intraNav" href="#header"><span id="headerJumper">top</span> </a>
>>>>>>> 0e25e3bfb504a2e99fbd26c708759fca59e12c97
>>>>>>> master
        </li>
        <li id="leftColtrigger" onclick="collapseNav('leftcol')" class="material-symbols-outlined mb2">
            <span class="trigger">
                <a title="Toggle show / hide HTML id:leftcol (the navigation at left)" class="mh1 ph1 f3">
                    <span id="navTxt">toggle</span> Nav </a>
            </span>
        </li>
<<<<<<< HEAD
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
=======
<<<<<<< HEAD
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
=======
        <li class="material-symbols-outlined mb2" id="pageCon_goBack">
            <span class="handler" id="goBackHandler"><a title="JavaScript Function for history minus one" onclick="goBack()">back</a></span>
        </li>
        <li class="material-symbols-outlined mb2" id="toBottom">
            <a class="intraNav" href="#footer"> <span id="footJumper">bottom</span>
            </a>
        </li>
        <li id="frameControl" class="loader material-symbols-outlined mb2"> <span id="lockFrameLoader" class="cssloader"><a id="lockFrameAnchor" title="Lock main iframe for easier viewing of large images or lengthy text" href="#mainFrameContainer">Lock frame</a> </span>
        </li>
            <li id="iframe2top" class="mb2"><span class="trigger" id="send2top" onclick="frame2top()"><a title="send frame to top">Pop frame</a></span></li>
        <li id="cssBoxFig" class="trigger material-symbols-outlined mb2">
            <span id="cssBox_Trigger" class="trigger" onclick="showHide('cssBox_Target')"><a title="Toggle show / hide CSS Box Model illustration"> Box </a></span>
        </li>
        <li id="fbloader" class="loader material-symbols-outlined mb2">
>>>>>>> 0e25e3bfb504a2e99fbd26c708759fca59e12c97
>>>>>>> master
            <span class="loader">
                <a class="f3" title="Click to activate the portable Firebug Lite script embedded in my javascript container">Inspect <img src="assets/images/firebug_icon_oldver.png" alt="launch firebug lite" width="16" height="16"></a>
            </span>
        </li>

<<<<<<< HEAD
        <li id="js2index" class="reloadIcon"><a class="f3" href="index.php" title="Reload top">Reload</a></li>
=======
<<<<<<< HEAD
        <li id="js2index" class="reloadIcon"><a class="f3" href="index.php" title="Reload top">Reload</a></li>
=======
        <li id="js2index" class="reloadIcon mb2"><a href="index.php" title="Reload top">Page</a></li>
>>>>>>> 0e25e3bfb504a2e99fbd26c708759fca59e12c97
>>>>>>> master
    </ul>
    <!-- temp note: moved css box model image to dochead for now -->
    
</div>
 </div>
                <hr class="dn">

    <?php

    /*
    @param Backlinks - not really important enough to figure out where it is at the moment
        $Backlinks = json_decode(json_encode($Backlinks));
    */

   
        echo $build_local_urls;

    ?>
    <div id="quickChange" class="info">Change quick links [ <a id="jsoneditor_open" class="json-edit-link" data-filepath="config_editor.html" href="file_loader.php?file=config_editor.html">EDIT</a> ] </div>

    <div id="mainFrameContainer" class="mt4">

        <!--    ^   id:mainFrameContainer   ^   -->
        <div id="frameTitler" class="mb2">iframe.src: <span id="frameName"><?php print $defaultIframe; ?></span>
        </div>
        <!--    $   id:frameTitler  $   -->
        <iframe title="frame content" src="index.phtml" id="mainFrame" class="w-100 h5">
        </iframe>
    </div>

    <!--    $   id:mainFrameContainer   $   -->
</main>

<!--    $   id:maincol  $   -->
