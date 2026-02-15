<?php
if (!defined('ABSOLUTELOCATION')) {
    define('ABSOLUTELOCATION', rtrim(dirname(__FILE__), 'public/inc'));
}
$abspath = ABSOLUTELOCATION;
$serversoftware = $_SERVER['SERVER_SOFTWARE'];
$servername = $_SERVER['SERVER_NAME'];
date_default_timezone_set('EST');
$page_heading = 'Screenshots and Thumbnails';
$title = 'screenshots rendering page';
$lastMod = 'Modified: ' . date('D M j Y G:i:s T', getlastmod());
require 'public/class/class-cwthumbs.php';

