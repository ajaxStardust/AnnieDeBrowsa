<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Interactive Guitar Fretboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Guitar Fretboard — Nut + String Names</h2>

<div id="controls">
  <div>
    <label for="parent-key-select"><strong>Parent Key:</strong></label>
    <select id="parent-key-select">
      <option>C</option><option>C#</option><option>D</option><option>D#</option>
      <option>E</option><option>F</option><option>F#</option><option>G</option>
      <option>G#</option><option>A</option><option>A#</option><option>B</option>
    </select>
  </div>

  <div>
    <label for="mode-select"><strong>Mode:</strong></label>
    <select id="mode-select">
      <option>Ionian</option><option>Dorian</option><option>Phrygian</option>
      <option>Lydian</option><option>Mixolydian</option><option>Aeolian</option>
      <option>Locrian</option>
    </select>
  </div>

  <div id="view-control">
    <strong>View:</strong>
    <label class="switch">
      <input id="view-toggle" type="checkbox">
      <span id="view-label">Mode</span>
    </label>
  </div>

  <div id="tonic-container">
    <strong>Tonic:</strong>
    <div id="tonic-radios"></div>
  </div>
</div>

<div class="fretboard-wrapper">
  <div id="string-names" class="string-names" aria-hidden="true"></div>
  <svg id="fretboard" class="guitar-fretboard"
       width="840" height="200"
       role="img" aria-label="Fretboard"></svg>
</div>

<div id="keyboard" class="keyboard"></div>

<p>
  <a href="interactive.html" target="_blank">
      Current "working" iteration
  </a>
</p>

<p>
  <a href="interactive.base.html" target="_blank">
      Interactive Plus Piano Mapping, plus whatever you want!
  </a>
</p>

<p>
  <a href="https://transformative.click" target="_blank">
      Or go to "I" here for other Iterations
  </a>
</p>
<!-- CARD: AnnieDeBrowsa SAP Preview Tool  -->
<!-- Styled with Tailwind CSS (latest, via CDN) -->
<details id="adb-card-github" class="content-item card border rounded-lg mr-4 mb-4 p-2 hover:bg-gray-50 transition w-80">
  <summary class="flex items-center gap-2 cursor-pointer text-lg font-semibold"><img src="https://github.githubassets.com/favicons/favicon.svg" alt="GitHub" class="w-6 h-6">SPA Preview Tool</summary>          <div class="expanded-content flex flex-col items-start mt-2">
    <div class="mb-2">
      <a href="https://github.com/ajaxStardust/AnnieDeBrowsa.git" target="_blank" class="text-blue-600 hover:underline font-mono">
        ajaxStardust / AnnieDeBrowsa
      </a>
    </div>
    <div class="flex flex-wrap gap-2 mb-2">
      <!-- Only meaningful badges -->
      <img src="https://img.shields.io/github/forks/ajaxStardust/AnnieDeBrowsa?style=flat-square" alt="Forks">
      <img src="https://img.shields.io/github/contributors/ajaxStardust/AnnieDeBrowsa?style=flat-square" alt="Contributors">
      <img src="https://img.shields.io/github/commit-activity/m/ajaxStardust/AnnieDeBrowsa?style=flat-square" alt="Commit Activity">
    </div>
    <div class="text-sm text-gray-700 font-mono">
      <p>Developer&apos;s easy <a class="text-blue-600 hover:underline" href="https://transformative.click" target="_blank">PREVIEW</a> rendered SPA.</p>
      <p>Debug quickly with <a href="https://transformative.click" target="_blank">Firebug-Lite</a>. PLUS: System Path to HTTP <a href="https://transformative.click/public/default.php" target="_blank">URL Transformation</a> Tool!</p>
    </div>
  </div>
</details>
<hr class="cf clearfix hidden">
<!-- CARD END AnnieDeBrowsa SPA Preview Tool for Developers. -->

<script src="script.js"></script>
</body>
</html>
