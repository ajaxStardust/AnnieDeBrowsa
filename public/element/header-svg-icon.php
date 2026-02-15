<?php
namespace Adb\Public\Element;
if(!defined('NS2_ROOT')) {
    define('NS2_ROOT', dirname(__DIR__));
}
error_reporting(E_ALL);
?>
            <header class="clearfix" id="adb-header" title="Header Element contains object with SVG">
                <!-- MASTHEAD.PHP -->
                <object id="svg-header-title" class="ma4 float-left"
                    title="Documents of - container" data="assets/css/masthead.php"
                    type="image/svg+xml">
                </object>
                <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
                <?php 
                require NS2_ROOT . '/content/content-card-github.php'; 
                ?>
                <!-- HEADER-ICON -->
                <figure id="header-icon"><figcaption class="caption-top"><div id="headingTitle" class="green z-99"></div></figcaption></figure>
            </header>