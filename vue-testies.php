<!DOCTYPE html>
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
$page_heading = 'Some Text Styles of &#x201c;Chota MicroCSS&#x201d; CSS';
$title = 'VuE Form Bindings';
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
    <!-- link href="assets/css/style.css" rel="stylesheet" -->
    <!-- link href="assets/css/notes.css" rel="stylesheet" -->
    <!-- link rel="stylesheet" href="https://unpkg.com/chota@latest" -->
    <link rel="stylesheet"  href="assets/css/tachyons.min.css">
    <link href="assets/css/lightslider.css" rel="stylesheet">
    <style>
    .displaynone {
        display: none;
    }

    .bg-highlight {
        background-color: yellow;
    }
    </style>
    <!-- link rel="stylesheet" href="public/assets/css/Chota MicroCSS.min.css" -->
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Main Content -->
    <main class="pv4 ph3">
        <div class="mw9 center">
            <!-- ^ Trypath.form.phtml -->

            <div id="trypath-division" class="mb4">
                <h2 class="section-title f3 fw7 mv3">Path Processing Summary</h2>
                <div class="card pa4 mt3">
                    <dl id="processingSummary" class="mb3">
                        <dt class="pointer b f6">Path Processing Methods <span class="thin f6">(three approaches)</span>
                            <span class="normal blue pointer f6" id="show_g01"
                                onclick="swap_text('show_g01','glossary_01') ">
                                [details]</span>
                        </dt>
                        <dd id="glossary_01" class="bg-light-gray pa2 pv2 mt2 br2 dn">
                            <p>Using regular expressions and other syntax, the URL components which make up the path
                                are separated and stored in an array, "path[]". </p>
                            <p><code>path[]</code> is derived from <code
                                    class="php">$Eval-&gt;test_location($enterpathhere)['pb'];</code></p>
                            <ul>
                                <li><code>buldByComp</code> uses _SERVER[], path[], to build the resulting HTTP url.
                                </li>
                                <li><code>concatThis</code> uses that info but first removes some standard known
                                    paths in attempt to achive a more likely correct URL, and tends to be the most
                                    reliable of
                                    the three results.</li>
                                <li><code>concatSwitch</code> employs the use of a switch case logic. This is usually
                                    garbage
                                    for some reason. All in the spirit of playing with code.</li>
                            </ul>
                            <br>path[0]: home<br>path[1]: admin<br>path[2]: web<br>path[3]:
                            centrewebdesign.com<br>path[4]: public_html<br>path[5]: anniedebrowsa
                        </dd>
                    </dl>

                    <!-- URL Conversion Form -->
                    <div class="mt4 pt3 bt b--light-gray">
                        <h3 class="f5 fw6 mb2">Convert System Path</h3>
                        <form id="p2u2top" method="GET" class="mb3">
                            <div class="mb2">
                                <label for="path2url" class="db mb1 f6 fw6">System Path:</label>
                                <input type="text" name="path2url" id="path2url"
                                    value="/home/admin/web/centrewebdesign.com/public_html/anniedebrowsa"
                                    class="input-reset w-100 pa2 ba b--light-gray br1 f6" data-ddg-inputtype="unknown">
                            </div>
                            <button class="pv2 ph3 bg-blue white bn br1 pointer f6 fw6" type="submit"
                                name="submit">Submit
                                Path</button>
                        </form>
                    </div>

                    <!-- Conversion Results -->
                    <div id="position-urls" class="mt4 pt3 bt b--light-gray">
                        <h3 class="f5 fw6 mb3">Conversion Results</h3>
                        <p class="f6 gray mb3">Select a result to use in the Domain Configuration below:</p>
                        <div class="grid-3-ns gap3">
                            <div class="card pa3 br2 ba b--light-gray">
                                <div class="mb2 flex items-center">
                                    <input type="radio" id="url_buildByComp" name="selectedUrl"
                                        value="https://centrewebdesign.com/centrewebdesign.com//anniedebrowsa"
                                        class="mr2" onchange="updateTwerkinPath()"><label for="url_buildByComp"
                                        class="f6 fw6 pointer mb0">BuildByComp</label>
                                </div>
                                <p class="mt1 mb2 f6 gray">Direct hostname construction</p>
                                <p class="mb0 f6 break-word mono bg-light-gray pa2 br1"><a
                                        href="https://centrewebdesign.com/centrewebdesign.com//anniedebrowsa"
                                        target="_blank"
                                        class="blue hover-dark-blue">https://centrewebdesign.com/centrewebdesign.com//anniedebrowsa</a>
                                </p>
                            </div>
                            <div class="card pa3 br2 ba b--light-gray">
                                <div class="mb2 flex items-center">
                                    <input type="radio" id="url_concatThis" name="selectedUrl"
                                        value="https://centrewebdesign.com//anniedebrowsa" class="mr2"
                                        onchange="updateTwerkinPath()"><label for="url_concatThis"
                                        class="f6 fw6 pointer mb0">ConcatThis</label>
                                </div>
                                <p class="mt1 mb2 f6 gray">Filtered paths (most reliable)</p>
                                <p class="mb0 f6 break-word mono bg-light-gray pa2 br1"><a
                                        href="https://centrewebdesign.com//anniedebrowsa" target="_blank"
                                        class="blue hover-dark-blue">https://centrewebdesign.com//anniedebrowsa</a></p>
                            </div>
                            <div class="card pa3 br2 ba b--light-gray">
                                <div class="mb2 flex items-center">
                                    <input type="radio" id="url_concatSwitch" name="selectedUrl"
                                        value="https://centrewebdesign.com" checked="" class="mr2"
                                        onchange="updateTwerkinPath()"><label for="url_concatSwitch"
                                        class="f6 fw6 pointer mb0">ConcatSwitch</label>
                                </div>
                                <p class="mt1 mb2 f6 gray">Switch-case logic (experimental)</p>
                                <p class="mb0 f6 break-word mono bg-light-gray pa2 br1"><a
                                        href="https://centrewebdesign.com" target="_blank"
                                        class="blue hover-dark-blue">https://centrewebdesign.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Trypath.form.phtml $ -->
            <!-- :before Twerkin.form.phtml -->
<div id="app">
  <h2>Domain Configuration</h2>

  <div class="card pa4 mt3">
    <label>Selected URL</label>
    <input type="text" v-model="selectedUrl" placeholder="Type or select a URL..." class="w-100 pa2 ba b--gray br1">

    <div class="mt2">
      <strong>Preview:</strong> <a id="selectedUrlAnchor" :value.href="selectedUrl" target="_blank" class="blue hover-dark-blue">{{ selectedUrl }}</a>
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
        </div><!-- :after Twerkin.form.phtml -->
        <!-- Navigation Go-Up Section -->

        </div>
    </main>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="public/assets/js/vue/app.js"></script>
    <script src="public/assets/js/dynamicdrop.js"></script>
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

</body>

</html>
</script>

</body>

</html>
