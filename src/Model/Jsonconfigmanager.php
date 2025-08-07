<?php
namespace Adb\Model;

use Adb\Model\Helpers;

class JsonConfigManager extends Helpers
{
    private array $config = [];
    private ?string $jsonFile = null;

    public function __construct()
    {
        if (empty($this->config)) {
            $configPaths = [
    __DIR__ . '/../../config.json',  // relative path from src/Model/
    realpath(__DIR__ . '/../../../config.json'),
    NS_ROOT . '/config.json',
    '../config.json',
    './config.json',
    $_SERVER['DOCUMENT_ROOT'] . '/../config.json'  // one level above public
];




            foreach ($configPaths as $configPath) {
                if (!$configPath) {
                    continue;
                }

                if (file_exists($configPath)) {
                    $realPath = realpath($configPath);
                    if ($realPath !== false) {
                        $this->jsonFile = $realPath;
                        $jsonContent = file_get_contents($this->jsonFile);
                        $this->config = json_decode($jsonContent, true) ?? [];
                        
                        if (!defined('JSONCONFIG')) {
                            define('JSONCONFIG', $this->jsonFile);
                        }
                        break;
                    }
                }
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

    public function updateUrlCount(string $url): string
    {
        if (isset($this->config['home_urls']) && is_array($this->config['home_urls'])) {
            foreach ($this->config['home_urls'] as &$entry) {
                if (isset($entry['url']) && $entry['url'] === $url) {
                    $entry['count'] = ($entry['count'] ?? 0) + 1;
                    $this->saveConfig($this->config);
                    return "Accessed $url. New count is {$entry['count']}.";
                }
            }
        }
        return "URL $url not found in JSON file.";
    }
}