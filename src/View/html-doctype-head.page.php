<?php
namespace Adb\View;

use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Htmldochead as Htmldochead;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Localsites as Localsites;

if (!isset($pathOps)) {
    $pathOps = dirname(dirname(__DIR__));
}

$Adbsoc = new Adbsoc($pathOps);
$Iframe = new Iframe();

$Htmldochead = new Htmldochead($pathOps);

$Localsites = new Localsites();

$bodyid = $Adbsoc->bodyid;
$favtype = $Htmldochead->favtype;
$favicon = $Htmldochead->favicon;
$defaultIframe = $Iframe->mainFrame();
$css = "assets/css/style.css";
// Example usage:
$config = $Adbsoc->getConfig();
$json_urls = $config["home_urls"]; // Assuming $config contains the parsed JSON data
$build_local_urls = $Localsites->getSites($json_urls); // Call the function and output the result
$title = str_ireplace("var/www/", "", $pathOps);

/* 
 * html from head removed
 * <!-- link id="style_chota" rel="stylesheet" href="assets/css/chota.min.css" -->
    <!-- link rel="stylesheet" href="https://unpkg.com/chota@latest" -->
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="meyerreset" rel="stylesheet" type="text/css" href="assets/css/emeyereset.css" media="all">
    <link id="unlockFrame" rel="stylesheet" type="text/css" href="assets/css/unlockframe.css" media="all">
    <link  id="style_main" rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="icon" type="<?= $favtype ?>" href="<?= $favicon ?>">
    <link rel="shortcut icon" type="<?= $favtype ?>" href="<?= $favicon ?>">
    <link rel="icon" href="favicon.ico" sizes="32x32">
    <link rel="icon" href="favicon.ico" sizes="192x192">
    <link rel="icon" href="favicon.ico" sizes="16x16">
    <link rel="apple-touch-icon" href="favicon.ico">
    <meta name="msapplication-TileImage" content="<?php echo "https://" .
        $_SERVER["DOCUMENT_ROOT"] .
        "/public/assets/svg/public/assets/svg/cannibus_find_plainsvg2.svg"; ?>">
    
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.9.0/css/tachyons.min.css">
  <link href="assets/css/lightslider.css" rel="stylesheet">

</head>
