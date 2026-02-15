<?php

namespace P2u2\Public;
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Miscellaneous Unicode NCR\'s for Use in CSS ::before';
$title = $page_heading . ' | transformative.jori';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-unicode.php';

?>
<body>
<h1 class="text-3xl font-semibold mb-3"><?= $page_heading ?></h1>

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
  </tbody>

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
<?php
// include '/public/content/content-unicode-curated.php'

require NS2_ROOT . '/public/footer/footer-unicode.php';

?>
