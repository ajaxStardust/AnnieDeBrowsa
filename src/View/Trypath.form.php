<!-- ^ Trypath.form.php -->
<dl id="processingSummary" class="sans-serif mb3">
                        <dt class="sans-serif pointer b f6">Path Processing Methods <span class="sans-serif thin f6">(three approaches)</span>
                            <span class="sans-serif normal blue pointer f6" id="show_g01"
                                onclick="swap_text('show_g01','glossary_01') ">
                                [details]</span>
                        </dt>
                        <dd id="glossary_01" class="sans-serif bg-light-gray pa2 pv2 mt2 br2 dn">
                            <p>Using regular expressions and other syntax, the URL components which make up the path
                                are separated and stored in an array, "path[]". </p>
                            <p><code>path[]</code> is derived from <code
                                    class="sans-serif php">$Eval-&gt;test_location($enterpathhere)['pb'];</code></p>
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
                         
                <?php
$common_paths = [
    "\/opt\/lampp\/htdocs",
    "\/var\/www\/html",
    "\/var\/www\/htdocs",
    "\/var\/www\/public_html",
    "\/var\/www\/htdocs\/public_html",
    "\/var\/www\/wwwroot",
    "\/home\/admin\/web",
];
$trimmed_new_url = str_ireplace(
    "/var/www/" . $contructNewMethod["_dynamichost"],
    "",
    $contructNewMethod["new_url_concat"]
);
foreach ($common_paths as $cpathKey => $cpathVal) {
    if (preg_match($cpathVal, $contructNewMethod["new_url_concat"])) {
        $trimmed_new_url = str_ireplace($cpathVal, "", $contructNewMethod["new_url_concat"]);

        break;
    }
}

$buildByComp =
    $_SERVER["REQUEST_SCHEME"] . "://" . $contructNewMethod["_dynamichost"] . "/" . ltrim($trimmed_new_url, "/");
$concatThis = $_SERVER["REQUEST_SCHEME"] . "://";
$concatSwitch = $_SERVER["REQUEST_SCHEME"] . "://" . $contructNewMethod["_dynamichost"];
foreach ($P2u2->path_comps["matches"] as $mKey => $mVal) {
    echo "<br>path[" . $mKey . "]: " . $mVal;
    if ($mVal != "var" && $mVal != "www" && $mVal != "admin" && $mVal != "home" && $mVal != "web") {
        $mVal = str_ireplace("public_html", "", $mVal);
        $mVal = str_ireplace('//','/',$mVal);
        $concatThis .= ltrim($mVal, "/") . "/";
        // $concatThis = str_ireplace($_SERVER['SERVER_NAME'],'/',$concatThis);
    }
}

$process_location = $Eval->test_location($enterpathhere)["pb"];

foreach ($process_location as $mKey => $mVal) {
    echo "<br>path[" . $mKey . "]: " . $mVal;
    $concatSwitch .= str_ireplace("/", "", $mVal) . "/";
}
?>
            </dd>
        </dl>

        <!-- URL Conversion Form -->
        <div class="sans-serif mt4 pt3 bt b--light-gray">
            <h3 class="sans-serif f5 fw6 mb2">Convert System Path</h3>
            <form id="p2u2top" method="GET" class="sans-serif mb3">
                <div class="sans-serif mb2">
                    <label for="path2url" class="sans-serif db mb1 f6 fw6">System Path:</label>
                    <input type="text" name="path2url" id="path2url" value="<?php print $enterpathhere; ?>"
                        class="sans-serif input-reset w-100 pa2 ba b--light-gray br1 f6">
                </div>
                <button class="sans-serif pv2 ph3 bg-blue white bn br1 pointer f6 fw6" type="submit" name="submit">Submit
                    Path</button>
            </form>
        </div>

        <!-- Conversion Results -->
        <div id="position-urls" class="sans-serif mt4 pt3 bt b--light-gray">
            <h3 class="sans-serif f5 fw6 mb3">Conversion Results</h3>
            <p class="sans-serif f6 gray mb3">Select a result to use in the Domain Configuration below:</p>
            <div class="sans-serif grid-3-ns gap3">
                <?php
                    $results = [
                        'buildByComp' => rtrim($buildByComp, "/"),
                        'concatThis' => rtrim($concatThis, "/"),
                        'concatSwitch' => $concatSwitch
                    ];
                    
                    $descriptions = [
                        'buildByComp' => 'Direct hostname construction',
                        'concatThis' => 'Filtered paths (most reliable)',
                        'concatSwitch' => 'Switch-case logic (experimental)'
                    ];
                    
                    foreach ($results as $method => $url) {
                        $isChecked = ($method === 'concatSwitch') ? 'checked' : '';
                        echo '<div class="sans-serif card pa3 br2 ba b--light-gray">';
                        echo '<div class="sans-serif mb2 flex items-center">';
                        echo '<input type="radio" onchange="updateTwerkinPath()" id="url_' . $method . '" name="selectedUrl" value="' . htmlspecialchars($url) . '" ' . $isChecked . ' class="sans-serif mr2">';
                        echo '<label for="url_' . $method . '" class="sans-serif f6 fw6 pointer mb0">' . ucfirst($method) . '</label>';
                        echo '</div>';
                        echo '<p class="sans-serif mt1 mb2 f6 gray">' . $descriptions[$method] . '</p>';
                        echo '<p class="sans-serif mb0 f6 break-word mono bg-light-gray pa2 br1"><a href="' . $url . '" target="_blank" class="sans-serif blue hover-dark-blue">' . $url . '</a></p>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div> 
    </div>
</div>
<!--  Trypath.form.php $ -->

