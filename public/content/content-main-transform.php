<header id="transformative-header" class="bg-silver white pv4 ph3">
<?php
/*
 * CONTRACT: public-side composition target for the transform app
 *
 * ROLE:
 * - Candidate replacement for the monolithic src/View/Main.page.php layout.
 * - Composes public/content fragments around the existing model/view pieces.
 *
 * INVARIANTS:
 * - If this becomes the canonical live transform page, preserve the current
 *   visible sections from Main.page.php during migration.
 * - Trypath.form.php is still a required dependency here.
 */
?>
    <div class="mw9 center">
        <h1 class="ma0 mb2 f2 fw7"><?= $whatis["page_heading"] ?></h1>
        <p class="ma0 mt2 f4 fw4 o-80">Annie DeBrowsa Tranform URL</p>
    </div>
</header>
<main class="pv4 ph3" id="transformative-main">
    <div class="mw9 center">
    <?php 
        include NS2_ROOT . '/public/content/content-card-ajaxstardust.php'; 
        include NS2_ROOT . '/public/content/content-environment.php';
        require NS2_ROOT . "/src/View/Trypath.form.php";
        require NS2_ROOT . '/public/content/content-vue-app.php';
    ?>
    </div>
</main>

 