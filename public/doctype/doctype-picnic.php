<?php

namespace P2u2\Public\Doctype;

/*
 * adb_simplest/template.phtml
 *
 * Copyright 2023 @ajaxStardust <flux@mx23>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

date_default_timezone_set('EST');
$page_heading ? $page_heading : 'LAYOUT (DOCTYPE) UNICODE';
$title ? $title : 'TITLE ME PLEASE for LAYOUT (DOCTYPE) UNICODE';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $title; ?></title>

            <link rel="icon" type="image/ico" href="favicon.ico">
            <link rel="shortcut icon" type="image/ico" href="favicon.ico">

            <link href="assets/css/lightslider.css" rel="stylesheet">
            <meta name="description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">

            <!-- Open Graph Meta Tags -->
            <meta property="og:url" content="https://transformative.click">
            <meta property="og:type" content="website">
            <meta property="og:title" content="Transformative.Click">
            <meta property="og:description" content="Unicode Misc Symbols and Pictographs in Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
            <meta property="og:image" content="https://transformative.click/plaidicon.png">
            <meta property="og:image:width" content="680">
            <meta property="og:image:height" content="680">

            <!-- Twitter Meta Tags -->
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="transformative.click">
            <meta property="twitter:url" content="https://transformative.click">
            <meta name="twitter:title" content="Transformative.Click">
            <meta name="twitter:description" content="Unicode Misc Symbols and Pictographs in Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
            <meta name="twitter:image" content="https://transformative.click/plaidicon.png">
            <link href="public/assets/css/tachyons-extended.css" rel="stylesheet">
            <!-- Meta Tags Generated via https://opengraph.dev -->

    <!-- Picnic CSS CDN -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">



    <style>
        /* ================= Demo Styling ================= */

    </style>
</head>
<body id="doctype-picnic">