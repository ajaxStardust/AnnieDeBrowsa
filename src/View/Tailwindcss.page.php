<?php

namespace P2u2\View;

use P2u2\Model\P2u2 as P2u2;
use P2u2\Model\Environment as Env;
use P2u2\Model\Functions as Functions;
use P2u2\Model\Newmethod as Newmethod;
use P2u2\Model\Evalpath as Evalpath;

$Env = new Env(NS2_ROOT);
$initEnv = $Env->whatis(NS2_ROOT);
// set Env variable array ver01
$title = $Env->initialize_enviornment['title'];


if (isset($_GET['path2url'])) {
    $path2url = $_GET['path2url'];
} else {
    $path2url = NS2_ROOT;
}

// path sent to process
$enterpathhere = isset($path2url) ? $path2url : $_SERVER['DOCUMENT_ROOT'] . "/adbcollections/my_Notes/index.php";
// set Env vars based on enterpathhere
// DIFF? whatis allows for path
$whatis = $Env->whatis($enterpathhere);

// P2u2()
$P2u2 = new P2u2($enterpathhere);
// P2u2() filtered path to process
$clean_url = $P2u2->clean_url_chars($enterpathhere);
// P2u2()
$extract_components = $P2u2->extract_path_components($P2u2->clean_url_chars($enterpathhere));

// Evalpath()
$Eval = new Evalpath($enterpathhere);
// Evalpath()
$EvalPathHere = $Eval->test_location($enterpathhere);

// Newmethod()
$Newmethod = new Newmethod($enterpathhere);
// Newmethod()
$buildUrl = $Newmethod->buildUrl($enterpathhere);
// Newmethod()
$buildUrlLast = $Newmethod->buildUrlLast($enterpathhere);
// Newmethod()
$contructNewMethod = $Newmethod->_construct_NewMethod;

// Functions()
$Functions = new Functions();

date_default_timezone_set('EST');
$page_heading = 'Some Text Styles of &#x201c;Tailwind CSS&#x201d; CSS';
$title = 'What is Tailwind CSS? Examples Shown';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Unicode 2026 - Misc Symbols and Pictographs
    </title>

    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">

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
    <meta name="twitter:description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
    <meta name="twitter:image" content="https://transformative.click/plaidicon.png">

    <!-- Meta Tags Generated via https://opengraph.dev -->
    <link href="assets/css/lightslider.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <!-- Meta Tags Generated via https://opengraph.dev -->
</head>

<body>

    <div id="pagewidth" class="container">

        <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
        <?php include 'public/content/content-card-github.php' ?>
        <!-- END CARD: AnnieDeBrowsa SAP Preview Tool  -->

        <section id="header">
            <!-- #HEADER -->
            <h1 class="text-center text-primary text-4 text-bold">
                <?php print $page_heading; ?>
            </h1>
        </section>
        <section id="general_notes">

</section>

    <footer class="footer clearfix px-4">
        <!--    .FOOTER     -->
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust"
                        target="_blank" title="View original">@ajaxStardust</a> <em>Laravel</em> notes:</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light text-end"><kbd>
                        <?php echo $lastMod; ?>
                    </kbd></div>
            </div>
        </div>
    </footer>
    </body> <!--    $ :end    END class.content (former id.maincol)    $    -->
    <!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "476605b5cfe44956a453fb886673520f"}'></script><!-- End Cloudflare Web Analytics -->
    <script src="assets/js/showme-hideme.js"></script>

</html>