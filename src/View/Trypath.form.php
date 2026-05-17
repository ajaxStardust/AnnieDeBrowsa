<!-- ^ Trypath.form.php -->
<dl id="processingSummary" class="mb3">
                        <dt class="pointer b f6">Path Processing Methods <span class="thin f6">(separated pipeline)</span>
                            <span class="normal blue pointer f6" id="show_g01"
                                onclick="swap_text('show_g01','glossary_01') ">
                                [details]</span>
                        </dt>
                        <dd id="glossary_01" class="bg-light-gray pa2 pv2 mt2 br2 dn">
                            <p>Using the new separated pipeline: PathTransformer (normalization), UrlBuilder (construction), UrlEvaluator (evaluation).</p>
                            <p>Path components are extracted via regex and stored in <code>$pipelineData['components']</code>.</p>
                            <ul>
                                <li><code>buildByComp</code> uses host and trimmed path from UrlBuilder output.</li>
                                <li><code>concatThis</code> filters host-like components from the path components.</li>
                                <li><code>concatSwitch</code> uses all components from UrlEvaluator output.</li>
                            </ul>

                <?php
$common_paths = [
    "/opt/lampp/htdocs",
    "/var/www/html",
    "/var/www/htdocs",
    "/var/www/public_html",
    "/var/www/htdocs/public_html",
    "/var/www/wwwroot",
    "/home/admin/web",
];

// Trim common paths from constructed path
$trimmed_path = $pipelineData['constructed_path'];
foreach ($common_paths as $cpath) {
    if (strpos($trimmed_path, $cpath) === 0) {
        $trimmed_path = substr($trimmed_path, strlen($cpath));
        break;
    }
}

// Result 1: buildByComp - direct host + trimmed path
$buildByComp = $pipelineData['protocol'] . "://" . $pipelineData['host'] . "/" . ltrim($trimmed_path, "/");

// Result 2: concatThis - filter host-like components
$concatThis = $pipelineData['protocol'] . "://" . $pipelineData['host'];
$host_like = ['var', 'www', 'admin', 'home', 'web', $pipelineData['host']];
foreach ($pipelineData['components'] as $component) {
    if (!in_array($component, $host_like)) {
        $component = str_ireplace("public_html", "", $component);
        $component = str_ireplace('//', '/', $component);
        $concatThis .= "/" . ltrim($component, "/");
    }
}

// Result 3: concatSwitch - use all filtered components from evaluation
$concatSwitch = $pipelineData['protocol'] . "://" . $pipelineData['host'];
foreach ($pipelineData['filtered_components'] as $component) {
    // Skip if component matches the host
    if ($component === $pipelineData['host']) {
        continue;
    }
    $concatSwitch .= "/" . str_ireplace("/", "", $component);
}
?>
            </dd>
        </dl>

        <!-- URL Conversion Form + Conversion Results: 50/50 split -->
        <div class="flex flex-row gap3 mt4 pt3 bt b--light-gray" style="flex-wrap: nowrap;">
            <!-- Left: URL Conversion Form -->
            <div class="w-50" style="min-width: 0;">
                <h3 class="f5 fw6 mb2">Convert System Path</h3>
                <form id="p2u2top" method="GET" class="mb3">
                    <div class="mb2">
                        <label for="path2url" class="db mb1 f6 fw6">System Path:</label>
                        <input type="text" name="path2url" id="path2url" value="<?php print $enterpathhere; ?>"
                            class="input-reset w-100 pa2 ba b--light-gray br1 f6">
                    </div>
                    <button class="pv2 ph3 bg-blue white bn br1 pointer f6 fw6" type="submit" name="submit">Submit
                        Path</button>
                </form>
            </div>

            <!-- Right: Conversion Results -->
            <div id="position-urls" class="w-50" style="min-width: 0;">
                <h3 class="f5 fw6 mb3">Conversion Results</h3>
                <p class="f6 gray mb3">Select a result to use in the Domain Configuration below:</p>
                <div class="flex flex-column gap2">
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
                            echo '<div class="card card-result pa3 br2 ba b--light-gray">';
                            echo '<div class="mb2 flex items-center">';
                            echo '<input type="radio" onchange="updateTwerkinPath()" id="url_' . $method . '" name="selectedUrl" value="' . htmlspecialchars($url) . '" ' . $isChecked . ' class="mr2">';
                            echo '<label for="url_' . $method . '" class="f6 fw6 pointer mb0">' . ucfirst($method) . '</label>';
                            echo '</div>';
                            echo '<p class="mt1 mb2 f6 gray">' . $descriptions[$method] . '</p>';
                            echo '<p class="mb0 f6 break-word mono bg-light-gray pa2 br1"><a href="' . $url . '" target="_blank" class="blue hover-dark-blue">' . $url . '</a></p>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div> 
    </div>
</div>
<!--  Trypath.form.php $ -->

