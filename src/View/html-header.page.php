<?php
namespace Adb\View;
error_reporting(E_ALL);
?>

<body id="index" class="body">
    <header id="adb-header" title="Header Element contains object with SVG">
                <object id="svgtitle" class="ma1"
                               title="Documents of - container" data="assets/css/masthead.php"
                               type="image/svg+xml">
                           </object>
                <object id="brand" class="ma1"
                               title="Documents of - container" data="assets/svg/adblogo.svg"
                               type="image/svg+xml">
                           </object>
<div id="headingTitle" class="green bg-animate bg-near-white ml5 z-99"></div>



            </header>
    <figure id="cssBox_Target" class="target displaynone dn">
        <!-- ^ cssBoxContainer ^ -->
        <img src="assets/images/css-box.png" alt="CSS Box-model illustration" id="cssBoxImg">
    </figure>
        <!-- $ cssBoxContainer $ -->
    <div id="pagewidth" style="background-color:#f5f5f5">
        <!-- ^ id=pagewidth -->
        <div id="wrapper" class="unfloat">
            <!-- ^ id=wrapper ^ -->
            <div class="content" id="cookieData"></div>



            
            <!-- end #header (svg object) $ -->
    <div id="mainFrameContainer">

        <!--    ^   id:mainFrameContainer   ^   -->
        <div id="frameTitler">iframe.src: <span id="frameName"><?php print $defaultIframe; ?></span>
        </div>
        <!--    $   id:frameTitler  $   -->
        <iframe title="frame content as selected in main navigation" src="default.php" id="mainFrame">
        </iframe>
    </div>
    <!--    $   id:mainFrameContainer   $   -->
