<?php 

namespace Adb;
use Adb\Model\Cwthumbs as cwThumbs;
error_reporting(E_ALL);

if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', rtrim(dirname(__FILE__)));
}
$abspath = ABSOLUTELOCATION;
$serversoftware = $_SERVER['SERVER_SOFTWARE'];
$server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['SERVER_ADDR'];
$server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
$servername = $server_name;
if (preg_match('@10\.0\.0\.\d+|192\.\d\.\d\.\d+|127\.\d\.\d\.\d+@', $server_addr)) {
    $abspath = '<code class="sans-serif info">' . $abspath . '</code>';
} else {
    $abspath = 'is simply a PHP value which relies on server variables<code>define( ABSOLUTELOCATION , rtrim(dirname(__FILE__), inc))</code>';
}


date_default_timezone_set('EST');
$page_heading = 'Screenshots in ./assets/screenshots';
$title = 'screenshots rendering page';
$lastMod = "Modified: " . date("D M j Y G:i:s T", getlastmod());
//if(!class_exists('CwThumbs')){
    include 'src/Model/Cwthumbs.php';
//}

$cwThumbsClass = new cwThumbs(ABSOLUTELOCATION.'public/assets/screenshots');

if(isset($_POST['imgDirSearch'])){
    $newimagesdir = $_POST['imgDirSearch'];
    if(is_dir($newimagesdir)){
    $cwThumbs = $cwThumbsClass->makeThumbs($newimagesdir,$none=NULL);
    $number_of = count($cwThumbs);
    $notice_of_images = "<h4>Success:</h4><p>Found $number_of images.</p>";
    }
    else{
        $cwThumbs = $cwThumbsClass->makeThumbs("assets/screenshots",$none=NULL);   
        $notice_of_images = "<h4>Notice:</h4><p>The directory you entered is not a valid path.</p>";
    }
}

else {
     $cwThumbs = $cwThumbsClass->makeThumbs("assets/screenshots",$none=NULL);   
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
  <link rel="stylesheet" href="assets/css/tachyons-extended.css">
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
    }
    .card {
      background: white;
      border-radius: 0.375rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.2s ease;
    }
    .card:hover {
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }
    .section-title {
      color: #2c3e50;
      border-bottom: 2px solid #3498db;
      padding-bottom: 0.5rem;
    }
    a {
      color: #3498db;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    a:hover {
      color: #2980b9;
      text-decoration: underline;
    }
  </style>
</head>

<body class="sans-serif bg-light-gray">

  <div class="sans-serif w-100">
 
    <!-- Header -->
    <header class="sans-serif bg-dark-blue white pv4 ph3">
      <div class="sans-serif mw9 center">
        <h1 class="sans-serif ma0 mb2 f2 fw7"><?php print $page_heading; ?></h1>
        <p class="sans-serif ma0 mt2 f4 fw4 o-80">Screenshots & Image Gallery</p>
      </div>
    </header>

    <!-- Content -->
    <main class="sans-serif pv4 ph3">
      <div class="sans-serif mw9 center">
          <?php
                          if(isset($notice_of_images)) {
                    echo $notice_of_images;
                }  
        echo '<div class="sans-serif mt-2 col text-center" id="info_container"><p class="sans-serif bg-dark text-light">Served by: <span class="sans-serif bg-dark text-warning">' . $serversoftware . '</span></p>
                <p class="sans-serif bg-dark text-light">PHP Version: <span class="sans-serif text-warning">' . phpversion() . '</span></p>
                <p class="sans-serif bg-dark text-light">Server Name: <span class="sans-serif text-info">' . $servername . '</span></p>
                <p class="sans-serif bg-dark text-light">Server Addr: <span class="sans-serif text-info">' . $server_addr . '</span></p>
                </div>'; 
                ?>                         
        <dl id="outerDL">
         
        <dt class="sans-serif pointer">Show Image Contact Sheet: <span class="sans-serif normal blue pointer" id="morehd2" onclick="showHide('moreinfo2')">[click...]</span></dt>
        <dd id="moreinfo2" class="sans-serif displaynone">
        <?php
            $contactSheet = "<ul id=\"imgShow\"> \n";
            if(isset($cwThumbs) && is_array($cwThumbs)){
                foreach($cwThumbs as $cwKey => $cwImg){
                    $cwImg = $imgDir .'/' . $cwImg;
                    $imgCounter = $imgNumber[$cwKey];
                    $contactSheet .= "<li class=\"imgShowItem\"><a onclick=\"popMeUp('".$cwImg.
                    "')\"><img src=\"".$cwImg."\" alt=\"".$cwImg."\" title=\"img_".$imgCounter.": ".$cwImg."\" /></a></li> \n";
                }
            }
            else{
                $contactSheet .= '<li class="sans-serif bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews. <br />Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of <br /><pre>

                 does not exists, is not an array, is has not been properly set.</li>'."\n";
            }
            $contactSheet .= "</ul> \n";

            print $contactSheet;
            print " \n <hr id=\"clearImgShow\" /> \n";
        ?>
                </dd>
            <dt class="sans-serif pointer">Change Image Directory: <span class="sans-serif normal black pointer" id="morehd1" onclick="showHide('moreinfo1')">[click...]</span></dt>
        <dd id="moreinfo1" class="sans-serif displaynone">
            <form id="changeImageForm" method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
                <input type="text" id="imgDirSearch" name="imgDirSearch" value="" /><br />
                <input type="submit" id="SendImgDir" name="SendImgDir" value="Get New Images!" />
            </form>
        </dd>
            </dl>
            <!-- END OUTERDL -->


        </div><!-- END CENTERED -->
 <?php echo '<p>ABSOLUTELOCATION of this script file: <br><strong><code>' . $abspath . '</code></strong></p>'; ?>
</div>                                        <!--    .notes      -->
    </section>
    <section class="sans-serif footer px-4">                   <!--    .FOOTER     -->
        <div class="sans-serif row gx-5">
            <div class="sans-serif col"><div class="sans-serif p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust" target="_blank" title="View original">@ajaxStardust</a> <em>Laravel</em> notes:</div></div>
            <div class="sans-serif col"><div class="sans-serif p-3 border bg-light text-end"><kbd><?php echo $lastMod; ?></kbd></div></div>
        </div>
    </section>      
  </div>                                            <!--    .content  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
