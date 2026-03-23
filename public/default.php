<?php

namespace P2u2;

/*
 * CONTRACT: public/default.php bootstrap
 *
 * ROLE:
 * - This is the current public bootstrap for the live path-to-URL app.
 * - Root /default.php redirects here.
 *
 * INVARIANTS:
 * - Must define NS2 and NS2_ROOT before requiring app files.
 * - Must keep requiring vendor/autoload.php.
 * - Must keep rendering the current live app through src/View/Main.page.php
 *   until the migration to public/content + public/doctype is completed.
 *
 * MIGRATION RULE:
 * - If this file stops requiring src/View/Main.page.php, update CONTRACT.md
 *   in the same change.
 */
error_reporting(0);
define('NS2', __NAMESPACE__);
define('NS2_ROOT', dirname(__DIR__));
require NS2_ROOT . '/vendor/autoload.php';
require  NS2_ROOT . '/src/View/Main.page.php';
