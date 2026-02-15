<?php

namespace P2u2\Public;
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Template - Doctype TAILWIND CSS local with jQuery';
$title = $page_heading . ' | transformative.click';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-easteregg.php'; 
require NS2_ROOT . '/public/content/content-easteregg-plus.php'; 
require NS2_ROOT . '/public/footer/footer-jquery.php';

?>
