<?php

namespace Adb\Public\Assets\Css;

use Adb\Model\Urlprocessor as urlChopper;
if (!defined('MASTHEAD_ROOT')) {
   define('MASTHEAD_ROOT', dirname(__DIR__, 3));
}
/**
 * @copyright AnnieDeBrowsa™ resource filename: masthead.php
 * 	© 2009 @ajaxStardust
 * 	© 2009 j sabarese, StateCollegeGuitarLessons.com
 *
 * 	@overview
 * 		process dynamic string for creation of SVG used as masthead image
 */
require '../../../src/Model/Urlprocessor.php';
$svgPathChopper = new urlChopper($_SERVER['PHP_SELF']);

$svgTextRaw = dirname(dirname(__FILE__));
$svgSubject = __FILE__;
$svgReplace = '';
$svgPattern = '/^(.*\/)([^\/]+)(\/public\/assets\/css\/masthead\.php)$/';
$svgText = preg_replace($svgPattern, '$2', $svgSubject);

if ((strlen($svgText) < 1)) {
    $svgText = $_SERVER['SERVER_NAME'];
}

/*
 * @svgText string var(text displayed in header)
 * 	trim the header image text to 20 chars max
 * 	(i.e. substr_replace(_txt, '', 0, _CHARS_)
 */

$topStroke = 0.025;
$bottomStroke = 0.03;

$tspan = substr_replace($svgText, '', 0, -30);
$tspan = $svgText;
if (strlen($tspan) > 22) {
    $fontSize = '1.8em';
    $multiplier = 0.3;
} elseif (strlen($tspan) > 17) {
    $fontSize = '2em';
    $multiplier = 0.6;
} else {
    $fontSize = '3em';
    $multiplier = 1;
}

$strokeWidthTop = $svgPathChopper->svgFontStyler($multiplier, $topStroke) . 'em';
$strokeWidthBottom = $svgPathChopper->svgFontStyler($multiplier, $bottomStroke) . 'em';

header('content-type:image/svg+xml');
?>
<!DOCTYPE svg PUBLIC
    "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN"
    "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd"[
<!ENTITY % SVG.prefixed "IGNORE">
<!ENTITY % XHTML.prefixed "INCLUDE">
<!ENTITY % XHTML.prefix "xhtml">
<!ENTITY % MATHML.prefixed "INCLUDE">
<!ENTITY % MATHML.prefix "math">
]>

<svg
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:xlink="http://www.w3.org/1999/xlink"
   version="1.1"
   width="100%"
   height="150"
   id="svg2">
<defs
   id="defs6">
   <style>
@import url('https://fonts.googleapis.com/css2?family=Condiment&amp;family=Oswald:wght@200..700&amp;display=swap');
    </style>
  <linearGradient
     id="linearGradient3672">
    <stop
       id="stop3674"
       style="stop-color:#e2e2ef;stop-opacity:1"
       offset="0" />
    <stop
       id="stop3676"
       style="stop-color:#ffffff;stop-opacity:1"
       offset="0.60000068" />
    <stop
       id="stop3678"
       style="stop-color:#9c9c9c;stop-opacity:1"
       offset="1" />
  </linearGradient>
  <linearGradient
     x1="133.97307"
     y1="495.00583"
     x2="133.97307"
     y2="502.80161"
     id="linearGradient3670"
     xlink:href="#linearGradient3672"
     gradientUnits="userSpaceOnUse"
     gradientTransform="matrix(3.6468531,0,0,3.6468531,-431.03019,-1702.9991)"
     spreadMethod="reflect" />
  <linearGradient
     id="linearGradient3662">
    <stop
       id="stop3664"
       style="stop-color:#e2e2f2;stop-opacity:1"
       offset="0" />
    <stop
       id="stop3666"
       style="stop-color:#ffffff;stop-opacity:1"
       offset="0.69999999" />
    <stop
       id="stop3668"
       style="stop-color:#9c9cac;stop-opacity:1"
       offset="1" />
  </linearGradient>
  <linearGradient
     x1="134.72362"
     y1="491.72186"
     x2="134.72362"
     y2="503.44763"
     id="linearGradient2832"
     xlink:href="#linearGradient3662"
     gradientUnits="userSpaceOnUse"
     gradientTransform="matrix(3.6468531,0,0,3.6468531,-431.03019,-1702.9991)"
     spreadMethod="reflect" />
  <filter
     color-interpolation-filters="sRGB"
     id="filter4002">
    <feGaussianBlur
       id="feGaussianBlur4004"
       stdDeviation="2.121839" />
  </filter>
  <linearGradient
     x1="178.74948"
     y1="541.79413"
     x2="178.74948"
     y2="490.74777"
     id="linearGradient4012"
     xlink:href="#linearGradient3964"
     gradientUnits="userSpaceOnUse"
     gradientTransform="translate(90.008,-0.855)" />
  <linearGradient
     id="linearGradient3964">
    <stop
       id="stop3966"
       style="stop-color:#e2e2f2;stop-opacity:1"
       offset="0" />
    <stop
       id="stop3970"
       style="stop-color:#ffffff;stop-opacity:1"
       offset="0.85135138" />
    <stop
       id="stop3968"
       style="stop-color:#9c9cac;stop-opacity:1"
       offset="1" />
  </linearGradient>
  <linearGradient
     x1="178.74948"
     y1="541.79413"
     x2="178.74948"
     y2="490.74777"
     id="linearGradient3167"
     xlink:href="#linearGradient3964"
     gradientUnits="userSpaceOnUse"
     gradientTransform="translate(90.008,-0.855)" />
  <linearGradient
     id="linearGradient3169">
    <stop
       id="stop3171"
       style="stop-color:#e2e2e2;stop-opacity:1"
       offset="0" />
    <stop
       id="stop3173"
       style="stop-color:#ffffff;stop-opacity:1"
       offset="0.85135138" />
    <stop
       id="stop3175"
       style="stop-color:#9c9c9c;stop-opacity:1"
       offset="1" />
  </linearGradient>
  <linearGradient
     x1="178.74948"
     y1="541.79413"
     x2="178.74948"
     y2="490.74777"
     id="linearGradient3182"
     xlink:href="#linearGradient3964"
     gradientUnits="userSpaceOnUse"
     gradientTransform="translate(90.008,-0.855)" />

  <linearGradient
     x1="0.92452002"
     y1="136.61098"
     x2="47.338585"
     y2="136.61098"
     id="linearGradient3650"
     xlink:href="#linearGradient3964"
     gradientUnits="userSpaceOnUse" />

  <filter
     color-interpolation-filters="sRGB"
     id="filter3630">
    <feGaussianBlur
       id="feGaussianBlur3632"
       stdDeviation="0.90110807" />
  </filter>
</defs>
<text
   x="1.9332228"
   y="139.98305"
   transform="matrix(1.1694716,-0.29456694,0,0.85508701,0,0)"
   id="text4459"
   xml:space="preserve"
   style="font-size:<?php print $fontSize; ?>;
	direction:ltr;
	display:inline;
	fill:#000000;
	fill-opacity:1;
	fill-rule:nonzero;
	filter:url(#filter3630);
	font-family:Oswald;
	font-stretch:normal;
	font-style:normal;
	font-variant:normal;
	font-weight:700;
	font-weight:normal;
	letter-spacing:normal;
	line-height:100%;
	marker:none;
	opacity:0.5;
	overflow:visible;
	stroke:#000000;
	stroke-dasharray:none;
	stroke-dashoffset:0;
	stroke-linecap:round;
	stroke-linejoin:round;
	stroke-miterlimit:4;
	stroke-opacity:1;
	stroke-width:<?php print $strokeWidthBottom; ?>;
	text-anchor:start;
	text-decoration:none;
	text-indent:0pt;
	text-transform:none;
	visibility:visible;
	word-spacing:normal;"> <?php print $tspan; ?></text>
<text
   x="1.9332228"
   y="139.98305"
   transform="matrix(1.1694716,-0.29456694,0,0.85508701,0,0)"
   id="text2850"
   xml:space="preserve"
   style="
	direction:ltr;
	display:inline;
	fill:#0000A0;
	fill-opacity:0.6;
	fill-rule:nonzero;
	font-family:Oswald;
	font-size:<?php print $fontSize; ?>;
	font-stretch:normal;
	font-style:normal;
	font-variant:normal;
	font-weight:normal;
	letter-spacing:normal;
	line-height:100%;
	marker:none;
	overflow:visible;
	stroke:url(#linearGradient3670);
	stroke-dasharray:none;
	stroke-dashoffset:0;
	stroke-linecap:round;
	stroke-linejoin:round;
	stroke-miterlimit:4;
	stroke-opacity:1;
	stroke-width:<?php print $strokeWidthTop; ?>;
	text-anchor:start;
	text-decoration:none;
	text-indent:0pt;
	text-transform:none;
	visibility:visible;
	word-spacing:normal;"> <?php print $tspan; ?></text>
</svg>
