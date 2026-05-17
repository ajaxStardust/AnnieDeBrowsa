<?php

namespace P2u2\View;
require_once dirname(__DIR__) . '/Model/PathNormalizer.php';

/*
 * CONTRACT: Main.page.php live transform page
 *
 * ROLE:
 * - This file currently renders the live public default transform app.
 * - public/default.php requires this file directly.
 *
 * INVARIANTS:
 * - Must continue rendering the environment summary, path conversion form,
 *   conversion results, and Vue-powered Resulting URL card together.
 * - The Vue mount element id must remain #app unless the JS mount changes too.
 * - The Vue script load and assets/js/vue/app.js must remain coordinated.
 *
 * MIGRATION RULE:
 * - If this page is decomposed into public/content and public/doctype fragments,
 *   preserve visible parity with the live route and update CONTRACT.md.
 */

use P2u2\Model\Environment as Env;
use P2u2\Model\Functions as Functions;
use P2u2\Model\PathTransformer as PathTransformer;
use P2u2\Model\UrlBuilder as UrlBuilder;
use P2u2\Model\UrlEvaluator as UrlEvaluator;
use Adb\Model\PathNormalizer;

$Env = new Env(NS2_ROOT);
$initEnv = $Env->whatis(NS2_ROOT);
$displayLocation = PathNormalizer::normalizeDisplayPathFromRoot(NS2_ROOT, __FILE__);
$displayBasePath = PathNormalizer::normalizeDisplayPath(NS2_ROOT);
// set Env variable array ver01
$title = $Env->initialize_enviornment["title"];

if (isset($_GET["path2url"])) {
    $path2url = $_GET["path2url"];
} else {
    $path2url = NS2_ROOT;
}

// path sent to process
$enterpathhere = isset($path2url) ? $path2url : $_SERVER["DOCUMENT_ROOT"] . "/index.php";
// set Env vars based on enterpathhere
// DIFF? whatis allows for path
$whatis = $Env->whatis($enterpathhere);

// NEW SEPARATED PIPELINE: Normalization → Construction → Evaluation
$PathTransformer = new PathTransformer();
$normalized = $PathTransformer->normalize($enterpathhere);

$UrlBuilder = new UrlBuilder();
$constructed = $UrlBuilder->build($normalized);

$UrlEvaluator = new UrlEvaluator();
$evaluated = $UrlEvaluator->evaluate($constructed);

// Legacy compatibility variables (preserve for backward compatibility)
$clean_url = $normalized['normalized_path'];
$extract_components = $normalized['components'];
$contructNewMethod = $evaluated;

// Functions()
$Functions = new Functions();

$resultsWithDescriptions = [
    [
        'id' => 'url_normalized',
        'value' => $normalized['normalized_path'],
        'label' => 'Normalized Path',
        'description' => 'Path after normalization layer'
    ],
    [
        'id' => 'url_constructed',
        'value' => $constructed['url'],
        'label' => 'Constructed URL',
        'description' => 'URL after construction layer'
    ],
    [
        'id' => 'url_evaluated',
        'value' => $evaluated['url'],
        'label' => 'Evaluated URL',
        'description' => 'Final URL after evaluation layer'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php print $whatis["title"]; ?>
    </title>
    <meta name="description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">

    <!-- Open Graph Meta Tags -->
    <meta property="og:url" content="https://transformative.click">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Transformative.Click">
    <meta property="og:description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
    <meta property="og:image" content="https://transformative.click/favicon.png">
    <meta property="og:image:width" content="680">
    <meta property="og:image:height" content="680">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="transformative.click">
    <meta property="twitter:url" content="https://transformative.click">
    <meta name="twitter:title" content="Transformative.Click">
    <meta name="twitter:description" content="Single Page Application (SPA) browser for developers. Visit: GitHub.com/ajaxstardust/AnnieDeBrowsa">
    <meta name="twitter:image" content="https://transformative.click/favicon.png">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <!-- Meta Tags Generated via https://opengraph.dev -->

    <link rel="stylesheet" href="assets/css/tachyons-extended.css">
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">



</head>

<body class="adb-body">
    <div class="mw8 center bg-light-gray">
        <!-- Header -->
        <header class="adb-header white pv4 ph3">
            <div class="mw9 center">
                <h1 class="ma0 mb2 f3 fw7"><?= $whatis["page_heading"] ?></h1>
                <p class="ma0 mt1 f6 o-60 tracked ttu">path &rarr; url &nbsp;&middot;&nbsp; dev utility</p>
            </div>
        </header>
        <?php
		include 'content/content-card-github.php';
		?>

		<!-- END CARD: AnnieDeBrowsa SAP Preview Tool  -->
        <!-- Environment Info + Resulting URL: 50/50 split -->
        <div class="flex pv3 ph3 bt b--light-gray" style="gap:1rem">

            <!-- Left: environment fields -->
            <section class="pa3 br2" style="flex:1;min-width:0">
                <h2 class="adb-env-heading">Environment</h2>
                <div class="bg-white-60 pa4 h-100 br2">
                <p class="ma0 f6 gray">Location:</p>
                <p class="ma0 f5 mono mb3"><?= htmlspecialchars($displayLocation, ENT_QUOTES, 'UTF-8'); ?></p>

                <p class="ma0 f6 gray">Base Path:</p>
                <p class="ma0 f5 mono mb3"><?= htmlspecialchars($displayBasePath, ENT_QUOTES, 'UTF-8'); ?></p>

                <p class="ma0 f6 gray">Server Type:</p>
                <p class="ma0 f5 mono mb3"><?= $_SERVER["SERVER_SOFTWARE"]; ?></p>

                <p class="ma0 f6 gray">Server Name:</p>
                <p class="ma0 f4 mono fw6 dark-gray mb3"><?= $_SERVER["SERVER_NAME"]; ?></p>

                <p class="ma0 f6 gray">Server IP:</p>
                <p class="ma0 f4 mono fw6 dark-gray"><?= $Env->initialize_enviornment['server_addr']; ?></p>

                <div id="gohome" style="display:none;">
                    <p class="ma0 f6 gray mt3">ADB Main Page:</p>
                    <button class="mt2 ma0 f5 mono pv2 ph3 bg-green white bn br1 pointer f6 fw6"><a class="bg-green white" href="../" target="_top">Go Home</a></button>
                </div>
                </div>
            </section>

            <!-- Right: Vue resulting URL card -->
            <div id="app" style="flex:1;min-width:0">
              <h2 id="appHeading">Resulting URL</h2>
              <div class="adb-output-card pa4 h-100">
                <input type="text" v-model="selectedUrl" placeholder="Select a result below..." class="w-100 pa2 mt2 ba br2">
                <div class="mt3">
                  <p><strong><a target="_blank" v-bind:href="selectedUrl">{{ selectedUrl }}</a></strong></p>
                  <p>Pick a radio button from the results below &mdash; or edit directly.</p>
                  <div class="mt2">
                    <details>
                      <summary>Details</summary>
                      <p>Edit <code>./src/View/Main.page.php</code> or its future public/content replacement to customize this <mark>View</mark>.</p>
                      <p>Modify <code>./src/Model/P2u2.php</code> to <mark>Model</mark> the URL for your environment.</p>
                      <p>Experiment with <mark>Vue.js</mark> to dynamically transform the resulting URL.</p>
                    </details>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <!-- Main Content -->
        <main class="pv4 ph3">
            <?php require "Trypath.form.php"; ?>
        </main>
    </div>
<script src="assets/js/kickout.js"></script>
<script src="assets/js/showme-hideme.js"></script>
    <script src="assets/js/dynamicdrop.js"></script>
    <script>
window.onload = function() {
    const blockA = document.querySelector('#url_buildByComp').closest('.card');
    const blockB = document.querySelector('#url_concatThis').closest('.card');
    const blockC = document.querySelector('#url_concatSwitch').closest('.card');

    setTimeout(() => {
        blockC.classList.add('bg-highlight');
    }, 200);
    setTimeout(() => blockC.classList.remove('bg-highlight'), 300);

    setTimeout(() => blockB.classList.add('bg-highlight'), 400);
    setTimeout(() => blockB.classList.remove('bg-highlight'), 500);

    setTimeout(() => blockA.classList.add('bg-highlight'), 600);
    setTimeout(() => blockA.classList.remove('bg-highlight'), 700);
};
    // Auto-populate Twerkin path field when URL selection changes
    function updateTwerkinPath() {
        const selectedRadio = document.querySelector('input[name="selectedUrl"]:checked');
        if (selectedRadio) {
            document.getElementById('dataHref01').value = selectedRadio.value;
        }
    }

    // Initialize on page load with default selection
    document.addEventListener('DOMContentLoaded', function() {
        updateTwerkinPath();
    });
    </script>
    <script>
window.addEventListener("load", () => {
  const radios = document.querySelectorAll("input[type='radio']");

  setTimeout(() => {
    radios.forEach((r, i) => {
      setTimeout(() => {
        r.classList.add("radio-highlight");
        setTimeout(() => r.classList.remove("radio-highlight"), 600);
      }, i * 300);
    });
  }, 3000);
});
</script>

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="assets/js/vue/app.js"></script>
</body>

</html>
