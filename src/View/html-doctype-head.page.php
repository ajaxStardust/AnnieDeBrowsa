<?php
namespace Adb\View;

use Adb\Model\Adbsoc as Adbsoc;
use Adb\Model\Iframe as Iframe;
use Adb\Model\Localsites as Localsites;
use Adb\Model\Htmldochead as Htmldochead;

if (!isset($pathOps)) {
    $pathOps = dirname(dirname(__DIR__));
}

$Adbsoc = new Adbsoc($pathOps);
$Iframe = new Iframe;

$Htmldochead = new Htmldochead($pathOps);

$Localsites = new Localsites;

$bodyid = $Adbsoc->bodyid;
$favtype = $Htmldochead->favtype;
$favicon = $Htmldochead->favicon;
$defaultIframe = $Iframe->mainFrame();
$css = 'assets/css/style.css';
// Example usage:
$config = $Adbsoc->getConfig();
$json_urls = $config['home_urls'];  // Assuming $config contains the parsed JSON data
$build_local_urls = $Localsites->getSites($json_urls);  // Call the function and output the result
$title = str_ireplace('var/www/','',$pathOps);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>

    <meta charset="UTF-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <link
        rel="icon"
        type="<?= $favtype; ?>"
        href="<?= $favicon; ?>"
    >
    <link
        rel="shortcut icon"
        type="<?= $favtype; ?>"
        href="<?= $favicon; ?>"
    >
    <!-- Eric Meyer Reset CSS -->
    <link
        id="meyerreset"
        rel="stylesheet"
        type="text/css"
        href="assets/css/emeyereset.css"
        media="all"
    >
    <!-- CSS for use in the javascript lock/unlock frame -->
    <link
        id="unlockFrame"
        rel="stylesheet"
        type="text/css"
        href="assets/css/unlockframe.css"
        media="all"
    >
    <!-- existing CSS for the basic HTML layout -->
    <link
        id="style_main"
        rel="stylesheet"
        type="text/css"
        href="assets/css/style.css"
        media="all"
    >

    <!-- Chota CSS micro-framework -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/chota@latest"
    >

    <style>
    #sytebuild_htmlbuild * {
        display: inline-block;
        font-size: 14px;
        font-family: sans-serif;
    }

    .hide-show-element {

        width: 10rem;
        display: inline-block;
    }

    .hide-show-element label:hover {
        color: #D00;
    }

    .hide-show-element input[type='checkbox'] {
        display: none;
    }

    .hide-show-element label {
        margin: 0 .1em;
        padding: 0 .3em;
        border-radius: 3px;
        border: .1em solid #ccc;
        color: #333;
        line-height: 1.625;
        font-size: .83em;
        font-family: inherit;
        background-color: #f7f7f7;
        box-shadow: 0 .1em 0 rgba(0, 0, 0, .2), 0 0 0 .2em #fff inset;
    }

    .hide-show-element label {
        /* background-color: #a00; */
        /* border: 1px solid #111; */
        color: #E8E6FF;
        cursor: pointer;
        /* display: block; */
        /* padding: 20px; */
        display: inline-block;
        text-align: center;
        transition-duration: 0.4s;
        width: 90%;
        margin: 0;
        text-shadow: 0.06rem 0.06rem 0.1rem #33333355;
    }

    .hide-show-element label:after {
        display: block;
        content: "Show Controls";
    }

    .hide-show-element input:checked+label {
        background-color: none;
        /* border: 1px solid #a00; */
        color: #3A29BB;
    }

    .hide-show-element input:checked+label:after {
        content: "Hide Controls";
    }

    .test1 {
        opacity: 0;
        position: relative;
        height: 0;
        transform: rotate(135deg);
        top: 20%;
        transition-duration: 0.6s;
        width: 0;
    }

    .hide-show-element input:checked~.test1 {
        filter: grayscale(25%);
        opacity: 1;
        height: 200px;
        transform: rotate(0);
        width: 8rem;
    }

    .randomimage {
        display: inline-block;
        max-width: 1024;
        max-height: 768;
    }

    #jsaffect {

        display: inline-block;
        flex-direction: unset;
        border: 0.01rem solid #7fd5ff;

    }
    </style>
</head>