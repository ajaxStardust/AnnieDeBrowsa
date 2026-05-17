<?php
namespace Adb\Model;
require_once __DIR__ . '/OpenGraphPreview.php';
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
    foreach ($json_urls as $siteIndex => $site) {
        if (is_array($site) && !empty($site['url'])) {
            $cardTitle = !empty($site['og_title']) ? $site['og_title'] : ($site['name'] ?? $site['url']);
            $cardSubtitle = !empty($site['name']) && $site['name'] !== $cardTitle ? $site['name'] : parse_url($site['url'], PHP_URL_HOST);
            $cardImage = isset($site['og_image']) ? trim((string) $site['og_image']) : '';
            $countId = 'offsite-count-' . intval($siteIndex);

            $html .= '<div class="ba b--light-gray br2 pa3 mr3 mb3 w-100 w-50-m w-25-l">
                <a href="'. htmlspecialchars($site["url"]) . '" target="_blank" title="' . htmlspecialchars($cardTitle) . '" rel="noopener noreferrer" class="link dim f5 blue mb1 db offsite-track-link" data-url="' . htmlspecialchars($site['url']) . '" data-name="' . htmlspecialchars($site['name'] ?? '') . '" data-count-target="' . htmlspecialchars($countId) . '">';

            if ($cardImage !== '') {
                $html .= '<img src="' . htmlspecialchars($cardImage) . '" alt="' . htmlspecialchars($cardTitle) . '" class="db w-100 br2 mb2" style="aspect-ratio: 1.91 / 1; object-fit: cover; background:#f4f4f4;">';
            }

            $html .= '<span class="db fw6">' . htmlspecialchars($cardTitle) . '</span>';

            if (!empty($cardSubtitle)) {
                $html .= '<span class="db f7 gray mt1">' . htmlspecialchars($cardSubtitle) . '</span>';
            }

            $html .= '</a>';

            // Emoji/data
            if (!empty($site['data'])) {
                $html .= '<div class="f3 mb1">' . htmlspecialchars($site['data']) . '</div>';
            }

            // Count metadata
            $html .= '<div class="f7 gray">Visits: <span id="' . htmlspecialchars($countId) . '">' . intval($site['count'] ?? 0) . '</span></div>';

            $html .= '</div>'; // close card div
        }
    }

    // Close container
    $html .= '</div></div>';

    return $html;
}
}