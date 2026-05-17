<?php

namespace P2u2;
 
error_reporting(E_ALL);
$page_heading = 'LAYOUT (DOCTYPE) UNICODE - u1f390-u1f5ff';
$title = 'DOCTYPE Unicode';
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-base.php';

?>

<body>
    <div id="pagewidth" class="container">

        <section id="slideshow">
            <!-- #HEADER -->
            <h1 class="bg-dark text-light text-end pe-3"><?php print $page_heading; ?></h1>

            <p>The images will appear here once the correct function is created.</p>
        </section>