<?php

namespace P2u2\Public\Doctype;

 
date_default_timezone_set('EST');
if(!isset($page_heading)){
    $page_heading = 'Tachyons CSS LAYOUT (DOCTYPE)';
}
if(!isset($title)){
    $title = 'TITLE ME PLEASE for LAYOUT (DOCTYPE) Tachyons';
}

$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Unicode Dashboard with Historical Easter Egg</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        summary:first-letter {
            font-size: 4rem;
            float: left;
            margin-right: 0.5rem;
        }

        .details-container details:hover {
            background-color: #f0f0f0;
        }

        .copy-btn {
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }

        .copy-btn:hover {
            background-color: #eee;
        }

        .fade-carousel {
            min-height: 6rem;
            position: relative;
        }

        .fade-item {
            position: absolute;
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
            width: 100%;
        }

        .fade-item.show {
            opacity: 1;
            position: relative;
        }

        .epoch-slide {
            padding: 0.75rem;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
            border-left: 5px solid #334155;
            background-color: #f8fafc;
        }

        #unicode-container {
            margin-top: 0.5rem;
        }

        .input-group {
            margin-bottom: 0.5rem;
        }

             #easter-egg {
	position: relative;

	width: 20%;
	left: 75%;
}

    </style>
</head>

<body class="p-4 font-sans">