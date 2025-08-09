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
            $configPaths = [];
            $configPaths = [NS_ROOT . '/config.json',
                '../config.json',
                './config.json',
                $_SERVER['DOCUMENT_ROOT'] . '/config.json',
                TEST_DIRECTORY . '/config.json'];
            foreach ($configPaths as $cKey => $config_path) {
                $config_path = realpath($config_path);
                if (file_exists($config_path)) {
                    $this->config = json_decode(file_get_contents($config_path), true);
                    if (!defined('JSONCONFIG')) {
                    define('JSONCONFIG', $config_path);
                    }
                }
            }
        } else {
            if (!defined('JSONCONFIG')) {
                $this->config = json_decode(file_get_contents('config.json'), true);
                define('JSONCONFIG', realpath($this->config));
            }
        }
    }

    public function loadConfig(): array
    {
        return $this->config;
    }

    public function saveConfig(array $data): bool
    {
        $this->config = $data;

        $encoded = json_encode($this->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($encoded === false) {
            throw new \RuntimeException("Failed to encode JSON: " . json_last_error_msg());
        }

        $result = file_put_contents($this->jsonFile, $encoded);

        if ($result === false) {
            throw new \RuntimeException("Failed to write to config file: {$this->jsonFile}");
        }

        return true;
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
