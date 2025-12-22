<?php
namespace Adb\Model;
if (!defined('NS_ROOT')) {
    define('NS_ROOT', dirname(__DIR__, 2));
 }
 if (!defined('TEST_DIRECTORY')) {
    define('TEST_DIRECTORY', dirname(__DIR__, 2));
 }
 
class Urlprocessor {
    // Properties
    private $subject;
    private $replace;
    private $search;
    private $result;
    private $chopUrl;
    private $chopTrim;
    private $strokeWidth;
    public $whychop;

    public function __construct($pathOps) {
        // Initialize properties
        $this->whychop = TEST_DIRECTORY;
        $this->subject = $this->whychop;
        $this->replace = '';
        $this->search = '@^(.*(?=(/).*))@';
        $this->result = preg_replace($this->search, $this->replace, $this->subject);
    }

    public static function chopUrl($subPassed = null) {
        $subPassed = $subPassed ?? ADBLOCTN;
        $replace = '';
        $search = '@^(.*(?=(/).*))@';
        $result = preg_replace($search, $replace, $subPassed);
        $chopUrl = str_ireplace($result, $replace, $subPassed);
        $chopTrim = ltrim($result, "/");
        $chopTrim = ltrim($chopUrl, "/");

        return preg_replace("/.*\//", '', $chopTrim);
    }

    public function svgTextChopper() {
        $subject = $this->whychop;
        $replace = '';
        $search = '@^(.*(?=(/).*))@';
        $result = preg_replace($search, $replace, $subject);
        $this->chopUrl = str_ireplace($result, $replace, $subject);
        $solidusHere = explode('/', $this->chopUrl);
        $solidusNum = count($solidusHere);
        $solidusChunk = array();
        
        if ($solidusNum > 1) {
            for ($s = 0; $s < ($solidusNum - 1); $s++) {
                $solidusChunk[] = $solidusHere[$s];
            }
        }

        return implode('/', $solidusChunk);
    }

    public function svgFontStyler($multiplier, $svgStroke) {
        $this->strokeWidth = $svgStroke * $multiplier;
        return $this->strokeWidth;
    }

    public function printResults($cReplace, $cResult, $cSearch, $cSubject, $cTrim, $cUrl, $chopThis) {
        $UrlprocessorPrintResults = '<div class="sans-serif content" id="tempInfo">
        <pre class="sans-serif prewrap">
        require \'public/class/class-Urlprocessor.php\';
        <span class="sans-serif violet bold">$_SERVER[\'SCRIPT_NAME\']</span> = '.$_SERVER['SCRIPT_NAME'].'
        <span class="sans-serif green underline">$Urlprocessor</span> = new <strong>Urlprocessor</strong>;
        $chopThis = <span class="sans-serif green underline">$Urlprocessor</span>-><span class="sans-serif red" title="Urlprocessor is method of Urlprocessor class">chopUrl(</span><span class="sans-serif violet bold">$_SERVER[\'SCRIPT_NAME\']</span><span class="sans-serif red">);</span> : '. $chopThis .'
        $chop_subject: <span class="sans-serif violet">'. $cSubject .'</span>
        $chop_replace: ' . $cReplace . '
        $chop_search: ' . $cSearch . '
        $chop_result: '. $cResult . '
        $chop_url: '. $cUrl . '
        $chop_trim: '. $cTrim . '
        </pre>
        </div>';
        return $UrlprocessorPrintResults;
    }
}
