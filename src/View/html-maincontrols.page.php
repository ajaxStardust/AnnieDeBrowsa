<?php

/**
 * @package AnnieDeBrowsa
 *
 * @component content, javascripted events
 * @path ./inc/jscontrols.inc.php
 * @since 2008-07-25
 *  #revised 2009-09-14
 *
 * @overview
 *      INCLUDE THE JAVASCRIPT NAVIGATION TOGGLER FX COLLAPSE BIT
 *          #see index.php @ =~ 24
**/

?>


<div id="pageControls" class="test1">
    <header id="pageControlHeader">Page Control</header>
    <ul id="controList">
        <li id="toTopJscon" class="material-symbols-outlined">
            <a class="intraNav" href="#header"><span id="headerJumper">top</span> </a>
        </li>
        <li id="leftColtrigger" onclick="collapseNav('leftcol')" class="material-symbols-outlined">
            <span class="trigger">
                <a title="Toggle show &#x2F; hide HTML id:leftcol (the navigation at left)">
                    <span id="navTxt">toggle</span> nav </a>
            </span>
        </li>
        <li class="material-symbols-outlined"  id="pageCon_goBack">
            <span class="handler" id="goBackHandler"><a title="JavaScript Function for history minus one" onclick="goBack()"> b()</a></span>
        </li>
        <li class="material-symbols-outlined" id="toBottom">
            <a class="intraNav" href="#footer"> <span id="footJumper">bottom</span>
            </a>
        </li>
        <li id="frameControl" class="loader material-symbols-outlined"> <span id="lockFrameLoader" class="cssloader"><a id="lockFrameAnchor" title="Lock main iframe for easier viewing of large images or lengthy text" href="#mainFrameContainer">Lock Iframe</a> </span>
        </li>
        <li id="cssBoxFig" class="trigger material-symbols-outlined">
            <span id="cssBox_Trigger" class="trigger" onclick="showHide('cssBox_Target')"><a title="Toggle show &#x2F; hide CSS Box Model illustration"> CSS Box </a></span>
        </li>
        <li id="fbloader" class="loader material-symbols-outlined">
            <span class="loader">
                <a title="Click to activate the portable Firebug Lite script embedded in my javascript container"><img src="assets/css/firebug_icon_oldver.png" alt="launch firebug lite" width="16" height="16" /> Firebug <em>Lite</em></a>
            </span>
        </li>
        <li id="iframe2top"><span class="trigger" id="send2top" onclick="frame2top()"><a title="send frame to top">iFrame to Top</a></span></li>
        <li id="js2index"></li>
    </ul>
    <!-- temp note: moved css box model image to dochead for now -->
</div>
 </div>
<hr class="hidden" />

