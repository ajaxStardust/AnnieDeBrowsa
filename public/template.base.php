<?php

namespace P2u2\Public;
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Template - Doctype Base (Picnic CSS) with jQuery';
$title = $page_heading . ' | transformative.jori';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-base.php';

?>
<body>
 <header>
   <h1><?= $page_heading; ?></h1>
</header>
 <main class="container">Main
   <article class="flex">
      <p>p in article.flex</p>
      <p class="card">p.card in article.flex in main</p>
      <p class="card">p.card in article.flex. Using footer-jquery.php</p>
   </article>
 </main>
 <section>Section after Main | footer is include:</section>
<?php

require NS2_ROOT . '/public/footer/footer-jquery.php';

?>
