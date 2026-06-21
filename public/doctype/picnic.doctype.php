<?php

namespace P2u2\Public\Doctype;

 
date_default_timezone_set('EST');
if(!isset($page_heading)){
    $page_heading = 'Picnic CSS LAYOUT (DOCTYPE)';
}
if(!isset($title)){
    $title = 'TITLE ME PLEASE for LAYOUT (DOCTYPE) Picnic CSS';
}

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
            <meta name="description" content="Single Page Application (SPA) browser for developers. Visit: ajaxstardust/AnnieDeBrowsa">

            <!-- Open Graph Meta Tags -->
            <meta property="og:url" content="https://transformative.click">
            <meta property="og:type" content="website">
            <meta property="og:title" content="Transformative.Click">
            <meta property="og:description" content="Single Page Application (SPA) browser for developers. Visit: ajaxstardust/AnnieDeBrowsa">
            <meta property="og:image" content="https://transformative.click/favicon.png">
            <meta property="og:image:width" content="680">
            <meta property="og:image:height" content="680">

            <!-- Twitter Meta Tags -->
            <meta name="twitter:card" content="summary_large_image">
            <meta property="twitter:domain" content="transformative.click">
            <meta property="twitter:url" content="https://transformative.click">
            <meta name="twitter:title" content="Transformative.Click">
            <meta name="twitter:description" content="Single Page Application (SPA) browser for developers. Visit: ajaxstardust/AnnieDeBrowsa">
            <meta name="twitter:image" content="https://transformative.click/favicon.png">
            <!-- Meta Tags Generated via https://opengraph.dev -->

    <!-- Tachyons CSS Local -->
            <link rel="stylesheet" href="/public/assets/css/tachyons-extended.css">
    <!-- Picnic CSS Local -->
            <link rel="stylesheet" href="/public/assets/css/basix-picnic.css">



    <style>
        /* ================= Demo Styling ================= */

    </style>
</head>
<body id="doctype-picnic">