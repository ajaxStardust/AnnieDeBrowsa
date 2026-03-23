<?php
namespace Adb\Public\Assets\Css;

use Adb\Model\Urlprocessor as urlChopper;

if (!defined('MASTHEAD_ROOT')) {
    define('MASTHEAD_ROOT', dirname(__DIR__, 3));
}

require '../../../src/Model/Urlprocessor.php';
$svgPathChopper = new urlChopper($_SERVER['PHP_SELF']);

// === Dynamic text: the segment 4 levels up from this file IS the install root ===
// {install-root}/public/assets/css/masthead.php → dirname(__FILE__, 4) = install root
$tspan = basename(dirname(__FILE__, 4));

// Final fallback
if (empty($tspan) || $tspan === '.') {
    $tspan = $_SERVER['SERVER_NAME'];
}

// Font size based on string length
if (strlen($tspan) > 22) {
  $fontSize = '2.55em';
} elseif (strlen($tspan) > 17) {
  $fontSize = '2.95em';
} else {
  $fontSize = '4.25em';
}

// Escape for XML
$tspanSafe = htmlspecialchars($tspan, ENT_XML1, 'UTF-8');

// Split into main part + last segment
$parts = explode('.', $tspanSafe);
$lastSegment = '.' . array_pop($parts); // prepend dot back
$mainPart = implode('.', $parts);

header('Content-Type: image/svg+xml');
?>
<svg xmlns="http://www.w3.org/2000/svg"
     width="100%"
  height="200"
  viewBox="0 0 900 200">

  <!-- Google Font Import (Orbitron Bold) -->
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@700&amp;display=swap");
  </style>

  <defs>
    <!-- Subtle drop shadow -->
    <filter id="shadow">
      <feDropShadow dx="2" dy="2" stdDeviation="1" flood-color="#000000" flood-opacity="0.2"/>
    </filter>
  </defs>

  <!-- Main part of text -->
  <text x="50%" y="82"
        text-anchor="middle"
        dominant-baseline="middle"
        font-family="Orbitron, sans-serif"
        font-size="<?php echo $fontSize; ?>"
        fill="#6366f1"
        filter="url(#shadow)">
    <tspan x="50%" dy="0"><?php echo $mainPart; ?></tspan>
    <!-- Keep suffix on same line for domains like transformative.lan -->
    <tspan dx="0.08em">
      <?php echo $lastSegment; ?>
    </tspan>
  </text>
</svg>
