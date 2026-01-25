<?php

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
$page_heading ? $page_heading : 'DYNAMIC PAGE HEADING AT LINE 25';
$title ? $title : 'TITLE ME PLEASE';
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
                <!-- Tailwind CSS CDN -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

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
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* ================= Unicode ::before Demo Styling ================= */
        .css-escape-demo {
            position: relative;
            display: inline-block;
            cursor: help;
        }

        .css-escape-popup {
            position: absolute;
            top: 1.8em;
            left: 0;
            z-index: 20;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: opacity 140ms ease, transform 140ms ease;
            background: #eff6ff;
            border: 1px solid #93c5fd;
            border-radius: 6px;
            padding: 10px 12px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25),
                        0 2px 6px rgba(37, 99, 235, 0.35);
        }

        .css-escape-demo:hover .css-escape-popup {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .css-escape-sample::before {
            content: var(--css-escape);
            font-size: 3rem;
            line-height: 1;
            color: #1d4ed8;
        }

        .preview-glyph {
            font-size: 3rem;
            display: inline-block;
            padding: 0.5rem;
            border-radius: 0.5rem;
            background-color: #f3f4f6;
            min-width: 3rem;
            text-align: center;
        }
        /* ================= CSS Column Header Hover Popup ================= */
        .th-css-hover-demo {
            position: relative;
            cursor: help;
            text-decoration: underline dotted;
        }

        .th-css-hover-popup {
            position: absolute;
            top: 1.8em;
            left: 0;
            z-index: 10;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-4px);
            transition: opacity 140ms ease, transform 140ms ease;

            background: #f9fafb;       /* light gray, neutral */
            border: 1px solid #d1d5db; /* gray border */
            border-radius: 6px;
            padding: 6px 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            font-size: 0.85rem;
            color: #111;                /* dark text */
            white-space: nowrap;
        }

        .th-css-hover-demo:hover .th-css-hover-popup,
        .th-css-hover-demo:focus-within .th-css-hover-popup {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>

