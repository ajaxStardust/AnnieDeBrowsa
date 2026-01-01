<?php
namespace Adb\Public\Assets\Css;

use Adb\Model\Urlprocessor as urlChopper;

if (!defined('MASTHEAD_ROOT')) {
    define('MASTHEAD_ROOT', dirname(__DIR__, 3));
}

require '../../../src/Model/Urlprocessor.php';
$svgPathChopper = new urlChopper($_SERVER['PHP_SELF']);

// === Original dynamic text logic ===
$svgSubject = dirname(dirname(__FILE__));
$svgPattern = '/^(.*\/)([^\/]+)(\/public\/assets\/css\/masthead\.php)$/';
$svgText = preg_replace($svgPattern, '$2', __FILE__);

if ((strlen($svgText) < 1)) {
    $svgText = $_SERVER['SERVER_NAME'];
}

$tspan = $svgText;

// Font size based on string length
if (strlen($tspan) > 22) {
    $fontSize = '1.8em';
} elseif (strlen($tspan) > 17) {
    $fontSize = '2em';
} else {
    $fontSize = '3em';
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
     height="150"
     viewBox="0 0 800 150">

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
  <text x="50%" y="60"
        text-anchor="middle"
        dominant-baseline="middle"
        font-family="Orbitron, sans-serif"
        font-size="<?php echo $fontSize; ?>"
        fill="#000000"
        filter="url(#shadow)">
    <tspan x="50%" dy="0"><?php echo $mainPart; ?></tspan>
    <!-- Last segment: slightly offset and rotated -->
    <tspan x="55%" dy="1.2em" transform="rotate(-10 0,0)">
      <?php echo $lastSegment; ?>
    </tspan>
  </text>
</svg>
