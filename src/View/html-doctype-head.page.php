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
$title = str_ireplace("/home/admin/web", "", $pathOps);

 
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
    <link id="style_main" rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
        <!-- ATTEMPT TO LOAD existing favicon dynamically  -->
    <link rel="icon" type="<?= $favtype ?>" href="<?= $favicon ?>">
                <!-- USE PATHS TO EXISTING ADB SuPPLIED ICONs  -->
    <link rel="shortcut icon" type="image/png" href="/public/favicon.png">
    <link rel="icon" href="/public/favicon.png" sizes="32x32">
    <link rel="icon" href="/public/favicon.png" sizes="192x192">
    <link rel="icon" href="/public/favicon.png" sizes="16x16">
        <!-- some innovative shit for innovative things by wise old apes  -->
    <link rel="apple-touch-icon" href="/public/favicon.png">
        <!-- some stupid shit idea about silly icons for dying things by legacy of wise old chimps  -->
    <meta name="msapplication-TileImage" content="<?php echo "https://" .
        $_SERVER["DOCUMENT_ROOT"] .
        "/public/assets/svg/public/assets/svg/cannibus_find_plainsvg2.svg"; ?>">


    <link href="assets/css/lightslider.css" rel="stylesheet">
    <link id="tachyons" rel="stylesheet" href="assets/css/tachyons-extended.css">
    <meta name="description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">

    <!-- Open Graph Meta Tags -->
    <meta property="og:url" content="https://transformative.click">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Transformative.Click">
    <meta property="og:description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
    <meta property="og:image" content="https://transformative.click/plaidicon.png">
    <meta property="og:image:width" content="680">
    <meta property="og:image:height" content="680">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="transformative.click">
    <meta property="twitter:url" content="https://transformative.click">
    <meta name="twitter:title" content="Transformative.Click">
    <meta name="twitter:description" content="Single Page Application (SPA) browser for developers with FireBug Lite built-in GitHub://ajaxstardust/AnnieDeBrowsa">
    <meta name="twitter:image" content="https://transformative.click/plaidicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900%26display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">


    <!-- Meta Tags Generated via https://opengraph.dev -->
</head>
