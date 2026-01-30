<?php
namespace Adb\View;
error_reporting(E_ALL);
?>

<body id="index" class="bg-light-corn-animated">

        <!-- $ cssBoxContainer $ -->
    <div id="pagewidth" style="background-color:transparent;">
        <!-- ^ id=pagewidth -->
        <div id="wrapper" class="unfloat">
            <!-- ^ id=wrapper ^ -->
            <div class="content" id="cookieData"></div>
            <header class="clearfix" id="adb-header" title="Header Element contains object with SVG">

                <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
                <?php include 'html-card-github.php'; ?>

                <object id="svg-header-title" class="ma4 float-left"
                    title="Documents of - container" data="assets/css/masthead.php"
                    type="image/svg+xml">
                </object>
                <figure id="header-icon"><img id="header-icon-media" src="favicon.png" alt="icon"><figcaption class="caption-top"><div id="headingTitle" class="green z-99"></div></figcaption></figure>


            </header>
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
