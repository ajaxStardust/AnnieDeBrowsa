<?php
namespace Adb\Model;
use Adb\Model\Helpers as Helpers;
use Adb\Model\Jsonconfigmanager as Jsonconfigmanager;

class Localsites extends Helpers
{
    public $JsonConfig;
    public function __construct()
    {
        $Jsonconfigmanager = new Jsonconfigmanager;
        $config = $Jsonconfigmanager->loadConfig();
        $this->JsonConfig = $config;

        $this->getSites($config);
    }

    public function getSites($json_urls) {
    // Add default home URLs
    $home_urls_default = [];
    $home_urls_default['home_urls'][] = [
        "url" => "https://neutility.life",
        "name" => "Neutility._",
        "data" => '🤣',
        "count" => 2
    ];

    // Merge JSON config with default URLs
    $json_urls = array_merge($json_urls, $home_urls_default['home_urls']);

    // Initialize container
    $html = '<div id="sytebuild_htmlbuild">
        <div class="flex flex-wrap">';
    
    // Loop through each link and generate card
    foreach ($json_urls as $site) {
        if (is_array($site) && !empty($site['url'])) {
            $html .= '<div class="ba b--light-gray br2 pa3 mr3 mb3 w-100 w-50-m w-25-l">
                <a href="'. htmlspecialchars($site["url"]) . '" target="_blank" title="' . htmlspecialchars($site["name"]) . '" rel="noopener noreferrer" class="link dim f5 blue mb1 db" data-url="' . htmlspecialchars($site['url']) . '" data-name="' . htmlspecialchars($site['name']) . '">'
                . htmlspecialchars($site['name']) .
                '</a>';

            // Emoji/data
            if (!empty($site['data'])) {
                $html .= '<div class="f3 mb1">' . htmlspecialchars($site['data']) . '</div>';
            }

            // Count metadata
            if (!empty($site['count'])) {
                $html .= '<div class="f7 gray">Visits: ' . intval($site['count']) . '</div>';
            }

            $html .= '</div>'; // close card div
        }
    }

    // Close container
    $html .= '</div></div>';

    return $html;
}
}