<?php
/*
 * CONTRACT: root unicode entrypoint
 *
 * ROLE:
 * - Human-friendly root redirect into the Unicode/easter-egg public route.
 *
 * INVARIANTS:
 * - Must remain a thin redirect.
 * - Must keep pointing at ./public/unicode-easteregg.php unless routing is
 *   intentionally changed and CONTRACT.md is updated in the same edit.
 */
header('Location: ./public/unicode-easteregg.php');

exit();
?>
