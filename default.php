<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
	header('Location: ./public/default.php');

}
else {
    require_once __DIR__.'/public/default.php';
}

?>