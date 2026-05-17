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
                    $this->jsonFile = $config_path;
                    $this->config = json_decode(file_get_contents($config_path), true);
                    if (!defined('JSONCONFIG')) {
                    define('JSONCONFIG', $config_path);
                    }
                    break;
                }
            }
        } else {
            if (!defined('JSONCONFIG')) {
                $this->config = json_decode(file_get_contents('config.json'), true);
                $this->jsonFile = realpath('config.json');
                define('JSONCONFIG', $this->jsonFile);
            }
        }

        if (!is_array($this->config)) {
            $this->config = [];
        }
    }

    public function loadConfig()
    {
        return $this->config;
    }

    public function saveConfig($data)
    {
        $this->config = $data;

        if (empty($this->jsonFile)) {
            return false;
        }

        return file_put_contents(
            $this->jsonFile,
            json_encode($this->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        ) !== false;
    }

    public function updateUrlCount($url)
    {
        if (isset($this->config['home_urls'])) {
            foreach ($this->config['home_urls'] as &$entry) {
                if ($entry['url'] === $url) {
                    $entry['count'] = intval($entry['count'] ?? 0) + 1;
                    if ($this->saveConfig($this->config)) {
                        return [
                            'success' => true,
                            'url' => $url,
                            'count' => $entry['count'],
                        ];
                    }

                    return [
                        'success' => false,
                        'error' => 'Unable to save config file.',
                    ];
                }
            }
        }

        return [
            'success' => false,
            'error' => 'URL not found in config.',
        ];
    }
}
