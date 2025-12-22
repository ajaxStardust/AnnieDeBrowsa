<?php

namespace P2u2\View;

use P2u2\Model\P2u2 as P2u2;
use P2u2\Model\Environment as Env;
use P2u2\Model\Functions as Functions;
use P2u2\Model\Newmethod as Newmethod;
use P2u2\Model\Evalpath as Evalpath;

$Env = new Env(NS2_ROOT);
$initEnv = $Env->whatis(NS2_ROOT);
// set Env variable array ver01
$title = $Env->initialize_enviornment['title'];


if (isset($_GET['path2url'])) {
    $path2url = $_GET['path2url'];
} else {
    $path2url = NS2_ROOT;
}

// path sent to process
$enterpathhere = isset($path2url) ? $path2url : $_SERVER['DOCUMENT_ROOT'] . "/adbcollections/my_Notes/index.php";
// set Env vars based on enterpathhere
// DIFF? whatis allows for path
$whatis = $Env->whatis($enterpathhere);

// P2u2()
$P2u2 = new P2u2($enterpathhere);
// P2u2() filtered path to process
$clean_url = $P2u2->clean_url_chars($enterpathhere);
// P2u2()
$extract_components = $P2u2->extract_path_components($P2u2->clean_url_chars($enterpathhere));

// Evalpath()
$Eval = new Evalpath($enterpathhere);
// Evalpath()
$EvalPathHere = $Eval->test_location($enterpathhere);

// Newmethod()
$Newmethod = new Newmethod($enterpathhere);
// Newmethod()
$buildUrl = $Newmethod->buildUrl($enterpathhere);
// Newmethod()
$buildUrlLast = $Newmethod->buildUrlLast($enterpathhere);
// Newmethod()
$contructNewMethod = $Newmethod->_construct_NewMethod;

// Functions()
$Functions = new Functions();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php print $whatis['title']; ?>
    </title>
    <link rel="icon" type="image/ico" href="favicon.ico">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/tachyons-extended.css">
    <link rel="stylesheet" href="assets/css/lightslider.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .card {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s ease;
        }
        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }
        .section-title {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 0.5rem;
        }
        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
    </style>
</head>

<body class="sans-serif bg-light-gray">
    <div class="sans-serif w-100">
        <!-- Header -->
        <header class="sans-serif bg-dark-blue white pv4 ph3">
            <div class="sans-serif mw9 center">
                <h1 class="sans-serif ma0 mb2 f2 fw7"><?= $whatis['page_heading']; ?></h1>
                <p class="sans-serif ma0 mt2 f4 fw4 o-80">Annie DeBrowsa Notes</p>
            </div>
        </header>

        <!-- Content -->
        <main class="sans-serif pv4 ph3">
            <div class="sans-serif mw9 center card pa4">
  <h2>GPG Key Creation on Arch Linux — 2025-04-14</h2>
  <blockquote>
    <p><strong>User:</strong> I'm on Arch Linux. This is a new installation. I want to setup a GPG key via terminal, so the Desktop key manager will have it ready. Understand?</p>

    <p><strong>Assistant:</strong> Perfect — looks good. You’re on GnuPG 2.4.7 with everything you’d need. The home directory is where expected:<br>
    <code>/home/jsabarese/.gnupg</code><br>
    So your GUI key manager should be reading from that same keyring once we populate it.</p>

    <p><strong>Next Step: Generate the key</strong></p>
    <pre>
gpg --full-generate-key
    </pre>
    <p>And follow the prompts:</p>
    <ul>
      <li>Key type: 1 (RSA and RSA)</li>
      <li>Key size: 4096</li>
      <li>Expiration: up to you (1-2 years suggested)</li>
      <li>Name</li>
      <li>Email</li>
      <li>Passphrase</li>
    </ul>

    <p>Once done, confirm:</p>
    <pre>
gpg --list-keys
    </pre>

    <p>If you crack open your key manager (like Seahorse on GNOME), it should show up under your personal keys.</p>

    <p><strong>Optional but Recommended: Generate a Revocation Certificate</strong></p>
    <pre>
gpg --output ~/revocation-cert-yourname.asc --gen-revoke [YOUR-KEY-ID]
    </pre>

    <p>You’ll get asked for a reason and comments. Save this <code>.asc</code> file somewhere offline (like a USB drive or encrypted disk).</p>
  </blockquote>
</section>

            </div>
        </main>

        <!-- Footer -->
        <footer class="sans-serif bg-dark-blue white pa3 tc">
            <p class="sans-serif ma0 f6">Project by <a href="https://github.com/ajaxStardust" class="sans-serif white fw6">@ajaxStardust</a> • <?php echo $whatis['lastMod']; ?></p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/lightslider.js"></script>
    <script src="assets/js/p2u2.js"></script>
    <script src="assets/js/dynamicdrop.js"></script>

</body>

</html>
