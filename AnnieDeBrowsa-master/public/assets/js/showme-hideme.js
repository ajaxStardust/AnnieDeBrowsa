/*
 * THE SHOW-ME HIDE-ME JAVASCRIPT USED IN SO MANY DIRECTORY BROWSER INDEX FILES
 * ON LOCALHOST
 */
window.onload = getToggleGraphics;

function getToggleGraphics() {
    var imgs = document.getElementsByTagName("img");
    var imgClass = "toggleGraphic";
    var dds;
    for (var i = 0; i < imgs.length; ++i) {
        if (imgs[i].className == imgClass) {
            dds = imgs[i].parentNode.parentNode.getElementsByTagName("dd");
            for (var j = 0; j < dds.length; ++j) {
                imgs[i].onclick = (function (img, dd) {
                    return function () {
                        toggleSection(img, dd);
                    };
                })(imgs[i], dds[j]);
            }
        }
    }
}

function swap_text(oldText, notesText) {
    var swapText = document.getElementById(oldText);
    var toggleRegion = document.getElementById(notesText);
    if (swapText.innerHTML != "[collapse]") {
        swapText.innerHTML = "[collapse]";
        toggleRegion.style.display = 'block'
        swapText.style.color = 'red';
        swapText.className.toggle('blog-header-logo');
        console.log(swapText);

    } else {
        swapText.innerHTML = "[toggle...]";
        toggleRegion.style.display = 'none';
        swapText.style.color = 'black';
        swapText.className.toggle('blog-header-logo');
        console.log(swapText);
    }
}

function toggleSection(thisImage, thisDd) {
    var detailSection = thisDd;
    var toggleImage = thisImage;

    if (detailSection.style.display == 'block') {
        detailSection.style.display = 'none';
        toggleImage.src = 'assets/css/collapsed.gif';
    } else {
        detailSection.style.display = 'block';
        toggleImage.src = 'assets/css/expanded.gif';
    }

}


function expandCollapse(details, toggle, txt) {
    var detailSection = document.getElementById(details);
    var toggleImage = document.getElementById(toggle);
    var toggleText = document.getElementById(txt);

    if (detailSection.style.display == 'block') {
        detailSection.style.display = 'none';
        toggleImage.src = 'assets/css/collapsed.gif';
        toggleText.innerHTML = "more...";
    } else {
        detailSection.style.display = 'block';
        toggleImage.src = 'assets/css/expanded.gif';
        toggleText.innerHTML = "hide";
    }

}

function collapseSection(sectionDiv) {

    var leftcol = document.getElementById(sectionDiv);
    var maincol = document.getElementById('maincol');
    var navImage = document.getElementById('navControl');
    var toggleTxt = document.getElementById('navTxt');

    if (navImage.src == ('assets/css/arrow-left.png' || 'assets/css/arrow-right.png')) {
        var spacer = '../';
    } else {
        var spacer = '';
    }

    if (leftcol.style.display != 'none') {
        leftcol.style.display = 'none';
        maincol.style.width = '100%';
        maincol.style.paddingLeft = 0;
        navImage.src = spacer + 'assets/css/arrow-right.png';
        toggleTxt.innerHTML = "show";
    } else {
        leftcol.style.display = 'block';
        maincol.style.width = '71%';
        navImage.src = spacer + 'assets/css/arrow-left.png';
        toggleTxt.innerHTML = "collapse";
    }
}

function collapseNav(navDiv) {

    var leftcol = document.getElementById(navDiv);
    var maincol = document.getElementById('maincol');
    var navImage = document.getElementById('navControl');
    var toggleTxt = document.getElementById('navTxt');


    if (leftcol.style.display != 'none') {
        leftcol.style.display = 'none';
        maincol.style.width = '100%';
        maincol.style.paddingLeft = 0;
        toggleTxt.className = "material-symbols-outlined collapsed";
        toggleTxt.innerHTML = "show";
    } else {
        leftcol.style.display = 'block';
        maincol.style.width = 'revert-layer';
        toggleTxt.className = "material-symbols-outlined visible";
        toggleTxt.innerHTML = "collapse";
    }
}

function popMeUp(target) {
    var newWinUp = window.open(
        (target),
        'newPopWin',
        'height=500,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes'
    );
    newWinUp.focus();
    return false;
}

 function showHide(obj1) {
    var el1 = document.getElementById(obj1);
    if (el1.style.display != "block") {
        el1.style.display = 'block';
    } else {

        el1.style.display = 'none';
    }
}

/* function showHide(target,toggler) {
    var el1 = document.getElementById(target);
    var el2 = document.getElementById(toggler);
    if (el1.style.display != "block") {
        el1.style.display = 'block';
    } else {

        el1.style.display = 'none';
    }

    if (el1.style.display != 'block') {
        el2.style.fontWeight = 'normal';
        el2.style.fontSize = '16px';
    } else {
        el2.style.fontWeight = 'bold';
        el2.style.fontSize = '18px';
    }
} */

function makeBold(obj2) {
    var el = document.getElementById(obj2);
    if (el.style.fontWeight != "bold") {
        el.style.fontWeight = "bold";
        el.style.color = "red";
    } else {
        el.style.fontWeight = "normal";
    }
}

function makeNorm(obj3) {
    var el = document.getElementById(obj3);
    if (el.style.fontWeight != "normal") {
        el.style.fontWeight = "normal";
        el.style.color = "black";
    } else {
        el.style.fontWeight = "bold";
    }
}

function goBack() {
    window.history.back();
}

/** @texteditor
 *       Using Geany, the GTK+ editor based on Scintilla,
 *       collapse and reveal will function as intended for the
 *       per-item, multi-line comments such as those in loadIframe()
 **/

var window = navigator.window;
var document = window.document;

function initLoaders() {

    var thisDocHead, docHead, fbloader, firebugLite, firebug;

    thisDocHead = document.getElementsByTagName("head");
    fbloader = document.getElementById("fbloader");

    docHead = thisDocHead[0];

    firebugLite = document.createElement('script');
    firebugLite.setAttribute('type', "text/javascript");
    firebugLite.setAttribute('src', 'assets/js/fbl/firebug-lite-debug.js');

    fbloader.onclick = function () {
        docHead.appendChild(firebugLite);
        if (firebug) {
            firebug.init();
        }

    }
}

function runStuff() {
    var dts = document.getElementsByTagName("dt");
    var errortable = document.getElementById("errorTableLink");
    var phpIframe = document.getElementById("phpFrameToggle");
    var iniVal = document.getElementById("iniVal");
    var runtimeVal = document.getElementById("runtimeVal");

    if (errortable) {
        errortable.onclick = popUpTable;
    }

    if (phpIframe) {
        phpIframe.onclick = toggleFrame;
    }
    if (runtimeVal) {
        if (iniVal.innerHtml == runtimeVal.innerHtml) {
            runtimeVal.style.color = "blue";
            runtimeVal.style.font = 'normal';
        } else
        if (iniVal.innerHtml != runtimeVal.innerHtml) {
            runtimeVal.style.color = "red";
            runtimeVal.style.font = 'bold';
        }
    }

}


function toggleFrame() {
    var phpErrorFrame = 'phpErrorFrame.php';
    var iFrame = document.getElementById("iframeParent");
    if (iFrame.src == '' || iFrame.src != 'phpErrorFrame.php') {
        iFrame.src = phpErrorFrame;
    }
    return false;
}

function popUpTable(thisClick) {
    var targetDoc = "errorLevelTable.php";
    newWinUp = window.open((targetDoc), "errorTable", "height=812,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes");
    newWinUp.focus();
    return false;
}

function jsControlsIndex() {
    var indexNav, js2index = document.getElementById("js2index");
    if (document.getElementById("indexNav")) {
        indexNav = document.getElementById("indexNav");
        js2index.innerHTML = indexNav.innerHTML;
    } else {
        js2index.innerHTML = '<a href="index.php" title="index.php">Reload</a> [top]';
    }
}

function scanCssLoaders() {

    var dh, dl, docHeads, docHead, docLinks, frameLocked, frameUnlocked,
        getHeadLock, headLock, linkMakeLock, getHeadUnlock, headUnlock,
        linkMakeUnlock, lockHandler, thisDocHead, thisDocLink, lockBool,
        unlockBool, lockLink, unlockLink, docLinksPrint, thisHref,
        mainFrameContainer, lockFrameAnchor;

    lockHandler = document.getElementById("lockFrameLoader");
    mainFrameContainer = document.getElementById("mainFrameContainer");
    lockFrameAnchor = document.getElementById("lockFrameAnchor");

    thisDocHead = document.getElementsByTagName("head");
    docLinks = document.getElementsByTagName("link");
    docHead = thisDocHead[0];

    function lockFrame() {

        getHeadLock = document.getElementsByTagName("head");
        headLock = getHeadLock[0];
        linkMakeLock = document.createElement('link');
        linkMakeLock.setAttribute('type', "text/css");
        linkMakeLock.href = "assets/css/lockframe.css";
        linkMakeLock.setAttribute('id', "lockFrame");
        headLock.appendChild(linkMakeLock);
        // added the following when successful link append did not work
        mainFrameContainer.style.position = "fixed";
        mainFrameContainer.style.top = "0.5em";
        mainFrameContainer.style.right = "8%";
        mainFrameContainer.style.width = "65%";
        lockFrameAnchor.innerHTML = "Unlock Frame";

        return;

    }

    function unlockFrame() {

        getHeadUnlock = document.getElementsByTagName("head");
        headUnlock = getHeadUnlock[0];
        linkMakeUnlock = document.createElement('link');
        linkMakeUnlock.setAttribute('type', "text/css");
        linkMakeUnlock.href = "assets/css/unlockframe.css";
        linkMakeUnlock.setAttribute('id', "unlockFrame");
        headUnlock.appendChild(linkMakeUnlock);
        // added the following when successful link append did not work
        mainFrameContainer.style.position = "relative";
        //mainFrameContainer.style.top = "0.5em";
        mainFrameContainer.style.right = "0%";
        mainFrameContainer.style.width = "96%";
        mainFrameContainer.style.zIndex = "5";
        lockFrameAnchor.innerHTML = "Lock Frame";
        return;
    }

    lockHandler.onclick = function () {
        // docLinksPrint = document.getElementById("docLinks");
        for (dl = 0; dl < docLinks.length; dl = dl + 1) {


            thisDocLink = docLinks[dl];
            thisHref = thisDocLink.href;
            // docLinksPrint.innerHTML = "link" + dl + ".href: " +thisHref+ "<br />\n";

            if (thisDocLink.id == "unlockFrame") {
                unlockBool = 1;
                lockBool = 0;
                unlockLink = thisDocLink;
            }
            if (thisDocLink.id == "lockFrame") {
                lockBool = 1;
                unlockBool = 0;
                lockLink = thisDocLink;
            }
        }
        if (lockBool == 1) {
            docHead.removeChild(lockLink);
            return unlockFrame();
        }
        if (unlockBool == 1) {
            docHead.removeChild(unlockLink);
            return lockFrame();
        }

    };

    // logic: check for locked or unlocked link ID.
    // remove existing link as appropriate and create the opposite
}


function toggleObject(toggObject) {
    var targetObj;

    targetObj = toggObject;

    if (targetObj.style.display !== "block") {
        targetObj.style.display = "block";
    } else {
        targetObj.style.display = "none";
    }

    if (toggObject.style.display !== "block") {
        toggObject.style.display = "block";
    } else {
        toggObject.style.display = "none";
    }
    return false;
}

function toggleObjectById(toggObject) {
    var targetObj;

    targetObj = document.getElementById(toggObject);

    if (targetObj.style.display !== "block") {
        targetObj.style.display = "block";
    } else {
        targetObj.style.display = "none";
    }
    return false;
}

function loadIframe(whatclick) {
    var anchorClicked, clickId, node2style, jsLoadIframeDump, mainFrame, parentListItem, frameName, i, mainFrameStyleStr = '';

    // Use the clicked filename as anchorClicked
    anchorClicked = whatclick;

    // Get references to DOM elements
    mainFrame = document.getElementById("mainFrame");
    frameName = document.getElementById("frameName");
    jsLoadIframeDump = document.getElementById("jsLoadIframeDump");
    node2style = "navAnchor_" + anchorClicked;
    clickId = document.getElementById(node2style);
    clickId.setAttribute('class', 'active');
    parentListItem = clickId.parentNode;

    // Update the style of the clicked anchor
    if (clickId.style.backgroundColor !== "navy") {
        clickId.style.backgroundColor = "rgba(255,255,255,0.5)";
        clickId.style.color = "rgba(0,0,0,0.2)";
    }

    if (parentListItem.style.backgroundImage !== "none") {
        parentListItem.style.backgroundImage = "none";
        parentListItem.style.backgroundColor = "rgba(205,235,235,0.4)";
        parentListItem.style.color = "rgba(0,0,0,0.2)";
        parentListItem.style.firstLetter = "#fff";
        parentListItem.style.border = "none";
    }

    // Modify the path here: Remove '/public' from the anchorClicked
    var filePath = anchorClicked.replace('/public', '');  // This line removes /public from the path

    // Set the iframe's src attribute to the correct path
    mainFrame.src = filePath;

    // Update the frame name on the page
    frameName.innerHTML = filePath;

    // Set iframe border style
    if (!mainFrame.style.border || mainFrame.style.borderColor === "purple") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "white";
        mainFrame.style.borderWidth = "0.1rem";
    } else if (mainFrame.style.borderColor === "white") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "black";
        mainFrame.style.borderWidth = "0.1rem";
    } else if (mainFrame.style.borderRightStyle) {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "purple";
        mainFrame.style.borderWidth = "0.1rem";
    }

    // Debugging the style properties of the iframe (optional)
    for (i = 0; i < mainFrame.style.length; i++) {
        mainFrameStyleStr += "\n" + 'mainFrame.style[i]:' + mainFrame.style[i].text + "<br />";
    }
}

function load3rdFrame(whatclick) {

    var anchorClicked, jsLoadIframeDump, frameTitler, mainFrame, frameName, i, mainFrameStyleStr = '';
    anchorClicked = whatclick;
    mainFrame = document.getElementById("mainFrame");
    frameName = document.getElementById("frameName");
    frameTitler = document.getElementById("frameTitler");
    if (document.getElementById("jsLoadIframeDump")) {
        jsLoadIframeDump = document.getElementById("jsLoadIframeDump");
    }
    mainFrame.src = anchorClicked;
    frameName.innerHTML = anchorClicked;
    if (!mainFrame.style.border || mainFrame.style.borderColor === "purple") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "red";
        mainFrame.style.borderWidth = "0.1rem";

    } else if (mainFrame.style.borderColor === "red") {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "blue";
        mainFrame.style.borderWidth = "0.1rem";
    } else if (mainFrame.style.borderRightStyle) {
        mainFrame.style.borderStyle = "ridge";
        mainFrame.style.borderColor = "purple";
        mainFrame.style.borderWidth = "0.1rem";
    }
    for (i = 0; i < mainFrame.style.length; i++) {
        mainFrameStyleStr += mainFrame.style[i] + ":" + mainFrame.style[i].text + "<br />";
    }
}

 

function justTitleIt() {

    var firstFrame, secondFrame, frameTitle;
    secondFrame = this.frameSource;
    firstFrame = document.getElementById("mainFrame");
    frameTitle = document.getElementById("frameName");

    if (firstFrame.src !== secondFrame.src) {
        frameTitle.innerHTML = secondFrame.src;
    }
}

function goBackFrame() {
    window.history.back();
}



function frame2top() {

    var currentFrame, frameUrl, frameNameOld, frameNameNew;

    currentFrame = this.document.getElementById("mainFrame");
    frameUrl = currentFrame.src;
    // GET URL of IFRAME

    frameNameOld = this.document.getElementById("frameName");
    // GET AN ELEMENT TO show function is executing

    frameNameNew = frameNameOld;
    frameNameNew.innerHTML = "loading: " + frameUrl;
    // set inner HTML of frameName to indicate action

    window.location.href = frameUrl;
    // load iframe source into window.location.href

    return;


}

function onloadLoop(getFunky) {

    var onloadPartial = window.onload;

    if (typeof onloadPartial === "function") {
        window.onload = function () {

            if (onloadPartial) {
                onloadPartial();
            }
            getFunky();
        };
    } else {
        window.onload = getFunky;
    }
}

onloadLoop(initLoaders);
// onloadLoop(frameLockMgt);
onloadLoop(jsControlsIndex);
onloadLoop(scanCssLoaders);
onloadLoop(runStuff);
// onloadLoop(checkVisits);
// onloadLoop(initForm);

/**
 *
 * @end_file: showme-hideme.js
 *
 **/
