<?php
 
 namespace P2u2\View;
use P2u2\Model\Cwthumbs as Cwthumbs;
use P2u2\Model\Functions as Functions;
 $cwThumbs = new Cwthumbs;
 $Functions = new Functions;
 // $getImages = $Functions->proces_thumbs("assets/slideshow");
 // $getImages = $Cwthumbs->getImages("assets/slideshow");

$contactSheet = '<div class="sans-serif demo">
<div class="sans-serif item">
    <div class="sans-serif clearfix" style="max-width:474px;">
    <ul id="image-gallery" class="sans-serif gallery list-unstyled cS-hidden">
    ';

// check for presence of slide images
if (isset($getImages) && is_array( $getImages)) {
    foreach ( $getImages as $cwKey => $cwImg) {
        $cwimg_path = $imgDir . '/' . $cwImg;
        $imgCounter = $imgNumber[$cwKey];
        $caption = preg_replace('/(.*)(vscode_)([^_]+)(_\d+\.png)(.*)/', '$3', $cwImg);
        // in loop construct append more html to string
        // this appears to be a use of attribute, "data-thumb"
        $contactSheet .= '<li data-thumb="assets/images/vscode/' . $cwImg . '"> <figure><figcaption class="sans-serif text-end">' . $caption . '</figcaption><img src="assets/images/vscode/' . $cwImg . '"></figure></li>
            ';
    }
} else {
		// shitty error handling
    $contactSheet .= '<li class="sans-serif bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews.</li><li>Specifically, the ADB PHP-class, <em>Cwthumbs</em> fails the logical condition of<ul><li><pre>
            does not exist</pre></li><li><pre>
            is not an array</pre></li><li><pre>has not been properly set</pre></li></ul>' . "\n";
}
    $contactSheet .= "</ul> \n </div> \n </div> \n </div> \n";
if (strlen($contactSheet) > 20) {
    print $contactSheet;
} else {
    print '<p class="sans-serif notice">No screenshots to display</p>';
}
    print '<p class="sans-serif info">Click to <a href="./index.html" title="view full size">select the screenshot</a> you wish to view full size.</p>';
