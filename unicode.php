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
$title = 'TITLE ME PLEASE';
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
    <link rel="stylesheet" href="public/assets/css/extra/chota.min.css">
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
</head>

<body>

    <div id="pagewidth" class="container">
        <!--    :begin    class:content        -->
        <div class="notes">

            <h1>Annie DeBrowsa — Unicode Icon CSS Cheatsheet</h1>
            <blockquote>
                <p>
                    A flat, fully visible reference for Jeffrey’s
                    <code>:content</code>
                    CSS nav icons — previewed with Tailwind, escape codes included.
                </p>
            </blockquote>
            <table>
                <thead>
                    <tr>
                        <th>Preview</th>
                        <th>GLYPH</th>
                        <th>Name</th>
                        <th>&amp;#x</th>
                        <th>CSS Escape</th>
                        <th>Support Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="text-yellow-400 text-2xl inline-block">★</span></td>
                        <td>★</td>
                        <td>BLACK STAR</td>
                        <td>&amp;#x2605;</td>
                        <td><code>\2605</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-gray-400 text-2xl inline-block">☆</span></td>
                        <td>☆</td>
                        <td>WHITE STAR</td>
                        <td>&amp;#x2606;</td>
                        <td><code>\2606</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-yellow-400 text-2xl inline-block">☀</span></td>
                        <td>☀</td>
                        <td>BLACK SUN WITH RAYS</td>
                        <td>&amp;#x2600;</td>
                        <td><code>\2600</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-gray-400 text-2xl inline-block">☁</span></td>
                        <td>☁</td>
                        <td>CLOUD</td>
                        <td>&amp;#x2601;</td>
                        <td><code>\2601</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-blue-400 text-2xl inline-block">☂</span></td>
                        <td>☂</td>
                        <td>UMBRELLA</td>
                        <td>&amp;#x2602;</td>
                        <td><code>\2602</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-white text-2xl inline-block">☃</span></td>
                        <td>☃</td>
                        <td>SNOWMAN</td>
                        <td>&amp;#x2603;</td>
                        <td><code>\2603</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-red-500 text-2xl inline-block">☠</span></td>
                        <td>☠</td>
                        <td>SKULL AND CROSSBONES</td>
                        <td>&amp;#x2620;</td>
                        <td><code>\2620</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-yellow-300 text-2xl inline-block">⚡</span></td>
                        <td>⚡</td>
                        <td>HIGH VOLTAGE SIGN</td>
                        <td>&amp;#x26A1;</td>
                        <td><code>\26A1</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-red-500 text-2xl inline-block">❗</span></td>
                        <td>❗</td>
                        <td>HEAVY EXCLAMATION</td>
                        <td>&amp;#x2757;</td>
                        <td><code>\2757</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-green-500 text-2xl inline-block">✔</span></td>
                        <td>✔</td>
                        <td>HEAVY CHECK MARK</td>
                        <td>&amp;#x2714;</td>
                        <td><code>\2714</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-blue-400 text-2xl inline-block">💧</span></td>
                        <td>💧</td>
                        <td>DROPLET</td>
                        <td>&amp;#x1F4A7;</td>
                        <td><code>\01F4A7</code></td>
                        <td>TRUE / font-dependent</td>
                    </tr>
                    <tr>
                        <td><span class="text-blue-500 text-2xl inline-block">💦</span></td>
                        <td>💦</td>
                        <td>SPLASHING</td>
                        <td>&amp;#x1F4A6;</td>
                        <td><code>\01F4A6</code></td>
                        <td>TRUE / font-dependent</td>
                    </tr>
                    <tr>
                        <td><span class="text-yellow-300 text-2xl inline-block">💡</span></td>
                        <td>💡</td>
                        <td>ELECTRIC LIGHT BULB</td>
                        <td>&amp;#x1F4A1;</td>
                        <td><code>\01F4A1</code></td>
                        <td>TRUE / font-dependent</td>
                    </tr>
                    <tr>
                        <td><span class="text-gray-600 text-2xl inline-block">🧰</span></td>
                        <td>🧰</td>
                        <td>TOOLBOX</td>
                        <td>&amp;#x1F9F0;</td>
                        <td><code>\01F9F0</code></td>
                        <td>TRUE / font-dependent</td>
                    </tr>
                    <tr>
                        <td><span class="text-purple-400 text-2xl inline-block">♫</span></td>
                        <td>♫</td>
                        <td>BEAMED EIGHTH NOTES</td>
                        <td>&amp;#x266B;</td>
                        <td><code>\266B</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-pink-400 text-2xl inline-block">♪</span></td>
                        <td>♪</td>
                        <td>EIGHTH NOTE</td>
                        <td>&amp;#x266A;</td>
                        <td><code>\266A</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-gray-500 text-2xl inline-block">⛼</span></td>
                        <td>⛼</td>
                        <td>HEADSTONE GRAVEYARD SYMBOL</td>
                        <td>&amp;#x26FC;</td>
                        <td><code>\26FC</code></td>
                        <td>FALSE</td>
                    </tr>
                    <tr>
                        <td><span class="text-orange-400 text-2xl inline-block">⚙</span></td>
                        <td>⚙</td>
                        <td>GEAR / SETTINGS</td>
                        <td>&amp;#x2699;</td>
                        <td><code>\2699</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-red-400 text-2xl inline-block">☢</span></td>
                        <td>☢</td>
                        <td>RADIOACTIVE SIGN</td>
                        <td>&amp;#x2622;</td>
                        <td><code>\2622</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-green-400 text-2xl inline-block">☣</span></td>
                        <td>☣</td>
                        <td>BIOHAZARD SIGN</td>
                        <td>&amp;#x2623;</td>
                        <td><code>\2623</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-blue-400 text-2xl inline-block">⛔</span></td>
                        <td>⛔</td>
                        <td>NO ENTRY</td>
                        <td>&amp;#x26D4;</td>
                        <td><code>\26D4</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-pink-400 text-2xl inline-block">✈</span></td>
                        <td>✈</td>
                        <td>AIRPLANE</td>
                        <td>&amp;#x2708;</td>
                        <td><code>\2708</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-purple-500 text-2xl inline-block">✉</span></td>
                        <td>✉</td>
                        <td>ENVELOPE</td>
                        <td>&amp;#x2709;</td>
                        <td><code>\2709</code></td>
                        <td>TRUE</td>
                    </tr>
                    <tr>
                        <td><span class="text-red-600 text-2xl inline-block">⚠</span></td>
                        <td>⚠</td>
                        <td>WARNING SIGN</td>
                        <td>&amp;#x26A0;</td>
                        <td><code>\26A0</code></td>
                        <td>TRUE</td>
                    </tr>
                </tbody>
            </table>


        </div> <!-- $ end .notes div -->
        </section>

        <footer class="footer px-4">
            <!--    .FOOTER     -->
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust"
                            target="_blank" title="View original">@ajaxStardust</details> <em>Laravel</em> notes:</div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light text-end"><kbd>
                            2026-Jan-15
                        </kbd></div>
                </div>
            </div>
        </footer>
    </div><!--    $ :end    END class.content (former id.maincol)    $    -->
    <script src="public/assets/js/showme-hideme.js"></script>
</body>


</html>