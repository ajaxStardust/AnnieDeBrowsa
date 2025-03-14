<?php
namespace Adb\Model;

use Adb\Model\Localsites as Localsites;
use Adb\Model\Urlprocessor as Urlprocessor;
use Adb\Model\Jsonconfigmanager as Jsonconfigmanager;
use Adb\Model\Environmentmanager as Environmentmanager;

/**
 * Adbsoc separation of concerns
 */
#[\AllowDynamicProperties]
class Adbsoc
{
    public $Environmentmanager_class;
    public $Jsonconfigmanager_class;
    public $Urlprocessor_class;
    public $Localsites_class;
    public $bodyid;
    public $ini_set;
    private $last_mod;
    public $server;
    public $document_root;
    private $default_tz;
    private $pass_pathinfo;
    private $error_reporting;
    public $pathOps;

    public function __construct($pathOps = null)
    {
        $this->Environmentmanager_class = new Environmentmanager;
        $this->Jsonconfigmanager_class = new Jsonconfigmanager;
        $config = $this->Jsonconfigmanager_class->loadConfig();
        $this->Localsites_class = new Localsites();

        if (!defined('ADBLOCTN')) {
            define('ADBLOCTN', dirname($_SERVER['SCRIPT_FILENAME']));
        }

        if ($pathOps != ADBLOCTN && $pathOps != null) {
            if (!defined('NOT_ADBLOCTN')) {
                define('NOT_ADBLOCTN', $pathOps);
            }
            $this->pathOps = $pathOps;
            $this->Urlprocessor_class = new Urlprocessor($pathOps);
        } else {
            if (!defined('EQ_ADBLOCTN')) {
                define('EQ_ADBLOCTN', $pathOps);
            }
            $this->pathOps = ADBLOCTN;
            $this->Urlprocessor_class = new Urlprocessor($pathOps);
        }

        $this->bodyid = pathinfo(($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
        $this->error_reporting = error_reporting(E_ALL);
        $this->ini_set = ini_set('display_errors', 1);
        $this->last_mod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
        $this->server = $this->Environmentmanager_class->getServer();
        $this->document_root = $this->Environmentmanager_class->getDocumentRoot();
        $this->default_tz = $this->Environmentmanager_class->getDefaultTimezone();

        // Define the base directory where your files are located
        if (!defined('TEST_DIRECTORY')) {
            define('TEST_DIRECTORY', dirname(__DIR__, 2));
        }

        // Instantiate other necessary classes
        $urlProcessor = new Urlprocessor($this->pathOps);

        // ... rest of the constructor logic
    }

    public function processUrl($pathOps)
    {
        if(!defined('TEST_DIRECTORY')){
            define('TEST_DIRECTORY', $pathOps);
        }

        if (!isset($this->Urlprocessor_class)) {
            $this->Urlprocessor_class = new Urlprocessor($pathOps);
        }

        // Use the Urlprocessor to process the URL
        $processedUrl = $this->Urlprocessor_class->chopUrl($pathOps);

        // You might want to do something with the processed URL here
        // For example, update the URL count
        $this->updateUrlCount($processedUrl);

        // You could also update other properties or perform other actions based on the processed URL

        return $processedUrl;
    }

    public function updateUrlCount($url)
    {
        return $this->Jsonconfigmanager_class->updateUrlCount($url);
    }

    public function saveConfig()
    {
        $this->Jsonconfigmanager_class->saveConfig($this->Jsonconfigmanager_class->loadConfig());
    }

    public function getConfig()
    {
        return $this->Jsonconfigmanager_class->loadConfig();
    }
}

