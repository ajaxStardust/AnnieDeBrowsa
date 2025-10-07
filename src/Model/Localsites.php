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
        $home_urls_default = [];
        $home_urls_default['home_urls'][] = [
            "url" => "https://neutility.life",
            "name" => "Neutility._",
            "data" => "Waving",
            "count" => (int) "2",
            "path" => 'https://neutility.life'
        ];
        // Initialize HTML structure for the list
        $html = '<div id="sytebuild_htmlbuild">
        ';
        $html .= '<ol class="list pl0 flex flex-wrap">
        ';
        $num = 0;
        $json_urls = array_merge($json_urls,$home_urls_default['home_urls']);
        foreach ($json_urls as $index => $site) {
            
            if(is_array($site)){
                // var_dump($site);
            // Create each list item
            $html .= '<li class="mr3 mb2">
            ';
    
            // Generate the link with the site name and URL
             if (!empty($site['url'])) {

             

            $html .= '<a href="'. htmlspecialchars($site["url"]) . '" target="_blank" title="' . $site["name"] . '" rel="noopener noreferrer" class="link dim" data-url="' . htmlspecialchars($site['url']) . '" data-name="' . htmlspecialchars($site['name']) . '" data-filepath="'.htmlspecialchars($site["url"]).'">';
            
            $html .= htmlspecialchars($site['name']);
            $html .= '</a>
            ';
        }
    
            // Optionally, display the visit count or additional metadata
             if (!empty($site['count'])) {
                $html .= '<br>meta[data1]: ' . intval($site['count']).'<br>';
             }
             if (!empty($site['data'])) {
                $html .= '<br>meta[data2]: ' . htmlspecialchars($site['data']).'<br>';
             }
    
            $html .= '</li>
            ';
            }
            else {
            $html .= $site . '</li>
            ';
        }
        }
    
        $html .= '</ol>
        ';
        $html .= '</div>
        ';
        // var_dump(\get_defined_vars());
        // Return the generated HTML
        return $html;
    }
}