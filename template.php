<!DOCTYPE html>
<?php

/*
 * adb_simplest/template.php
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

    <div id="pagewidth" class="sans-serif container">
        <!--    :begin    class:content        -->

        <section id="header">
            <!-- #HEADER -->
            <h1 class="sans-serif text-center text-primary text-4 text-bold">
                <?php print $page_heading; ?>
            </h1>
        </section>
        <section id="general_notes">

            <div class="sans-serif notes">
                <p>Examples from the Chota MicroCSS project website.</p>
                <dl>
                    <dt class="sans-serif keyTerms pointer">.text-[color]<span class="sans-serif normal blue pointer" id="show_n01"
                            onclick="swap_text('show_n01','chota-utilities_01') "> toggle... </span>
                    </dt>
                    <dd id="chota-utilities_01" class="sans-serif displaynone">
                        <!-- hidden then revealed -->
                        <p class="sans-serif text-primary">.text-primary</p>
                        <p class="sans-serif text-light">.text-light</p>
                        <p class="sans-serif text-white">.text-white</p>
                        <p class="sans-serif text-dark">.text-dark</p>

                        <p class="sans-serif text-grey">.text-grey</p>
                        <p class="sans-serif text-error">.text-error</p>
                        <p class="sans-serif text-success">.text-success</p>
                    </dd>

                    <dt class="sans-serif keyTerms pointer">bg-[color]: <span class="sans-serif normal blue pointer" id="show_n02"
                            onclick="swap_text('show_n02','chota-utilities_02') "> toggle... </span>
                    </dt>
                    <dd id="chota-utilities_02" class="sans-serif displaynone">
                        <!-- hidden then revealed -->
                        <p class="sans-serif text-white bg-primary">.bg-primary .text-white</p>
                        <p class="sans-serif text-info bg-light">.bg-light .text-dark</p>
                        <p class="sans-serif text-light bg-dark">.bg-dark .text-light</p>
                        <p class="sans-serif text-white bg-grey">.bg-grey .text-white</p>
                        <p class="sans-serif text-light bg-error">.bg-error .text-light</p>
                        <p class="sans-serif text-dark bg-success">.bg-success .text-dark</p>
                    </dd>
                </dl>
            </div> <!-- $ end .notes div -->
        </section>
        <section class="sans-serif content">
            <details>
                <summary>Border Colors Table</summary>
                <table class="sans-serif table table-striped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>bd-primary</td>
                            <td><span class="sans-serif bd-primary">Primary Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-light</td>
                            <td><span class="sans-serif bd-light">Light Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-dark</td>
                            <td><span class="sans-serif bd-dark">Dark Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-grey</td>
                            <td><span class="sans-serif bd-grey">Grey Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-error</td>
                            <td><span class="sans-serif bd-error">Error Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-success</td>
                            <td><span class="sans-serif bd-success">Success Border</span></td>
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
            <table class="sans-serif table table-striped">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Example</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>text-primary</td>
                        <td><span class="sans-serif text-primary">Primary Text</span></td>
                    </tr>
                    <tr>
                        <td>text-light</td>
                        <td><span class="sans-serif text-light">Light Text</span></td>
                    </tr>
                    <tr>
                        <td>text-white</td>
                        <td><span class="sans-serif text-white">White Text</span></td>
                    </tr>
                    <tr>
                        <td>text-dark</td>
                        <td><span class="sans-serif text-dark">Dark Text</span></td>
                    </tr>
                    <tr>
                        <td>text-grey</td>
                        <td><span class="sans-serif text-grey">Grey Text</span></td>
                    </tr>
                    <tr>
                        <td>text-error</td>
                        <td><span class="sans-serif text-error">Error Text</span></td>
                    </tr>
                    <tr>
                        <td>text-success</td>
                        <td><span class="sans-serif text-success">Success Text</span></td>
                    </tr>
                </tbody>
                <tbody class="sans-serif table table-striped">

                    <tbody>
                        <tr>
                            <td>bg-primary</td>
                            <td><span class="sans-serif text-white bg-primary">Primary Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-light</td>
                            <td><span class="sans-serif text-dark bg-light">Light Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-dark</td>
                            <td><span class="sans-serif text-light bg-dark">Dark Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-grey</td>
                            <td><span class="sans-serif text-white bg-grey">Grey Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-error</td>
                            <td><span class="sans-serif text-light bg-error">Error Background</span></td>
                        </tr>
                        <tr>
                            <td>bg-success</td>
                            <td><span class="sans-serif text-dark bg-success">Success Background</span></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>bd-primary</td>
                            <td><span class="sans-serif bd-primary">Primary Border</span></td>
                        </tr>
                        <tr>
                            <td>bd-light</td>
                            <td><span class="sans-serif bd-light">Light Border</span></td> <!-- light border -->
                        </tr>   <!-- light border -->
                        <tr>
                            <td>bd-dark</td>
                            <td><span class="sans-serif bd-dark">Dark Border</span></td>   <!-- dark border -->
                        </tr>   <!-- dark border -->    <!-- dark border -->
                        <tr>
                            <td>bd-grey</td>
                            <td><span class="sans-serif bd-grey">Grey Border</span></td>   <!-- grey border -->    <!-- grey border -->
                        </tr>   <!-- grey border -->    <!-- grey border -->    <!-- grey border -->

                        <tr>
                            <td>bd-success</td>
                            <td><span class="sans-serif bd-success">Success Border</span></td>   <!-- success border -->    <!-- success border -->
                        </tr>   <!-- success border -->    <!-- success border -->
                    </tbody>
            </table>
            </details>
        </section>
        
        
        
        <!-- END NOTES -->
        <!-- END NOTES -->


    
    <section class="sans-serif w-75 mx-auto">
        <!-- :begin #_GLOSSARY  -->
        <div>
            <section class="sans-serif content">
                <details>
                    <summary class="sans-serif text-smallcaps">
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

        <section class="sans-serif content">
            

        </section> <!-- $ :end #_glossary -->
    </section> <!-- $ :end #_glossary -->
    </div> <!-- $ :end #_glossary -->

    <footer class="sans-serif footer px-4">
        <!--    .FOOTER     -->
        <div class="sans-serif row gx-5">
            <div class="sans-serif col">
                <div class="sans-serif p-3 border bg-light"> Based on Notes by <a href="https://github.com/ajaxStardust"
                        target="_blank" title="View original">@ajaxStardust</a> <em>Laravel</em> notes:</div>
            </div>
            <div class="sans-serif col">
                <div class="sans-serif p-3 border bg-light text-end"><kbd>
                        <?php echo $lastMod; ?>
                    </kbd></div>
            </div>
        </div>
    </footer>
    </body> <!--    $ :end    END class.content (former id.maincol)    $    -->
    <script src="public/assets/js/showme-hideme.js"></script>

</html>