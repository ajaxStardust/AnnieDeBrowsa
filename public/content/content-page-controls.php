<section class="hide-show-element">
<input type="checkbox" id="toggle">
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

        <li id="fbloader" class="loader material-symbols-outlined mh1 ph1 f3">
        <span class="loader">
            <a class="f3" title="Click to activate the portable Firebug Lite script embedded in my javascript container">Inspect <img src="assets/images/firebug_icon_oldver.png" alt="launch firebug lite" width="16" height="16"></a>
        </span>
        </li>

        <li id="js2index" class="reloadIcon"><a class="f3" href="index.php" title="Reload top">Reload</a></li>
        </ul>
    <!-- temp note: moved css box model image to dochead for now -->

    </div>
</section> 