<?php

namespace P2u2\View;

use P2u2\Model\Environment as Env;
use P2u2\Model\Evalpath as Evalpath;
use P2u2\Model\Functions as Functions;
use P2u2\Model\Newmethod as Newmethod;
use P2u2\Model\P2u2 as P2u2;

$Env = new Env(NS2_ROOT);
$initEnv = $Env->whatis(NS2_ROOT);
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

$resultsWithDescriptions = [
    [
        'id' => 'url_buildByComp',
        'value' => 'http://ai-anon.local/home/hestia/web/ai-anon.local/public_html',
        'label' => 'BuildByComp',
        'description' => 'Direct hostname construction'
    ],
    [
        'id' => 'url_concatThis',
        'value' => 'http://hestia/ai-anon.local',
        'label' => 'ConcatThis',
        'description' => 'Filtered paths (most reliable)'
    ],
    [
        'id' => 'url_concatSwitch',
        'value' => 'http://ai-anon.local',
        'label' => 'ConcatSwitch',
        'description' => 'Switch-case logic (experimental)'
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
    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/tachyons-extended.css">
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .card {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s ease;
        }
        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 0.5rem;
        }
        .todo-item {
            background: #fff3e0;
            border-left: 4px solid #ff9800;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            border-radius: 0.25rem;
        }
        .server-badge {
            display: inline-block;
            background: #ffe0b2;
            color: #e65100;
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        input, select, textarea {
            font-size: 1rem;
        }
        .input-reset {
            font: inherit;
            border: 1px solid #ccc;
        }
        .break-word {
            word-break: break-all;
        }
        .gap2 {
            gap: 0.5rem;
        }
        .gap3 {
            gap: 1rem;
        }
    </style>
</head>

<body class="center px2 ph3">
    <div class="center backgroundblue">
    <div class="w-75  bg-light-gray">
        <!-- Header -->
        <header class="bg-dark-blue white pv4 ph3">
            <div class="mw9 center">
                <h1 class="ma0 mb2 f2 fw7"><?= $whatis["page_heading"] ?></h1>
                <p class="ma0 mt2 f4 fw4 o-80">Annie DeBrowsa Tranform URL</p>
            </div>
        </header>

        <!-- Environment Info -->
        <section class="bg-white-60 pv3 ph3 bt b--light-gray">
            <div class="mw9 center">
                <div class="grid-2">
                    <div>
                        <p class="ma0 f6 gray">Location:</p>
                        <p class="ma0 f5 mono"><?= __FILE__; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">Base Path:</p>
                        <p class="ma0 f5 mono"><?php echo isset($Env->initialize_enviornment["abspathtml"]) ? $Env->initialize_enviornment["abspathtml"] : 'Not set'; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">Server:</p>
                        <p class="ma0 f5 mono"><?= $_SERVER["SERVER_NAME"]; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">ADB Main Page:</p>
                        <p class="ma0 f5 mono"><a href="../">Go Home</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="pv4 ph3">
            <div class="mw9 center">
                <?php
                    require "Trypath.form.php";
                  //  require "Twerkin.form.php";
                ?>
                <!-- Navigation Go-Up Section -->





<div id="app">
  <h2 class="text-white" id="appHeading">Domain Configuration</h2>

  <div class="card pa4 mt3">
    <label>Selected URL</label>
    <input type="text" v-model="selectedUrl" placeholder="Type or select a URL..." class="w-100 pa2 ba b--gray br1">

    <div class="mt2">
      <strong>Preview:</strong> {{ selectedUrl }}
      <p><a v-bind:href="selectedUrl">{{ selectedUrl }}</a></p>
    </div>

    <div class="mt3 grid-3-ns gap3">
      <div class="card pa2 br2 ba b--light-gray" v-for="url in urlOptions" :key="url.name" @click="selectUrl(url.value)" :class="{'bg-highlight': highlightUrl === url.value}">
        <p>{{ url.name }}</p>
        <p class="mono">{{ url.value }}</p>
      </div>
    </div>

    <button @click="clearForm" class="mt3 bg-green white pv2 ph3 br1">Clear Form</button>
  </div>
</div>
        </div><!-- :after Twerkin.form.php -->
        <!-- Navigation Go-Up Section -->

        </div>
    </main>
    </div>
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
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="assets/js/vue/app.js"></script>
</body>

</html>
