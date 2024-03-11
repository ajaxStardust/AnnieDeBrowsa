<?php
// ENABLE CORS (Cross-Origin Request) policy allow all
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/New_York');
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
if (!empty($GLOBALS['_REQUEST']['path2url'])) {
    define('REQUESTURL', $GLOBALS['_REQUEST']['path2url']);
}
if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', dirname(__FILE__));
}
$abspath = ABSOLUTELOCATION;
$page_heading = 'Convert System Path to HTTP URL';
if ($page_heading == '&#x201c;Simple Template&#x201d;') {
    $real_page_heading = pathinfo(__FILE__, PATHINFO_FILENAME);
} else {
    $real_page_heading = $page_heading;
}
$pathinfo_basename = pathinfo(__FILE__, PATHINFO_BASENAME);
$title_name = pathinfo(__FILE__, PATHINFO_FILENAME);
$title = $pathinfo_basename . ' @ ' . ABSOLUTELOCATION;

$serversoftware = $_SERVER['SERVER_SOFTWARE'];
$server_name = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
$server_addr = $_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['SERVER_NAME'];
$servername = $server_name;
if (preg_match('@10\.0\.0\.\d+|192\.\d+\.\d+\.\d+|127\.\d+\.\d+\.\d+@', $server_addr)) {
    $abspath = '<code class="info">' . $abspath . '</code>';
} else {
    $abspath = '<div class="info">Uses  PHP Variables like <code>define( ABSOLUTELOCATION , dirname(__FILE__))</code>. E.g. See ABSPATH in WordPress.</div>';
}

function clean_url_chars($url_2_convert)
{
    $url_2_convert = preg_replace('/"/', '', $url_2_convert);
    $url_2_convert = preg_replace('/ /', '%20', $url_2_convert);
    $url_2_convert = preg_replace('/%20$/', '', $url_2_convert);
    $url_2_convert = str_ireplace('file://', '', $url_2_convert);
    $url_2_convert = preg_replace('@([\x5c\x2f])@', '/', $url_2_convert);

return $url_2_convert;
}

function filter_path_to_url($get_path2url, $servername, $server_addr)
{
    /**
     * to see everything, uncomment this var
     * $filtered_url = $_SERVER;
     */
    $filtered_url['servername'] = $servername;
    $filtered_url['server_addr'] = $server_addr;
    if (!empty($get_path2url)) {
        $filtered_url['html'] = '<div>$_GET[path2url] = <strong class="red">' . $get_path2url . '</strong></div>';
        $filtered_url['strirep'] = clean_url_chars($get_path2url);
        $filtered_url['html'] .= '<div class="blue">clean_url_chars($_GET[path2url]) { <strong class="red">' . trim($filtered_url["strirep"], "\n\r\t\v\ ") . '</strong> }</div>';

        // SET THIS STRING TO THE LAN WINDOWS PATH OF LINUX SYSTEM:
        if (preg_match('@([\x5c\x2f]{1,2})(wsl\.localhost[\x5c\x2f]{1,2})([^\x5c\x2f]+)@', $filtered_url['strirep'])) {
            $filtered_url['strirep'] = preg_replace('@([\x5c\x2f])(wsl\.localhost[\x5c\x2f])([^\x5c\x2f]+)@', '', $filtered_url['strirep']);
            $filtered_url['servername'] = 'wsldebian';
        } else {
            $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
            /* $filtered_url['servername'] = empty($filtered_url['server_name']) ? $filtered_url['servername'] : $filtered_url['server_name']; */
        }
        switch ($filtered_url['strirep']) {
            case (preg_match('@[Zz]:[\\\\/]@', $filtered_url['strirep']) ? true : false):
                $filtered_url['html'] .= '<div class="clear" id="filteredurl_' . __LINE__ . '">filtered_url[strirep]: ' . $filtered_url['strirep'] . '</div>';
                $filtered_url['strirep'] = preg_replace('@([\x5c\x2f])@', '\\', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('Z:\\', '', $filtered_url['strirep']);
                $filtered_url['servername'] = $_SERVER['HTTP_HOST'];
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                /* $filtered_url['servername'] = empty($filtered_url['server_name']) ? $filtered_url['servername'] : $filtered_url['server_name']; */
                break;
            case (preg_match('@[Ww]:[\\\\/]@', $filtered_url['strirep']) ? true : false):
                $filtered_url['html'] .= '<div class="clear" id="filteredurl_' . __LINE__ . '">filtered_url[strirep]: ' . $filtered_url['strirep'];
                $filtered_url['strirep'] = preg_replace('@([\x5c\x2f])@', '\\', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('W:\\', '', $filtered_url['strirep']);
                $filtered_url['servername'] = $_SERVER['HTTP_HOST'];
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                break;
            case (preg_match('@/var/www/flux@', $filtered_url['strirep']) ? true : false):
                $filtered_url['html'] .= '<div class="clear" id="filteredurl_' . __LINE__ . '">filtered_url[strirep]: ' . $filtered_url['strirep'];
                $filtered_url['strirep'] = str_ireplace('/var/www/flux/', '', $filtered_url['strirep']);
                $filtered_url['servername'] = 'mx23flux';
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                $filtered_url['all'] = preg_match_all('@(?!=[\\\\/]*)(\/?var)([\\\\/]*www)([\\\\/]*[^\/]+)(?=[\x0A\x0D])?@', $filtered_url['strirep'], $pregall);
                if (!defined('PREGALL')) {
                    define('PREGALL', $pregall);
                }
                $filtered_url['strirep'] = preg_replace('@(?!=[\\\\/]*)(\/?var)([\\\\/]*www)([\\\\/]*[^\/]+)(?=[\x0A\x0D])?@', '$3', $filtered_url['strirep']);
                if (defined('PREGALL')) {
                    $pregAllHtml = '<div id="pregall_array">';
                    if (is_array(PREGALL)) {
                        $pregAllHtml .= '<ol>';
                        foreach (PREGALL as $pregK => $pregV) {
                            if (is_array($pregV)) {
                                $pregjson = json_encode(PREGALL);
                                // crazy preg_match_all:
                                // echo $pregjson;
                                foreach ($pregV as $prrK => $prrV) {
                                    $pregAllHtml .= '<li>key[' . $pregK . '][' . $prrK . ']: ' . $prrV . ' @line: ' . __LINE__ . '</li>';
                                }
                            } else {
                                $pregAllHtml .= '<li>key[' . $pregK . ']: ' . $pregV['0'] . ' @line: ' . __LINE__ . '</li>';
                                //      echo 'print_r[pregV]: ' . var_dump($pregV);
                            }
                        }
                        $pregAllHtml .= '</ol>';
                    } else {
                        $pregAllHtml .= PREGALL . '</div>';
                    }
                    //   echo $pregAllHtml;
                }
                break;
            case (preg_match('@/var/www/html@', $filtered_url['strirep']) ? true : false):
                $filtered_url['html'] .= '<div class="clear" id="filteredurl_' . __LINE__ . '">filtered_url[strirep]: ' . $filtered_url['strirep'];
                $filtered_url['strirep'] = str_ireplace('/var/www/html/', '', $filtered_url['strirep']);
                if (preg_match('@^([Yy]:)@', $filtered_url['strirep'])) {
                    $filtered_url['strirep'] = preg_replace('@^(\w:)@', '', $filtered_url['strirep']);
                    $filtered_url['servername'] = 'localhost';
                    $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                } else {
                    $filtered_url['servername'] = 'localhost';
                    $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                    $filtered_url['strirep'] = preg_replace('@([\\\\/]*var)([\\\\/]*www)([\\\\/]*[^\/]+)(?=[\x0A\x0D])?@', '$3', $filtered_url['strirep']);
                }
                $filtered_url['strirep'] = preg_replace('@(?!=[\\\\/]*)(\/?var)([\\\\/]*www)([\\\\/]*[^\/]+)(?=[\x0A\x0D])?@', '$3', $filtered_url['strirep']);
                if (defined('PREGALL')) {
                    $pregAllHtml = '<div id="pregall_array">';
                    if (is_array(PREGALL)) {
                        $pregAllHtml .= '<ol>';
                        foreach (PREGALL as $pregK => $pregV) {
                            if (is_array($pregV)) {
                               // $pregjson = json_encode(PREGALL);
                                // crazy preg_match_all:
                                // echo $pregjson;
                                foreach ($pregV as $prrK => $prrV) {
                                    $pregAllHtml .= '<li>key[' . $pregK . '][' . $prrK . ']: ' . $prrV . ' @line: ' . __LINE__ . '</li>';
                                }
                            } else {
                                $pregAllHtml .= '<li>key[' . $pregK . ']: ' . $pregV['0'] . ' @line: ' . __LINE__ . '</li>';
                                //  echo 'print_r[pregV]: ' . var_dump($pregV);
                            }
                        }
                        $pregAllHtml .= '</ol></div>';
                    } else {
                        $pregAllHtml .= PREGALL . '</div>';
                    }
                    // echo $pregAllHtml;
                }

                break;
            case (preg_match('/.*mxlinux.*/', $filtered_url['strirep']) ? true : false):
                $filtered_url['strirep'] = preg_replace('@([\x5c\x2f]*)(mxlinux\-21)([\x5c\x2f]*)(html)@', '\\', $filtered_url['strirep']);
                $filtered_url['servername'] = $_SERVER['HTTP_HOST'];
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];

                break;
            case ((preg_match('/.*mx23.*/', $filtered_url['strirep'])) ? true : false):
                $filtered_url['strirep'] = preg_replace('@([\/]*var)([\/]*www)([\/]*[^\/]+[\/]?)([\/]*[^\/]+)?(?=[\x0A\x0D])?@', '\\', $filtered_url['strirep']);
                $filtered_url['servername'] = 'localhost';
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                break;
            case (preg_match('@[Vv]:[\x5c\x2f]{1,2}[Dd]evelopment@', $filtered_url['strirep']) ? true : false):
                $filtered_url['strirep'] = preg_replace('@([\x5c\x2f])@', '/', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('V:/Development/Apache2/htdocs', '', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('V:\Development\Apache2\htdocs', '', $filtered_url['strirep']);
                $filtered_url['servername'] = $_SERVER['HTTP_HOST'];
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                break;
            case (preg_match('@[Vv]:[\x5c\x2f]{1,2}[Dd]evel@', $filtered_url['strirep']) ? true : false):
                $filtered_url['strirep'] = preg_replace('@([\x5c\x2f])@', '/', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('V:/Devel/Apache2/htdocs', '', $filtered_url['strirep']);
                $filtered_url['strirep'] = str_ireplace('V:\Devel\Apache2\htdocs', '', $filtered_url['strirep']);
                $filtered_url['servername'] = $_SERVER['HTTP_HOST'];
                $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
                break;
        }
        $filtered_url['servername'] = !empty($filtered_url['servername']) ? $filtered_url['servername'] : $filtered_url['server_addr'];
        $regexsearch = '@([\/]*var)([\/]*www)([\/]*[^\/]+[\/]?)([\/]*[^\/]+)?(?=[\x0A\x0D])?@';
        $replaceref = "'\$4'";
        $filtered_url['url_result'] = $filtered_url['servername'] . '/' . preg_replace($regexsearch, '$4', $filtered_url['strirep']);
        $filtered_url['http_url_final'] = '<div id="processed_hyperlink"><strong>Resulting Hyperlink: </strong><a href="//' . $filtered_url['url_result'] . '" title="'
            . $filtered_url['strirep'] . '" target="_blank">'
            . $filtered_url['url_result'] . '</a></div>';
        return $filtered_url;
    }
}

/* $regexsearch = '@([\\\\/]*var)([\\\\/]*www)([\\\\/]*[^\/]+[\\\\/]?)([\\\\/]*[^\/]+)?(?=[\x0A\x0D])?@';
$replaceref = "'\$4'";
$get_path2url = !empty($_GET['path2url']) ? $_GET['path2url'] : '/var/www/html';
$strirep = clean_url_chars($get_path2url); */

function chop_varwww($regexsearch, $replaceref, $strirep)
{
    return preg_replace($regexsearch, '$4', $strirep);
}

require 'public/class/class-cwthumbs.php';
$cwThumbsClass = new cwThumbs;
if (isset($_POST['imgDirSearch'])) {
    $newimagesdir = $_POST['imgDirSearch'];
    if (is_dir($newimagesdir)) {
        $cwThumbs = $cwThumbsClass->makeThumbs($newimagesdir, $none = NULL);
        $number_of = count($cwThumbs);
        $notice_of_images = "<h4>Success:</h4><p>Found $number_of images.</p>";
    } else {
        $cwThumbs = $cwThumbsClass->makeThumbs('assets/images/vscode', $none = NULL);
        $notice_of_images = '<h4>Notice:</h4><p>The directory you entered is not a valid path.</p>';
    }
} else {
    $cwThumbs = $cwThumbsClass->makeThumbs('assets/images/vscode', $none = NULL);
    $number_of = count($cwThumbs);
    $notice_of_images = "<h4>Info:</h4><p>Found $number_of screenshots.</p>";
}
$imgDir = $cwThumbsClass->imagesDir;
$imgNumber = $cwThumbsClass->thumbsCount;
$enterpathhere = isset($_GET['path2url']) ? $_GET['path2url'] : ABSOLUTELOCATION;
$nav_pathInfo = pathinfo(__FILE__, PATHINFO_ALL);
function filter_path($url, $servername, $server_addr)
{
    /**
     * to see everything, uncomment this var
     * $filtered_path = $_SERVER;
     */
     $filtered_path['url'] = $url;
    $filtered_path['servername'] = $servername;
    $filtered_path['server_addr'] = $server_addr;
    $filtered_path['servername'] = !empty($filtered_path['servername']) ? $filtered_path['servername'] : $filtered_path['server_addr'];
    return $filtered_path['servername'];
}
$goUp = [];

$goUp["subject"] = $nav_pathInfo['dirname'];
$goUp["replace"] = '';
$goUp["search"] = '@^(.*(?=(/).*))@';
$goUp["result"] = preg_replace($goUp["search"], $goUp["replace"], $goUp["subject"]);
$goUp["url"] = str_ireplace($goUp["result"], $goUp["replace"], $goUp["subject"]);
$goUp['url'] = preg_replace('/([^\/]+\/)+([^\/]+)/','$2',$goUp['url']);
//$goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'],$servername,$server_addr).$goUp['url'];

$depth = substr_count($goUp['subject'], '/');
echo '<br>depth: ' .$depth;
if($depth < 5) {

    // $goUp['url'] = $_SERVER['HTTP_HOST'];
    $goUp['url'] = filter_path($_SERVER['DOCUMENT_ROOT'],$servername,$server_addr);
    echo '<div id="gouptest">Depth < 5<ol>';

    foreach ($goUp as $guKey => $guVal) {
        echo '<li>goUp['.$guKey.']: '.$guVal.'</li>';
    }

    echo '</ol></div>';
}


?>
<!DOCTYPE html>
<html lang="en">

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- BOOTSTRAP STYLE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="assets/css/notes.css" rel="stylesheet">
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <style>
    .clear {
        clear: none;
    }
.clear::before {
	content:'\x0a\x0d';
clear:both;
}

    .regex-input,
    .regex-pattern,
    .regex-replace {
        font-family: consolas, curior, monospace;
        font-size: smaller;
    }

    .regex-input {
        color: red;
    }

    .regex-pattern {
        color: blue;
    }

    .regex-replace {
        color: green;
    }

    ul {
        list-style: none outside none;
        padding-left: 0;
        margin: 0;
    }

    .demo .item {
        margin-bottom: 60px;
    }

    .content-slider li {
        background-color: #ed3020;
        text-align: center;
        color: #FFF;
    }

    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }

    .demo {
        width: 800px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/lightslider.js"></script>
    <script>
    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop: true,
            keyPress: true
        });
        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 9,
            slideMargin: 0,
            speed: 500,
            auto: true,
            loop: true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
    </script>
</head>

<body>
    <div id="pagewidth" class="container">
        <section id="slideshow">
            <!-- #HEADER -->
            <section id="header">
                <h1 class="bg-dark text-light text-end pe-3"><?php echo $page_heading; ?></h1>
                <p><a href="https://github.com/ajaxStardust/AnnieDeBrowsa" target="_blank"><img
                            src="https://github-readme-stats.vercel.app/api/pin/?username=ajaxStardust&amp;repo=AnnieDeBrowsa&amp;show_owner=true"
                            alt="Status" /></a></p>
            </section>

            <?php echo '<p><strong>ABSOLUTELOCATION</strong>:</p><p style="margin-top:-1rem;">' . $abspath . '</p>'; ?>
            <div id="quickentry">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" id="p2u2top" method="GET">
                    <label for="path2url" class="xhidden">_GET['path2url']:</label>
                    <input type="text" name="path2url" id="path2url" value="<?php print $enterpathhere; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">New Hyperlink</button>
                </form>
            </div>
            <?php
echo '<div class="mt-2 col text-center" id="info_container"><p class="bg-dark text-light">Served by: <span class="bg-dark text-warning">' . $serversoftware . '</span></p>
                <p class="bg-dark text-light">PHP Version: <span class="text-warning">' . phpversion() . '</span></p>
                <p class="bg-dark text-light">Server Name: <span class="text-info">' . $servername . '</span></p>
                <p class="bg-dark text-light">Server Addr: <span class="text-info">' . $server_addr . '</span></p>
                </div>';
$path2url = !empty($_GET['path2url']) ? $_GET['path2url'] : ABSOLUTELOCATION;
$click_url = filter_path_to_url($path2url, $servername, $server_addr);
if (is_array($click_url)) {
    echo '<div id="click_url" class="clear" style="clear:both;"><ol>';
    foreach ($click_url as $clickkey => $clickval) {
        echo '<li id="' . $clickkey . '">' . $clickkey . ': ' . $clickval . '</li>';
    }
    echo '</ol></div>';
} else {
    $click_url = 'not an array';
    echo '<br>not array: <a href="http://localhost">' . $click_url . '</a>';
}
$contactSheet = '<div class="demo">
        <div class="item">            
            <div class="clearfix" style="max-width:474px;">
            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            ';
if (isset($cwThumbs) && is_array($cwThumbs)) {
    foreach ($cwThumbs as $cwKey => $cwImg) {
        $cwimg_path = $imgDir . '/' . $cwImg;
        $imgCounter = $imgNumber[$cwKey];
        $caption = preg_replace('/(.*)(vscode_)([^_]+)(_\d+\.png)(.*)/', '$3', $cwImg);
        $contactSheet .= '<li data-thumb="assets/images/vscode/' . $cwImg . '"> <figure><figcaption class="text-end">' . $caption . '</figcaption><img src="assets/images/vscode/' . $cwImg . '"></figure></li>
                    ';
    }
} else {
    $contactSheet .= '<li class="bold nobull noBull">Sorry, but there is an error in the source, specific to the image resources contact-sheet previews.</li><li>Specifically, the ADB PHP-class, <em>cwThumbs</em> fails the logical condition of<ul><li><pre>
                 does not exist</pre></li><li><pre>
                 is not an array</pre></li><li><pre>has not been properly set</pre></li></ul>' . "\n";
}
$contactSheet .= "</ul> \n </div> \n </div> \n </div> \n";
if (strlen($contactSheet) > 20) {
    print $contactSheet;
    print " \n <hr id=\"clearImgShow\" /> \n";
} else {
    print '<p class="notice">No screenshots to display</p>';
}
print '<p class="alt_link">Click to <a href="http://' . $servername . '/screenshots.phtml" title="view full size">select the screenshot</a> you wish to view full size.</p>';
?>

            <section id="general_notes" class="container">

                <p><a href="https://github.com/ajaxStardust" target="_blank"><img
                            src="https://github-readme-stats.vercel.app/api/?username=ajaxStardust&amp;repo=AnnieDeBrowsa&amp;show_owner=true&amp;show_icons=true"
                            alt="More" /></a></p>

                <div class="notes">


                    <p>This <span class="black">WordPressCenter.net <em>path2url</em></span> application uses
                        conditioinal logic on the path to return a viable HTTP URL. It may not output the desired URL
                        without some simple code tweaking.</p>
                    <p class="smaller">NOTE: Should an unexpected System Path result in a <em>bad URL</em>, please
                        submit it to <a href="https://github.com/ajaxStardust" target="_blank"
                            title="View original">@ajaxStardust</a> so the application logic might be improved. Thank
                        you!</span></p>
                </div> <!--  $    div   .notes    $   -->
            </section> <!--    $   section   #general_notes  .container    $   -->
            <section class="container">
            </section> <!-- $  section .container          -->
            <section class="footer px-4">
                <!--    .FOOTER     -->
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust"
                                target="_blank" title="View original">@ajaxStardust</a> <em>Laravel</em> notes:</div>
                    </div>
                    <div class="col">
                        <div class="p-3 border bg-light text-end"><kbd><?php echo $lastMod; ?></kbd></div>
                    </div>
                </div>
            </section>
    </div> <!--    .content  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>