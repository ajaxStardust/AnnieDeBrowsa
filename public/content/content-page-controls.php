<section class="hide-show-element">
<input type="checkbox" id="toggle">
<label for="toggle"></label>
    <div id="pageControls" class="page-controls" role="region" aria-label="Page tools">
<div class="page-controls-heading">Page tools</div>
        <ul id="controList">
        <li id="toTopJscon" class="material-symbols-outlined page-controls-item">
            <a class="intraNav" href="#header"><span id="headerJumper" class="page-controls-link">Top</span></a>
        </li>
        <li id="leftColtrigger" onclick="collapseNav('leftcol')" class="material-symbols-outlined page-controls-item">
        <span class="trigger">
            <a title="Toggle show / hide HTML id:leftcol (the navigation at left)" class="page-controls-link">
        <span id="navTxt">Toggle</span> nav </a>
        </span>
        </li>
        <li class="material-symbols-outlined page-controls-item" id="pageCon_goBack">
            <span class="handler" id="goBackHandler"><a class="page-controls-link" title="JavaScript Function for history minus one" onclick="goBack(); return false;" href="#">Back</a></span>
        </li>
        <li class="material-symbols-outlined page-controls-item" id="toBottom">
            <a class="intraNav page-controls-link" href="#footer"> <span id="footJumper">Bottom</span>
        </a>
        </li>
        <li id="frameControl" class="loader material-symbols-outlined page-controls-item"> <span id="lockFrameLoader" class="cssloader"><a id="lockFrameAnchor" class="page-controls-link" title="Lock main iframe for easier viewing of large images or lengthy text" href="#mainFrameContainer">Lock frame</a> </span>
        </li>
        <li id="iframe2top" class="page-controls-item"><span class="trigger" id="send2top" onclick="frame2top()"><a class="page-controls-link" title="send frame to top">iFrame</a></span></li>

        <li id="fbloader" class="loader material-symbols-outlined page-controls-item">
        <span class="loader">
            <a class="page-controls-link" title="Click to activate the portable Firebug Lite script embedded in my javascript container" href="javascript:void(0)">Inspect <img src="assets/images/firebug_icon_oldver.png" alt="launch firebug lite" width="16" height="16" class="page-controls-icon"></a>
        </span>
        </li>

        <li id="js2index" class="reloadIcon page-controls-item"><a class="page-controls-link" href="index.php" title="Reload top">Reload</a></li>
        </ul>
    <!-- temp note: moved css box model image to dochead for now -->

    </div>
</section>
