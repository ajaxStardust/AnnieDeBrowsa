<?php

namespace P2u2\Public\Doctype;

/*
 * CONTRACT: base doctype layout
 *
 * ROLE:
 * - Opening layout shell for public-side composed pages.
 * - Owns the document prolog, <html>, <head>, and opening <body> tag.
 *
 * INVARIANTS:
 * - Pages that use this file SHOULD NOT open a second <body> tag.
 * - Closing tags should come from the paired footer include.
 * - Page-specific variables such as $title and $page_heading may be defined by
 *   the entrypoint before this file is required.
 *
 * DESIGN RULE:
 * - This file is intentionally Layout-like, similar to a WinterCMS layout or
 *   an app.blade-style outer shell.
 */



date_default_timezone_set('EST');
$page_heading ? $page_heading : 'LAYOUT: DOCTYPE Base';
$title ? $title : 'Base HTML DOCTYPE Plus HEAD';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $title; ?></title>

            <link rel="shortcut icon" type="image/png" href="favicon.png">

            <link href="assets/css/lightslider.css" rel="stylesheet">
            <meta name="description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">

            <!-- Open Graph Meta Tags -->
            <meta property="og:url" content="https://transformative.click">
            <meta property="og:type" content="website">
            <meta property="og:title" content="Transformative.Click">
            <meta property="og:description" content="Unicode Misc Symbols and Pictographs in Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
            <meta property="og:image" content="https://transformative.click/favicon.png">
            <meta property="og:image:width" content="680">
            <meta property="og:image:height" content="680">

            <!-- Twitter Meta Tags -->
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="transformative.click">
            <meta property="twitter:url" content="https://transformative.click">
            <meta name="twitter:title" content="Transformative.Click">
            <meta name="twitter:description" content="Unicode Misc Symbols and Pictographs in Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
            <meta name="twitter:image" content="https://transformative.click/favicon.png">
            <link href="public/assets/css/tachyons-extended.css" rel="stylesheet">
            <!-- Meta Tags Generated via https://opengraph.dev -->
</head>
