<?php
namespace Adb\View;
error_reporting(E_ALL);
?>

<body id="index" class="bg-light-gray">
    <figure id="cssBox_Target" class="target dn">
        <!-- ^ cssBoxContainer ^ -->
        <img src="assets/images/css-box.png" alt="CSS Box-model illustration" id="cssBoxImg"  class="w-100">
    </figure>
        <!-- $ cssBoxContainer $ -->
    <div id="pagewidth" class="bg-light-gray">
        <!-- ^ id=pagewidth -->
        <div id="wrapper" class="ph3 ph5-ns">

        <header id="header" title="Header as SVG container" class="mb4">
            <!--     ^   Begin Dynamic and SVG styled Header  ^   -->
            <object id="svgtitle" class="dib" title="Documents container"
                        data="assets/css/masthead.php" type="image/svg+xml"></object>
            <div id="headingTitle" class="f4 bg-animate bg-lightest-blue"></div>
        </header><!-- $ END Dynamic and SVG HTML node ID#header $ -->


