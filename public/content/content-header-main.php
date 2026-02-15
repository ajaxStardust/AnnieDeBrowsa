<?php
namespace Adb\Public\Content;
error_reporting(E_ALL);
?>



<!-- $ cssBoxContainer $ -->
<!-- div id="pagewidth" style="background-color:transparent;" -->
    <header class="clearfix" id="adb-header" title="Header Element contains object with SVG">

        <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
        <?php 
        include 'content/card-github.content.php';
        ?>

        <!-- HEADING TITLE OBJECT IS DYNAMIC SVG  -->
        <object id="svg-header-title" class="ma4 float-left"
            title="Documents of - container" data="assets/css/masthead.php"
            type="image/svg+xml">
        </object>

        <!-- SITE ICON LOGO  -->
        <figure id="header-icon"><img id="header-icon-media" src="filehttp.png" alt="icon"><figcaption class="caption-top"><div id="headingTitle" class="green z-99"></div></figcaption></figure>


</header>
<!-- ^ id=pagewidth -->
<!-- div id="wrapper" class="unfloat" -->
<!-- ^ id=wrapper ^ -->


<!-- end #header (svg object) $ -->