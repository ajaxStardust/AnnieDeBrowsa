<?php
namespace Adb\View;
error_reporting(E_ALL);
?>

<body id="index" class="sans-serif backgroundblue">
    <figure id="cssBox_Target" class="sans-serif target displaynone">
        <!-- ^ cssBoxContainer ^ -->
        <img src="assets/images/css-box.png" alt="CSS Box-model illustration" id="cssBoxImg">
    </figure>
    <!-- $ cssBoxContainer $ -->
    <div id="pagewidth" style="background-color:#f5f5f5">
        <!-- ^ id=pagewidth -->
        <div id="wrapper" class="sans-serif unfloat">
            <!-- ^ id=wrapper ^ -->
            <div class="sans-serif content" id="cookieData"></div>

            <header id="header" title="Header Element contains object with SVG">
                <!--     ^ Begin SVG object   -->
                <object id="svgtitle" class="sans-serif floatleft transparentback" title="Documents of - container"
                    data="assets/css/masthead.php" type="image/svg+xml">
                </object>

            </header>
            <div class="sans-serif text-center center">
                <div id="headingTitle" class="sans-serif green card pa3 br2 ba bg-near-white b--light-gray"></div>
            </div>
            <!-- end #header (svg object) $ -->