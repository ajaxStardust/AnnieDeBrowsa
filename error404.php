<?php

header('Access-Control-Allow-Origin: *'); // ENABLE CORS (Cross-Origin Request) policy allow all
date_default_timezone_set('America/New_York');
$page_heading = 'p2u2 - path 2 url 2';
$title = 'path to url converter 2023';
$lastMod = "Modified: " . date("D M j Y G:i:s T", getlastmod());

if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', rtrim(dirname(__FILE__), "inc"));
}
$abspath = ABSOLUTELOCATION;

$page_heading = 'Convert System Path to HTTP URL';
$title = 'p2u2 - ' . ABSOLUTELOCATION;
$serversoftware = $_SERVER['SERVER_SOFTWARE'];
$servername = $_SERVER['SERVER_NAME'];
$server_addr = $_SERVER['SERVER_ADDR'];

function clean_url_chars($url_2_convert)
{
    // if(!preg_match('@/var/www/html@', $_GET['path2url'])){
    if (!empty($_GET['path2url'])) {

        $url_2_convert = preg_replace('/"/', "", $url_2_convert);
        $url_2_convert = preg_replace("/ /", "%20", $url_2_convert);

        $url_2_convert  = str_ireplace('file://', '', $url_2_convert);
        $url_2_convert  = preg_replace('@([\x5c\x2f])@', '/', $url_2_convert);
    }
    return $url_2_convert;
}

if(!empty($_SERVER['HTTP_REFERER'])) {
$http_reefer = $_SERVER['HTTP_REFERER'];
}
else {
$http_reefer = '<strong class="green">UNKNOWN</strong><br>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="generator" content=
    "HTML Tidy for HTML5 for Windows version 5.6.0">
    <title>Server Error on: <?php echo $_SERVER['HTTP_HOST']; ?> | Error No. <?php echo $_SERVER['REDIRECT_STATUS']; ?> </title>
    <style>
body{background-color:#fcfcfc;color:#333333;margin:0;padding:0;}
h1{font-size: 1.5em; font-weight: normal; background-color:#9999cc;min-height:2em;line-height:2em;border-bottom:1pxinsetblack;margin:0;}
h1,p{padding-left:10px;}
code.url { background-color:#eeeeee;font-family:monospace;padding:02px;}
</style>
</head>
<body>
<?php
    // var_dump(print_r($_SERVER));
    if(!empty($_SERVER['HTTP_REFERER'])) {
      $http_reefer = $_SERVER['HTTP_REFERER'];
    }
    else {
      $http_reefer = '<strong class="green">UNKNOWN</strong><br>';
    }
?>

    <h1>Attention <em><?php echo $_SERVER['REMOTE_ADDR']; ?></em></h1>

    <h2>You are experiencing a <em>Server Error</em> : &#35; <?php echo $_SERVER['REDIRECT_STATUS']; ?></h2>
<p><strong>We're sorry, to report that the refering file: <span style="color:#00a;"><?php echo $http_reefer; ?></span></strong>
    <br />has directed you to in invalid URL. There is nothing at the address you are attempting to access.</p>
    <p>The following information may help you to resolve this problem. We are sorry for any inconvenience.</p>

    <p>Your User Agent (i.e. <em>web browser</em>) is:<br />
    <?php echo $_SERVER['HTTP_USER_AGENT']; ?> </p>

    <p><strong>Your IP</strong> address was found to be: <strong> <?php echo $_SERVER['REMOTE_ADDR']; ?> </strong></p>


    <p>This Apache HTTP Server Status Code: <strong> <?php echo $_SERVER['REDIRECT_STATUS']; ?> </strong> <br />
    is <span style="color:blue;">relevant to the server: <?php echo $_SERVER['HTTP_HOST']; ?></span></p>
</body>

</html>

