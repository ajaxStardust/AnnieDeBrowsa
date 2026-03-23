<?php

namespace P2u2\Public;

/*
 * CONTRACT: Unicode/easter-egg public entrypoint
 *
 * ROLE:
 * - Thin public bootstrap for a self-contained feature page.
 * - Demonstrates the preferred sandbox composition pattern:
 *   public/doctype + public/content + public/footer.
 *
 * INVARIANTS:
 * - Keep page-level variables here.
 * - Keep layout/body/footer implementation in the required fragment files.
 * - Prefer extending the fragment files instead of growing this bootstrap file.
 */
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Template - Doctype TAILWIND CSS local with jQuery';
$title = $page_heading . ' | transformative.click';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-tachyons.php';  // DOCTYPE USING TACHYONS ends with open element, BODY 
require NS2_ROOT . '/public/template/editable-html.php';   // the editable HTML template
require NS2_ROOT . '/public/footer/footer-jquery.php'; // the jQuery footer

?>
