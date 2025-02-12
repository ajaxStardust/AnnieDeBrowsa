<?php
namespace Adb\Model;
use Adb\Model\Helpers as Helpers;

class Jsonconfigmanager extends Helpers
{
    private $config;
    private $jsonFile;

    public function __construct()
    {
        if (!$this->config) {
            // remove the .off from paths if needed
            $this->jsonFile = $_SERVER['DOCUMENT_ROOT'] . '/config.json_off';
            if (file_exists($this->jsonFile)) {
                if(!defined('JSONCONFIG')){
                define('JSONCONFIG',realpath($this->jsonFile));
                }
                $this->config = json_decode(file_get_contents($this->jsonFile), true);
            }
            elseif(file_exists('../config.json_off')){
                if(!defined('JSONCONFIG')){
                define('JSONCONFIG',realpath('../config.json'));
                }
                $this->config = json_decode(file_get_contents('../config.json'), true);                
            }else{
                if(!defined('JSONCONFIG')){
                define('JSONCONFIG',realpath('config.json'));
                }
                $this->config = json_decode(file_get_contents(NS_ROOT.'/config.json'), true);
            }
        }
        
    }

    public function loadConfig()
    {
        return $this->config;
    }

    public function saveConfig($data)
    {
        $this->config = $data;
        file_put_contents($this->jsonFile, json_encode($this->config, JSON_PRETTY_PRINT));
    }

    public function updateUrlCount($url)
    {
        if (isset($this->config['home_urls'])) {
            foreach ($this->config['home_urls'] as &$entry) {
                if ($entry['url'] === $url) {
                    $entry['count']++;
                    $this->saveConfig($this->config);
                    return "Accessed $url. New count is {$entry['count']}.";
                }
            }
        }
        return "URL $url not found in JSON file.";
    }
}
