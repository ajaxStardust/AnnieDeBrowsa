<?php

namespace P2u2;
error_reporting(E_ALL);
$page_heading = 'is public/template.doctype.php'; // appears in page
$title = 'public/template.doctype.php'; // which of the doctype folder used at line 10
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-base.php';
require NS2_ROOT . '/public/content/content-environment.php';
require NS2_ROOT . '/public/footer/base.footer.php';

?>
