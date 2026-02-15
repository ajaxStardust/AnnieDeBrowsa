<?php

namespace P2u2\View\Partials;

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
$page_heading = 'Some Text Styles of &#x201c;Chota MicroCSS&#x201d; CSS';
$title = 'What is Chota Micro CSS? Examples Shown';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php print $title; ?>
    </title>
    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <!-- link rel="stylesheet" href="https://unpkg.com/chota@latest" -->
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <style>
        .displaynone {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="assets/css/extra/chota.min.css">
        <link href="assets/css/tachyons-extended.css" rel="stylesheet">
    <style>
        body.dark {
            --bg-color: #000;
            --bg-secondary-color: #131316;
            --font-color: #f5f5f5;
            --color-grey: #ccc;
            --color-darkGrey: #777;
        }
    </style>
    <script>
        if (window.matchMedia &&
            window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('dark');
        }
    </script>
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

            <div class="notes">
                <p>Examples from the Chota MicroCSS project website.</p>
                <dl>
                    <dt class="keyTerms pointer">.text-[color]<span class="normal blue pointer" id="show_n01"
                            onclick="swap_text('show_n01','chota-utilities_01') "> toggle... </span>
                    </dt>
                    <dd id="chota-utilities_01" class="displaynone">
                        <!-- hidden then revealed -->
                        <p class="text-primary">.text-primary</p>
                        <p class="text-light">.text-light</p>
                        <p class="text-white">.text-white</p>
                        <p class="text-dark">.text-dark</p>

                        <p class="text-grey">.text-grey</p>
                        <p class="text-error">.text-error</p>
                        <p class="text-success">.text-success</p>
                    </dd>

                    <dt class="keyTerms pointer">bg-[color]: <span class="normal blue pointer" id="show_n02"
                            onclick="swap_text('show_n02','chota-utilities_02') "> toggle... </span>
                    </dt>
                    <dd id="chota-utilities_02" class="displaynone">
                        <!-- hidden then revealed -->
                        <p class="text-white bg-primary">.bg-primary .text-white</p>
                        <p class="text-info bg-light">.bg-light .text-dark</p>
                        <p class="text-light bg-dark">.bg-dark .text-light</p>
                        <p class="text-white bg-grey">.bg-grey .text-white</p>
                        <p class="text-light bg-error">.bg-error .text-light</p>
                        <p class="text-dark bg-success">.bg-success .text-dark</p>
                    </dd>
                </dl>
            </div> <!-- $ end .notes div -->
        </section>
        <section class="content">
            <details>
                <summary>Border Colors Table</summary>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>bd-primary</td>
                            <td><span class="bd-primary">Primary Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-light</td>
                            <td><span class="bd-light">Light Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-dark</td>
                            <td><span class="bd-dark">Dark Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-grey</td>
                            <td><span class="bd-grey">Grey Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-error</td>
                            <td><span class="bd-error">Error Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-success</td>
                            <td><span class="bd-success">Success Border</span></td>
                        </tr>
                    </tbody>
        </table>
            </details>
        </section>
        <section>

        <details>
            <summary>
                Text, Background, Border colors
            </summary>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>text-primary</td>
                        <td><span class="text-primary">Primary Text</span></td>
                    </tr>
                    <tr>
                        <td>text-light</td>
                        <td><span class="text-light">Light Text</span></td>
                    </tr>
                    <tr>
                        <td>text-white</td>
                        <td><span class="text-white">White Text</span></td>
                    </tr>
                    <tr>
                        <td>text-dark</td>
                        <td><span class="text-dark">Dark Text</span></td>
                    </tr>
                    <tr>
                        <td>text-grey</td>
                        <td><span class="text-grey">Grey Text</span></td>
                    </tr>
                    <tr>
                        <td>text-error</td>
                        <td><span class="text-error">Error Text</span></td>
                    </tr>
                    <tr>
                        <td>text-success</td>
                        <td><span class="text-success">Success Text</span></td>
                    </tr>
                </tbody>
                <tbody class="table table-striped">

                    <tbody>
                        <tr>
                            <td>bg-primary</td>
                            <td><span class="text-white bg-primary">Primary Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-light</td>
                            <td><span class="text-dark bg-light">Light Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-dark</td>
                            <td><span class="text-light bg-dark">Dark Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-grey</td>
                            <td><span class="text-white bg-grey">Grey Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-error</td>
                            <td><span class="text-light bg-error">Error Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-success</td>
                            <td><span class="text-dark bg-success">Success Background</span></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>bd-primary</td>
                            <td><span class="bd-primary">Primary Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-light</td>
                            <td><span class="bd-light">Light Border</span></td> <!-- light border -->
                        </tr>   <!-- light border -->
                        <tr>
                            <td>bd-dark</td>
                            <td><span class="bd-dark">Dark Border</span></td>   <!-- dark border -->
                        </tr>   <!-- dark border -->    <!-- dark border -->
                        <tr>
                            <td>bd-grey</td>
                            <td><span class="bd-grey">Grey Border</span></td>   <!-- grey border -->    <!-- grey border -->
                        </tr>   <!-- grey border -->    <!-- grey border -->    <!-- grey border -->

                        <tr>
                            <td>bd-success</td>
                            <td><span class="bd-success">Success Border</span></td>   <!-- success border -->    <!-- success border -->
                        </tr>   <!-- success border -->    <!-- success border -->
                    </tbody>
            </table>
            </details>
        </section>



        <!-- END NOTES -->
        <!-- END NOTES -->



    <section class="w-75 mx-auto">
        <!-- :begin #_GLOSSARY  -->
        <div>
            <section class="content">
                <details>
                    <summary class="text-smallcaps">
                        Glossary:
                    </summary>
                    <strong>Key Terms about <?php print $page_heading; ?></strong>
            <pre>text-primary - Primary text
text-light - Light text
text-white - White text
text-dark - Dark text
text-grey - Grey text
text-error - Error text
text-success - Success text
bg-primary - primary background
bg-light - Light background
bg-dark - Dark background
bg-grey - Grey background
bg-error - Error background
bg-success - Success background
bd-primary - primary border
bd-light - Light border
bd-dark - Dark border
bd-grey - Grey border
bd-error - Error border
bd-success - Success border</pre>
                    <p>Use tools, such as the Linux command line tool, <code>tree</code> which can                         generate the directory tree in various formats including <strong>JSON and HTML</strong>. E.g. <code>tree -J</code>                         or <code>tree -H http://path/of/dir</code>
                    </p>

                    <p><kbd>apt install tree</kbd></p>
                    <p>JSON (JavaScript Object Notation) and HTML (Hypertext Markup Language) are both
                        data formats, but they serve different purposes and have distinct characteristics.</p>
                    <p>Leverage the power of the Linux command line tool, <code>TREE</code>! </p>
        </details>
            </section>

        <section class="content">
<p>Paragraph in Content Div</p>
<!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
<?php include 'public/content/content-card-github.php' ?>
<!-- END CARD: AnnieDeBrowsa SAP Preview Tool  -->
        </section> <!-- $ :end #_glossary -->
    </section> <!-- $ :end #_glossary -->
    </div> <!-- $ :end #_glossary -->

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