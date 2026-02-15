<?php

namespace P2u2;
error_reporting(E_ALL);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
$page_heading = 'Miscellaneous Unicode NCR\'s for Use in CSS ::before';
$title = $page_heading . ' | transformative.jori';

require NS2_ROOT . '/vendor/autoload.php';
require NS2_ROOT . '/public/doctype/doctype-picnic.php';

?>

 <header>Header</header>
 <main>Main
    <section id="two-tabs">Section in Main footer is include:
    <div>
    <div class="tabs two">
      <input id="tabA-1" type="radio" name="tabgroupA" checked="">
      <label class="button toggle" for="tabA-1">Tab 1</label>
      <input id="tabA-2" type="radio" name="tabgroupA">
      <label class="button toggle" for="tabA-2">Tab 2</label>
      <div class="row">
        <div class="tab">
          <div>
            <h2>This is the first tab</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>

        <div class="tab">
          <div>
            <h2>This is the second tab</h2>
            <p>
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
 </main>
 
<?php


require NS2_ROOT . '/public/footer/footer-base.php';

?>
