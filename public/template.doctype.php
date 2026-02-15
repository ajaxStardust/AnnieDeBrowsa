<?php

namespace P2u2;
error_reporting(E_ALL);
$page_heading = 'PHP-Requiring 4 Files'; // appears in page
$title = 'template-dot-doctype-dot-php'; // which of the doctype folder used at line 10

/**
 * DEFINE CONSTANT NS2 for namespace P2u2
 */
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));

/**
 * require PSR-4 Autooload
 */
require NS2_ROOT . '/vendor/autoload.php';

/**
 * require DOCTYPE BASIC
 */
require NS2_ROOT . '/public/doctype/doctype-base.php';

/**
 * require SECTION ELEMENT
 */
require NS2_ROOT . '/public/content/content-section-offsitelinks.php';

/**
 * require FOOTER BASIC
 */
require NS2_ROOT . '/public/footer/base.footer.php';

?>
