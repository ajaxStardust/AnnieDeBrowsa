<?php

namespace P2u2\Public;
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Miscellaneous Unicode NCR\'s for Use in CSS ::before';
$title = $page_heading . ' | transformative.jori';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-unicode.php';

?>
<body>
 <header>Header</header>
 <main>Main
    <section>Section in Main footer is include:</section>
 </main>
 
<?php
require NS2_ROOT . '/public/content/content-unicode-curated.php';

require NS2_ROOT . '/public/footer/footer-unicode.php';

?>
