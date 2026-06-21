<?php
namespace ADB\Public\Content;
?>

<article id="mainFrameContainer" class="mh0">
    <div id="frameTitler">Send &#x3c;<span class="trigger" id="send2top" onclick="frame2top()"><a class="f3" title="send frame to top">iframe</a></span>&#x3e; to main view. current src: <span id="frameName"><?php print $defaultIframe; ?></span>
    </div>
    <!--    $   id:frameTitler  $   -->
    <iframe class="w-100 vh-100 float-right" title="frame content as selected in main navigation" src="default.php" id="mainFrame">
    </iframe>
</article>
</main>