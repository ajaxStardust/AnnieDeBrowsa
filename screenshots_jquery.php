<?php
if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', rtrim(dirname(__FILE__), 'public/inc'));
}
$abspath = ABSOLUTELOCATION;
$serversoftware = $_SERVER['SERVER_SOFTWARE'];
$servername = $_SERVER['SERVER_NAME'];
date_default_timezone_set('EST');
$page_heading = 'Screenshots and Thumbnails';
$title = 'screenshots rendering page';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
require 'public/class/class-cwthumbs.php';

$cwThumbsClass = new cwThumbs;

if (isset($_POST['imgDirSearch'])) {
    $newimagesdir = $_POST['imgDirSearch'];
    if (is_dir($newimagesdir)) {
        $cwThumbs = $cwThumbsClass->makeThumbs($newimagesdir, $none = NULL);
        $number_of = count($cwThumbs);
        $notice_of_images = "<h4>Success:</h4><p>Found $number_of images.</p>";
    } else {
        $cwThumbs = $cwThumbsClass->makeThumbs('assets/screenshots', $none = NULL);
        $notice_of_images = '<h4>Notice:</h4><p>The directory you entered is not a valid path.</p>';
    }
} else {
    $cwThumbs = $cwThumbsClass->makeThumbs('assets/screenshots', $none = NULL);
    $number_of = count($cwThumbs);
    $notice_of_images = "<h4>Info:</h4><p>Found $number_of screenshots.</p>";
}

$imgDir = $cwThumbsClass->imagesDir;
$imgNumber = $cwThumbsClass->thumbsCount;

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php print $title; ?>
  </title>
  <link rel="icon" type="image/ico" href="favicon.ico">
  <link rel="shortcut icon" type="image/ico" href="favicon.ico">
  <style>
/** if needed add style here */
  </style>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
        crossorigin="anonymous">    <!-- BOOTSTRAP STYLE -->
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link 
        href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" 
        rel="stylesheet">
    <link 
        href="assets/css/notes.css" 
        rel="stylesheet" 
        type="text/css">
    <script src="assets/js/showme-hideme.js"></script>
    <link rel="stylesheet" href="assets/css/lightslider.css">
		<style>
			ul{
					list-style: none outside none;
				    padding-left: 0;
		            margin: 0;
				}
		        .demo .item{
		            margin-bottom: 60px;
		        }
				.content-slider li{
				    background-color: #ed3020;
				    text-align: center;
				    color: #FFF;
				}
				.content-slider h3 {
				    margin: 0;
				    padding: 70px 0;
				}
				.demo{
					width: 800px;
				}
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/lightslider.js"></script>
		<script>
			$(document).ready(function() {
					$("#content-slider").lightSlider({
		                loop:true,
		                keyPress:true
		            });
		            $('#image-gallery').lightSlider({
		                gallery:true,
		                item:1,
		                thumbItem:9,
		                slideMargin: 0,
		                speed:500,
		                auto:true,
		                loop:true,
		                onSliderLoad: function() {
		                    $('#image-gallery').removeClass('cS-hidden');
		                }  
		            });
				});
		</script>

</head>

<body>

  <div id="pagewidth" class="container">
 
    <section id="slideshow">  <!-- #HEADER -->
        <h1 class="bg-dark text-light text-end pe-3"><?php print $page_heading; ?></h1>
        
        <?php
            $contactSheet = '<div class="demo">
        <div class="item">            
            <div class="clearfix" style="max-width:474px;">
            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            ';
            if (isset($cwThumbs) && is_array($cwThumbs)) {
                foreach ($cwThumbs as $cwKey => $cwImg) {
                    $cwimg_path = $imgDir . '/' . $cwImg;
                    $imgCounter = $imgNumber[$cwKey];
                    $contactSheet .= '<li data-thumb="assets/screenshots/' . $cwImg . '"> <img src="assets/screenshots/' . $cwImg . '"> </li>
                    ';
                }
            } else {
                $contactSheet .= '<li class="bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews.</li><li>Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of<ul><li><pre>
                 does not exist</pre></li><li><pre>
                 is not an array</pre></li><li><pre>has not been properly set</pre></li></ul>' . "\n";
            }
            $contactSheet .= "</ul> \n </div> \n </div> \n </div> \n";

            print $contactSheet;
            print " \n <hr id=\"clearImgShow\" /> \n";
        ?>
 
    </section>
     
    <footer class="footer px-4">                   <!--    .FOOTER     -->
        <div class="row gx-5">
            <div class="col"><div class="p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust" target="_blank" title="View original">@ajaxStardust</a> <em>Laravel</em> notes:</div></div>
            <div class="col"><div class="p-3 border bg-light text-end"><kbd><?php echo $lastMod; ?></kbd></div></div>
        </div>
    </footer>      
  </div>                                            <!--    .content  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
