<?php

date_default_timezone_set('EST');
$page_heading = 'SPA Preview Tool for Developers.';
$title = 'Miscellaneous Unicode NCR\'s for Use in CSS ::before';
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

<body>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-semibold mb-3">Miscellaneous Unicode NCR's for Use in CSS ::before</h1>
    <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
    <?php include 'public/html-card-github.php' ?>
        <!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
    <table class="table-auto border-collapse border border-gray-300 w-full text-center mb-8">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-2 py-1">Preview</th>
                <th class="border px-2 py-1">Glyph</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Hex NCR</th>
                <th class="border px-2 py-1 th-css-hover-demo">
                    CSS Escape
                    <span class="th-css-hover-popup">
                        demoing <a href="https://www.w3.org/WAI/WCAG22/Techniques/failures/F87" target="_blank">::before</a> with content:"\2600" like rules.
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
          <!-- MISSING MISC SYMBOLS -->
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-700 text-3xl inline-block bg-gray-200 p-2 rounded-lg">☁</span>
            </td>
            <td class="border px-2 py-1">☁</td>
            <td class="border px-2 py-1">CLOUD</td>
            <td class="border px-2 py-1">&#x2601;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2601</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2601';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-blue-400 text-3xl inline-block bg-gray-200 p-2 rounded-lg">☂</span>
            </td>
            <td class="border px-2 py-1">☂</td>
            <td class="border px-2 py-1">UMBRELLA</td>
            <td class="border px-2 py-1">&#x2602;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2602</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2602';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-white text-3xl inline-block bg-gray-800 p-2 rounded-lg">☃</span>
            </td>
            <td class="border px-2 py-1">☃</td>
            <td class="border px-2 py-1">SNOWMAN</td>
            <td class="border px-2 py-1">&#x2603;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2603</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2603';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-800 text-3xl inline-block bg-gray-200 p-2 rounded-lg">☄</span>
            </td>
            <td class="border px-2 py-1">☄</td>
            <td class="border px-2 py-1">COMET</td>
            <td class="border px-2 py-1">&#x2604;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2604</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2604';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚀</span>
            </td>
            <td class="border px-2 py-1">⚀</td>
            <td class="border px-2 py-1">DIE FACE-1</td>
            <td class="border px-2 py-1">&#x2680;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2680</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2680';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚁</span>
            </td>
            <td class="border px-2 py-1">⚁</td>
            <td class="border px-2 py-1">DIE FACE-2</td>
            <td class="border px-2 py-1">&#x2681;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2681</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2681';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚂</span>
            </td>
            <td class="border px-2 py-1">⚂</td>
            <td class="border px-2 py-1">DIE FACE-3</td>
            <td class="border px-2 py-1">&#x2682;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2682</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2682';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚃</span>
            </td>
            <td class="border px-2 py-1">⚃</td>
            <td class="border px-2 py-1">DIE FACE-4</td>
            <td class="border px-2 py-1">&#x2683;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2683</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2683';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚄</span>
            </td>
            <td class="border px-2 py-1">⚄</td>
            <td class="border px-2 py-1">DIE FACE-5</td>
            <td class="border px-2 py-1">&#x2684;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2684</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2684';"></span>
                </span>
              </span>
            </td>
          </tr>
          <tr>
            <td class="border px-2 py-1">
              <span class="text-gray-900 text-3xl inline-block bg-gray-200 p-2 rounded-lg">⚅</span>
            </td>
            <td class="border px-2 py-1">⚅</td>
            <td class="border px-2 py-1">DIE FACE-6</td>
            <td class="border px-2 py-1">&#x2685;</td>
            <td class="border px-2 py-1">
              <span class="css-escape-demo">
                <code>\2685</code>
                <span class="css-escape-popup">
                  <span class="css-escape-sample" style="--css-escape: '\2685';"></span>
                </span>
              </span>
            </td>
          </tr>
          <!-- Add any other missing symbols here in the same format -->
        </tbody>

        <tbody>
            <tr class="bg-gray-100">
                <th class="border px-2 py-1">Preview</th>
                <th class="border px-2 py-1">Glyph</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Hex NCR</th>
                <th class="border px-2 py-1 th-css-hover-demo">
                    CSS Escape
                    <span class="th-css-hover-popup">
                        demoing <a href="https://www.w3.org/WAI/WCAG22/Techniques/failures/F87" target="_blank">::before</a> with content:"\2600" like rules.
                    </span>
                </th>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">☀</span></td>
                <td class="border px-2 py-1">☀</td>
                <td class="border px-2 py-1">BLACK SUN WITH RAYS</td>
                <td class="border px-2 py-1">&#x2600;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\2600</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\2600';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">⚡</span></td>
                <td class="border px-2 py-1">⚡</td>
                <td class="border px-2 py-1">HIGH VOLTAGE SIGN</td>
                <td class="border px-2 py-1">&#x26A1;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\26A1</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\26A1';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">☠</span></td>
                <td class="border px-2 py-1">☠</td>
                <td class="border px-2 py-1">SKULL AND CROSSBONES</td>
                <td class="border px-2 py-1">&#x2620;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\2620</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\2620';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">💡</span></td>
                <td class="border px-2 py-1">💡</td>
                <td class="border px-2 py-1">ELECTRIC LIGHT BULB</td>
                <td class="border px-2 py-1">&#x1F4A1;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\01F4A1</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\01F4A1';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">💧</span></td>
                <td class="border px-2 py-1">💧</td>
                <td class="border px-2 py-1">DROPLET</td>
                <td class="border px-2 py-1">&#x1F4A7;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\01F4A7</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\01F4A7';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">💦</span></td>
                <td class="border px-2 py-1">💦</td>
                <td class="border px-2 py-1">SPLASHING</td>
                <td class="border px-2 py-1">&#x1F4A6;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\01F4A6</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\01F4A6';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">🧰</span></td>
                <td class="border px-2 py-1">🧰</td>
                <td class="border px-2 py-1">TOOLBOX</td>
                <td class="border px-2 py-1">&#x1F9F0;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\01F9F0</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\01F9F0';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">♫</span></td>
                <td class="border px-2 py-1">♫</td>
                <td class="border px-2 py-1">BEAMED EIGHTH NOTES</td>
                <td class="border px-2 py-1">&#x266B;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\266B</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\266B';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="border px-2 py-1"><span class="preview-glyph">♪</span></td>
                <td class="border px-2 py-1">♪</td>
                <td class="border px-2 py-1">EIGHTH NOTE</td>
                <td class="border px-2 py-1">&#x266A;</td>
                <td class="border px-2 py-1">
                    <span class="css-escape-demo">
                        <code>\266A</code>
                        <span class="css-escape-popup">
                            <span class="css-escape-sample" style="--css-escape:'\266A';"></span>
                        </span>
                    </span>
                </td>
            </tr>
            <tbody>

              <!-- Add remaining missing symbols in the same format -->
            </tbody>

            <tbody>
                <tr class="bg-gray-100">
                    <th class="border px-2 py-1">Preview</th>
                    <th class="border px-2 py-1">Glyph</th>
                    <th class="border px-2 py-1">Name</th>
                    <th class="border px-2 py-1">Hex NCR</th>
                    <th class="border px-2 py-1 th-css-hover-demo">
                        CSS Escape
                        <span class="th-css-hover-popup">
                            demoing <a href="https://www.w3.org/WAI/WCAG22/Techniques/failures/F87" target="_blank">::before</a> with content:"\2600" like rules.
                        </span>
                    </th>
                </tr>

        </tbody>
    </table>
    <!-- CARD: AnnieDeBrowsa SAP Preview Tool  --

</div>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "476605b5cfe44956a453fb886673520f"}'></script><!-- End Cloudflare Web Analytics -->
<script src="public/assets/js/showme-hideme.js"></script>
</body>
</html>
