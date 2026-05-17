<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Interactive Guitar Fretboard + Piano Trainer</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <meta name="description"
        content="Interactive guitar fretboard and piano trainer. Learn modes and triads in any key with tonic-relative degree mapping.">

    <!-- Open Graph Meta Tags -->
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Interactive Guitar Fretboard + Piano Trainer">
    <meta property="og:description"
        content="Interactive guitar fretboard and piano trainer. Learn modes and triads in any key with tonic-relative degree mapping.">
    <meta property="og:image" content="https://statecollegeguitarlessons.site/themes/basix-rwguitar/assets/images/logo@2x.png">
    <meta property="og:image:width" content="680">
    <meta property="og:image:height" content="680">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="">
    <meta property="twitter:url" content="">
    <meta name="twitter:title" content="Interactive Guitar Fretboard + Piano Trainer">
    <meta name="twitter:description"
        content="Interactive guitar fretboard and piano trainer. Learn modes and triads in any key with tonic-relative degree mapping.">
    <meta name="twitter:image" content="https://statecollegeguitarlessons.site/themes/basix-rwguitar/assets/images/logo@2x.png">

    <link rel="stylesheet" href="assets/css/guitarstyle.css" />
</head>

<body>
    <h2>Interactive Guitar Fretboard + Piano Trainer</h2>

    <div id="controls">
    <!-- TYPE SELECTOR (mode vs chord)
         JS expects: #chordmode
    -->
    <label>Type:</label>
    <select id="chordmode">
        <option value="mode">Mode</option>
        <option value="chord">Chord</option>
    </select>

    <!-- DEGREE / MODE SELECTOR
         JS expects: #degree
         This dropdown is dynamically populated by ui-controller.js.
    -->
    <label>Degree:</label>
    <select id="degree"></select>
    
        <label for="tonic"><strong>Tonic:</strong></label>
        <select id="tonic" aria-label="Select tonic">
            <option value="C">C</option>
            <option value="C#">C#</option>
            <option value="D">D</option>
            <option value="D#">D#</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="F#">F#</option>
            <option value="G">G</option>
            <option value="G#">G#</option>
            <option value="A">A</option>
            <option value="A#">A#</option>
            <option value="B">B</option>
        </select>
    </div>

    <div id="theory-row" class="row">
        <piano-keyboard></piano-keyboard>
        <note-panel></note-panel>
    </div>

    <div id="guitarboard" class="row">
        <guitar-fretboard frets="15"></guitar-fretboard>
    </div>

    <div id="fretmarkers" class="row">
        <guitar-fret-markers frets="15"></guitar-fret-markers>
    </div>

    <!-- Load JavaScript Modules -->
    <script type="module" src="assets/js/main.js"></script>
</body>

</html>
